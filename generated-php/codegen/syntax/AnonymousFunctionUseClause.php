<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d8bb63a6d0a694e6fcbd572bb7f5e5f0>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class AnonymousFunctionUseClause extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'anonymous_function_use_clause';
    /**
     * @var UseToken
     */
    private $_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<VariableToken>>
     */
    private $_variables;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @param NodeList<ListItem<VariableToken>> $variables
     */
    public function __construct(UseToken $keyword, LeftParenToken $left_paren, NodeList $variables, RightParenToken $right_paren, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_variables = $variables;
        $this->_right_paren = $right_paren;
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
        $keyword = Node::fromJSON($json['anonymous_use_keyword'], $file, $offset, $source, 'UseToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['anonymous_use_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $variables = Node::fromJSON($json['anonymous_use_variables'], $file, $offset, $source, 'NodeList<ListItem<VariableToken>>');
        $variables = $variables !== null ? $variables : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $variables->getWidth();
        $right_paren = Node::fromJSON($json['anonymous_use_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $variables, $right_paren, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'variables' => $this->_variables, 'right_paren' => $this->_right_paren]);
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
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $variables === $this->_variables && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($keyword, $left_paren, $variables, $right_paren);
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
    public function withKeyword(UseToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_variables, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return UseToken
     */
    /**
     * @return UseToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(UseToken::class, $this->_keyword);
    }
    /**
     * @return UseToken
     */
    /**
     * @return UseToken
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
        return new static($this->_keyword, $value, $this->_variables, $this->_right_paren);
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
     * @param NodeList<ListItem<VariableToken>> $value
     *
     * @return static
     */
    public function withVariables(NodeList $value)
    {
        if ($value === $this->_variables) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasVariables()
    {
        return $this->_variables !== null;
    }
    /**
     * @return NodeList<ListItem<VariableToken>>
     */
    /**
     * @return NodeList<ListItem<VariableToken>>
     */
    public function getVariables()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_variables);
    }
    /**
     * @return NodeList<ListItem<VariableToken>>
     */
    /**
     * @return NodeList<ListItem<VariableToken>>
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
        return new static($this->_keyword, $this->_left_paren, $this->_variables, $value);
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
}

