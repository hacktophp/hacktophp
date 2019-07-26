<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4167f15b7586454763d7938e6c005742>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TryStatement extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'try_statement';
    /**
     * @var TryToken
     */
    private $_keyword;
    /**
     * @var CompoundStatement
     */
    private $_compound_statement;
    /**
     * @var NodeList<CatchClause>|null
     */
    private $_catch_clauses;
    /**
     * @var null|FinallyClause
     */
    private $_finally_clause;
    /**
     * @param NodeList<CatchClause>|null $catch_clauses
     */
    public function __construct(TryToken $keyword, CompoundStatement $compound_statement, ?NodeList $catch_clauses, ?FinallyClause $finally_clause, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_compound_statement = $compound_statement;
        $this->_catch_clauses = $catch_clauses;
        $this->_finally_clause = $finally_clause;
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
        $keyword = Node::fromJSON($json['try_keyword'], $file, $offset, $source, 'TryToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $compound_statement = Node::fromJSON($json['try_compound_statement'], $file, $offset, $source, 'CompoundStatement');
        $compound_statement = $compound_statement !== null ? $compound_statement : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $compound_statement->getWidth();
        $catch_clauses = Node::fromJSON($json['try_catch_clauses'], $file, $offset, $source, 'NodeList<CatchClause>');
        $offset += (($__tmp1__ = $catch_clauses) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $finally_clause = Node::fromJSON($json['try_finally_clause'], $file, $offset, $source, 'FinallyClause');
        $offset += (($__tmp2__ = $finally_clause) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $compound_statement, $catch_clauses, $finally_clause, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'compound_statement' => $this->_compound_statement, 'catch_clauses' => $this->_catch_clauses, 'finally_clause' => $this->_finally_clause]);
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
        $compound_statement = $rewriter($this->_compound_statement, $parents);
        $catch_clauses = $this->_catch_clauses === null ? null : $rewriter($this->_catch_clauses, $parents);
        $finally_clause = $this->_finally_clause === null ? null : $rewriter($this->_finally_clause, $parents);
        if ($keyword === $this->_keyword && $compound_statement === $this->_compound_statement && $catch_clauses === $this->_catch_clauses && $finally_clause === $this->_finally_clause) {
            return $this;
        }
        return new static($keyword, $compound_statement, $catch_clauses, $finally_clause);
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
    public function withKeyword(TryToken $value)
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
        return $this->_keyword !== null;
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
     * @return null|Node
     */
    public function getCompoundStatementUNTYPED()
    {
        return $this->_compound_statement;
    }
    /**
     * @return static
     */
    public function withCompoundStatement(CompoundStatement $value)
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
        return $this->_compound_statement !== null;
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
     * @return null|Node
     */
    public function getCatchClausesUNTYPED()
    {
        return $this->_catch_clauses;
    }
    /**
     * @param NodeList<CatchClause>|null $value
     *
     * @return static
     */
    public function withCatchClauses(?NodeList $value)
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
        return $this->_catch_clauses !== null;
    }
    /**
     * @return NodeList<CatchClause> | null
     */
    /**
     * @return NodeList<CatchClause>|null
     */
    public function getCatchClauses()
    {
        return $this->_catch_clauses;
    }
    /**
     * @return NodeList<CatchClause>
     */
    /**
     * @return NodeList<CatchClause>
     */
    public function getCatchClausesx()
    {
        return TypeAssert\not_null($this->getCatchClauses());
    }
    /**
     * @return null|Node
     */
    public function getFinallyClauseUNTYPED()
    {
        return $this->_finally_clause;
    }
    /**
     * @return static
     */
    public function withFinallyClause(?FinallyClause $value)
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
        return $this->_finally_clause !== null;
    }
    /**
     * @return FinallyClause | null
     */
    /**
     * @return null|FinallyClause
     */
    public function getFinallyClause()
    {
        return $this->_finally_clause;
    }
    /**
     * @return FinallyClause
     */
    /**
     * @return FinallyClause
     */
    public function getFinallyClausex()
    {
        return TypeAssert\not_null($this->getFinallyClause());
    }
}

