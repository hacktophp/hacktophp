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

		$is_nullable = false;

		if ($right_operand instanceof HHAST\NullableTypeSpecifier) {
			$right_operand = $right_operand->getType();
			$is_nullable = true;
		}
		
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

		$left_assignment = new PhpParser\Node\Expr\Assign(
			new PhpParser\Node\Expr\Variable('__tmp__'),
			$left
		);

		switch (get_class($specifier)) {
			case HHAST\StringToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_string'),
					[$left_assignment]
				);
				break;

			case HHAST\FloatToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_float'),
					[$left_assignment]
				);
				break;

			case HHAST\IntToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_int'),
					[$left_assignment]
				);
				break;

			case HHAST\ArrayToken::class:
			case HHAST\DictToken::class:
			case HHAST\VecToken::class:
			case HHAST\KeysetToken::class:
			case HHAST\TupleTypeSpecifier::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_array'),
					[$left_assignment]
				);
				break;

			case HHAST\BoolToken::class:
			case HHAST\BooleanToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_bool'),
					[$left_assignment]
				);
				break;

			case HHAST\ObjectToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_object'),
					[$left_assignment]
				);
				break;

			case HHAST\ResourceToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_resource'),
					[$left_assignment]
				);
				break;

			case HHAST\NameToken::class:
				if ($specifier->getText() === 'nonnull') {
					$conditional = new PhpParser\Node\Expr\BinaryOp\NotIdentical(
						$left_assignment,
						new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name('null'))
					);
				} else {
					$conditional = new PhpParser\Node\Expr\Instanceof_(
						$left_assignment,
						new PhpParser\Node\Name($specifier->getText())
					);
				}
				break;
				
			case HHAST\QualifiedName::class:
				$conditional = new PhpParser\Node\Expr\Instanceof_(
					$left_assignment,
					QualifiedNameTransformer::transform($specifier)
				);
				break;

			case HHAST\ThisToken::class:
				$conditional = new PhpParser\Node\Expr\FuncCall(
					new PhpParser\Node\Name\FullyQualified('is_a'),
					[
						$left_assignment,
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

		if ($is_nullable) {
			$conditional = new PhpParser\Node\Expr\BinaryOp\BooleanOr(
				$conditional,
				new PhpParser\Node\Expr\BinaryOp\Identical(
					new PhpParser\Node\Expr\Variable('__tmp__'),
					new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name('null'))
				)
			);
		}

		return new PhpParser\Node\Expr\Ternary(
			$conditional,
			new PhpParser\Node\Expr\Variable('__tmp__'),
			$bad_result
		);
	}
}