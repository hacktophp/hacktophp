<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f4b9e34684eacae559c66d29445b7984>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class TypeParameters extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_angle;
    /**
     * @var EditableNode
     */
    private $_parameters;
    /**
     * @var EditableNode
     */
    private $_right_angle;
    public function __construct(EditableNode $left_angle, EditableNode $parameters, EditableNode $right_angle)
    {
        parent::__construct('type_parameters');
        $this->_left_angle = $left_angle;
        $this->_parameters = $parameters;
        $this->_right_angle = $right_angle;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_angle = EditableNode::fromJSON($json['type_parameters_left_angle'], $file, $offset, $source);
        $offset += $left_angle->getWidth();
        $parameters = EditableNode::fromJSON($json['type_parameters_parameters'], $file, $offset, $source);
        $offset += $parameters->getWidth();
        $right_angle = EditableNode::fromJSON($json['type_parameters_right_angle'], $file, $offset, $source);
        $offset += $right_angle->getWidth();
        return new static($left_angle, $parameters, $right_angle);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('left_angle' => $this->_left_angle, 'parameters' => $this->_parameters, 'right_angle' => $this->_right_angle);
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
        $left_angle = $this->_left_angle->rewrite($rewriter, $parents);
        $parameters = $this->_parameters->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
        if ($left_angle === $this->_left_angle && $parameters === $this->_parameters && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($left_angle, $parameters, $right_angle);
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
        return new static($value, $this->_parameters, $this->_right_angle);
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
    public function getParametersUNTYPED()
    {
        return $this->_parameters;
    }
    /**
     * @return static
     */
    public function withParameters(EditableNode $value)
    {
        if ($value === $this->_parameters) {
            return $this;
        }
        return new static($this->_left_angle, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasParameters()
    {
        return !$this->_parameters->isMissing();
    }
    /**
     * @return EditableList<TypeParameter>
     */
    /**
     * @return EditableList<TypeParameter>
     */
    public function getParameters()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_parameters);
    }
    /**
     * @return EditableList<TypeParameter>
     */
    /**
     * @return EditableList<TypeParameter>
     */
    public function getParametersx()
    {
        return $this->getParameters();
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
        return new static($this->_left_angle, $this->_parameters, $value);
    }
    /**
     * @return bool
     */
    public function hasRightAngle()
    {
        return !$this->_right_angle->isMissing();
    }
    /**
     * @return null | GreaterThanToken
     */
    /**
     * @return null|GreaterThanToken
     */
    public function getRightAngle()
    {
        if ($this->_right_angle->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(GreaterThanToken::class, $this->_right_angle);
    }
    /**
     * @return GreaterThanToken
     */
    /**
     * @return GreaterThanToken
     */
    public function getRightAnglex()
    {
        return TypeAssert\instance_of(GreaterThanToken::class, $this->_right_angle);
    }
}

