<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use HackToPhp\HHAST\{
	AnonymousFunction, AsExpression, BinaryExpression,
	CastExpression, CollectionLiteralExpression, ConditionalExpression,
	DarrayIntrinsicExpression, DefineExpression,
	DictionaryIntrinsicExpression, EmptyExpression, EvalExpression,
	FunctionCallExpression, FunctionCallWithTypeArgumentsExpression,
	HaltCompilerExpression, InclusionExpression, InstanceofExpression,
	IssetExpression, LambdaExpression, LiteralExpression,
	MemberSelectionExpression, ObjectCreationExpression, ParenthesizedExpression,
	PostfixUnaryExpression, PrefixUnaryExpression, QualifiedName,
	SafeMemberSelectionExpression, ScopeResolutionExpression,
	SubscriptExpression, RightParenToken, CommaToken, ColonToken,
	EqualEqualEqualToken, EqualGreaterThanToken, ConstToken, NameToken,
	UseToken, RightBraceToken, VariableExpression, VarrayIntrinsicExpression,
	XHPExpression, YieldExpression, YieldFromExpression,
	IsExpression
};
use PhpParser;

class ExpressionTransformer
{
	public static function transformStatement(HHAST\ExpressionStatement $node, HackFile $file) : PhpParser\Node
	{
		return new PhpParser\Node\Stmt\Expression(self::transform($node->getExpressionx(), $file));
	}

	/** 
	 * @param AnonymousFunction | AsExpression | BinaryExpression |
	 * CastExpression | CollectionLiteralExpression | ConditionalExpression |
	 * DarrayIntrinsicExpression | DefineExpression |
	 * DictionaryIntrinsicExpression | EmptyExpression | EvalExpression |
	 * FunctionCallExpression | FunctionCallWithTypeArgumentsExpression |
	 * HaltCompilerExpression | InclusionExpression | InstanceofExpression |
	 * IssetExpression | LambdaExpression | LiteralExpression |
	 * MemberSelectionExpression | ObjectCreationExpression |
	 * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
	 * QualifiedName | SafeMemberSelectionExpression | ScopeResolutionExpression
	 * | SubscriptExpression | RightParenToken | CommaToken | ColonToken |
	 * EqualEqualEqualToken | EqualGreaterThanToken | ConstToken | NameToken |
	 * UseToken | RightBraceToken | VariableExpression |
	 * VarrayIntrinsicExpression | XHPExpression | YieldExpression |
	 * YieldFromExpression $node 
	 */
	public static function transform(HHAST\EditableNode $node, HackFile $file) : PhpParser\Node\Expr
	{
		if ($node instanceof ParenthesizedExpression) {
			return ExpressionTransformer::transform($node->getExpression(), $file);
		}

		if ($node instanceof BinaryExpression) {
			return BinaryExpressionTransformer::transform($node, $file);
		}

		if ($node instanceof VariableExpression) {
			$expr = $node->getExpression();

			if ($expr instanceof HHAST\VariableToken) {
				return new PhpParser\Node\Expr\Variable(substr($expr->getText(), 1));
			}

			return new PhpParser\Node\Expr\Variable(self::transform($expr, $file));
		}

		if ($node instanceof SubscriptExpression) {
			return new PhpParser\Node\Expr\ArrayDimFetch(
				self::transform($node->getReceiver(), $file),
				self::transform($node->getIndex(), $file)
			);
		}

		if ($node instanceof LiteralExpression) {
			$literal = $node->getExpression();

			switch (get_class($literal)) {
				case HHAST\SingleQuotedStringLiteralToken::class:
				case HHAST\DoubleQuotedStringLiteralToken::class:
					return new PhpParser\Node\Scalar\String_(substr($literal->getText(), 1, -1));

				case HHAST\NullLiteralToken::class:
				case HHAST\BooleanLiteralToken::class:
					return new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name($literal->getText()));

				case HHAST\DecimalLiteralToken::class:
					$value = $literal->getText();
					
					if (!strpos($value, '.')) {
						return new PhpParser\Node\Scalar\LNumber((int) $value);
					}

					return new PhpParser\Node\Scalar\DNumber((float) $value);
			}

			throw new \UnexpectedValueException('Unknown literal expression ' . get_class($literal));
		}

		if ($node instanceof IsExpression) {
			return IsExpressionTransformer::transform($node, $file);
		}

		if ($node instanceof NameToken) {
			return new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name($node->getText()));
		}

		if ($node instanceof QualifiedName) {
			$name = QualifiedNameTransformer::transform($node);

			return new PhpParser\Node\Expr\ConstFetch($name);
		}

		if ($node instanceof ObjectCreationExpression) {
			$object = $node->getObject();

			$args = FunctionCallExpressionTransformer::transformArguments($object->getArgumentList(), $file);

			switch (get_class($object)) {
				case HHAST\AnonymousClass::class:
					$class = new PhpParser\Stmt\Class_();
					break;

				case HHAST\ConstructorCall::class:
					$class_type = TypeTransformer::transform($object->getType(), $file);
					$psalm_type = array_values(\Psalm\Type::parseString($class_type)->getTypes())[0];
					$class = TypeTransformer::getPhpParserTypeFromAtomicPsalm($psalm_type, $file);

					if (!$class instanceof PhpParser\Node\Name) {
						throw new \UnexpectedValueException('Unexpected new class ' . $class);
					}

					break;
			}

			return new PhpParser\Node\Expr\New_(
				$class,
				$args
			);
		}

		if ($node instanceof FunctionCallExpression) {
			return FunctionCallExpressionTransformer::transform($node, $file);
		}

		if ($node instanceof HHAST\ListItem) {
			return self::transform($node->getItem(), $file);
		}

		if ($node instanceof PrefixUnaryExpression) {
			return PrefixUnaryExpressionTransformer::transform($node, $file);
		}

		throw new \UnexpectedValueException('Unknown expression type ' . get_class($node));
	}

	public static function transformVariableName(HHAST\EditableNode $node, HackFile $file)
	{
		if ($node instanceof NameToken) {
			return new PhpParser\Node\Identifier($node->getText());
		}

		if ($node instanceof QualifiedName) {
			return QualifiedNameTransformer::transform($node);
		}

		if ($node instanceof HHAST\VariableToken) {
			return new PhpParser\Node\Expr\Variable($node->getText());
		}
	}
}