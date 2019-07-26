<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class LiteralExpressionTransformer
{
	public static function transform(HHAST\LiteralExpression $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node\Expr
	{
		$literal = $node->getExpression();

		switch (get_class($literal)) {
			case HHAST\SingleQuotedStringLiteralToken::class:
				return new PhpParser\Node\Scalar\String_(
					str_replace(['\\\\', '\\\''], ['\\', '\''], substr($literal->getText(), 1, -1)),
					[
						'kind' => PhpParser\Node\Scalar\String_::KIND_SINGLE_QUOTED
					]
				);
				
			case HHAST\DoubleQuotedStringLiteralToken::class:
				return new PhpParser\Node\Scalar\String_(
					stripcslashes(substr($literal->getText(), 1, -1)),
					[
						'kind' => PhpParser\Node\Scalar\String_::KIND_DOUBLE_QUOTED
					]
				);

			case HHAST\NullLiteralToken::class:
			case HHAST\BooleanLiteralToken::class:
				return new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name($literal->getText()));

			case HHAST\OctalLiteralToken::class:
				return new PhpParser\Node\Scalar\LNumber(
					(int) $literal->getText(),
					['kind' => PhpParser\Node\Scalar\LNumber::KIND_OCT]
				);

			case HHAST\BinaryLiteralToken::class:
				return new PhpParser\Node\Scalar\LNumber(
					(int) $literal->getText(),
					['kind' => PhpParser\Node\Scalar\LNumber::KIND_BIN]
				);

			case HHAST\HexadecimalLiteralToken::class:
				return new PhpParser\Node\Scalar\LNumber(
					(int) $literal->getText(),
					['kind' => PhpParser\Node\Scalar\LNumber::KIND_HEX]
				);

			case HHAST\DecimalLiteralToken::class:
				$value = $literal->getText();
				
				if (!strpos($value, '.')) {
					return new PhpParser\Node\Scalar\LNumber((int) $value);
				}

				return new PhpParser\Node\Scalar\DNumber((float) $value);

			case HHAST\HeredocStringLiteralToken::class:
				$lines = explode("\n", $literal->getText());
				array_pop($lines);
				$doc_label = preg_replace('/^<<</', '', \array_shift($lines));

				return new PhpParser\Node\Scalar\String_(
					implode("\n", $lines),
					[
						'kind' => PhpParser\Node\Scalar\String_::KIND_HEREDOC,
						'docLabel' => $doc_label,
						'docIndentation' => '',
					]
				);

			case HHAST\FloatingLiteralToken::class:
				$value = $literal->getText();

				return new PhpParser\Node\Scalar\DNumber((float) $value);

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

								if ($item instanceof HHAST\StringLiteralBodyToken) {
									return new PhpParser\Node\Scalar\EncapsedStringPart(
										stripcslashes(substr($item->getText(), 1))
									);
								}

								return ExpressionTransformer::transform($item, $project, $file, $scope);
							},
							$literal->getChildren()
						)
					);
				}

				if ($first_child instanceof HHAST\HeredocStringLiteralHeadToken) {
					$first_line = explode("\n", $first_child->getText())[0];
					$doc_label = preg_replace('/^<<</', '', $first_line);
					$quoted_label = preg_quote($doc_label, '/');

					return new PhpParser\Node\Scalar\Encapsed(
						array_map(
							function($item) use ($project, $file, $scope, $quoted_label) {
								if ($item instanceof HHAST\HeredocStringLiteralHeadToken) {
									return new PhpParser\Node\Scalar\EncapsedStringPart(
										PhpParser\Node\Scalar\String_::parseEscapeSequences(
											preg_replace('/^<<<' . $quoted_label . '\n/', '', $item->getText()),
											null
										)
									);
								}

								if ($item instanceof HHAST\HeredocStringLiteralTailToken) {
									return new PhpParser\Node\Scalar\EncapsedStringPart(
										PhpParser\Node\Scalar\String_::parseEscapeSequences(
											preg_replace('/\n' . $quoted_label . '$/', '', $item->getText()),
											null
										)
									);
								}

								if ($item instanceof HHAST\StringLiteralBodyToken) {
									return new PhpParser\Node\Scalar\EncapsedStringPart(
										PhpParser\Node\Scalar\String_::parseEscapeSequences(
											$item->getText(),
											null
										)
									);
								}

								return ExpressionTransformer::transform($item, $project, $file, $scope);
							},
							$children
						),
						[
							'kind' => PhpParser\Node\Scalar\String_::KIND_HEREDOC,
							'docLabel' => $doc_label,
							'docIndentation' => '',
						]
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

							if ($item instanceof HHAST\StringLiteralBodyToken) {
								return new PhpParser\Node\Scalar\EncapsedStringPart(
									stripcslashes($item->getText())
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