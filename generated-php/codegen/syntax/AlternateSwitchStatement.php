<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d9227437a1e57dd1601da1e476d2a91a>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class AlternateSwitchStatement extends EditableNode implements IControlFlowStatement
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
    private $_opening_colon;
    /**
     * @var EditableNode
     */
    private $_sections;
    /**
     * @var EditableNode
     */
    private $_closing_endswitch;
    /**
     * @var EditableNode
     */
    private $_closing_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $expression, EditableNode $right_paren, EditableNode $opening_colon, EditableNode $sections, EditableNode $closing_endswitch, EditableNode $closing_semicolon)
    {
        parent::__construct('alternate_switch_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_expression = $expression;
        $this->_right_paren = $right_paren;
        $this->_opening_colon = $opening_colon;
        $this->_sections = $sections;
        $this->_closing_endswitch = $closing_endswitch;
        $this->_closing_semicolon = $closing_semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['alternate_switch_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['alternate_switch_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $expression = EditableNode::fromJSON($json['alternate_switch_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        $right_paren = EditableNode::fromJSON($json['alternate_switch_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $opening_colon = EditableNode::fromJSON($json['alternate_switch_opening_colon'], $file, $offset, $source);
        $offset += $opening_colon->getWidth();
        $sections = EditableNode::fromJSON($json['alternate_switch_sections'], $file, $offset, $source);
        $offset += $sections->getWidth();
        $closing_endswitch = EditableNode::fromJSON($json['alternate_switch_closing_endswitch'], $file, $offset, $source);
        $offset += $closing_endswitch->getWidth();
        $closing_semicolon = EditableNode::fromJSON($json['alternate_switch_closing_semicolon'], $file, $offset, $source);
        $offset += $closing_semicolon->getWidth();
        return new static($keyword, $left_paren, $expression, $right_paren, $opening_colon, $sections, $closing_endswitch, $closing_semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'expression' => $this->_expression, 'right_paren' => $this->_right_paren, 'opening_colon' => $this->_opening_colon, 'sections' => $this->_sections, 'closing_endswitch' => $this->_closing_endswitch, 'closing_semicolon' => $this->_closing_semicolon];
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
        $opening_colon = $this->_opening_colon->rewrite($rewriter, $parents);
        $sections = $this->_sections->rewrite($rewriter, $parents);
        $closing_endswitch = $this->_closing_endswitch->rewrite($rewriter, $parents);
        $closing_semicolon = $this->_closing_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $expression === $this->_expression && $right_paren === $this->_right_paren && $opening_colon === $this->_opening_colon && $sections === $this->_sections && $closing_endswitch === $this->_closing_endswitch && $closing_semicolon === $this->_closing_semicolon) {
            return $this;
        }
        return new static($keyword, $left_paren, $expression, $right_paren, $opening_colon, $sections, $closing_endswitch, $closing_semicolon);
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
        return new static($value, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_opening_colon, $this->_sections, $this->_closing_endswitch, $this->_closing_semicolon);
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
        return new static($this->_keyword, $value, $this->_expression, $this->_right_paren, $this->_opening_colon, $this->_sections, $this->_closing_endswitch, $this->_closing_semicolon);
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
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_opening_colon, $this->_sections, $this->_closing_endswitch, $this->_closing_semicolon);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return LiteralExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_expression);
    }
    /**
     * @return LiteralExpression | VariableExpression
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
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $value, $this->_opening_colon, $this->_sections, $this->_closing_endswitch, $this->_closing_semicolon);
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
    public function getOpeningColonUNTYPED()
    {
        return $this->_opening_colon;
    }
    /**
     * @return static
     */
    public function withOpeningColon(EditableNode $value)
    {
        if ($value === $this->_opening_colon) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $value, $this->_sections, $this->_closing_endswitch, $this->_closing_semicolon);
    }
    /**
     * @return bool
     */
    public function hasOpeningColon()
    {
        return !$this->_opening_colon->isMissing();
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getOpeningColon()
    {
        return TypeAssert\instance_of(ColonToken::class, $this->_opening_colon);
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getOpeningColonx()
    {
        return $this->getOpeningColon();
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
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_opening_colon, $value, $this->_closing_endswitch, $this->_closing_semicolon);
    }
    /**
     * @return bool
     */
    public function hasSections()
    {
        return !$this->_sections->isMissing();
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getSections()
    {
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
        return $this->getSections();
    }
    /**
     * @return EditableNode
     */
    public function getClosingEndswitchUNTYPED()
    {
        return $this->_closing_endswitch;
    }
    /**
     * @return static
     */
    public function withClosingEndswitch(EditableNode $value)
    {
        if ($value === $this->_closing_endswitch) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_opening_colon, $this->_sections, $value, $this->_closing_semicolon);
    }
    /**
     * @return bool
     */
    public function hasClosingEndswitch()
    {
        return !$this->_closing_endswitch->isMissing();
    }
    /**
     * @return EndswitchToken
     */
    /**
     * @return EndswitchToken
     */
    public function getClosingEndswitch()
    {
        return TypeAssert\instance_of(EndswitchToken::class, $this->_closing_endswitch);
    }
    /**
     * @return EndswitchToken
     */
    /**
     * @return EndswitchToken
     */
    public function getClosingEndswitchx()
    {
        return $this->getClosingEndswitch();
    }
    /**
     * @return EditableNode
     */
    public function getClosingSemicolonUNTYPED()
    {
        return $this->_closing_semicolon;
    }
    /**
     * @return static
     */
    public function withClosingSemicolon(EditableNode $value)
    {
        if ($value === $this->_closing_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $this->_right_paren, $this->_opening_colon, $this->_sections, $this->_closing_endswitch, $value);
    }
    /**
     * @return bool
     */
    public function hasClosingSemicolon()
    {
        return !$this->_closing_semicolon->isMissing();
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getClosingSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_closing_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getClosingSemicolonx()
    {
        return $this->getClosingSemicolon();
    }
}

