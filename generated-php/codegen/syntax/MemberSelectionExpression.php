<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<dca35918dbba00ae98e75873ba3ee274>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class MemberSelectionExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_object;
    /**
     * @var EditableNode
     */
    private $_operator;
    /**
     * @var EditableNode
     */
    private $_name;
    public function __construct(EditableNode $object, EditableNode $operator, EditableNode $name)
    {
        parent::__construct('member_selection_expression');
        $this->_object = $object;
        $this->_operator = $operator;
        $this->_name = $name;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $object = EditableNode::fromJSON($json['member_object'], $file, $offset, $source);
        $offset += $object->getWidth();
        $operator = EditableNode::fromJSON($json['member_operator'], $file, $offset, $source);
        $offset += $operator->getWidth();
        $name = EditableNode::fromJSON($json['member_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        return new static($object, $operator, $name);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('object' => $this->_object, 'operator' => $this->_operator, 'name' => $this->_name);
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
        $object = $this->_object->rewrite($rewriter, $parents);
        $operator = $this->_operator->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        if ($object === $this->_object && $operator === $this->_operator && $name === $this->_name) {
            return $this;
        }
        return new static($object, $operator, $name);
    }
    /**
     * @return EditableNode
     */
    public function getObjectUNTYPED()
    {
        return $this->_object;
    }
    /**
     * @return static
     */
    public function withObject(EditableNode $value)
    {
        if ($value === $this->_object) {
            return $this;
        }
        return new static($value, $this->_operator, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasObject()
    {
        return !$this->_object->isMissing();
    }
    /**
     * @return FunctionCallExpression | MemberSelectionExpression |
     * ObjectCreationExpression | ParenthesizedExpression |
     * PipeVariableExpression | PrefixUnaryExpression | ScopeResolutionExpression
     * | SubscriptExpression | NameToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getObject()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_object);
    }
    /**
     * @return FunctionCallExpression | MemberSelectionExpression |
     * ObjectCreationExpression | ParenthesizedExpression |
     * PipeVariableExpression | PrefixUnaryExpression | ScopeResolutionExpression
     * | SubscriptExpression | NameToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getObjectx()
    {
        return $this->getObject();
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
        return new static($this->_object, $value, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasOperator()
    {
        return !$this->_operator->isMissing();
    }
    /**
     * @return MinusGreaterThanToken
     */
    /**
     * @return MinusGreaterThanToken
     */
    public function getOperator()
    {
        return TypeAssert\instance_of(MinusGreaterThanToken::class, $this->_operator);
    }
    /**
     * @return MinusGreaterThanToken
     */
    /**
     * @return MinusGreaterThanToken
     */
    public function getOperatorx()
    {
        return $this->getOperator();
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
        return new static($this->_object, $this->_operator, $value);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return BracedExpression | PrefixUnaryExpression | XHPClassNameToken |
     * NameToken | VariableToken
     */
    /**
     * @return EditableNode
     */
    public function getName()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_name);
    }
    /**
     * @return BracedExpression | PrefixUnaryExpression | XHPClassNameToken |
     * NameToken | VariableToken
     */
    /**
     * @return EditableNode
     */
    public function getNamex()
    {
        return $this->getName();
    }
}

