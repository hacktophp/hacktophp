<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6bdaf901d32fe9e92f75273983edb822>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PrefixedStringExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'prefixed_string_expression';
    /**
     * @var Node
     */
    private $_name;
    /**
     * @var Node
     */
    private $_str;
    public function __construct(Node $name, Node $str, ?__Private\SourceRef $source_ref = null)
    {
        $this->_name = $name;
        $this->_str = $str;
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
        $name = Node::fromJSON($json['prefixed_string_name'], $file, $offset, $source, 'Node');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $str = Node::fromJSON($json['prefixed_string_str'], $file, $offset, $source, 'Node');
        $str = $str !== null ? $str : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $str->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($name, $str, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['name' => $this->_name, 'str' => $this->_str]);
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
        $str = $rewriter($this->_str, $parents);
        if ($name === $this->_name && $str === $this->_str) {
            return $this;
        }
        return new static($name, $str);
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
        return new static($value, $this->_str);
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
    public function getStrUNTYPED()
    {
        return $this->_str;
    }
    /**
     * @return static
     */
    public function withStr(Node $value)
    {
        if ($value === $this->_str) {
            return $this;
        }
        return new static($this->_name, $value);
    }
    /**
     * @return bool
     */
    public function hasStr()
    {
        return $this->_str !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getStr()
    {
        return $this->_str;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getStrx()
    {
        return $this->getStr();
    }
}

