<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9e8b13a41d02b94eae0eab6a59a4996f>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class XHPOpen extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_angle;
  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_attributes;
  /**
   * @var EditableNode
   */
  private $_right_angle;

  public function __construct(
    EditableNode $left_angle,
    EditableNode $name,
    EditableNode $attributes,
    EditableNode $right_angle
  ) {
    parent::__construct('xhp_open');
    $this->_left_angle = $left_angle;
    $this->_name = $name;
    $this->_attributes = $attributes;
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
      /* UNSAFE_EXPR */ $json['xhp_open_left_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $left_angle->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_open_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $attributes = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_open_attributes'],
      $file,
      $offset,
      $source
    );
    $offset += $attributes->getWidth();
    $right_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_open_right_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $right_angle->getWidth();
    return new static($left_angle, $name, $attributes, $right_angle);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_angle' => $this->_left_angle,
      'name' => $this->_name,
      'attributes' => $this->_attributes,
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
    $name = $this->_name->rewrite($rewriter, $parents);
    $attributes = $this->_attributes->rewrite($rewriter, $parents);
    $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
    if (
      $left_angle === $this->_left_angle &&
      $name === $this->_name &&
      $attributes === $this->_attributes &&
      $right_angle === $this->_right_angle
    ) {
      return $this;
    }
    return new static($left_angle, $name, $attributes, $right_angle);
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
      new static($value, $this->_name, $this->_attributes, $this->_right_angle);
  }

  public function hasLeftAngle(): bool {
    return !$this->_left_angle->isMissing();
  }

  /**
   * @returns LessThanToken
   */
  public function getLeftAngle(): LessThanToken {
    return TypeAssert\instance_of(LessThanToken::class, $this->_left_angle);
  }

  /**
   * @returns LessThanToken
   */
  public function getLeftAnglex(): LessThanToken {
    return $this->getLeftAngle();
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
      $this->_left_angle,
      $value,
      $this->_attributes,
      $this->_right_angle
    );
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @returns XHPElementNameToken
   */
  public function getName(): XHPElementNameToken {
    return TypeAssert\instance_of(XHPElementNameToken::class, $this->_name);
  }

  /**
   * @returns XHPElementNameToken
   */
  public function getNamex(): XHPElementNameToken {
    return $this->getName();
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
      new static($this->_left_angle, $this->_name, $value, $this->_right_angle);
  }

  public function hasAttributes(): bool {
    return !$this->_attributes->isMissing();
  }

  /**
   * @return EditableList<EditableNode> | null
   */
  public function getAttributes(): ?EditableList {
    if ($this->_attributes->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableList::class, $this->_attributes);
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getAttributesx(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_attributes);
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
      new static($this->_left_angle, $this->_name, $this->_attributes, $value);
  }

  public function hasRightAngle(): bool {
    return !$this->_right_angle->isMissing();
  }

  /**
   * @returns Missing | SlashGreaterThanToken | GreaterThanToken
   */
  public function getRightAngle(): ?EditableToken {
    if ($this->_right_angle->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableToken::class, $this->_right_angle);
  }

  /**
   * @returns SlashGreaterThanToken | GreaterThanToken
   */
  public function getRightAnglex(): EditableToken {
    return TypeAssert\instance_of(EditableToken::class, $this->_right_angle);
  }
}
