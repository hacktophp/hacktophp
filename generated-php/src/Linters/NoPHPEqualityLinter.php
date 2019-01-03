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

use Facebook\HHAST\{BinaryExpression, EditableNode, EqualEqualToken, EqualEqualEqualToken, ExclamationEqualToken, ExclamationEqualEqualToken, LessThanGreaterThanToken};
use HH\Lib\Str;
final class NoPHPEqualityLinter extends AutoFixingASTLinter
{
    /**
     * @return class-string<BinaryExpression>
     */
    protected static function getTargetType()
    {
        return BinaryExpression::class;
    }
    /**
     * @param ASTLintError<BinaryExpression> $err
     *
     * @return string
     */
    protected function getTitleForFix(ASTLintError $err)
    {
        $blame = $err->getBlameNode();
        $fixed = $this->getFixedNode($blame);
        return Str\format('Replace `%s` with `%s`', $blame->getOperator()->getText(), $fixed->getOperator()->getText());
    }
    /**
     * @param array<int, EditableNode> $_parents
     *
     * @return ASTLintError<BinaryExpression>|null
     */
    public function getLintErrorForNode(BinaryExpression $expr, array $_parents)
    {
        $token = $expr->getOperator();
        $replacement = null;
        if ($token instanceof EqualEqualToken) {
            $replacement = '===';
        } else {
            if ($token instanceof ExclamationEqualToken || $token instanceof LessThanGreaterThanToken) {
                $replacement = '!==';
            } else {
                return null;
            }
        }
        return new ASTLintError($this, 'Do not use PHP equality - use "' . $replacement . '" instead.', $expr);
        return null;
    }
    /**
     * @return BinaryExpression
     */
    public function getFixedNode(BinaryExpression $expr)
    {
        $op = $expr->getOperator();
        if ($op instanceof EqualEqualToken) {
            $op = new EqualEqualEqualToken($op->getLeading(), $op->getTrailing());
        } else {
            if ($op instanceof ExclamationEqualToken || $op instanceof LessThanGreaterThanToken) {
                $op = new ExclamationEqualEqualToken($op->getLeading(), $op->getTrailing());
            } else {
                invariant_violation("Shouldn't be asked to fix non-equality operators");
            }
        }
        return $expr->withOperator($op);
    }
}

