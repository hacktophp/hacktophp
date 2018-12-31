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

use Facebook\HHAST\Linters\{ASTLintError, AutoFixingASTLinter};
use Facebook\HHAST\{AmpersandToken, AnonymousFunction, EditableNode, EqualEqualGreaterThanToken, LambdaExpression, LambdaSignature, LeftParenToken, PrefixUnaryExpression, WhiteSpace};
use function Facebook\HHAST\Missing;
use HH\Lib\C;
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

