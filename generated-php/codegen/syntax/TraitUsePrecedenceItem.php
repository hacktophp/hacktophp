<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c831d9f323d3b1bb38ba6c4c0403d4ef>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TraitUsePrecedenceItem extends Node implements ITraitUseItem
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'trait_use_precedence_item';
    /**
     * @var ScopeResolutionExpression
     */
    private $_name;
    /**
     * @var InsteadofToken
     */
    private $_keyword;
    /**
     * @var NodeList<ListItem<SimpleTypeSpecifier>>
     */
    private $_removed_names;
    /**
     * @param NodeList<ListItem<SimpleTypeSpecifier>> $removed_names
     */
    public function __construct(ScopeResolutionExpression $name, InsteadofToken $keyword, NodeList $removed_names, ?__Private\SourceRef $source_ref = null)
    {
        $this->_name = $name;
        $this->_keyword = $keyword;
        $this->_removed_names = $removed_names;
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
        $name = Node::fromJSON($json['trait_use_precedence_item_name'], $file, $offset, $source, 'ScopeResolutionExpression');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $keyword = Node::fromJSON($json['trait_use_precedence_item_keyword'], $file, $offset, $source, 'InsteadofToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $removed_names = Node::fromJSON($json['trait_use_precedence_item_removed_names'], $file, $offset, $source, 'NodeList<ListItem<SimpleTypeSpecifier>>');
        $removed_names = $removed_names !== null ? $removed_names : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $removed_names->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($name, $keyword, $removed_names, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['name' => $this->_name, 'keyword' => $this->_keyword, 'removed_names' => $this->_removed_names]);
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
        $name = $rewriter($this->_name, $parents);
        $keyword = $rewriter($this->_keyword, $parents);
        $removed_names = $rewriter($this->_removed_names, $parents);
        if ($name === $this->_name && $keyword === $this->_keyword && $removed_names === $this->_removed_names) {
            return $this;
        }
        return new static($name, $keyword, $removed_names);
    }
    /**
     * @return null|Node
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(ScopeResolutionExpression $value)
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
        return $this->_name !== null;
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
     * @return null|Node
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(InsteadofToken $value)
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
        return $this->_keyword !== null;
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
     * @return null|Node
     */
    public function getRemovedNamesUNTYPED()
    {
        return $this->_removed_names;
    }
    /**
     * @param NodeList<ListItem<SimpleTypeSpecifier>> $value
     *
     * @return static
     */
    public function withRemovedNames(NodeList $value)
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
        return $this->_removed_names !== null;
    }
    /**
     * @return NodeList<ListItem<SimpleTypeSpecifier>>
     */
    /**
     * @return NodeList<ListItem<SimpleTypeSpecifier>>
     */
    public function getRemovedNames()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_removed_names);
    }
    /**
     * @return NodeList<ListItem<SimpleTypeSpecifier>>
     */
    /**
     * @return NodeList<ListItem<SimpleTypeSpecifier>>
     */
    public function getRemovedNamesx()
    {
        return $this->getRemovedNames();
    }
}

