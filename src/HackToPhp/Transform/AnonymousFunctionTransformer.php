<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;
use Psalm;

class AnonymousFunctionTransformer
{
	/**
	 * @param  HHAST\AnonymousFunction|HHAST\Php7AnonymousFunction   $node
	 */
	public static function transform($node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node\Expr\Closure
	{
		$params = [];

		$param_names = [];

		$params_list_params = $node->hasParameters() ? $node->getParameters()->getDescendantsOfType(HHAST\ParameterDeclaration::class) : [];

		$docblock = ['description' => '', 'specials' => []];

		$additional_function_stmts = [];
		$params = [];

		$attributes = ['comments' => []];

		$hhast_return_type = $node->hasType() ? $node->getType() : null;

		$psalm_return_type = null;
		$php_return_type = null;

		if ($hhast_return_type) {
			$return_type_string = TypeTransformer::transform($hhast_return_type, $project, $file, $scope);

			$psalm_return_type = Psalm\Type::parseString($return_type_string);

			if (!$psalm_return_type->canBeFullyExpressedInPhp()) {
				$docblock['specials']['return'] = [$psalm_return_type->toNamespacedString($file->namespace, [], null, false)];
			}

			$php_return_type = TypeTransformer::getPhpParserTypeFromPsalm($psalm_return_type, $project, $file, $scope);
		}

		$docblock['specials'] = array_filter($docblock['specials']);

		if ($docblock['specials']) {
			$docblock_string = Psalm\DocComment::render($docblock, '');

			$attributes['comments'][] = new \PhpParser\Comment\Doc(rtrim($docblock_string));
		}

		foreach ($params_list_params as $params_list_param) {
			$params[] = FunctionDeclarationTransformer::getParam(
				$params_list_param,
				$project,
				$file,
				$scope,
				$docblock
			);
		}

		$stmts = $node->hasBody() ? NodeTransformer::transform($node->getBody(), $project, $file, $scope) : [];

		$uses = [];

		if ($node->hasUse()) {
			foreach ($node->getUse()->getVariables()->getChildren() as $use_node) {
				if ($use_node instanceof HHAST\ListItem) {
					$use_node = $use_node->getItem();
				}

				if ($use_node instanceof HHAST\VariableToken) {
					$uses[] = new PhpParser\Node\Expr\ClosureUse(
						new PhpParser\Node\Expr\Variable(
							substr($use_node->getText(), 1)
						)
					);
				} elseif ($use_node instanceof HHAST\PrefixUnaryExpression) {
					$use_node = $use_node->getOperand();

					$uses[] = new PhpParser\Node\Expr\ClosureUse(
						new PhpParser\Node\Expr\Variable(
							substr($use_node->getText(), 1)
						),
						true
					);
				} else {
					throw new \UnexpectedValueException('Bad');
				}
			}
		}

		return new PhpParser\Node\Expr\Closure(
			[
				'params' => $params,
				'stmts' => $stmts,
				'uses' => $uses,
				'returnType' => $php_return_type
			],
			$attributes
		);
	}
}