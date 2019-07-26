<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<272a5c51e449110ff62e6789eebdf9c1>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PocketMappingTypeDeclaration extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'pocket_mapping_type_declaration';
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
    private $_equal;
    /**
     * @var Node
     */
    private $_type;
    public function __construct(Node $keyword, Node $name, Node $equal, Node $type, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_equal = $equal;
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
        $keyword = Node::fromJSON($json['pocket_mapping_type_keyword'], $file, $offset, $source, 'Node');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $name = Node::fromJSON($json['pocket_mapping_type_name'], $file, $offset, $source, 'Node');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $equal = Node::fromJSON($json['pocket_mapping_type_equal'], $file, $offset, $source, 'Node');
        $equal = $equal !== null ? $equal : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $equal->getWidth();
        $type = Node::fromJSON($json['pocket_mapping_type_type'], $file, $offset, $source, 'Node');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $name, $equal, $type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'name' => $this->_name, 'equal' => $this->_equal, 'type' => $this->_type]);
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
        $keyword = $rewriter($this->_keyword, $parents);
        $name = $rewriter($this->_name, $parents);
        $equal = $rewriter($this->_equal, $parents);
        $type = $rewriter($this->_type, $parents);
        if ($keyword === $this->_keyword && $name === $this->_name && $equal === $this->_equal && $type === $this->_type) {
            return $this;
        }
        return new static($keyword, $name, $equal, $type);
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
        return new static($value, $this->_name, $this->_equal, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getKeyword()
    {
        return $this->_keyword;
    }
    /**
     * @return unknown
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
        return new static($this->_keyword, $value, $this->_equal, $this->_type);
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
    public function getEqualUNTYPED()
    {
        return $this->_equal;
    }
    /**
     * @return static
     */
    public function withEqual(Node $value)
    {
        if ($value === $this->_equal) {
            return $this;
        }
        return new static($this->_keyword, $this->_name, $value, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasEqual()
    {
        return $this->_equal !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getEqual()
    {
        return $this->_equal;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getEqualx()
    {
        return $this->getEqual();
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
        return new static($this->_keyword, $this->_name, $this->_equal, $value);
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
}

