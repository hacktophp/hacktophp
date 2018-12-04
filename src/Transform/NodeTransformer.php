<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class NodeTransformer
{
	public static function transformList(HHAST\EditableList $list, HackFile $file)
	{
		return array_map(
			function(HHAST\EditableNode $node) use ($file) { return self::transform($node, $file); },
			$list->getChildren()
		);
	}

	public static function transform(HHAST\EditableNode $node, HackFile $file)
	{
		if ($node instanceof HHAST\EditableList) {
			return self::transformList($node, $file);
		}
		
		if ($node instanceof HHAST\Script) {
			return ScriptTransformer::transform($node, $file);
		}

		if ($node instanceof HHAST\MarkupSection) {
			// todo maybe more information can be gleaned
			return new PhpParser\Node\Stmt\Nop();
		}

		if ($node instanceof HHAST\NamespaceUseDeclaration) {
			return NamespaceUseDeclarationTransformer::transform($node, $file);
		}

		if ($node instanceof HHAST\FunctionDeclaration) {
			return FunctionDeclarationTransformer::transform($node, $file);
		}

		if ($node instanceof HHAST\EndOfFile) {
			return new PhpParser\Node\Stmt\Nop();
		}

		throw new \UnexpectedValueException('Unknown type ' . get_class($node));
	}
}