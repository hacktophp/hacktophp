<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ClassishBody extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_brace;
    /**
     * @var EditableNode
     */
    private $_elements;
    /**
     * @var EditableNode
     */
    private $_right_brace;
    public function __construct(EditableNode $left_brace, EditableNode $elements, EditableNode $right_brace)
    {
        parent::__construct('classish_body');
        $this->_left_brace = $left_brace;
        $this->_elements = $elements;
        $this->_right_brace = $right_brace;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_brace = EditableNode::fromJSON($json['classish_body_left_brace'], $file, $offset, $source);
        $offset += $left_brace->getWidth();
        $elements = EditableNode::fromJSON($json['classish_body_elements'], $file, $offset, $source);
        $offset += $elements->getWidth();
        $right_brace = EditableNode::fromJSON($json['classish_body_right_brace'], $file, $offset, $source);
        $offset += $right_brace->getWidth();
        return new static($left_brace, $elements, $right_brace);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('left_brace' => $this->_left_brace, 'elements' => $this->_elements, 'right_brace' => $this->_right_brace);
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
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $elements = $this->_elements->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
        if ($left_brace === $this->_left_brace && $elements === $this->_elements && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($left_brace, $elements, $right_brace);
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
        return new static($value, $this->_elements, $this->_right_brace);
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
    public function getElementsUNTYPED()
    {
        return $this->_elements;
    }
    /**
     * @return static
     */
    public function withElements(EditableNode $value)
    {
        if ($value === $this->_elements) {
            return $this;
        }
        return new static($this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasElements()
    {
        return !$this->_elements->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getElements()
    {
        if ($this->_elements->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_elements);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getElementsx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_elements);
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
        return new static($this->_left_brace, $this->_elements, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return !$this->_right_brace->isMissing();
    }
    /**
     * @return null | RightBraceToken
     */
    /**
     * @return null|RightBraceToken
     */
    public function getRightBrace()
    {
        if ($this->_right_brace->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
}

