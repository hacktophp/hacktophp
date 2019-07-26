<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5691d07c3e92e18b47392dfdccbefe52>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TupleExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'tuple_expression';
    /**
     * @var TupleToken
     */
    private $_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<IExpression>>|null
     */
    private $_items;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @param NodeList<ListItem<IExpression>>|null $items
     */
    public function __construct(TupleToken $keyword, LeftParenToken $left_paren, ?NodeList $items, RightParenToken $right_paren, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_items = $items;
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
        $keyword = Node::fromJSON($json['tuple_expression_keyword'], $file, $offset, $source, 'TupleToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['tuple_expression_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $items = Node::fromJSON($json['tuple_expression_items'], $file, $offset, $source, 'NodeList<ListItem<IExpression>>');
        $offset += (($__tmp1__ = $items) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_paren = Node::fromJSON($json['tuple_expression_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $items, $right_paren, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'items' => $this->_items, 'right_paren' => $this->_right_paren]);
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
        $items = $this->_items === null ? null : $rewriter($this->_items, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $items === $this->_items && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($keyword, $left_paren, $items, $right_paren);
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
    public function withKeyword(TupleToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_items, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return TupleToken
     */
    /**
     * @return TupleToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(TupleToken::class, $this->_keyword);
    }
    /**
     * @return TupleToken
     */
    /**
     * @return TupleToken
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
        return new static($this->_keyword, $value, $this->_items, $this->_right_paren);
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
    public function getItemsUNTYPED()
    {
        return $this->_items;
    }
    /**
     * @param NodeList<ListItem<IExpression>>|null $value
     *
     * @return static
     */
    public function withItems(?NodeList $value)
    {
        if ($value === $this->_items) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasItems()
    {
        return $this->_items !== null;
    }
    /**
     * @return NodeList<ListItem<ArrayCreationExpression>> |
     * NodeList<ListItem<IContainer>> | NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<BinaryExpression>> | NodeList<ListItem<CastExpression>>
     * | NodeList<ListItem<DarrayIntrinsicExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<SubscriptExpression>> |
     * NodeList<ListItem<VariableExpression>> |
     * NodeList<ListItem<VarrayIntrinsicExpression>> |
     * NodeList<ListItem<VectorIntrinsicExpression>> | null
     */
    /**
     * @return NodeList<ListItem<IExpression>>|null
     */
    public function getItems()
    {
        return $this->_items;
    }
    /**
     * @return NodeList<ListItem<ArrayCreationExpression>> |
     * NodeList<ListItem<IContainer>> | NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<BinaryExpression>> | NodeList<ListItem<CastExpression>>
     * | NodeList<ListItem<DarrayIntrinsicExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<SubscriptExpression>> |
     * NodeList<ListItem<VariableExpression>> |
     * NodeList<ListItem<VarrayIntrinsicExpression>> |
     * NodeList<ListItem<VectorIntrinsicExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getItemsx()
    {
        return TypeAssert\not_null($this->getItems());
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
        return new static($this->_keyword, $this->_left_paren, $this->_items, $value);
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

