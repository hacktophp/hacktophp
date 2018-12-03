<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<316f0f7f7ba81fc2bed90fc96440d1e9>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class InstanceofExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_operand;
  /**
   * @var EditableNode
   */
  private $_operator;
  /**
   * @var EditableNode
   */
  private $_right_operand;

  public function __construct(
    EditableNode $left_operand,
    EditableNode $operator,
    EditableNode $right_operand
  ) {
    parent::__construct('instanceof_expression');
    $this->_left_operand = $left_operand;
    $this->_operator = $operator;
    $this->_right_operand = $right_operand;
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
    $left_operand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['instanceof_left_operand'],
      $file,
      $offset,
      $source
    );
    $offset += $left_operand->getWidth();
    $operator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['instanceof_operator'],
      $file,
      $offset,
      $source
    );
    $offset += $operator->getWidth();
    $right_operand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['instanceof_right_operand'],
      $file,
      $offset,
      $source
    );
    $offset += $right_operand->getWidth();
    return new static($left_operand, $operator, $right_operand);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_operand' => $this->_left_operand,
      'operator' => $this->_operator,
      'right_operand' => $this->_right_operand,
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
    $left_operand = $this->_left_operand->rewrite($rewriter, $parents);
    $operator = $this->_operator->rewrite($rewriter, $parents);
    $right_operand = $this->_right_operand->rewrite($rewriter, $parents);
    if (
      $left_operand === $this->_left_operand &&
      $operator === $this->_operator &&
      $right_operand === $this->_right_operand
    ) {
      return $this;
    }
    return new static($left_operand, $operator, $right_operand);
  }

  public function getLeftOperandUNTYPED(): EditableNode {
    return $this->_left_operand;
  }

  /**
   * @return static
   */
  public function withLeftOperand(EditableNode $value) {
    if ($value === $this->_left_operand) {
      return $this;
    }
    return new static($value, $this->_operator, $this->_right_operand);
  }

  public function hasLeftOperand(): bool {
    return !$this->_left_operand->isMissing();
  }

  /**
   * @return AnonymousFunction | CastExpression | CollectionLiteralExpression
   * | FunctionCallExpression | LiteralExpression | MemberSelectionExpression |
   * ObjectCreationExpression | ParenthesizedExpression |
   * PipeVariableExpression | PrefixUnaryExpression | ScopeResolutionExpression
   * | SubscriptExpression | VariableExpression
   */
  public function getLeftOperand(): EditableNode {
    \assert($this->_left_operand instanceof EditableNode);
    return $this->_left_operand;
  }

  /**
   * @return AnonymousFunction | CastExpression | CollectionLiteralExpression
   * | FunctionCallExpression | LiteralExpression | MemberSelectionExpression |
   * ObjectCreationExpression | ParenthesizedExpression |
   * PipeVariableExpression | PrefixUnaryExpression | ScopeResolutionExpression
   * | SubscriptExpression | VariableExpression
   */
  public function getLeftOperandx(): EditableNode {
    return $this->getLeftOperand();
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
    return new static($this->_left_operand, $value, $this->_right_operand);
  }

  public function hasOperator(): bool {
    return !$this->_operator->isMissing();
  }

  /**
   * @return InstanceofToken
   */
  public function getOperator(): InstanceofToken {
    \assert($this->_operator instanceof InstanceofToken);
    return $this->_operator;
  }

  /**
   * @return InstanceofToken
   */
  public function getOperatorx(): InstanceofToken {
    return $this->getOperator();
  }

  public function getRightOperandUNTYPED(): EditableNode {
    return $this->_right_operand;
  }

  /**
   * @return static
   */
  public function withRightOperand(EditableNode $value) {
    if ($value === $this->_right_operand) {
      return $this;
    }
    return new static($this->_left_operand, $this->_operator, $value);
  }

  public function hasRightOperand(): bool {
    return !$this->_right_operand->isMissing();
  }

  /**
   * @return MemberSelectionExpression | Missing | ParenthesizedExpression |
   * QualifiedName | ScopeResolutionExpression | SubscriptExpression |
   * NameToken | VariableExpression
   */
  public function getRightOperand(): ?EditableNode {
    if ($this->_right_operand->isMissing()) {
      return null;
    }
    \assert($this->_right_operand instanceof EditableNode);
    return $this->_right_operand;
  }

  /**
   * @return MemberSelectionExpression | ParenthesizedExpression |
   * QualifiedName | ScopeResolutionExpression | SubscriptExpression |
   * NameToken | VariableExpression
   */
  public function getRightOperandx(): EditableNode {
    \assert($this->_right_operand instanceof EditableNode);
    return $this->_right_operand;
  }
}
