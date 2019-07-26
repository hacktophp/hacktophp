<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<50e6911f6d1108247e0ad6e85f5123e3>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ExpressionStatement extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'expression_statement';
    /**
     * @var null|IExpression
     */
    private $_expression;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(?IExpression $expression, SemicolonToken $semicolon, ?array $source_ref = null)
    {
        $this->_expression = $expression;
        $this->_semicolon = $semicolon;
        parent::__construct($source_ref);
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $initial_offset, string $source, string $_type_hint)
    {
        $offset = $initial_offset;
        $expression = Node::fromJSON($json['expression_statement_expression'], $file, $offset, $source, 'IExpression');
        $offset += (($__tmp1__ = $expression) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $semicolon = Node::fromJSON($json['expression_statement_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($expression, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['expression' => $this->_expression, 'semicolon' => $this->_semicolon]);
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return static
     */
    public function rewriteChildren(\Closure $rewriter, array $parents = [])
    {
        $parents[] = $this;
        $expression = $this->_expression === null ? null : $rewriter($this->_expression, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($expression === $this->_expression && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($expression, $semicolon);
    }
    /**
     * @return null|Node
     */
    public function getExpressionUNTYPED()
    {
        return $this->_expression;
    }
    /**
     * @return static
     */
    public function withExpression(?IExpression $value)
    {
        if ($value === $this->_expression) {
            return $this;
        }
        return new static($value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return $this->_expression !== null;
    }
    /**
     * @return AnonymousFunction | AsExpression | BinaryExpression |
     * CastExpression | ConditionalExpression | DarrayIntrinsicExpression |
     * DictionaryIntrinsicExpression | EvalExpression | FunctionCallExpression |
     * HaltCompilerExpression | InclusionExpression | IsExpression |
     * IssetExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | null | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * SafeMemberSelectionExpression | ScopeResolutionExpression |
     * SubscriptExpression | NameToken | VariableExpression |
     * VarrayIntrinsicExpression | XHPExpression | YieldExpression |
     * YieldFromExpression
     */
    /**
     * @return null|IExpression
     */
    public function getExpression()
    {
        return $this->_expression;
    }
    /**
     * @return AnonymousFunction | AsExpression | BinaryExpression |
     * CastExpression | ConditionalExpression | DarrayIntrinsicExpression |
     * DictionaryIntrinsicExpression | EvalExpression | FunctionCallExpression |
     * HaltCompilerExpression | InclusionExpression | IsExpression |
     * IssetExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * SafeMemberSelectionExpression | ScopeResolutionExpression |
     * SubscriptExpression | NameToken | VariableExpression |
     * VarrayIntrinsicExpression | XHPExpression | YieldExpression |
     * YieldFromExpression
     */
    /**
     * @return IExpression
     */
    public function getExpressionx()
    {
        return TypeAssert\not_null($this->getExpression());
    }
    /**
     * @return null|Node
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(SemicolonToken $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_expression, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return $this->_semicolon !== null;
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

