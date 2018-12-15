<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use HackToPhp\HHAST\{
	ExclamationEqualToken, ExclamationEqualEqualToken, PercentToken,
	PercentEqualToken, AmpersandToken, AmpersandAmpersandToken, 
	AmpersandEqualToken, StarToken, StarStarToken, StarStarEqualToken, 
	StarEqualToken, PlusToken, PlusEqualToken, MinusToken, MinusEqualToken,
	DotToken, DotEqualToken, SlashToken, SlashEqualToken, LessThanToken,
	LessThanLessThanToken, LessThanLessThanEqualToken, LessThanEqualToken,
	LessThanEqualGreaterThanToken, LessThanGreaterThanToken, EqualToken, 
	EqualEqualToken, EqualEqualEqualToken, GreaterThanToken, 
	GreaterThanEqualToken, GreaterThanGreaterThanToken, 
	GreaterThanGreaterThanEqualToken, QuestionColonToken, 
	QuestionQuestionToken, QuestionQuestionEqualToken, CaratToken, 
	CaratEqualToken, AndToken, OrToken, XorToken, BarToken, BarEqualToken,
	BarGreaterThanToken, BarBarToken
};
use PhpParser;

class BinaryExpressionTransformer
{
	public static function transform(HHAST\BinaryExpression $node, HackFile $file) : PhpParser\Node\Expr
	{
		$operator = $node->getOperator();

		if ($operator instanceof BarGreaterThanToken) {
			return PipeTransformer::transform($node->getLeftOperand(), $node->getRightOperand(), $file);
		}
		
		$left_expr = ExpressionTransformer::transform($node->getLeftOperand(), $file);
		$right_expr = ExpressionTransformer::transform($node->getRightOperand(), $file);

		switch (get_class($operator)) {
			case ExclamationEqualToken::class:
				return new PhpParser\Node\Expr\BinaryOp\NotEqual($left_expr, $right_expr);

			case ExclamationEqualEqualToken::class:
				return new PhpParser\Node\Expr\BinaryOp\NotIdentical($left_expr, $right_expr);

			case PercentToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Mod($left_expr, $right_expr);

			case PercentEqualToken::class:
				return new PhpParser\Node\Expr\AssignOp\Mod($left_expr, $right_expr);

			case AmpersandToken::class:
				return new PhpParser\Node\Expr\BinaryOp\BitwiseAnd($left_expr, $right_expr);

			case AmpersandAmpersandToken::class:
				return new PhpParser\Node\Expr\BinaryOp\BooleanAnd($left_expr, $right_expr);

			case AmpersandEqualToken::class:
				return new PhpParser\Node\Expr\BinaryOp\BitwiseAnd($left_expr, $right_expr);

			case StarToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Mul($left_expr, $right_expr);

			case StarStarToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Pow($left_expr, $right_expr);

			case StarStarEqualToken::class:
				return new PhpParser\Node\Expr\AssignOp\Pow($left_expr, $right_expr);

			case StarEqualToken::class:
				return new PhpParser\Node\Expr\AssignOp\Mul($left_expr, $right_expr);

			case PlusToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Plus($left_expr, $right_expr);

			case PlusEqualToken::class:
				return new PhpParser\Node\Expr\AssignOp\Plus($left_expr, $right_expr);

			case MinusToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Minus($left_expr, $right_expr);

			case MinusEqualToken::class:
				return new PhpParser\Node\Expr\AssignOp\Minus($left_expr, $right_expr);
			
			case DotToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Concat($left_expr, $right_expr);

			case DotEqualToken::class:
				return new PhpParser\Node\Expr\AssignOp\Concat($left_expr, $right_expr);

			case SlashToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Div($left_expr, $right_expr);

			case SlashEqualToken::class:
				return new PhpParser\Node\Expr\AssignOp\Div($left_expr, $right_expr);

			case LessThanToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Smaller($left_expr, $right_expr);

			case LessThanLessThanToken::class:
				return new PhpParser\Node\Expr\BinaryOp\ShiftLeft($left_expr, $right_expr);

			case LessThanLessThanEqualToken::class:
				return new PhpParser\Node\Expr\AssignOp\ShiftLeft($left_expr, $right_expr);

			case LessThanEqualToken::class:
				return new PhpParser\Node\Expr\BinaryOp\SmallerOrEqual($left_expr, $right_expr);

			case LessThanEqualGreaterThanToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Spaceship($left_expr, $right_expr);

			case LessThanGreaterThanToken::class:
				return new PhpParser\Node\Expr\BinaryOp\NotIdentical($left_expr, $right_expr);

			case EqualToken::class:
				return new PhpParser\Node\Expr\Assign($left_expr, $right_expr);

			case EqualEqualToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Equal($left_expr, $right_expr);

			case EqualEqualEqualToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Identical($left_expr, $right_expr);

			case GreaterThanToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Greater($left_expr, $right_expr);

			case GreaterThanEqualToken::class:
				return new PhpParser\Node\Expr\BinaryOp\GreaterOrEqual($left_expr, $right_expr);

			case GreaterThanGreaterThanToken::class:
				return new PhpParser\Node\Expr\BinaryOp\ShiftRight($left_expr, $right_expr);

			case GreaterThanGreaterThanEqualToken::class:
				return new PhpParser\Node\Expr\AssignOp\ShiftRight($left_expr, $right_expr);

			case QuestionColonToken::class:
				return new PhpParser\Node\Expr\Ternary($left_expr, null, $right_expr);

			case QuestionQuestionToken::class:
				return new PhpParser\Node\Expr\BinaryOp\Coalesce($left_expr, $right_expr);

			case QuestionQuestionEqualToken::class:
				throw new \UnexpectedValueException('Operator not supported');

			case CaratToken::class:
				return new PhpParser\Node\Expr\BinaryOp\BitwiseXor($left_expr, $right_expr);

			case CaratEqualToken::class:
				return new PhpParser\Node\Expr\AssignOp\BitwiseXor($left_expr, $right_expr);

			case AndToken::class:
				return new PhpParser\Node\Expr\BinaryOp\LogicalAnd($left_expr, $right_expr);

			case OrToken::class:
				return new PhpParser\Node\Expr\BinaryOp\LogicalOr($left_expr, $right_expr);

			case XorToken::class:
				return new PhpParser\Node\Expr\BinaryOp\LogicalXor($left_expr, $right_expr);

			case BarToken::class:
				return new PhpParser\Node\Expr\BinaryOp\BitwiseOr($left_expr, $right_expr);

			case BarEqualToken::class:
				return new PhpParser\Node\Expr\AssignOp\BitwiseOr($left_expr, $right_expr);

			case BarBarToken::class:
				return new PhpParser\Node\Expr\BinaryOp\BooleanOr($left_expr, $right_expr);
		}
			
		throw new \UnexpectedValueException('Unrecognized binary op');
	}
}