<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class TypeArguments extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_angle;
    /**
     * @var EditableNode
     */
    private $_types;
    /**
     * @var EditableNode
     */
    private $_right_angle;
    public function __construct(EditableNode $left_angle, EditableNode $types, EditableNode $right_angle)
    {
        parent::__construct('type_arguments');
        $this->_left_angle = $left_angle;
        $this->_types = $types;
        $this->_right_angle = $right_angle;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_angle = EditableNode::fromJSON($json['type_arguments_left_angle'], $file, $offset, $source);
        $offset += $left_angle->getWidth();
        $types = EditableNode::fromJSON($json['type_arguments_types'], $file, $offset, $source);
        $offset += $types->getWidth();
        $right_angle = EditableNode::fromJSON($json['type_arguments_right_angle'], $file, $offset, $source);
        $offset += $right_angle->getWidth();
        return new static($left_angle, $types, $right_angle);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('left_angle' => $this->_left_angle, 'types' => $this->_types, 'right_angle' => $this->_right_angle);
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
        $types = $this->_types->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
        if ($left_angle === $this->_left_angle && $types === $this->_types && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($left_angle, $types, $right_angle);
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
        return new static($value, $this->_types, $this->_right_angle);
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
    public function getTypesUNTYPED()
    {
        return $this->_types;
    }
    /**
     * @return static
     */
    public function withTypes(EditableNode $value)
    {
        if ($value === $this->_types) {
            return $this;
        }
        return new static($this->_left_angle, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasTypes()
    {
        return !$this->_types->isMissing();
    }
    /**
     * @return EditableList<ClassnameTypeSpecifier> |
     * EditableList<ClosureTypeSpecifier> | EditableList<DictionaryTypeSpecifier>
     * | EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
     * EditableList<MapArrayTypeSpecifier> | EditableList<NullableTypeSpecifier>
     * | EditableList<ReifiedTypeArgument> | EditableList<ShapeTypeSpecifier> |
     * EditableList<SimpleTypeSpecifier> | EditableList<TupleTypeSpecifier> |
     * EditableList<TypeConstant> | EditableList<VectorArrayTypeSpecifier>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getTypes()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_types);
    }
    /**
     * @return EditableList<ClassnameTypeSpecifier> |
     * EditableList<ClosureTypeSpecifier> | EditableList<DictionaryTypeSpecifier>
     * | EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
     * EditableList<MapArrayTypeSpecifier> | EditableList<NullableTypeSpecifier>
     * | EditableList<ReifiedTypeArgument> | EditableList<ShapeTypeSpecifier> |
     * EditableList<SimpleTypeSpecifier> | EditableList<TupleTypeSpecifier> |
     * EditableList<TypeConstant> | EditableList<VectorArrayTypeSpecifier>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getTypesx()
    {
        return $this->getTypes();
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
        return new static($this->_left_angle, $this->_types, $value);
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

