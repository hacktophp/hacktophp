<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class AsExpressionTransformer
{
	/**
	 * @param  HHAST\AsExpression|HHAST\NullableAsExpression   $node
	 */
	public static function transform($node, Project $project, HackFile $file, Scope $scope)
	{
		$right_operand = $node->getRightOperand();
		
		if ($right_operand instanceof HHAST\GenericTypeSpecifier) {
			$specifier = $right_operand->getClassType();
		} elseif ($right_operand instanceof HHAST\DictionaryTypeSpecifier) {
			$specifier = $right_operand->getKeyword();
		} elseif ($right_operand instanceof HHAST\VectorTypeSpecifier) {
			$specifier = $right_operand->getKeyword();
		} elseif ($right_operand instanceof HHAST\KeysetTypeSpecifier) {
			$specifier = $right_operand->getKeyword();
		} elseif ($right_operand instanceof HHAST\TupleTypeSpecifier) {
			$specifier = $right_operand;
		} else {
			$specifier = $right_operand->getSpecifier();
		}

		$left = ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope);
		$right = TypeTransformer::transform($node->getRightOperand(), $project, $file, $scope);

		switch (get_class($specifier)) {
			case HHAST\StringToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_string'),
					[ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope)]
				);
				break;

			case HHAST\FloatToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_float'),
					[ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope)]
				);
				break;

			case HHAST\IntToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_int'),
					[ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope)]
				);
				break;

			case HHAST\ArrayToken::class:
			case HHAST\DictToken::class:
			case HHAST\VecToken::class:
			case HHAST\KeysetToken::class:
			case HHAST\TupleTypeSpecifier::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_array'),
					[ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope)]
				);
				break;

			case HHAST\BoolToken::class:
			case HHAST\BooleanToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_bool'),
					[ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope)]
				);
				break;

			case HHAST\ObjectToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_object'),
					[ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope)]
				);
				break;

			case HHAST\ResourceToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_resource'),
					[ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope)]
				);
				break;

			case HHAST\NameToken::class:
				if ($specifier->getText() === 'nonnull') {
					$conditional = new PhpParser\Node\Expr\BinaryOp\NotIdentical(
						ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope),
						new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name('null'))
					);
				} else {
					$conditional = new PhpParser\Node\Expr\Instanceof_(
						ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope),
						new PhpParser\Node\Name($specifier->getText())
					);
				}
				break;
				
			case HHAST\QualifiedName::class:
				$conditional = new PhpParser\Node\Expr\Instanceof_(
					ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope),
					QualifiedNameTransformer::transform($specifier)
				);
				break;

			case HHAST\ThisToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_a'),
					[
						ExpressionTransformer::transform($node->getLeftOperandUNTYPED(), $project, $file, $scope),
						new PhpParser\Node\Expr\FuncCall(
							new PhpParser\Node\Name\FullyQualified('get_class'),
							[new PhpParser\Node\Expr\Variable('this')]
						)
					]
				);
				break;

			default:
				throw new \UnexpectedValueException('Unknown as-expression type ' . get_class($specifier));
		}

		$bad_result = $node instanceof HHAST\AsExpression
			? new PhpParser\Node\Expr\FuncCall(
				new PhpParser\Node\Expr\Closure([
					'stmts' => [
						new PhpParser\Node\Stmt\Throw_(
							new PhpParser\Node\Expr\New_(
								new PhpParser\Node\Name\FullyQualified('TypeError'),
								[
									new PhpParser\Node\Arg(
										new PhpParser\Node\Scalar\String_(
											'Failed assertion'
										)
									)
								]
							)
						)
					]
				])
			)
			: new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name('null'));

		return new PhpParser\Node\Expr\Ternary(
			$conditional,
			$left,
			$bad_result
		);
	}
}