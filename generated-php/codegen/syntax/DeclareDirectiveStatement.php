<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<14561a120170d58830d8362bd62fd1ef>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class DeclareDirectiveStatement extends EditableNode
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
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $expression, EditableNode $right_paren, EditableNode $semicolon)
    {
        parent::__construct('declare_directive_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_expression = $expression;
        $this->_right_paren = $right_paren;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['declare_directive_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['declare_directive_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $expression = EditableNode::fromJSON($json['declare_directive_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        $right_paren = EditableNode::fromJSON($json['declare_directive_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $semicolon = EditableNode::fromJSON($json['declare_directive_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $left_paren, $expression, $right_paren, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'expression' => $this->_expression, 'right_paren' => $this->_right_paren, 'semicolon' => $this->_semicolon);
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
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $expression === $this->_expression && $right_paren === $this->_right_paren && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $left_paren, $expression, $right_paren, $semicolon);
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
        return new static($value, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_semicolon);
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
        return new static($this->_keyword, $value, $this->_expression, $this->_right_paren, $this->_semicolon);
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
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_semicolon);
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
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $value, $this->_semicolon);
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
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(EditableNode $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
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

