<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<7e46cdbe17ecc6c425606c7c58c3e3a3>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class TypeArguments extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_angle;
  /**
   * @var EditableNode
   */
  private $_types;
  /**
   * @var EditableNode
   */
  private $_right_angle;

  public function __construct(
    EditableNode $left_angle,
    EditableNode $types,
    EditableNode $right_angle
  ) {
    parent::__construct('type_arguments');
    $this->_left_angle = $left_angle;
    $this->_types = $types;
    $this->_right_angle = $right_angle;
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
    $left_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_arguments_left_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $left_angle->getWidth();
    $types = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_arguments_types'],
      $file,
      $offset,
      $source
    );
    $offset += $types->getWidth();
    $right_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_arguments_right_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $right_angle->getWidth();
    return new static($left_angle, $types, $right_angle);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_angle' => $this->_left_angle,
      'types' => $this->_types,
      'right_angle' => $this->_right_angle,
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
    $left_angle = $this->_left_angle->rewrite($rewriter, $parents);
    $types = $this->_types->rewrite($rewriter, $parents);
    $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
    if (
      $left_angle === $this->_left_angle &&
      $types === $this->_types &&
      $right_angle === $this->_right_angle
    ) {
      return $this;
    }
    return new static($left_angle, $types, $right_angle);
  }

  public function getLeftAngleUNTYPED(): EditableNode {
    return $this->_left_angle;
  }

  /**
   * @return static
   */
  public function withLeftAngle(EditableNode $value) {
    if ($value === $this->_left_angle) {
      return $this;
    }
    return new static($value, $this->_types, $this->_right_angle);
  }

  public function hasLeftAngle(): bool {
    return !$this->_left_angle->isMissing();
  }

  /**
   * @return LessThanToken
   */
  public function getLeftAngle(): LessThanToken {
    \assert($this->_left_angle instanceof LessThanToken);
    return $this->_left_angle;
  }

  /**
   * @return LessThanToken
   */
  public function getLeftAnglex(): LessThanToken {
    return $this->getLeftAngle();
  }

  public function getTypesUNTYPED(): EditableNode {
    return $this->_types;
  }

  /**
   * @return static
   */
  public function withTypes(EditableNode $value) {
    if ($value === $this->_types) {
      return $this;
    }
    return new static($this->_left_angle, $value, $this->_right_angle);
  }

  public function hasTypes(): bool {
    return !$this->_types->isMissing();
  }

  /**
   * @return EditableList<ClassnameTypeSpecifier> |
   * EditableList<ClosureTypeSpecifier> | EditableList<DictionaryTypeSpecifier>
   * | EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
   * EditableList<MapArrayTypeSpecifier> | EditableList<NullableTypeSpecifier>
   * | EditableList<ReifiedTypeArgument> | EditableList<ShapeTypeSpecifier> |
   * EditableList<SimpleTypeSpecifier> | EditableList<TupleTypeSpecifier> |
   * EditableList<TypeConstant> | EditableList<VectorArrayTypeSpecifier>
   */
  public function getTypes(): EditableList {
    \assert($this->_types instanceof EditableList);
    return $this->_types;
  }

  /**
   * @return EditableList<ClassnameTypeSpecifier> |
   * EditableList<ClosureTypeSpecifier> | EditableList<DictionaryTypeSpecifier>
   * | EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
   * EditableList<MapArrayTypeSpecifier> | EditableList<NullableTypeSpecifier>
   * | EditableList<ReifiedTypeArgument> | EditableList<ShapeTypeSpecifier> |
   * EditableList<SimpleTypeSpecifier> | EditableList<TupleTypeSpecifier> |
   * EditableList<TypeConstant> | EditableList<VectorArrayTypeSpecifier>
   */
  public function getTypesx(): EditableList {
    return $this->getTypes();
  }

  public function getRightAngleUNTYPED(): EditableNode {
    return $this->_right_angle;
  }

  /**
   * @return static
   */
  public function withRightAngle(EditableNode $value) {
    if ($value === $this->_right_angle) {
      return $this;
    }
    return new static($this->_left_angle, $this->_types, $value);
  }

  public function hasRightAngle(): bool {
    return !$this->_right_angle->isMissing();
  }

  /**
   * @return null | GreaterThanToken
   */
  public function getRightAngle(): ?GreaterThanToken {
    if ($this->_right_angle->isMissing()) {
      return null;
    }
    \assert($this->_right_angle instanceof GreaterThanToken);
    return $this->_right_angle;
  }

  /**
   * @return GreaterThanToken
   */
  public function getRightAnglex(): GreaterThanToken {
    \assert($this->_right_angle instanceof GreaterThanToken);
    return $this->_right_angle;
  }
}
