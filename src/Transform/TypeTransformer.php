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
	public static function transform(HHAST\EditableNode $node, Project $project, HackFile $file, Scope $scope, array $template_map = []) : string
	{
		if ($node instanceof HHAST\ShapeTypeSpecifier) {
			return self::transformShape($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\KeysetTypeSpecifier) {
			$keyset_type = self::transform($node->getTypeUNTYPED(), $project, $file, $scope);

			return 'array<' . $keyset_type . ',' . $keyset_type . '>';
		}

		if ($node instanceof HHAST\VectorTypeSpecifier) {
			$vec_type = self::transform($node->getType(), $project, $file, $scope);

			return 'array<int,' . $vec_type . '>';
		}

		if ($node instanceof HHAST\TupleTypeSpecifier) {
			return self::transformTuple($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\DictionaryTypeSpecifier) {
			$members = $node->getMembers()->getChildren();

			$dictionary_types = [];

			foreach ($members as $member) {
				$dictionary_types[] = self::transform($member->getItem(), $project, $file, $scope);
			}

			return 'array<' . implode(',', $dictionary_types) . '>';
		}

		if ($node instanceof HHAST\ClassnameTypeSpecifier) {
			if (!$node->hasType()) {
				return 'class-string';
			}

			$type = self::transform($node->getType(), $project, $file, $scope, $template_map);

			return $type . '::class';
		}

		if ($node instanceof HHAST\EditableToken) {
			return self::transformToken($node, $project, $file, $scope, $template_map);
		}

		if ($node instanceof HHAST\ClosureTypeSpecifier) {
			$params = [];

			if ($node->hasParameterList()) {
				$children = $node->getParameterList()->getChildren();

				foreach ($children as $child) {
					$child = $child->getItem();

					if ($child instanceof HHAST\ClosureParameterTypeSpecifier) {
						$params[] = self::transform($child->getType(), $project, $file, $scope, $template_map);
					} elseif ($child instanceof HHAST\VariadicParameter) {
						$params[] = '...' . self::transform($child->getType(), $project, $file, $scope, $template_map);
					}
				}
			}

			$return_type = '';

			if ($node->hasReturnType()) {
				$return_type = ':' . self::transform($node->getReturnType(), $project, $file, $scope, $template_map);
			}

			return '\Closure(' . implode(', ', $params) . ')' . $return_type;
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

				if (isset($project->types[$token_text])) {
					return $project->types[$token_text];
				}

				$string_type .= $token_text;
				continue;
			}

			if ($child instanceof HHAST\EditableToken) {
				$string_type .= self::transformToken($child, $project, $file, $scope, $template_map);
				continue;
			}

			$string_type .= self::transform($child, $project, $file, $scope);
		}

		if (!$string_type) {
			throw new \UnexpectedValueException('empty type');
		}

		return $string_type;
	}

	public static function getPhpParserTypeFromPsalm(Psalm\Type\Union $psalm_type, Project $project, HackFile $file, Scope $scope)
	{
		$atomic_types = $psalm_type->getTypes();
		
		if (count($atomic_types) === 1) {
			return self::getPhpParserTypeFromAtomicPsalm(reset($atomic_types), $project, $file, $scope);
		}

		foreach ($atomic_types as $atomic_type) {
			if ($atomic_type instanceof Psalm\Type\Atomic\TNull) {
				continue;
			}

			$inner_type = self::getPhpParserTypeFromAtomicPsalm($atomic_type, $project, $file, $scope);

			if ($inner_type === null) {
				return null;
			}

			return new PhpParser\Node\NullableType(
				$inner_type
			);
		}
	}

	public static function getPhpParserTypeFromAtomicPsalm(Psalm\Type\Atomic $psalm_type, Project $project, HackFile $file, Scope $scope)
	{
		if ($psalm_type instanceof Psalm\Type\Atomic\TArray) {
			return 'array';
		}

		if ($psalm_type instanceof Psalm\Type\Atomic\Scalar) {
			return $psalm_type->toPhpString($file->namespace, [], null, 7, 2);
		}

		if ($psalm_type instanceof Psalm\Type\Atomic\TNamedObject) {
			if ($psalm_type->value === 'static') {
				return null;
			}

			return new PhpParser\Node\Name($psalm_type->toPhpString($file->namespace, [], null, 7, 2));
		}
	}

	public static function transformShape(HHAST\ShapeTypeSpecifier $node, Project $project, HackFile $file, Scope $scope) : string
	{
		$children = $node->hasFields () ? $node->getFields()->getChildren() : [];

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

			$type = self::transform($field_item->getType(), $project, $file, $scope);

			$field_types[] = $name_text . ':' . $type;
		}

		return 'array{' . implode(',', $field_types) . '}';
	}


	public static function transformTuple(HHAST\TupleTypeSpecifier $node, Project $project, HackFile $file, Scope $scope) : string
	{
		$children = $node->getTypes()->getChildren();

		$field_types = [];

		foreach ($children as $i => $child) {
			$field_item = $child->getItem();

			$type = self::transform($field_item, $project, $file, $scope);

			$field_types[] = $i . ':' . $type;
		}

		return 'array{' . implode(',', $field_types) . '}';
	}

	public static function transformToken(HHAST\EditableToken $node, Project $project, HackFile $file, Scope $scope, array $template_map = []) : string
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
				return $token_text;
			}

			if ($token_text === 'Awaitable') {
				return 'Sabre\\Event\\Promise';
			}

			if ($file->namespace) {
				$token_text = $file->namespace . '\\' . $token_text;

				if (isset($project->types[$token_text])) {
					return $project->types[$token_text];
				}

				return $token_text;
			}

			if (isset($project->types[$token_text])) {
				return $project->types[$token_text];
			}
		}

		if ($node instanceof HHAST\ThisToken) {
			return 'static';
		}

		return $token_text;
	}
}