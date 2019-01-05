<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;
use Psalm;

class FunctionDeclarationTransformer
{
	/**
	 * @param  HHAST\FunctionDeclaration|HHAST\MethodishDeclaration $node
	 */
	public static function transform(
		$node,
		Project $project,
		HackFile $file,
		Scope $scope,
		array $template_map = [],
		array &$class_stmts = []
	) : PhpParser\Node {
		if ($node instanceof HHAST\MethodishDeclaration) {
			$header = $node->getFunctionDeclHeader();
		} else {
			$header = $node->getDeclarationHeader();
		}

		$function_name = $header->hasName() ? $header->getName()->getText() : null;

		$modifiers = $header->hasModifiers() ? $header->getModifiers()->getChildren() : null;

		$async = false;

		$flags = 0;

		$templates = [];

		if ($header->hasTypeParameterList()) {
			$type_parameters = $header
				->getTypeParameterList()
				->getParameters()
				->getDescendantsOfType(HHAST\TypeParameter::class);

			foreach ($type_parameters as $type_parameter) {
				$type_parameter_name = $type_parameter->getName()->getText();

				$constraints = [];
				if ($type_parameter->hasConstraints()) {
					$constraint_nodes = $type_parameter
						->getConstraints()
						->getDescendantsOfType(HHAST\TypeConstraint::class);

					foreach ($constraint_nodes as $constraint_node) {
						$constraint_node_type = TypeTransformer::transform($constraint_node->getType(), $project, $file, $scope);

						$template_map[$type_parameter_name] = Psalm\Type::parseString($constraint_node_type);
						if ($constraint_node->getKeyword() instanceof HHAST\AsToken) {
							$psalm_return_type = Psalm\Type::parseString($constraint_node_type);
							$constraints[] = ' as ' . $psalm_return_type->toNamespacedString($file->namespace, [], null, false);
						}
					}
				} else {
					$template_map[$type_parameter_name] = Psalm\Type::getMixed();
				}

				$templates[] = $type_parameter_name . implode(' ', $constraints);
			}
		}

		$attributes = [
			'comments' => ExpressionTransformer::getTokenComments($header->getKeyword())
		];

		if ($modifiers) {
			foreach ($modifiers as $modifier) {
				$attributes['comments'] = array_merge(
					$attributes['comments'],
					ExpressionTransformer::getTokenComments($modifier)
				);

				if ($modifier instanceof HHAST\AsyncToken) {
					$async = true;
				}

				if ($modifier instanceof HHAST\PublicToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PUBLIC;
				} elseif ($modifier instanceof HHAST\ProtectedToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PROTECTED;
				} elseif ($modifier instanceof HHAST\PrivateToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PRIVATE;
				} elseif ($modifier instanceof HHAST\StaticToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_STATIC;
				} elseif ($modifier instanceof HHAST\FinalToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_FINAL;
				} elseif ($modifier instanceof HHAST\AbstractToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_ABSTRACT;
				}
			}
		}

		$docblock = [
			'description' => null,
			'specials' => [
				'params' => [],
				'template' => $templates
			]
		];

		$additional_function_stmts = [];
		$params = [];

		$params_list_params = $header->hasParameterList()
			? $header->getParameterList()->getDescendantsOfType(HHAST\ParameterDeclaration::class)
			: [];

		if ($params_list_params) {
			foreach ($params_list_params as $offset => $params_list_param) {
				$params[] = self::getParam(
					$params_list_param,
					$offset,
					$project,
					$file,
					$scope,
					$docblock,
					$template_map,
					$additional_function_stmts,
					$class_stmts
				);
			}
		}

		$hhast_return_type = $header->hasType() ? $header->getType() : null;

		$psalm_return_type = null;
		$php_return_type = null;

		if ($hhast_return_type) {
			$return_type_string = TypeTransformer::transform($hhast_return_type, $project, $file, $scope, $template_map);

			$psalm_return_type = Psalm\Type::parseString($return_type_string, false, $template_map);

			$can_show_return_type = $project->use_php_return_types
				|| !$node instanceof HHAST\MethodishDeclaration
				|| !$file->is_hack;

			if ($file->is_hack) {
				if (!$psalm_return_type->canBeFullyExpressedInPhp() || !$can_show_return_type) {
					$docblock['specials']['return'] = [$psalm_return_type->toNamespacedString($file->namespace, [], null, false)];
				}
			}

			if ($can_show_return_type) {
				$php_return_type = TypeTransformer::getPhpParserTypeFromPsalm($psalm_return_type, $project, $file, $scope);
			}
		}

		$docblock['specials'] = array_filter($docblock['specials']);

		if (array_filter($docblock['specials'])) {
			$docblock_string = Psalm\DocComment::render($docblock, '');

			$attributes['comments'][] = new \PhpParser\Comment\Doc(rtrim($docblock_string));
		}

		$stmts = null;

		if ($node instanceof HHAST\MethodishDeclaration) {
			$body = $node->hasFunctionBody() ? $node->getFunctionBody() : null;
		} else {
			$body = $node->hasBody() ? $node->getBody() : null;
		}		
		
		if ($body) {
			if ($body->hasStatements()) {
				$stmts = NodeTransformer::transform($body->getStatements(), $project, $file, $scope);
				$stmts = array_merge($additional_function_stmts, $stmts);

				if ($async) {
					$stmts = [
						self::getAsyncCoroutine($params, $stmts, $psalm_return_type, $file)
					];
				}
			} else {
				$stmts = $additional_function_stmts;
			}
		} else {
			$stms = $additional_function_stmts;
		}

		$subnodes = [
			'byRef' => $header->hasAmpersand(),
			'returnType' => $php_return_type,
			'params' => $params,
			'stmts' => $stmts,
		];

		if ($node instanceof HHAST\MethodishDeclaration) {
			$subnodes['flags'] = $flags;

			return new PhpParser\Node\Stmt\ClassMethod(
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

	public static function getParam(
		HHAST\ParameterDeclaration $params_list_param,
		int $offset,
		Project $project,
		HackFile $file,
		Scope $scope,
		array &$docblock,
		array $template_map = [],
		array &$function_stmts = [],
		array &$class_stmts = []
	) : PhpParser\Node\Param {
		$param_type = null;
		$param_name_node = $params_list_param->getName();

		$default_value = $params_list_param->hasDefaultValue()
			? ExpressionTransformer::transform($params_list_param->getDefaultValue(), $project, $file, $scope)
			: null;

		$variadic = false;

		$by_ref = false;

		if ($param_name_node instanceof HHAST\DecoratedExpression) {
			$decorator = $param_name_node->getDecorator();

			if ($decorator instanceof HHAST\DotDotDotToken) {
				$variadic = true;
			} elseif ($decorator instanceof HHAST\AmpersandToken) {
				$by_ref = true;
			}

			$param_name_node = $param_name_node->getExpression();
		}

		$param_name = $param_name_node->getText();

		if ($param_name === '$_') {
			$param_name .= $offset;
		}

		$namespaced_type_string = null;

		if ($params_list_param->hasType()) {
			$param_type_string = TypeTransformer::transform($params_list_param->getType(), $project, $file, $scope, $template_map);

			$psalm_type = Psalm\Type::parseString($param_type_string, false, $template_map);

			$namespaced_type_string = $psalm_type->toNamespacedString(
				$file->namespace,
				[],
				null,
				false
			);

			if ($file->is_hack && !$psalm_type->canBeFullyExpressedInPhp()) {
				$docblock['specials']['param'][] = $namespaced_type_string . ' ' . $param_name;
			}

			$param_type = TypeTransformer::getPhpParserTypeFromPsalm($psalm_type, $project, $file, $scope);
		}

		if ($params_list_param->hasVisibility()) {
			$modifier = $params_list_param->getVisibility();

			if ($modifier instanceof HHAST\PublicToken) {
				$flags = PhpParser\Node\Stmt\Class_::MODIFIER_PUBLIC;
			} elseif ($modifier instanceof HHAST\ProtectedToken) {
				$flags = PhpParser\Node\Stmt\Class_::MODIFIER_PROTECTED;
			} elseif ($modifier instanceof HHAST\PrivateToken) {
				$flags = PhpParser\Node\Stmt\Class_::MODIFIER_PRIVATE;
			} else {
				throw new \UnexpectedValueException('Weird property visibility');
			}

			$attributes = [];

			if ($namespaced_type_string) {
				$property_docblock = [
					'description' => '',
					'specials' => [],
				];
				$property_docblock['specials']['var'] = [$namespaced_type_string];

				$property_docblock_string = Psalm\DocComment::render($property_docblock, '');

				$attributes['comments'] = [
					new \PhpParser\Comment\Doc(rtrim($property_docblock_string))
				];
			}

			$class_stmts[] = new PhpParser\Node\Stmt\Property(
				$flags,
				[
					new PhpParser\Node\Stmt\PropertyProperty(
						substr($param_name, 1),
						$default_value
					)
				],
				$attributes
			);

			$function_stmts[] = new PhpParser\Node\Stmt\Expression(
				new PhpParser\Node\Expr\Assign(
					new PhpParser\Node\Expr\PropertyFetch(
						new PhpParser\Node\Expr\Variable('this'),
						substr($param_name, 1)
					),
					new PhpParser\Node\Expr\Variable(substr($param_name, 1))
				)
			);
		}
		
		return new PhpParser\Node\Param(
			new PhpParser\Node\Expr\Variable(substr($param_name, 1)),
			$default_value,
			$param_type,
			$by_ref,
			$variadic
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