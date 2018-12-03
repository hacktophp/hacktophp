<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9d48ab305ddb66e80ec83afd2fdfe80c>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class IfStatement extends EditableNode implements IControlFlowStatement {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_left_paren;
  /**
   * @var EditableNode
   */
  private $_condition;
  /**
   * @var EditableNode
   */
  private $_right_paren;
  /**
   * @var EditableNode
   */
  private $_statement;
  /**
   * @var EditableNode
   */
  private $_elseif_clauses;
  /**
   * @var EditableNode
   */
  private $_else_clause;

  public function __construct(
    EditableNode $keyword,
    EditableNode $left_paren,
    EditableNode $condition,
    EditableNode $right_paren,
    EditableNode $statement,
    EditableNode $elseif_clauses,
    EditableNode $else_clause
  ) {
    parent::__construct('if_statement');
    $this->_keyword = $keyword;
    $this->_left_paren = $left_paren;
    $this->_condition = $condition;
    $this->_right_paren = $right_paren;
    $this->_statement = $statement;
    $this->_elseif_clauses = $elseif_clauses;
    $this->_else_clause = $else_clause;
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
      /* UNSAFE_EXPR */ $json['if_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['if_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $condition = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['if_condition'],
      $file,
      $offset,
      $source
    );
    $offset += $condition->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['if_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    $statement = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['if_statement'],
      $file,
      $offset,
      $source
    );
    $offset += $statement->getWidth();
    $elseif_clauses = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['if_elseif_clauses'],
      $file,
      $offset,
      $source
    );
    $offset += $elseif_clauses->getWidth();
    $else_clause = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['if_else_clause'],
      $file,
      $offset,
      $source
    );
    $offset += $else_clause->getWidth();
    return new static(
      $keyword,
      $left_paren,
      $condition,
      $right_paren,
      $statement,
      $elseif_clauses,
      $else_clause
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'left_paren' => $this->_left_paren,
      'condition' => $this->_condition,
      'right_paren' => $this->_right_paren,
      'statement' => $this->_statement,
      'elseif_clauses' => $this->_elseif_clauses,
      'else_clause' => $this->_else_clause,
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
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $condition = $this->_condition->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    $statement = $this->_statement->rewrite($rewriter, $parents);
    $elseif_clauses = $this->_elseif_clauses->rewrite($rewriter, $parents);
    $else_clause = $this->_else_clause->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $left_paren === $this->_left_paren &&
      $condition === $this->_condition &&
      $right_paren === $this->_right_paren &&
      $statement === $this->_statement &&
      $elseif_clauses === $this->_elseif_clauses &&
      $else_clause === $this->_else_clause
    ) {
      return $this;
    }
    return new static(
      $keyword,
      $left_paren,
      $condition,
      $right_paren,
      $statement,
      $elseif_clauses,
      $else_clause
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
      $this->_left_paren,
      $this->_condition,
      $this->_right_paren,
      $this->_statement,
      $this->_elseif_clauses,
      $this->_else_clause
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns IfToken
   */
  public function getKeyword(): IfToken {
    return TypeAssert\instance_of(IfToken::class, $this->_keyword);
  }

  /**
   * @returns IfToken
   */
  public function getKeywordx(): IfToken {
    return $this->getKeyword();
  }

  public function getLeftParenUNTYPED(): EditableNode {
    return $this->_left_paren;
  }

  /**
   * @return static
   */
  public function withLeftParen(EditableNode $value) {
    if ($value === $this->_left_paren) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $value,
      $this->_condition,
      $this->_right_paren,
      $this->_statement,
      $this->_elseif_clauses,
      $this->_else_clause
    );
  }

  public function hasLeftParen(): bool {
    return !$this->_left_paren->isMissing();
  }

  /**
   * @returns LeftParenToken
   */
  public function getLeftParen(): LeftParenToken {
    return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
  }

  /**
   * @returns LeftParenToken
   */
  public function getLeftParenx(): LeftParenToken {
    return $this->getLeftParen();
  }

  public function getConditionUNTYPED(): EditableNode {
    return $this->_condition;
  }

  /**
   * @return static
   */
  public function withCondition(EditableNode $value) {
    if ($value === $this->_condition) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $value,
      $this->_right_paren,
      $this->_statement,
      $this->_elseif_clauses,
      $this->_else_clause
    );
  }

  public function hasCondition(): bool {
    return !$this->_condition->isMissing();
  }

  /**
   * @returns ArrayIntrinsicExpression | AsExpression | BinaryExpression |
   * CastExpression | EmptyExpression | FunctionCallExpression |
   * InstanceofExpression | IsExpression | IssetExpression | LiteralExpression
   * | MemberSelectionExpression | ParenthesizedExpression |
   * PrefixUnaryExpression | QualifiedName | ScopeResolutionExpression |
   * SubscriptExpression | NameToken | VariableExpression
   */
  public function getCondition(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_condition);
  }

  /**
   * @returns ArrayIntrinsicExpression | AsExpression | BinaryExpression |
   * CastExpression | EmptyExpression | FunctionCallExpression |
   * InstanceofExpression | IsExpression | IssetExpression | LiteralExpression
   * | MemberSelectionExpression | ParenthesizedExpression |
   * PrefixUnaryExpression | QualifiedName | ScopeResolutionExpression |
   * SubscriptExpression | NameToken | VariableExpression
   */
  public function getConditionx(): EditableNode {
    return $this->getCondition();
  }

  public function getRightParenUNTYPED(): EditableNode {
    return $this->_right_paren;
  }

  /**
   * @return static
   */
  public function withRightParen(EditableNode $value) {
    if ($value === $this->_right_paren) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_condition,
      $value,
      $this->_statement,
      $this->_elseif_clauses,
      $this->_else_clause
    );
  }

  public function hasRightParen(): bool {
    return !$this->_right_paren->isMissing();
  }

  /**
   * @returns RightParenToken
   */
  public function getRightParen(): RightParenToken {
    return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
  }

  /**
   * @returns RightParenToken
   */
  public function getRightParenx(): RightParenToken {
    return $this->getRightParen();
  }

  public function getStatementUNTYPED(): EditableNode {
    return $this->_statement;
  }

  /**
   * @return static
   */
  public function withStatement(EditableNode $value) {
    if ($value === $this->_statement) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_condition,
      $this->_right_paren,
      $value,
      $this->_elseif_clauses,
      $this->_else_clause
    );
  }

  public function hasStatement(): bool {
    return !$this->_statement->isMissing();
  }

  /**
   * @returns BreakStatement | CompoundStatement | ContinueStatement |
   * EchoStatement | ExpressionStatement | GlobalStatement | GotoStatement |
   * ReturnStatement | ThrowStatement | UnsetStatement
   */
  public function getStatement(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_statement);
  }

  /**
   * @returns BreakStatement | CompoundStatement | ContinueStatement |
   * EchoStatement | ExpressionStatement | GlobalStatement | GotoStatement |
   * ReturnStatement | ThrowStatement | UnsetStatement
   */
  public function getStatementx(): EditableNode {
    return $this->getStatement();
  }

  public function getElseifClausesUNTYPED(): EditableNode {
    return $this->_elseif_clauses;
  }

  /**
   * @return static
   */
  public function withElseifClauses(EditableNode $value) {
    if ($value === $this->_elseif_clauses) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_condition,
      $this->_right_paren,
      $this->_statement,
      $value,
      $this->_else_clause
    );
  }

  public function hasElseifClauses(): bool {
    return !$this->_elseif_clauses->isMissing();
  }

  /**
   * @return EditableList<EditableNode> | null
   */
  public function getElseifClauses(): ?EditableList {
    if ($this->_elseif_clauses->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableList::class, $this->_elseif_clauses);
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getElseifClausesx(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_elseif_clauses);
  }

  public function getElseClauseUNTYPED(): EditableNode {
    return $this->_else_clause;
  }

  /**
   * @return static
   */
  public function withElseClause(EditableNode $value) {
    if ($value === $this->_else_clause) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_condition,
      $this->_right_paren,
      $this->_statement,
      $this->_elseif_clauses,
      $value
    );
  }

  public function hasElseClause(): bool {
    return !$this->_else_clause->isMissing();
  }

  /**
   * @returns ElseClause | Missing
   */
  public function getElseClause(): ?ElseClause {
    if ($this->_else_clause->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(ElseClause::class, $this->_else_clause);
  }

  /**
   * @returns ElseClause
   */
  public function getElseClausex(): ElseClause {
    return TypeAssert\instance_of(ElseClause::class, $this->_else_clause);
  }
}
