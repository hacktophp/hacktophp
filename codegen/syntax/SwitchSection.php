<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<89bd5a559e6e1c4817a1290654246f86>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class SwitchSection extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_labels;
  /**
   * @var EditableNode
   */
  private $_statements;
  /**
   * @var EditableNode
   */
  private $_fallthrough;

  public function __construct(
    EditableNode $labels,
    EditableNode $statements,
    EditableNode $fallthrough
  ) {
    parent::__construct('switch_section');
    $this->_labels = $labels;
    $this->_statements = $statements;
    $this->_fallthrough = $fallthrough;
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
    $labels = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['switch_section_labels'],
      $file,
      $offset,
      $source
    );
    $offset += $labels->getWidth();
    $statements = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['switch_section_statements'],
      $file,
      $offset,
      $source
    );
    $offset += $statements->getWidth();
    $fallthrough = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['switch_section_fallthrough'],
      $file,
      $offset,
      $source
    );
    $offset += $fallthrough->getWidth();
    return new static($labels, $statements, $fallthrough);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'labels' => $this->_labels,
      'statements' => $this->_statements,
      'fallthrough' => $this->_fallthrough,
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
    $labels = $this->_labels->rewrite($rewriter, $parents);
    $statements = $this->_statements->rewrite($rewriter, $parents);
    $fallthrough = $this->_fallthrough->rewrite($rewriter, $parents);
    if (
      $labels === $this->_labels &&
      $statements === $this->_statements &&
      $fallthrough === $this->_fallthrough
    ) {
      return $this;
    }
    return new static($labels, $statements, $fallthrough);
  }

  public function getLabelsUNTYPED(): EditableNode {
    return $this->_labels;
  }

  /**
   * @return static
   */
  public function withLabels(EditableNode $value) {
    if ($value === $this->_labels) {
      return $this;
    }
    return new static($value, $this->_statements, $this->_fallthrough);
  }

  public function hasLabels(): bool {
    return !$this->_labels->isMissing();
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getLabels(): EditableList {
    \assert($this->_labels instanceof EditableList);
    return $this->_labels;
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getLabelsx(): EditableList {
    return $this->getLabels();
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
    return new static($this->_labels, $value, $this->_fallthrough);
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
    \assert($this->_statements instanceof EditableList);
    return $this->_statements;
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getStatementsx(): EditableList {
    \assert($this->_statements instanceof EditableList);
    return $this->_statements;
  }

  public function getFallthroughUNTYPED(): EditableNode {
    return $this->_fallthrough;
  }

  /**
   * @return static
   */
  public function withFallthrough(EditableNode $value) {
    if ($value === $this->_fallthrough) {
      return $this;
    }
    return new static($this->_labels, $this->_statements, $value);
  }

  public function hasFallthrough(): bool {
    return !$this->_fallthrough->isMissing();
  }

  /**
   * @return null | SwitchFallthrough
   */
  public function getFallthrough(): ?SwitchFallthrough {
    if ($this->_fallthrough->isMissing()) {
      return null;
    }
    \assert($this->_fallthrough instanceof SwitchFallthrough);
    return $this->_fallthrough;
  }

  /**
   * @return SwitchFallthrough
   */
  public function getFallthroughx(): SwitchFallthrough {
    \assert($this->_fallthrough instanceof SwitchFallthrough);
    return $this->_fallthrough;
  }
}
