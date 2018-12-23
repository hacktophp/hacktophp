<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<323322927a58fd400bce0ddfd7fb01ca>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class TypeParameter extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_reified;
  /**
   * @var EditableNode
   */
  private $_variance;
  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_constraints;

  public function __construct(
    EditableNode $reified,
    EditableNode $variance,
    EditableNode $name,
    EditableNode $constraints
  ) {
    parent::__construct('type_parameter');
    $this->_reified = $reified;
    $this->_variance = $variance;
    $this->_name = $name;
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
    $reified = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_reified'],
      $file,
      $offset,
      $source
    );
    $offset += $reified->getWidth();
    $variance = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_variance'],
      $file,
      $offset,
      $source
    );
    $offset += $variance->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $constraints = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_constraints'],
      $file,
      $offset,
      $source
    );
    $offset += $constraints->getWidth();
    return new static($reified, $variance, $name, $constraints);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'reified' => $this->_reified,
      'variance' => $this->_variance,
      'name' => $this->_name,
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
    $reified = $this->_reified->rewrite($rewriter, $parents);
    $variance = $this->_variance->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    $constraints = $this->_constraints->rewrite($rewriter, $parents);
    if (
      $reified === $this->_reified &&
      $variance === $this->_variance &&
      $name === $this->_name &&
      $constraints === $this->_constraints
    ) {
      return $this;
    }
    return new static($reified, $variance, $name, $constraints);
  }

  public function getReifiedUNTYPED(): EditableNode {
    return $this->_reified;
  }

  /**
   * @return static
   */
  public function withReified(EditableNode $value) {
    if ($value === $this->_reified) {
      return $this;
    }
    return
      new static($value, $this->_variance, $this->_name, $this->_constraints);
  }

  public function hasReified(): bool {
    return !$this->_reified->isMissing();
  }

  /**
   * @return null | ReifiedToken
   */
  public function getReified(): ?ReifiedToken {
    if ($this->_reified->isMissing()) {
      return null;
    }
    \assert($this->_reified instanceof ReifiedToken);
    return $this->_reified;
  }

  /**
   * @return ReifiedToken
   */
  public function getReifiedx(): ReifiedToken {
    \assert($this->_reified instanceof ReifiedToken);
    return $this->_reified;
  }

  public function getVarianceUNTYPED(): EditableNode {
    return $this->_variance;
  }

  /**
   * @return static
   */
  public function withVariance(EditableNode $value) {
    if ($value === $this->_variance) {
      return $this;
    }
    return
      new static($this->_reified, $value, $this->_name, $this->_constraints);
  }

  public function hasVariance(): bool {
    return !$this->_variance->isMissing();
  }

  /**
   * @return null | PlusToken | MinusToken
   */
  public function getVariance(): ?EditableToken {
    if ($this->_variance->isMissing()) {
      return null;
    }
    \assert($this->_variance instanceof EditableToken);
    return $this->_variance;
  }

  /**
   * @return PlusToken | MinusToken
   */
  public function getVariancex(): EditableToken {
    \assert($this->_variance instanceof EditableToken);
    return $this->_variance;
  }

  public function getNameUNTYPED(): EditableNode {
    return $this->_name;
  }

  /**
   * @return static
   */
  public function withName(EditableNode $value) {
    if ($value === $this->_name) {
      return $this;
    }
    return new static(
      $this->_reified,
      $this->_variance,
      $value,
      $this->_constraints
    );
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return NameToken
   */
  public function getName(): NameToken {
    \assert($this->_name instanceof NameToken);
    return $this->_name;
  }

  /**
   * @return NameToken
   */
  public function getNamex(): NameToken {
    return $this->getName();
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
    return new static($this->_reified, $this->_variance, $this->_name, $value);
  }

  public function hasConstraints(): bool {
    return !$this->_constraints->isMissing();
  }

  /**
   * @return EditableList<EditableNode> | null
   */
  public function getConstraints(): ?EditableList {
    if ($this->_constraints->isMissing()) {
      return null;
    }
    \assert($this->_constraints instanceof EditableList);
    return $this->_constraints;
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getConstraintsx(): EditableList {
    \assert($this->_constraints instanceof EditableList);
    return $this->_constraints;
  }
}
