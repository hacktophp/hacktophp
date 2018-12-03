<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4d6e2db00b0b43187a1e2d66fd84ef7e>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class TypeConstant extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_type;
  /**
   * @var EditableNode
   */
  private $_separator;
  /**
   * @var EditableNode
   */
  private $_right_type;

  public function __construct(
    EditableNode $left_type,
    EditableNode $separator,
    EditableNode $right_type
  ) {
    parent::__construct('type_constant');
    $this->_left_type = $left_type;
    $this->_separator = $separator;
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
      /* UNSAFE_EXPR */ $json['type_constant_left_type'],
      $file,
      $offset,
      $source
    );
    $offset += $left_type->getWidth();
    $separator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_constant_separator'],
      $file,
      $offset,
      $source
    );
    $offset += $separator->getWidth();
    $right_type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_constant_right_type'],
      $file,
      $offset,
      $source
    );
    $offset += $right_type->getWidth();
    return new static($left_type, $separator, $right_type);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_type' => $this->_left_type,
      'separator' => $this->_separator,
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
    $separator = $this->_separator->rewrite($rewriter, $parents);
    $right_type = $this->_right_type->rewrite($rewriter, $parents);
    if (
      $left_type === $this->_left_type &&
      $separator === $this->_separator &&
      $right_type === $this->_right_type
    ) {
      return $this;
    }
    return new static($left_type, $separator, $right_type);
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
    return new static($value, $this->_separator, $this->_right_type);
  }

  public function hasLeftType(): bool {
    return !$this->_left_type->isMissing();
  }

  /**
   * @return NameToken | ParentToken | SelfToken | ThisToken | TypeConstant
   */
  public function getLeftType(): EditableNode {
    \assert($this->_left_type instanceof EditableNode);
    return $this->_left_type;
  }

  /**
   * @return NameToken | ParentToken | SelfToken | ThisToken | TypeConstant
   */
  public function getLeftTypex(): EditableNode {
    return $this->getLeftType();
  }

  public function getSeparatorUNTYPED(): EditableNode {
    return $this->_separator;
  }

  /**
   * @return static
   */
  public function withSeparator(EditableNode $value) {
    if ($value === $this->_separator) {
      return $this;
    }
    return new static($this->_left_type, $value, $this->_right_type);
  }

  public function hasSeparator(): bool {
    return !$this->_separator->isMissing();
  }

  /**
   * @return ColonColonToken
   */
  public function getSeparator(): ColonColonToken {
    \assert($this->_separator instanceof ColonColonToken);
    return $this->_separator;
  }

  /**
   * @return ColonColonToken
   */
  public function getSeparatorx(): ColonColonToken {
    return $this->getSeparator();
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
    return new static($this->_left_type, $this->_separator, $value);
  }

  public function hasRightType(): bool {
    return !$this->_right_type->isMissing();
  }

  /**
   * @return NameToken
   */
  public function getRightType(): NameToken {
    \assert($this->_right_type instanceof NameToken);
    return $this->_right_type;
  }

  /**
   * @return NameToken
   */
  public function getRightTypex(): NameToken {
    return $this->getRightType();
  }
}
