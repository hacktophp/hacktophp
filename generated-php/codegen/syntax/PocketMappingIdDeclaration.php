<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e1089d89f4796504784ff0e1c0507c9c>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PocketMappingIdDeclaration extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'pocket_mapping_id_declaration';
    /**
     * @var Node
     */
    private $_name;
    /**
     * @var Node
     */
    private $_initializer;
    public function __construct(Node $name, Node $initializer, ?__Private\SourceRef $source_ref = null)
    {
        $this->_name = $name;
        $this->_initializer = $initializer;
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
        $name = Node::fromJSON($json['pocket_mapping_id_name'], $file, $offset, $source, 'Node');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $initializer = Node::fromJSON($json['pocket_mapping_id_initializer'], $file, $offset, $source, 'Node');
        $initializer = $initializer !== null ? $initializer : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $initializer->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($name, $initializer, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['name' => $this->_name, 'initializer' => $this->_initializer]);
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
        $name = $rewriter($this->_name, $parents);
        $initializer = $rewriter($this->_initializer, $parents);
        if ($name === $this->_name && $initializer === $this->_initializer) {
            return $this;
        }
        return new static($name, $initializer);
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
    public function withName(Node $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($value, $this->_initializer);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return null|Node
     */
    public function getInitializerUNTYPED()
    {
        return $this->_initializer;
    }
    /**
     * @return static
     */
    public function withInitializer(Node $value)
    {
        if ($value === $this->_initializer) {
            return $this;
        }
        return new static($this->_name, $value);
    }
    /**
     * @return bool
     */
    public function hasInitializer()
    {
        return $this->_initializer !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getInitializer()
    {
        return $this->_initializer;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getInitializerx()
    {
        return $this->getInitializer();
    }
}

