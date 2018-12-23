<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class LambdaExpressionTransformer
{
	public static function transform(HHAST\LambdaExpression $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node\Expr\Closure
	{
		$params = [];

		$signature = $node->hasSignature() ? $node->getSignature() : null;

		$param_names = [];

		$docblock = ['description' => '', 'specials' => []];

		if ($signature instanceof HHAST\VariableToken) {
			$param_name = $signature->getText();

			$param_names[$param_name] = true;

			$params[] = new PhpParser\Node\Param(
				new PhpParser\Node\Expr\Variable(substr($param_name, 1)),
				null
			);
		} elseif ($signature && $signature->hasParameters()) {
			$params_list_params = $signature->getParameters()->getDescendantsOfType(HHAST\ParameterDeclaration::class);

			foreach ($params_list_params as $params_list_param) {
				$param_name_node = $params_list_param->getName();

				if ($param_name_node instanceof HHAST\DecoratedExpression) {
					$param_name_node = $param_name_node->getExpression();
				}

				$param_name = $param_name_node->getText();
				$param_names[$param_name] = true;
				
				$params[] = FunctionDeclarationTransformer::getParam(
					$params_list_param,
					$project,
					$file,
					$scope,
					$docblock
				);
			}
		}

		$body = $node->getBody();

		$old_scope = $scope;
		$scope = new Scope();
		$scope->pipe_expr = $old_scope->pipe_expr;

		if ($body instanceof HHAST\CompoundStatement) {
			$stmts = NodeTransformer::transform($body, $project, $file, $scope);

			if (count($stmts) === 1) {
				$stmts = [
					new PhpParser\Node\Stmt\Return_(
						$stmts[0]->expr
					)
				];
			}
		} else {
			$stmts = [
				new PhpParser\Node\Stmt\Return_(
					ExpressionTransformer::transform($body, $project, $file, $scope)
				)
			];
		}

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

		return new PhpParser\Node\Expr\Closure(
			[
				'params' => $params,
				'stmts' => $stmts,
				'uses' => $uses,
			]
		);
	}
}