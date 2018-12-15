<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class NodeTransformer
{
	public static function transformList(HHAST\EditableList $list, HackFile $file, Scope $scope)
	{
		return array_map(
			function(HHAST\EditableNode $node) use ($file, $scope) { return self::transform($node, $file, $scope); },
			$list->getChildren()
		);
	}

	public static function transform(HHAST\EditableNode $node, HackFile $file, Scope $scope)
	{
		if ($node instanceof HHAST\EditableList) {
			return self::transformList($node, $file, $scope);
		}
		
		if ($node instanceof HHAST\Script) {
			return ScriptTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof HHAST\MarkupSection) {
			// todo maybe more information can be gleaned
			return new PhpParser\Node\Stmt\Nop();
		}

		if ($node instanceof HHAST\NamespaceUseDeclaration) {
			return NamespaceUseDeclarationTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof HHAST\NamespaceGroupUseDeclaration) {
			return NamespaceGroupUseDeclarationTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof HHAST\FunctionDeclaration) {
			return FunctionDeclarationTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof HHAST\EndOfFile) {
			return new PhpParser\Node\Stmt\Nop();
		}

		if ($node instanceof HHAST\ExpressionStatement) {
			return ExpressionTransformer::transformStatement($node, $file, $scope);
		}

		if ($node instanceof HHAST\EditableToken) {
			return $node->getText();
		}

		if ($node instanceof HHAST\BreakStatement) {
			return new PhpParser\Node\Stmt\Break_(
				$node->hasLevel() ? ExpressionTransformer::transform($node->getLevel(), $file, $scope) : null
			);
		}

		if ($node instanceof HHAST\ContinueStatement) {
			return new PhpParser\Node\Stmt\Continue_(
				$node->hasLevel() ? ExpressionTransformer::transform($node->getLevel(), $file, $scope) : null
			);
		}

		if ($node instanceof HHAST\IfStatement) {
			return IfStatementTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof HHAST\ForStatement) {
			return ForStatementTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof HHAST\ForeachStatement) {
			return ForeachStatementTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof HHAST\SwitchStatement) {
			return SwitchStatementTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof HHAST\TryStatement) {
			return TryStatementTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof HHAST\CompoundStatement) {
			return self::transformList($node->getStatements(), $file, $scope);
		}

		if ($node instanceof HHAST\ConstDeclaration) {
			return ConstDeclarationTransformer::transform($node, $file, false);
		}

		if ($node instanceof HHAST\ClassishDeclaration) {
			return ClassishDeclarationTransformer::transform($node, $file, $scope);
		}

		if ($node instanceof HHAST\ThrowStatement) {
			return new PhpParser\Node\Stmt\Throw_(ExpressionTransformer::transform($node->getExpression(), $file, $scope));
		}

		if ($node instanceof HHAST\ReturnStatement) {
			return new PhpParser\Node\Stmt\Return_(ExpressionTransformer::transform($node->getExpression(), $file, $scope));
		}

		if ($node instanceof HHAST\UsingStatementBlockScoped) {
			$stmts = array_map(
				function (HHAST\ListItem $node) use ($file, $scope) {
					return new PhpParser\Node\Stmt\Expression(ExpressionTransformer::transform($node->getItem(), $file, $scope));
				},
				$node->getExpressions()->getChildren()
			);

			$using_body_statements = NodeTransformer::transform($node->getBody(), $file, $scope);

			$stmts = array_merge($stmts, $using_body_statements);

			return new PhpParser\Node\Stmt\TryCatch(
				$stmts,
				[],
				new PhpParser\Node\Stmt\Finally_()
			);
		}

		throw new \UnexpectedValueException('Unknown type ' . get_class($node));
	}
}