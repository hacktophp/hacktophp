<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class WhileStatementTransformer
{
	public static function transform(HHAST\WhileStatement $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$expression = ExpressionTransformer::transform($node->getCondition(), $project, $file, $scope);

		$stmts = NodeTransformer::transform($node->getBody(), $project, $file, $scope);

		if (!is_array($stmts)) {
			$stmts = [$stmts];
		}

		return new PhpParser\Node\Stmt\While_(
			$expression,
			$stmts
		);
	}
}