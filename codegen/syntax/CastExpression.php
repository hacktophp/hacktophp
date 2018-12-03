<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8dd5f2ff611b1a1199460338933e50e7>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class CastExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_paren;
  /**
   * @var EditableNode
   */
  private $_type;
  /**
   * @var EditableNode
   */
  private $_right_paren;
  /**
   * @var EditableNode
   */
  private $_operand;

  public function __construct(
    EditableNode $left_paren,
    EditableNode $type,
    EditableNode $right_paren,
    EditableNode $operand
  ) {
    parent::__construct('cast_expression');
    $this->_left_paren = $left_paren;
    $this->_type = $type;
    $this->_right_paren = $right_paren;
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
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['cast_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['cast_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['cast_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    $operand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['cast_operand'],
      $file,
      $offset,
      $source
    );
    $offset += $operand->getWidth();
    return new static($left_paren, $type, $right_paren, $operand);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_paren' => $this->_left_paren,
      'type' => $this->_type,
      'right_paren' => $this->_right_paren,
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
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $type = $this->_type->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    $operand = $this->_operand->rewrite($rewriter, $parents);
    if (
      $left_paren === $this->_left_paren &&
      $type === $this->_type &&
      $right_paren === $this->_right_paren &&
      $operand === $this->_operand
    ) {
      return $this;
    }
    return new static($left_paren, $type, $right_paren, $operand);
  }

  public function getLeftParenUNTYPED(): EditableNode {
    return $this->_left_paren;
  }

  /**
   * @return static
   */
  public function withLeftParen(EditableNode $value) {
    if ($value === $this->_left_paren) {
      return $this;
    }
    return
      new static($value, $this->_type, $this->_right_paren, $this->_operand);
  }

  public function hasLeftParen(): bool {
    return !$this->_left_paren->isMissing();
  }

  /**
   * @returns LeftParenToken
   */
  public function getLeftParen(): LeftParenToken {
    return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
  }

  /**
   * @returns LeftParenToken
   */
  public function getLeftParenx(): LeftParenToken {
    return $this->getLeftParen();
  }

  public function getTypeUNTYPED(): EditableNode {
    return $this->_type;
  }

  /**
   * @return static
   */
  public function withType(EditableNode $value) {
    if ($value === $this->_type) {
      return $this;
    }
    return new static(
      $this->_left_paren,
      $value,
      $this->_right_paren,
      $this->_operand
    );
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @returns ArrayToken | BinaryToken | BoolToken | BooleanToken | DoubleToken
   * | FloatToken | IntToken | IntegerToken | ObjectToken | RealToken |
   * StringToken | UnsetToken
   */
  public function getType(): EditableToken {
    return TypeAssert\instance_of(EditableToken::class, $this->_type);
  }

  /**
   * @returns ArrayToken | BinaryToken | BoolToken | BooleanToken | DoubleToken
   * | FloatToken | IntToken | IntegerToken | ObjectToken | RealToken |
   * StringToken | UnsetToken
   */
  public function getTypex(): EditableToken {
    return $this->getType();
  }

  public function getRightParenUNTYPED(): EditableNode {
    return $this->_right_paren;
  }

  /**
   * @return static
   */
  public function withRightParen(EditableNode $value) {
    if ($value === $this->_right_paren) {
      return $this;
    }
    return
      new static($this->_left_paren, $this->_type, $value, $this->_operand);
  }

  public function hasRightParen(): bool {
    return !$this->_right_paren->isMissing();
  }

  /**
   * @returns RightParenToken
   */
  public function getRightParen(): RightParenToken {
    return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
  }

  /**
   * @returns RightParenToken
   */
  public function getRightParenx(): RightParenToken {
    return $this->getRightParen();
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
    return
      new static($this->_left_paren, $this->_type, $this->_right_paren, $value);
  }

  public function hasOperand(): bool {
    return !$this->_operand->isMissing();
  }

  /**
   * @returns AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | CastExpression | CollectionLiteralExpression |
   * DictionaryIntrinsicExpression | FunctionCallExpression |
   * KeysetIntrinsicExpression | LiteralExpression | MemberSelectionExpression
   * | ObjectCreationExpression | ParenthesizedExpression |
   * PostfixUnaryExpression | PrefixUnaryExpression | ScopeResolutionExpression
   * | SubscriptExpression | NameToken | VariableExpression |
   * VectorIntrinsicExpression | XHPExpression
   */
  public function getOperand(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_operand);
  }

  /**
   * @returns AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | CastExpression | CollectionLiteralExpression |
   * DictionaryIntrinsicExpression | FunctionCallExpression |
   * KeysetIntrinsicExpression | LiteralExpression | MemberSelectionExpression
   * | ObjectCreationExpression | ParenthesizedExpression |
   * PostfixUnaryExpression | PrefixUnaryExpression | ScopeResolutionExpression
   * | SubscriptExpression | NameToken | VariableExpression |
   * VectorIntrinsicExpression | XHPExpression
   */
  public function getOperandx(): EditableNode {
    return $this->getOperand();
  }
}
