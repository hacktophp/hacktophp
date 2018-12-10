<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class TryStatementTransformer
{
	public static function transform(HHAST\TryStatement $node, HackFile $file) : PhpParser\Node
	{
		$stmts = NodeTransformer::transform($node->getCompoundStatement(), $file);

		$catches = $node->hasCatchClauses() ? self::transformCatches($node->getCatchClauses(), $file) : null;
		$finally = $node->hasFinallyClause()
			? new PhpParser\Node\Expr\Finally_(
				NodeTransformer::transform($node->getFinally()->getStatement())
			)
			: null;

		return new PhpParser\Node\Stmt\TryCatch(
			$stmts,
			$catches,
			$finally
		);
	}

	private static function transformCatches(HHAST\EditableList $node, HackFile $file) : array
	{
		return array_map(
			function(HHAST\CatchClause $node) use ($file) {
				$class_type = TypeTransformer::transform($node->getType(), $file);
				$psalm_type = array_values(\Psalm\Type::parseString($class_type)->getTypes())[0];
				$class = TypeTransformer::getPhpParserTypeFromAtomicPsalm($psalm_type, $file);
				$variable = ExpressionTransformer::transformVariableName($node->getVariable(), $file);

				return new PhpParser\Node\Stmt\Catch_(
					[new PhpParser\Node\Name($class_type)],
					$variable,
					NodeTransformer::transform($node->getBody(), $file)
				);
			},
			$node->getChildren()
		);
	}
}