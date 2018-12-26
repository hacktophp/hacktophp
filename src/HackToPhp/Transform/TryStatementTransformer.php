<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class TryStatementTransformer
{
	public static function transform(HHAST\TryStatement $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$stmts = NodeTransformer::transform($node->getCompoundStatement(), $project, $file, $scope);

		$catches = $node->hasCatchClauses() ? self::transformCatches($node->getCatchClauses(), $project, $file, $scope) : [];
		$finally = $node->hasFinallyClause()
			? new PhpParser\Node\Stmt\Finally_(
				NodeTransformer::transform($node->getFinallyClause()->getBody(), $project, $file, $scope)
			)
			: null;

		return new PhpParser\Node\Stmt\TryCatch(
			$stmts,
			$catches,
			$finally
		);
	}

	private static function transformCatches(HHAST\EditableList $node, Project $project, HackFile $file, Scope $scope) : array
	{
		return array_map(
			function(HHAST\CatchClause $node) use ($project, $file, $scope) {
				$class_type = TypeTransformer::transform($node->getType(), $project, $file, $scope);
				$psalm_type = array_values(\Psalm\Type::parseString($class_type)->getTypes())[0];
				$class = TypeTransformer::getPhpParserTypeFromAtomicPsalm($psalm_type, $project, $file, $scope);
				$variable = ExpressionTransformer::transformVariableName($node->getVariable(), $project, $file, $scope);

				return new PhpParser\Node\Stmt\Catch_(
					[$class],
					$variable,
					NodeTransformer::transform($node->getBody(), $project, $file, $scope)
				);
			},
			$node->getChildren()
		);
	}
}