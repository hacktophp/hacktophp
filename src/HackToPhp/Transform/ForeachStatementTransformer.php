<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class ForeachStatementTransformer
{
	public static function transform(HHAST\ForeachStatement $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$expression = ExpressionTransformer::transform($node->getCollection(), $project, $file, $scope);
		$value_var = ExpressionTransformer::transform($node->getValue(), $project, $file, $scope);
		$key_var = $node->hasKey() ? ExpressionTransformer::transform($node->getKey(), $project, $file, $scope) : null;

		$stmts = NodeTransformer::transform($node->getBody(), $project, $file, $scope);

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