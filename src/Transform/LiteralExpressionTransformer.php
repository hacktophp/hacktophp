<?php

namespace HackToPhp\Transform;

use HackToPhp\HHAST;
use PhpParser;

class LiteralExpressionTransformer
{
	public static function transform(HHAST\LiteralExpression $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node\Expr
	{
		$literal = $node->getExpression();

		switch (get_class($literal)) {
			case HHAST\SingleQuotedStringLiteralToken::class:
				return new PhpParser\Node\Scalar\String_(
					str_replace(['\\\\', '\\\''], ['\\', '\''], substr($literal->getText(), 1, -1))
				);
				
			case HHAST\DoubleQuotedStringLiteralToken::class:
				return new PhpParser\Node\Scalar\String_(
					stripcslashes(substr($literal->getText(), 1, -1))
				);

			case HHAST\NullLiteralToken::class:
			case HHAST\BooleanLiteralToken::class:
				return new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name($literal->getText()));

			case HHAST\DecimalLiteralToken::class:
				$value = $literal->getText();
				
				if (!strpos($value, '.')) {
					return new PhpParser\Node\Scalar\LNumber((int) $value);
				}

				return new PhpParser\Node\Scalar\DNumber((float) $value);

			case HHAST\FloatingLiteralToken::class:
				$value = $literal->getText();

				return new PhpParser\Node\Scalar\DNumber((float) $value);

			case HHAST\ExecutionStringLiteralToken::class:
				return new PhpParser\Node\Expr\ShellExec([
					new PhpParser\Node\Scalar\EncapsedStringPart(
						substr($literal->getText(), 1, -1)
					)
				]);

			case HHAST\EditableList::class:
				$children = $literal->getChildren();
				$first_child = $children[0];

				if ($first_child instanceof HHAST\ExecutionStringLiteralHeadToken) {
					return new PhpParser\Node\Expr\ShellExec(
						array_map(
							function($item) use ($project, $file, $scope) {
								if ($item instanceof HHAST\ExecutionStringLiteralHeadToken) {
									return new PhpParser\Node\Scalar\EncapsedStringPart(
										stripcslashes(substr($item->getText(), 1))
									);
								}

								if ($item instanceof HHAST\ExecutionStringLiteralTailToken) {
									return new PhpParser\Node\Scalar\EncapsedStringPart(
										stripcslashes(substr($item->getText(), 0, -1))
									);
								}

								return ExpressionTransformer::transform($item, $project, $file, $scope);
							},
							$literal->getChildren()
						)
					);
				}

				return new PhpParser\Node\Scalar\Encapsed(
					array_map(
						function($item) use ($project, $file, $scope) {
							if ($item instanceof HHAST\DoubleQuotedStringLiteralHeadToken) {
								return new PhpParser\Node\Scalar\EncapsedStringPart(
									stripcslashes(substr($item->getText(), 1))
								);
							}

							if ($item instanceof HHAST\DoubleQuotedStringLiteralTailToken) {
								return new PhpParser\Node\Scalar\EncapsedStringPart(
									stripcslashes(substr($item->getText(), 0, -1))
								);
							}

							return ExpressionTransformer::transform($item, $project, $file, $scope);
						},
						$literal->getChildren()
					)
				);
		}

		throw new \UnexpectedValueException('Unknown literal expression ' . get_class($literal));
	}
}