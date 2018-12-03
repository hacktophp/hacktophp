<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b52c96f6a540d86e8fdcc65b7bee57d8>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class EmbeddedMemberSelectionExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_object;
  /**
   * @var EditableNode
   */
  private $_operator;
  /**
   * @var EditableNode
   */
  private $_name;

  public function __construct(
    EditableNode $object,
    EditableNode $operator,
    EditableNode $name
  ) {
    parent::__construct('embedded_member_selection_expression');
    $this->_object = $object;
    $this->_operator = $operator;
    $this->_name = $name;
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
    $object = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_member_object'],
      $file,
      $offset,
      $source
    );
    $offset += $object->getWidth();
    $operator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_member_operator'],
      $file,
      $offset,
      $source
    );
    $offset += $operator->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_member_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    return new static($object, $operator, $name);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'object' => $this->_object,
      'operator' => $this->_operator,
      'name' => $this->_name,
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
    $object = $this->_object->rewrite($rewriter, $parents);
    $operator = $this->_operator->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    if (
      $object === $this->_object &&
      $operator === $this->_operator &&
      $name === $this->_name
    ) {
      return $this;
    }
    return new static($object, $operator, $name);
  }

  public function getObjectUNTYPED(): EditableNode {
    return $this->_object;
  }

  /**
   * @return static
   */
  public function withObject(EditableNode $value) {
    if ($value === $this->_object) {
      return $this;
    }
    return new static($value, $this->_operator, $this->_name);
  }

  public function hasObject(): bool {
    return !$this->_object->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getObject(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_object);
  }

  /**
   * @returns unknown
   */
  public function getObjectx(): EditableNode {
    return $this->getObject();
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
    return new static($this->_object, $value, $this->_name);
  }

  public function hasOperator(): bool {
    return !$this->_operator->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getOperator(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_operator);
  }

  /**
   * @returns unknown
   */
  public function getOperatorx(): EditableNode {
    return $this->getOperator();
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
    return new static($this->_object, $this->_operator, $value);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getName(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_name);
  }

  /**
   * @returns unknown
   */
  public function getNamex(): EditableNode {
    return $this->getName();
  }
}
