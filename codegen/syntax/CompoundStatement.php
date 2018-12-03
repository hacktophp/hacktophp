<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4caceb0289c9b4de2b2b2eff836686ee>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class CompoundStatement extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_brace;
  /**
   * @var EditableNode
   */
  private $_statements;
  /**
   * @var EditableNode
   */
  private $_right_brace;

  public function __construct(
    EditableNode $left_brace,
    EditableNode $statements,
    EditableNode $right_brace
  ) {
    parent::__construct('compound_statement');
    $this->_left_brace = $left_brace;
    $this->_statements = $statements;
    $this->_right_brace = $right_brace;
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
    $left_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['compound_left_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $left_brace->getWidth();
    $statements = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['compound_statements'],
      $file,
      $offset,
      $source
    );
    $offset += $statements->getWidth();
    $right_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['compound_right_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $right_brace->getWidth();
    return new static($left_brace, $statements, $right_brace);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_brace' => $this->_left_brace,
      'statements' => $this->_statements,
      'right_brace' => $this->_right_brace,
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
    $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
    $statements = $this->_statements->rewrite($rewriter, $parents);
    $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
    if (
      $left_brace === $this->_left_brace &&
      $statements === $this->_statements &&
      $right_brace === $this->_right_brace
    ) {
      return $this;
    }
    return new static($left_brace, $statements, $right_brace);
  }

  public function getLeftBraceUNTYPED(): EditableNode {
    return $this->_left_brace;
  }

  /**
   * @return static
   */
  public function withLeftBrace(EditableNode $value) {
    if ($value === $this->_left_brace) {
      return $this;
    }
    return new static($value, $this->_statements, $this->_right_brace);
  }

  public function hasLeftBrace(): bool {
    return !$this->_left_brace->isMissing();
  }

  /**
   * @returns Missing | LeftBraceToken
   */
  public function getLeftBrace(): ?LeftBraceToken {
    if ($this->_left_brace->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
  }

  /**
   * @returns LeftBraceToken
   */
  public function getLeftBracex(): LeftBraceToken {
    return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
  }

  public function getStatementsUNTYPED(): EditableNode {
    return $this->_statements;
  }

  /**
   * @return static
   */
  public function withStatements(EditableNode $value) {
    if ($value === $this->_statements) {
      return $this;
    }
    return new static($this->_left_brace, $value, $this->_right_brace);
  }

  public function hasStatements(): bool {
    return !$this->_statements->isMissing();
  }

  /**
   * @return EditableList<EditableNode> | null
   */
  public function getStatements(): ?EditableList {
    if ($this->_statements->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableList::class, $this->_statements);
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getStatementsx(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_statements);
  }

  public function getRightBraceUNTYPED(): EditableNode {
    return $this->_right_brace;
  }

  /**
   * @return static
   */
  public function withRightBrace(EditableNode $value) {
    if ($value === $this->_right_brace) {
      return $this;
    }
    return new static($this->_left_brace, $this->_statements, $value);
  }

  public function hasRightBrace(): bool {
    return !$this->_right_brace->isMissing();
  }

  /**
   * @returns Missing | RightBraceToken
   */
  public function getRightBrace(): ?RightBraceToken {
    if ($this->_right_brace->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
  }

  /**
   * @returns RightBraceToken
   */
  public function getRightBracex(): RightBraceToken {
    return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
  }
}
