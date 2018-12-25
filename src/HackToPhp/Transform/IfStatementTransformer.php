<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class IfStatementTransformer
{
	public static function transform(HHAST\IfStatement $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$cond = ExpressionTransformer::transform($node->getCondition(), $project, $file, $scope);

		$stmts = NodeTransformer::transform($node->getStatement(), $project, $file, $scope);

		if (!is_array($stmts)) {
			$stmts = [$stmts];
		}

		$elseifs = $node->hasElseifClauses() ? self::transformElseifs($node->getElseifClauses(), $project, $file, $scope) : null;
		$else = null;

		if ($node->hasElseClause()) {
			$else_statement = $node->getElseClause()->getStatement();

			if ($else_statement instanceof HHAST\IfStatement) {
				$else_stmts = [
					self::transform($else_statement, $project, $file, $scope)
				];
			} else {
				$else_stmts = NodeTransformer::transform($else_statement->getStatements(), $project, $file, $scope);
			}

			if (!is_array($else_stmts)) {
				throw new \UnexpectedValueException('Else statements should be array');
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

	private static function transformElseifs(HHAST\EditableList $node, Project $project, HackFile $file, Scope $scope) : array
	{
		return array_map(
			function(HHAST\ElseifClause $node) use ($project, $file, $scope) {
				$elseif_conditional = ExpressionTransformer::transform($node->getCondition(), $project, $file, $scope);
				$elseif_statements = NodeTransformer::transform($node->getStatement(), $project, $file, $scope);

				if (!is_array($elseif_statements)) {
					$elseif_statements = [$elseif_statements];
				}

				return new PhpParser\Node\Stmt\ElseIf_(
					$elseif_conditional,
					$elseif_statements
				);
			},
			$node->getChildren()
		);
	}
}