<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<783f577048291f559813cbd264102c88>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PocketFieldTypeDeclaration extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'pocket_field_type_declaration';
    /**
     * @var Node
     */
    private $_case;
    /**
     * @var Node
     */
    private $_type;
    /**
     * @var Node
     */
    private $_name;
    /**
     * @var Node
     */
    private $_semicolon;
    public function __construct(Node $case, Node $type, Node $name, Node $semicolon, ?array $source_ref = null)
    {
        $this->_case = $case;
        $this->_type = $type;
        $this->_name = $name;
        $this->_semicolon = $semicolon;
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
        $case = Node::fromJSON($json['pocket_field_type_case'], $file, $offset, $source, 'Node');
        $case = $case !== null ? $case : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $case->getWidth();
        $type = Node::fromJSON($json['pocket_field_type_type'], $file, $offset, $source, 'Node');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $name = Node::fromJSON($json['pocket_field_type_name'], $file, $offset, $source, 'Node');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $semicolon = Node::fromJSON($json['pocket_field_type_semicolon'], $file, $offset, $source, 'Node');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($case, $type, $name, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['case' => $this->_case, 'type' => $this->_type, 'name' => $this->_name, 'semicolon' => $this->_semicolon]);
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
        $case = $rewriter($this->_case, $parents);
        $type = $rewriter($this->_type, $parents);
        $name = $rewriter($this->_name, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($case === $this->_case && $type === $this->_type && $name === $this->_name && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($case, $type, $name, $semicolon);
    }
    /**
     * @return null|Node
     */
    public function getCaseUNTYPED()
    {
        return $this->_case;
    }
    /**
     * @return static
     */
    public function withCase(Node $value)
    {
        if ($value === $this->_case) {
            return $this;
        }
        return new static($value, $this->_type, $this->_name, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasCase()
    {
        return $this->_case !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getCase()
    {
        return $this->_case;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getCasex()
    {
        return $this->getCase();
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
        return new static($this->_case, $value, $this->_name, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @return unknown
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
        return new static($this->_case, $this->_type, $value, $this->_semicolon);
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
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(Node $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_case, $this->_type, $this->_name, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return $this->_semicolon !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getSemicolon()
    {
        return $this->_semicolon;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

