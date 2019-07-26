<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class NodeTransformer
{
	public static function transformList(HHAST\EditableList $list, Project $project, HackFile $file, Scope $scope)
	{
		return
			array_filter(
				array_map(
					function(HHAST\Node $node) use ($project, $file, $scope) { return self::transform($node, $project, $file, $scope); },
					$list->getChildren()
				),
				function (PhpParser\Node\Stmt $node) {
					return !$node instanceof PhpParser\Node\Stmt\Nop;
				}
			);
	}

	public static function transform(HHAST\Node $node, Project $project, HackFile $file, Scope $scope)
	{
		if ($node instanceof HHAST\EditableList) {
			return self::transformList($node, $project, $file, $scope);
		}
		
		if ($node instanceof HHAST\Script) {
			return ScriptTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\MarkupSection) {
			if ($node->hasSuffix() && $node->getSuffix()->getName() && $node->getSuffix()->getName()->getText() !== 'hh') {
				$file->is_hack = false;
			}

			return new PhpParser\Node\Stmt\Nop();
		}

		if ($node instanceof HHAST\NamespaceUseDeclaration) {
			return NamespaceUseDeclarationTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\NamespaceGroupUseDeclaration) {
			return NamespaceGroupUseDeclarationTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\FunctionDeclaration) {
			return FunctionDeclarationTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\EndOfFile) {
			return new PhpParser\Node\Stmt\Nop();
		}

		if ($node instanceof HHAST\ExpressionStatement) {
			return ExpressionTransformer::transformStatement($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\EditableToken) {
			return $node->getText();
		}

		if ($node instanceof HHAST\BreakStatement) {
			return new PhpParser\Node\Stmt\Break_(
				$node->hasLevel() ? ExpressionTransformer::transform($node->getLevel(), $project, $file, $scope) : null
			);
		}

		if ($node instanceof HHAST\ContinueStatement) {
			return new PhpParser\Node\Stmt\Continue_(
				$node->hasLevel() ? ExpressionTransformer::transform($node->getLevel(), $project, $file, $scope) : null
			);
		}

		if ($node instanceof HHAST\IfStatement) {
			return IfStatementTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\ForStatement) {
			return ForStatementTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\ForeachStatement) {
			return ForeachStatementTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\WhileStatement) {
			return WhileStatementTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\DoStatement) {
			return DoStatementTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\SwitchStatement) {
			return SwitchStatementTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\TryStatement) {
			return TryStatementTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\UnsetStatement) {
			$vars = array_map(
				function (HHAST\ListItem $node) use ($project, $file, $scope) {
					$node = $node->getItem();
					return ExpressionTransformer::transform($node, $project, $file, $scope);
				},
				$node->getVariables()->getChildren()
			);

			return new PhpParser\Node\Stmt\Unset_(
				$vars
			);
		}

		if ($node instanceof HHAST\EchoStatement) {
			$exprs = array_map(
				function (HHAST\ListItem $node) use ($project, $file, $scope) {
					$node = $node->getItem();
					return ExpressionTransformer::transform($node, $project, $file, $scope);
				},
				$node->getExpressions()->getChildren()
			);

			return new PhpParser\Node\Stmt\Echo_(
				$exprs
			);
		}

		if ($node instanceof HHAST\GlobalStatement) {
			$vars = array_map(
				function (HHAST\ListItem $node) use ($project, $file, $scope) {
					$node = $node->getItem();
					return ExpressionTransformer::transformVariableName($node, $project, $file, $scope);
				},
				$node->getVariables()->getChildren()
			);

			return new PhpParser\Node\Stmt\Global_(
				$vars
			);
		}

		if ($node instanceof HHAST\FunctionStaticStatement) {
			$vars = array_map(
				function (HHAST\ListItem $node) use ($project, $file, $scope) {
					$node = $node->getItem();
					return new PhpParser\Node\Stmt\StaticVar(
						ExpressionTransformer::transformVariableName($node->getName(), $project, $file, $scope),
						$node->hasInitializer() ? ExpressionTransformer::transform($node->getInitializer(), $project, $file, $scope) : null
					);
				},
				$node->getDeclarations()->getChildren()
			);

			return new PhpParser\Node\Stmt\Static_(
				$vars
			);
		}

		if ($node instanceof HHAST\CompoundStatement) {
			if (!$node->hasStatements()) {
				return [];
			}

			return self::transformList($node->getStatements(), $project, $file, $scope);
		}

		if ($node instanceof HHAST\ConstDeclaration) {
			return ConstDeclarationTransformer::transform($node, $project, $file, $scope, false);
		}

		if ($node instanceof HHAST\ClassishDeclaration) {
			return ClassishDeclarationTransformer::transform($node, $project, $file, $scope);
		}

		if ($node instanceof HHAST\ThrowStatement) {
			return new PhpParser\Node\Stmt\Throw_(ExpressionTransformer::transform($node->getExpression(), $project, $file, $scope));
		}

		if ($node instanceof HHAST\UsingStatementFunctionScoped) {
			return new PhpParser\Node\Stmt\Expression(
				ExpressionTransformer::transform($node->getExpression(), $project, $file, $scope)
			);
		}

		if ($node instanceof HHAST\ReturnStatement) {
			return new PhpParser\Node\Stmt\Return_(
				$node->hasExpression()
					? ExpressionTransformer::transform($node->getExpression(), $project, $file, $scope)
					: null,
				[
					'comments' => ExpressionTransformer::getTokenComments($node->getKeyword())
				]
			);
		}

		if ($node instanceof HHAST\InclusionDirective) {
			$require = $node->getExpression()->getRequire();

			switch (get_class($require)) {
				case HHAST\IncludeToken::class:
					$type = PhpParser\Node\Expr\Include_::TYPE_INCLUDE;
					break;
				case HHAST\RequireToken::class:
					$type = PhpParser\Node\Expr\Include_::TYPE_REQUIRE;
					break;
				case HHAST\Include_onceToken::class:
					$type = PhpParser\Node\Expr\Include_::TYPE_INCLUDE_ONCE;
					break;
				case HHAST\Require_onceToken::class:
					$type = PhpParser\Node\Expr\Include_::TYPE_REQUIRE_ONCE;
					break;
				default:
					throw new \UnexpectedValueException('Unknown inclusion type');
			}

			$filename = $node->getExpression()->getFilename();

			return new PhpParser\Node\Stmt\Expression(
				new PhpParser\Node\Expr\Include_(
					ExpressionTransformer::transform($filename, $project, $file, $scope),
					$type
				)
			);
		}

		if ($node instanceof HHAST\UsingStatementBlockScoped) {
			$stmts = array_map(
				function (HHAST\ListItem $node) use ($project, $file, $scope) {
					return new PhpParser\Node\Stmt\Expression(ExpressionTransformer::transform($node->getItem(), $project, $file, $scope));
				},
				$node->getExpressions()->getChildren()
			);

			$using_body_statements = NodeTransformer::transform($node->getBody(), $project, $file, $scope);

			$stmts = array_merge($stmts, $using_body_statements);

			return new PhpParser\Node\Stmt\TryCatch(
				$stmts,
				[],
				new PhpParser\Node\Stmt\Finally_()
			);
		}

		if ($node instanceof HHAST\EnumDeclaration) {
			$class_name = $node->getName()->getText();

			$enumerators = $node->getEnumerators()->getChildren();

			$consts = [];

			foreach ($enumerators as $enumerator) {
				$enum_name = $enumerator->getName()->getText();
				$enum_value = $enumerator->getValue();

				$enum_value = ExpressionTransformer::transform($enum_value, $project, $file, $scope);

				$consts[] = new PhpParser\Node\Stmt\ClassConst(
					[
						new PhpParser\Node\Const_(
							$enum_name,
							$enum_value
						)
					]
				);
			}

			$comment = new PhpParser\Comment\Doc(
				rtrim(
					\Psalm\DocComment::render(
						[
							'description' => 'Generated enum class, do not extend',
							'specials' => [],
						],
						''
					)
				)
			);

			return new PhpParser\Node\Stmt\Class_(
				$class_name,
				[
					'stmts' => $consts,
					'flags' => PhpParser\Node\Stmt\Class_::MODIFIER_ABSTRACT
				],
				[
					'comments' => [$comment],
				]
			);
		}

		if ($node instanceof HHAST\AliasDeclaration) {
			return new PhpParser\Node\Stmt\Nop();
		}

		if ($node instanceof HHAST\DeclareDirectiveStatement) {
			$expr = $node->getExpression();
			$key = $expr->getLeftOperand();
			$value = $expr->getRightOperand();

			return new PhpParser\Node\Stmt\Declare_([
				new PhpParser\Node\Stmt\DeclareDeclare(
					$key->getText(),
					ExpressionTransformer::transform($value, $project, $file, $scope)
				)
			]);
		}

		throw new \UnexpectedValueException('Unknown type ' . get_class($node));
	}
}