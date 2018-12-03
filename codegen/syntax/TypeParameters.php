<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0d48297f6224a80d50a461959e0ecbe5>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class TypeParameters extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_angle;
  /**
   * @var EditableNode
   */
  private $_parameters;
  /**
   * @var EditableNode
   */
  private $_right_angle;

  public function __construct(
    EditableNode $left_angle,
    EditableNode $parameters,
    EditableNode $right_angle
  ) {
    parent::__construct('type_parameters');
    $this->_left_angle = $left_angle;
    $this->_parameters = $parameters;
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
      /* UNSAFE_EXPR */ $json['type_parameters_left_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $left_angle->getWidth();
    $parameters = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_parameters_parameters'],
      $file,
      $offset,
      $source
    );
    $offset += $parameters->getWidth();
    $right_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_parameters_right_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $right_angle->getWidth();
    return new static($left_angle, $parameters, $right_angle);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_angle' => $this->_left_angle,
      'parameters' => $this->_parameters,
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
    $parameters = $this->_parameters->rewrite($rewriter, $parents);
    $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
    if (
      $left_angle === $this->_left_angle &&
      $parameters === $this->_parameters &&
      $right_angle === $this->_right_angle
    ) {
      return $this;
    }
    return new static($left_angle, $parameters, $right_angle);
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
    return new static($value, $this->_parameters, $this->_right_angle);
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

  public function getParametersUNTYPED(): EditableNode {
    return $this->_parameters;
  }

  /**
   * @return static
   */
  public function withParameters(EditableNode $value) {
    if ($value === $this->_parameters) {
      return $this;
    }
    return new static($this->_left_angle, $value, $this->_right_angle);
  }

  public function hasParameters(): bool {
    return !$this->_parameters->isMissing();
  }

  /**
   * @return EditableList<TypeParameter>
   */
  public function getParameters(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_parameters);
  }

  /**
   * @return EditableList<TypeParameter>
   */
  public function getParametersx(): EditableList {
    return $this->getParameters();
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
    return new static($this->_left_angle, $this->_parameters, $value);
  }

  public function hasRightAngle(): bool {
    return !$this->_right_angle->isMissing();
  }

  /**
   * @returns GreaterThanToken
   */
  public function getRightAngle(): GreaterThanToken {
    return TypeAssert\instance_of(GreaterThanToken::class, $this->_right_angle);
  }

  /**
   * @returns GreaterThanToken
   */
  public function getRightAnglex(): GreaterThanToken {
    return $this->getRightAngle();
  }
}
