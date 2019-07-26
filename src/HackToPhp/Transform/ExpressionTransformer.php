<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use Facebook\HHAST\{
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
	public static function transformStatement(HHAST\ExpressionStatement $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$inner_expression = $node->getExpression();

		if (!$inner_expression) {
			return new PhpParser\Node\Stmt\Nop();
		}

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

			return new PhpParser\Node\Stmt\Nop();

			throw new \UnexpectedValueException('Unrecognised expression statement token ' . $name_string);
		}

		$token_comments = self::getTokenCommentsRecursively($node);

		return new PhpParser\Node\Stmt\Expression(
			self::transform($inner_expression, $project, $file, $scope),
			['comments' => $token_comments]
		);
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
	public static function transform(HHAST\Node $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		if ($node instanceof ParenthesizedExpression) {
			return ExpressionTransformer::transform($node->getExpression(), $project, $file, $scope);
		}

		if ($node instanceof BinaryExpression) {
			return BinaryExpressionTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof VariableExpression) {
			$expr = $node->getExpression();

			if ($expr instanceof HHAST\VariableToken) {
				$scope->referenced_vars[$expr->getText()] = $expr->getText();

				return new PhpParser\Node\Expr\Variable(substr($expr->getText(), 1));
			}

			return new PhpParser\Node\Expr\Variable(self::transform($expr, $project, $file, $scope));
		}

		if ($node instanceof SubscriptExpression || $node instanceof HHAST\EmbeddedSubscriptExpression) {
			return new PhpParser\Node\Expr\ArrayDimFetch(
				self::transform($node->getReceiver(), $project, $file, $scope),
				$node->hasIndex() ? self::transform($node->getIndex(), $project, $file, $scope) : null
			);
		}

		if ($node instanceof LiteralExpression) {
			return LiteralExpressionTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\PrefixedStringExpression) {
			return self::transform($node->getStr(), $project, $file, $scope);
		}

		if ($node instanceof HHAST\IsExpression) {
			return IsExpressionTransformer::transform($node, $project, $file, $scope);
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
				ExpressionTransformer::transform($node->getObject(), $project, $file, $scope),
				self::transformVariableName($node->getName(), $project, $file, $scope)
			);
		}

		if ($node instanceof HHAST\ShapeExpression) {
			$fields = $node->hasFields() ? $node->getFields()->getChildren() : [];

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($field->getValue(), $project, $file, $scope),
					ExpressionTransformer::transform($field->getName(), $project, $file, $scope)
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items,
				['kind' => PhpParser\Node\Expr\Array_::KIND_SHORT]
			);
		}

		if ($node instanceof HHAST\VectorIntrinsicExpression) {
			$fields = $node->hasMembers() ? $node->getMembers()->getChildren() : [];

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($field, $project, $file, $scope)
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items,
				['kind' => PhpParser\Node\Expr\Array_::KIND_SHORT]
			);
		}

		if ($node instanceof HHAST\TupleExpression) {
			$fields = $node->hasItems() ? $node->getItems()->getChildren() : [];

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($field, $project, $file, $scope)
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items,
				['kind' => PhpParser\Node\Expr\Array_::KIND_SHORT]
			);
		}

		if ($node instanceof HHAST\KeysetIntrinsicExpression) {
			$fields = $node->hasMembers() ? $node->getMembers()->getChildren() : [];

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($field, $project, $file, $scope),
					ExpressionTransformer::transform($field, $project, $file, $scope)
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items,
				['kind' => PhpParser\Node\Expr\Array_::KIND_SHORT]
			);
		}

		if ($node instanceof HHAST\DictionaryIntrinsicExpression) {
			$fields = $node->hasMembers() ? $node->getMembers()->getChildren() : [];

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($field->getValue(), $project, $file, $scope),
					ExpressionTransformer::transform($field->getKey(), $project, $file, $scope)
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items,
				['kind' => PhpParser\Node\Expr\Array_::KIND_SHORT]
			);
		}

		if ($node instanceof HHAST\ArrayCreationExpression
			|| $node instanceof HHAST\ArrayIntrinsicExpression
			|| $node instanceof HHAST\DarrayIntrinsicExpression
			|| $node instanceof HHAST\VarrayIntrinsicExpression
		) {
			$fields = $node->hasMembers() ? $node->getMembers()->getChildren() : [];

			$array_items = [];

			foreach ($fields as $field) {
				$field = $field->getItem();
				$value = $field instanceof HHAST\ElementInitializer ? $field->getValue() : $field;
				$key = $field instanceof HHAST\ElementInitializer ? $field->getKey() : null;
				$array_items[] = new PhpParser\Node\Expr\ArrayItem(
					ExpressionTransformer::transform($value, $project, $file, $scope),
					$key ? ExpressionTransformer::transform($key, $project, $file, $scope) : null
				);
			}

			return new PhpParser\Node\Expr\Array_(
				$array_items,
				[
					'kind' => $node instanceof HHAST\ArrayCreationExpression
						? PhpParser\Node\Expr\Array_::KIND_SHORT
						: PhpParser\Node\Expr\Array_::KIND_LONG
					]
			);
		}

		if ($node instanceof LambdaExpression) {
			return LambdaExpressionTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof AnonymousFunction || $node instanceof HHAST\Php7AnonymousFunction) {
			return AnonymousFunctionTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\AnonymousClass) {
			return ClassishDeclarationTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof EmptyExpression) {
			return new PhpParser\Node\Expr\Empty_(
				self::transform($node->getArgument(), $project, $file, $scope)
			);
		}

		if ($node instanceof IssetExpression) {
			$vars = array_map(
				function (HHAST\ListItem $node) use ($project, $file, $scope) {
					$node = $node->getItem();
					return ExpressionTransformer::transform($node, $project, $file, $scope);
				},
				$node->getArgumentList()->getChildren()
			);

			return new PhpParser\Node\Expr\Isset_(
				$vars
			);
		}

		if ($node instanceof ConditionalExpression) {
			return new PhpParser\Node\Expr\Ternary(
				ExpressionTransformer::transform($node->getTest(), $project, $file, $scope),
				$node->hasConsequence() ? ExpressionTransformer::transform($node->getConsequence(), $project, $file, $scope) : null,
				ExpressionTransformer::transform($node->getAlternative(), $project, $file, $scope)
			);
		}

		if ($node instanceof ScopeResolutionExpression) {
			return new PhpParser\Node\Expr\ClassConstFetch(
				self::transformVariableName($node->getQualifier(), $project, $file, $scope),
				self::transformVariableName($node->getName(), $project, $file, $scope)
			);
		}

		if ($node instanceof ObjectCreationExpression) {
			return ObjectCreationExpressionTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof FunctionCallExpression) {
			return FunctionCallExpressionTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof CastExpression) {
			return CastExpressionTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\ListItem) {
			return self::transform($node->getItem(), $project, $file, $scope);
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
					ExpressionTransformer::transform($value, $project, $file, $scope),
					$key ? ExpressionTransformer::transform($key, $project, $file, $scope) : null
				);
			}

			return new PhpParser\Node\Expr\List_(
				$array_items
			);
		}

		if ($node instanceof HHAST\SimpleInitializer) {
			return self::transform($node->getValue(), $project, $file, $scope);
		}

		if ($node instanceof HHAST\YieldExpression) {
			$operand = $node->getOperand();

			if ($operand instanceof HHAST\ElementInitializer) {
				return new PhpParser\Node\Expr\Yield_(
					self::transform($operand->getValue(), $project, $file, $scope),
					self::transform($operand->getKey(), $project, $file, $scope)
				);
			}

			return new PhpParser\Node\Expr\Yield_(
				self::transform($operand, $project, $file, $scope)
			);
		}

		if ($node instanceof HHAST\YieldFromExpression) {
			$operand = $node->getOperand();

			return new PhpParser\Node\Expr\YieldFrom(
				self::transform($operand, $project, $file, $scope)
			);
		}

		if ($node instanceof HHAST\EvalExpression) {
			return new PhpParser\Node\Expr\Eval_(
				self::transform($node->getArgument(), $project, $file, $scope)
			);
		}

		if ($node instanceof HHAST\InstanceofExpression) {
			$left_operand = self::transform($node->getLeftOperand(), $project, $file, $scope);
			$right_operand = self::transform($node->getRightOperand(), $project, $file, $scope);

			return new PhpParser\Node\Expr\Instanceof_(
				$left_operand,
				$right_operand
			);
		}

		if ($node instanceof HHAST\InclusionExpression) {
			return new PhpParser\Node\Expr\Include_(
				self::transform($node->getFilename(), $project, $file, $scope),
				PhpParser\Node\Expr\Include_::TYPE_INCLUDE
			);
		}

		if ($node instanceof HHAST\PipeVariableExpression) {
			if (!$scope->pipe_expr) {
				throw new \UnexpectedValueException('No pipe expression to replace');
			}

			return $scope->pipe_expr;
		}

		if ($node instanceof PrefixUnaryExpression) {
			return PrefixUnaryExpressionTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof PostfixUnaryExpression) {
			$expr = self::transform($node->getOperand(), $project, $file, $scope);

			switch (get_class($node->getOperator())) {
				case HHAST\PlusPlusToken::class:
					return new PhpParser\Node\Expr\PostInc($expr);

				case HHAST\MinusMinusToken::class:
					return new PhpParser\Node\Expr\PostDec($expr);
			}
		}

		if ($node instanceof HHAST\AwaitableCreationExpression) {
			$old_scope = $scope;

			$body = $node->getCompoundStatement();

			$scope = new Scope();
			$scope->pipe_expr = $old_scope->pipe_expr;

			$stmts = NodeTransformer::transform($body, $project, $file, $scope);

			$uses = [];

			foreach ($scope->referenced_vars as $var) {
				if (!isset($param_names[$var])) {
					$uses[] = new PhpParser\Node\Expr\ClosureUse(
						new PhpParser\Node\Expr\Variable(
							substr($var, 1)
						)
					);
				}
			}

			$scope = $old_scope;

			return new PhpParser\Node\Expr\FuncCall(
				new PhpParser\Node\Expr\Closure(
					[
						'params' => [],
						'stmts' => $stmts,
						'uses' => $uses,
					]
				)
			);
		}

		if ($node instanceof HHAST\CollectionLiteralExpression) {
			$name = TypeTransformer::transform($node->getName(), $project, $file, $scope);
			return new PhpParser\Node\Expr\New_(
				new PhpParser\Node\Name\FullyQualified($name),
				[

				]
			);
		}

		if ($node instanceof HHAST\NullableAsExpression) {
			return AsExpressionTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\AsExpression) {
			return AsExpressionTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\DefineExpression) {
			$args = FunctionCallExpressionTransformer::transformArguments(
				$node->getArgumentList(),
				$project, 
				$file,
				$scope
			);

			return new PhpParser\Node\Expr\FuncCall(
		    	new PhpParser\Node\Name('define'),
		    	$args
			);
		}

		throw new \UnexpectedValueException('Unknown expression type ' . get_class($node));
	}

	public static function transformVariableName(HHAST\Node $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
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

		if ($node instanceof HHAST\StaticToken) {
			return new PhpParser\Node\Identifier('static');
		}

		if ($node instanceof HHAST\SelfToken) {
			return new PhpParser\Node\Identifier('self');
		}

		if ($node instanceof HHAST\VariableExpression) {
			return self::transform($node, $project, $file, $scope);
		}

		throw new \UnexpectedValueException('Cannot transform variable name of type ' . get_class($node));
	}

	public static function getTokenCommentsRecursively(HHAST\Node $token) : array
	{
		$children = $token->getChildren();

		foreach ($children as $child) {
			if ($child instanceof HHAST\ListItem) {
				$child = $child->getItem();
			}

			if ($child instanceof HHAST\Missing || $child instanceof HHAST\WhiteSpace) {
				continue;
			}

			if ($child instanceof HHAST\EditableToken) {
				return self::getTokenComments($child);
			}

			if (!$child) {
				return [];
			}

			return self::getTokenCommentsRecursively($child);
		}

		return [];
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