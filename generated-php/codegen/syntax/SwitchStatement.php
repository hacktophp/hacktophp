<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4794693eee03d927bf7edc8ff8cd284b>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class SwitchStatement extends EditableNode implements IControlFlowStatement
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
    private $_left_brace;
    /**
     * @var EditableNode
     */
    private $_sections;
    /**
     * @var EditableNode
     */
    private $_right_brace;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $expression, EditableNode $right_paren, EditableNode $left_brace, EditableNode $sections, EditableNode $right_brace)
    {
        parent::__construct('switch_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_expression = $expression;
        $this->_right_paren = $right_paren;
        $this->_left_brace = $left_brace;
        $this->_sections = $sections;
        $this->_right_brace = $right_brace;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['switch_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['switch_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $expression = EditableNode::fromJSON($json['switch_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        $right_paren = EditableNode::fromJSON($json['switch_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $left_brace = EditableNode::fromJSON($json['switch_left_brace'], $file, $offset, $source);
        $offset += $left_brace->getWidth();
        $sections = EditableNode::fromJSON($json['switch_sections'], $file, $offset, $source);
        $offset += $sections->getWidth();
        $right_brace = EditableNode::fromJSON($json['switch_right_brace'], $file, $offset, $source);
        $offset += $right_brace->getWidth();
        return new static($keyword, $left_paren, $expression, $right_paren, $left_brace, $sections, $right_brace);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'expression' => $this->_expression, 'right_paren' => $this->_right_paren, 'left_brace' => $this->_left_brace, 'sections' => $this->_sections, 'right_brace' => $this->_right_brace];
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
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $sections = $this->_sections->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $expression === $this->_expression && $right_paren === $this->_right_paren && $left_brace === $this->_left_brace && $sections === $this->_sections && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($keyword, $left_paren, $expression, $right_paren, $left_brace, $sections, $right_brace);
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
        return new static($value, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_left_brace, $this->_sections, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return SwitchToken
     */
    /**
     * @return SwitchToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(SwitchToken::class, $this->_keyword);
    }
    /**
     * @return SwitchToken
     */
    /**
     * @return SwitchToken
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
        return new static($this->_keyword, $value, $this->_expression, $this->_right_paren, $this->_left_brace, $this->_sections, $this->_right_brace);
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
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_left_brace, $this->_sections, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return BinaryExpression | FunctionCallExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * PrefixUnaryExpression | SubscriptExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_expression);
    }
    /**
     * @return BinaryExpression | FunctionCallExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * PrefixUnaryExpression | SubscriptExpression | VariableExpression
     */
    /**
     * @return EditableNode
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
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $value, $this->_left_brace, $this->_sections, $this->_right_brace);
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
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(EditableNode $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $value, $this->_sections, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return !$this->_left_brace->isMissing();
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBrace()
    {
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return EditableNode
     */
    public function getSectionsUNTYPED()
    {
        return $this->_sections;
    }
    /**
     * @return static
     */
    public function withSections(EditableNode $value)
    {
        if ($value === $this->_sections) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasSections()
    {
        return !$this->_sections->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getSections()
    {
        if ($this->_sections->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_sections);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getSectionsx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_sections);
    }
    /**
     * @return EditableNode
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(EditableNode $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_left_brace, $this->_sections, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return !$this->_right_brace->isMissing();
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBrace()
    {
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

