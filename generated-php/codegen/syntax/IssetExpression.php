<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1ba699d566a8031021c1b4917141a89b>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class IssetExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'isset_expression';
    /**
     * @var IssetToken
     */
    private $_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<IExpression>>
     */
    private $_argument_list;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @param NodeList<ListItem<IExpression>> $argument_list
     */
    public function __construct(IssetToken $keyword, LeftParenToken $left_paren, NodeList $argument_list, RightParenToken $right_paren, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_argument_list = $argument_list;
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
        $keyword = Node::fromJSON($json['isset_keyword'], $file, $offset, $source, 'IssetToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['isset_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $argument_list = Node::fromJSON($json['isset_argument_list'], $file, $offset, $source, 'NodeList<ListItem<IExpression>>');
        $argument_list = $argument_list !== null ? $argument_list : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $argument_list->getWidth();
        $right_paren = Node::fromJSON($json['isset_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $argument_list, $right_paren, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren]);
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
        $argument_list = $rewriter($this->_argument_list, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($keyword, $left_paren, $argument_list, $right_paren);
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
    public function withKeyword(IssetToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_argument_list, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return IssetToken
     */
    /**
     * @return IssetToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(IssetToken::class, $this->_keyword);
    }
    /**
     * @return IssetToken
     */
    /**
     * @return IssetToken
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
        return new static($this->_keyword, $value, $this->_argument_list, $this->_right_paren);
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
    public function getArgumentListUNTYPED()
    {
        return $this->_argument_list;
    }
    /**
     * @param NodeList<ListItem<IExpression>> $value
     *
     * @return static
     */
    public function withArgumentList(NodeList $value)
    {
        if ($value === $this->_argument_list) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasArgumentList()
    {
        return $this->_argument_list !== null;
    }
    /**
     * @return NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<SubscriptExpression>> |
     * NodeList<ListItem<VariableExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getArgumentList()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_argument_list);
    }
    /**
     * @return NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<SubscriptExpression>> |
     * NodeList<ListItem<VariableExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getArgumentListx()
    {
        return $this->getArgumentList();
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
        return new static($this->_keyword, $this->_left_paren, $this->_argument_list, $value);
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

