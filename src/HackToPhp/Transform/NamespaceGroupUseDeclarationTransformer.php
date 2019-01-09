<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class NamespaceGroupUseDeclarationTransformer
{
	public static function transform(HHAST\NamespaceGroupUseDeclaration $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$kind = $node->getKind();
		$prefix = QualifiedNameTransformer::transform($node->getPrefix());

		$aliases = [];

		$uses = array_map(
			function(HHAST\NamespaceUseClause $clause) use (&$aliases, $prefix) {
				$name = $clause->getName();
			    if ($name instanceof HHAST\NameToken) {
			      	$full_name = $name->getText();
			    } else {
			    	$full_name = implode(
				    	"\\",
				    	array_map(
				    		function($t) { return $t->getText(); },
				    		$clause->getName()->getDescendantsOfType(HHAST\NameToken::class)
				    	)
			    	);
			    }

			    $name_parts = explode('\\', $full_name);
			    $name_alias = end($name_parts);

			    $real_alias = $clause->hasAlias() ? $clause->getAlias()->getText() : null;

			    $aliases[$real_alias ?? $name_alias] = $prefix . '\\' . $full_name;

				return new PhpParser\Node\Stmt\UseUse(new PhpParser\Node\Name($full_name), $real_alias);
			},
			$node->getClauses()->getDescendantsOfType(HHAST\NamespaceUseClause::class)
		);
		
		if ($kind instanceof HHAST\NamespaceToken || !$kind) {
			foreach ($aliases as $key => $value) {
				$file->aliased_namespaces[$key] = $value;
			}
			
			return new PhpParser\Node\Stmt\GroupUse($prefix, $uses);
		}

		if ($kind instanceof HHAST\TypeToken) {
			$all_known_types = true;

			foreach ($aliases as $key => $value) {
				if (isset($project->types[$value])) {
					$file->aliased_types[$key] = $value;
				} else {
					$file->aliased_namespaces[$key] = $value;
					$all_known_types = false;
				}
			}

			if ($all_known_types) {
				return new PhpParser\Node\Stmt\Nop();
			}
			
			return new PhpParser\Node\Stmt\GroupUse($prefix, $uses);
		}

		if ($kind instanceof HHAST\FunctionToken) {
			foreach ($aliases as $key => $value) {
				$file->aliased_functions[$key] = $value;
			}

			return new PhpParser\Node\Stmt\GroupUse($prefix, $uses, PhpParser\Node\Stmt\Use_::TYPE_FUNCTION);
		}

		if ($kind instanceof HHAST\ConstToken) {
			foreach ($aliases as $key => $value) {
				$file->aliased_constants[$key] = $value;
			}

			return new PhpParser\Node\Stmt\GroupUse($prefix, $uses, PhpParser\Node\Stmt\Use_::TYPE_CONSTANT);
		}
	}
}