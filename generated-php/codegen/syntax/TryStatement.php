<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1f1bd9b81b0d372c9919b802ceeee5c1>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class TryStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_compound_statement;
    /**
     * @var EditableNode
     */
    private $_catch_clauses;
    /**
     * @var EditableNode
     */
    private $_finally_clause;
    public function __construct(EditableNode $keyword, EditableNode $compound_statement, EditableNode $catch_clauses, EditableNode $finally_clause)
    {
        parent::__construct('try_statement');
        $this->_keyword = $keyword;
        $this->_compound_statement = $compound_statement;
        $this->_catch_clauses = $catch_clauses;
        $this->_finally_clause = $finally_clause;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['try_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $compound_statement = EditableNode::fromJSON($json['try_compound_statement'], $file, $offset, $source);
        $offset += $compound_statement->getWidth();
        $catch_clauses = EditableNode::fromJSON($json['try_catch_clauses'], $file, $offset, $source);
        $offset += $catch_clauses->getWidth();
        $finally_clause = EditableNode::fromJSON($json['try_finally_clause'], $file, $offset, $source);
        $offset += $finally_clause->getWidth();
        return new static($keyword, $compound_statement, $catch_clauses, $finally_clause);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'compound_statement' => $this->_compound_statement, 'catch_clauses' => $this->_catch_clauses, 'finally_clause' => $this->_finally_clause);
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
        $compound_statement = $this->_compound_statement->rewrite($rewriter, $parents);
        $catch_clauses = $this->_catch_clauses->rewrite($rewriter, $parents);
        $finally_clause = $this->_finally_clause->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $compound_statement === $this->_compound_statement && $catch_clauses === $this->_catch_clauses && $finally_clause === $this->_finally_clause) {
            return $this;
        }
        return new static($keyword, $compound_statement, $catch_clauses, $finally_clause);
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
        return new static($value, $this->_compound_statement, $this->_catch_clauses, $this->_finally_clause);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return TryToken
     */
    /**
     * @return TryToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(TryToken::class, $this->_keyword);
    }
    /**
     * @return TryToken
     */
    /**
     * @return TryToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getCompoundStatementUNTYPED()
    {
        return $this->_compound_statement;
    }
    /**
     * @return static
     */
    public function withCompoundStatement(EditableNode $value)
    {
        if ($value === $this->_compound_statement) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_catch_clauses, $this->_finally_clause);
    }
    /**
     * @return bool
     */
    public function hasCompoundStatement()
    {
        return !$this->_compound_statement->isMissing();
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getCompoundStatement()
    {
        return TypeAssert\instance_of(CompoundStatement::class, $this->_compound_statement);
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getCompoundStatementx()
    {
        return $this->getCompoundStatement();
    }
    /**
     * @return EditableNode
     */
    public function getCatchClausesUNTYPED()
    {
        return $this->_catch_clauses;
    }
    /**
     * @return static
     */
    public function withCatchClauses(EditableNode $value)
    {
        if ($value === $this->_catch_clauses) {
            return $this;
        }
        return new static($this->_keyword, $this->_compound_statement, $value, $this->_finally_clause);
    }
    /**
     * @return bool
     */
    public function hasCatchClauses()
    {
        return !$this->_catch_clauses->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getCatchClauses()
    {
        if ($this->_catch_clauses->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_catch_clauses);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getCatchClausesx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_catch_clauses);
    }
    /**
     * @return EditableNode
     */
    public function getFinallyClauseUNTYPED()
    {
        return $this->_finally_clause;
    }
    /**
     * @return static
     */
    public function withFinallyClause(EditableNode $value)
    {
        if ($value === $this->_finally_clause) {
            return $this;
        }
        return new static($this->_keyword, $this->_compound_statement, $this->_catch_clauses, $value);
    }
    /**
     * @return bool
     */
    public function hasFinallyClause()
    {
        return !$this->_finally_clause->isMissing();
    }
    /**
     * @return FinallyClause | null
     */
    /**
     * @return null|FinallyClause
     */
    public function getFinallyClause()
    {
        if ($this->_finally_clause->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(FinallyClause::class, $this->_finally_clause);
    }
    /**
     * @return FinallyClause
     */
    /**
     * @return FinallyClause
     */
    public function getFinallyClausex()
    {
        return TypeAssert\instance_of(FinallyClause::class, $this->_finally_clause);
    }
}

