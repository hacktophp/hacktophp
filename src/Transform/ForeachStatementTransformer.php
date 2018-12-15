<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class ForeachStatementTransformer
{
	public static function transform(HHAST\ForeachStatement $node, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$expression = ExpressionTransformer::transform($node->getCollection(), $file, $scope);
		$value_var = ExpressionTransformer::transform($node->getValue(), $file, $scope);
		$key_var = $node->hasKey() ? ExpressionTransformer::transform($node->getKey(), $file, $scope) : null;

		$stmts = NodeTransformer::transform($node->getBody(), $file, $scope);

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