<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;
use Psalm;

class TypeCollector
{
	public static function collect(HHAST\EditableNode $node, Project $project, HackFile $file, Scope $scope)
	{
		if ($node instanceof HHAST\EditableList) {
			return self::transformList($node, $project, $file, $scope);
		}
		
		if ($node instanceof HHAST\Script) {
			$declarations = array_values($node->getDeclarations()->getChildren());

			foreach ($declarations as $i => $declaration) {
				if ($declaration instanceof HHAST\NamespaceDeclaration) {
					$file->namespace = $declaration->getQualifiedNameAsString();

					foreach (array_slice($declarations, $i + 1) as $d) {
						self::collect($d, $project, $file, $scope);
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