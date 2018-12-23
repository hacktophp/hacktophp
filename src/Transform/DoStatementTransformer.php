<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class DoStatementTransformer
{
	public static function transform(HHAST\DoStatement $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$expression = ExpressionTransformer::transform($node->getCondition(), $project, $file, $scope);

		$stmts = NodeTransformer::transform($node->getBody(), $project, $file, $scope);

		return new PhpParser\Node\Stmt\Do_(
			$expression,
			$stmts
		);
	}
}