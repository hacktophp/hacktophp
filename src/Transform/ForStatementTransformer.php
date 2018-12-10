<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class ForStatementTransformer
{
	public static function transform(HHAST\ForStatement $node, HackFile $file) : PhpParser\Node
	{
		$init = self::transformExpressions($node->getInitializer(), $file);
		$cond = self::transformExpressions($node->getControl(), $file);
		$loop = self::transformExpressions($node->getEndOfLoop(), $file);

		$stmts = NodeTransformer::transform($node->getBody(), $file);

		return new PhpParser\Node\Stmt\For_(
			[
				'init' => $init,
				'cond' => $cond,
				'loop' => $loop,
				'stmts' => $stmts
			]
		);
	}

	private static function transformExpressions(?HHAST\EditableList $node, HackFile $file) : array
	{
		if (!$node) {
			return [];
		}

		return array_map(
			function(HHAST\ListItem $node) use ($file) {
				return ExpressionTransformer::transform($node->getItem(), $file);
			},
			$node->getChildren()
		);
	}
}