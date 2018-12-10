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

	public static function transformBody(HHAST\ClassishBody $node, HackFile $file) : array
	{
		$children = $node->getElements()->getChildren();

		$stmts = [];

		foreach ($children as $child) {
			if ($child instanceof HHAST\PropertyDeclaration) {
				var_dump($child);
			}
			var_dump(get_class($child));
		}

		return $stmts;
	}
}