<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ac2d7850aae3145c8a86475e9c4a8cb1>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PocketEnumDeclaration extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'pocket_enum_declaration';
    /**
     * @var Node
     */
    private $_modifiers;
    /**
     * @var Node
     */
    private $_enum;
    /**
     * @var Node
     */
    private $_name;
    /**
     * @var Node
     */
    private $_left_brace;
    /**
     * @var Node
     */
    private $_fields;
    /**
     * @var Node
     */
    private $_right_brace;
    public function __construct(Node $modifiers, Node $enum, Node $name, Node $left_brace, Node $fields, Node $right_brace, ?__Private\SourceRef $source_ref = null)
    {
        $this->_modifiers = $modifiers;
        $this->_enum = $enum;
        $this->_name = $name;
        $this->_left_brace = $left_brace;
        $this->_fields = $fields;
        $this->_right_brace = $right_brace;
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
        $modifiers = Node::fromJSON($json['pocket_enum_modifiers'], $file, $offset, $source, 'Node');
        $modifiers = $modifiers !== null ? $modifiers : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $modifiers->getWidth();
        $enum = Node::fromJSON($json['pocket_enum_enum'], $file, $offset, $source, 'Node');
        $enum = $enum !== null ? $enum : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $enum->getWidth();
        $name = Node::fromJSON($json['pocket_enum_name'], $file, $offset, $source, 'Node');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $left_brace = Node::fromJSON($json['pocket_enum_left_brace'], $file, $offset, $source, 'Node');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $fields = Node::fromJSON($json['pocket_enum_fields'], $file, $offset, $source, 'Node');
        $fields = $fields !== null ? $fields : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $fields->getWidth();
        $right_brace = Node::fromJSON($json['pocket_enum_right_brace'], $file, $offset, $source, 'Node');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($modifiers, $enum, $name, $left_brace, $fields, $right_brace, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['modifiers' => $this->_modifiers, 'enum' => $this->_enum, 'name' => $this->_name, 'left_brace' => $this->_left_brace, 'fields' => $this->_fields, 'right_brace' => $this->_right_brace]);
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
        $modifiers = $rewriter($this->_modifiers, $parents);
        $enum = $rewriter($this->_enum, $parents);
        $name = $rewriter($this->_name, $parents);
        $left_brace = $rewriter($this->_left_brace, $parents);
        $fields = $rewriter($this->_fields, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        if ($modifiers === $this->_modifiers && $enum === $this->_enum && $name === $this->_name && $left_brace === $this->_left_brace && $fields === $this->_fields && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($modifiers, $enum, $name, $left_brace, $fields, $right_brace);
    }
    /**
     * @return null|Node
     */
    public function getModifiersUNTYPED()
    {
        return $this->_modifiers;
    }
    /**
     * @return static
     */
    public function withModifiers(Node $value)
    {
        if ($value === $this->_modifiers) {
            return $this;
        }
        return new static($value, $this->_enum, $this->_name, $this->_left_brace, $this->_fields, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasModifiers()
    {
        return $this->_modifiers !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getModifiers()
    {
        return $this->_modifiers;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getModifiersx()
    {
        return $this->getModifiers();
    }
    /**
     * @return null|Node
     */
    public function getEnumUNTYPED()
    {
        return $this->_enum;
    }
    /**
     * @return static
     */
    public function withEnum(Node $value)
    {
        if ($value === $this->_enum) {
            return $this;
        }
        return new static($this->_modifiers, $value, $this->_name, $this->_left_brace, $this->_fields, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasEnum()
    {
        return $this->_enum !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getEnum()
    {
        return $this->_enum;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getEnumx()
    {
        return $this->getEnum();
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
        return new static($this->_modifiers, $this->_enum, $value, $this->_left_brace, $this->_fields, $this->_right_brace);
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
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(Node $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($this->_modifiers, $this->_enum, $this->_name, $value, $this->_fields, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return $this->_left_brace !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getLeftBrace()
    {
        return $this->_left_brace;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return null|Node
     */
    public function getFieldsUNTYPED()
    {
        return $this->_fields;
    }
    /**
     * @return static
     */
    public function withFields(Node $value)
    {
        if ($value === $this->_fields) {
            return $this;
        }
        return new static($this->_modifiers, $this->_enum, $this->_name, $this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasFields()
    {
        return $this->_fields !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getFields()
    {
        return $this->_fields;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getFieldsx()
    {
        return $this->getFields();
    }
    /**
     * @return null|Node
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(Node $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_modifiers, $this->_enum, $this->_name, $this->_left_brace, $this->_fields, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return $this->_right_brace !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getRightBrace()
    {
        return $this->_right_brace;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

