<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1b7a46747b4e718e1f59f558ce30067d>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class UnsetStatement extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'unset_statement';
    /**
     * @var UnsetToken
     */
    private $_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<IExpression>>
     */
    private $_variables;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    /**
     * @param NodeList<ListItem<IExpression>> $variables
     */
    public function __construct(UnsetToken $keyword, LeftParenToken $left_paren, NodeList $variables, RightParenToken $right_paren, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_variables = $variables;
        $this->_right_paren = $right_paren;
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
        $keyword = Node::fromJSON($json['unset_keyword'], $file, $offset, $source, 'UnsetToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['unset_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $variables = Node::fromJSON($json['unset_variables'], $file, $offset, $source, 'NodeList<ListItem<IExpression>>');
        $variables = $variables !== null ? $variables : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $variables->getWidth();
        $right_paren = Node::fromJSON($json['unset_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $semicolon = Node::fromJSON($json['unset_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $variables, $right_paren, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'variables' => $this->_variables, 'right_paren' => $this->_right_paren, 'semicolon' => $this->_semicolon]);
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
        $variables = $rewriter($this->_variables, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $variables === $this->_variables && $right_paren === $this->_right_paren && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $left_paren, $variables, $right_paren, $semicolon);
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
    public function withKeyword(UnsetToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_variables, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return UnsetToken
     */
    /**
     * @return UnsetToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(UnsetToken::class, $this->_keyword);
    }
    /**
     * @return UnsetToken
     */
    /**
     * @return UnsetToken
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
        return new static($this->_keyword, $value, $this->_variables, $this->_right_paren, $this->_semicolon);
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
    public function getVariablesUNTYPED()
    {
        return $this->_variables;
    }
    /**
     * @param NodeList<ListItem<IExpression>> $value
     *
     * @return static
     */
    public function withVariables(NodeList $value)
    {
        if ($value === $this->_variables) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasVariables()
    {
        return $this->_variables !== null;
    }
    /**
     * @return NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<SubscriptExpression>> |
     * NodeList<ListItem<VariableExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getVariables()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_variables);
    }
    /**
     * @return NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<SubscriptExpression>> |
     * NodeList<ListItem<VariableExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getVariablesx()
    {
        return $this->getVariables();
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
        return new static($this->_keyword, $this->_left_paren, $this->_variables, $value, $this->_semicolon);
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
        return new static($this->_keyword, $this->_left_paren, $this->_variables, $this->_right_paren, $value);
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

