<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<31ac9fb78f456234d592a59cf0694755>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class TupleTypeExplicitSpecifier extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
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
    EditableNode $keyword,
    EditableNode $left_angle,
    EditableNode $types,
    EditableNode $right_angle
  ) {
    parent::__construct('tuple_type_explicit_specifier');
    $this->_keyword = $keyword;
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
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['tuple_type_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $left_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['tuple_type_left_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $left_angle->getWidth();
    $types = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['tuple_type_types'],
      $file,
      $offset,
      $source
    );
    $offset += $types->getWidth();
    $right_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['tuple_type_right_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $right_angle->getWidth();
    return new static($keyword, $left_angle, $types, $right_angle);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
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
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $left_angle = $this->_left_angle->rewrite($rewriter, $parents);
    $types = $this->_types->rewrite($rewriter, $parents);
    $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $left_angle === $this->_left_angle &&
      $types === $this->_types &&
      $right_angle === $this->_right_angle
    ) {
      return $this;
    }
    return new static($keyword, $left_angle, $types, $right_angle);
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
      $this->_left_angle,
      $this->_types,
      $this->_right_angle
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getKeyword(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_keyword);
  }

  /**
   * @returns unknown
   */
  public function getKeywordx(): EditableNode {
    return $this->getKeyword();
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
    return
      new static($this->_keyword, $value, $this->_types, $this->_right_angle);
  }

  public function hasLeftAngle(): bool {
    return !$this->_left_angle->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getLeftAngle(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_left_angle);
  }

  /**
   * @returns unknown
   */
  public function getLeftAnglex(): EditableNode {
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
    return new static(
      $this->_keyword,
      $this->_left_angle,
      $value,
      $this->_right_angle
    );
  }

  public function hasTypes(): bool {
    return !$this->_types->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getTypes(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_types);
  }

  /**
   * @returns unknown
   */
  public function getTypesx(): EditableNode {
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
    return
      new static($this->_keyword, $this->_left_angle, $this->_types, $value);
  }

  public function hasRightAngle(): bool {
    return !$this->_right_angle->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getRightAngle(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_right_angle);
  }

  /**
   * @returns unknown
   */
  public function getRightAnglex(): EditableNode {
    return $this->getRightAngle();
  }
}
