<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class NodeTransformer
{
	public static function transformList(HHAST\Node\EditableList $list, HackFile $file)
	{
		return array_map(
			function(HHAST\Node\EditableNode $node) use ($file) { return self::transform($node, $file); },
			$list->getChildren()
		);
	}

	public static function transform(HHAST\Node\EditableNode $node, HackFile $file) : PhpParser\Node
	{
		if ($node instanceof HHAST\Node\EditableList) {
			return self::transformList($node, $file);
		}
		
		if ($node instanceof HHAST\Node\Script) {
			return ScriptTransformer::transform($node, $file);
		}

		if ($node instanceof HHAST\Node\MarkupSection) {
			// todo maybe more information can be gleaned
			return new PhpParser\Node\Stmt\Nop();
		}

		if ($node instanceof HHAST\Node\NamespaceDeclaration) {
			$file->namespace = $node->getQualifiedNameAsString();
			return new PhpParser\Node\Stmt\Nop();
		}

		if ($node instanceof HHAST\Node\NamespaceUseDeclaration) {
			return NamespaceUseDeclarationTransformer::transform($node, $file);
		}

		if ($node instanceof HHAST\Node\FunctionDeclaration) {
			return FunctionDeclarationTransformer::transform($node, $file);
		}

		throw new \UnexpectedValueException('Unknown type ' . get_class($node));
	}
}