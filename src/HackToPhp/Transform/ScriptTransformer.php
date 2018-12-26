<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class ScriptTransformer
{
	public static function transform(HHAST\Script $node, Project $project, HackFile $file, Scope $scope)
	{
		$declarations = array_values($node->getDeclarations()->getChildren());

		$stmts = [];

		foreach ($declarations as $i => $declaration) {
			$declaration = $declarations[$i];

			if ($declaration instanceof HHAST\NamespaceDeclaration) {
				$file->namespace = $declaration->getQualifiedNameAsString();

				if ($declaration->hasBody() && !$declaration->getBody() instanceof HHAST\NamespaceEmptyBody) {
					$namespace_stmts = NodeTransformer::transform($declaration->getBody()->getDeclarations(), $project, $file, $scope);
				} else {
					$namespace_stmts = [];

					foreach (array_slice($declarations, $i + 1) as $sub_node) {
						$namespace_stmts[] = NodeTransformer::transform($sub_node, $project, $file, $scope);
					}
				}

				$stmts[] = new PhpParser\Node\Stmt\Namespace_(
					$file->namespace ? new PhpParser\Node\Name($file->namespace) : null,
					$namespace_stmts,
					[
						'comments' => ExpressionTransformer::getTokenComments($declaration->getKeyword())
					]
				);

				$file->namespace = '';

				continue;
			}

			$stmts[] = NodeTransformer::transform($declaration, $project, $file, $scope);
		}

		return $stmts;
	}
}