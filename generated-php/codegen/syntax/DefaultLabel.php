<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<debe6bcf1ec67c1dc3497f2a7cdcb67f>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class DefaultLabel extends Node implements ISwitchLabel
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'default_label';
    /**
     * @var DefaultToken
     */
    private $_keyword;
    /**
     * @var ColonToken
     */
    private $_colon;
    public function __construct(DefaultToken $keyword, ColonToken $colon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
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
        $keyword = Node::fromJSON($json['default_keyword'], $file, $offset, $source, 'DefaultToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $colon = Node::fromJSON($json['default_colon'], $file, $offset, $source, 'ColonToken');
        $colon = $colon !== null ? $colon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $colon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $colon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'colon' => $this->_colon]);
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
        $colon = $rewriter($this->_colon, $parents);
        if ($keyword === $this->_keyword && $colon === $this->_colon) {
            return $this;
        }
        return new static($keyword, $colon);
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
    public function withKeyword(DefaultToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_colon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return DefaultToken
     */
    /**
     * @return DefaultToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(DefaultToken::class, $this->_keyword);
    }
    /**
     * @return DefaultToken
     */
    /**
     * @return DefaultToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
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
        return new static($this->_keyword, $value);
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

