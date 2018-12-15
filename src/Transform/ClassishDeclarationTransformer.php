<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;
use Psalm;

class ClassishDeclarationTransformer
{
	public static function transform(HHAST\ClassishDeclaration $node, HackFile $file) : PhpParser\Node
	{
		$modifiers = $node->hasModifiers() ? $node->getModifiers()->getChildren() : null;

		$abstract = false;

		$class_type = $node->getKeyword();

		$class_name = $node->getName()->getText();

		if ($modifiers) {
			foreach ($modifiers as $modifier) {
				if ($modifier instanceof HHAST\AbstractToken) {
					$abstract = true;
				}
			}
		}

		$class_extends = $node->hasExtendsList() ? $node->getExtendsList() : null;

		$class_implements = $node->hasImplementsList() ? $node->getImplementsList() : null;

		if ($class_type instanceof HHAST\ClassToken) {
			return new PhpParser\Node\Stmt\Class_(
				$class_name,
				[
					'stmts' => self::transformBody($node->getBody(), $file)
				]
			);
		}
	}

	private static function transformBody(HHAST\ClassishBody $node, HackFile $file) : array
	{
		$children = $node->getElements()->getChildren();

		$stmts = [];

		foreach ($children as $child) {
			if ($child instanceof HHAST\PropertyDeclaration) {
				$stmts[] = self::transformProperty($child, $file);
				continue;
			}

			if ($child instanceof HHAST\MethodishDeclaration) {
				$stmts[] = FunctionDeclarationTransformer::transform($child, $file);
				continue;
			}

			if ($child instanceof HHAST\ConstDeclaration) {
				$stmts[] = ConstDeclarationTransformer::transform($child, $file, true);
				continue;
			}

			throw new \UnexpectedValueException('Unrecognised class member ' . get_class($child));
		}

		return $stmts;
	}

	private static function transformProperty(HHAST\PropertyDeclaration $node, HackFile $file) : PhpParser\Node\Stmt\Property
	{
		$abstract = false;

		$flags = 0;
		$modifiers = $node->hasModifiers() ? $node->getModifiers()->getChildren() : null;

		if ($modifiers) {
			foreach ($modifiers as $modifier) {
				if ($modifier instanceof HHAST\PublicToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PUBLIC;
				} elseif ($modifier instanceof HHAST\ProtectedToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PROTECTED;
				} elseif ($modifier instanceof HHAST\PrivateToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PRIVATE;
				} elseif ($modifier instanceof HHAST\StaticToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_STATIC;
				}
			}
		}

		$type = $node->hasType() ? $node->getType() : null;

		$attributes = [];

		if ($type) {
			$type_string = TypeTransformer::transform($type, $file);
			
			$psalm_type = Psalm\Type::parseString($type_string);

			$docblock = [
				'description' => '',
				'specials' => [],
			];
			$docblock['specials']['var'] = [$psalm_type->toNamespacedString($file->namespace, [], null, false)];

			$docblock_string = Psalm\DocComment::render($docblock, '');

			$attributes['comments'] = [
				new \PhpParser\Comment\Doc(rtrim($docblock_string))
			];
		}

		$declarators = $node->getDeclarators();

		$property_properties = [];

		foreach ($declarators->getChildren() as $declarator) {
			$declarator = $declarator->getItem();
			$default = null;
			
			if ($declarator->hasInitializer()) {
				$default = ExpressionTransformer::transform($declarator->getInitializer(), $file);
			}

			$property_properties[] = new PhpParser\Node\Stmt\PropertyProperty(
				substr($declarator->getName()->getText(), 1),
				$default
			);
		}

		return new PhpParser\Node\Stmt\Property(
			$flags,
			$property_properties,
			$attributes
		);
	}
}