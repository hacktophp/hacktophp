<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class NamespaceUseDeclarationTransformer
{
	public static function transform(HHAST\Node\NamespaceUseDeclaration $node, HackFile $file) : PhpParser\Node
	{
		$kind = $node->getKind();

		$uses = array_map(
			function(HHAST\Node\NamespaceUseClause $clause) {
				$name = $clause->getName();
			    if ($name instanceof HHAST\Token\NameToken) {
			      	$full_name = $name->getText();
			    } else {
			    	$full_name = implode(
				    	"\\",
				    	array_map(
				    		function($t) { return $t->getText(); },
				    		$clause->getDescendantsOfType(HHAST\Token\NameToken::class)
				    	)
			    	);
			    }

				return new PhpParser\Node\Stmt\UseUse(new PhpParser\Node\Name($full_name));
			},
			$node->getClauses()->getDescendantsOfType(HHAST\Node\NamespaceUseClause::class)
		);
		
		if ($kind instanceof HHAST\Token\NamespaceToken
			|| $kind instanceof HHAST\Token\TypeToken
		) {
			return new PhpParser\Node\Stmt\Use_($uses);
		}

		if ($kind instanceof HHAST\Token\FunctionToken) {
			return new PhpParser\Node\Stmt\Use_($uses, PhpParser\Node\Stmt\Use_::TYPE_FUNCTION);
		}

		if ($kind instanceof HHAST\Token\ConstToken) {
			return new PhpParser\Node\Stmt\Use_($uses, PhpParser\Node\Stmt\Use_::TYPE_CONSTANT);
		}
	}
}