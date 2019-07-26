<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0e5ff1a7ca83aff818d3f5204261ca99>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TraitUseConflictResolution extends Node implements IClassBodyDeclaration
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'trait_use_conflict_resolution';
    /**
     * @var UseToken
     */
    private $_keyword;
    /**
     * @var NodeList<ListItem<SimpleTypeSpecifier>>
     */
    private $_names;
    /**
     * @var LeftBraceToken
     */
    private $_left_brace;
    /**
     * @var NodeList<ListItem<ITraitUseItem>>|null
     */
    private $_clauses;
    /**
     * @var RightBraceToken
     */
    private $_right_brace;
    /**
     * @param NodeList<ListItem<SimpleTypeSpecifier>> $names
     * @param NodeList<ListItem<ITraitUseItem>>|null $clauses
     */
    public function __construct(UseToken $keyword, NodeList $names, LeftBraceToken $left_brace, ?NodeList $clauses, RightBraceToken $right_brace, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_names = $names;
        $this->_left_brace = $left_brace;
        $this->_clauses = $clauses;
        $this->_right_brace = $right_brace;
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
        $keyword = Node::fromJSON($json['trait_use_conflict_resolution_keyword'], $file, $offset, $source, 'UseToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $names = Node::fromJSON($json['trait_use_conflict_resolution_names'], $file, $offset, $source, 'NodeList<ListItem<SimpleTypeSpecifier>>');
        $names = $names !== null ? $names : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $names->getWidth();
        $left_brace = Node::fromJSON($json['trait_use_conflict_resolution_left_brace'], $file, $offset, $source, 'LeftBraceToken');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $clauses = Node::fromJSON($json['trait_use_conflict_resolution_clauses'], $file, $offset, $source, 'NodeList<ListItem<ITraitUseItem>>');
        $offset += (($__tmp1__ = $clauses) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_brace = Node::fromJSON($json['trait_use_conflict_resolution_right_brace'], $file, $offset, $source, 'RightBraceToken');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $names, $left_brace, $clauses, $right_brace, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'names' => $this->_names, 'left_brace' => $this->_left_brace, 'clauses' => $this->_clauses, 'right_brace' => $this->_right_brace]);
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
        $left_brace = $rewriter($this->_left_brace, $parents);
        $clauses = $this->_clauses === null ? null : $rewriter($this->_clauses, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        if ($keyword === $this->_keyword && $names === $this->_names && $left_brace === $this->_left_brace && $clauses === $this->_clauses && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($keyword, $names, $left_brace, $clauses, $right_brace);
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
        return new static($value, $this->_names, $this->_left_brace, $this->_clauses, $this->_right_brace);
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
     * @param NodeList<ListItem<SimpleTypeSpecifier>> $value
     *
     * @return static
     */
    public function withNames(NodeList $value)
    {
        if ($value === $this->_names) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_left_brace, $this->_clauses, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasNames()
    {
        return $this->_names !== null;
    }
    /**
     * @return NodeList<ListItem<SimpleTypeSpecifier>>
     */
    /**
     * @return NodeList<ListItem<SimpleTypeSpecifier>>
     */
    public function getNames()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_names);
    }
    /**
     * @return NodeList<ListItem<SimpleTypeSpecifier>>
     */
    /**
     * @return NodeList<ListItem<SimpleTypeSpecifier>>
     */
    public function getNamesx()
    {
        return $this->getNames();
    }
    /**
     * @return null|Node
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(LeftBraceToken $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($this->_keyword, $this->_names, $value, $this->_clauses, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return $this->_left_brace !== null;
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBrace()
    {
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return null|Node
     */
    public function getClausesUNTYPED()
    {
        return $this->_clauses;
    }
    /**
     * @param NodeList<ListItem<ITraitUseItem>>|null $value
     *
     * @return static
     */
    public function withClauses(?NodeList $value)
    {
        if ($value === $this->_clauses) {
            return $this;
        }
        return new static($this->_keyword, $this->_names, $this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasClauses()
    {
        return $this->_clauses !== null;
    }
    /**
     * @return NodeList<ListItem<TraitUseAliasItem>> |
     * NodeList<ListItem<ITraitUseItem>> |
     * NodeList<ListItem<TraitUsePrecedenceItem>> | null
     */
    /**
     * @return NodeList<ListItem<ITraitUseItem>>|null
     */
    public function getClauses()
    {
        return $this->_clauses;
    }
    /**
     * @return NodeList<ListItem<TraitUseAliasItem>> |
     * NodeList<ListItem<ITraitUseItem>> |
     * NodeList<ListItem<TraitUsePrecedenceItem>>
     */
    /**
     * @return NodeList<ListItem<ITraitUseItem>>
     */
    public function getClausesx()
    {
        return TypeAssert\not_null($this->getClauses());
    }
    /**
     * @return null|Node
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(RightBraceToken $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_keyword, $this->_names, $this->_left_brace, $this->_clauses, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return $this->_right_brace !== null;
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBrace()
    {
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

