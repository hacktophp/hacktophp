<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class IsExpressionTransformer
{
	public static function transform(HHAST\IsExpression $node, Project $project, HackFile $file, Scope $scope)
	{
		$right_operand = $node->getRightOperand();
		
		if ($right_operand instanceof HHAST\GenericTypeSpecifier) {
			$specifier = $right_operand->getClassType();
		} else {
			$specifier = $right_operand->getSpecifier();
		}

		switch (get_class($specifier)) {
			case HHAST\StringToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_string'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $project, $file, $scope)]
				);

			case HHAST\FloatToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_float'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $project, $file, $scope)]
				);

			case HHAST\IntToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_int'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $project, $file, $scope)]
				);

			case HHAST\ArrayToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_array'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $project, $file, $scope)]
				);

			case HHAST\BoolToken::class:
			case HHAST\BooleanToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_bool'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $project, $file, $scope)]
				);

			case HHAST\ObjectToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_object'),
					[ExpressionTransformer::transform($node->getLeftOperand(), $project, $file, $scope)]
				);

			case HHAST\NameToken::class:
				if ($specifier->getText() === 'nonnull') {
					return new PhpParser\Node\Expr\BinaryOp\NotIdentical(
						ExpressionTransformer::transform($node->getLeftOperand(), $project, $file, $scope),
						new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name('null'))
					);
				}

				return new PhpParser\Node\Expr\Instanceof_(
					ExpressionTransformer::transform($node->getLeftOperand(), $project, $file, $scope),
					new PhpParser\Node\Name($specifier->getText())
				);

			case HHAST\QualifiedName::class:
				return new PhpParser\Node\Expr\Instanceof_(
					ExpressionTransformer::transform($node->getLeftOperand(), $project, $file, $scope),
					QualifiedNameTransformer::transform($specifier)
				);
		}

		throw new \UnexpectedValueException('Unknown is-expression type ' . get_class($specifier));
	}
}