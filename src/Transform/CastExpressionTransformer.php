<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class CastExpressionTransformer
{
	public static function transform(HHAST\CastExpression $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node\Expr
	{
		$expression = ExpressionTransformer::transform($node->getOperand(), $project, $file, $scope);
		$type = $node->getType();

		switch (get_class($type)) {
			case HHAST\ArrayToken::class:
				return new PhpParser\Node\Expr\Cast\Array_($expression);

			case HHAST\BoolToken::class:
			case HHAST\BooleanToken::class:
				return new PhpParser\Node\Expr\Cast\Bool_($expression);

			case HHAST\IntToken::class:
			case HHAST\IntegerToken::class:
				return new PhpParser\Node\Expr\Cast\Int_($expression);

			case HHAST\DoubleToken::class:
			case HHAST\FloatToken::class:
				return new PhpParser\Node\Expr\Cast\Double($expression);

			case HHAST\FloatToken::class:
				return new PhpParser\Node\Expr\Cast\Float_($expression);

			case HHAST\ObjectToken::class:
				return new PhpParser\Node\Expr\Cast\Object_($expression);

			case HHAST\StringToken::class:
				return new PhpParser\Node\Expr\Cast\String_($expression);

			case HHAST\UnsetToken::class:
				return new PhpParser\Node\Expr\Cast\Unset_($expression);
		}
		
		throw new \UnexpectedValueException('Unrecognised cast ' . get_class($node->getType()));
	}
}