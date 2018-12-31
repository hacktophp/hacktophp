<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8e25714d0605012f8a9fb18c5518345e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class UsingStatementBlockScoped extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_await_keyword;
    /**
     * @var EditableNode
     */
    private $_using_keyword;
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_expressions;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_body;
    public function __construct(EditableNode $await_keyword, EditableNode $using_keyword, EditableNode $left_paren, EditableNode $expressions, EditableNode $right_paren, EditableNode $body)
    {
        parent::__construct('using_statement_block_scoped');
        $this->_await_keyword = $await_keyword;
        $this->_using_keyword = $using_keyword;
        $this->_left_paren = $left_paren;
        $this->_expressions = $expressions;
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
        $await_keyword = EditableNode::fromJSON($json['using_block_await_keyword'], $file, $offset, $source);
        $offset += $await_keyword->getWidth();
        $using_keyword = EditableNode::fromJSON($json['using_block_using_keyword'], $file, $offset, $source);
        $offset += $using_keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['using_block_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $expressions = EditableNode::fromJSON($json['using_block_expressions'], $file, $offset, $source);
        $offset += $expressions->getWidth();
        $right_paren = EditableNode::fromJSON($json['using_block_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $body = EditableNode::fromJSON($json['using_block_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        return new static($await_keyword, $using_keyword, $left_paren, $expressions, $right_paren, $body);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['await_keyword' => $this->_await_keyword, 'using_keyword' => $this->_using_keyword, 'left_paren' => $this->_left_paren, 'expressions' => $this->_expressions, 'right_paren' => $this->_right_paren, 'body' => $this->_body];
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
        $await_keyword = $this->_await_keyword->rewrite($rewriter, $parents);
        $using_keyword = $this->_using_keyword->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $expressions = $this->_expressions->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        if ($await_keyword === $this->_await_keyword && $using_keyword === $this->_using_keyword && $left_paren === $this->_left_paren && $expressions === $this->_expressions && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }
        return new static($await_keyword, $using_keyword, $left_paren, $expressions, $right_paren, $body);
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
        return new static($value, $this->_using_keyword, $this->_left_paren, $this->_expressions, $this->_right_paren, $this->_body);
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
    public function getUsingKeywordUNTYPED()
    {
        return $this->_using_keyword;
    }
    /**
     * @return static
     */
    public function withUsingKeyword(EditableNode $value)
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
        return !$this->_using_keyword->isMissing();
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
        return new static($this->_await_keyword, $this->_using_keyword, $value, $this->_expressions, $this->_right_paren, $this->_body);
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
    public function getExpressionsUNTYPED()
    {
        return $this->_expressions;
    }
    /**
     * @return static
     */
    public function withExpressions(EditableNode $value)
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
        return !$this->_expressions->isMissing();
    }
    /**
     * @return EditableList<AnonymousFunction> | EditableList<BinaryExpression> |
     * EditableList<LambdaExpression> | EditableList<LiteralExpression> |
     * EditableList<ObjectCreationExpression> | EditableList<EditableNode> |
     * EditableList<PrefixUnaryExpression> | EditableList<VariableExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getExpressions()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_expressions);
    }
    /**
     * @return EditableList<AnonymousFunction> | EditableList<BinaryExpression> |
     * EditableList<LambdaExpression> | EditableList<LiteralExpression> |
     * EditableList<ObjectCreationExpression> | EditableList<EditableNode> |
     * EditableList<PrefixUnaryExpression> | EditableList<VariableExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getExpressionsx()
    {
        return $this->getExpressions();
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
        return new static($this->_await_keyword, $this->_using_keyword, $this->_left_paren, $this->_expressions, $value, $this->_body);
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
        return new static($this->_await_keyword, $this->_using_keyword, $this->_left_paren, $this->_expressions, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return !$this->_body->isMissing();
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

