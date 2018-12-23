<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<61ed792f78c4e0eefa5ac63afd9baaab>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class PostfixUnaryExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_operand;
  /**
   * @var EditableNode
   */
  private $_operator;

  public function __construct(EditableNode $operand, EditableNode $operator) {
    parent::__construct('postfix_unary_expression');
    $this->_operand = $operand;
    $this->_operator = $operator;
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
    $operand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['postfix_unary_operand'],
      $file,
      $offset,
      $source
    );
    $offset += $operand->getWidth();
    $operator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['postfix_unary_operator'],
      $file,
      $offset,
      $source
    );
    $offset += $operator->getWidth();
    return new static($operand, $operator);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'operand' => $this->_operand,
      'operator' => $this->_operator,
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
    $operand = $this->_operand->rewrite($rewriter, $parents);
    $operator = $this->_operator->rewrite($rewriter, $parents);
    if ($operand === $this->_operand && $operator === $this->_operator) {
      return $this;
    }
    return new static($operand, $operator);
  }

  public function getOperandUNTYPED(): EditableNode {
    return $this->_operand;
  }

  /**
   * @return static
   */
  public function withOperand(EditableNode $value) {
    if ($value === $this->_operand) {
      return $this;
    }
    return new static($value, $this->_operator);
  }

  public function hasOperand(): bool {
    return !$this->_operand->isMissing();
  }

  /**
   * @return MemberSelectionExpression | PrefixUnaryExpression |
   * ScopeResolutionExpression | SubscriptExpression | VariableExpression
   */
  public function getOperand(): EditableNode {
    \assert($this->_operand instanceof EditableNode);
    return $this->_operand;
  }

  /**
   * @return MemberSelectionExpression | PrefixUnaryExpression |
   * ScopeResolutionExpression | SubscriptExpression | VariableExpression
   */
  public function getOperandx(): EditableNode {
    return $this->getOperand();
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
    return new static($this->_operand, $value);
  }

  public function hasOperator(): bool {
    return !$this->_operator->isMissing();
  }

  /**
   * @return PlusPlusToken | MinusMinusToken
   */
  public function getOperator(): EditableToken {
    \assert($this->_operator instanceof EditableToken);
    return $this->_operator;
  }

  /**
   * @return PlusPlusToken | MinusMinusToken
   */
  public function getOperatorx(): EditableToken {
    return $this->getOperator();
  }
}
