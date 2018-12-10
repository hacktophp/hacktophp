<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class FunctionCallExpressionTransformer
{
	public static function transform(HHAST\FunctionCallExpression $node, HackFile $file) : PhpParser\Node
	{
		$receiver = $node->getReceiver();

		$args = self::transformArguments($node->getArgumentList(), $file);

		if ($receiver instanceof HHAST\ScopeResolutionExpression) {
			$class = ExpressionTransformer::transformVariableName($receiver->getQualifier(), $file);
			$name = ExpressionTransformer::transformVariableName($receiver->getName(), $file);

			return new PhpParser\Node\Expr\StaticCall(
				$class,
				$name,
				$args
			);
		}

		if ($receiver instanceof HHAST\QualifiedName) {
			$name = QualifiedNameTransformer::transform($receiver);

		    return new PhpParser\Node\Expr\FuncCall(
		    	$name,
		    	$args
			);
		}

		if ($receiver instanceof HHAST\NameToken) {
			return new PhpParser\Node\Expr\FuncCall(
		    	new PhpParser\Node\Name($receiver->getText()),
		    	$args
			);
		}

		if ($receiver instanceof HHAST\MemberSelectionExpression) {
			$object = ExpressionTransformer::transform($receiver->getObject(), $file);
			$name = ExpressionTransformer::transformVariableName($receiver->getName(), $file);

			return new PhpParser\Node\Expr\MethodCall(
				$object,
				$name,
				$args
			);
		}

		var_dump($receiver);
	}

	public static function transformArguments(?HHAST\EditableList $node, HackFile $file) : array
	{
		if (!$node) {
			return [];
		}

		return array_map(
			function (HHAST\EditableNode $node) use ($file) {
				return ExpressionTransformer::transform($node->getItem(), $file);
			},
			$node->getChildren()
		);
	}
}