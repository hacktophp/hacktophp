<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<437f3b4b516d71e8eb5b17a66676a2a9>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TypeParameter extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'type_parameter';
    /**
     * @var null|OldAttributeSpecification
     */
    private $_attribute_spec;
    /**
     * @var null|ReifyToken
     */
    private $_reified;
    /**
     * @var null|Token
     */
    private $_variance;
    /**
     * @var NameToken
     */
    private $_name;
    /**
     * @var NodeList<TypeConstraint>|null
     */
    private $_constraints;
    /**
     * @param NodeList<TypeConstraint>|null $constraints
     */
    public function __construct(?OldAttributeSpecification $attribute_spec, ?ReifyToken $reified, ?Token $variance, NameToken $name, ?NodeList $constraints, ?__Private\SourceRef $source_ref = null)
    {
        $this->_attribute_spec = $attribute_spec;
        $this->_reified = $reified;
        $this->_variance = $variance;
        $this->_name = $name;
        $this->_constraints = $constraints;
        parent::__construct($source_ref);
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $initial_offset, string $source, string $_type_hint)
    {
        $offset = $initial_offset;
        $attribute_spec = Node::fromJSON($json['type_attribute_spec'], $file, $offset, $source, 'OldAttributeSpecification');
        $offset += (($__tmp1__ = $attribute_spec) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $reified = Node::fromJSON($json['type_reified'], $file, $offset, $source, 'ReifyToken');
        $offset += (($__tmp2__ = $reified) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $variance = Node::fromJSON($json['type_variance'], $file, $offset, $source, 'Token');
        $offset += (($__tmp3__ = $variance) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $name = Node::fromJSON($json['type_name'], $file, $offset, $source, 'NameToken');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $constraints = Node::fromJSON($json['type_constraints'], $file, $offset, $source, 'NodeList<TypeConstraint>');
        $offset += (($__tmp4__ = $constraints) !== null ? $__tmp4__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute_spec, $reified, $variance, $name, $constraints, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute_spec' => $this->_attribute_spec, 'reified' => $this->_reified, 'variance' => $this->_variance, 'name' => $this->_name, 'constraints' => $this->_constraints]);
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return static
     */
    public function rewriteChildren(\Closure $rewriter, array $parents = [])
    {
        $parents[] = $this;
        $attribute_spec = $this->_attribute_spec === null ? null : $rewriter($this->_attribute_spec, $parents);
        $reified = $this->_reified === null ? null : $rewriter($this->_reified, $parents);
        $variance = $this->_variance === null ? null : $rewriter($this->_variance, $parents);
        $name = $rewriter($this->_name, $parents);
        $constraints = $this->_constraints === null ? null : $rewriter($this->_constraints, $parents);
        if ($attribute_spec === $this->_attribute_spec && $reified === $this->_reified && $variance === $this->_variance && $name === $this->_name && $constraints === $this->_constraints) {
            return $this;
        }
        return new static($attribute_spec, $reified, $variance, $name, $constraints);
    }
    /**
     * @return null|Node
     */
    public function getAttributeSpecUNTYPED()
    {
        return $this->_attribute_spec;
    }
    /**
     * @return static
     */
    public function withAttributeSpec(?OldAttributeSpecification $value)
    {
        if ($value === $this->_attribute_spec) {
            return $this;
        }
        return new static($value, $this->_reified, $this->_variance, $this->_name, $this->_constraints);
    }
    /**
     * @return bool
     */
    public function hasAttributeSpec()
    {
        return $this->_attribute_spec !== null;
    }
    /**
     * @return null | OldAttributeSpecification
     */
    /**
     * @return null|OldAttributeSpecification
     */
    public function getAttributeSpec()
    {
        return $this->_attribute_spec;
    }
    /**
     * @return OldAttributeSpecification
     */
    /**
     * @return OldAttributeSpecification
     */
    public function getAttributeSpecx()
    {
        return TypeAssert\not_null($this->getAttributeSpec());
    }
    /**
     * @return null|Node
     */
    public function getReifiedUNTYPED()
    {
        return $this->_reified;
    }
    /**
     * @return static
     */
    public function withReified(?ReifyToken $value)
    {
        if ($value === $this->_reified) {
            return $this;
        }
        return new static($this->_attribute_spec, $value, $this->_variance, $this->_name, $this->_constraints);
    }
    /**
     * @return bool
     */
    public function hasReified()
    {
        return $this->_reified !== null;
    }
    /**
     * @return null | ReifyToken
     */
    /**
     * @return null|ReifyToken
     */
    public function getReified()
    {
        return $this->_reified;
    }
    /**
     * @return ReifyToken
     */
    /**
     * @return ReifyToken
     */
    public function getReifiedx()
    {
        return TypeAssert\not_null($this->getReified());
    }
    /**
     * @return null|Node
     */
    public function getVarianceUNTYPED()
    {
        return $this->_variance;
    }
    /**
     * @return static
     */
    public function withVariance(?Token $value)
    {
        if ($value === $this->_variance) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_reified, $value, $this->_name, $this->_constraints);
    }
    /**
     * @return bool
     */
    public function hasVariance()
    {
        return $this->_variance !== null;
    }
    /**
     * @return null | PlusToken | MinusToken
     */
    /**
     * @return null|Token
     */
    public function getVariance()
    {
        return $this->_variance;
    }
    /**
     * @return PlusToken | MinusToken
     */
    /**
     * @return Token
     */
    public function getVariancex()
    {
        return TypeAssert\not_null($this->getVariance());
    }
    /**
     * @return null|Node
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(NameToken $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_reified, $this->_variance, $value, $this->_constraints);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
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
     * @return null|Node
     */
    public function getConstraintsUNTYPED()
    {
        return $this->_constraints;
    }
    /**
     * @param NodeList<TypeConstraint>|null $value
     *
     * @return static
     */
    public function withConstraints(?NodeList $value)
    {
        if ($value === $this->_constraints) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_reified, $this->_variance, $this->_name, $value);
    }
    /**
     * @return bool
     */
    public function hasConstraints()
    {
        return $this->_constraints !== null;
    }
    /**
     * @return NodeList<TypeConstraint> | null
     */
    /**
     * @return NodeList<TypeConstraint>|null
     */
    public function getConstraints()
    {
        return $this->_constraints;
    }
    /**
     * @return NodeList<TypeConstraint>
     */
    /**
     * @return NodeList<TypeConstraint>
     */
    public function getConstraintsx()
    {
        return TypeAssert\not_null($this->getConstraints());
    }
}

