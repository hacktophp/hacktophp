<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ed3691e39bf9a11f88dc833d5054fc7f>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPLateinit extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_lateinit';
    /**
     * @var AtToken
     */
    private $_at;
    /**
     * @var LateinitToken
     */
    private $_keyword;
    public function __construct(AtToken $at, LateinitToken $keyword, ?array $source_ref = null)
    {
        $this->_at = $at;
        $this->_keyword = $keyword;
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
        $at = Node::fromJSON($json['xhp_lateinit_at'], $file, $offset, $source, 'AtToken');
        $at = $at !== null ? $at : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $at->getWidth();
        $keyword = Node::fromJSON($json['xhp_lateinit_keyword'], $file, $offset, $source, 'LateinitToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($at, $keyword, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['at' => $this->_at, 'keyword' => $this->_keyword]);
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
        $at = $rewriter($this->_at, $parents);
        $keyword = $rewriter($this->_keyword, $parents);
        if ($at === $this->_at && $keyword === $this->_keyword) {
            return $this;
        }
        return new static($at, $keyword);
    }
    /**
     * @return null|Node
     */
    public function getAtUNTYPED()
    {
        return $this->_at;
    }
    /**
     * @return static
     */
    public function withAt(AtToken $value)
    {
        if ($value === $this->_at) {
            return $this;
        }
        return new static($value, $this->_keyword);
    }
    /**
     * @return bool
     */
    public function hasAt()
    {
        return $this->_at !== null;
    }
    /**
     * @return AtToken
     */
    /**
     * @return AtToken
     */
    public function getAt()
    {
        return TypeAssert\instance_of(AtToken::class, $this->_at);
    }
    /**
     * @return AtToken
     */
    /**
     * @return AtToken
     */
    public function getAtx()
    {
        return $this->getAt();
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
    public function withKeyword(LateinitToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($this->_at, $value);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return LateinitToken
     */
    /**
     * @return LateinitToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(LateinitToken::class, $this->_keyword);
    }
    /**
     * @return LateinitToken
     */
    /**
     * @return LateinitToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
}

