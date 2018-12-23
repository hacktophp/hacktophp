<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class ForStatementTransformer
{
	public static function transform(HHAST\ForStatement $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$init = self::transformExpressions($node->getInitializer(), $project, $file, $scope);
		$cond = self::transformExpressions($node->getControl(), $project, $file, $scope);
		$loop = self::transformExpressions($node->getEndOfLoop(), $project, $file, $scope);

		$stmts = NodeTransformer::transform($node->getBody(), $project, $file, $scope);

		return new PhpParser\Node\Stmt\For_(
			[
				'init' => $init,
				'cond' => $cond,
				'loop' => $loop,
				'stmts' => $stmts
			]
		);
	}

	private static function transformExpressions(?HHAST\EditableList $node, Project $project, HackFile $file, Scope $scope) : array
	{
		if (!$node) {
			return [];
		}

		return array_map(
			function(HHAST\ListItem $node) use ($project, $file, $scope) {
				return ExpressionTransformer::transform($node->getItem(), $project, $file, $scope);
			},
			$node->getChildren()
		);
	}
}