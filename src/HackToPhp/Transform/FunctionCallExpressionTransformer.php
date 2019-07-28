<?php

namespace HackToPhp\Transform;

use Facebook\HHAST;
use PhpParser;

class FunctionCallExpressionTransformer
{
	public static function transform(HHAST\FunctionCallExpression $node, Project $project, HackFile $file, Scope $scope) : PhpParser\Node
	{
		$receiver = $node->getReceiver();

		$args = self::transformArguments($node->getArgumentList(), $project, $file, $scope);

		if ($receiver instanceof HHAST\ParenthesizedExpression) {
			$receiver = $receiver->getExpression();
		}

		if ($receiver instanceof HHAST\ScopeResolutionExpression) {
			$qualifier = $receiver->getQualifier();

			if ($qualifier instanceof HHAST\Token) {
				$class = new PhpParser\Node\Name($qualifier->getText());
			} elseif ($qualifier instanceof HHAST\QualifiedName) {
				$class = QualifiedNameTransformer::transform($qualifier);
			} else {
				$class = ExpressionTransformer::transform($qualifier, $project, $file, $scope);
			}

			if ($class === null) {
				throw new \UnexpectedValueException('$class for ' . get_class($qualifier) . ' cannot be null');
			}

			$name = ExpressionTransformer::transformVariableName($receiver->getName(), $project, $file, $scope);

			return new PhpParser\Node\Expr\StaticCall(
				$class,
				$name,
				$args
			);
		}

		if ($receiver instanceof HHAST\QualifiedName) {
			$name = QualifiedNameTransformer::transform($receiver);

			$name_string = QualifiedNameTransformer::getText($receiver, $file);

			switch ($name_string) {
				case '\HH\Asio\join':
					return new PhpParser\Node\Expr\FuncCall(
						new PhpParser\Node\Name\FullyQualified('Amp\Promise\wait'),
						$args
					);

				case '\HH\Lib\Str\length':
					return new PhpParser\Node\Expr\FuncCall(
				    	new PhpParser\Node\Name\FullyQualified('strlen'),
				    	$args
					);

				case '\HH\Lib\Str\join':
					return new PhpParser\Node\Expr\FuncCall(
				    	new PhpParser\Node\Name\FullyQualified('implode'),
				    	[$args[1], $args[0]]
					);

				case '\HH\Lib\Str\split':
					$new_args = [$args[1], $args[0]];

					if (isset($args[2])) {
						$new_args[] = $args[2];
					}

					return new PhpParser\Node\Expr\FuncCall(
				    	new PhpParser\Node\Name\FullyQualified('explode'),
				    	$new_args
					);

				case '\HH\Lib\Vec\map':
					return new PhpParser\Node\Expr\FuncCall(
				    	new PhpParser\Node\Name\FullyQualified('array_map'),
				    	[$args[1], $args[0]]
					);

				case '\HH\Lib\Vec\slice':
					$new_args = [$args[0], $args[1]];

					if (isset($args[2])) {
						$new_args[] = $args[2];
					}

					return new PhpParser\Node\Expr\FuncCall(
				    	new PhpParser\Node\Name\FullyQualified('array_slice'),
				    	$new_args
					);

				case '\HH\Lib\Vec\concat':
					return new PhpParser\Node\Expr\FuncCall(
				    	new PhpParser\Node\Name\FullyQualified('array_merge'),
				    	[$args[1], $args[0]]
					);

				case '\HH\Lib\Dict\filter':
				case '\HH\Lib\Vec\filter':
					return new PhpParser\Node\Expr\FuncCall(
				    	new PhpParser\Node\Name\FullyQualified('array_filter'),
				    	$args
					);

				case '\HH\Lib\C\count':
					return new PhpParser\Node\Expr\FuncCall(
				    	new PhpParser\Node\Name\FullyQualified('count'),
				    	$args
					);

				case '\is_dict':
					return new PhpParser\Node\Expr\FuncCall(
				    	new PhpParser\Node\Name\FullyQualified('is_array'),
				    	$args
					);

				case '\inst_meth':
					return new PhpParser\Node\Expr\Array_(
						[
							new PhpParser\Node\Expr\ArrayItem($args[0]->value),
							new PhpParser\Node\Expr\ArrayItem($args[1]->value),
						]
					);

				case '\json_decode':
					if (isset($args[3])
						&& $args[3]->value instanceof PhpParser\Node\Expr\ConstFetch
						&& (string) $args[3]->value->name === 'JSON_FB_HACK_ARRAYS'
					) {
						return new PhpParser\Node\Expr\FuncCall(
					    	new PhpParser\Node\Name\FullyQualified('json_decode'),
					    	array_slice($args, 0, 3)
						);
					}
			}
			
			return new PhpParser\Node\Expr\FuncCall(
		    	$name,
		    	$args
			);
		}

		if ($receiver instanceof HHAST\NameToken) {
			$name_string = $receiver->getText();

			if ($name_string === 'is_dict') {
				return new PhpParser\Node\Expr\FuncCall(
			    	new PhpParser\Node\Name\FullyQualified('is_array'),
			    	$args
				);
			}

			if ($name_string === 'vec'
				|| $name_string === 'keyset'
				|| $name_string === 'dict'
			) {
				return new PhpParser\Node\Expr\Cast\Array_(
					$args[0]->value,
					['kind' => PhpParser\Node\Expr\Array_::KIND_SHORT]
				);
			}

			if ($name_string === 'exit') {
				return new PhpParser\Node\Expr\Exit_(
			    	isset($args[0]) ? $args[0]->value : null,
			    	['kind' => PhpParser\Node\Expr\Exit_::KIND_EXIT]
				);
			}

			if ($name_string === 'die') {
				return new PhpParser\Node\Expr\Exit_(
			    	isset($args[0]) ? $args[0]->value : null,
			    	['kind' => PhpParser\Node\Expr\Exit_::KIND_DIE]
				);
			}

			return new PhpParser\Node\Expr\FuncCall(
		    	new PhpParser\Node\Name($name_string),
		    	$args
			);
		}

		if ($receiver instanceof HHAST\MemberSelectionExpression) {
			$object = ExpressionTransformer::transform($receiver->getObject(), $project, $file, $scope);
			$name = ExpressionTransformer::transformVariableName($receiver->getName(), $project, $file, $scope);

			return new PhpParser\Node\Expr\MethodCall(
				$object,
				$name,
				$args
			);
		}

		if ($receiver instanceof HHAST\SafeMemberSelectionExpression) {
			$object = ExpressionTransformer::transform($receiver->getObject(), $project, $file, $scope);
			$name = ExpressionTransformer::transformVariableName($receiver->getName(), $project, $file, $scope);

			$file->tmp_count++;

			$tmp_var = new PhpParser\Node\Expr\Variable('__tmp' . $file->tmp_count . '__');

			$conditional = new PhpParser\Node\Expr\BinaryOp\NotIdentical(
				new PhpParser\Node\Expr\Assign(
					$tmp_var,
					$object
				),
				new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name('null'))
			);

			$method_call = new PhpParser\Node\Expr\MethodCall(
				$tmp_var,
				$name,
				$args
			);

			return new PhpParser\Node\Expr\Ternary(
				$conditional,
				$method_call,
				new PhpParser\Node\Expr\ConstFetch(new PhpParser\Node\Name('null'))
			);
		}

		$closure = ExpressionTransformer::transform($receiver, $project, $file, $scope);

		return new PhpParser\Node\Expr\FuncCall(
	    	$closure,
	    	$args
		);
	}

	public static function transformArguments(?HHAST\NodeList $node, Project $project, HackFile $file, Scope $scope) : array
	{
		if (!$node) {
			return [];
		}

		return array_map(
			function (HHAST\Node $node) use ($project, $file, $scope) {
				$item = $node->getItem();

				$by_ref = false;
				$unpack = false;

				if ($item instanceof HHAST\PrefixUnaryExpression) {
					if ($item->getOperator() instanceof HHAST\AmpersandToken) {
						$item = $item->getOperand();
						// not necssary in PHP
						//$by_ref = true;
					} elseif ($item->getOperator() instanceof HHAST\DotDotDotToken) {
						$item = $item->getOperand();
						$unpack = true;
					}
				} elseif ($item instanceof HHAST\DecoratedExpression) {
					if ($item->getDecorator() instanceof HHAST\AmpersandToken
						|| $item->getDecorator() instanceof HHAST\InoutToken
					) {
						$item = $item->getExpression();
						// not necssary in PHP
						//$by_ref = true;
					} elseif ($item->getDecorator() instanceof HHAST\DotDotDotToken) {
						$item = $item->getExpression();
						$unpack = true;
					} elseif ($item->getDecorator() instanceof HHAST\InoutToken) {
						$item = $item->getExpression();
						$unpack = true;
					} else {
						throw new \UnexpectedValueException('Unrecognised decorated expression');
					}
				}

				return new PhpParser\Node\Arg(
					ExpressionTransformer::transform($item, $project, $file, $scope),
					$by_ref,
					$unpack,
					[
						'comments' => ExpressionTransformer::getTokenCommentsRecursively($node),		
					]
				);
			},
			$node->getChildren()
		);
	}
}