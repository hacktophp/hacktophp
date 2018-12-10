<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;
use Psalm;

class FunctionDeclarationTransformer
{
	public static function transform(HHAST\FunctionDeclaration $node, HackFile $file) : PhpParser\Node
	{
		$header = $node->getDeclarationHeader();

		$modifiers = $header->hasModifiers() ? $header->getModifiers()->getChildren() : null;

		$async = false;

		if ($modifiers) {
			foreach ($modifiers as $modifier) {
				if ($modifier instanceof HHAST\AsyncToken) {
					$async = true;
				}
			}
		}

		$docblock = ['description' => '', 'specials' => []];

		$attributes = [];

		$params = [];

		$params_list_params = $header->hasParameterList()
			? $header->getParameterList()->getDescendantsOfType(HHAST\ParameterDeclaration::class)
			: [];

		if ($params_list_params) {
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

		$return_type = $header->hasType() ? $header->getType() : null;

		$psalm_return_type = null;

		if ($return_type) {
			$return_type_string = TypeTransformer::transform($return_type, $file);
			
			$psalm_return_type = Psalm\Type::parseString($return_type_string);

			if (!$psalm_return_type->canBeFullyExpressedInPhp()) {
				$docblock['specials']['return'] = [$psalm_return_type->toNamespacedString($file->namespace, [], null, false)];
			}

			$return_type = TypeTransformer::getPhpParserTypeFromPsalm($psalm_return_type, $file);
		}

		if ($docblock['specials']) {
			$docblock_string = Psalm\DocComment::render($docblock, '');

			$attributes['comments'] = [
				new \PhpParser\Comment\Doc(rtrim($docblock_string))
			];
		}

		$function_name = $header->hasName() ? $header->getName()->getText() : null;

		$stmts = null;

		if ($node->hasBody() && $node->getBody()->hasStatements()) {
			$stmts = NodeTransformer::transform($node->getBody()->getStatements(), $file);

			if ($async) {
				$stmts = [
					self::getAsyncCoroutine($params, $stmts, $psalm_return_type, $file)
				];
			}
		}

		$subnodes = [
			'byRef' => $header->hasAmpersand(),
			'returnType' => $return_type,
			'params' => $params,
			'stmts' => $stmts,
		];

		if (!$function_name) {
			return new PhpParser\Node\Stmt\Function_(
				$function_name,
				$subnodes,
				$attributes
			);
		}

		return new PhpParser\Node\Stmt\Function_(
			$function_name,
			$subnodes,
			$attributes
		);
	}

	private static function getAsyncCoroutine(
		array $params,
		array $stmts,
		?Psalm\Type\Union $psalm_return_type,
		HackFile $file
	) : PhpParser\Node\Stmt\Return_ {

		$generator_docblock_type = null;

		$comments = [];

		if ($psalm_return_type) {
			$atomic_types = $psalm_return_type->getTypes();
		
			$atomic_type = reset($atomic_types);

			if ($atomic_type instanceof Psalm\Type\Atomic\TGenericObject) {
				$generator_type = new Psalm\Type\Union([
					new Psalm\Type\Atomic\TGenericObject(
						'Generator',
						[
							Psalm\Type::getInt(),
							Psalm\Type::getMixed(),
							Psalm\Type::getVoid(),
							$atomic_type->type_params[0]
						]
					)
				]);

				$comments = [
					new PhpParser\Comment\Doc(
						'/** @return ' . $generator_type->toNamespacedString($file->namespace, [], null, false) . ' */'
					)
				];
			}
		}

		$closure_expr = new PhpParser\Node\Expr\Closure(
			[
				'params' => [],
				'uses' => array_map(
					function(PhpParser\Node\Param $param) {
						return new PhpParser\Node\Expr\ClosureUse(
							new PhpParser\Node\Expr\Variable(
								(string) $param->var->name
							)
						);
					},
					$params
				),
				'returnType' => new PhpParser\Node\Name\FullyQualified('Generator'),
				'stmts' => $stmts,
			]
		);

		return new PhpParser\Node\Stmt\Return_(
			new PhpParser\Node\Expr\FuncCall(
				new PhpParser\Node\Name\FullyQualified(
					'Sabre\\Event\\coroutine'
				),
				[
					new PhpParser\Node\Arg(
						$closure_expr,
						false,
						false,
						[
							'comments' => $comments
						]
					)
				]	
			)
		);
	}
}