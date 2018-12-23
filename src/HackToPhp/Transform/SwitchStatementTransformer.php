<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class SwitchStatementTransformer
{
	public static function transform(HHAST\SwitchStatement $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$expression = ExpressionTransformer::transform($node->getExpression(), $project, $file, $scope);
		$cases = self::transformCases($node->getSections(), $project, $file, $scope);

		return new PhpParser\Node\Stmt\Switch_(
			$expression,
			$cases
		);
	}

	private static function transformCases(HHAST\EditableList $node, Project $project, HackFile $file, Scope $scope) : array
	{
		$cases = [];

		foreach ($node->getChildren() as $section) {
			if (!$section instanceof HHAST\SwitchSection) {
				throw new \UnexpectedValueException('Unexpected type of switch section ' . get_class($section));
			}

			$case_labels = $section->getLabels()->getChildren();

			$last_label = array_pop($case_labels);

			foreach ($case_labels as $label) {
				$cases[] = new PhpParser\Node\Stmt\Case_(
					$label instanceof HHAST\DefaultLabel ? null : ExpressionTransformer::transform($label->getExpression(), $project, $file, $scope)
				);
			}

			$case_label_expressions = [];

			$cases[] = new PhpParser\Node\Stmt\Case_(
				$last_label instanceof HHAST\DefaultLabel ? null : ExpressionTransformer::transform($last_label->getExpression(), $project, $file, $scope),
				NodeTransformer::transform($section->getStatements(), $project, $file, $scope)
			);
		}

		return $cases;
	}
}