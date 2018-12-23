<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<43aff8c12ee3eaf77324c4f77b29fddd>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class WhereClause extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_constraints;

  public function __construct(
    EditableNode $keyword,
    EditableNode $constraints
  ) {
    parent::__construct('where_clause');
    $this->_keyword = $keyword;
    $this->_constraints = $constraints;
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
      /* UNSAFE_EXPR */ $json['where_clause_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $constraints = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['where_clause_constraints'],
      $file,
      $offset,
      $source
    );
    $offset += $constraints->getWidth();
    return new static($keyword, $constraints);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'constraints' => $this->_constraints,
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
    $constraints = $this->_constraints->rewrite($rewriter, $parents);
    if ($keyword === $this->_keyword && $constraints === $this->_constraints) {
      return $this;
    }
    return new static($keyword, $constraints);
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
    return new static($value, $this->_constraints);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return WhereToken
   */
  public function getKeyword(): WhereToken {
    \assert($this->_keyword instanceof WhereToken);
    return $this->_keyword;
  }

  /**
   * @return WhereToken
   */
  public function getKeywordx(): WhereToken {
    return $this->getKeyword();
  }

  public function getConstraintsUNTYPED(): EditableNode {
    return $this->_constraints;
  }

  /**
   * @return static
   */
  public function withConstraints(EditableNode $value) {
    if ($value === $this->_constraints) {
      return $this;
    }
    return new static($this->_keyword, $value);
  }

  public function hasConstraints(): bool {
    return !$this->_constraints->isMissing();
  }

  /**
   * @return EditableList<WhereConstraint>
   */
  public function getConstraints(): EditableList {
    \assert($this->_constraints instanceof EditableList);
    return $this->_constraints;
  }

  /**
   * @return EditableList<WhereConstraint>
   */
  public function getConstraintsx(): EditableList {
    return $this->getConstraints();
  }
}
