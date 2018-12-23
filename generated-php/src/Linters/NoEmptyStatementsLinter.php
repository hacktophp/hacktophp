<?php
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\{ExpressionStatement as ExpressionStatement, EditableNode as EditableNode, EditableList as EditableList};
final class NoEmptyStatementsLinter extends AutoFixingASTLinter
{
    /**
     * @return ExpressionStatement::class
     */
    protected static function getTargetType()
    {
        return ExpressionStatement::class;
    }
    /**
     * @return string
     */
    public function getTitleForFix(LintError $_)
    {
        return 'Remove statement';
    }
    /**
     * @param array<int, EditableNode> $_parents
     *
     * @return ASTLintError<ExpressionStatement>|null
     */
    public function getLintErrorForNode(ExpressionStatement $stmt, array $_parents)
    {
        $expr = $stmt->getExpression();
        if ($expr === null) {
            return new ASTLintError($this, 'This statement is empty', $stmt);
        }
        return null;
    }
    /**
     * @return EditableNode
     */
    public function getFixedNode(ExpressionStatement $stmt)
    {
        $semicolon = $stmt->getSemicolonx();
        $leading = $semicolon->getLeading();
        $trailing = $semicolon->getTrailing();
        return EditableList::concat($semicolon->getLeading(), $semicolon->getTrailing());
    }
}

