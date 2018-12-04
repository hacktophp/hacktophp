<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<63617ef9d43f9124cd21ff8efb0bdc81>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class WhereConstraint extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_type;
  /**
   * @var EditableNode
   */
  private $_operator;
  /**
   * @var EditableNode
   */
  private $_right_type;

  public function __construct(
    EditableNode $left_type,
    EditableNode $operator,
    EditableNode $right_type
  ) {
    parent::__construct('where_constraint');
    $this->_left_type = $left_type;
    $this->_operator = $operator;
    $this->_right_type = $right_type;
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
    $left_type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['where_constraint_left_type'],
      $file,
      $offset,
      $source
    );
    $offset += $left_type->getWidth();
    $operator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['where_constraint_operator'],
      $file,
      $offset,
      $source
    );
    $offset += $operator->getWidth();
    $right_type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['where_constraint_right_type'],
      $file,
      $offset,
      $source
    );
    $offset += $right_type->getWidth();
    return new static($left_type, $operator, $right_type);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_type' => $this->_left_type,
      'operator' => $this->_operator,
      'right_type' => $this->_right_type,
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
    $left_type = $this->_left_type->rewrite($rewriter, $parents);
    $operator = $this->_operator->rewrite($rewriter, $parents);
    $right_type = $this->_right_type->rewrite($rewriter, $parents);
    if (
      $left_type === $this->_left_type &&
      $operator === $this->_operator &&
      $right_type === $this->_right_type
    ) {
      return $this;
    }
    return new static($left_type, $operator, $right_type);
  }

  public function getLeftTypeUNTYPED(): EditableNode {
    return $this->_left_type;
  }

  /**
   * @return static
   */
  public function withLeftType(EditableNode $value) {
    if ($value === $this->_left_type) {
      return $this;
    }
    return new static($value, $this->_operator, $this->_right_type);
  }

  public function hasLeftType(): bool {
    return !$this->_left_type->isMissing();
  }

  /**
   * @return GenericTypeSpecifier | SimpleTypeSpecifier | TypeConstant
   */
  public function getLeftType(): EditableNode {
    \assert($this->_left_type instanceof EditableNode);
    return $this->_left_type;
  }

  /**
   * @return GenericTypeSpecifier | SimpleTypeSpecifier | TypeConstant
   */
  public function getLeftTypex(): EditableNode {
    return $this->getLeftType();
  }

  public function getOperatorUNTYPED(): EditableNode {
    return $this->_operator;
  }

  /**
   * @return static
   */
  public function withOperator(EditableNode $value) {
    if ($value === $this->_operator) {
      return $this;
    }
    return new static($this->_left_type, $value, $this->_right_type);
  }

  public function hasOperator(): bool {
    return !$this->_operator->isMissing();
  }

  /**
   * @return EqualToken | AsToken | SuperToken
   */
  public function getOperator(): EditableToken {
    \assert($this->_operator instanceof EditableToken);
    return $this->_operator;
  }

  /**
   * @return EqualToken | AsToken | SuperToken
   */
  public function getOperatorx(): EditableToken {
    return $this->getOperator();
  }

  public function getRightTypeUNTYPED(): EditableNode {
    return $this->_right_type;
  }

  /**
   * @return static
   */
  public function withRightType(EditableNode $value) {
    if ($value === $this->_right_type) {
      return $this;
    }
    return new static($this->_left_type, $this->_operator, $value);
  }

  public function hasRightType(): bool {
    return !$this->_right_type->isMissing();
  }

  /**
   * @return GenericTypeSpecifier | NullableTypeSpecifier |
   * SimpleTypeSpecifier | TypeConstant | VectorTypeSpecifier
   */
  public function getRightType(): EditableNode {
    \assert($this->_right_type instanceof EditableNode);
    return $this->_right_type;
  }

  /**
   * @return GenericTypeSpecifier | NullableTypeSpecifier |
   * SimpleTypeSpecifier | TypeConstant | VectorTypeSpecifier
   */
  public function getRightTypex(): EditableNode {
    return $this->getRightType();
  }
}
