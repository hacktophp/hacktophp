<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<bb9bb2ed717dbb50b9e4ef81b6391d32>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class PrefixUnaryExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_operator;
  /**
   * @var EditableNode
   */
  private $_operand;

  public function __construct(EditableNode $operator, EditableNode $operand) {
    parent::__construct('prefix_unary_expression');
    $this->_operator = $operator;
    $this->_operand = $operand;
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
    $operator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['prefix_unary_operator'],
      $file,
      $offset,
      $source
    );
    $offset += $operator->getWidth();
    $operand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['prefix_unary_operand'],
      $file,
      $offset,
      $source
    );
    $offset += $operand->getWidth();
    return new static($operator, $operand);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'operator' => $this->_operator,
      'operand' => $this->_operand,
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
    $operator = $this->_operator->rewrite($rewriter, $parents);
    $operand = $this->_operand->rewrite($rewriter, $parents);
    if ($operator === $this->_operator && $operand === $this->_operand) {
      return $this;
    }
    return new static($operator, $operand);
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
    return new static($value, $this->_operand);
  }

  public function hasOperator(): bool {
    return !$this->_operator->isMissing();
  }

  /**
   * @returns ExclamationToken | DollarToken | AmpersandToken | PlusToken |
   * PlusPlusToken | MinusToken | MinusMinusToken | AtToken | AwaitToken |
   * CloneToken | PrintToken | SuspendToken | TildeToken
   */
  public function getOperator(): EditableToken {
    return TypeAssert\instance_of(EditableToken::class, $this->_operator);
  }

  /**
   * @returns ExclamationToken | DollarToken | AmpersandToken | PlusToken |
   * PlusPlusToken | MinusToken | MinusMinusToken | AtToken | AwaitToken |
   * CloneToken | PrintToken | SuspendToken | TildeToken
   */
  public function getOperatorx(): EditableToken {
    return $this->getOperator();
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
    return new static($this->_operator, $value);
  }

  public function hasOperand(): bool {
    return !$this->_operand->isMissing();
  }

  /**
   * @returns AnonymousFunction | ArrayIntrinsicExpression |
   * AwaitableCreationExpression | BinaryExpression | BracedExpression |
   * CastExpression | ConditionalExpression | DefineExpression |
   * EmptyExpression | EvalExpression | FunctionCallExpression |
   * InclusionExpression | InstanceofExpression | IssetExpression |
   * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
   * ParenthesizedExpression | PipeVariableExpression | PostfixUnaryExpression
   * | PrefixUnaryExpression | SafeMemberSelectionExpression |
   * ScopeResolutionExpression | SubscriptExpression | EndOfFileToken |
   * NameToken | VariableToken | VariableExpression
   */
  public function getOperand(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_operand);
  }

  /**
   * @returns AnonymousFunction | ArrayIntrinsicExpression |
   * AwaitableCreationExpression | BinaryExpression | BracedExpression |
   * CastExpression | ConditionalExpression | DefineExpression |
   * EmptyExpression | EvalExpression | FunctionCallExpression |
   * InclusionExpression | InstanceofExpression | IssetExpression |
   * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
   * ParenthesizedExpression | PipeVariableExpression | PostfixUnaryExpression
   * | PrefixUnaryExpression | SafeMemberSelectionExpression |
   * ScopeResolutionExpression | SubscriptExpression | EndOfFileToken |
   * NameToken | VariableToken | VariableExpression
   */
  public function getOperandx(): EditableNode {
    return $this->getOperand();
  }
}
