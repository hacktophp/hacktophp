<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<958b018fbe4e0b9149e311850f5bd5f8>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class FieldInitializer extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_arrow;
    /**
     * @var EditableNode
     */
    private $_value;
    public function __construct(EditableNode $name, EditableNode $arrow, EditableNode $value)
    {
        parent::__construct('field_initializer');
        $this->_name = $name;
        $this->_arrow = $arrow;
        $this->_value = $value;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $name = EditableNode::fromJSON($json['field_initializer_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $arrow = EditableNode::fromJSON($json['field_initializer_arrow'], $file, $offset, $source);
        $offset += $arrow->getWidth();
        $value = EditableNode::fromJSON($json['field_initializer_value'], $file, $offset, $source);
        $offset += $value->getWidth();
        return new static($name, $arrow, $value);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['name' => $this->_name, 'arrow' => $this->_arrow, 'value' => $this->_value];
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
        $name = $this->_name->rewrite($rewriter, $parents);
        $arrow = $this->_arrow->rewrite($rewriter, $parents);
        $value = $this->_value->rewrite($rewriter, $parents);
        if ($name === $this->_name && $arrow === $this->_arrow && $value === $this->_value) {
            return $this;
        }
        return new static($name, $arrow, $value);
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
        return new static($value, $this->_arrow, $this->_value);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return LiteralExpression | ScopeResolutionExpression | DotDotDotToken |
     * QuestionToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getName()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_name);
    }
    /**
     * @return LiteralExpression | ScopeResolutionExpression | DotDotDotToken |
     * QuestionToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return EditableNode
     */
    public function getArrowUNTYPED()
    {
        return $this->_arrow;
    }
    /**
     * @return static
     */
    public function withArrow(EditableNode $value)
    {
        if ($value === $this->_arrow) {
            return $this;
        }
        return new static($this->_name, $value, $this->_value);
    }
    /**
     * @return bool
     */
    public function hasArrow()
    {
        return !$this->_arrow->isMissing();
    }
    /**
     * @return null | EqualGreaterThanToken
     */
    /**
     * @return null|EqualGreaterThanToken
     */
    public function getArrow()
    {
        if ($this->_arrow->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EqualGreaterThanToken::class, $this->_arrow);
    }
    /**
     * @return EqualGreaterThanToken
     */
    /**
     * @return EqualGreaterThanToken
     */
    public function getArrowx()
    {
        return TypeAssert\instance_of(EqualGreaterThanToken::class, $this->_arrow);
    }
    /**
     * @return EditableNode
     */
    public function getValueUNTYPED()
    {
        return $this->_value;
    }
    /**
     * @return static
     */
    public function withValue(EditableNode $value)
    {
        if ($value === $this->_value) {
            return $this;
        }
        return new static($this->_name, $this->_arrow, $value);
    }
    /**
     * @return bool
     */
    public function hasValue()
    {
        return !$this->_value->isMissing();
    }
    /**
     * @return ArrayIntrinsicExpression | BinaryExpression | LambdaExpression |
     * LiteralExpression | ObjectCreationExpression | ScopeResolutionExpression |
     * SubscriptExpression | NameToken | VariableExpression |
     * VectorIntrinsicExpression
     */
    /**
     * @return EditableNode
     */
    public function getValue()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_value);
    }
    /**
     * @return ArrayIntrinsicExpression | BinaryExpression | LambdaExpression |
     * LiteralExpression | ObjectCreationExpression | ScopeResolutionExpression |
     * SubscriptExpression | NameToken | VariableExpression |
     * VectorIntrinsicExpression
     */
    /**
     * @return EditableNode
     */
    public function getValuex()
    {
        return $this->getValue();
    }
}

