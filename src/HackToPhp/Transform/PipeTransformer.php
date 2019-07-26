<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class PipeTransformer
{
	public static function transform(HHAST\Node $left, HHAST\Node $right, Project $project, HackFile $file, Scope $scope) : PhpParser\Node\Expr
	{
		$scope->pipe_expr = ExpressionTransformer::transform($left, $project, $file, $scope);

		return ExpressionTransformer::transform($right, $project, $file, $scope);
	}
}