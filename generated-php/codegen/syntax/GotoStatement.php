<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<848cec49e8aeb3fdc5f4c4e81f834eb5>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class GotoStatement extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'goto_statement';
    /**
     * @var GotoToken
     */
    private $_keyword;
    /**
     * @var NameToken
     */
    private $_label_name;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(GotoToken $keyword, NameToken $label_name, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_label_name = $label_name;
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
        $keyword = Node::fromJSON($json['goto_statement_keyword'], $file, $offset, $source, 'GotoToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $label_name = Node::fromJSON($json['goto_statement_label_name'], $file, $offset, $source, 'NameToken');
        $label_name = $label_name !== null ? $label_name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $label_name->getWidth();
        $semicolon = Node::fromJSON($json['goto_statement_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $label_name, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'label_name' => $this->_label_name, 'semicolon' => $this->_semicolon]);
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
        $label_name = $rewriter($this->_label_name, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $label_name === $this->_label_name && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $label_name, $semicolon);
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
    public function withKeyword(GotoToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_label_name, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return GotoToken
     */
    /**
     * @return GotoToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(GotoToken::class, $this->_keyword);
    }
    /**
     * @return GotoToken
     */
    /**
     * @return GotoToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getLabelNameUNTYPED()
    {
        return $this->_label_name;
    }
    /**
     * @return static
     */
    public function withLabelName(NameToken $value)
    {
        if ($value === $this->_label_name) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasLabelName()
    {
        return $this->_label_name !== null;
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getLabelName()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_label_name);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getLabelNamex()
    {
        return $this->getLabelName();
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
        return new static($this->_keyword, $this->_label_name, $value);
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

