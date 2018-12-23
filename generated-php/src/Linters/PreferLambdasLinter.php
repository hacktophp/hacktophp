<?php
namespace Facebook\HHAST\Linters;

use Facebook\HHAST\Linters\{ASTLintError as ASTLintError, AutoFixingASTLinter as AutoFixingASTLinter};
use Facebook\HHAST\{AmpersandToken as AmpersandToken, AnonymousFunction as AnonymousFunction, EditableNode as EditableNode, EqualEqualGreaterThanToken as EqualEqualGreaterThanToken, LambdaExpression as LambdaExpression, LambdaSignature as LambdaSignature, LeftParenToken as LeftParenToken, PrefixUnaryExpression as PrefixUnaryExpression, WhiteSpace as WhiteSpace};
use function Facebook\HHAST\Missing as Missing;
use HH\Lib\C as C;
final class PreferLambdasLinter extends AutoFixingASTLinter
{
    /**
     * @return AnonymousFunction::class
     */
    protected static function getTargetType()
    {
        return AnonymousFunction::class;
    }
    /**
     * @return string
     */
    protected function getTitleForFix(LintError $_)
    {
        return 'Convert to lambda';
    }
    /**
     * @param array<int, EditableNode> $_parents
     *
     * @return ASTLintError<AnonymousFunction>|null
     */
    public function getLintErrorForNode(AnonymousFunction $node, array $_parents)
    {
        $use_expr = $node->getUse();
        $uses_references = $use_expr !== null && !C\is_empty($use_expr->getDescendantsWhere(function ($node, $_) {
            return $node instanceof PrefixUnaryExpression && $node->getOperator() instanceof AmpersandToken;
        }));
        if ($uses_references) {
            return null;
        }
        return new ASTLintError($this, 'Use lambdas instead of PHP anonymous functions', $node);
    }
    /**
     * @return null|EditableNode
     */
    public function getFixedNode(AnonymousFunction $node)
    {
        $attribute_spec = $node->getAttributeSpec();
        $async = $node->getAsyncKeyword();
        $coroutine = $node->getCoroutineKeyword();
        $parameters = $node->getParameters();
        $left_paren = new LeftParenToken($node->getFunctionKeyword()->getLeading(), Missing());
        $right_paren = $node->getRightParen();
        $colon = $node->getColon();
        $type = $node->getType();
        $signature = new LambdaSignature($left_paren, $parameters ?? Missing(), $right_paren ?? Missing(), $colon ?? Missing(), $type ?? Missing());
        $arrow = new EqualEqualGreaterThanToken(Missing(), new WhiteSpace(' '));
        $body = $node->getBody();
        return new LambdaExpression($attribute_spec ?? Missing(), $async ?? Missing(), $coroutine ?? Missing(), $signature, $arrow, $body);
    }
}

