<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;
use Psalm;

class ClassishDeclarationTransformer
{
	public static function transform(HHAST\ClassishDeclaration $node, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$modifiers = $node->hasModifiers() ? $node->getModifiers()->getChildren() : null;

		$abstract = false;

		$class_type = $node->getKeyword();

		$class_name = $node->getName()->getText();

		if ($modifiers) {
			foreach ($modifiers as $modifier) {
				if ($modifier instanceof HHAST\AbstractToken) {
					$abstract = true;
				}
			}
		}

		$class_extends = $node->hasExtendsList() ? $node->getExtendsList() : null;

		$class_implements = $node->hasImplementsList() ? $node->getImplementsList() : null;

		$comments = ExpressionTransformer::getTokenComments($class_type);

		if ($class_type instanceof HHAST\ClassToken) {
			return new PhpParser\Node\Stmt\Class_(
				$class_name,
				[
					'stmts' => self::transformBody($node->getBody(), $file, $scope),
					'flags' => $abstract ? PhpParser\Node\Stmt\Class_::MODIFIER_ABSTRACT : 0
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
					'stmts' => self::transformBody($node->getBody(), $file, $scope)
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
					'stmts' => self::transformBody($node->getBody(), $file, $scope)
				],
				[
					'comments' => $comments,
				]
			);
		}

		throw new \UnexpectedValueException('Classish thing not recognised');
	}

	private static function transformBody(HHAST\ClassishBody $node, HackFile $file, Scope $scope) : array
	{
		$children = $node->hasElements() ? $node->getElements()->getChildren() : [];

		$stmts = [];

		foreach ($children as $child) {
			if ($child instanceof HHAST\PropertyDeclaration) {
				$stmts[] = self::transformProperty($child, $file, $scope);
				continue;
			}

			if ($child instanceof HHAST\MethodishDeclaration) {
				$stmts[] = FunctionDeclarationTransformer::transform($child, $file, $scope);
				continue;
			}

			if ($child instanceof HHAST\ConstDeclaration) {
				$stmts[] = ConstDeclarationTransformer::transform($child, $file, $scope, true);
				continue;
			}

			if ($child instanceof HHAST\TraitUse) {
				$stmts[] = new PhpParser\Node\Stmt\TraitUse(
					array_map(
						function(HHAST\ListItem $trait_use_item) use ($file, $scope) {
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
						function(HHAST\ListItem $trait_use_item) use ($file, $scope) {
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
						function(HHAST\ListItem $trait_use_item) use ($file, $scope) {
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
								$specifier = $trait_use_item->getAliasingName()->getSpecifier();

								return new PhpParser\Node\Stmt\TraitUseAdaptation\Alias(
									null,
									$trait_use_item->getAliasingName()->getSpecifier()->getText(),
									$flags,
									$trait_use_item->getAliasedName()->getSpecifier()->getText()
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

	private static function transformProperty(HHAST\PropertyDeclaration $node, HackFile $file, Scope $scope) : PhpParser\Node\Stmt\Property
	{
		$abstract = false;

		$flags = 0;
		$modifiers = $node->hasModifiers() ? $node->getModifiers()->getChildren() : null;

		if ($modifiers) {
			foreach ($modifiers as $modifier) {
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

		$attributes = [];

		if ($type) {
			$type_string = TypeTransformer::transform($type, $file, $scope);
			
			$psalm_type = Psalm\Type::parseString($type_string);

			$docblock = [
				'description' => '',
				'specials' => [],
			];
			$docblock['specials']['var'] = [$psalm_type->toNamespacedString($file->namespace, [], null, false)];

			$docblock_string = Psalm\DocComment::render($docblock, '');

			$attributes['comments'] = [
				new \PhpParser\Comment\Doc(rtrim($docblock_string))
			];
		}

		$declarators = $node->getDeclarators();

		$property_properties = [];

		foreach ($declarators->getChildren() as $declarator) {
			$declarator = $declarator->getItem();
			$default = null;
			
			if ($declarator->hasInitializer()) {
				$default = ExpressionTransformer::transform($declarator->getInitializer(), $file, $scope);
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