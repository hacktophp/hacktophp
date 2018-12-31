<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<db864e8aeac877dd6a5054fa36b46350>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class TypeParameter extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_reified;
    /**
     * @var EditableNode
     */
    private $_variance;
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_constraints;
    public function __construct(EditableNode $reified, EditableNode $variance, EditableNode $name, EditableNode $constraints)
    {
        parent::__construct('type_parameter');
        $this->_reified = $reified;
        $this->_variance = $variance;
        $this->_name = $name;
        $this->_constraints = $constraints;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $reified = EditableNode::fromJSON($json['type_reified'], $file, $offset, $source);
        $offset += $reified->getWidth();
        $variance = EditableNode::fromJSON($json['type_variance'], $file, $offset, $source);
        $offset += $variance->getWidth();
        $name = EditableNode::fromJSON($json['type_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $constraints = EditableNode::fromJSON($json['type_constraints'], $file, $offset, $source);
        $offset += $constraints->getWidth();
        return new static($reified, $variance, $name, $constraints);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['reified' => $this->_reified, 'variance' => $this->_variance, 'name' => $this->_name, 'constraints' => $this->_constraints];
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
        $reified = $this->_reified->rewrite($rewriter, $parents);
        $variance = $this->_variance->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $constraints = $this->_constraints->rewrite($rewriter, $parents);
        if ($reified === $this->_reified && $variance === $this->_variance && $name === $this->_name && $constraints === $this->_constraints) {
            return $this;
        }
        return new static($reified, $variance, $name, $constraints);
    }
    /**
     * @return EditableNode
     */
    public function getReifiedUNTYPED()
    {
        return $this->_reified;
    }
    /**
     * @return static
     */
    public function withReified(EditableNode $value)
    {
        if ($value === $this->_reified) {
            return $this;
        }
        return new static($value, $this->_variance, $this->_name, $this->_constraints);
    }
    /**
     * @return bool
     */
    public function hasReified()
    {
        return !$this->_reified->isMissing();
    }
    /**
     * @return null
     */
    /**
     * @return null|EditableNode
     */
    public function getReified()
    {
        if ($this->_reified->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_reified);
    }
    /**
     * @return
     */
    /**
     * @return EditableNode
     */
    public function getReifiedx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_reified);
    }
    /**
     * @return EditableNode
     */
    public function getVarianceUNTYPED()
    {
        return $this->_variance;
    }
    /**
     * @return static
     */
    public function withVariance(EditableNode $value)
    {
        if ($value === $this->_variance) {
            return $this;
        }
        return new static($this->_reified, $value, $this->_name, $this->_constraints);
    }
    /**
     * @return bool
     */
    public function hasVariance()
    {
        return !$this->_variance->isMissing();
    }
    /**
     * @return null | PlusToken | MinusToken
     */
    /**
     * @return null|EditableToken
     */
    public function getVariance()
    {
        if ($this->_variance->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableToken::class, $this->_variance);
    }
    /**
     * @return PlusToken | MinusToken
     */
    /**
     * @return EditableToken
     */
    public function getVariancex()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_variance);
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
        return new static($this->_reified, $this->_variance, $value, $this->_constraints);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_name);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return EditableNode
     */
    public function getConstraintsUNTYPED()
    {
        return $this->_constraints;
    }
    /**
     * @return static
     */
    public function withConstraints(EditableNode $value)
    {
        if ($value === $this->_constraints) {
            return $this;
        }
        return new static($this->_reified, $this->_variance, $this->_name, $value);
    }
    /**
     * @return bool
     */
    public function hasConstraints()
    {
        return !$this->_constraints->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getConstraints()
    {
        if ($this->_constraints->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_constraints);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getConstraintsx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_constraints);
    }
}

