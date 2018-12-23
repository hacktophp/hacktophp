<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class WhereConstraint extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_type;
    /**
     * @var EditableNode
     */
    private $_operator;
    /**
     * @var EditableNode
     */
    private $_right_type;
    public function __construct(EditableNode $left_type, EditableNode $operator, EditableNode $right_type)
    {
        parent::__construct('where_constraint');
        $this->_left_type = $left_type;
        $this->_operator = $operator;
        $this->_right_type = $right_type;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_type = EditableNode::fromJSON($json['where_constraint_left_type'], $file, $offset, $source);
        $offset += $left_type->getWidth();
        $operator = EditableNode::fromJSON($json['where_constraint_operator'], $file, $offset, $source);
        $offset += $operator->getWidth();
        $right_type = EditableNode::fromJSON($json['where_constraint_right_type'], $file, $offset, $source);
        $offset += $right_type->getWidth();
        return new static($left_type, $operator, $right_type);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('left_type' => $this->_left_type, 'operator' => $this->_operator, 'right_type' => $this->_right_type);
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
        $left_type = $this->_left_type->rewrite($rewriter, $parents);
        $operator = $this->_operator->rewrite($rewriter, $parents);
        $right_type = $this->_right_type->rewrite($rewriter, $parents);
        if ($left_type === $this->_left_type && $operator === $this->_operator && $right_type === $this->_right_type) {
            return $this;
        }
        return new static($left_type, $operator, $right_type);
    }
    /**
     * @return EditableNode
     */
    public function getLeftTypeUNTYPED()
    {
        return $this->_left_type;
    }
    /**
     * @return static
     */
    public function withLeftType(EditableNode $value)
    {
        if ($value === $this->_left_type) {
            return $this;
        }
        return new static($value, $this->_operator, $this->_right_type);
    }
    /**
     * @return bool
     */
    public function hasLeftType()
    {
        return !$this->_left_type->isMissing();
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier | TypeConstant
     */
    /**
     * @return EditableNode
     */
    public function getLeftType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_left_type);
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier | TypeConstant
     */
    /**
     * @return EditableNode
     */
    public function getLeftTypex()
    {
        return $this->getLeftType();
    }
    /**
     * @return EditableNode
     */
    public function getOperatorUNTYPED()
    {
        return $this->_operator;
    }
    /**
     * @return static
     */
    public function withOperator(EditableNode $value)
    {
        if ($value === $this->_operator) {
            return $this;
        }
        return new static($this->_left_type, $value, $this->_right_type);
    }
    /**
     * @return bool
     */
    public function hasOperator()
    {
        return !$this->_operator->isMissing();
    }
    /**
     * @return EqualToken | AsToken | SuperToken
     */
    /**
     * @return EditableToken
     */
    public function getOperator()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_operator);
    }
    /**
     * @return EqualToken | AsToken | SuperToken
     */
    /**
     * @return EditableToken
     */
    public function getOperatorx()
    {
        return $this->getOperator();
    }
    /**
     * @return EditableNode
     */
    public function getRightTypeUNTYPED()
    {
        return $this->_right_type;
    }
    /**
     * @return static
     */
    public function withRightType(EditableNode $value)
    {
        if ($value === $this->_right_type) {
            return $this;
        }
        return new static($this->_left_type, $this->_operator, $value);
    }
    /**
     * @return bool
     */
    public function hasRightType()
    {
        return !$this->_right_type->isMissing();
    }
    /**
     * @return GenericTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier
     * | TypeConstant | VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getRightType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_right_type);
    }
    /**
     * @return GenericTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier
     * | TypeConstant | VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getRightTypex()
    {
        return $this->getRightType();
    }
}

