<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f2861a941fcf8e88f2b4276a6de9a7bc>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class FunctionCallExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_receiver;
  /**
   * @var EditableNode
   */
  private $_left_paren;
  /**
   * @var EditableNode
   */
  private $_argument_list;
  /**
   * @var EditableNode
   */
  private $_right_paren;

  public function __construct(
    EditableNode $receiver,
    EditableNode $left_paren,
    EditableNode $argument_list,
    EditableNode $right_paren
  ) {
    parent::__construct('function_call_expression');
    $this->_receiver = $receiver;
    $this->_left_paren = $left_paren;
    $this->_argument_list = $argument_list;
    $this->_right_paren = $right_paren;
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
      /* UNSAFE_EXPR */ $json['function_call_receiver'],
      $file,
      $offset,
      $source
    );
    $offset += $receiver->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_call_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $argument_list = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_call_argument_list'],
      $file,
      $offset,
      $source
    );
    $offset += $argument_list->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_call_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    return new static($receiver, $left_paren, $argument_list, $right_paren);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'receiver' => $this->_receiver,
      'left_paren' => $this->_left_paren,
      'argument_list' => $this->_argument_list,
      'right_paren' => $this->_right_paren,
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
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    if (
      $receiver === $this->_receiver &&
      $left_paren === $this->_left_paren &&
      $argument_list === $this->_argument_list &&
      $right_paren === $this->_right_paren
    ) {
      return $this;
    }
    return new static($receiver, $left_paren, $argument_list, $right_paren);
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
      $this->_left_paren,
      $this->_argument_list,
      $this->_right_paren
    );
  }

  public function hasReceiver(): bool {
    return !$this->_receiver->isMissing();
  }

  /**
   * @return ArrayCreationExpression | FunctionCallExpression |
   * LiteralExpression | MemberSelectionExpression | ParenthesizedExpression |
   * PrefixUnaryExpression | QualifiedName | SafeMemberSelectionExpression |
   * ScopeResolutionExpression | SubscriptExpression | IfToken | NameToken |
   * VariableExpression
   */
  public function getReceiver(): EditableNode {
    \assert($this->_receiver instanceof EditableNode);
    return $this->_receiver;
  }

  /**
   * @return ArrayCreationExpression | FunctionCallExpression |
   * LiteralExpression | MemberSelectionExpression | ParenthesizedExpression |
   * PrefixUnaryExpression | QualifiedName | SafeMemberSelectionExpression |
   * ScopeResolutionExpression | SubscriptExpression | IfToken | NameToken |
   * VariableExpression
   */
  public function getReceiverx(): EditableNode {
    return $this->getReceiver();
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
    return new static(
      $this->_receiver,
      $value,
      $this->_argument_list,
      $this->_right_paren
    );
  }

  public function hasLeftParen(): bool {
    return !$this->_left_paren->isMissing();
  }

  /**
   * @return LeftParenToken
   */
  public function getLeftParen(): LeftParenToken {
    \assert($this->_left_paren instanceof LeftParenToken);
    return $this->_left_paren;
  }

  /**
   * @return LeftParenToken
   */
  public function getLeftParenx(): LeftParenToken {
    return $this->getLeftParen();
  }

  public function getArgumentListUNTYPED(): EditableNode {
    return $this->_argument_list;
  }

  /**
   * @return static
   */
  public function withArgumentList(EditableNode $value) {
    if ($value === $this->_argument_list) {
      return $this;
    }
    return new static(
      $this->_receiver,
      $this->_left_paren,
      $value,
      $this->_right_paren
    );
  }

  public function hasArgumentList(): bool {
    return !$this->_argument_list->isMissing();
  }

  /**
   * @return EditableList<AnonymousFunction> | EditableList<EditableNode> |
   * EditableList<ArrayCreationExpression> |
   * EditableList<ArrayIntrinsicExpression> | EditableList<AsExpression> |
   * EditableList<AwaitableCreationExpression> | EditableList<BinaryExpression>
   * | EditableList<CastExpression> | EditableList<CollectionLiteralExpression>
   * | EditableList<ConditionalExpression> |
   * EditableList<DarrayIntrinsicExpression> |
   * EditableList<DecoratedExpression> | EditableList<DefineExpression> |
   * EditableList<DictionaryIntrinsicExpression> |
   * EditableList<EmptyExpression> | EditableList<EvalExpression> |
   * EditableList<FunctionCallExpression> | EditableList<InclusionExpression> |
   * EditableList<InstanceofExpression> | EditableList<IsExpression> |
   * EditableList<IssetExpression> | EditableList<KeysetIntrinsicExpression> |
   * EditableList<LambdaExpression> | EditableList<LiteralExpression> |
   * EditableList<?LiteralExpression> | EditableList<MemberSelectionExpression>
   * | EditableList<ObjectCreationExpression> |
   * EditableList<ParenthesizedExpression> |
   * EditableList<PipeVariableExpression> |
   * EditableList<PostfixUnaryExpression> | EditableList<PrefixUnaryExpression>
   * | EditableList<QualifiedName> |
   * EditableList<SafeMemberSelectionExpression> |
   * EditableList<ScopeResolutionExpression> | EditableList<ShapeExpression> |
   * EditableList<SubscriptExpression> | EditableList<NameToken> |
   * EditableList<TupleExpression> | EditableList<VariableExpression> |
   * EditableList<VarrayIntrinsicExpression> |
   * EditableList<VectorIntrinsicExpression> | EditableList<XHPExpression> |
   * Missing
   */
  public function getArgumentList(): ?EditableList {
    if ($this->_argument_list->isMissing()) {
      return null;
    }
    \assert($this->_argument_list instanceof EditableList);
    return $this->_argument_list;
  }

  /**
   * @return EditableList<AnonymousFunction> | EditableList<EditableNode> |
   * EditableList<ArrayCreationExpression> |
   * EditableList<ArrayIntrinsicExpression> | EditableList<AsExpression> |
   * EditableList<AwaitableCreationExpression> | EditableList<BinaryExpression>
   * | EditableList<CastExpression> | EditableList<CollectionLiteralExpression>
   * | EditableList<ConditionalExpression> |
   * EditableList<DarrayIntrinsicExpression> |
   * EditableList<DecoratedExpression> | EditableList<DefineExpression> |
   * EditableList<DictionaryIntrinsicExpression> |
   * EditableList<EmptyExpression> | EditableList<EvalExpression> |
   * EditableList<FunctionCallExpression> | EditableList<InclusionExpression> |
   * EditableList<InstanceofExpression> | EditableList<IsExpression> |
   * EditableList<IssetExpression> | EditableList<KeysetIntrinsicExpression> |
   * EditableList<LambdaExpression> | EditableList<LiteralExpression> |
   * EditableList<?LiteralExpression> | EditableList<MemberSelectionExpression>
   * | EditableList<ObjectCreationExpression> |
   * EditableList<ParenthesizedExpression> |
   * EditableList<PipeVariableExpression> |
   * EditableList<PostfixUnaryExpression> | EditableList<PrefixUnaryExpression>
   * | EditableList<QualifiedName> |
   * EditableList<SafeMemberSelectionExpression> |
   * EditableList<ScopeResolutionExpression> | EditableList<ShapeExpression> |
   * EditableList<SubscriptExpression> | EditableList<NameToken> |
   * EditableList<TupleExpression> | EditableList<VariableExpression> |
   * EditableList<VarrayIntrinsicExpression> |
   * EditableList<VectorIntrinsicExpression> | EditableList<XHPExpression>
   */
  public function getArgumentListx(): EditableList {
    \assert($this->_argument_list instanceof EditableList);
    return $this->_argument_list;
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
    return new static(
      $this->_receiver,
      $this->_left_paren,
      $this->_argument_list,
      $value
    );
  }

  public function hasRightParen(): bool {
    return !$this->_right_paren->isMissing();
  }

  /**
   * @return null | RightParenToken
   */
  public function getRightParen(): ?RightParenToken {
    if ($this->_right_paren->isMissing()) {
      return null;
    }
    \assert($this->_right_paren instanceof RightParenToken);
    return $this->_right_paren;
  }

  /**
   * @return RightParenToken
   */
  public function getRightParenx(): RightParenToken {
    \assert($this->_right_paren instanceof RightParenToken);
    return $this->_right_paren;
  }
}
