<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<788e028220e7bc547187924bad033165>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class AttributeSpecification extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_double_angle;
  /**
   * @var EditableNode
   */
  private $_attributes;
  /**
   * @var EditableNode
   */
  private $_right_double_angle;

  public function __construct(
    EditableNode $left_double_angle,
    EditableNode $attributes,
    EditableNode $right_double_angle
  ) {
    parent::__construct('attribute_specification');
    $this->_left_double_angle = $left_double_angle;
    $this->_attributes = $attributes;
    $this->_right_double_angle = $right_double_angle;
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
    $left_double_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['attribute_specification_left_double_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $left_double_angle->getWidth();
    $attributes = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['attribute_specification_attributes'],
      $file,
      $offset,
      $source
    );
    $offset += $attributes->getWidth();
    $right_double_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['attribute_specification_right_double_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $right_double_angle->getWidth();
    return new static($left_double_angle, $attributes, $right_double_angle);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_double_angle' => $this->_left_double_angle,
      'attributes' => $this->_attributes,
      'right_double_angle' => $this->_right_double_angle,
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
    $left_double_angle =
      $this->_left_double_angle->rewrite($rewriter, $parents);
    $attributes = $this->_attributes->rewrite($rewriter, $parents);
    $right_double_angle =
      $this->_right_double_angle->rewrite($rewriter, $parents);
    if (
      $left_double_angle === $this->_left_double_angle &&
      $attributes === $this->_attributes &&
      $right_double_angle === $this->_right_double_angle
    ) {
      return $this;
    }
    return new static($left_double_angle, $attributes, $right_double_angle);
  }

  public function getLeftDoubleAngleUNTYPED(): EditableNode {
    return $this->_left_double_angle;
  }

  /**
   * @return static
   */
  public function withLeftDoubleAngle(EditableNode $value) {
    if ($value === $this->_left_double_angle) {
      return $this;
    }
    return new static($value, $this->_attributes, $this->_right_double_angle);
  }

  public function hasLeftDoubleAngle(): bool {
    return !$this->_left_double_angle->isMissing();
  }

  /**
   * @return LessThanLessThanToken
   */
  public function getLeftDoubleAngle(): LessThanLessThanToken {
    \assert($this->_left_double_angle instanceof LessThanLessThanToken);
    return $this->_left_double_angle;
  }

  /**
   * @return LessThanLessThanToken
   */
  public function getLeftDoubleAnglex(): LessThanLessThanToken {
    return $this->getLeftDoubleAngle();
  }

  public function getAttributesUNTYPED(): EditableNode {
    return $this->_attributes;
  }

  /**
   * @return static
   */
  public function withAttributes(EditableNode $value) {
    if ($value === $this->_attributes) {
      return $this;
    }
    return
      new static($this->_left_double_angle, $value, $this->_right_double_angle);
  }

  public function hasAttributes(): bool {
    return !$this->_attributes->isMissing();
  }

  /**
   * @return EditableList<ConstructorCall>
   */
  public function getAttributes(): EditableList {
    \assert($this->_attributes instanceof EditableList);
    return $this->_attributes;
  }

  /**
   * @return EditableList<ConstructorCall>
   */
  public function getAttributesx(): EditableList {
    return $this->getAttributes();
  }

  public function getRightDoubleAngleUNTYPED(): EditableNode {
    return $this->_right_double_angle;
  }

  /**
   * @return static
   */
  public function withRightDoubleAngle(EditableNode $value) {
    if ($value === $this->_right_double_angle) {
      return $this;
    }
    return new static($this->_left_double_angle, $this->_attributes, $value);
  }

  public function hasRightDoubleAngle(): bool {
    return !$this->_right_double_angle->isMissing();
  }

  /**
   * @return GreaterThanGreaterThanToken
   */
  public function getRightDoubleAngle(): GreaterThanGreaterThanToken {
    \assert($this->_right_double_angle instanceof GreaterThanGreaterThanToken);
    return $this->_right_double_angle;
  }

  /**
   * @return GreaterThanGreaterThanToken
   */
  public function getRightDoubleAnglex(): GreaterThanGreaterThanToken {
    return $this->getRightDoubleAngle();
  }
}
