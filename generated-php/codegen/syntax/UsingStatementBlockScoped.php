<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d426cadfe77540e5dd37bb3c68d964c5>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class UsingStatementBlockScoped extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'using_statement_block_scoped';
    /**
     * @var null|AwaitToken
     */
    private $_await_keyword;
    /**
     * @var UsingToken
     */
    private $_using_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<IExpression>>
     */
    private $_expressions;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @var CompoundStatement
     */
    private $_body;
    /**
     * @param NodeList<ListItem<IExpression>> $expressions
     */
    public function __construct(?AwaitToken $await_keyword, UsingToken $using_keyword, LeftParenToken $left_paren, NodeList $expressions, RightParenToken $right_paren, CompoundStatement $body, ?array $source_ref = null)
    {
        $this->_await_keyword = $await_keyword;
        $this->_using_keyword = $using_keyword;
        $this->_left_paren = $left_paren;
        $this->_expressions = $expressions;
        $this->_right_paren = $right_paren;
        $this->_body = $body;
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
        $await_keyword = Node::fromJSON($json['using_block_await_keyword'], $file, $offset, $source, 'AwaitToken');
        $offset += (($__tmp1__ = $await_keyword) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $using_keyword = Node::fromJSON($json['using_block_using_keyword'], $file, $offset, $source, 'UsingToken');
        $using_keyword = $using_keyword !== null ? $using_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $using_keyword->getWidth();
        $left_paren = Node::fromJSON($json['using_block_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $expressions = Node::fromJSON($json['using_block_expressions'], $file, $offset, $source, 'NodeList<ListItem<IExpression>>');
        $expressions = $expressions !== null ? $expressions : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expressions->getWidth();
        $right_paren = Node::fromJSON($json['using_block_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $body = Node::fromJSON($json['using_block_body'], $file, $offset, $source, 'CompoundStatement');
        $body = $body !== null ? $body : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $body->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($await_keyword, $using_keyword, $left_paren, $expressions, $right_paren, $body, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['await_keyword' => $this->_await_keyword, 'using_keyword' => $this->_using_keyword, 'left_paren' => $this->_left_paren, 'expressions' => $this->_expressions, 'right_paren' => $this->_right_paren, 'body' => $this->_body]);
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
        $left_paren = $rewriter($this->_left_paren, $parents);
        $expressions = $rewriter($this->_expressions, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $body = $rewriter($this->_body, $parents);
        if ($await_keyword === $this->_await_keyword && $using_keyword === $this->_using_keyword && $left_paren === $this->_left_paren && $expressions === $this->_expressions && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }
        return new static($await_keyword, $using_keyword, $left_paren, $expressions, $right_paren, $body);
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
        return new static($value, $this->_using_keyword, $this->_left_paren, $this->_expressions, $this->_right_paren, $this->_body);
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
        return new static($this->_await_keyword, $value, $this->_left_paren, $this->_expressions, $this->_right_paren, $this->_body);
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
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(LeftParenToken $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($this->_await_keyword, $this->_using_keyword, $value, $this->_expressions, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return $this->_left_paren !== null;
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParen()
    {
        return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParenx()
    {
        return $this->getLeftParen();
    }
    /**
     * @return null|Node
     */
    public function getExpressionsUNTYPED()
    {
        return $this->_expressions;
    }
    /**
     * @param NodeList<ListItem<IExpression>> $value
     *
     * @return static
     */
    public function withExpressions(NodeList $value)
    {
        if ($value === $this->_expressions) {
            return $this;
        }
        return new static($this->_await_keyword, $this->_using_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasExpressions()
    {
        return $this->_expressions !== null;
    }
    /**
     * @return NodeList<ListItem<AnonymousFunction>> |
     * NodeList<ListItem<BinaryExpression>> |
     * NodeList<ListItem<LambdaExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<VariableExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getExpressions()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_expressions);
    }
    /**
     * @return NodeList<ListItem<AnonymousFunction>> |
     * NodeList<ListItem<BinaryExpression>> |
     * NodeList<ListItem<LambdaExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<VariableExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getExpressionsx()
    {
        return $this->getExpressions();
    }
    /**
     * @return null|Node
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(RightParenToken $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_await_keyword, $this->_using_keyword, $this->_left_paren, $this->_expressions, $value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return $this->_right_paren !== null;
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParen()
    {
        return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParenx()
    {
        return $this->getRightParen();
    }
    /**
     * @return null|Node
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(CompoundStatement $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_await_keyword, $this->_using_keyword, $this->_left_paren, $this->_expressions, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return $this->_body !== null;
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getBody()
    {
        return TypeAssert\instance_of(CompoundStatement::class, $this->_body);
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

