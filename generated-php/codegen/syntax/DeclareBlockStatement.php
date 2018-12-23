<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f038e57acc431b7997b3a9c26a7ae55e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class DeclareBlockStatement extends EditableNode
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
    private $_expression;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_body;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $expression, EditableNode $right_paren, EditableNode $body)
    {
        parent::__construct('declare_block_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_expression = $expression;
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
        $keyword = EditableNode::fromJSON($json['declare_block_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['declare_block_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $expression = EditableNode::fromJSON($json['declare_block_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        $right_paren = EditableNode::fromJSON($json['declare_block_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $body = EditableNode::fromJSON($json['declare_block_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        return new static($keyword, $left_paren, $expression, $right_paren, $body);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'expression' => $this->_expression, 'right_paren' => $this->_right_paren, 'body' => $this->_body);
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? array() : (array) $parents;
        $parents[] = $this;
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $expression === $this->_expression && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }
        return new static($keyword, $left_paren, $expression, $right_paren, $body);
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
        return new static($value, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return DeclareToken
     */
    /**
     * @return DeclareToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(DeclareToken::class, $this->_keyword);
    }
    /**
     * @return DeclareToken
     */
    /**
     * @return DeclareToken
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
        return new static($this->_keyword, $value, $this->_expression, $this->_right_paren, $this->_body);
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
    public function getExpressionUNTYPED()
    {
        return $this->_expression;
    }
    /**
     * @return static
     */
    public function withExpression(EditableNode $value)
    {
        if ($value === $this->_expression) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return BinaryExpression
     */
    /**
     * @return BinaryExpression
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(BinaryExpression::class, $this->_expression);
    }
    /**
     * @return BinaryExpression
     */
    /**
     * @return BinaryExpression
     */
    public function getExpressionx()
    {
        return $this->getExpression();
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
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $value, $this->_body);
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
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return !$this->_body->isMissing();
    }
    /**
     * @return AlternateLoopStatement | CompoundStatement
     */
    /**
     * @return EditableNode
     */
    public function getBody()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_body);
    }
    /**
     * @return AlternateLoopStatement | CompoundStatement
     */
    /**
     * @return EditableNode
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

