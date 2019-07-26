<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ddf11979fa158bd15a171b7511f6c70c>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class GotoLabel extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'goto_label';
    /**
     * @var NameToken
     */
    private $_name;
    /**
     * @var ColonToken
     */
    private $_colon;
    public function __construct(NameToken $name, ColonToken $colon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_name = $name;
        $this->_colon = $colon;
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
        $name = Node::fromJSON($json['goto_label_name'], $file, $offset, $source, 'NameToken');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $colon = Node::fromJSON($json['goto_label_colon'], $file, $offset, $source, 'ColonToken');
        $colon = $colon !== null ? $colon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $colon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($name, $colon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['name' => $this->_name, 'colon' => $this->_colon]);
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
        if ($name === $this->_name && $colon === $this->_colon) {
            return $this;
        }
        return new static($name, $colon);
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
    public function withName(NameToken $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($value, $this->_colon);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_name);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
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
    public function withColon(ColonToken $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_name, $value);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return $this->_colon !== null;
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColon()
    {
        return TypeAssert\instance_of(ColonToken::class, $this->_colon);
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColonx()
    {
        return $this->getColon();
    }
}

