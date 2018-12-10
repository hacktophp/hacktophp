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
	public static function transform(HHAST\EditableNode $node, HackFile $file) : string
	{
		$children = $node->getChildren();

		$string_type = '';

		foreach ($children as $child) {
			if ($child instanceof HHAST\QualifiedName) {
				$token_text = QualifiedNameTransformer::getText($child);

				if ($token_text[0] !== '\\' && $file->namespace) {
					$token_text = $file->namespace . '\\' . $token_text;
				}

				$string_type .= $token_text;
				continue;
			}

			if ($child instanceof HHAST\EditableToken) {
				$token_text = $child->getText();

				switch ($token_text) {
					case 'vec':
					case 'dict':
						$token_text = 'array';
						break;
				}

				if ($child instanceof HHAST\NameToken) {
					if ($token_text === 'Awaitable') {
						$token_text = 'Sabre\\Event\\Promise';
					} else {
						if ($file->namespace) {
							$token_text = $file->namespace . '\\' . $token_text;
						}
					}
				}

				$string_type .= $token_text;
			} else {
				$string_type .= self::transform($child, $file);
			}
		}

		return $string_type;
	}

	public static function getPhpParserTypeFromPsalm(Psalm\Type\Union $psalm_type, HackFile $file)
	{
		$atomic_types = $psalm_type->getTypes();
		
		if (count($atomic_types) === 1) {
			return self::getPhpParserTypeFromAtomicPsalm(reset($atomic_types), $file);
		}

		foreach ($atomic_types as $atomic_type) {
			if ($atomic_type instanceof Psalm\Type\Atomic\TNull) {
				continue;
			}

			return new PhpParser\Node\NullableType(
				self::getPhpParserTypeFromAtomicPsalm($atomic_type, $file)
			);
		}
	}

	public static function getPhpParserTypeFromAtomicPsalm(Psalm\Type\Atomic $psalm_type, HackFile $file)
	{
		if ($psalm_type instanceof Psalm\Type\Atomic\TArray) {
			return 'array';
		}

		if ($psalm_type instanceof Psalm\Type\Atomic\Scalar) {
			return (string) $psalm_type;
		}

		if ($psalm_type instanceof Psalm\Type\Atomic\TNamedObject) {
			return new PhpParser\Node\Name($psalm_type->toPhpString($file->namespace, [], null, 7, 2));
		}
	}
}