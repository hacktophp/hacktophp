<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class ObjectCreationExpressionTransformer
{
	public static function transform(HHAST\ObjectCreationExpression $node, HackFile $file, Scope $scope) : PhpParser\Node\Expr
	{
		$object = $node->getObject();

		$args = FunctionCallExpressionTransformer::transformArguments($object->getArgumentList(), $file, $scope);

		switch (get_class($object)) {
			case HHAST\AnonymousClass::class:
				$class = new PhpParser\Stmt\Class_();
				break;

			case HHAST\ConstructorCall::class:
				if ($object->getType() instanceof HHAST\VariableExpression) {
					$class = ExpressionTransformer::transform($object->getType(), $file, $scope);
				} else {
					$class_type = TypeTransformer::transform($object->getType(), $file, $scope);
					if ($class_type === 'static') {
						$class = new \PhpParser\Node\Name('static');
					} else {
						$psalm_type = array_values(\Psalm\Type::parseString($class_type)->getTypes())[0];
						$class = TypeTransformer::getPhpParserTypeFromAtomicPsalm($psalm_type, $file, $scope);

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