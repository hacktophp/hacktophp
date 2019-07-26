<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5b17cf12fe82fbdcb29e763cb0dd228f>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPSimpleClassAttribute extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_simple_class_attribute';
    /**
     * @var SimpleTypeSpecifier
     */
    private $_type;
    public function __construct(SimpleTypeSpecifier $type, ?__Private\SourceRef $source_ref = null)
    {
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
        $type = Node::fromJSON($json['xhp_simple_class_attribute_type'], $file, $offset, $source, 'SimpleTypeSpecifier');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['type' => $this->_type]);
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
        $type = $rewriter($this->_type, $parents);
        if ($type === $this->_type) {
            return $this;
        }
        return new static($type);
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
    public function withType(SimpleTypeSpecifier $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(SimpleTypeSpecifier::class, $this->_type);
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

