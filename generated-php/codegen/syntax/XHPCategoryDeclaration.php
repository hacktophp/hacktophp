<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d126075898cc208eceffecdad326a1d9>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPCategoryDeclaration extends Node implements IClassBodyDeclaration
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_category_declaration';
    /**
     * @var Node
     */
    private $_keyword;
    /**
     * @var Node
     */
    private $_categories;
    /**
     * @var Node
     */
    private $_semicolon;
    public function __construct(Node $keyword, Node $categories, Node $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_categories = $categories;
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
        $keyword = Node::fromJSON($json['xhp_category_keyword'], $file, $offset, $source, 'Node');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $categories = Node::fromJSON($json['xhp_category_categories'], $file, $offset, $source, 'Node');
        $categories = $categories !== null ? $categories : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $categories->getWidth();
        $semicolon = Node::fromJSON($json['xhp_category_semicolon'], $file, $offset, $source, 'Node');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $categories, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'categories' => $this->_categories, 'semicolon' => $this->_semicolon]);
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
        $categories = $rewriter($this->_categories, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $categories === $this->_categories && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $categories, $semicolon);
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
        return new static($value, $this->_categories, $this->_semicolon);
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
    public function getCategoriesUNTYPED()
    {
        return $this->_categories;
    }
    /**
     * @return static
     */
    public function withCategories(Node $value)
    {
        if ($value === $this->_categories) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasCategories()
    {
        return $this->_categories !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getCategories()
    {
        return $this->_categories;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getCategoriesx()
    {
        return $this->getCategories();
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
        return new static($this->_keyword, $this->_categories, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return $this->_semicolon !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getSemicolon()
    {
        return $this->_semicolon;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

