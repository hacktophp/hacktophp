<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;
use Psalm;

class TypeTransformer
{
	/** @param HHAST\ClassnameTypeSpecifier | HHAST\ClosureTypeSpecifier |
	 *     HHAST\DarrayTypeSpecifier | HHAST\DictionaryTypeSpecifier | HHAST\GenericTypeSpecifier |
	 *     HHAST\KeysetTypeSpecifier | HHAST\MapArrayTypeSpecifier | HHAST\Missing |
	 *     HHAST\NullableTypeSpecifier | HHAST\ShapeTypeSpecifier | HHAST\SimpleTypeSpecifier |
	 *     HHAST\SoftTypeSpecifier | HHAST\NoreturnToken | HHAST\TupleTypeSpecifier | HHAST\TypeConstant |
	 *     HHAST\VarrayTypeSpecifier | HHAST\VectorArrayTypeSpecifier | HHAST\VectorTypeSpecifier $node
	 */
	public static function transform(HHAST\EditableNode $node, HackFile $file, Scope $scope, array $template_map = []) : string
	{
		if ($node instanceof HHAST\ShapeTypeSpecifier) {
			return self::transformShape($node, $file, $scope);
		}

		if ($node instanceof HHAST\KeysetTypeSpecifier) {
			$keyset_type = self::transform($node->getType(), $file, $scope);

			return 'array<' . $keyset_type . ',' . $keyset_type . '>';
		}

		if ($node instanceof HHAST\VectorTypeSpecifier) {
			$vec_type = self::transform($node->getType(), $file, $scope);

			return 'array<int,' . $vec_type . '>';
		}

		if ($node instanceof HHAST\DictionaryTypeSpecifier) {
			$members = $node->getMembers()->getChildren();

			$dictionary_types = [];

			foreach ($members as $member) {
				$dictionary_types[] = self::transform($member->getItem(), $file, $scope);
			}

			return 'array<' . implode(',', $dictionary_types) . '>';
		}

		if ($node instanceof HHAST\ClassnameTypeSpecifier) {
			$type = self::transform($node->getType(), $file, $scope);

			return 'class-string';
		}

		if ($node instanceof HHAST\EditableToken) {
			return self::transformToken($node, $file, $scope, $template_map);
		}

		if ($node instanceof HHAST\ClosureTypeSpecifier) {
			// TODO support closure types
			return '\Closure';
		}

		if ($node instanceof HHAST\TypeConstant) {
			// TODO support typed constants
			return 'mixed';
		}

		$children = $node->getChildren();

		$string_type = '';

		foreach ($children as $child) {
			if ($child instanceof HHAST\ListItem) {
				$child = $child->getItem();
			}

			if ($child instanceof HHAST\QualifiedName) {
				$token_text = QualifiedNameTransformer::getText($child);

				if ($token_text[0] !== '\\' && $file->namespace) {
					$token_text = $file->namespace . '\\' . $token_text;
				}

				$string_type .= $token_text;
				continue;
			}

			if ($child instanceof HHAST\EditableToken) {
				$string_type .= self::transformToken($child, $file, $scope, $template_map);
				continue;
			}

			$string_type .= self::transform($child, $file, $scope);
		}

		if (!$string_type) {
			throw new \UnexpectedValueException('empty type');
		}

		return $string_type;
	}

	public static function getPhpParserTypeFromPsalm(Psalm\Type\Union $psalm_type, HackFile $file, Scope $scope)
	{
		$atomic_types = $psalm_type->getTypes();
		
		if (count($atomic_types) === 1) {
			return self::getPhpParserTypeFromAtomicPsalm(reset($atomic_types), $file, $scope);
		}

		foreach ($atomic_types as $atomic_type) {
			if ($atomic_type instanceof Psalm\Type\Atomic\TNull) {
				continue;
			}

			return new PhpParser\Node\NullableType(
				self::getPhpParserTypeFromAtomicPsalm($atomic_type, $file, $scope)
			);
		}
	}

	public static function getPhpParserTypeFromAtomicPsalm(Psalm\Type\Atomic $psalm_type, HackFile $file, Scope $scope)
	{
		if ($psalm_type instanceof Psalm\Type\Atomic\TArray) {
			return 'array';
		}

		if ($psalm_type instanceof Psalm\Type\Atomic\Scalar) {
			return (string) $psalm_type;
		}

		if ($psalm_type instanceof Psalm\Type\Atomic\TNamedObject) {
			if ($psalm_type->value === 'static') {
				return new PhpParser\Node\Name('static');
			}

			return new PhpParser\Node\Name($psalm_type->toPhpString($file->namespace, [], null, 7, 2));
		}
	}

	public static function transformShape(HHAST\ShapeTypeSpecifier $node, HackFile $file, Scope $scope) : string
	{
		$children = $node->getFields()->getChildren();

		$field_types = [];

		foreach ($children as $child) {
			$field_item = $child->getItem();

			$name = $field_item->getName();

			$name_text = null;

			if ($name instanceof HHAST\LiteralExpression) {
				$literal = $name->getExpression();

				switch (get_class($literal)) {
					case HHAST\SingleQuotedStringLiteralToken::class:
					case HHAST\DoubleQuotedStringLiteralToken::class:
						$name_text = substr($literal->getText(), 1, -1);
						break;
				}
			}

			if ($name_text === null) {
				continue;
			}

			$type = self::transform($field_item->getType(), $file, $scope);

			$field_types[] = $name_text . ':' . $type;
		}

		return 'array{' . implode(',', $field_types) . '}';
	}

	public static function transformToken(HHAST\EditableToken $node, HackFile $file, Scope $scope, array $template_map = []) : string
	{
		$token_text = $node->getText();

		switch ($token_text) {
			case 'vec':
			case 'dict':
			case 'keyset':
				return 'array';
		}

		if ($node instanceof HHAST\NameToken) {
			if (isset($template_map[$token_text])) {
				return $template_map[$token_text];
			}

			if ($token_text === 'Awaitable') {
				return 'Sabre\\Event\\Promise';
			}

			if ($file->namespace) {
				return $file->namespace . '\\' . $token_text;
			}
		}

		if ($node instanceof HHAST\ThisToken) {
			return 'static';
		}

		return $token_text;
	}
}