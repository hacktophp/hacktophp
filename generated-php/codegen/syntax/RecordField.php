<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<7b0fa20b1789e212beb66ba242cea713>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class RecordField extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'record_field';
    /**
     * @var Node
     */
    private $_name;
    /**
     * @var Node
     */
    private $_colon;
    /**
     * @var Node
     */
    private $_type;
    /**
     * @var Node
     */
    private $_init;
    /**
     * @var Node
     */
    private $_comma;
    public function __construct(Node $name, Node $colon, Node $type, Node $init, Node $comma, ?__Private\SourceRef $source_ref = null)
    {
        $this->_name = $name;
        $this->_colon = $colon;
        $this->_type = $type;
        $this->_init = $init;
        $this->_comma = $comma;
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
        $name = Node::fromJSON($json['record_field_name'], $file, $offset, $source, 'Node');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $colon = Node::fromJSON($json['record_field_colon'], $file, $offset, $source, 'Node');
        $colon = $colon !== null ? $colon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $colon->getWidth();
        $type = Node::fromJSON($json['record_field_type'], $file, $offset, $source, 'Node');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $init = Node::fromJSON($json['record_field_init'], $file, $offset, $source, 'Node');
        $init = $init !== null ? $init : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $init->getWidth();
        $comma = Node::fromJSON($json['record_field_comma'], $file, $offset, $source, 'Node');
        $comma = $comma !== null ? $comma : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $comma->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($name, $colon, $type, $init, $comma, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['name' => $this->_name, 'colon' => $this->_colon, 'type' => $this->_type, 'init' => $this->_init, 'comma' => $this->_comma]);
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
        $colon = $rewriter($this->_colon, $parents);
        $type = $rewriter($this->_type, $parents);
        $init = $rewriter($this->_init, $parents);
        $comma = $rewriter($this->_comma, $parents);
        if ($name === $this->_name && $colon === $this->_colon && $type === $this->_type && $init === $this->_init && $comma === $this->_comma) {
            return $this;
        }
        return new static($name, $colon, $type, $init, $comma);
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
        return new static($value, $this->_colon, $this->_type, $this->_init, $this->_comma);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @return
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
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(Node $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_name, $value, $this->_type, $this->_init, $this->_comma);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return $this->_colon !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getColon()
    {
        return $this->_colon;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getColonx()
    {
        return $this->getColon();
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
    public function withType(Node $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_name, $this->_colon, $value, $this->_init, $this->_comma);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getTypex()
    {
        return $this->getType();
    }
    /**
     * @return null|Node
     */
    public function getInitUNTYPED()
    {
        return $this->_init;
    }
    /**
     * @return static
     */
    public function withInit(Node $value)
    {
        if ($value === $this->_init) {
            return $this;
        }
        return new static($this->_name, $this->_colon, $this->_type, $value, $this->_comma);
    }
    /**
     * @return bool
     */
    public function hasInit()
    {
        return $this->_init !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getInit()
    {
        return $this->_init;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getInitx()
    {
        return $this->getInit();
    }
    /**
     * @return null|Node
     */
    public function getCommaUNTYPED()
    {
        return $this->_comma;
    }
    /**
     * @return static
     */
    public function withComma(Node $value)
    {
        if ($value === $this->_comma) {
            return $this;
        }
        return new static($this->_name, $this->_colon, $this->_type, $this->_init, $value);
    }
    /**
     * @return bool
     */
    public function hasComma()
    {
        return $this->_comma !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getComma()
    {
        return $this->_comma;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getCommax()
    {
        return $this->getComma();
    }
}

