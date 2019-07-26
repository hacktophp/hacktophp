<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6774fc608c4be726018db9724ab20e27>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ContinueStatement extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'continue_statement';
    /**
     * @var ContinueToken
     */
    private $_keyword;
    /**
     * @var null|LiteralExpression
     */
    private $_level;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(ContinueToken $keyword, ?LiteralExpression $level, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_level = $level;
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
        $keyword = Node::fromJSON($json['continue_keyword'], $file, $offset, $source, 'ContinueToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $level = Node::fromJSON($json['continue_level'], $file, $offset, $source, 'LiteralExpression');
        $offset += (($__tmp1__ = $level) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $semicolon = Node::fromJSON($json['continue_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $level, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'level' => $this->_level, 'semicolon' => $this->_semicolon]);
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
        $level = $this->_level === null ? null : $rewriter($this->_level, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $level === $this->_level && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $level, $semicolon);
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
    public function withKeyword(ContinueToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_level, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return ContinueToken
     */
    /**
     * @return ContinueToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ContinueToken::class, $this->_keyword);
    }
    /**
     * @return ContinueToken
     */
    /**
     * @return ContinueToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getLevelUNTYPED()
    {
        return $this->_level;
    }
    /**
     * @return static
     */
    public function withLevel(?LiteralExpression $value)
    {
        if ($value === $this->_level) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasLevel()
    {
        return $this->_level !== null;
    }
    /**
     * @return LiteralExpression | null
     */
    /**
     * @return null|LiteralExpression
     */
    public function getLevel()
    {
        return $this->_level;
    }
    /**
     * @return LiteralExpression
     */
    /**
     * @return LiteralExpression
     */
    public function getLevelx()
    {
        return TypeAssert\not_null($this->getLevel());
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
    public function withSemicolon(SemicolonToken $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_level, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return $this->_semicolon !== null;
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

