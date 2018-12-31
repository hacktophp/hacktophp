<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<55e9c005b2451c616f2ab7a22b0c181f>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class XHPOpen extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_angle;
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_attributes;
    /**
     * @var EditableNode
     */
    private $_right_angle;
    public function __construct(EditableNode $left_angle, EditableNode $name, EditableNode $attributes, EditableNode $right_angle)
    {
        parent::__construct('xhp_open');
        $this->_left_angle = $left_angle;
        $this->_name = $name;
        $this->_attributes = $attributes;
        $this->_right_angle = $right_angle;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_angle = EditableNode::fromJSON($json['xhp_open_left_angle'], $file, $offset, $source);
        $offset += $left_angle->getWidth();
        $name = EditableNode::fromJSON($json['xhp_open_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $attributes = EditableNode::fromJSON($json['xhp_open_attributes'], $file, $offset, $source);
        $offset += $attributes->getWidth();
        $right_angle = EditableNode::fromJSON($json['xhp_open_right_angle'], $file, $offset, $source);
        $offset += $right_angle->getWidth();
        return new static($left_angle, $name, $attributes, $right_angle);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['left_angle' => $this->_left_angle, 'name' => $this->_name, 'attributes' => $this->_attributes, 'right_angle' => $this->_right_angle];
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
        $left_angle = $this->_left_angle->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $attributes = $this->_attributes->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
        if ($left_angle === $this->_left_angle && $name === $this->_name && $attributes === $this->_attributes && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($left_angle, $name, $attributes, $right_angle);
    }
    /**
     * @return EditableNode
     */
    public function getLeftAngleUNTYPED()
    {
        return $this->_left_angle;
    }
    /**
     * @return static
     */
    public function withLeftAngle(EditableNode $value)
    {
        if ($value === $this->_left_angle) {
            return $this;
        }
        return new static($value, $this->_name, $this->_attributes, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasLeftAngle()
    {
        return !$this->_left_angle->isMissing();
    }
    /**
     * @return LessThanToken
     */
    /**
     * @return LessThanToken
     */
    public function getLeftAngle()
    {
        return TypeAssert\instance_of(LessThanToken::class, $this->_left_angle);
    }
    /**
     * @return LessThanToken
     */
    /**
     * @return LessThanToken
     */
    public function getLeftAnglex()
    {
        return $this->getLeftAngle();
    }
    /**
     * @return EditableNode
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(EditableNode $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_left_angle, $value, $this->_attributes, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return XHPElementNameToken
     */
    /**
     * @return XHPElementNameToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(XHPElementNameToken::class, $this->_name);
    }
    /**
     * @return XHPElementNameToken
     */
    /**
     * @return XHPElementNameToken
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return EditableNode
     */
    public function getAttributesUNTYPED()
    {
        return $this->_attributes;
    }
    /**
     * @return static
     */
    public function withAttributes(EditableNode $value)
    {
        if ($value === $this->_attributes) {
            return $this;
        }
        return new static($this->_left_angle, $this->_name, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasAttributes()
    {
        return !$this->_attributes->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getAttributes()
    {
        if ($this->_attributes->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_attributes);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getAttributesx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_attributes);
    }
    /**
     * @return EditableNode
     */
    public function getRightAngleUNTYPED()
    {
        return $this->_right_angle;
    }
    /**
     * @return static
     */
    public function withRightAngle(EditableNode $value)
    {
        if ($value === $this->_right_angle) {
            return $this;
        }
        return new static($this->_left_angle, $this->_name, $this->_attributes, $value);
    }
    /**
     * @return bool
     */
    public function hasRightAngle()
    {
        return !$this->_right_angle->isMissing();
    }
    /**
     * @return null | SlashGreaterThanToken | GreaterThanToken
     */
    /**
     * @return null|EditableToken
     */
    public function getRightAngle()
    {
        if ($this->_right_angle->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableToken::class, $this->_right_angle);
    }
    /**
     * @return SlashGreaterThanToken | GreaterThanToken
     */
    /**
     * @return EditableToken
     */
    public function getRightAnglex()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_right_angle);
    }
}

