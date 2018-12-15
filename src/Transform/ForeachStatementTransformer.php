<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class ForeachStatementTransformer
{
	public static function transform(HHAST\ForeachStatement $node, HackFile $file) : PhpParser\Node
	{
		$expression = ExpressionTransformer::transform($node->getCollection(), $file);
		$value_var = ExpressionTransformer::transform($node->getValue(), $file);
		$key_var = $node->hasKey() ? ExpressionTransformer::transform($node->getKey(), $file) : null;

		$stmts = NodeTransformer::transform($node->getBody(), $file);

		return new PhpParser\Node\Stmt\Foreach_(
			$expression,
			$value_var,
			[
				'keyVar' => $key_var,
				'stmts' => $stmts
			]
		);
	}
}