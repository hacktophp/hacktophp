<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class PipeTransformer
{
	public static function transform(HHAST\EditableNode $left, HHAST\EditableNode $right, HackFile $file) : PhpParser\Node\Expr
	{
		$file->pipe_expr = ExpressionTransformer::transform($left, $file);

		return ExpressionTransformer::transform($right, $file);;
	}
}