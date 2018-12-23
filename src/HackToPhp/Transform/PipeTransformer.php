<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class PipeTransformer
{
	public static function transform(HHAST\EditableNode $left, HHAST\EditableNode $right, Project $project, HackFile $file, Scope $scope) : PhpParser\Node\Expr
	{
		$file->pipe_expr = ExpressionTransformer::transform($left, $project, $file, $scope);

		return ExpressionTransformer::transform($right, $project, $file, $scope);
	}
}