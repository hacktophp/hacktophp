<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<18b4afcc92607714de791479685b10f6>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class ForeachStatement extends EditableNode implements IControlFlowStatement, ILoopStatement
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_collection;
    /**
     * @var EditableNode
     */
    private $_await_keyword;
    /**
     * @var EditableNode
     */
    private $_as;
    /**
     * @var EditableNode
     */
    private $_key;
    /**
     * @var EditableNode
     */
    private $_arrow;
    /**
     * @var EditableNode
     */
    private $_value;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_body;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $collection, EditableNode $await_keyword, EditableNode $as, EditableNode $key, EditableNode $arrow, EditableNode $value, EditableNode $right_paren, EditableNode $body)
    {
        parent::__construct('foreach_statement');
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
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['foreach_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['foreach_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $collection = EditableNode::fromJSON($json['foreach_collection'], $file, $offset, $source);
        $offset += $collection->getWidth();
        $await_keyword = EditableNode::fromJSON($json['foreach_await_keyword'], $file, $offset, $source);
        $offset += $await_keyword->getWidth();
        $as = EditableNode::fromJSON($json['foreach_as'], $file, $offset, $source);
        $offset += $as->getWidth();
        $key = EditableNode::fromJSON($json['foreach_key'], $file, $offset, $source);
        $offset += $key->getWidth();
        $arrow = EditableNode::fromJSON($json['foreach_arrow'], $file, $offset, $source);
        $offset += $arrow->getWidth();
        $value = EditableNode::fromJSON($json['foreach_value'], $file, $offset, $source);
        $offset += $value->getWidth();
        $right_paren = EditableNode::fromJSON($json['foreach_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $body = EditableNode::fromJSON($json['foreach_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        return new static($keyword, $left_paren, $collection, $await_keyword, $as, $key, $arrow, $value, $right_paren, $body);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'collection' => $this->_collection, 'await_keyword' => $this->_await_keyword, 'as' => $this->_as, 'key' => $this->_key, 'arrow' => $this->_arrow, 'value' => $this->_value, 'right_paren' => $this->_right_paren, 'body' => $this->_body];
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? [] : (array) $parents;
        $parents[] = $this;
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $collection = $this->_collection->rewrite($rewriter, $parents);
        $await_keyword = $this->_await_keyword->rewrite($rewriter, $parents);
        $as = $this->_as->rewrite($rewriter, $parents);
        $key = $this->_key->rewrite($rewriter, $parents);
        $arrow = $this->_arrow->rewrite($rewriter, $parents);
        $value = $this->_value->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $collection === $this->_collection && $await_keyword === $this->_await_keyword && $as === $this->_as && $key === $this->_key && $arrow === $this->_arrow && $value === $this->_value && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }
        return new static($keyword, $left_paren, $collection, $await_keyword, $as, $key, $arrow, $value, $right_paren, $body);
    }
    /**
     * @return EditableNode
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(EditableNode $value)
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
        return !$this->_keyword->isMissing();
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
     * @return EditableNode
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(EditableNode $value)
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
        return !$this->_left_paren->isMissing();
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
     * @return EditableNode
     */
    public function getCollectionUNTYPED()
    {
        return $this->_collection;
    }
    /**
     * @return static
     */
    public function withCollection(EditableNode $value)
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
        return !$this->_collection->isMissing();
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
     * @return EditableNode
     */
    public function getCollection()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_collection);
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
     * @return EditableNode
     */
    public function getCollectionx()
    {
        return $this->getCollection();
    }
    /**
     * @return EditableNode
     */
    public function getAwaitKeywordUNTYPED()
    {
        return $this->_await_keyword;
    }
    /**
     * @return static
     */
    public function withAwaitKeyword(EditableNode $value)
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
        return !$this->_await_keyword->isMissing();
    }
    /**
     * @return null | AwaitToken
     */
    /**
     * @return null|AwaitToken
     */
    public function getAwaitKeyword()
    {
        if ($this->_await_keyword->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AwaitToken::class, $this->_await_keyword);
    }
    /**
     * @return AwaitToken
     */
    /**
     * @return AwaitToken
     */
    public function getAwaitKeywordx()
    {
        return TypeAssert\instance_of(AwaitToken::class, $this->_await_keyword);
    }
    /**
     * @return EditableNode
     */
    public function getAsUNTYPED()
    {
        return $this->_as;
    }
    /**
     * @return static
     */
    public function withAs(EditableNode $value)
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
        return !$this->_as->isMissing();
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
     * @return EditableNode
     */
    public function getKeyUNTYPED()
    {
        return $this->_key;
    }
    /**
     * @return static
     */
    public function withKey(EditableNode $value)
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
        return !$this->_key->isMissing();
    }
    /**
     * @return FunctionCallExpression | ListExpression |
     * MemberSelectionExpression | null | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return null|EditableNode
     */
    public function getKey()
    {
        if ($this->_key->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_key);
    }
    /**
     * @return FunctionCallExpression | ListExpression |
     * MemberSelectionExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getKeyx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_key);
    }
    /**
     * @return EditableNode
     */
    public function getArrowUNTYPED()
    {
        return $this->_arrow;
    }
    /**
     * @return static
     */
    public function withArrow(EditableNode $value)
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
        return !$this->_arrow->isMissing();
    }
    /**
     * @return null | EqualGreaterThanToken
     */
    /**
     * @return null|EqualGreaterThanToken
     */
    public function getArrow()
    {
        if ($this->_arrow->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EqualGreaterThanToken::class, $this->_arrow);
    }
    /**
     * @return EqualGreaterThanToken
     */
    /**
     * @return EqualGreaterThanToken
     */
    public function getArrowx()
    {
        return TypeAssert\instance_of(EqualGreaterThanToken::class, $this->_arrow);
    }
    /**
     * @return EditableNode
     */
    public function getValueUNTYPED()
    {
        return $this->_value;
    }
    /**
     * @return static
     */
    public function withValue(EditableNode $value)
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
        return !$this->_value->isMissing();
    }
    /**
     * @return FunctionCallExpression | ListExpression |
     * MemberSelectionExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getValue()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_value);
    }
    /**
     * @return FunctionCallExpression | ListExpression |
     * MemberSelectionExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getValuex()
    {
        return $this->getValue();
    }
    /**
     * @return EditableNode
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(EditableNode $value)
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
        return !$this->_right_paren->isMissing();
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
     * @return EditableNode
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(EditableNode $value)
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
        return !$this->_body->isMissing();
    }
    /**
     * @return AlternateLoopStatement | CompoundStatement | EchoStatement |
     * ExpressionStatement | ForeachStatement
     */
    /**
     * @return EditableNode
     */
    public function getBody()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_body);
    }
    /**
     * @return AlternateLoopStatement | CompoundStatement | EchoStatement |
     * ExpressionStatement | ForeachStatement
     */
    /**
     * @return EditableNode
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

