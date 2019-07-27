<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class IsExpressionTransformer
{
	public static function transform(HHAST\IsExpression $node, Project $project, HackFile $file, Scope $scope)
	{
		$right_operand = $node->getRightOperand();

		$left = ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope);
		
		if ($right_operand instanceof HHAST\GenericTypeSpecifier) {
			$specifier = $right_operand->getClassType();
		} elseif ($right_operand instanceof HHAST\DictionaryTypeSpecifier) {
			$specifier = $right_operand->getKeyword();
		} elseif ($right_operand instanceof HHAST\VectorTypeSpecifier) {
			$specifier = $right_operand->getKeyword();
		} elseif ($right_operand instanceof HHAST\KeysetTypeSpecifier) {
			$specifier = $right_operand->getKeyword();
		} else {
			if ($right_operand instanceof HHAST\ErrorSyntax) {
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_null'),
					[$left]
				);
			}
			$specifier = $right_operand->getSpecifier();
		}

		

		switch (get_class($specifier)) {
			case HHAST\StringToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_string'),
					[$left]
				);

			case HHAST\FloatToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_float'),
					[$left]
				);

			case HHAST\IntToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_int'),
					[$left]
				);

			case HHAST\NumToken::class:
				$left_assignment = new PhpParser\Node\Expr\Assign(
					new PhpParser\Node\Expr\Variable('__tmp__'),
					$left
				);

				return new PhpParser\Node\Expr\BinaryOp\BooleanOr(
					new PhpParser\Node\Expr\FuncCall(
						new PhpParser\Node\Name\FullyQualified('is_int'),
						[$left_assignment]
					),
					new PhpParser\Node\Expr\FuncCall(
						new PhpParser\Node\Name\FullyQualified('is_float'),
						[new PhpParser\Node\Expr\Variable('__tmp__')]
					)
				);

			case HHAST\ArraykeyToken::class:
			case HHAST\ArrayToken::class:
			case HHAST\DictToken::class:
			case HHAST\VecToken::class:
			case HHAST\KeysetToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_array'),
					[$left]
				);

			case HHAST\BoolToken::class:
			case HHAST\BooleanToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_bool'),
					[$left]
				);

			case HHAST\ObjectToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_object'),
					[$left]
				);

			case HHAST\ResourceToken::class:
				return new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_resource'),
					[$left]
				);

			case HHAST\NameToken::class:
				if ($specifier->getText() === 'nonnull') {
					return new PhpParser\Node\Expr\BinaryOp\NotIdentical(
						$left,
						new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name('null'))
					);
				}

				return new PhpParser\Node\Expr\Instanceof_(
					$left,
					new PhpParser\Node\Name($specifier->getText())
				);

			case HHAST\QualifiedName::class:
				return new PhpParser\Node\Expr\Instanceof_(
					$left,
					QualifiedNameTransformer::transform($specifier)
				);
		}

		throw new \UnexpectedValueException('Unknown is-expression type ' . get_class($specifier));
	}
}