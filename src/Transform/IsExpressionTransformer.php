<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class IsExpressionTransformer
{
	public static function transform(HHAST\IsExpression $node, HackFile $file)
	{
		$specifier = $node->getRightOperand()->getSpecifier();

		switch (get_class($specifier)) {
			case HHAST\StringToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_string'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $file)]
				);

			case HHAST\FloatToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_float'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $file)]
				);

			case HHAST\IntToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_int'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $file)]
				);

			case HHAST\ArrayToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_array'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $file)]
				);

			case HHAST\BoolToken::class:
			case HHAST\BooleanToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_bool'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $file)]
				);

			case HHAST\ObjectToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_object'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $file)]
				);
		}

		throw new \UnexpectedValueException('Unknown is-expression type ' . get_class($specifier));
	}
}