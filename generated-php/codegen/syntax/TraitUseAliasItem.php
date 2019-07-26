<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0fa0ac359f180e86bef42d9c6fe8e320>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TraitUseAliasItem extends Node implements ITraitUseItem
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'trait_use_alias_item';
    /**
     * @var Node
     */
    private $_aliasing_name;
    /**
     * @var AsToken
     */
    private $_keyword;
    /**
     * @var NodeList<Token>|null
     */
    private $_modifiers;
    /**
     * @var null|SimpleTypeSpecifier
     */
    private $_aliased_name;
    /**
     * @param NodeList<Token>|null $modifiers
     */
    public function __construct(Node $aliasing_name, AsToken $keyword, ?NodeList $modifiers, ?SimpleTypeSpecifier $aliased_name, ?__Private\SourceRef $source_ref = null)
    {
        $this->_aliasing_name = $aliasing_name;
        $this->_keyword = $keyword;
        $this->_modifiers = $modifiers;
        $this->_aliased_name = $aliased_name;
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
        $aliasing_name = Node::fromJSON($json['trait_use_alias_item_aliasing_name'], $file, $offset, $source, 'Node');
        $aliasing_name = $aliasing_name !== null ? $aliasing_name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $aliasing_name->getWidth();
        $keyword = Node::fromJSON($json['trait_use_alias_item_keyword'], $file, $offset, $source, 'AsToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $modifiers = Node::fromJSON($json['trait_use_alias_item_modifiers'], $file, $offset, $source, 'NodeList<Token>');
        $offset += (($__tmp1__ = $modifiers) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $aliased_name = Node::fromJSON($json['trait_use_alias_item_aliased_name'], $file, $offset, $source, 'SimpleTypeSpecifier');
        $offset += (($__tmp2__ = $aliased_name) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($aliasing_name, $keyword, $modifiers, $aliased_name, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['aliasing_name' => $this->_aliasing_name, 'keyword' => $this->_keyword, 'modifiers' => $this->_modifiers, 'aliased_name' => $this->_aliased_name]);
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
        $aliasing_name = $rewriter($this->_aliasing_name, $parents);
        $keyword = $rewriter($this->_keyword, $parents);
        $modifiers = $this->_modifiers === null ? null : $rewriter($this->_modifiers, $parents);
        $aliased_name = $this->_aliased_name === null ? null : $rewriter($this->_aliased_name, $parents);
        if ($aliasing_name === $this->_aliasing_name && $keyword === $this->_keyword && $modifiers === $this->_modifiers && $aliased_name === $this->_aliased_name) {
            return $this;
        }
        return new static($aliasing_name, $keyword, $modifiers, $aliased_name);
    }
    /**
     * @return null|Node
     */
    public function getAliasingNameUNTYPED()
    {
        return $this->_aliasing_name;
    }
    /**
     * @return static
     */
    public function withAliasingName(Node $value)
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
        return $this->_aliasing_name !== null;
    }
    /**
     * @return ScopeResolutionExpression | SimpleTypeSpecifier
     */
    /**
     * @return Node
     */
    public function getAliasingName()
    {
        return $this->_aliasing_name;
    }
    /**
     * @return ScopeResolutionExpression | SimpleTypeSpecifier
     */
    /**
     * @return Node
     */
    public function getAliasingNamex()
    {
        return $this->getAliasingName();
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
    public function withKeyword(AsToken $value)
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
        return $this->_keyword !== null;
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
     * @return null|Node
     */
    public function getModifiersUNTYPED()
    {
        return $this->_modifiers;
    }
    /**
     * @param NodeList<Token>|null $value
     *
     * @return static
     */
    public function withModifiers(?NodeList $value)
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
        return $this->_modifiers !== null;
    }
    /**
     * @return NodeList<PrivateToken> | NodeList<ProtectedToken> |
     * NodeList<PublicToken> | null
     */
    /**
     * @return NodeList<Token>|null
     */
    public function getModifiers()
    {
        return $this->_modifiers;
    }
    /**
     * @return NodeList<PrivateToken> | NodeList<ProtectedToken> |
     * NodeList<PublicToken>
     */
    /**
     * @return NodeList<Token>
     */
    public function getModifiersx()
    {
        return TypeAssert\not_null($this->getModifiers());
    }
    /**
     * @return null|Node
     */
    public function getAliasedNameUNTYPED()
    {
        return $this->_aliased_name;
    }
    /**
     * @return static
     */
    public function withAliasedName(?SimpleTypeSpecifier $value)
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
        return $this->_aliased_name !== null;
    }
    /**
     * @return null | SimpleTypeSpecifier
     */
    /**
     * @return null|SimpleTypeSpecifier
     */
    public function getAliasedName()
    {
        return $this->_aliased_name;
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getAliasedNamex()
    {
        return TypeAssert\not_null($this->getAliasedName());
    }
}

