<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4d70e562c08eb59778b5e961bbc66401>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class ConstructorCall extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_type;
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
    EditableNode $type,
    EditableNode $left_paren,
    EditableNode $argument_list,
    EditableNode $right_paren
  ) {
    parent::__construct('constructor_call');
    $this->_type = $type;
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
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['constructor_call_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['constructor_call_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $argument_list = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['constructor_call_argument_list'],
      $file,
      $offset,
      $source
    );
    $offset += $argument_list->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['constructor_call_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    return new static($type, $left_paren, $argument_list, $right_paren);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'type' => $this->_type,
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
    $type = $this->_type->rewrite($rewriter, $parents);
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    if (
      $type === $this->_type &&
      $left_paren === $this->_left_paren &&
      $argument_list === $this->_argument_list &&
      $right_paren === $this->_right_paren
    ) {
      return $this;
    }
    return new static($type, $left_paren, $argument_list, $right_paren);
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
      $value,
      $this->_left_paren,
      $this->_argument_list,
      $this->_right_paren
    );
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @return GenericTypeSpecifier | MemberSelectionExpression |
   * ParenthesizedExpression | QualifiedName | ScopeResolutionExpression |
   * SimpleTypeSpecifier | SubscriptExpression | NameToken | ParentToken |
   * SelfToken | StaticToken | VariableExpression
   */
  public function getType(): EditableNode {
    \assert($this->_type instanceof EditableNode);
    return $this->_type;
  }

  /**
   * @return GenericTypeSpecifier | MemberSelectionExpression |
   * ParenthesizedExpression | QualifiedName | ScopeResolutionExpression |
   * SimpleTypeSpecifier | SubscriptExpression | NameToken | ParentToken |
   * SelfToken | StaticToken | VariableExpression
   */
  public function getTypex(): EditableNode {
    return $this->getType();
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
      $this->_type,
      $value,
      $this->_argument_list,
      $this->_right_paren
    );
  }

  public function hasLeftParen(): bool {
    return !$this->_left_paren->isMissing();
  }

  /**
   * @return null | LeftParenToken
   */
  public function getLeftParen(): ?LeftParenToken {
    if ($this->_left_paren->isMissing()) {
      return null;
    }
    \assert($this->_left_paren instanceof LeftParenToken);
    return $this->_left_paren;
  }

  /**
   * @return LeftParenToken
   */
  public function getLeftParenx(): LeftParenToken {
    \assert($this->_left_paren instanceof LeftParenToken);
    return $this->_left_paren;
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
    return
      new static($this->_type, $this->_left_paren, $value, $this->_right_paren);
  }

  public function hasArgumentList(): bool {
    return !$this->_argument_list->isMissing();
  }

  /**
   * @return EditableList<AnonymousFunction> | EditableList<EditableNode> |
   * EditableList<ArrayCreationExpression> |
   * EditableList<ArrayIntrinsicExpression> | EditableList<BinaryExpression> |
   * EditableList<CastExpression> | EditableList<CollectionLiteralExpression> |
   * EditableList<ConditionalExpression> |
   * EditableList<DarrayIntrinsicExpression> |
   * EditableList<DecoratedExpression> |
   * EditableList<DictionaryIntrinsicExpression> |
   * EditableList<FunctionCallExpression> |
   * EditableList<KeysetIntrinsicExpression> | EditableList<LambdaExpression> |
   * EditableList<LiteralExpression> | EditableList<MemberSelectionExpression>
   * | EditableList<ObjectCreationExpression> |
   * EditableList<ParenthesizedExpression> |
   * EditableList<PrefixUnaryExpression> |
   * EditableList<ScopeResolutionExpression> | EditableList<ShapeExpression> |
   * EditableList<SubscriptExpression> | EditableList<NameToken> |
   * EditableList<VariableExpression> | EditableList<VarrayIntrinsicExpression>
   * | EditableList<VectorIntrinsicExpression> | null
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
   * EditableList<ArrayIntrinsicExpression> | EditableList<BinaryExpression> |
   * EditableList<CastExpression> | EditableList<CollectionLiteralExpression> |
   * EditableList<ConditionalExpression> |
   * EditableList<DarrayIntrinsicExpression> |
   * EditableList<DecoratedExpression> |
   * EditableList<DictionaryIntrinsicExpression> |
   * EditableList<FunctionCallExpression> |
   * EditableList<KeysetIntrinsicExpression> | EditableList<LambdaExpression> |
   * EditableList<LiteralExpression> | EditableList<MemberSelectionExpression>
   * | EditableList<ObjectCreationExpression> |
   * EditableList<ParenthesizedExpression> |
   * EditableList<PrefixUnaryExpression> |
   * EditableList<ScopeResolutionExpression> | EditableList<ShapeExpression> |
   * EditableList<SubscriptExpression> | EditableList<NameToken> |
   * EditableList<VariableExpression> | EditableList<VarrayIntrinsicExpression>
   * | EditableList<VectorIntrinsicExpression>
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
      $this->_type,
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
