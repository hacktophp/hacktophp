<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class NamespaceUseDeclarationTransformer
{
	public static function transform(HHAST\NamespaceUseDeclaration $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$kind = $node->getKind();

		$aliases = [];

		$uses = array_map(
			function(HHAST\NamespaceUseClause $clause) use ($kind) {
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

			    $aliases[$real_alias ?? $name_alias] = $full_name;

				return new PhpParser\Node\Stmt\UseUse(new PhpParser\Node\Name($full_name), $real_alias);
			},
			$node->getClauses()->getDescendantsOfType(HHAST\NamespaceUseClause::class)
		);
		
		if ($kind instanceof HHAST\NamespaceToken || !$kind) {
			foreach ($aliases as $key => $value) {
				$file->aliased_namespaces[$key] = $value;
			}
			
			return new PhpParser\Node\Stmt\Use_($uses);
		}

		if ($kind instanceof HHAST\TypeToken) {
			foreach ($aliases as $key => $value) {
				$file->aliased_types[$key] = $value;
			}
			
			return new PhpParser\Node\Stmt\Use_($uses);
		}

		if ($kind instanceof HHAST\FunctionToken) {
			foreach ($aliases as $key => $value) {
				$file->aliased_functions[$key] = $value;
			}

			return new PhpParser\Node\Stmt\Use_($uses, PhpParser\Node\Stmt\Use_::TYPE_FUNCTION);
		}

		if ($kind instanceof HHAST\ConstToken) {
			foreach ($aliases as $key => $value) {
				$file->aliased_constants[$key] = $value;
			}

			return new PhpParser\Node\Stmt\Use_($uses, PhpParser\Node\Stmt\Use_::TYPE_CONSTANT);
		}

		throw new \UnexpectedValueException('Nothing returned for ' . ($kind ? get_class($kind) : 'null'));
	}
}