<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class ObjectCreationExpressionTransformer
{
	public static function transform(HHAST\ObjectCreationExpression $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node\Expr
	{
		$object = $node->getObject();

		$args = FunctionCallExpressionTransformer::transformArguments($object->getArgumentList(), $project, $file, $scope);

		switch (get_class($object)) {
			case HHAST\AnonymousClass::class:
				$class = ExpressionTransformer::transform($object, $project, $file, $scope);
				break;

			case HHAST\ConstructorCall::class:
				if ($object->getType() instanceof HHAST\VariableExpression) {
					$class = ExpressionTransformer::transform($object->getType(), $project, $file, $scope);
				} else {
					$class_type = TypeTransformer::transform($object->getType(), $project, $file, $scope);
					if ($class_type === 'static' || $class_type === 'self') {
						$class = new \PhpParser\Node\Name($class_type);
					} else {
						$psalm_type = array_values(\Psalm\Type::parseString($class_type)->getTypes())[0];
						$class = TypeTransformer::getPhpParserTypeFromAtomicPsalm($psalm_type, $project, $file, $scope);

						if (!$class instanceof PhpParser\Node\Name) {
							throw new \UnexpectedValueException('Unexpected new class ' . get_class($class));
						}
					}
				}

				break;
		}

		return new PhpParser\Node\Expr\New_(
			$class,
			$args
		);
	}
}