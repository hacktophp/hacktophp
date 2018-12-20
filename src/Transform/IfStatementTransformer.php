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
		$else = null;

		if ($node->hasElseClause()) {
			$else_statement = $node->getElseClause()->getStatement();

			if ($else_statement instanceof HHAST\IfStatement) {
				$else_stmts = [
					self::transform($else_statement, $file, $scope)
				];
			} else {
				$else_stmts = NodeTransformer::transform($else_statement->getStatements(), $file, $scope);
			}

			$else = new PhpParser\Node\Stmt\Else_(
				$else_stmts
			);
		}

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
					ExpressionTransformer::transform($node->getCondition()),
					NodeTransformer::transform($node->getStatement(), $file, $scope)
				);
			},
			$node->getChildren()
		);
	}
}