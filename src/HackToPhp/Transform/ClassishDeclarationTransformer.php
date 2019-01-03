<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;
use Psalm;

class ClassishDeclarationTransformer
{
	/**
	 * @param  HHAST\ClassishDeclaration|HHAST\AnonymousClass $node
	 */
	public static function transform($node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$modifiers = null;

		$comments = [];

		if ($node instanceof HHAST\ClassishDeclaration) {
			$comments = ExpressionTransformer::getTokenCommentsRecursively($node);

			if ($node->hasModifiers()) {
				$modifiers = $node->getModifiers()->getChildren();
			}
		}

		$flags = 0;

		$class_name = null;
		$class_type = null;

		if ($node instanceof HHAST\ClassishDeclaration) {
			$class_type = $node->getKeyword();
			$class_name = $node->getName()->getText();
		}

		if ($modifiers) {
			foreach ($modifiers as $modifier) {
				if ($modifier instanceof HHAST\AbstractToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_ABSTRACT;
				} elseif ($modifier instanceof HHAST\FinalToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_FINAL;
				}
			}
		}

		$templates = [];

		$template_map = [];

		if ($node->hasTypeParameters()) {
			$type_parameters = $node
				->getTypeParameters()
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

						$template_map[$type_parameter_name] = $constraint_node_type;
						if ($constraint_node->getKeyword() instanceof HHAST\AsToken) {
							$psalm_return_type = Psalm\Type::parseString($constraint_node_type);
							$constraints[] = ' as ' . $psalm_return_type->toNamespacedString($file->namespace, [], null, false);
						}
					}
				} else {
					$template_map[$type_parameter_name] = 'mixed';
				}

				$templates[] = $type_parameter_name . implode(' ', $constraints);
			}

			$docblock = [
				'description' => null,
				'specials' => [
					'template' => $templates
				]
			];

			$docblock_string = Psalm\DocComment::render($docblock, '');

			$comments[] = new \PhpParser\Comment\Doc(rtrim($docblock_string));
		}		

		$parent_class_nodes = $node->hasExtendsList() ? $node->getExtendsList()->getChildren() : [];

		$parent_classes = [];

		foreach ($parent_class_nodes as $parent_class_node) {
			$parent_class_node = $parent_class_node->getItem();

			if ($parent_class_node instanceof HHAST\GenericTypeSpecifier) {
				$specifier = $parent_class_node->getClassType();
			} else {
				$specifier = $parent_class_node->getSpecifier();
			}

			if ($specifier instanceof HHAST\NameToken) {
				$parent_classes[] = new PhpParser\Node\Name($specifier->getText());
			} else {
				$parent_classes[] = QualifiedNameTransformer::transform($specifier);
			}
		}

		$class_implements_nodes = $node->hasImplementsList() ? $node->getImplementsList()->getChildren() : [];

		$implementing_interfaces = [];

		foreach ($class_implements_nodes as $class_implements_node) {
			$class_implements_node = $class_implements_node->getItem();

			if ($class_implements_node instanceof HHAST\GenericTypeSpecifier) {
				$specifier = $class_implements_node->getClassType();
			} else {
				$specifier = $class_implements_node->getSpecifier();
			}

			if ($specifier instanceof HHAST\NameToken) {
				$implementing_interfaces[] = new PhpParser\Node\Name($specifier->getText());
			} else {
				$implementing_interfaces[] = QualifiedNameTransformer::transform($specifier);
			}
		}

		if ($class_type instanceof HHAST\ClassToken || !$class_type) {
			return new PhpParser\Node\Stmt\Class_(
				$class_name,
				[
					'stmts' => self::transformBody($node->getBody(), $project, $file, $scope, $template_map),
					'flags' => $flags,
					'extends' => $parent_classes ? $parent_classes[0] : null,
					'implements' => $implementing_interfaces
				],
				[
					'comments' => $comments,
				]
			);
		}

		if ($class_type instanceof HHAST\InterfaceToken) {
			return new PhpParser\Node\Stmt\Interface_(
				$class_name,
				[
					'stmts' => self::transformBody($node->getBody(), $project, $file, $scope, $template_map),
					'extends' => $parent_classes
				],
				[
					'comments' => $comments,
				]
			);
		}

		if ($class_type instanceof HHAST\TraitToken) {
			return new PhpParser\Node\Stmt\Trait_(
				$class_name,
				[
					'stmts' => self::transformBody($node->getBody(), $project, $file, $scope, $template_map)
				],
				[
					'comments' => $comments,
				]
			);
		}

		throw new \UnexpectedValueException('Classish thing not recognised');
	}

	private static function transformBody(
		HHAST\ClassishBody $node,
		Project $project,
		HackFile $file,
		Scope $scope,
		array $template_map
	) : array {
		$children = $node->hasElements() ? $node->getElements()->getChildren() : [];

		$stmts = [];

		foreach ($children as $child) {
			if ($child instanceof HHAST\PropertyDeclaration) {
				$stmts[] = self::transformProperty(
					$child,
					$project,
					$file,
					$scope,
					$template_map
				);
				continue;
			}

			if ($child instanceof HHAST\MethodishDeclaration) {
				$stmt = FunctionDeclarationTransformer::transform(
					$child,
					$project,
					$file,
					$scope,
					$template_map,
					$stmts
				);

				$stmts[] = $stmt;
				continue;
			}

			if ($child instanceof HHAST\ConstDeclaration) {
				if ($child->hasAbstract()) {
					continue;
				}
				
				$stmts[] = ConstDeclarationTransformer::transform($child, $project, $file, $scope, true);
				continue;
			}

			if ($child instanceof HHAST\TraitUse) {
				$stmts[] = new PhpParser\Node\Stmt\TraitUse(
					array_map(
						function(HHAST\ListItem $trait_use_item) use ($project, $file, $scope) {
							$trait_use_item = $trait_use_item->getItem();

							if ($trait_use_item instanceof HHAST\GenericTypeSpecifier) {
								$specifier = $trait_use_item->getClassType();
							} else {
								$specifier = $trait_use_item->getSpecifier();
							}

							if ($specifier instanceof HHAST\NameToken) {
								return new PhpParser\Node\Name($specifier->getText());
							}

							return QualifiedNameTransformer::transform($specifier, $file);
						},
						$child->getNames()->getChildren()
					)
				);
				continue;
			}

			if ($child instanceof HHAST\TraitUseConflictResolution) {
				$stmts[] = new PhpParser\Node\Stmt\TraitUse(
					array_map(
						function(HHAST\ListItem $trait_use_item) use ($project, $file, $scope) {
							$trait_use_item = $trait_use_item->getItem();
							$specifier = $trait_use_item->getSpecifier();

							if ($specifier instanceof HHAST\NameToken) {
								return new PhpParser\Node\Name($specifier->getText());
							}

							return QualifiedNameTransformer::transform($specifier, $file);
						},
						$child->getNames()->getChildren()
					),
					array_map(
						function(HHAST\ListItem $trait_use_item) use ($project, $file, $scope) {
							$trait_use_item = $trait_use_item->getItem();

							$modifiers = $trait_use_item->getModifiers();

							$flags = null;

							if ($modifiers) {
								$flags = 0;

								foreach ($modifiers as $modifier) {
									if ($modifier instanceof HHAST\PublicToken) {
										$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PUBLIC;
									} elseif ($modifier instanceof HHAST\ProtectedToken) {
										$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PROTECTED;
									} elseif ($modifier instanceof HHAST\PrivateToken) {
										$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PRIVATE;
									}
								}
							}

							if ($trait_use_item instanceof HHAST\TraitUseAliasItem) {
								$aliasing_name = $trait_use_item->getAliasingName();

								if ($aliasing_name instanceof HHAST\ScopeResolutionExpression) {
									$qualifier = $aliasing_name->getQualifier();

									if ($qualifier instanceof HHAST\EditableToken) {
										$class = $qualifier->getText();
									} elseif ($qualifier instanceof HHAST\QualifiedName) {
										$class = QualifiedNameTransformer::getText($qualifier);
									} elseif ($qualifier instanceof HHAST\SimpleTypeSpecifier) {
										$class = $qualifier->getSpecifier()->getText();
									} else {
										throw new \UnexpectedValueException('Bad');
									}

									$relative_method_id = $class . '::' . $aliasing_name->getName()->getText();
								} else {
									$specifier = $aliasing_name->getSpecifier();
									$relative_method_id = $specifier->getText();
								}

								$aliased_name = $trait_use_item->getAliasedName();

								if ($aliased_name instanceof HHAST\SimpleTypeSpecifier) {
									$aliased_name = $aliased_name->getSpecifier();
								}

								return new PhpParser\Node\Stmt\TraitUseAdaptation\Alias(
									null,
									$relative_method_id,
									$flags,
									$aliased_name->getText()
								);
							}

							return $adaptation;
						},
						$child->getClauses()->getChildren()
					)
				);
				continue;
			}

			if ($child instanceof HHAST\TypeConstDeclaration) {
				// TODO support this
				continue;
			}

			if ($child instanceof HHAST\RequireClause) {
				// TODO support this
				continue;
			}

			throw new \UnexpectedValueException('Unrecognised class member ' . get_class($child));
		}

		return $stmts;
	}

	private static function transformProperty(
		HHAST\PropertyDeclaration $node,
		Project $project,
		HackFile $file,
		Scope $scope,
		array $template_map
	) : PhpParser\Node\Stmt\Property {
		$abstract = false;

		$flags = 0;
		$modifiers = $node->hasModifiers() ? $node->getModifiers()->getChildren() : null;

		$attributes = [
			'comments' => []
		];

		if ($modifiers) {
			foreach ($modifiers as $modifier) {
				$attributes['comments'] = array_merge(
					$attributes['comments'],
					ExpressionTransformer::getTokenComments($modifier)
				);

				if ($modifier instanceof HHAST\PublicToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PUBLIC;
				} elseif ($modifier instanceof HHAST\ProtectedToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PROTECTED;
				} elseif ($modifier instanceof HHAST\PrivateToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_PRIVATE;
				} elseif ($modifier instanceof HHAST\StaticToken) {
					$flags |= PhpParser\Node\Stmt\Class_::MODIFIER_STATIC;
				}
			}
		}

		$type = $node->hasType() ? $node->getType() : null;

		if ($type) {
			$type_string = TypeTransformer::transform($type, $project, $file, $scope, $template_map);
			
			$psalm_type = Psalm\Type::parseString($type_string);

			$docblock = [
				'description' => '',
				'specials' => [],
			];
			$docblock['specials']['var'] = [$psalm_type->toNamespacedString($file->namespace, [], null, false)];

			$docblock_string = Psalm\DocComment::render($docblock, '');

			$attributes['comments'][] = new \PhpParser\Comment\Doc(rtrim($docblock_string));
		}

		$declarators = $node->getDeclarators();

		$property_properties = [];

		foreach ($declarators->getChildren() as $declarator) {
			$declarator = $declarator->getItem();
			$default = null;
			
			if ($declarator->hasInitializer()) {
				$default = ExpressionTransformer::transform($declarator->getInitializer(), $project, $file, $scope);
			}

			$property_properties[] = new PhpParser\Node\Stmt\PropertyProperty(
				substr($declarator->getName()->getText(), 1),
				$default
			);
		}

		return new PhpParser\Node\Stmt\Property(
			$flags,
			$property_properties,
			$attributes
		);
	}
}