<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class ForStatementTransformer
{
	public static function transform(HHAST\ForStatement $node, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$init = self::transformExpressions($node->getInitializer(), $file, $scope);
		$cond = self::transformExpressions($node->getControl(), $file, $scope);
		$loop = self::transformExpressions($node->getEndOfLoop(), $file, $scope);

		$stmts = NodeTransformer::transform($node->getBody(), $file, $scope);

		return new PhpParser\Node\Stmt\For_(
			[
				'init' => $init,
				'cond' => $cond,
				'loop' => $loop,
				'stmts' => $stmts
			]
		);
	}

	private static function transformExpressions(?HHAST\EditableList $node, HackFile $file, Scope $scope) : array
	{
		if (!$node) {
			return [];
		}

		return array_map(
			function(HHAST\ListItem $node) use ($file, $scope) {
				return ExpressionTransformer::transform($node->getItem(), $file, $scope);
			},
			$node->getChildren()
		);
	}
}