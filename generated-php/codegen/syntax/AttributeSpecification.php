<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<214db37529f9031cb77d1df3f215aad3>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class AttributeSpecification extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_double_angle;
    /**
     * @var EditableNode
     */
    private $_attributes;
    /**
     * @var EditableNode
     */
    private $_right_double_angle;
    public function __construct(EditableNode $left_double_angle, EditableNode $attributes, EditableNode $right_double_angle)
    {
        parent::__construct('attribute_specification');
        $this->_left_double_angle = $left_double_angle;
        $this->_attributes = $attributes;
        $this->_right_double_angle = $right_double_angle;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_double_angle = EditableNode::fromJSON($json['attribute_specification_left_double_angle'], $file, $offset, $source);
        $offset += $left_double_angle->getWidth();
        $attributes = EditableNode::fromJSON($json['attribute_specification_attributes'], $file, $offset, $source);
        $offset += $attributes->getWidth();
        $right_double_angle = EditableNode::fromJSON($json['attribute_specification_right_double_angle'], $file, $offset, $source);
        $offset += $right_double_angle->getWidth();
        return new static($left_double_angle, $attributes, $right_double_angle);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('left_double_angle' => $this->_left_double_angle, 'attributes' => $this->_attributes, 'right_double_angle' => $this->_right_double_angle);
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
        $left_double_angle = $this->_left_double_angle->rewrite($rewriter, $parents);
        $attributes = $this->_attributes->rewrite($rewriter, $parents);
        $right_double_angle = $this->_right_double_angle->rewrite($rewriter, $parents);
        if ($left_double_angle === $this->_left_double_angle && $attributes === $this->_attributes && $right_double_angle === $this->_right_double_angle) {
            return $this;
        }
        return new static($left_double_angle, $attributes, $right_double_angle);
    }
    /**
     * @return EditableNode
     */
    public function getLeftDoubleAngleUNTYPED()
    {
        return $this->_left_double_angle;
    }
    /**
     * @return static
     */
    public function withLeftDoubleAngle(EditableNode $value)
    {
        if ($value === $this->_left_double_angle) {
            return $this;
        }
        return new static($value, $this->_attributes, $this->_right_double_angle);
    }
    /**
     * @return bool
     */
    public function hasLeftDoubleAngle()
    {
        return !$this->_left_double_angle->isMissing();
    }
    /**
     * @return LessThanLessThanToken
     */
    /**
     * @return LessThanLessThanToken
     */
    public function getLeftDoubleAngle()
    {
        return TypeAssert\instance_of(LessThanLessThanToken::class, $this->_left_double_angle);
    }
    /**
     * @return LessThanLessThanToken
     */
    /**
     * @return LessThanLessThanToken
     */
    public function getLeftDoubleAnglex()
    {
        return $this->getLeftDoubleAngle();
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
        return new static($this->_left_double_angle, $value, $this->_right_double_angle);
    }
    /**
     * @return bool
     */
    public function hasAttributes()
    {
        return !$this->_attributes->isMissing();
    }
    /**
     * @return EditableList<ConstructorCall>
     */
    /**
     * @return EditableList<ConstructorCall>
     */
    public function getAttributes()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_attributes);
    }
    /**
     * @return EditableList<ConstructorCall>
     */
    /**
     * @return EditableList<ConstructorCall>
     */
    public function getAttributesx()
    {
        return $this->getAttributes();
    }
    /**
     * @return EditableNode
     */
    public function getRightDoubleAngleUNTYPED()
    {
        return $this->_right_double_angle;
    }
    /**
     * @return static
     */
    public function withRightDoubleAngle(EditableNode $value)
    {
        if ($value === $this->_right_double_angle) {
            return $this;
        }
        return new static($this->_left_double_angle, $this->_attributes, $value);
    }
    /**
     * @return bool
     */
    public function hasRightDoubleAngle()
    {
        return !$this->_right_double_angle->isMissing();
    }
    /**
     * @return GreaterThanGreaterThanToken
     */
    /**
     * @return GreaterThanGreaterThanToken
     */
    public function getRightDoubleAngle()
    {
        return TypeAssert\instance_of(GreaterThanGreaterThanToken::class, $this->_right_double_angle);
    }
    /**
     * @return GreaterThanGreaterThanToken
     */
    /**
     * @return GreaterThanGreaterThanToken
     */
    public function getRightDoubleAnglex()
    {
        return $this->getRightDoubleAngle();
    }
}

