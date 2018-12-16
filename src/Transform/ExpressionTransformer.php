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
	public static function transformStatement(HHAST\ExpressionStatement $node, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$inner_expression = $node->getExpression();

		if ($inner_expression instanceof HHAST\NameToken) {
			$name_string = $inner_expression->getText();

			if ($name_string === 'exit') {
				return new PhpParser\Node\Stmt\Expression(
					new PhpParser\Node\Expr\Exit_(
				    	isset($args[0]) ? $args[0]->value : null,
				    	['kind' => PhpParser\Node\Expr\Exit_::KIND_EXIT]
					)
				);
			}

			if ($name_string === 'die') {
				return new PhpParser\Node\Stmt\Expression(
					new PhpParser\Node\Expr\Exit_(
				    	isset($args[0]) ? $args[0]->value : null,
				    	['kind' => PhpParser\Node\Expr\Exit_::KIND_DIE]
					)
				);
			}

			throw new \UnexpectedValueException('Unrecognised expression statement token');
		}

		return new PhpParser\Node\Stmt\Expression(self::transform($inner_expression, $file, $scope));
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
	public static function transform(HHAST\EditableNode $node, HackFile $file, Scope $scope) : PhpParser\Node\Expr
	{
		if ($node instanceof ParenthesizedExpression) {
			return ExpressionTransformer::transform($node->getExpression(), $file, $scope);
		}

		if ($node instanceof BinaryExpression) {
			return BinaryExpressionTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof VariableExpression) {
			$expr = $node->getExpression();

			if ($expr instanceof HHAST\VariableToken) {
				$scope->referenced_vars[$expr->getText()] = $expr->getText();

				return new PhpParser\Node\Expr\Variable(substr($expr->getText(), 1));
			}

			return new PhpParser\Node\Expr\Variable(self::transform($expr, $file, $scope));
		}

		if ($node instanceof SubscriptExpression || $node instanceof HHAST\EmbeddedSubscriptExpression) {
			return new PhpParser\Node\Expr\ArrayDimFetch(
				self::transform($node->getReceiver(), $file, $scope),
				$node->hasIndex() ? self::transform($node->getIndex(), $file, $scope) : null
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

				case HHAST\ExecutionStringLiteralToken::class:
					return new PhpParser\Node\Expr\ShellExec([
						new PhpParser\Node\Scalar\EncapsedStringPart(
							substr($literal->getText(), 1, -1)
						)
					]);

				case HHAST\EditableList::class:
					$children = $literal->getChildren();
					$first_child = $children[0];

					if ($first_child instanceof HHAST\ExecutionStringLiteralHeadToken) {
						return new PhpParser\Node\Expr\ShellExec(
							array_map(
								function($item) use ($file, $scope) {
									if ($item instanceof HHAST\ExecutionStringLiteralHeadToken) {
										return new PhpParser\Node\Scalar\EncapsedStringPart(
											str_replace(['\\\\', '\\\''], ['\\', '\''], substr($item->getText(), 1))
										);
									}

									if ($item instanceof HHAST\ExecutionStringLiteralTailToken) {
										return new PhpParser\Node\Scalar\EncapsedStringPart(
											str_replace(['\\\\', '\\\''], ['\\', '\''], substr($item->getText(), 0, -1))
										);
									}

									return self::transform($item, $file, $scope);
								},
								$literal->getChildren()
							)
						);
					}

					return new PhpParser\Node\Scalar\Encapsed(
						array_map(
							function($item) use ($file, $scope) {
								if ($item instanceof HHAST\DoubleQuotedStringLiteralHeadToken) {
									return new PhpParser\Node\Scalar\EncapsedStringPart(
										str_replace(['\\\\', '\\\''], ['\\', '\''], substr($item->getText(), 1))
									);
								}

								if ($item instanceof HHAST\DoubleQuotedStringLiteralTailToken) {
									return new PhpParser\Node\Scalar\EncapsedStringPart(
										str_replace(['\\\\', '\\\''], ['\\', '\''], substr($item->getText(), 0, -1))
									);
								}

								return self::transform($item, $file, $scope);
							},
							$literal->getChildren()
						)
					);
			}

			throw new \UnexpectedValueException('Unknown literal expression ' . get_class($literal));
		}

		if ($node instanceof HHAST\IsExpression) {
			return IsExpressionTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof NameToken) {
			return new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name($node->getText()));
		}

		if ($node instanceof QualifiedName) {
			$name = QualifiedNameTransformer::transform($node);

			return new PhpParser\Node\Expr\ConstFetch($name);
		}

		if ($node instanceof MemberSelectionExpression
			|| $node instanceof HHAST\EmbeddedMemberSelectionExpression
		) {
			return new PhpParser\Node\Expr\PropertyFetch(
				ExpressionTransformer::transform($node->getObject(), $file, $scope),
				self::transformVariableName($node->getName(), $file, $scope)
			);
		}

		if ($node instanceof HHAST\ShapeExpression) {
			$fields = $node->getFields()->getChildren();

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($field->getValue(), $file, $scope),
					ExpressionTransformer::transform($field->getName(), $file, $scope)
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
					ExpressionTransformer::transform($field, $file, $scope)
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
					ExpressionTransformer::transform($field, $file, $scope),
					ExpressionTransformer::transform($field, $file, $scope)
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
					ExpressionTransformer::transform($field->getValue(), $file, $scope),
					ExpressionTransformer::transform($field->getKey(), $file, $scope)
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items
			);
		}

		if ($node instanceof HHAST\ArrayCreationExpression) {
			$fields = $node->hasMembers() ? $node->getMembers()->getChildren() : [];

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$value = $field instanceof HHAST\ElementInitializer ? $field->getValue() : $field;
				$key = $field instanceof HHAST\ElementInitializer ? $field->getKey() : null;
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($value, $file, $scope),
					$key ? ExpressionTransformer::transform($key, $file, $scope) : null
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items
			);
		}

		if ($node instanceof LambdaExpression) {
			return LambdaExpressionTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof AnonymousFunction) {
			return AnonymousFunctionTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof EmptyExpression) {
			return new PhpParser\Node\Expr\Empty_(
				self::transform($node->getArgument(), $file, $scope)
			);
		}

		if ($node instanceof IssetExpression) {
			$vars = array_map(
				function (HHAST\ListItem $node) use ($file, $scope) {
					$node = $node->getItem();
					return ExpressionTransformer::transform($node, $file, $scope);
				},
				$node->getArgumentList()->getChildren()
			);

			return new PhpParser\Node\Expr\Isset_(
				$vars
			);
		}

		if ($node instanceof ConditionalExpression) {
			return new PhpParser\Node\Expr\Ternary(
				ExpressionTransformer::transform($node->getTest(), $file, $scope),
				$node->hasConsequence() ? ExpressionTransformer::transform($node->getConsequence(), $file, $scope) : null,
				ExpressionTransformer::transform($node->getAlternative(), $file, $scope)
			);
		}

		if ($node instanceof ScopeResolutionExpression) {
			return new PhpParser\Node\Expr\ClassConstFetch(
				self::transformVariableName($node->getQualifier(), $file, $scope),
				self::transformVariableName($node->getName(), $file, $scope)
			);
		}

		if ($node instanceof ObjectCreationExpression) {
			$object = $node->getObject();

			$args = FunctionCallExpressionTransformer::transformArguments($object->getArgumentList(), $file, $scope);

			switch (get_class($object)) {
				case HHAST\AnonymousClass::class:
					$class = new PhpParser\Stmt\Class_();
					break;

				case HHAST\ConstructorCall::class:
					if ($object->getType() instanceof VariableExpression) {
						$class = self::transform($object->getType(), $file, $scope);
					} else {
						$class_type = TypeTransformer::transform($object->getType(), $file, $scope);
						$psalm_type = array_values(\Psalm\Type::parseString($class_type)->getTypes())[0];
						$class = TypeTransformer::getPhpParserTypeFromAtomicPsalm($psalm_type, $file, $scope);

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
			return FunctionCallExpressionTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof CastExpression) {
			$expression = self::transform($node->getOperand(), $file, $scope);
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
			return self::transform($node->getItem(), $file, $scope);
		}

		if ($node instanceof HHAST\ListExpression) {
			$fields = $node->hasMembers() ? $node->getMembers()->getChildren() : [];

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$value = $field instanceof HHAST\ElementInitializer ? $field->getValue() : $field;

				if (!$value) {
					$array_items[] = null;
					continue;
				}

				$key = $field instanceof HHAST\ElementInitializer ? $field->getKey() : null;
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($value, $file, $scope),
					$key ? ExpressionTransformer::transform($key, $file, $scope) : null
				);
			}

			return new PhpParser\Node\Expr\List_(
				$array_items
			);
		}

		if ($node instanceof HHAST\SimpleInitializer) {
			return self::transform($node->getValue(), $file, $scope);
		}

		if ($node instanceof HHAST\YieldExpression) {
			$operand = $node->getOperand();

			if ($operand instanceof HHAST\ElementInitializer) {
				return new PhpParser\Node\Expr\Yield_(
					self::transform($operand->getValue(), $file, $scope),
					self::transform($operand->getKey(), $file, $scope)
				);
			}

			return new PhpParser\Node\Expr\Yield_(
				self::transform($operand, $file, $scope)
			);
		}

		if ($node instanceof HHAST\YieldFromExpression) {
			$operand = $node->getOperand();

			return new PhpParser\Node\Expr\YieldFrom(
				self::transform($operand, $file, $scope)
			);
		}

		if ($node instanceof HHAST\EvalExpression) {
			return new PhpParser\Node\Expr\Eval_(
				self::transform($node->getArgument(), $file, $scope)
			);
		}

		if ($node instanceof HHAST\InstanceofExpression) {
			$left_operand = self::transform($node->getLeftOperand(), $file, $scope);
			$right_operand = self::transform($node->getLeftOperand(), $file, $scope);

			return new PhpParser\Node\Expr\Instanceof_(
				$left_operand,
				$right_operand
			);
		}

		if ($node instanceof HHAST\InclusionExpression) {
			return new PhpParser\Node\Expr\Include_(
				self::transform($node->getFilename(), $file, $scope),
				PhpParser\Node\Expr\Include_::TYPE_INCLUDE
			);
		}

		if ($node instanceof HHAST\PipeVariableExpression) {
			if (!$file->pipe_expr) {
				throw new \UnexpectedValueException('No pipe expression to replace');
			}

			return $file->pipe_expr;
		}

		if ($node instanceof PrefixUnaryExpression) {
			return PrefixUnaryExpressionTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof PostfixUnaryExpression) {
			$expr = self::transform($node->getOperand(), $file, $scope);

			switch (get_class($node->getOperator())) {
				case HHAST\PlusPlusToken::class:
					return new PhpParser\Node\Expr\PostInc($expr);

				case HHAST\MinusMinusToken::class:
					return new PhpParser\Node\Expr\PostDec($expr);
			}
		}

		throw new \UnexpectedValueException('Unknown expression type ' . get_class($node));
	}

	public static function transformVariableName(HHAST\EditableNode $node, HackFile $file, Scope $scope) : PhpParser\Node
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

	public static function getTokenComments(HHAST\EditableToken $token) : array
	{
		$comment_nodes = $token->hasLeading()
			? array_merge(
				$token->getLeading()->getChildrenOfType(HHAST\SingleLineComment::class),
				$token->getLeading()->getChildrenOfType(HHAST\DelimitedComment::class)
			) : [];

		$comments = [];

		foreach ($comment_nodes as $comment_node) {
			$comment_text = $comment_node->getText();

			if (strpos(ltrim($comment_text), '/**') === 0) {
				$comments[] = new PhpParser\Comment\Doc($comment_text);
			} else {
				$comments[] = new PhpParser\Comment($comment_text);
			}
		}

		return $comments;
	}
}