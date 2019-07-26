<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<dbeb7e58f875d8600056857af66d0c35>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TraitUse extends Node implements IClassBodyDeclaration
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'trait_use';
    /**
     * @var UseToken
     */
    private $_keyword;
    /**
     * @var NodeList<ListItem<ISimpleCreationSpecifier>>
     */
    private $_names;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    /**
     * @param NodeList<ListItem<ISimpleCreationSpecifier>> $names
     */
    public function __construct(UseToken $keyword, NodeList $names, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_names = $names;
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
        $keyword = Node::fromJSON($json['trait_use_keyword'], $file, $offset, $source, 'UseToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $names = Node::fromJSON($json['trait_use_names'], $file, $offset, $source, 'NodeList<ListItem<ISimpleCreationSpecifier>>');
        $names = $names !== null ? $names : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $names->getWidth();
        $semicolon = Node::fromJSON($json['trait_use_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $names, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'names' => $this->_names, 'semicolon' => $this->_semicolon]);
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
        $names = $rewriter($this->_names, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $names === $this->_names && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $names, $semicolon);
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
    public function withKeyword(UseToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_names, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return UseToken
     */
    /**
     * @return UseToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(UseToken::class, $this->_keyword);
    }
    /**
     * @return UseToken
     */
    /**
     * @return UseToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getNamesUNTYPED()
    {
        return $this->_names;
    }
    /**
     * @param NodeList<ListItem<ISimpleCreationSpecifier>> $value
     *
     * @return static
     */
    public function withNames(NodeList $value)
    {
        if ($value === $this->_names) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasNames()
    {
        return $this->_names !== null;
    }
    /**
     * @return NodeList<ListItem<GenericTypeSpecifier>> |
     * NodeList<ListItem<ISimpleCreationSpecifier>> |
     * NodeList<ListItem<SimpleTypeSpecifier>>
     */
    /**
     * @return NodeList<ListItem<ISimpleCreationSpecifier>>
     */
    public function getNames()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_names);
    }
    /**
     * @return NodeList<ListItem<GenericTypeSpecifier>> |
     * NodeList<ListItem<ISimpleCreationSpecifier>> |
     * NodeList<ListItem<SimpleTypeSpecifier>>
     */
    /**
     * @return NodeList<ListItem<ISimpleCreationSpecifier>>
     */
    public function getNamesx()
    {
        return $this->getNames();
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
        return new static($this->_keyword, $this->_names, $value);
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

