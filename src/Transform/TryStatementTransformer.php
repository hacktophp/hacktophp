<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class TryStatementTransformer
{
	public static function transform(HHAST\TryStatement $node, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$stmts = NodeTransformer::transform($node->getCompoundStatement(), $file, $scope);

		$catches = $node->hasCatchClauses() ? self::transformCatches($node->getCatchClauses(), $file, $scope) : null;
		$finally = $node->hasFinallyClause()
			? new PhpParser\Node\Stmt\Finally_(
				NodeTransformer::transform($node->getFinallyClause()->getBody(), $file, $scope)
			)
			: null;

		return new PhpParser\Node\Stmt\TryCatch(
			$stmts,
			$catches,
			$finally
		);
	}

	private static function transformCatches(HHAST\EditableList $node, HackFile $file, Scope $scope) : array
	{
		return array_map(
			function(HHAST\CatchClause $node) use ($file, $scope) {
				$class_type = TypeTransformer::transform($node->getType(), $file, $scope);
				$psalm_type = array_values(\Psalm\Type::parseString($class_type)->getTypes())[0];
				$class = TypeTransformer::getPhpParserTypeFromAtomicPsalm($psalm_type, $file, $scope);
				$variable = ExpressionTransformer::transformVariableName($node->getVariable(), $file, $scope);

				return new PhpParser\Node\Stmt\Catch_(
					[$class],
					$variable,
					NodeTransformer::transform($node->getBody(), $file, $scope)
				);
			},
			$node->getChildren()
		);
	}
}