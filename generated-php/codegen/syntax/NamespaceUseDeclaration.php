<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5d3855770652604757e323702066bde4>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class NamespaceUseDeclaration extends EditableNode implements INamespaceUseDeclaration
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
    private $_clauses;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $kind, EditableNode $clauses, EditableNode $semicolon)
    {
        parent::__construct('namespace_use_declaration');
        $this->_keyword = $keyword;
        $this->_kind = $kind;
        $this->_clauses = $clauses;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['namespace_use_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $kind = EditableNode::fromJSON($json['namespace_use_kind'], $file, $offset, $source);
        $offset += $kind->getWidth();
        $clauses = EditableNode::fromJSON($json['namespace_use_clauses'], $file, $offset, $source);
        $offset += $clauses->getWidth();
        $semicolon = EditableNode::fromJSON($json['namespace_use_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $kind, $clauses, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'kind' => $this->_kind, 'clauses' => $this->_clauses, 'semicolon' => $this->_semicolon);
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
        $clauses = $this->_clauses->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $kind === $this->_kind && $clauses === $this->_clauses && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $kind, $clauses, $semicolon);
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
        return new static($value, $this->_kind, $this->_clauses, $this->_semicolon);
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
        return new static($this->_keyword, $value, $this->_clauses, $this->_semicolon);
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
        return new static($this->_keyword, $this->_kind, $value, $this->_semicolon);
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
        return new static($this->_keyword, $this->_kind, $this->_clauses, $value);
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

