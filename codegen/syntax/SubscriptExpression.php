<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8844d5ccb4478b20068126a026f9b497>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class SubscriptExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_receiver;
  /**
   * @var EditableNode
   */
  private $_left_bracket;
  /**
   * @var EditableNode
   */
  private $_index;
  /**
   * @var EditableNode
   */
  private $_right_bracket;

  public function __construct(
    EditableNode $receiver,
    EditableNode $left_bracket,
    EditableNode $index,
    EditableNode $right_bracket
  ) {
    parent::__construct('subscript_expression');
    $this->_receiver = $receiver;
    $this->_left_bracket = $left_bracket;
    $this->_index = $index;
    $this->_right_bracket = $right_bracket;
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
    $receiver = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['subscript_receiver'],
      $file,
      $offset,
      $source
    );
    $offset += $receiver->getWidth();
    $left_bracket = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['subscript_left_bracket'],
      $file,
      $offset,
      $source
    );
    $offset += $left_bracket->getWidth();
    $index = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['subscript_index'],
      $file,
      $offset,
      $source
    );
    $offset += $index->getWidth();
    $right_bracket = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['subscript_right_bracket'],
      $file,
      $offset,
      $source
    );
    $offset += $right_bracket->getWidth();
    return new static($receiver, $left_bracket, $index, $right_bracket);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'receiver' => $this->_receiver,
      'left_bracket' => $this->_left_bracket,
      'index' => $this->_index,
      'right_bracket' => $this->_right_bracket,
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
    $receiver = $this->_receiver->rewrite($rewriter, $parents);
    $left_bracket = $this->_left_bracket->rewrite($rewriter, $parents);
    $index = $this->_index->rewrite($rewriter, $parents);
    $right_bracket = $this->_right_bracket->rewrite($rewriter, $parents);
    if (
      $receiver === $this->_receiver &&
      $left_bracket === $this->_left_bracket &&
      $index === $this->_index &&
      $right_bracket === $this->_right_bracket
    ) {
      return $this;
    }
    return new static($receiver, $left_bracket, $index, $right_bracket);
  }

  public function getReceiverUNTYPED(): EditableNode {
    return $this->_receiver;
  }

  /**
   * @return static
   */
  public function withReceiver(EditableNode $value) {
    if ($value === $this->_receiver) {
      return $this;
    }
    return new static(
      $value,
      $this->_left_bracket,
      $this->_index,
      $this->_right_bracket
    );
  }

  public function hasReceiver(): bool {
    return !$this->_receiver->isMissing();
  }

  /**
   * @returns ArrayCreationExpression | ArrayIntrinsicExpression |
   * FunctionCallExpression | LiteralExpression | MemberSelectionExpression |
   * ParenthesizedExpression | PrefixUnaryExpression |
   * SafeMemberSelectionExpression | ScopeResolutionExpression |
   * SubscriptExpression | RightParenToken | NameToken | VariableExpression
   */
  public function getReceiver(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_receiver);
  }

  /**
   * @returns ArrayCreationExpression | ArrayIntrinsicExpression |
   * FunctionCallExpression | LiteralExpression | MemberSelectionExpression |
   * ParenthesizedExpression | PrefixUnaryExpression |
   * SafeMemberSelectionExpression | ScopeResolutionExpression |
   * SubscriptExpression | RightParenToken | NameToken | VariableExpression
   */
  public function getReceiverx(): EditableNode {
    return $this->getReceiver();
  }

  public function getLeftBracketUNTYPED(): EditableNode {
    return $this->_left_bracket;
  }

  /**
   * @return static
   */
  public function withLeftBracket(EditableNode $value) {
    if ($value === $this->_left_bracket) {
      return $this;
    }
    return new static(
      $this->_receiver,
      $value,
      $this->_index,
      $this->_right_bracket
    );
  }

  public function hasLeftBracket(): bool {
    return !$this->_left_bracket->isMissing();
  }

  /**
   * @returns LeftBracketToken | LeftBraceToken
   */
  public function getLeftBracket(): EditableToken {
    return TypeAssert\instance_of(EditableToken::class, $this->_left_bracket);
  }

  /**
   * @returns LeftBracketToken | LeftBraceToken
   */
  public function getLeftBracketx(): EditableToken {
    return $this->getLeftBracket();
  }

  public function getIndexUNTYPED(): EditableNode {
    return $this->_index;
  }

  /**
   * @return static
   */
  public function withIndex(EditableNode $value) {
    if ($value === $this->_index) {
      return $this;
    }
    return new static(
      $this->_receiver,
      $this->_left_bracket,
      $value,
      $this->_right_bracket
    );
  }

  public function hasIndex(): bool {
    return !$this->_index->isMissing();
  }

  /**
   * @returns AnonymousFunction | ArrayIntrinsicExpression | BinaryExpression |
   * CastExpression | FunctionCallExpression | LiteralExpression |
   * MemberSelectionExpression | Missing | ObjectCreationExpression |
   * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
   * SafeMemberSelectionExpression | ScopeResolutionExpression |
   * SubscriptExpression | EchoToken | NameToken | ReturnToken |
   * VariableExpression
   */
  public function getIndex(): ?EditableNode {
    if ($this->_index->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_index);
  }

  /**
   * @returns AnonymousFunction | ArrayIntrinsicExpression | BinaryExpression |
   * CastExpression | FunctionCallExpression | LiteralExpression |
   * MemberSelectionExpression | ObjectCreationExpression |
   * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
   * SafeMemberSelectionExpression | ScopeResolutionExpression |
   * SubscriptExpression | EchoToken | NameToken | ReturnToken |
   * VariableExpression
   */
  public function getIndexx(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_index);
  }

  public function getRightBracketUNTYPED(): EditableNode {
    return $this->_right_bracket;
  }

  /**
   * @return static
   */
  public function withRightBracket(EditableNode $value) {
    if ($value === $this->_right_bracket) {
      return $this;
    }
    return
      new static($this->_receiver, $this->_left_bracket, $this->_index, $value);
  }

  public function hasRightBracket(): bool {
    return !$this->_right_bracket->isMissing();
  }

  /**
   * @returns Missing | RightBracketToken | RightBraceToken
   */
  public function getRightBracket(): ?EditableToken {
    if ($this->_right_bracket->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableToken::class, $this->_right_bracket);
  }

  /**
   * @returns RightBracketToken | RightBraceToken
   */
  public function getRightBracketx(): EditableToken {
    return TypeAssert\instance_of(EditableToken::class, $this->_right_bracket);
  }
}
