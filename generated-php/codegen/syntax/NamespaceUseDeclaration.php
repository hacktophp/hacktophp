<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9f7d5af5987aaf1e9ebdfe21034a1728>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class NamespaceUseDeclaration extends Node implements INamespaceUseDeclaration
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'namespace_use_declaration';
    /**
     * @var UseToken
     */
    private $_keyword;
    /**
     * @var null|Token
     */
    private $_kind;
    /**
     * @var NodeList<ListItem<NamespaceUseClause>>
     */
    private $_clauses;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    /**
     * @param NodeList<ListItem<NamespaceUseClause>> $clauses
     */
    public function __construct(UseToken $keyword, ?Token $kind, NodeList $clauses, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_kind = $kind;
        $this->_clauses = $clauses;
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
        $keyword = Node::fromJSON($json['namespace_use_keyword'], $file, $offset, $source, 'UseToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $kind = Node::fromJSON($json['namespace_use_kind'], $file, $offset, $source, 'Token');
        $offset += (($__tmp1__ = $kind) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $clauses = Node::fromJSON($json['namespace_use_clauses'], $file, $offset, $source, 'NodeList<ListItem<NamespaceUseClause>>');
        $clauses = $clauses !== null ? $clauses : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $clauses->getWidth();
        $semicolon = Node::fromJSON($json['namespace_use_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $kind, $clauses, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'kind' => $this->_kind, 'clauses' => $this->_clauses, 'semicolon' => $this->_semicolon]);
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
        $kind = $this->_kind === null ? null : $rewriter($this->_kind, $parents);
        $clauses = $rewriter($this->_clauses, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $kind === $this->_kind && $clauses === $this->_clauses && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $kind, $clauses, $semicolon);
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
        return new static($value, $this->_kind, $this->_clauses, $this->_semicolon);
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
    public function getKindUNTYPED()
    {
        return $this->_kind;
    }
    /**
     * @return static
     */
    public function withKind(?Token $value)
    {
        if ($value === $this->_kind) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_clauses, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKind()
    {
        return $this->_kind !== null;
    }
    /**
     * @return null | ConstToken | FunctionToken | NamespaceToken | TypeToken
     */
    /**
     * @return null|Token
     */
    public function getKind()
    {
        return $this->_kind;
    }
    /**
     * @return ConstToken | FunctionToken | NamespaceToken | TypeToken
     */
    /**
     * @return Token
     */
    public function getKindx()
    {
        return TypeAssert\not_null($this->getKind());
    }
    /**
     * @return null|Node
     */
    public function getClausesUNTYPED()
    {
        return $this->_clauses;
    }
    /**
     * @param NodeList<ListItem<NamespaceUseClause>> $value
     *
     * @return static
     */
    public function withClauses(NodeList $value)
    {
        if ($value === $this->_clauses) {
            return $this;
        }
        return new static($this->_keyword, $this->_kind, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasClauses()
    {
        return $this->_clauses !== null;
    }
    /**
     * @return NodeList<ListItem<NamespaceUseClause>>
     */
    /**
     * @return NodeList<ListItem<NamespaceUseClause>>
     */
    public function getClauses()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_clauses);
    }
    /**
     * @return NodeList<ListItem<NamespaceUseClause>>
     */
    /**
     * @return NodeList<ListItem<NamespaceUseClause>>
     */
    public function getClausesx()
    {
        return $this->getClauses();
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
        return new static($this->_keyword, $this->_kind, $this->_clauses, $value);
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

