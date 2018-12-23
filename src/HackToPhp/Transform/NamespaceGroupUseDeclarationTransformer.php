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

		$uses = array_map(
			function(HHAST\NamespaceUseClause $clause) {
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

				return new PhpParser\Node\Stmt\UseUse(new PhpParser\Node\Name($full_name), $name_alias);
			},
			$node->getClauses()->getDescendantsOfType(HHAST\NamespaceUseClause::class)
		);
		
		if ($kind instanceof HHAST\NamespaceToken) {
			foreach ($uses as $use) {
				$file->aliased_namespaces[(string) $use->alias] = $prefix . '\\' . $use->name;
			}
			
			return new PhpParser\Node\Stmt\GroupUse($prefix, $uses);
		}

		if ($kind instanceof HHAST\TypeToken) {
			foreach ($uses as $use) {
				$file->aliased_types[(string) $use->alias] = $prefix . '\\' . $use->name;
			}
			
			return new PhpParser\Node\Stmt\GroupUse($prefix, $uses);
		}

		if ($kind instanceof HHAST\FunctionToken) {
			foreach ($uses as $use) {
				$file->aliased_functions[(string) $use->alias] = $prefix . '\\' . $use->name;
			}

			return new PhpParser\Node\Stmt\GroupUse($prefix, $uses, PhpParser\Node\Stmt\Use_::TYPE_FUNCTION);
		}

		if ($kind instanceof HHAST\ConstToken) {
			foreach ($uses as $use) {
				$file->aliased_constants[(string) $use->alias] = $prefix . '\\' . $use->name;
			}

			return new PhpParser\Node\Stmt\GroupUse($prefix, $uses, PhpParser\Node\Stmt\Use_::TYPE_CONSTANT);
		}
	}
}