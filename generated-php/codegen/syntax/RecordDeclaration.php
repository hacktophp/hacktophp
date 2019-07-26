<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<2d250f24ee13369746ecccd4c57ac369>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class RecordDeclaration extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'record_declaration';
    /**
     * @var Node
     */
    private $_attribute_spec;
    /**
     * @var Node
     */
    private $_modifier;
    /**
     * @var Node
     */
    private $_keyword;
    /**
     * @var Node
     */
    private $_name;
    /**
     * @var Node
     */
    private $_extends_keyword;
    /**
     * @var Node
     */
    private $_extends_list;
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
    public function __construct(Node $attribute_spec, Node $modifier, Node $keyword, Node $name, Node $extends_keyword, Node $extends_list, Node $left_brace, Node $fields, Node $right_brace, ?array $source_ref = null)
    {
        $this->_attribute_spec = $attribute_spec;
        $this->_modifier = $modifier;
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_extends_keyword = $extends_keyword;
        $this->_extends_list = $extends_list;
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
        $attribute_spec = Node::fromJSON($json['record_attribute_spec'], $file, $offset, $source, 'Node');
        $attribute_spec = $attribute_spec !== null ? $attribute_spec : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $attribute_spec->getWidth();
        $modifier = Node::fromJSON($json['record_modifier'], $file, $offset, $source, 'Node');
        $modifier = $modifier !== null ? $modifier : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $modifier->getWidth();
        $keyword = Node::fromJSON($json['record_keyword'], $file, $offset, $source, 'Node');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $name = Node::fromJSON($json['record_name'], $file, $offset, $source, 'Node');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $extends_keyword = Node::fromJSON($json['record_extends_keyword'], $file, $offset, $source, 'Node');
        $extends_keyword = $extends_keyword !== null ? $extends_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $extends_keyword->getWidth();
        $extends_list = Node::fromJSON($json['record_extends_list'], $file, $offset, $source, 'Node');
        $extends_list = $extends_list !== null ? $extends_list : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $extends_list->getWidth();
        $left_brace = Node::fromJSON($json['record_left_brace'], $file, $offset, $source, 'Node');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $fields = Node::fromJSON($json['record_fields'], $file, $offset, $source, 'Node');
        $fields = $fields !== null ? $fields : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $fields->getWidth();
        $right_brace = Node::fromJSON($json['record_right_brace'], $file, $offset, $source, 'Node');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute_spec, $modifier, $keyword, $name, $extends_keyword, $extends_list, $left_brace, $fields, $right_brace, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute_spec' => $this->_attribute_spec, 'modifier' => $this->_modifier, 'keyword' => $this->_keyword, 'name' => $this->_name, 'extends_keyword' => $this->_extends_keyword, 'extends_list' => $this->_extends_list, 'left_brace' => $this->_left_brace, 'fields' => $this->_fields, 'right_brace' => $this->_right_brace]);
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
        $modifier = $rewriter($this->_modifier, $parents);
        $keyword = $rewriter($this->_keyword, $parents);
        $name = $rewriter($this->_name, $parents);
        $extends_keyword = $rewriter($this->_extends_keyword, $parents);
        $extends_list = $rewriter($this->_extends_list, $parents);
        $left_brace = $rewriter($this->_left_brace, $parents);
        $fields = $rewriter($this->_fields, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        if ($attribute_spec === $this->_attribute_spec && $modifier === $this->_modifier && $keyword === $this->_keyword && $name === $this->_name && $extends_keyword === $this->_extends_keyword && $extends_list === $this->_extends_list && $left_brace === $this->_left_brace && $fields === $this->_fields && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($attribute_spec, $modifier, $keyword, $name, $extends_keyword, $extends_list, $left_brace, $fields, $right_brace);
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
    public function withAttributeSpec(Node $value)
    {
        if ($value === $this->_attribute_spec) {
            return $this;
        }
        return new static($value, $this->_modifier, $this->_keyword, $this->_name, $this->_extends_keyword, $this->_extends_list, $this->_left_brace, $this->_fields, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasAttributeSpec()
    {
        return $this->_attribute_spec !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getAttributeSpec()
    {
        return $this->_attribute_spec;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getAttributeSpecx()
    {
        return $this->getAttributeSpec();
    }
    /**
     * @return null|Node
     */
    public function getModifierUNTYPED()
    {
        return $this->_modifier;
    }
    /**
     * @return static
     */
    public function withModifier(Node $value)
    {
        if ($value === $this->_modifier) {
            return $this;
        }
        return new static($this->_attribute_spec, $value, $this->_keyword, $this->_name, $this->_extends_keyword, $this->_extends_list, $this->_left_brace, $this->_fields, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasModifier()
    {
        return $this->_modifier !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getModifier()
    {
        return $this->_modifier;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getModifierx()
    {
        return $this->getModifier();
    }
    /**
     * @return null|Node
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(Node $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_modifier, $value, $this->_name, $this->_extends_keyword, $this->_extends_list, $this->_left_brace, $this->_fields, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getKeyword()
    {
        return $this->_keyword;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
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
        return new static($this->_attribute_spec, $this->_modifier, $this->_keyword, $value, $this->_extends_keyword, $this->_extends_list, $this->_left_brace, $this->_fields, $this->_right_brace);
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
    public function getExtendsKeywordUNTYPED()
    {
        return $this->_extends_keyword;
    }
    /**
     * @return static
     */
    public function withExtendsKeyword(Node $value)
    {
        if ($value === $this->_extends_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_modifier, $this->_keyword, $this->_name, $value, $this->_extends_list, $this->_left_brace, $this->_fields, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasExtendsKeyword()
    {
        return $this->_extends_keyword !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getExtendsKeyword()
    {
        return $this->_extends_keyword;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getExtendsKeywordx()
    {
        return $this->getExtendsKeyword();
    }
    /**
     * @return null|Node
     */
    public function getExtendsListUNTYPED()
    {
        return $this->_extends_list;
    }
    /**
     * @return static
     */
    public function withExtendsList(Node $value)
    {
        if ($value === $this->_extends_list) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_modifier, $this->_keyword, $this->_name, $this->_extends_keyword, $value, $this->_left_brace, $this->_fields, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasExtendsList()
    {
        return $this->_extends_list !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getExtendsList()
    {
        return $this->_extends_list;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getExtendsListx()
    {
        return $this->getExtendsList();
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
        return new static($this->_attribute_spec, $this->_modifier, $this->_keyword, $this->_name, $this->_extends_keyword, $this->_extends_list, $value, $this->_fields, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return $this->_left_brace !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getLeftBrace()
    {
        return $this->_left_brace;
    }
    /**
     * @return
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
        return new static($this->_attribute_spec, $this->_modifier, $this->_keyword, $this->_name, $this->_extends_keyword, $this->_extends_list, $this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasFields()
    {
        return $this->_fields !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getFields()
    {
        return $this->_fields;
    }
    /**
     * @return
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
        return new static($this->_attribute_spec, $this->_modifier, $this->_keyword, $this->_name, $this->_extends_keyword, $this->_extends_list, $this->_left_brace, $this->_fields, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return $this->_right_brace !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getRightBrace()
    {
        return $this->_right_brace;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

