<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<68e176bb40c360cf188a6e3e84cc62dd>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class TryStatement extends EditableNode {

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

  public function __construct(
    EditableNode $keyword,
    EditableNode $compound_statement,
    EditableNode $catch_clauses,
    EditableNode $finally_clause
  ) {
    parent::__construct('try_statement');
    $this->_keyword = $keyword;
    $this->_compound_statement = $compound_statement;
    $this->_catch_clauses = $catch_clauses;
    $this->_finally_clause = $finally_clause;
  }

  /**
   * @param array<string, mixed> $json
   * @return static
   */
  public static function fromJSON(
    array $json,
    string $file,
    int $offset,
    string $source
  ) {
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['try_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $compound_statement = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['try_compound_statement'],
      $file,
      $offset,
      $source
    );
    $offset += $compound_statement->getWidth();
    $catch_clauses = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['try_catch_clauses'],
      $file,
      $offset,
      $source
    );
    $offset += $catch_clauses->getWidth();
    $finally_clause = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['try_finally_clause'],
      $file,
      $offset,
      $source
    );
    $offset += $finally_clause->getWidth();
    return new static(
      $keyword,
      $compound_statement,
      $catch_clauses,
      $finally_clause
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'compound_statement' => $this->_compound_statement,
      'catch_clauses' => $this->_catch_clauses,
      'finally_clause' => $this->_finally_clause,
    ];
  }

  /**
   * @psalm-param (\Closure(EditableNode, ?array<int, EditableNode>): EditableNode) $rewriter
   * @param ?array<int, EditableNode> $parents
   * @return static
   */
  public function rewriteDescendants(
    \Closure $rewriter,
    ?array $parents = null
  ) {
    $parents = $parents === null ? [] : vec($parents);
    $parents[] = $this;
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $compound_statement =
      $this->_compound_statement->rewrite($rewriter, $parents);
    $catch_clauses = $this->_catch_clauses->rewrite($rewriter, $parents);
    $finally_clause = $this->_finally_clause->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $compound_statement === $this->_compound_statement &&
      $catch_clauses === $this->_catch_clauses &&
      $finally_clause === $this->_finally_clause
    ) {
      return $this;
    }
    return new static(
      $keyword,
      $compound_statement,
      $catch_clauses,
      $finally_clause
    );
  }

  public function getKeywordUNTYPED(): EditableNode {
    return $this->_keyword;
  }

  /**
   * @return static
   */
  public function withKeyword(EditableNode $value) {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new static(
      $value,
      $this->_compound_statement,
      $this->_catch_clauses,
      $this->_finally_clause
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns TryToken
   */
  public function getKeyword(): TryToken {
    return TypeAssert\instance_of(TryToken::class, $this->_keyword);
  }

  /**
   * @returns TryToken
   */
  public function getKeywordx(): TryToken {
    return $this->getKeyword();
  }

  public function getCompoundStatementUNTYPED(): EditableNode {
    return $this->_compound_statement;
  }

  /**
   * @return static
   */
  public function withCompoundStatement(EditableNode $value) {
    if ($value === $this->_compound_statement) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $value,
      $this->_catch_clauses,
      $this->_finally_clause
    );
  }

  public function hasCompoundStatement(): bool {
    return !$this->_compound_statement->isMissing();
  }

  /**
   * @returns CompoundStatement
   */
  public function getCompoundStatement(): CompoundStatement {
    return TypeAssert\instance_of(
      CompoundStatement::class,
      $this->_compound_statement
    );
  }

  /**
   * @returns CompoundStatement
   */
  public function getCompoundStatementx(): CompoundStatement {
    return $this->getCompoundStatement();
  }

  public function getCatchClausesUNTYPED(): EditableNode {
    return $this->_catch_clauses;
  }

  /**
   * @return static
   */
  public function withCatchClauses(EditableNode $value) {
    if ($value === $this->_catch_clauses) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_compound_statement,
      $value,
      $this->_finally_clause
    );
  }

  public function hasCatchClauses(): bool {
    return !$this->_catch_clauses->isMissing();
  }

  /**
   * @return EditableList<EditableNode> | null
   */
  public function getCatchClauses(): ?EditableList {
    if ($this->_catch_clauses->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableList::class, $this->_catch_clauses);
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getCatchClausesx(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_catch_clauses);
  }

  public function getFinallyClauseUNTYPED(): EditableNode {
    return $this->_finally_clause;
  }

  /**
   * @return static
   */
  public function withFinallyClause(EditableNode $value) {
    if ($value === $this->_finally_clause) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_compound_statement,
      $this->_catch_clauses,
      $value
    );
  }

  public function hasFinallyClause(): bool {
    return !$this->_finally_clause->isMissing();
  }

  /**
   * @returns FinallyClause | Missing
   */
  public function getFinallyClause(): ?FinallyClause {
    if ($this->_finally_clause->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(FinallyClause::class, $this->_finally_clause);
  }

  /**
   * @returns FinallyClause
   */
  public function getFinallyClausex(): FinallyClause {
    return TypeAssert\instance_of(FinallyClause::class, $this->_finally_clause);
  }
}
