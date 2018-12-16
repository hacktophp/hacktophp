<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class AnonymousFunctionTransformer
{
	public static function transform(HHAST\AnonymousFunction $node, HackFile $file, Scope $scope) : PhpParser\Node\Expr\Closure
	{
		$params = [];

		$param_names = [];

		$params_list_params = $node->hasParameters() ? $node->getParameters()->getDescendantsOfType(HHAST\ParameterDeclaration::class) : [];

		$docblock = ['description' => '', 'specials' => []];

		foreach ($params_list_params as $params_list_param) {
			$params[] = FunctionDeclarationTransformer::getParam(
				$params_list_param,
				$file,
				$scope,
				$docblock
			);
		}

		$stmts = $node->hasBody() ? NodeTransformer::transform($node->getBody(), $file, $scope) : [];

		$uses = [];

		if ($node->hasUse()) {
			foreach ($node->getUse()->getVariables()->getChildren() as $use_node) {
				if ($use_node instanceof HHAST\VariableToken) {
					$uses[] = new PhpParser\Node\Expr\ClosureUse(
						new PhpParser\Node\Expr\Variable(
							substr($use_node->getText(), 1)
						)
					);
				}
			}
		}

		return new PhpParser\Node\Expr\Closure(
			[
				'params' => $params,
				'stmts' => $stmts,
				'uses' => $uses,
			]
		);
	}
}