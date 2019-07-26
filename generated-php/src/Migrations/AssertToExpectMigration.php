<?php
/*
 *  Copyright (c) 2017-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */
namespace Facebook\HHAST\Migrations;

use function Facebook\HHAST\Missing;
use Facebook\HHAST\{BackslashToken, CommaToken, DelimitedComment, NodeList, EditableNode, FunctionCallExpression, FunctionToken, LeftParenToken, ListItem, MemberSelectionExpression, MinusGreaterThanToken, NamespaceDeclaration, NamespaceEmptyBody, NamespaceUseDeclaration, NameToken, QualifiedName, RightParenToken, ScopeResolutionExpression, SemicolonToken, UseToken, VariableExpression, VariableToken, WhiteSpace};
use HH\Lib\{Str, Vec, C};
final class AssertToExpectMigration extends StepBasedMigration
{
    /**
     * @var bool
     */
    private $useExpectFunctionNeeded = false;
    /**
     * @var null|NamespaceUseDeclaration
     */
    private static $expectFunction = null;
    /**
     * @return NamespaceUseDeclaration
     */
    private static function getExpectFunction()
    {
        if (self::$expectFunction !== null) {
            return self::$expectFunction;
        }
        $sep = new BackslashToken(Missing(), Missing());
        self::$expectFunction = new NamespaceUseDeclaration(new UseToken(Missing(), new WhiteSpace(' ')), new FunctionToken(Missing(), new WhiteSpace(' ')), new QualifiedName(new NodeList([new ListItem(new NameToken(Missing(), Missing(), 'Facebook'), $sep), new ListItem(new NameToken(Missing(), Missing(), 'FBExpect'), $sep), new ListItem(new NameToken(Missing(), Missing(), 'expect'), Missing())])), new SemicolonToken(Missing(), new WhiteSpace("\n")));
        return self::$expectFunction;
    }
    /**
     * @return NamespaceUseDeclaration
     */
    private function checkExpectFunctionPresent(NamespaceUseDeclaration $node)
    {
        if (!$this->useExpectFunctionNeeded) {
            return $node;
        }
        if (\preg_match('/^use function .*\\\\expect;$/', Str\trim($node->getCode()))) {
            $this->useExpectFunctionNeeded = false;
        }
        return $node;
    }
    /**
     * @return NamespaceUseDeclaration
     */
    private function addExpectAfterUseFunction(NamespaceUseDeclaration $node)
    {
        if (!$this->useExpectFunctionNeeded) {
            return $node;
        }
        $useKind = $node->getKind();
        if ($useKind !== null && $useKind instanceof FunctionToken) {
            $node = $node->insertAfter($node->getLastTokenx(), self::getExpectFunction());
            $this->useExpectFunctionNeeded = false;
        }
        return $node;
    }
    /**
     * @return NamespaceUseDeclaration
     */
    private function addExpectAfterUseDecl(NamespaceUseDeclaration $node)
    {
        if (!$this->useExpectFunctionNeeded) {
            return $node;
        }
        $this->useExpectFunctionNeeded = false;
        return $node->insertAfter($node->getLastTokenx(), self::getExpectFunction());
    }
    /**
     * @return NamespaceDeclaration
     */
    private function addExpectAfterNamespaceDecl(NamespaceDeclaration $node)
    {
        if (!$this->useExpectFunctionNeeded) {
            return $node;
        }
        $this->useExpectFunctionNeeded = false;
        $body = $node->getBodyx();
        $expectFunction = self::getExpectFunction();
        if ($body instanceof NamespaceEmptyBody) {
            return $node->insertAfter($node->getLastTokenx(), $expectFunction);
        }
        return $node->insertAfter($body->getFirstTokenx(), $expectFunction->insertBefore($expectFunction->getFirstTokenx(), new WhiteSpace("\t")));
    }
    /**
     * @return EditableNode
     */
    private function addExpectAfterComment(DelimitedComment $node)
    {
        if (!$this->useExpectFunctionNeeded) {
            return $node;
        }
        $expectFunction = self::getExpectFunction();
        $this->useExpectFunctionNeeded = false;
        if (!Str\contains($node->getText(), "/**")) {
            return NodeList::concat($node, $expectFunction->insertBefore($expectFunction->getFirstTokenx(), new WhiteSpace("\n\n"))->replace($expectFunction->getLastTokenx()->getTrailing(), new WhiteSpace('')));
        }
        return $node;
    }
    /**
     * @return FunctionCallExpression
     */
    private function assertSingleArgToExpect(FunctionCallExpression $node)
    {
        $method = self::isAssert($node);
        $single_arg_names = ['assertTrue' => 'toBeTrue', 'assertFalse' => 'toBeFalse', 'assertNull' => 'toBeNull', 'assertEmpty' => 'toBeEmpty', 'assertNotNull' => 'toNotBeNull', 'assertNotEmpty' => 'toNotBeEmpty'];
        if (Str\is_empty($method) || !C\contains_key($single_arg_names, $method)) {
            return $node;
        }
        $this->useExpectFunctionNeeded = true;
        $params = (array) $node->getArgumentListx()->getChildren();
        $actual = C\firstx($params);
        $msg = Missing();
        if (\count($params) === 2) {
            $msg = C\lastx($params);
            $actual = $actual->replace($actual->getLastTokenx(), Missing());
        }
        $func_name = $single_arg_names[$method];
        return self::getNewNode($node, $actual, new NodeList([$msg]), $func_name);
    }
    /**
     * @return FunctionCallExpression
     */
    private function assertMultiArgToExpect(FunctionCallExpression $node)
    {
        $method = self::isAssert($node);
        $two_arg_names = ['assertSame' => 'toBeSame', 'assertEquals' => 'toBePHPEqual', 'assertGreaterThan' => 'toBeGreaterThan', 'assertGreaterThanOrEqualTo' => 'toBeGreaterThanOrEqualTo', 'assertLessThan' => 'toBeLessThan', 'assertLessThanOrEqualTo' => 'toBeLessThanOrEqualTo', 'assertRegExp' => 'toMatchRegExp', 'assertType' => 'toBeType', 'assertContains' => 'toContain', 'assertSubset' => 'toInclude', 'assertInstanceOf' => 'toBeInstanceOf', 'assertNotSame' => 'toNotBeSame', 'assertNotEquals' => 'toNotBePHPEqual', 'assertNotRegExp' => 'toNotMatchRegExp', 'assertNotType' => 'toNotBeType', 'assertNotContains' => 'toNotContain', 'assertNotInstanceOf' => 'toNotBeInstanceOf'];
        if (Str\is_empty($method) || !C\contains_key($two_arg_names, $method)) {
            return $node;
        }
        $this->useExpectFunctionNeeded = true;
        $params = (array) $node->getArgumentListx()->getChildren();
        $args = Missing();
        $expected = $params[0];
        $actual = $params[1];
        $func_name = $two_arg_names[$method];
        $rest = Vec\drop($params, 2);
        if (\count($rest) === 2) {
            $rest[0] = $rest[0]->replace($rest[0]->getLastTokenx(), Missing());
            $rest[1] = $rest[1]->insertAfter($rest[1]->getLastTokenx(), new CommaToken(Missing(), new WhiteSpace(' ')));
            $rest = Vec\reverse($rest);
            $func_name = 'toEqualWithDelta';
            $actual = $actual->replace($actual->getLastTokenx(), Missing());
        } else {
            if (C\is_empty($rest)) {
                $expected = $expected->replace($expected->getLastTokenx(), Missing());
            } else {
                $actual = $actual->replace($actual->getLastTokenx(), Missing());
            }
        }
        $args = new NodeList(\array_merge($rest, [$expected]));
        return self::getNewNode($node, $actual, $args, $func_name);
    }
    /**
     * @return iterable<mixed, IMigrationStep>
     */
    public function getSteps()
    {
        $this->useExpectFunctionNeeded = false;
        $make_step_add = function ($name, $impl) {
            return new TypedMigrationStep($name, NamespaceUseDeclaration::class, NamespaceUseDeclaration::class, $impl);
        };
        $make_step_add_namespace = function ($name, $impl) {
            return new TypedMigrationStep($name, NamespaceDeclaration::class, NamespaceDeclaration::class, $impl);
        };
        $make_step_add_comment = function ($name, $impl) {
            return new TypedMigrationStep($name, DelimitedComment::class, EditableNode::class, $impl);
        };
        $make_step_expect = function ($name, $impl) {
            return new TypedMigrationStep($name, FunctionCallExpression::class, FunctionCallExpression::class, $impl);
        };
        return [$make_step_expect('change single arg assert calls to expect', function ($node) {
            return $this->assertSingleArgToExpect($node);
        }), $make_step_expect('change multi arg assert calls to expect', function ($node) {
            return $this->assertMultiArgToExpect($node);
        }), $make_step_add('check if expect function is present', function ($node) {
            return $this->checkExpectFunctionPresent($node);
        }), $make_step_add('add expect after use function (if present)', function ($node) {
            return $this->addExpectAfterUseFunction($node);
        }), $make_step_add('add expect after use declaration (if present)', function ($node) {
            return $this->addExpectAfterUseDecl($node);
        }), $make_step_add_namespace('add expect after namespace declaration (if present)', function ($node) {
            return $this->addExpectAfterNamespaceDecl($node);
        }), $make_step_add_comment('add expect at top of file after first non-docblock comment', function ($node) {
            return $this->addExpectAfterComment($node);
        })];
    }
    /**
     * @param NodeList<EditableNode> $args
     *
     * @return FunctionCallExpression
     */
    private static function getNewNode(FunctionCallExpression $node, EditableNode $actual, NodeList $args, string $funcName)
    {
        $rec = $node->getReceiver();
        $leading = Missing();
        if ($rec instanceof ScopeResolutionExpression) {
            $leading = $rec->getQualifier()->getFirstTokenx()->getLeading();
        } else {
            if ($rec instanceof NameToken) {
                $leading = $rec->getLeading();
            }
        }
        $exp = new MemberSelectionExpression(Missing(), new MinusGreaterThanToken(Missing(), Missing()), Missing());
        if (!$rec instanceof MemberSelectionExpression) {
            $rec = $exp;
        } else {
            $leading = $rec->getObject()->getFirstTokenx()->getLeading();
        }
        $new_node = $node->withReceiver($rec->withObject(new FunctionCallExpression(new NameToken($leading, Missing(), 'expect'), new LeftParenToken(Missing(), Missing()), new NodeList([$actual]), new RightParenToken(Missing(), Missing())))->withName(new NameToken(Missing(), Missing(), $funcName)))->withArgumentList($args);
        return $new_node;
    }
    /**
     * @return string
     */
    private static function isAssert(FunctionCallExpression $node)
    {
        $rec = $node->getReceiver();
        $method = '';
        if ($rec instanceof MemberSelectionExpression) {
            if ((($__tmp4__ = ($__tmp3__ = ($__tmp2__ = ($__tmp1__ = $rec->getObject()) instanceof VariableExpression ? $__tmp1__ : null) !== null ? $__tmp2__->getExpression() : null) instanceof VariableToken ? $__tmp3__ : null) !== null ? $__tmp4__->getText() : null) === '$this') {
                $method = $rec->getName()->getCode();
            }
        } else {
            if ($rec instanceof ScopeResolutionExpression) {
                $method = $rec->getName()->getCode();
            } else {
                if ($rec instanceof NameToken) {
                    $method = $rec->getText();
                }
            }
        }
        if (!Str\starts_with($method, 'assert')) {
            return '';
        }
        return $method;
    }
}

