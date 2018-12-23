<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<acfab585dccae805c4d30c8f92d2adff>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class NamespaceGroupUseDeclaration extends EditableNode implements INamespaceUseDeclaration
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_kind;
    /**
     * @var EditableNode
     */
    private $_prefix;
    /**
     * @var EditableNode
     */
    private $_left_brace;
    /**
     * @var EditableNode
     */
    private $_clauses;
    /**
     * @var EditableNode
     */
    private $_right_brace;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $kind, EditableNode $prefix, EditableNode $left_brace, EditableNode $clauses, EditableNode $right_brace, EditableNode $semicolon)
    {
        parent::__construct('namespace_group_use_declaration');
        $this->_keyword = $keyword;
        $this->_kind = $kind;
        $this->_prefix = $prefix;
        $this->_left_brace = $left_brace;
        $this->_clauses = $clauses;
        $this->_right_brace = $right_brace;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['namespace_group_use_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $kind = EditableNode::fromJSON($json['namespace_group_use_kind'], $file, $offset, $source);
        $offset += $kind->getWidth();
        $prefix = EditableNode::fromJSON($json['namespace_group_use_prefix'], $file, $offset, $source);
        $offset += $prefix->getWidth();
        $left_brace = EditableNode::fromJSON($json['namespace_group_use_left_brace'], $file, $offset, $source);
        $offset += $left_brace->getWidth();
        $clauses = EditableNode::fromJSON($json['namespace_group_use_clauses'], $file, $offset, $source);
        $offset += $clauses->getWidth();
        $right_brace = EditableNode::fromJSON($json['namespace_group_use_right_brace'], $file, $offset, $source);
        $offset += $right_brace->getWidth();
        $semicolon = EditableNode::fromJSON($json['namespace_group_use_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $kind, $prefix, $left_brace, $clauses, $right_brace, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'kind' => $this->_kind, 'prefix' => $this->_prefix, 'left_brace' => $this->_left_brace, 'clauses' => $this->_clauses, 'right_brace' => $this->_right_brace, 'semicolon' => $this->_semicolon);
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? array() : (array) $parents;
        $parents[] = $this;
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $kind = $this->_kind->rewrite($rewriter, $parents);
        $prefix = $this->_prefix->rewrite($rewriter, $parents);
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $clauses = $this->_clauses->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $kind === $this->_kind && $prefix === $this->_prefix && $left_brace === $this->_left_brace && $clauses === $this->_clauses && $right_brace === $this->_right_brace && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $kind, $prefix, $left_brace, $clauses, $right_brace, $semicolon);
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
        return new static($value, $this->_kind, $this->_prefix, $this->_left_brace, $this->_clauses, $this->_right_brace, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
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
     * @return EditableNode
     */
    public function getKindUNTYPED()
    {
        return $this->_kind;
    }
    /**
     * @return static
     */
    public function withKind(EditableNode $value)
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
        return !$this->_kind->isMissing();
    }
    /**
     * @return null | ConstToken | FunctionToken | NamespaceToken | TypeToken
     */
    /**
     * @return null|EditableToken
     */
    public function getKind()
    {
        if ($this->_kind->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableToken::class, $this->_kind);
    }
    /**
     * @return ConstToken | FunctionToken | NamespaceToken | TypeToken
     */
    /**
     * @return EditableToken
     */
    public function getKindx()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_kind);
    }
    /**
     * @return EditableNode
     */
    public function getPrefixUNTYPED()
    {
        return $this->_prefix;
    }
    /**
     * @return static
     */
    public function withPrefix(EditableNode $value)
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
        return !$this->_prefix->isMissing();
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
     * @return EditableNode
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(EditableNode $value)
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
        return !$this->_left_brace->isMissing();
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
     * @return EditableNode
     */
    public function getClausesUNTYPED()
    {
        return $this->_clauses;
    }
    /**
     * @return static
     */
    public function withClauses(EditableNode $value)
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
        return !$this->_clauses->isMissing();
    }
    /**
     * @return EditableList<NamespaceUseClause>
     */
    /**
     * @return EditableList<NamespaceUseClause>
     */
    public function getClauses()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_clauses);
    }
    /**
     * @return EditableList<NamespaceUseClause>
     */
    /**
     * @return EditableList<NamespaceUseClause>
     */
    public function getClausesx()
    {
        return $this->getClauses();
    }
    /**
     * @return EditableNode
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(EditableNode $value)
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
        return !$this->_right_brace->isMissing();
    }
    /**
     * @return null | RightBraceToken
     */
    /**
     * @return null|RightBraceToken
     */
    public function getRightBrace()
    {
        if ($this->_right_brace->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
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
        return new static($this->_keyword, $this->_kind, $this->_prefix, $this->_left_brace, $this->_clauses, $this->_right_brace, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
    }
    /**
     * @return null | SemicolonToken
     */
    /**
     * @return null|SemicolonToken
     */
    public function getSemicolon()
    {
        if ($this->_semicolon->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
}

