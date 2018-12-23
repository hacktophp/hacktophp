<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<51a4fdf793f67d129148f0fe15756f81>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class EmbeddedSubscriptExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_receiver;
    /**
     * @var EditableNode
     */
    private $_left_bracket;
    /**
     * @var EditableNode
     */
    private $_index;
    /**
     * @var EditableNode
     */
    private $_right_bracket;
    public function __construct(EditableNode $receiver, EditableNode $left_bracket, EditableNode $index, EditableNode $right_bracket)
    {
        parent::__construct('embedded_subscript_expression');
        $this->_receiver = $receiver;
        $this->_left_bracket = $left_bracket;
        $this->_index = $index;
        $this->_right_bracket = $right_bracket;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $receiver = EditableNode::fromJSON($json['embedded_subscript_receiver'], $file, $offset, $source);
        $offset += $receiver->getWidth();
        $left_bracket = EditableNode::fromJSON($json['embedded_subscript_left_bracket'], $file, $offset, $source);
        $offset += $left_bracket->getWidth();
        $index = EditableNode::fromJSON($json['embedded_subscript_index'], $file, $offset, $source);
        $offset += $index->getWidth();
        $right_bracket = EditableNode::fromJSON($json['embedded_subscript_right_bracket'], $file, $offset, $source);
        $offset += $right_bracket->getWidth();
        return new static($receiver, $left_bracket, $index, $right_bracket);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('receiver' => $this->_receiver, 'left_bracket' => $this->_left_bracket, 'index' => $this->_index, 'right_bracket' => $this->_right_bracket);
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
        $receiver = $this->_receiver->rewrite($rewriter, $parents);
        $left_bracket = $this->_left_bracket->rewrite($rewriter, $parents);
        $index = $this->_index->rewrite($rewriter, $parents);
        $right_bracket = $this->_right_bracket->rewrite($rewriter, $parents);
        if ($receiver === $this->_receiver && $left_bracket === $this->_left_bracket && $index === $this->_index && $right_bracket === $this->_right_bracket) {
            return $this;
        }
        return new static($receiver, $left_bracket, $index, $right_bracket);
    }
    /**
     * @return EditableNode
     */
    public function getReceiverUNTYPED()
    {
        return $this->_receiver;
    }
    /**
     * @return static
     */
    public function withReceiver(EditableNode $value)
    {
        if ($value === $this->_receiver) {
            return $this;
        }
        return new static($value, $this->_left_bracket, $this->_index, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasReceiver()
    {
        return !$this->_receiver->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getReceiver()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_receiver);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getReceiverx()
    {
        return $this->getReceiver();
    }
    /**
     * @return EditableNode
     */
    public function getLeftBracketUNTYPED()
    {
        return $this->_left_bracket;
    }
    /**
     * @return static
     */
    public function withLeftBracket(EditableNode $value)
    {
        if ($value === $this->_left_bracket) {
            return $this;
        }
        return new static($this->_receiver, $value, $this->_index, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasLeftBracket()
    {
        return !$this->_left_bracket->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getLeftBracket()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_left_bracket);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getLeftBracketx()
    {
        return $this->getLeftBracket();
    }
    /**
     * @return EditableNode
     */
    public function getIndexUNTYPED()
    {
        return $this->_index;
    }
    /**
     * @return static
     */
    public function withIndex(EditableNode $value)
    {
        if ($value === $this->_index) {
            return $this;
        }
        return new static($this->_receiver, $this->_left_bracket, $value, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasIndex()
    {
        return !$this->_index->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getIndex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_index);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getIndexx()
    {
        return $this->getIndex();
    }
    /**
     * @return EditableNode
     */
    public function getRightBracketUNTYPED()
    {
        return $this->_right_bracket;
    }
    /**
     * @return static
     */
    public function withRightBracket(EditableNode $value)
    {
        if ($value === $this->_right_bracket) {
            return $this;
        }
        return new static($this->_receiver, $this->_left_bracket, $this->_index, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBracket()
    {
        return !$this->_right_bracket->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getRightBracket()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_right_bracket);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getRightBracketx()
    {
        return $this->getRightBracket();
    }
}

