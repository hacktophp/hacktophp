<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0fc1b5764771ab8971c5c529c9066112>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class XHPClose extends EditableNode {

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
  private $_right_angle;

  public function __construct(
    EditableNode $left_angle,
    EditableNode $name,
    EditableNode $right_angle
  ) {
    parent::__construct('xhp_close');
    $this->_left_angle = $left_angle;
    $this->_name = $name;
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
      /* UNSAFE_EXPR */ $json['xhp_close_left_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $left_angle->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_close_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $right_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_close_right_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $right_angle->getWidth();
    return new static($left_angle, $name, $right_angle);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_angle' => $this->_left_angle,
      'name' => $this->_name,
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
    $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
    if (
      $left_angle === $this->_left_angle &&
      $name === $this->_name &&
      $right_angle === $this->_right_angle
    ) {
      return $this;
    }
    return new static($left_angle, $name, $right_angle);
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
    return new static($value, $this->_name, $this->_right_angle);
  }

  public function hasLeftAngle(): bool {
    return !$this->_left_angle->isMissing();
  }

  /**
   * @return LessThanToken | LessThanSlashToken | EndOfFileToken
   */
  public function getLeftAngle(): EditableToken {
    \assert($this->_left_angle instanceof EditableToken);
    return $this->_left_angle;
  }

  /**
   * @return LessThanToken | LessThanSlashToken | EndOfFileToken
   */
  public function getLeftAnglex(): EditableToken {
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
    return new static($this->_left_angle, $value, $this->_right_angle);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return null | XHPElementNameToken
   */
  public function getName(): ?XHPElementNameToken {
    if ($this->_name->isMissing()) {
      return null;
    }
    \assert($this->_name instanceof XHPElementNameToken);
    return $this->_name;
  }

  /**
   * @return XHPElementNameToken
   */
  public function getNamex(): XHPElementNameToken {
    \assert($this->_name instanceof XHPElementNameToken);
    return $this->_name;
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
    return new static($this->_left_angle, $this->_name, $value);
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
