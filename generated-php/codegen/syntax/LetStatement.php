<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f108c6e7002662ca5b21693ac5c39cd7>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class LetStatement extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'let_statement';
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
    private $_colon;
    /**
     * @var Node
     */
    private $_type;
    /**
     * @var Node
     */
    private $_initializer;
    /**
     * @var Node
     */
    private $_semicolon;
    public function __construct(Node $keyword, Node $name, Node $colon, Node $type, Node $initializer, Node $semicolon, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_colon = $colon;
        $this->_type = $type;
        $this->_initializer = $initializer;
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
        $keyword = Node::fromJSON($json['let_statement_keyword'], $file, $offset, $source, 'Node');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $name = Node::fromJSON($json['let_statement_name'], $file, $offset, $source, 'Node');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $colon = Node::fromJSON($json['let_statement_colon'], $file, $offset, $source, 'Node');
        $colon = $colon !== null ? $colon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $colon->getWidth();
        $type = Node::fromJSON($json['let_statement_type'], $file, $offset, $source, 'Node');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $initializer = Node::fromJSON($json['let_statement_initializer'], $file, $offset, $source, 'Node');
        $initializer = $initializer !== null ? $initializer : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $initializer->getWidth();
        $semicolon = Node::fromJSON($json['let_statement_semicolon'], $file, $offset, $source, 'Node');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $name, $colon, $type, $initializer, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'name' => $this->_name, 'colon' => $this->_colon, 'type' => $this->_type, 'initializer' => $this->_initializer, 'semicolon' => $this->_semicolon]);
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
        $colon = $rewriter($this->_colon, $parents);
        $type = $rewriter($this->_type, $parents);
        $initializer = $rewriter($this->_initializer, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $name === $this->_name && $colon === $this->_colon && $type === $this->_type && $initializer === $this->_initializer && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $name, $colon, $type, $initializer, $semicolon);
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
        return new static($value, $this->_name, $this->_colon, $this->_type, $this->_initializer, $this->_semicolon);
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
        return new static($this->_keyword, $value, $this->_colon, $this->_type, $this->_initializer, $this->_semicolon);
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
        return new static($this->_keyword, $this->_name, $value, $this->_type, $this->_initializer, $this->_semicolon);
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
        return new static($this->_keyword, $this->_name, $this->_colon, $value, $this->_initializer, $this->_semicolon);
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
        return new static($this->_keyword, $this->_name, $this->_colon, $this->_type, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasInitializer()
    {
        return $this->_initializer !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getInitializer()
    {
        return $this->_initializer;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getInitializerx()
    {
        return $this->getInitializer();
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
        return new static($this->_keyword, $this->_name, $this->_colon, $this->_type, $this->_initializer, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return $this->_semicolon !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getSemicolon()
    {
        return $this->_semicolon;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

