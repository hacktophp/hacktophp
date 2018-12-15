<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class IsExpressionTransformer
{
	public static function transform(HHAST\IsExpression $node, HackFile $file, Scope $scope)
	{
		$specifier = $node->getRightOperand()->getSpecifier();

		switch (get_class($specifier)) {
			case HHAST\StringToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_string'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $file, $scope)]
				);

			case HHAST\FloatToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_float'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $file, $scope)]
				);

			case HHAST\IntToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_int'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $file, $scope)]
				);

			case HHAST\ArrayToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_array'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $file, $scope)]
				);

			case HHAST\BoolToken::class:
			case HHAST\BooleanToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_bool'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $file, $scope)]
				);

			case HHAST\ObjectToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_object'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $file, $scope)]
				);
		}

		throw new \UnexpectedValueException('Unknown is-expression type ' . get_class($specifier));
	}
}