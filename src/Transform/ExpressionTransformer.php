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
	XHPExpression, YieldExpression, YieldFromExpression
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
				$node->hasIndex() ? self::transform($node->getIndex(), $file) : null
			);
		}

		if ($node instanceof LiteralExpression) {
			$literal = $node->getExpression();

			switch (get_class($literal)) {
				case HHAST\SingleQuotedStringLiteralToken::class:
				case HHAST\DoubleQuotedStringLiteralToken::class:
					return new PhpParser\Node\Scalar\String_(
						str_replace(['\\\\', '\\\''], ['\\', '\''], substr($literal->getText(), 1, -1))
					);

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

		if ($node instanceof HHAST\IsExpression) {
			return IsExpressionTransformer::transform($node, $file);
		}

		if ($node instanceof NameToken) {
			return new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name($node->getText()));
		}

		if ($node instanceof QualifiedName) {
			$name = QualifiedNameTransformer::transform($node);

			return new PhpParser\Node\Expr\ConstFetch($name);
		}

		if ($node instanceof MemberSelectionExpression) {
			return new PhpParser\Node\Expr\PropertyFetch(
				ExpressionTransformer::transform($node->getObject(), $file),
				self::transformVariableName($node->getName(), $file)
			);
		}

		if ($node instanceof HHAST\ShapeExpression) {
			$fields = $node->getFields()->getChildren();

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($field->getValue(), $file),
					ExpressionTransformer::transform($field->getName(), $file)
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items
			);
		}

		if ($node instanceof HHAST\VectorIntrinsicExpression) {
			$fields = $node->hasMembers() ? $node->getMembers()->getChildren() : [];

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($field, $file)
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items
			);
		}

		if ($node instanceof HHAST\KeysetIntrinsicExpression) {
			$fields = $node->hasMembers() ? $node->getMembers()->getChildren() : [];

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($field, $file),
					ExpressionTransformer::transform($field, $file)
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items
			);
		}

		if ($node instanceof HHAST\DictionaryIntrinsicExpression) {
			$fields = $node->hasMembers() ? $node->getMembers()->getChildren() : [];

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($field->getValue(), $file),
					ExpressionTransformer::transform($field->getKey(), $file)
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items
			);
		}

		if ($node instanceof HHAST\ElementInitializer) {
			$fields = $node->hasMembers() ? $node->getMembers()->getChildren() : [];

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($field, $file)
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items
			);
		}

		if ($node instanceof LambdaExpression) {
			return LambdaExpressionTransformer::transform($node, $file);
		}

		if ($node instanceof ConditionalExpression) {
			return new PhpParser\Node\Expr\Ternary(
				ExpressionTransformer::transform($node->getTest(), $file),
				$node->hasConsequence() ? ExpressionTransformer::transform($node->getConsequence(), $file) : null,
				ExpressionTransformer::transform($node->getAlternative(), $file)
			);
		}

		if ($node instanceof ScopeResolutionExpression) {
			return new PhpParser\Node\Expr\ClassConstFetch(
				self::transformVariableName($node->getQualifier(), $file),
				self::transformVariableName($node->getName(), $file)
			);
		}

		if ($node instanceof ObjectCreationExpression) {
			$object = $node->getObject();

			$args = FunctionCallExpressionTransformer::transformArguments($object->getArgumentList(), $file);

			switch (get_class($object)) {
				case HHAST\AnonymousClass::class:
					$class = new PhpParser\Stmt\Class_();
					break;

				case HHAST\ConstructorCall::class:
					if ($object->getType() instanceof VariableExpression) {
						$class = self::transform($object->getType(), $file);
					} else {
						$class_type = TypeTransformer::transform($object->getType(), $file);
						$psalm_type = array_values(\Psalm\Type::parseString($class_type)->getTypes())[0];
						$class = TypeTransformer::getPhpParserTypeFromAtomicPsalm($psalm_type, $file);

						if (!$class instanceof PhpParser\Node\Name) {
							throw new \UnexpectedValueException('Unexpected new class ' . $class);
						}
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

		if ($node instanceof CastExpression) {
			$expression = self::transform($node->getOperand(), $file);
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

		if ($node instanceof HHAST\ListItem) {
			return self::transform($node->getItem(), $file);
		}

		if ($node instanceof HHAST\SimpleInitializer) {
			return self::transform($node->getValue(), $file);
		}

		if ($node instanceof HHAST\PipeVariableExpression) {
			if (!$file->pipe_expr) {
				throw new \UnexpectedValueException('No pipe expression to replace');
			}

			return $file->pipe_expr;
		}

		if ($node instanceof PrefixUnaryExpression) {
			return PrefixUnaryExpressionTransformer::transform($node, $file);
		}

		throw new \UnexpectedValueException('Unknown expression type ' . get_class($node));
	}

	public static function transformVariableName(HHAST\EditableNode $node, HackFile $file) : PhpParser\Node
	{
		if ($node instanceof NameToken) {
			return new PhpParser\Node\Identifier($node->getText());
		}

		if ($node instanceof QualifiedName) {
			return QualifiedNameTransformer::transform($node);
		}

		if ($node instanceof HHAST\VariableToken) {
			return new PhpParser\Node\Expr\Variable(substr($node->getText(), 1));
		}

		if ($node instanceof HHAST\ClassToken) {
			return new PhpParser\Node\Identifier($node->getText());
		}
	}
}