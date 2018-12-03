<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6b1f42032eb97c4959addc22cc8f2a25>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class MemberSelectionExpression extends EditableNode {

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
    parent::__construct('member_selection_expression');
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
      /* UNSAFE_EXPR */ $json['member_object'],
      $file,
      $offset,
      $source
    );
    $offset += $object->getWidth();
    $operator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['member_operator'],
      $file,
      $offset,
      $source
    );
    $offset += $operator->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['member_name'],
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
   * @returns FunctionCallExpression | MemberSelectionExpression |
   * ObjectCreationExpression | ParenthesizedExpression |
   * PipeVariableExpression | PrefixUnaryExpression | ScopeResolutionExpression
   * | SubscriptExpression | NameToken | VariableExpression
   */
  public function getObject(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_object);
  }

  /**
   * @returns FunctionCallExpression | MemberSelectionExpression |
   * ObjectCreationExpression | ParenthesizedExpression |
   * PipeVariableExpression | PrefixUnaryExpression | ScopeResolutionExpression
   * | SubscriptExpression | NameToken | VariableExpression
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
   * @returns MinusGreaterThanToken
   */
  public function getOperator(): MinusGreaterThanToken {
    return
      TypeAssert\instance_of(MinusGreaterThanToken::class, $this->_operator);
  }

  /**
   * @returns MinusGreaterThanToken
   */
  public function getOperatorx(): MinusGreaterThanToken {
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
   * @returns BracedExpression | PrefixUnaryExpression | XHPClassNameToken |
   * NameToken | VariableToken
   */
  public function getName(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_name);
  }

  /**
   * @returns BracedExpression | PrefixUnaryExpression | XHPClassNameToken |
   * NameToken | VariableToken
   */
  public function getNamex(): EditableNode {
    return $this->getName();
  }
}
