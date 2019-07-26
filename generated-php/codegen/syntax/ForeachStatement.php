<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<60d24a95d684edef7e15af81fd2f4ced>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ForeachStatement extends Node implements IControlFlowStatement, ILoopStatement, IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'foreach_statement';
    /**
     * @var ForeachToken
     */
    private $_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var IExpression
     */
    private $_collection;
    /**
     * @var null|AwaitToken
     */
    private $_await_keyword;
    /**
     * @var AsToken
     */
    private $_as;
    /**
     * @var null|IExpression
     */
    private $_key;
    /**
     * @var null|EqualGreaterThanToken
     */
    private $_arrow;
    /**
     * @var IExpression
     */
    private $_value;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @var IStatement
     */
    private $_body;
    public function __construct(ForeachToken $keyword, LeftParenToken $left_paren, IExpression $collection, ?AwaitToken $await_keyword, AsToken $as, ?IExpression $key, ?EqualGreaterThanToken $arrow, IExpression $value, RightParenToken $right_paren, IStatement $body, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_collection = $collection;
        $this->_await_keyword = $await_keyword;
        $this->_as = $as;
        $this->_key = $key;
        $this->_arrow = $arrow;
        $this->_value = $value;
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
        $keyword = Node::fromJSON($json['foreach_keyword'], $file, $offset, $source, 'ForeachToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['foreach_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $collection = Node::fromJSON($json['foreach_collection'], $file, $offset, $source, 'IExpression');
        $collection = $collection !== null ? $collection : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $collection->getWidth();
        $await_keyword = Node::fromJSON($json['foreach_await_keyword'], $file, $offset, $source, 'AwaitToken');
        $offset += (($__tmp1__ = $await_keyword) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $as = Node::fromJSON($json['foreach_as'], $file, $offset, $source, 'AsToken');
        $as = $as !== null ? $as : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $as->getWidth();
        $key = Node::fromJSON($json['foreach_key'], $file, $offset, $source, 'IExpression');
        $offset += (($__tmp2__ = $key) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $arrow = Node::fromJSON($json['foreach_arrow'], $file, $offset, $source, 'EqualGreaterThanToken');
        $offset += (($__tmp3__ = $arrow) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $value = Node::fromJSON($json['foreach_value'], $file, $offset, $source, 'IExpression');
        $value = $value !== null ? $value : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $value->getWidth();
        $right_paren = Node::fromJSON($json['foreach_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $body = Node::fromJSON($json['foreach_body'], $file, $offset, $source, 'IStatement');
        $body = $body !== null ? $body : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $body->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $collection, $await_keyword, $as, $key, $arrow, $value, $right_paren, $body, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'collection' => $this->_collection, 'await_keyword' => $this->_await_keyword, 'as' => $this->_as, 'key' => $this->_key, 'arrow' => $this->_arrow, 'value' => $this->_value, 'right_paren' => $this->_right_paren, 'body' => $this->_body]);
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
        $keyword = $rewriter($this->_keyword, $parents);
        $left_paren = $rewriter($this->_left_paren, $parents);
        $collection = $rewriter($this->_collection, $parents);
        $await_keyword = $this->_await_keyword === null ? null : $rewriter($this->_await_keyword, $parents);
        $as = $rewriter($this->_as, $parents);
        $key = $this->_key === null ? null : $rewriter($this->_key, $parents);
        $arrow = $this->_arrow === null ? null : $rewriter($this->_arrow, $parents);
        $value = $rewriter($this->_value, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $body = $rewriter($this->_body, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $collection === $this->_collection && $await_keyword === $this->_await_keyword && $as === $this->_as && $key === $this->_key && $arrow === $this->_arrow && $value === $this->_value && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }
        return new static($keyword, $left_paren, $collection, $await_keyword, $as, $key, $arrow, $value, $right_paren, $body);
    }
    /**
     * @return null|Node
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(ForeachToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_collection, $this->_await_keyword, $this->_as, $this->_key, $this->_arrow, $this->_value, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return ForeachToken
     */
    /**
     * @return ForeachToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ForeachToken::class, $this->_keyword);
    }
    /**
     * @return ForeachToken
     */
    /**
     * @return ForeachToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
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
        return new static($this->_keyword, $value, $this->_collection, $this->_await_keyword, $this->_as, $this->_key, $this->_arrow, $this->_value, $this->_right_paren, $this->_body);
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
    public function getCollectionUNTYPED()
    {
        return $this->_collection;
    }
    /**
     * @return static
     */
    public function withCollection(IExpression $value)
    {
        if ($value === $this->_collection) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_await_keyword, $this->_as, $this->_key, $this->_arrow, $this->_value, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasCollection()
    {
        return $this->_collection !== null;
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | CastExpression | CollectionLiteralExpression |
     * FunctionCallExpression | MemberSelectionExpression |
     * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
     * | ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression | VectorIntrinsicExpression
     */
    /**
     * @return IExpression
     */
    public function getCollection()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_collection);
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | CastExpression | CollectionLiteralExpression |
     * FunctionCallExpression | MemberSelectionExpression |
     * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
     * | ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression | VectorIntrinsicExpression
     */
    /**
     * @return IExpression
     */
    public function getCollectionx()
    {
        return $this->getCollection();
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
        return new static($this->_keyword, $this->_left_paren, $this->_collection, $value, $this->_as, $this->_key, $this->_arrow, $this->_value, $this->_right_paren, $this->_body);
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
    public function getAsUNTYPED()
    {
        return $this->_as;
    }
    /**
     * @return static
     */
    public function withAs(AsToken $value)
    {
        if ($value === $this->_as) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_collection, $this->_await_keyword, $value, $this->_key, $this->_arrow, $this->_value, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasAs()
    {
        return $this->_as !== null;
    }
    /**
     * @return AsToken
     */
    /**
     * @return AsToken
     */
    public function getAs()
    {
        return TypeAssert\instance_of(AsToken::class, $this->_as);
    }
    /**
     * @return AsToken
     */
    /**
     * @return AsToken
     */
    public function getAsx()
    {
        return $this->getAs();
    }
    /**
     * @return null|Node
     */
    public function getKeyUNTYPED()
    {
        return $this->_key;
    }
    /**
     * @return static
     */
    public function withKey(?IExpression $value)
    {
        if ($value === $this->_key) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_collection, $this->_await_keyword, $this->_as, $value, $this->_arrow, $this->_value, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasKey()
    {
        return $this->_key !== null;
    }
    /**
     * @return ListExpression | MemberSelectionExpression | null |
     * SubscriptExpression | VariableExpression
     */
    /**
     * @return null|IExpression
     */
    public function getKey()
    {
        return $this->_key;
    }
    /**
     * @return ListExpression | MemberSelectionExpression | SubscriptExpression |
     * VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getKeyx()
    {
        return TypeAssert\not_null($this->getKey());
    }
    /**
     * @return null|Node
     */
    public function getArrowUNTYPED()
    {
        return $this->_arrow;
    }
    /**
     * @return static
     */
    public function withArrow(?EqualGreaterThanToken $value)
    {
        if ($value === $this->_arrow) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_collection, $this->_await_keyword, $this->_as, $this->_key, $value, $this->_value, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasArrow()
    {
        return $this->_arrow !== null;
    }
    /**
     * @return null | EqualGreaterThanToken
     */
    /**
     * @return null|EqualGreaterThanToken
     */
    public function getArrow()
    {
        return $this->_arrow;
    }
    /**
     * @return EqualGreaterThanToken
     */
    /**
     * @return EqualGreaterThanToken
     */
    public function getArrowx()
    {
        return TypeAssert\not_null($this->getArrow());
    }
    /**
     * @return null|Node
     */
    public function getValueUNTYPED()
    {
        return $this->_value;
    }
    /**
     * @return static
     */
    public function withValue(IExpression $value)
    {
        if ($value === $this->_value) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_collection, $this->_await_keyword, $this->_as, $this->_key, $this->_arrow, $value, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasValue()
    {
        return $this->_value !== null;
    }
    /**
     * @return ListExpression | MemberSelectionExpression |
     * ScopeResolutionExpression | SubscriptExpression | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getValue()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_value);
    }
    /**
     * @return ListExpression | MemberSelectionExpression |
     * ScopeResolutionExpression | SubscriptExpression | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getValuex()
    {
        return $this->getValue();
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
        return new static($this->_keyword, $this->_left_paren, $this->_collection, $this->_await_keyword, $this->_as, $this->_key, $this->_arrow, $this->_value, $value, $this->_body);
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
    public function withBody(IStatement $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_collection, $this->_await_keyword, $this->_as, $this->_key, $this->_arrow, $this->_value, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return $this->_body !== null;
    }
    /**
     * @return CompoundStatement | EchoStatement | ExpressionStatement |
     * ForeachStatement
     */
    /**
     * @return IStatement
     */
    public function getBody()
    {
        return TypeAssert\instance_of(IStatement::class, $this->_body);
    }
    /**
     * @return CompoundStatement | EchoStatement | ExpressionStatement |
     * ForeachStatement
     */
    /**
     * @return IStatement
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

