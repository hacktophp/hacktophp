<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class IfStatementTransformer
{
	public static function transform(HHAST\IfStatement $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$cond = ExpressionTransformer::transform($node->getCondition(), $project, $file, $scope);

		$token_comments = [];

		$node_statement = $node->getStatement();

		$inner_comments = [];

		$token_comments = ExpressionTransformer::getTokenCommentsRecursively($node);

		if ($node_statement instanceof HHAST\CompoundStatement && $node_statement->getRightBrace()) {
			$inner_comments = ExpressionTransformer::getTokenComments($node_statement->getRightBrace());
		}

		$stmts = NodeTransformer::transform($node_statement, $project, $file, $scope);

		if (!is_array($stmts)) {
			$stmts = [$stmts];
		}

		if ($inner_comments) {
			$stmts[] = new PhpParser\Node\Stmt\Nop(
				[
					'comments' => $inner_comments
				]
			);
		}

		$elseifs = $node->hasElseifClauses() ? self::transformElseifs($node->getElseifClauses(), $project, $file, $scope) : null;
		$else = null;

		if ($node->hasElseClause()) {
			$else_statement = $node->getElseClause()->getStatement();

			$inner_else_comments = [];

			if ($else_statement instanceof HHAST\CompoundStatement && $else_statement->getRightBrace()) {
				$inner_else_comments = ExpressionTransformer::getTokenComments($else_statement->getRightBrace());
			}

			if ($else_statement instanceof HHAST\IfStatement) {
				$else_stmts = [
					self::transform($else_statement, $project, $file, $scope)
				];
			} else {
				$else_stmts = $else_statement->hasStatements()
					? NodeTransformer::transform($else_statement->getStatements(), $project, $file, $scope)
					: [];
			}

			if (!is_array($else_stmts)) {
				$else_stmts = [$else_stmts];
			}

			if ($inner_else_comments) {
				$else_stmts[] = new PhpParser\Node\Stmt\Nop(
					[
						'comments' => $inner_else_comments
					]
				);
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
			],
			[
				'comments' => $token_comments,
			]
		);
	}

	private static function transformElseifs(HHAST\EditableList $node, Project $project, HackFile $file, Scope $scope) : array
	{
		return array_map(
			function(HHAST\ElseifClause $node) use ($project, $file, $scope) {
				$elseif_statement = $node->getStatement();

				$elseif_conditional = ExpressionTransformer::transform($node->getCondition(), $project, $file, $scope);
				$elseif_statements = NodeTransformer::transform($elseif_statement, $project, $file, $scope);

				$inner_elseif_comments = [];

				if ($elseif_statement instanceof HHAST\CompoundStatement && $elseif_statement->getRightBrace()) {
					$inner_elseif_comments = ExpressionTransformer::getTokenComments($elseif_statement->getRightBrace());
				}

				if (!is_array($elseif_statements)) {
					$elseif_statements = [$elseif_statements];
				}

				if ($inner_elseif_comments) {
					$elseif_statements[] = new PhpParser\Node\Stmt\Nop(
						[
							'comments' => $inner_elseif_comments
						]
					);
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