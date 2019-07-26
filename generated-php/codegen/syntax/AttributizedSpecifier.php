<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d74ff72b0718b801723da58233b1cf9f>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class AttributizedSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'attributized_specifier';
    /**
     * @var OldAttributeSpecification
     */
    private $_attribute_spec;
    /**
     * @var ISimpleCreationSpecifier
     */
    private $_type;
    public function __construct(OldAttributeSpecification $attribute_spec, ISimpleCreationSpecifier $type, ?array $source_ref = null)
    {
        $this->_attribute_spec = $attribute_spec;
        $this->_type = $type;
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
        $attribute_spec = Node::fromJSON($json['attributized_specifier_attribute_spec'], $file, $offset, $source, 'OldAttributeSpecification');
        $attribute_spec = $attribute_spec !== null ? $attribute_spec : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $attribute_spec->getWidth();
        $type = Node::fromJSON($json['attributized_specifier_type'], $file, $offset, $source, 'ISimpleCreationSpecifier');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute_spec, $type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute_spec' => $this->_attribute_spec, 'type' => $this->_type]);
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
        $attribute_spec = $rewriter($this->_attribute_spec, $parents);
        $type = $rewriter($this->_type, $parents);
        if ($attribute_spec === $this->_attribute_spec && $type === $this->_type) {
            return $this;
        }
        return new static($attribute_spec, $type);
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
    public function withAttributeSpec(OldAttributeSpecification $value)
    {
        if ($value === $this->_attribute_spec) {
            return $this;
        }
        return new static($value, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasAttributeSpec()
    {
        return $this->_attribute_spec !== null;
    }
    /**
     * @return OldAttributeSpecification
     */
    /**
     * @return OldAttributeSpecification
     */
    public function getAttributeSpec()
    {
        return TypeAssert\instance_of(OldAttributeSpecification::class, $this->_attribute_spec);
    }
    /**
     * @return OldAttributeSpecification
     */
    /**
     * @return OldAttributeSpecification
     */
    public function getAttributeSpecx()
    {
        return $this->getAttributeSpec();
    }
    /**
     * @return null|Node
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(ISimpleCreationSpecifier $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_attribute_spec, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return ISimpleCreationSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(ISimpleCreationSpecifier::class, $this->_type);
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return ISimpleCreationSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

