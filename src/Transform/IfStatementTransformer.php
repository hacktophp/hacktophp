<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class IfStatementTransformer
{
	public static function transform(HHAST\IfStatement $node, HackFile $file) : PhpParser\Node
	{
		$cond = ExpressionTransformer::transform($node->getCondition(), $file);

		$stmts = NodeTransformer::transform($node->getStatement(), $file);

		$elseifs = $node->hasElseifClauses() ? self::transformElseifs($node->getElseifClauses(), $file) : null;
		$else = $node->hasElseClause()
			? new PhpParser\Node\Expr\Else_(
				NodeTransformer::transform($node->getElse()->getStatement())
			)
			: null;

		return new PhpParser\Node\Stmt\If_(
			$cond,
			[
				'stmts' => $stmts,
				'elseifs' => $elseifs,
				'else' => $else,
			]
		);
	}

	private static function transformElseifs(HHAST\EditableList $node, HackFile $file) : array
	{
		return array_map(
			function(HHAST\ElseifClause $node) use ($file) {
				return new PhpParser\Node\Expr\Else_(
					NodeTransformer::transform($node->getStatement(), $file)
				);
			},
			$node->getChildren()
		);
	}
}