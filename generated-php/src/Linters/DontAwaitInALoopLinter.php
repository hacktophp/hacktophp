<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Linters;

use HH\Lib\{C, Vec, Str};
use Facebook\HHAST\{AnonymousFunction, AwaitableCreationExpression, AwaitToken, Node, ILoopStatement, LambdaExpression, PrefixUnaryExpression};
use function Facebook\HHAST\find_position;
/**
 * @template-extends ASTLinter<PrefixUnaryExpression>
 */
final class DontAwaitInALoopLinter extends ASTLinter
{
    /**
     * @return class-string<PrefixUnaryExpression>
     */
    protected static function getTargetType()
    {
        return PrefixUnaryExpression::class;
    }
    /**
     * @param array<int, Node> $parents
     *
     * @return ASTLintError<PrefixUnaryExpression>|null
     */
    public function getLintErrorForNode(PrefixUnaryExpression $node, array $parents)
    {
        if (!$node->getOperator() instanceof AwaitToken) {
            return null;
        }
        $parents = Vec\reverse($parents);
        $loops = [];
        foreach ($parents as $parent) {
            if (self::isAsyncBoundary($parent)) {
                return null;
            }
            if ($parent instanceof ILoopStatement) {
                $loops[] = $parent;
            }
        }
        if (C\is_empty($loops)) {
            return null;
        }
        return new ASTLintError($this, "Don't use await in a loop", $node);
    }
    /**
     * @return bool
     */
    private static function isAsyncBoundary(Node $node)
    {
        return $node instanceof AnonymousFunction || $node instanceof AwaitableCreationExpression || $node instanceof LambdaExpression;
    }
    /**
     * @return string
     */
    public function getPrettyTextForNode(PrefixUnaryExpression $blame)
    {
        $loops = Vec\filter_nulls(\array_map(function ($x) {
            return $x instanceof ILoopStatement ? $x : null;
        }, $this->getAST()->findWithParents(function ($node) use($blame) {
            return $node === $blame;
        })));
        $lines = \explode("\n", $this->getFile()->getContents());
        list($blame_line, $_col) = find_position($this->getAST(), $blame);
        if (\count($loops) === 1) {
            list($line, $_col) = find_position($this->getAST(), C\onlyx($loops));
            if ($line === $blame_line) {
                return $lines[$line - 1];
            }
        }
        $output = [];
        foreach ($loops as $loop) {
            list($line, $_col) = find_position($this->getAST(), $loop);
            $output[] = 'Line ' . $line . ': ' . $lines[$line - 1];
        }
        $output[] = 'Line ' . $blame_line . ': ' . $lines[$blame_line - 1];
        return \implode("\n", $output);
    }
}

