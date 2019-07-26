<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ac60645c84ec608f9f7347cc9ede2ed1>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class SwitchFallthrough extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'switch_fallthrough';
    /**
     * @var null|Node
     */
    private $_keyword;
    /**
     * @var null|Node
     */
    private $_semicolon;
    public function __construct(?Node $keyword, ?Node $semicolon, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
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
        $keyword = Node::fromJSON($json['fallthrough_keyword'], $file, $offset, $source, 'Node');
        $offset += (($__tmp1__ = $keyword) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $semicolon = Node::fromJSON($json['fallthrough_semicolon'], $file, $offset, $source, 'Node');
        $offset += (($__tmp2__ = $semicolon) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'semicolon' => $this->_semicolon]);
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
        $keyword = $this->_keyword === null ? null : $rewriter($this->_keyword, $parents);
        $semicolon = $this->_semicolon === null ? null : $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $semicolon);
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
    public function withKeyword(?Node $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
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
        return TypeAssert\not_null($this->getKeyword());
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
    public function withSemicolon(?Node $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return $this->_semicolon !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
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
        return TypeAssert\not_null($this->getSemicolon());
    }
}

