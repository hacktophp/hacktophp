<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<663a8f5003fbcd265ea7c15dee242988>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class FieldInitializer extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_arrow;
  /**
   * @var EditableNode
   */
  private $_value;

  public function __construct(
    EditableNode $name,
    EditableNode $arrow,
    EditableNode $value
  ) {
    parent::__construct('field_initializer');
    $this->_name = $name;
    $this->_arrow = $arrow;
    $this->_value = $value;
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
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['field_initializer_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $arrow = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['field_initializer_arrow'],
      $file,
      $offset,
      $source
    );
    $offset += $arrow->getWidth();
    $value = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['field_initializer_value'],
      $file,
      $offset,
      $source
    );
    $offset += $value->getWidth();
    return new static($name, $arrow, $value);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'name' => $this->_name,
      'arrow' => $this->_arrow,
      'value' => $this->_value,
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
    $name = $this->_name->rewrite($rewriter, $parents);
    $arrow = $this->_arrow->rewrite($rewriter, $parents);
    $value = $this->_value->rewrite($rewriter, $parents);
    if (
      $name === $this->_name &&
      $arrow === $this->_arrow &&
      $value === $this->_value
    ) {
      return $this;
    }
    return new static($name, $arrow, $value);
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
    return new static($value, $this->_arrow, $this->_value);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return LiteralExpression | ScopeResolutionExpression | QuestionToken |
   * VariableExpression
   */
  public function getName(): EditableNode {
    \assert($this->_name instanceof EditableNode);
    return $this->_name;
  }

  /**
   * @return LiteralExpression | ScopeResolutionExpression | QuestionToken |
   * VariableExpression
   */
  public function getNamex(): EditableNode {
    return $this->getName();
  }

  public function getArrowUNTYPED(): EditableNode {
    return $this->_arrow;
  }

  /**
   * @return static
   */
  public function withArrow(EditableNode $value) {
    if ($value === $this->_arrow) {
      return $this;
    }
    return new static($this->_name, $value, $this->_value);
  }

  public function hasArrow(): bool {
    return !$this->_arrow->isMissing();
  }

  /**
   * @return EqualGreaterThanToken
   */
  public function getArrow(): EqualGreaterThanToken {
    \assert($this->_arrow instanceof EqualGreaterThanToken);
    return $this->_arrow;
  }

  /**
   * @return EqualGreaterThanToken
   */
  public function getArrowx(): EqualGreaterThanToken {
    return $this->getArrow();
  }

  public function getValueUNTYPED(): EditableNode {
    return $this->_value;
  }

  /**
   * @return static
   */
  public function withValue(EditableNode $value) {
    if ($value === $this->_value) {
      return $this;
    }
    return new static($this->_name, $this->_arrow, $value);
  }

  public function hasValue(): bool {
    return !$this->_value->isMissing();
  }

  /**
   * @return ArrayIntrinsicExpression | BinaryExpression | LambdaExpression |
   * LiteralExpression | ObjectCreationExpression | ScopeResolutionExpression |
   * SubscriptExpression | NameToken | VariableExpression |
   * VectorIntrinsicExpression
   */
  public function getValue(): EditableNode {
    \assert($this->_value instanceof EditableNode);
    return $this->_value;
  }

  /**
   * @return ArrayIntrinsicExpression | BinaryExpression | LambdaExpression |
   * LiteralExpression | ObjectCreationExpression | ScopeResolutionExpression |
   * SubscriptExpression | NameToken | VariableExpression |
   * VectorIntrinsicExpression
   */
  public function getValuex(): EditableNode {
    return $this->getValue();
  }
}
