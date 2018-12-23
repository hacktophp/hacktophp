<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<273ffcaf0a259ac05808f0f01a07f750>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class XHPChildrenParenthesizedList extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_xhp_children;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    public function __construct(EditableNode $left_paren, EditableNode $xhp_children, EditableNode $right_paren)
    {
        parent::__construct('xhp_children_parenthesized_list');
        $this->_left_paren = $left_paren;
        $this->_xhp_children = $xhp_children;
        $this->_right_paren = $right_paren;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_paren = EditableNode::fromJSON($json['xhp_children_list_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $xhp_children = EditableNode::fromJSON($json['xhp_children_list_xhp_children'], $file, $offset, $source);
        $offset += $xhp_children->getWidth();
        $right_paren = EditableNode::fromJSON($json['xhp_children_list_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        return new static($left_paren, $xhp_children, $right_paren);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('left_paren' => $this->_left_paren, 'xhp_children' => $this->_xhp_children, 'right_paren' => $this->_right_paren);
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $xhp_children = $this->_xhp_children->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        if ($left_paren === $this->_left_paren && $xhp_children === $this->_xhp_children && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($left_paren, $xhp_children, $right_paren);
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
        return new static($value, $this->_xhp_children, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return !$this->_left_paren->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getLeftParen()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_left_paren);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getLeftParenx()
    {
        return $this->getLeftParen();
    }
    /**
     * @return EditableNode
     */
    public function getXhpChildrenUNTYPED()
    {
        return $this->_xhp_children;
    }
    /**
     * @return static
     */
    public function withXhpChildren(EditableNode $value)
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
        return !$this->_xhp_children->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getXhpChildren()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_xhp_children);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getXhpChildrenx()
    {
        return $this->getXhpChildren();
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
        return new static($this->_left_paren, $this->_xhp_children, $value);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return !$this->_right_paren->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getRightParen()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_right_paren);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getRightParenx()
    {
        return $this->getRightParen();
    }
}

