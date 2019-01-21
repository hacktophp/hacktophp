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

use Facebook\HHAST\{EditableNode, EditableList, FunctionCallExpression, BinaryExpression, EqualToken, DelimitedComment, ListItem, CommaToken, WhiteSpace};
use HH\Lib\C;
/**
 * @template-extends AutoFixingASTLinter<FunctionCallExpression>
 */
class NoBasicAssignmentFunctionParameterLinter extends AutoFixingASTLinter
{
    /**
     * @return class-string<FunctionCallExpression>
     */
    protected static function getTargetType()
    {
        return FunctionCallExpression::class;
    }
    /**
     * @param array<int, EditableNode> $_parents
     *
     * @return ASTLintError<FunctionCallExpression>|null
     */
    public function getLintErrorForNode(FunctionCallExpression $node, array $_parents)
    {
        $exps = ($__tmp1__ = $node->getArgumentList()) !== null ? $__tmp1__->getItemsOfType(BinaryExpression::class) : null;
        if ($exps === null) {
            return null;
        }
        if (!C\any($exps, function ($exp) {
            return $exp instanceof BinaryExpression && $exp->getOperator() instanceof EqualToken;
        })) {
            return null;
        }
        return new ASTLintError($this, "Basic assignment is not allowed in function parameters because it is often" . "\n\t1) unexpected that it sets a local variable in the containing scope" . "\n\t2) wrongly assumed that the variables are named parameters", $node);
    }
    /**
     * @return string
     */
    protected function getTitleForFix(LintError $_0)
    {
        return 'Replace assignment with comment';
    }
    /**
     * @return FunctionCallExpression
     */
    public function getFixedNode(FunctionCallExpression $node)
    {
        $args = $node->getArgumentListx()->toVec();
        $exps = $node->getArgumentListx();
        $fixed_exps = [];
        foreach ($args as $exp) {
            if ($exp instanceof ListItem) {
                $item = $exp->getItemx();
                if ($item instanceof BinaryExpression && $item->getOperator() instanceof EqualToken) {
                    $fixed_exps[] = new DelimitedComment('/* ' . $item->getLeftOperand()->getCode() . $item->getOperator()->getCode() . '*/ ');
                    $fixed_exps[] = $item->getRightOperandx();
                    if ($exp !== C\lastx($args)) {
                        $fixed_exps[] = new CommaToken(new WhiteSpace(''), new WhiteSpace(' '));
                    }
                } else {
                    $fixed_exps[] = $exp;
                }
            }
        }
        return $node->replace($exps, new EditableList($fixed_exps));
    }
}

