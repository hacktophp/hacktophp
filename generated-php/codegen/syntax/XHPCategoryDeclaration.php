<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f511c419930f77c6d7940931337d7814>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class XHPCategoryDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_categories;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $categories, EditableNode $semicolon)
    {
        parent::__construct('xhp_category_declaration');
        $this->_keyword = $keyword;
        $this->_categories = $categories;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['xhp_category_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $categories = EditableNode::fromJSON($json['xhp_category_categories'], $file, $offset, $source);
        $offset += $categories->getWidth();
        $semicolon = EditableNode::fromJSON($json['xhp_category_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $categories, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'categories' => $this->_categories, 'semicolon' => $this->_semicolon];
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? [] : (array) $parents;
        $parents[] = $this;
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $categories = $this->_categories->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $categories === $this->_categories && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $categories, $semicolon);
    }
    /**
     * @return EditableNode
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(EditableNode $value)
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
        return !$this->_keyword->isMissing();
    }
    /**
     * @return CategoryToken
     */
    /**
     * @return CategoryToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(CategoryToken::class, $this->_keyword);
    }
    /**
     * @return CategoryToken
     */
    /**
     * @return CategoryToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getCategoriesUNTYPED()
    {
        return $this->_categories;
    }
    /**
     * @return static
     */
    public function withCategories(EditableNode $value)
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
        return !$this->_categories->isMissing();
    }
    /**
     * @return EditableList<XHPCategoryNameToken>
     */
    /**
     * @return EditableList<XHPCategoryNameToken>
     */
    public function getCategories()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_categories);
    }
    /**
     * @return EditableList<XHPCategoryNameToken>
     */
    /**
     * @return EditableList<XHPCategoryNameToken>
     */
    public function getCategoriesx()
    {
        return $this->getCategories();
    }
    /**
     * @return EditableNode
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(EditableNode $value)
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
        return !$this->_semicolon->isMissing();
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

