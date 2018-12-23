<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use HackToPhp\HHAST\{
	ExclamationToken, DollarToken, AmpersandToken, PlusToken,
   	PlusPlusToken, MinusToken, MinusMinusToken, AtToken, AwaitToken,
   	CloneToken, PrintToken, SuspendToken, TildeToken
};
use PhpParser;

class PrefixUnaryExpressionTransformer
{
	public static function transform(HHAST\PrefixUnaryExpression $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node\Expr
	{
		$operator = $node->getOperator();
		$expr = ExpressionTransformer::transform($node->getOperand(), $project, $file, $scope);

		switch (get_class($node->getOperator())) {
			case ExclamationToken::class:
				return new PhpParser\Node\Expr\BooleanNot($expr);

			case DollarToken::class:
				throw new \UnexpectedValueException('Unsupported dollar token');

			case PlusToken::class:
				return new PhpParser\Node\Expr\UnaryPlus($expr);

			case PlusPlusToken::class:
				return new PhpParser\Node\Expr\PreInc($expr);

			case MinusToken::class:
				return new PhpParser\Node\Expr\UnaryMinus($expr);

			case MinusMinusToken::class:
				return new PhpParser\Node\Expr\PreDec($expr);

			case AtToken::class:
				return new PhpParser\Node\Expr\ErrorSuppress($expr);

			case AwaitToken::class:
				return new PhpParser\Node\Expr\Yield_($expr);

			case CloneToken::class:
				return new PhpParser\Node\Expr\Clone_($expr);

			case PrintToken::class:
				return new PhpParser\Node\Expr\Print_($expr);

			case SuspendToken::class:
				return $expr;

			case TildeToken::class:
				return new PhpParser\Node\Expr\BitwiseNot($expr);
		}
			
		throw new \UnexpectedValueException('Unrecognized binary op ' . get_class($node->getOperator()));
	}
}