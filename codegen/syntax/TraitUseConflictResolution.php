<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f995a5961ac2ae282bd0b3c80c0164ef>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class TraitUseConflictResolution extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_names;
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

  public function __construct(
    EditableNode $keyword,
    EditableNode $names,
    EditableNode $left_brace,
    EditableNode $clauses,
    EditableNode $right_brace
  ) {
    parent::__construct('trait_use_conflict_resolution');
    $this->_keyword = $keyword;
    $this->_names = $names;
    $this->_left_brace = $left_brace;
    $this->_clauses = $clauses;
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
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_conflict_resolution_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $names = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_conflict_resolution_names'],
      $file,
      $offset,
      $source
    );
    $offset += $names->getWidth();
    $left_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_conflict_resolution_left_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $left_brace->getWidth();
    $clauses = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_conflict_resolution_clauses'],
      $file,
      $offset,
      $source
    );
    $offset += $clauses->getWidth();
    $right_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_conflict_resolution_right_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $right_brace->getWidth();
    return new static($keyword, $names, $left_brace, $clauses, $right_brace);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'names' => $this->_names,
      'left_brace' => $this->_left_brace,
      'clauses' => $this->_clauses,
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
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $names = $this->_names->rewrite($rewriter, $parents);
    $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
    $clauses = $this->_clauses->rewrite($rewriter, $parents);
    $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $names === $this->_names &&
      $left_brace === $this->_left_brace &&
      $clauses === $this->_clauses &&
      $right_brace === $this->_right_brace
    ) {
      return $this;
    }
    return new static($keyword, $names, $left_brace, $clauses, $right_brace);
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
      $this->_names,
      $this->_left_brace,
      $this->_clauses,
      $this->_right_brace
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return UseToken
   */
  public function getKeyword(): UseToken {
    \assert($this->_keyword instanceof UseToken);
    return $this->_keyword;
  }

  /**
   * @return UseToken
   */
  public function getKeywordx(): UseToken {
    return $this->getKeyword();
  }

  public function getNamesUNTYPED(): EditableNode {
    return $this->_names;
  }

  /**
   * @return static
   */
  public function withNames(EditableNode $value) {
    if ($value === $this->_names) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $value,
      $this->_left_brace,
      $this->_clauses,
      $this->_right_brace
    );
  }

  public function hasNames(): bool {
    return !$this->_names->isMissing();
  }

  /**
   * @return EditableList<SimpleTypeSpecifier>
   */
  public function getNames(): EditableList {
    \assert($this->_names instanceof EditableList);
    return $this->_names;
  }

  /**
   * @return EditableList<SimpleTypeSpecifier>
   */
  public function getNamesx(): EditableList {
    return $this->getNames();
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
    return new static(
      $this->_keyword,
      $this->_names,
      $value,
      $this->_clauses,
      $this->_right_brace
    );
  }

  public function hasLeftBrace(): bool {
    return !$this->_left_brace->isMissing();
  }

  /**
   * @return LeftBraceToken
   */
  public function getLeftBrace(): LeftBraceToken {
    \assert($this->_left_brace instanceof LeftBraceToken);
    return $this->_left_brace;
  }

  /**
   * @return LeftBraceToken
   */
  public function getLeftBracex(): LeftBraceToken {
    return $this->getLeftBrace();
  }

  public function getClausesUNTYPED(): EditableNode {
    return $this->_clauses;
  }

  /**
   * @return static
   */
  public function withClauses(EditableNode $value) {
    if ($value === $this->_clauses) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_names,
      $this->_left_brace,
      $value,
      $this->_right_brace
    );
  }

  public function hasClauses(): bool {
    return !$this->_clauses->isMissing();
  }

  /**
   * @return EditableList<TraitUseAliasItem> | EditableList<EditableNode> |
   * EditableList<TraitUsePrecedenceItem> | null
   */
  public function getClauses(): ?EditableList {
    if ($this->_clauses->isMissing()) {
      return null;
    }
    \assert($this->_clauses instanceof EditableList);
    return $this->_clauses;
  }

  /**
   * @return EditableList<TraitUseAliasItem> | EditableList<EditableNode> |
   * EditableList<TraitUsePrecedenceItem>
   */
  public function getClausesx(): EditableList {
    \assert($this->_clauses instanceof EditableList);
    return $this->_clauses;
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
    return new static(
      $this->_keyword,
      $this->_names,
      $this->_left_brace,
      $this->_clauses,
      $value
    );
  }

  public function hasRightBrace(): bool {
    return !$this->_right_brace->isMissing();
  }

  /**
   * @return RightBraceToken
   */
  public function getRightBrace(): RightBraceToken {
    \assert($this->_right_brace instanceof RightBraceToken);
    return $this->_right_brace;
  }

  /**
   * @return RightBraceToken
   */
  public function getRightBracex(): RightBraceToken {
    return $this->getRightBrace();
  }
}
