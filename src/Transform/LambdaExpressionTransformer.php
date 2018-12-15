<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class LambdaExpressionTransformer
{
	public static function transform(HHAST\LambdaExpression $node, HackFile $file) : PhpParser\Node\Expr\Closure
	{
		$params = [];

		$signature = $node->hasSignature() ? $node->getSignature() : null;

		if ($signature instanceof HHAST\VariableToken) {
			$params[] = new PhpParser\Node\Param(
				new PhpParser\Node\Expr\Variable(substr($signature->getText(), 1)),
				null
			);
		} elseif ($signature) {
			$params_list_params = $signature->getParameters()->getDescendantsOfType(HHAST\ParameterDeclaration::class);

			foreach ($params_list_params as $params_list_param) {
				$param_type = null;
				$param_name = $params_list_param->getName()->getText();

				if ($params_list_param->hasType()) {
					$param_type_string = TypeTransformer::transform($params_list_param->getType(), $file);

					$psalm_type = Psalm\Type::parseString($param_type_string);

					if (!$psalm_type->canBeFullyExpressedInPhp()) {
						$namespaced_type_string = $psalm_type->toNamespacedString(
							$file->namespace,
							[],
							null,
							false
						);

						$docblock['specials']['param'] = [$namespaced_type_string . ' ' . $param_name];
					}

					$param_type = TypeTransformer::getPhpParserTypeFromPsalm($psalm_type, $file);
				}
				
				$params[] = new PhpParser\Node\Param(
					new PhpParser\Node\Expr\Variable(substr($param_name, 1)),
					null,
					$param_type
				);
			}
		}

		$body = $node->getBody();

		if ($body instanceof HHAST\CompoundStatement) {
			$stmts = NodeTransformer::transform($body, $file);

			if (count($stmts) !== 1 || !$stmts[0] instanceof PhpParser\Node\Stmt\Expression) {
				throw new \UnexpectedValueException('Bad compound statement');
			}

			$stmts = [
				new PhpParser\Node\Stmt\Return_(
					$stmts[0]->expr
				)
			];
		} else {
			$stmts = [
				new PhpParser\Node\Stmt\Return_(
					ExpressionTransformer::transform($body, $file)
				)
			];
		}

		return new PhpParser\Node\Expr\Closure(
			[
				'params' => $params,
				'stmts' => $stmts,
			]
		);
	}
}