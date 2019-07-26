<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<bbc5c99bba5f3075a5dd03c77a792ec4>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class NamespaceGroupUseDeclaration extends Node implements INamespaceUseDeclaration
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'namespace_group_use_declaration';
    /**
     * @var UseToken
     */
    private $_keyword;
    /**
     * @var null|Token
     */
    private $_kind;
    /**
     * @var QualifiedName
     */
    private $_prefix;
    /**
     * @var LeftBraceToken
     */
    private $_left_brace;
    /**
     * @var NodeList<ListItem<NamespaceUseClause>>
     */
    private $_clauses;
    /**
     * @var RightBraceToken
     */
    private $_right_brace;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    /**
     * @param NodeList<ListItem<NamespaceUseClause>> $clauses
     */
    public function __construct(UseToken $keyword, ?Token $kind, QualifiedName $prefix, LeftBraceToken $left_brace, NodeList $clauses, RightBraceToken $right_brace, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_kind = $kind;
        $this->_prefix = $prefix;
        $this->_left_brace = $left_brace;
        $this->_clauses = $clauses;
        $this->_right_brace = $right_brace;
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
        $keyword = Node::fromJSON($json['namespace_group_use_keyword'], $file, $offset, $source, 'UseToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $kind = Node::fromJSON($json['namespace_group_use_kind'], $file, $offset, $source, 'Token');
        $offset += (($__tmp1__ = $kind) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $prefix = Node::fromJSON($json['namespace_group_use_prefix'], $file, $offset, $source, 'QualifiedName');
        $prefix = $prefix !== null ? $prefix : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $prefix->getWidth();
        $left_brace = Node::fromJSON($json['namespace_group_use_left_brace'], $file, $offset, $source, 'LeftBraceToken');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $clauses = Node::fromJSON($json['namespace_group_use_clauses'], $file, $offset, $source, 'NodeList<ListItem<NamespaceUseClause>>');
        $clauses = $clauses !== null ? $clauses : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $clauses->getWidth();
        $right_brace = Node::fromJSON($json['namespace_group_use_right_brace'], $file, $offset, $source, 'RightBraceToken');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $semicolon = Node::fromJSON($json['namespace_group_use_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $kind, $prefix, $left_brace, $clauses, $right_brace, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'kind' => $this->_kind, 'prefix' => $this->_prefix, 'left_brace' => $this->_left_brace, 'clauses' => $this->_clauses, 'right_brace' => $this->_right_brace, 'semicolon' => $this->_semicolon]);
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
        $prefix = $rewriter($this->_prefix, $parents);
        $left_brace = $rewriter($this->_left_brace, $parents);
        $clauses = $rewriter($this->_clauses, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $kind === $this->_kind && $prefix === $this->_prefix && $left_brace === $this->_left_brace && $clauses === $this->_clauses && $right_brace === $this->_right_brace && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $kind, $prefix, $left_brace, $clauses, $right_brace, $semicolon);
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
        return new static($value, $this->_kind, $this->_prefix, $this->_left_brace, $this->_clauses, $this->_right_brace, $this->_semicolon);
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
        return new static($this->_keyword, $value, $this->_prefix, $this->_left_brace, $this->_clauses, $this->_right_brace, $this->_semicolon);
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
    public function getPrefixUNTYPED()
    {
        return $this->_prefix;
    }
    /**
     * @return static
     */
    public function withPrefix(QualifiedName $value)
    {
        if ($value === $this->_prefix) {
            return $this;
        }
        return new static($this->_keyword, $this->_kind, $value, $this->_left_brace, $this->_clauses, $this->_right_brace, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasPrefix()
    {
        return $this->_prefix !== null;
    }
    /**
     * @return QualifiedName
     */
    /**
     * @return QualifiedName
     */
    public function getPrefix()
    {
        return TypeAssert\instance_of(QualifiedName::class, $this->_prefix);
    }
    /**
     * @return QualifiedName
     */
    /**
     * @return QualifiedName
     */
    public function getPrefixx()
    {
        return $this->getPrefix();
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
        return new static($this->_keyword, $this->_kind, $this->_prefix, $value, $this->_clauses, $this->_right_brace, $this->_semicolon);
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
     * @param NodeList<ListItem<NamespaceUseClause>> $value
     *
     * @return static
     */
    public function withClauses(NodeList $value)
    {
        if ($value === $this->_clauses) {
            return $this;
        }
        return new static($this->_keyword, $this->_kind, $this->_prefix, $this->_left_brace, $value, $this->_right_brace, $this->_semicolon);
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
        return new static($this->_keyword, $this->_kind, $this->_prefix, $this->_left_brace, $this->_clauses, $value, $this->_semicolon);
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
        return new static($this->_keyword, $this->_kind, $this->_prefix, $this->_left_brace, $this->_clauses, $this->_right_brace, $value);
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

