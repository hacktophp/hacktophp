<?php
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\{EditableNode as EditableNode, LeftParenToken as LeftParenToken, MemberSelectionExpression as MemberSelectionExpression, RightParenToken as RightParenToken, ObjectCreationExpression as ObjectCreationExpression, ParenthesizedExpression as ParenthesizedExpression};
use function Facebook\HHAST\Missing as Missing;
final class MethodCallOnConstructorLinter extends AutoFixingASTLinter
{
    /**
     * @return MemberSelectionExpression::class
     */
    protected static function getTargetType()
    {
        return MemberSelectionExpression::class;
    }
    /**
     * @param array<int, EditableNode> $_
     *
     * @return ASTLintError<MemberSelectionExpression>|null
     */
    public function getLintErrorForNode(MemberSelectionExpression $node, array $_)
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
    public function getTitleForFix(LintError $_)
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

