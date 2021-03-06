<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;
use Psalm;

class TypeCollector
{
	public static function collect(HHAST\Node $node, Project $project, HackFile $file, Scope $scope)
	{
		if ($node instanceof HHAST\NodeList) {
			foreach ($node->getChildren() as $child) {
				if ($child instanceof HHAST\ListItem) {
					$child = $child->getItem();
				}

				if (!$child) {
					continue;
				}

				self::collect($child, $project, $file, $scope);
			}

			return;
		}
		
		if ($node instanceof HHAST\Script) {
			$declarations = array_values($node->getDeclarations()->getChildren());

			foreach ($declarations as $i => $declaration) {
				if ($declaration instanceof HHAST\NamespaceDeclaration) {
					$file->namespace = $declaration->getQualifiedNameAsString();

					$namespace_name = $declaration->getQualifiedNameAsString();

					$file->namespace = $namespace_name;

					if ($declaration->hasBody() && !$declaration->getBody() instanceof HHAST\NamespaceEmptyBody && $declaration->getBody()->getDeclarations()) {
						self::collect($declaration->getBody()->getDeclarations(), $project, $file, $scope);
					} else {
						foreach (array_slice($declarations, $i + 1) as $sub_node) {
							self::collect($sub_node, $project, $file, $scope);
						}
					}

					if ($declaration->hasBody() && !$declaration->getBody() instanceof HHAST\NamespaceEmptyBody) {
						$file->namespace = '';

						continue;
					}

					return;
				}

				self::collect($declaration, $project, $file, $scope);
			}

			return;
		}

		if ($node instanceof HHAST\NamespaceUseDeclaration) {
			$kind = $node->getKind();

			if (!$kind || $kind instanceof HHAST\TypeToken) {
				$uses = array_map(
					function(HHAST\NamespaceUseClause $clause) use ($file) {
						$name = $clause->getName();
					    if ($name instanceof HHAST\NameToken) {
					      	$full_name = $name->getText();
					    } else {
					    	$full_name = implode(
						    	"\\",
						    	array_map(
						    		function($t) { return $t->getText(); },
						    		$clause->getDescendantsOfType(HHAST\NameToken::class)
						    	)
					    	);
					    }

					    $name_parts = explode('\\', $full_name);
					    $name_alias = end($name_parts);

					    $file->aliased_types[$name_alias] = $full_name;
					},
					$node->getClauses()->getDescendantsOfType(HHAST\NamespaceUseClause::class)
				);
			}

			return;
		}

		if ($node instanceof HHAST\NamespaceGroupUseDeclaration) {
			$kind = $node->getKind();
			$prefix = QualifiedNameTransformer::transform($node->getPrefix());

			if (!$kind || $kind instanceof HHAST\TypeToken) {
				$uses = array_map(
					function(HHAST\NamespaceUseClause $clause) use ($file, $prefix) {
						$name = $clause->getName();
					    if ($name instanceof HHAST\NameToken) {
					      	$full_name = $name->getText();
					    } else {
					    	$full_name = implode(
						    	"\\",
						    	array_map(
						    		function($t) { return $t->getText(); },
						    		$clause->getDescendantsOfType(HHAST\NameToken::class)
						    	)
					    	);
					    }

					    $name_parts = explode('\\', $full_name);
					    $name_alias = end($name_parts);

					    $file->aliased_types[$name_alias] = $prefix . '\\' . $full_name;
					},
					$node->getClauses()->getDescendantsOfType(HHAST\NamespaceUseClause::class)
				);
			}

			return;
		}

		if ($node instanceof HHAST\EnumDeclaration) {
			$name = ($file->namespace ? $file->namespace . '\\' : '') . $node->getName()->getText();

			$enumerators = $node->getEnumerators()->getChildren();

			$enum_union = [];

			foreach ($enumerators as $enumerator) {
				$enum_union[] = $name . '::' . $enumerator->getName()->getText();
			}

			$project->types[$name] = implode('|', $enum_union);

			return;
		}

		if ($node instanceof HHAST\AliasDeclaration) {
			$name = ($file->namespace ? $file->namespace . '\\' : '') . $node->getName()->getText();

			$type = TypeTransformer::transform($node->getType(), $project, $file, $scope);

			$project->types[$name] = $type;
			return;
		}
	}
}