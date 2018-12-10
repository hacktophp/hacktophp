<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class NodeTransformer
{
	public static function transformList(HHAST\EditableList $list, HackFile $file)
	{
		return array_map(
			function(HHAST\EditableNode $node) use ($file) { return self::transform($node, $file); },
			$list->getChildren()
		);
	}

	public static function transform(HHAST\EditableNode $node, HackFile $file)
	{
		if ($node instanceof HHAST\EditableList) {
			return self::transformList($node, $file);
		}
		
		if ($node instanceof HHAST\Script) {
			return ScriptTransformer::transform($node, $file);
		}

		if ($node instanceof HHAST\MarkupSection) {
			// todo maybe more information can be gleaned
			return new PhpParser\Node\Stmt\Nop();
		}

		if ($node instanceof HHAST\NamespaceUseDeclaration) {
			return NamespaceUseDeclarationTransformer::transform($node, $file);
		}

		if ($node instanceof HHAST\FunctionDeclaration) {
			return FunctionDeclarationTransformer::transform($node, $file);
		}

		if ($node instanceof HHAST\EndOfFile) {
			return new PhpParser\Node\Stmt\Nop();
		}

		if ($node instanceof HHAST\ExpressionStatement) {
			return ExpressionTransformer::transformStatement($node, $file);
		}

		if ($node instanceof HHAST\EditableToken) {
			return $node->getText();
		}

		if ($node instanceof HHAST\IfStatement) {
			return IfStatementTransformer::transform($node, $file);
		}

		if ($node instanceof HHAST\ForStatement) {
			return ForStatementTransformer::transform($node, $file);
		}

		if ($node instanceof HHAST\TryStatement) {
			return TryStatementTransformer::transform($node, $file);
		}

		if ($node instanceof HHAST\CompoundStatement) {
			return self::transformList($node->getStatements(), $file);
		}

		if ($node instanceof HHAST\ThrowStatement) {
			return new PhpParser\Node\Stmt\Throw_(ExpressionTransformer::transform($node->getExpression(), $file));
		}

		if ($node instanceof HHAST\ReturnStatement) {
			return new PhpParser\Node\Stmt\Return_(ExpressionTransformer::transform($node->getExpression(), $file));
		}

		if ($node instanceof HHAST\UsingStatementBlockScoped) {
			$stmts = array_map(
				function (HHAST\ListItem $node) use ($file) {
					return new PhpParser\Node\Stmt\Expression(ExpressionTransformer::transform($node->getItem(), $file));
				},
				$node->getExpressions()->getChildren()
			);

			$using_body_statements = NodeTransformer::transform($node->getBody(), $file);

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