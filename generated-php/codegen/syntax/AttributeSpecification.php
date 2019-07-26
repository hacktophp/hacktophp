<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ce4a5ff0c3c821f473fcabb0b7ffeb29>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class AttributeSpecification extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'attribute_specification';
    /**
     * @var Node
     */
    private $_attributes;
    public function __construct(Node $attributes, ?__Private\SourceRef $source_ref = null)
    {
        $this->_attributes = $attributes;
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
        $attributes = Node::fromJSON($json['attribute_specification_attributes'], $file, $offset, $source, 'Node');
        $attributes = $attributes !== null ? $attributes : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $attributes->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attributes, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attributes' => $this->_attributes]);
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
        $attributes = $rewriter($this->_attributes, $parents);
        if ($attributes === $this->_attributes) {
            return $this;
        }
        return new static($attributes);
    }
    /**
     * @return null|Node
     */
    public function getAttributesUNTYPED()
    {
        return $this->_attributes;
    }
    /**
     * @return static
     */
    public function withAttributes(Node $value)
    {
        if ($value === $this->_attributes) {
            return $this;
        }
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasAttributes()
    {
        return $this->_attributes !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getAttributesx()
    {
        return $this->getAttributes();
    }
}

