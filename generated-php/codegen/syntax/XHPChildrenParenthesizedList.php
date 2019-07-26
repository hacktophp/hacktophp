<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<69821b002a8e1a565bfa11b73811a827>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPChildrenParenthesizedList extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_children_parenthesized_list';
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<IExpression>>
     */
    private $_xhp_children;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @param NodeList<ListItem<IExpression>> $xhp_children
     */
    public function __construct(LeftParenToken $left_paren, NodeList $xhp_children, RightParenToken $right_paren, ?__Private\SourceRef $source_ref = null)
    {
        $this->_left_paren = $left_paren;
        $this->_xhp_children = $xhp_children;
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
        $left_paren = Node::fromJSON($json['xhp_children_list_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $xhp_children = Node::fromJSON($json['xhp_children_list_xhp_children'], $file, $offset, $source, 'NodeList<ListItem<IExpression>>');
        $xhp_children = $xhp_children !== null ? $xhp_children : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $xhp_children->getWidth();
        $right_paren = Node::fromJSON($json['xhp_children_list_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_paren, $xhp_children, $right_paren, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_paren' => $this->_left_paren, 'xhp_children' => $this->_xhp_children, 'right_paren' => $this->_right_paren]);
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
        $left_paren = $rewriter($this->_left_paren, $parents);
        $xhp_children = $rewriter($this->_xhp_children, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        if ($left_paren === $this->_left_paren && $xhp_children === $this->_xhp_children && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($left_paren, $xhp_children, $right_paren);
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
        return new static($value, $this->_xhp_children, $this->_right_paren);
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
    public function getXhpChildrenUNTYPED()
    {
        return $this->_xhp_children;
    }
    /**
     * @param NodeList<ListItem<IExpression>> $value
     *
     * @return static
     */
    public function withXhpChildren(NodeList $value)
    {
        if ($value === $this->_xhp_children) {
            return $this;
        }
        return new static($this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasXhpChildren()
    {
        return $this->_xhp_children !== null;
    }
    /**
     * @return NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<XHPClassNameToken>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getXhpChildren()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_xhp_children);
    }
    /**
     * @return NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<XHPClassNameToken>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getXhpChildrenx()
    {
        return $this->getXhpChildren();
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
        return new static($this->_left_paren, $this->_xhp_children, $value);
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

