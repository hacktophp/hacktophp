<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c93dbdf0af6f0860341ace858d00f3da>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class Attribute extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'attribute';
    /**
     * @var Node
     */
    private $_at;
    /**
     * @var Node
     */
    private $_attribute_name;
    public function __construct(Node $at, Node $attribute_name, ?__Private\SourceRef $source_ref = null)
    {
        $this->_at = $at;
        $this->_attribute_name = $attribute_name;
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
        $at = Node::fromJSON($json['attribute_at'], $file, $offset, $source, 'Node');
        $at = $at !== null ? $at : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $at->getWidth();
        $attribute_name = Node::fromJSON($json['attribute_attribute_name'], $file, $offset, $source, 'Node');
        $attribute_name = $attribute_name !== null ? $attribute_name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $attribute_name->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($at, $attribute_name, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['at' => $this->_at, 'attribute_name' => $this->_attribute_name]);
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
        $at = $rewriter($this->_at, $parents);
        $attribute_name = $rewriter($this->_attribute_name, $parents);
        if ($at === $this->_at && $attribute_name === $this->_attribute_name) {
            return $this;
        }
        return new static($at, $attribute_name);
    }
    /**
     * @return null|Node
     */
    public function getAtUNTYPED()
    {
        return $this->_at;
    }
    /**
     * @return static
     */
    public function withAt(Node $value)
    {
        if ($value === $this->_at) {
            return $this;
        }
        return new static($value, $this->_attribute_name);
    }
    /**
     * @return bool
     */
    public function hasAt()
    {
        return $this->_at !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getAt()
    {
        return $this->_at;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getAtx()
    {
        return $this->getAt();
    }
    /**
     * @return null|Node
     */
    public function getAttributeNameUNTYPED()
    {
        return $this->_attribute_name;
    }
    /**
     * @return static
     */
    public function withAttributeName(Node $value)
    {
        if ($value === $this->_attribute_name) {
            return $this;
        }
        return new static($this->_at, $value);
    }
    /**
     * @return bool
     */
    public function hasAttributeName()
    {
        return $this->_attribute_name !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getAttributeName()
    {
        return $this->_attribute_name;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getAttributeNamex()
    {
        return $this->getAttributeName();
    }
}

