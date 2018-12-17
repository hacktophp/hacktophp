<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class IfStatementTransformer
{
	public static function transform(HHAST\IfStatement $node, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$cond = ExpressionTransformer::transform($node->getCondition(), $file, $scope);

		$stmts = NodeTransformer::transform($node->getStatement(), $file, $scope);

		$elseifs = $node->hasElseifClauses() ? self::transformElseifs($node->getElseifClauses(), $file, $scope) : null;
		$else = $node->hasElseClause()
			? new PhpParser\Node\Stmt\Else_(
				NodeTransformer::transform($node->getElseClause()->getStatement(), $file, $scope)
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

	private static function transformElseifs(HHAST\EditableList $node, HackFile $file, Scope $scope) : array
	{
		return array_map(
			function(HHAST\ElseifClause $node) use ($file, $scope) {
				return new PhpParser\Node\Stmt\ElseIf_(
					NodeTransformer::transform($node->getStatement(), $file, $scope)
				);
			},
			$node->getChildren()
		);
	}
}