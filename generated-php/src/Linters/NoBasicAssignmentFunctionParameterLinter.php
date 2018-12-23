<?php
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\{EditableNode as EditableNode, EditableList as EditableList, FunctionCallExpression as FunctionCallExpression, BinaryExpression as BinaryExpression, EqualToken as EqualToken, DelimitedComment as DelimitedComment, ListItem as ListItem, CommaToken as CommaToken, WhiteSpace as WhiteSpace};
use HH\Lib\C as C;
class NoBasicAssignmentFunctionParameterLinter extends AutoFixingASTLinter
{
    /**
     * @return FunctionCallExpression::class
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
        $exps = $node->getArgumentList() ? $node->getArgumentList()->getItemsOfType(BinaryExpression::class) : null;
        if ($exps === null) {
            return null;
        }
        if (!C\any($exps, function ($exp) {
            return $exp instanceof BinaryExpression && $exp->getOperator() instanceof EqualToken;
        })) {
            return null;
        }
        return new ASTLintError($this, 'Basic assignment is not allowed in function parameters because it is often' . '
	1) unexpected that it sets a local variable in the containing scope' . '
	2) wrongly assumed that the variables are named parameters', $node);
    }
    /**
     * @return string
     */
    protected function getTitleForFix(LintError $_)
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
        $fixed_exps = array();
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

