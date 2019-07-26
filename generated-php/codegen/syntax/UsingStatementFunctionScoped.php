<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5c7517686329c6d5f6347e9db24b4466>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class UsingStatementFunctionScoped extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'using_statement_function_scoped';
    /**
     * @var null|AwaitToken
     */
    private $_await_keyword;
    /**
     * @var UsingToken
     */
    private $_using_keyword;
    /**
     * @var IExpression
     */
    private $_expression;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(?AwaitToken $await_keyword, UsingToken $using_keyword, IExpression $expression, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_await_keyword = $await_keyword;
        $this->_using_keyword = $using_keyword;
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
        $await_keyword = Node::fromJSON($json['using_function_await_keyword'], $file, $offset, $source, 'AwaitToken');
        $offset += (($__tmp1__ = $await_keyword) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $using_keyword = Node::fromJSON($json['using_function_using_keyword'], $file, $offset, $source, 'UsingToken');
        $using_keyword = $using_keyword !== null ? $using_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $using_keyword->getWidth();
        $expression = Node::fromJSON($json['using_function_expression'], $file, $offset, $source, 'IExpression');
        $expression = $expression !== null ? $expression : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expression->getWidth();
        $semicolon = Node::fromJSON($json['using_function_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($await_keyword, $using_keyword, $expression, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['await_keyword' => $this->_await_keyword, 'using_keyword' => $this->_using_keyword, 'expression' => $this->_expression, 'semicolon' => $this->_semicolon]);
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
        $await_keyword = $this->_await_keyword === null ? null : $rewriter($this->_await_keyword, $parents);
        $using_keyword = $rewriter($this->_using_keyword, $parents);
        $expression = $rewriter($this->_expression, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($await_keyword === $this->_await_keyword && $using_keyword === $this->_using_keyword && $expression === $this->_expression && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($await_keyword, $using_keyword, $expression, $semicolon);
    }
    /**
     * @return null|Node
     */
    public function getAwaitKeywordUNTYPED()
    {
        return $this->_await_keyword;
    }
    /**
     * @return static
     */
    public function withAwaitKeyword(?AwaitToken $value)
    {
        if ($value === $this->_await_keyword) {
            return $this;
        }
        return new static($value, $this->_using_keyword, $this->_expression, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasAwaitKeyword()
    {
        return $this->_await_keyword !== null;
    }
    /**
     * @return null | AwaitToken
     */
    /**
     * @return null|AwaitToken
     */
    public function getAwaitKeyword()
    {
        return $this->_await_keyword;
    }
    /**
     * @return AwaitToken
     */
    /**
     * @return AwaitToken
     */
    public function getAwaitKeywordx()
    {
        return TypeAssert\not_null($this->getAwaitKeyword());
    }
    /**
     * @return null|Node
     */
    public function getUsingKeywordUNTYPED()
    {
        return $this->_using_keyword;
    }
    /**
     * @return static
     */
    public function withUsingKeyword(UsingToken $value)
    {
        if ($value === $this->_using_keyword) {
            return $this;
        }
        return new static($this->_await_keyword, $value, $this->_expression, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasUsingKeyword()
    {
        return $this->_using_keyword !== null;
    }
    /**
     * @return UsingToken
     */
    /**
     * @return UsingToken
     */
    public function getUsingKeyword()
    {
        return TypeAssert\instance_of(UsingToken::class, $this->_using_keyword);
    }
    /**
     * @return UsingToken
     */
    /**
     * @return UsingToken
     */
    public function getUsingKeywordx()
    {
        return $this->getUsingKeyword();
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
    public function withExpression(IExpression $value)
    {
        if ($value === $this->_expression) {
            return $this;
        }
        return new static($this->_await_keyword, $this->_using_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return $this->_expression !== null;
    }
    /**
     * @return BinaryExpression | LambdaExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression
     */
    /**
     * @return IExpression
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_expression);
    }
    /**
     * @return BinaryExpression | LambdaExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression
     */
    /**
     * @return IExpression
     */
    public function getExpressionx()
    {
        return $this->getExpression();
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
        return new static($this->_await_keyword, $this->_using_keyword, $this->_expression, $value);
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

