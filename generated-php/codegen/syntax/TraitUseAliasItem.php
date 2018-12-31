<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<00837caa9775cfa0da396c49bf9318fa>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class TraitUseAliasItem extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_aliasing_name;
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_modifiers;
    /**
     * @var EditableNode
     */
    private $_aliased_name;
    public function __construct(EditableNode $aliasing_name, EditableNode $keyword, EditableNode $modifiers, EditableNode $aliased_name)
    {
        parent::__construct('trait_use_alias_item');
        $this->_aliasing_name = $aliasing_name;
        $this->_keyword = $keyword;
        $this->_modifiers = $modifiers;
        $this->_aliased_name = $aliased_name;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $aliasing_name = EditableNode::fromJSON($json['trait_use_alias_item_aliasing_name'], $file, $offset, $source);
        $offset += $aliasing_name->getWidth();
        $keyword = EditableNode::fromJSON($json['trait_use_alias_item_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $modifiers = EditableNode::fromJSON($json['trait_use_alias_item_modifiers'], $file, $offset, $source);
        $offset += $modifiers->getWidth();
        $aliased_name = EditableNode::fromJSON($json['trait_use_alias_item_aliased_name'], $file, $offset, $source);
        $offset += $aliased_name->getWidth();
        return new static($aliasing_name, $keyword, $modifiers, $aliased_name);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['aliasing_name' => $this->_aliasing_name, 'keyword' => $this->_keyword, 'modifiers' => $this->_modifiers, 'aliased_name' => $this->_aliased_name];
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
        $aliasing_name = $this->_aliasing_name->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $modifiers = $this->_modifiers->rewrite($rewriter, $parents);
        $aliased_name = $this->_aliased_name->rewrite($rewriter, $parents);
        if ($aliasing_name === $this->_aliasing_name && $keyword === $this->_keyword && $modifiers === $this->_modifiers && $aliased_name === $this->_aliased_name) {
            return $this;
        }
        return new static($aliasing_name, $keyword, $modifiers, $aliased_name);
    }
    /**
     * @return EditableNode
     */
    public function getAliasingNameUNTYPED()
    {
        return $this->_aliasing_name;
    }
    /**
     * @return static
     */
    public function withAliasingName(EditableNode $value)
    {
        if ($value === $this->_aliasing_name) {
            return $this;
        }
        return new static($value, $this->_keyword, $this->_modifiers, $this->_aliased_name);
    }
    /**
     * @return bool
     */
    public function hasAliasingName()
    {
        return !$this->_aliasing_name->isMissing();
    }
    /**
     * @return ScopeResolutionExpression | SimpleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getAliasingName()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_aliasing_name);
    }
    /**
     * @return ScopeResolutionExpression | SimpleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getAliasingNamex()
    {
        return $this->getAliasingName();
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
        return new static($this->_aliasing_name, $value, $this->_modifiers, $this->_aliased_name);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return AsToken
     */
    /**
     * @return AsToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(AsToken::class, $this->_keyword);
    }
    /**
     * @return AsToken
     */
    /**
     * @return AsToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getModifiersUNTYPED()
    {
        return $this->_modifiers;
    }
    /**
     * @return static
     */
    public function withModifiers(EditableNode $value)
    {
        if ($value === $this->_modifiers) {
            return $this;
        }
        return new static($this->_aliasing_name, $this->_keyword, $value, $this->_aliased_name);
    }
    /**
     * @return bool
     */
    public function hasModifiers()
    {
        return !$this->_modifiers->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getModifiers()
    {
        if ($this->_modifiers->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_modifiers);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getModifiersx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_modifiers);
    }
    /**
     * @return EditableNode
     */
    public function getAliasedNameUNTYPED()
    {
        return $this->_aliased_name;
    }
    /**
     * @return static
     */
    public function withAliasedName(EditableNode $value)
    {
        if ($value === $this->_aliased_name) {
            return $this;
        }
        return new static($this->_aliasing_name, $this->_keyword, $this->_modifiers, $value);
    }
    /**
     * @return bool
     */
    public function hasAliasedName()
    {
        return !$this->_aliased_name->isMissing();
    }
    /**
     * @return null | SimpleTypeSpecifier
     */
    /**
     * @return null|SimpleTypeSpecifier
     */
    public function getAliasedName()
    {
        if ($this->_aliased_name->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(SimpleTypeSpecifier::class, $this->_aliased_name);
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getAliasedNamex()
    {
        return TypeAssert\instance_of(SimpleTypeSpecifier::class, $this->_aliased_name);
    }
}

