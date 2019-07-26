<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1be278dbddc0cb2ab2747cb1d16fbc06>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class SwitchStatement extends Node implements IControlFlowStatement, IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'switch_statement';
    /**
     * @var SwitchToken
     */
    private $_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var IExpression
     */
    private $_expression;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @var LeftBraceToken
     */
    private $_left_brace;
    /**
     * @var NodeList<SwitchSection>|null
     */
    private $_sections;
    /**
     * @var RightBraceToken
     */
    private $_right_brace;
    /**
     * @param NodeList<SwitchSection>|null $sections
     */
    public function __construct(SwitchToken $keyword, LeftParenToken $left_paren, IExpression $expression, RightParenToken $right_paren, LeftBraceToken $left_brace, ?NodeList $sections, RightBraceToken $right_brace, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_expression = $expression;
        $this->_right_paren = $right_paren;
        $this->_left_brace = $left_brace;
        $this->_sections = $sections;
        $this->_right_brace = $right_brace;
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
        $keyword = Node::fromJSON($json['switch_keyword'], $file, $offset, $source, 'SwitchToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['switch_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $expression = Node::fromJSON($json['switch_expression'], $file, $offset, $source, 'IExpression');
        $expression = $expression !== null ? $expression : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expression->getWidth();
        $right_paren = Node::fromJSON($json['switch_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $left_brace = Node::fromJSON($json['switch_left_brace'], $file, $offset, $source, 'LeftBraceToken');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $sections = Node::fromJSON($json['switch_sections'], $file, $offset, $source, 'NodeList<SwitchSection>');
        $offset += (($__tmp1__ = $sections) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_brace = Node::fromJSON($json['switch_right_brace'], $file, $offset, $source, 'RightBraceToken');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $expression, $right_paren, $left_brace, $sections, $right_brace, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'expression' => $this->_expression, 'right_paren' => $this->_right_paren, 'left_brace' => $this->_left_brace, 'sections' => $this->_sections, 'right_brace' => $this->_right_brace]);
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
        $expression = $rewriter($this->_expression, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $left_brace = $rewriter($this->_left_brace, $parents);
        $sections = $this->_sections === null ? null : $rewriter($this->_sections, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $expression === $this->_expression && $right_paren === $this->_right_paren && $left_brace === $this->_left_brace && $sections === $this->_sections && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($keyword, $left_paren, $expression, $right_paren, $left_brace, $sections, $right_brace);
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
    public function withKeyword(SwitchToken $value)
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
        return $this->_keyword !== null;
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
        return new static($this->_keyword, $value, $this->_expression, $this->_right_paren, $this->_left_brace, $this->_sections, $this->_right_brace);
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
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_left_brace, $this->_sections, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return $this->_expression !== null;
    }
    /**
     * @return BinaryExpression | FunctionCallExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ScopeResolutionExpression | SubscriptExpression | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_expression);
    }
    /**
     * @return BinaryExpression | FunctionCallExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ScopeResolutionExpression | SubscriptExpression | VariableExpression
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
        return new static($this->_keyword, $this->_left_paren, $this->_expression, $value, $this->_left_brace, $this->_sections, $this->_right_brace);
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
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(LeftBraceToken $value)
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
        return $this->_left_brace !== null;
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
     * @return null|Node
     */
    public function getSectionsUNTYPED()
    {
        return $this->_sections;
    }
    /**
     * @param NodeList<SwitchSection>|null $value
     *
     * @return static
     */
    public function withSections(?NodeList $value)
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
        return $this->_sections !== null;
    }
    /**
     * @return NodeList<SwitchSection> | null
     */
    /**
     * @return NodeList<SwitchSection>|null
     */
    public function getSections()
    {
        return $this->_sections;
    }
    /**
     * @return NodeList<SwitchSection>
     */
    /**
     * @return NodeList<SwitchSection>
     */
    public function getSectionsx()
    {
        return TypeAssert\not_null($this->getSections());
    }
    /**
     * @return null|Node
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(RightBraceToken $value)
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
        return $this->_right_brace !== null;
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

