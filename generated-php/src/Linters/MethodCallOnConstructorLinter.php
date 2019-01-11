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

use Facebook\HHAST\{EditableNode, LeftParenToken, MemberSelectionExpression, RightParenToken, ObjectCreationExpression, ParenthesizedExpression};
use function Facebook\HHAST\Missing;
/**
 * @template-extends AutoFixingASTLinter<MemberSelectionExpression>
 */
final class MethodCallOnConstructorLinter extends AutoFixingASTLinter
{
    /**
     * @return class-string<MemberSelectionExpression>
     */
    protected static function getTargetType()
    {
        return MemberSelectionExpression::class;
    }
    /**
     * @param array<int, EditableNode> $_1
     *
     * @return ASTLintError<MemberSelectionExpression>|null
     */
    public function getLintErrorForNode(MemberSelectionExpression $node, array $_1)
    {
        $obj = $node->getObject();
        if (!$obj instanceof ObjectCreationExpression) {
            return null;
        }
        return new ASTLintError($this, 'Parenthesize method and member access on object creation expressions', $node);
    }
    /**
     * @return string
     */
    public function getTitleForFix(LintError $_0)
    {
        return 'Add parentheses';
    }
    /**
     * @return MemberSelectionExpression
     */
    public function getFixedNode(MemberSelectionExpression $node)
    {
        $obj = $node->getObject();
        return $node->withObject(new ParenthesizedExpression(new LeftParenToken($obj->getFirstTokenx()->getLeading(), Missing()), $obj->without($obj->getFirstTokenx()->getLeading())->without($obj->getLastTokenx()->getTrailing()), new RightParenToken(Missing(), $obj->getLastTokenx()->getTrailing())));
    }
}

