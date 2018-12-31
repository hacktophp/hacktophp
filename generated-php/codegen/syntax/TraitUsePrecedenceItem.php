<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ca38f92190905ac87833cba3ec407d87>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class TraitUsePrecedenceItem extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_removed_names;
    public function __construct(EditableNode $name, EditableNode $keyword, EditableNode $removed_names)
    {
        parent::__construct('trait_use_precedence_item');
        $this->_name = $name;
        $this->_keyword = $keyword;
        $this->_removed_names = $removed_names;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $name = EditableNode::fromJSON($json['trait_use_precedence_item_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $keyword = EditableNode::fromJSON($json['trait_use_precedence_item_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $removed_names = EditableNode::fromJSON($json['trait_use_precedence_item_removed_names'], $file, $offset, $source);
        $offset += $removed_names->getWidth();
        return new static($name, $keyword, $removed_names);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['name' => $this->_name, 'keyword' => $this->_keyword, 'removed_names' => $this->_removed_names];
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
        $name = $this->_name->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $removed_names = $this->_removed_names->rewrite($rewriter, $parents);
        if ($name === $this->_name && $keyword === $this->_keyword && $removed_names === $this->_removed_names) {
            return $this;
        }
        return new static($name, $keyword, $removed_names);
    }
    /**
     * @return EditableNode
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(EditableNode $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($value, $this->_keyword, $this->_removed_names);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return ScopeResolutionExpression
     */
    /**
     * @return ScopeResolutionExpression
     */
    public function getName()
    {
        return TypeAssert\instance_of(ScopeResolutionExpression::class, $this->_name);
    }
    /**
     * @return ScopeResolutionExpression
     */
    /**
     * @return ScopeResolutionExpression
     */
    public function getNamex()
    {
        return $this->getName();
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
        return new static($this->_name, $value, $this->_removed_names);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return InsteadofToken
     */
    /**
     * @return InsteadofToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(InsteadofToken::class, $this->_keyword);
    }
    /**
     * @return InsteadofToken
     */
    /**
     * @return InsteadofToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getRemovedNamesUNTYPED()
    {
        return $this->_removed_names;
    }
    /**
     * @return static
     */
    public function withRemovedNames(EditableNode $value)
    {
        if ($value === $this->_removed_names) {
            return $this;
        }
        return new static($this->_name, $this->_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasRemovedNames()
    {
        return !$this->_removed_names->isMissing();
    }
    /**
     * @return EditableList<SimpleTypeSpecifier>
     */
    /**
     * @return EditableList<SimpleTypeSpecifier>
     */
    public function getRemovedNames()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_removed_names);
    }
    /**
     * @return EditableList<SimpleTypeSpecifier>
     */
    /**
     * @return EditableList<SimpleTypeSpecifier>
     */
    public function getRemovedNamesx()
    {
        return $this->getRemovedNames();
    }
}

