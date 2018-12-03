<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<88837a7a4fe65ff619ac7df60ef13a6c>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class ArrayIntrinsicExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_left_paren;
  /**
   * @var EditableNode
   */
  private $_members;
  /**
   * @var EditableNode
   */
  private $_right_paren;

  public function __construct(
    EditableNode $keyword,
    EditableNode $left_paren,
    EditableNode $members,
    EditableNode $right_paren
  ) {
    parent::__construct('array_intrinsic_expression');
    $this->_keyword = $keyword;
    $this->_left_paren = $left_paren;
    $this->_members = $members;
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
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['array_intrinsic_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['array_intrinsic_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $members = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['array_intrinsic_members'],
      $file,
      $offset,
      $source
    );
    $offset += $members->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['array_intrinsic_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    return new static($keyword, $left_paren, $members, $right_paren);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'left_paren' => $this->_left_paren,
      'members' => $this->_members,
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
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $members = $this->_members->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $left_paren === $this->_left_paren &&
      $members === $this->_members &&
      $right_paren === $this->_right_paren
    ) {
      return $this;
    }
    return new static($keyword, $left_paren, $members, $right_paren);
  }

  public function getKeywordUNTYPED(): EditableNode {
    return $this->_keyword;
  }

  /**
   * @return static
   */
  public function withKeyword(EditableNode $value) {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new static(
      $value,
      $this->_left_paren,
      $this->_members,
      $this->_right_paren
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns ArrayToken
   */
  public function getKeyword(): ArrayToken {
    return TypeAssert\instance_of(ArrayToken::class, $this->_keyword);
  }

  /**
   * @returns ArrayToken
   */
  public function getKeywordx(): ArrayToken {
    return $this->getKeyword();
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
      new static($this->_keyword, $value, $this->_members, $this->_right_paren);
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

  public function getMembersUNTYPED(): EditableNode {
    return $this->_members;
  }

  /**
   * @return static
   */
  public function withMembers(EditableNode $value) {
    if ($value === $this->_members) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $value,
      $this->_right_paren
    );
  }

  public function hasMembers(): bool {
    return !$this->_members->isMissing();
  }

  /**
   * @return EditableList<AnonymousFunction> | EditableList<EditableNode> |
   * EditableList<ArrayCreationExpression> |
   * EditableList<ArrayIntrinsicExpression> |
   * EditableList<AwaitableCreationExpression> | EditableList<BinaryExpression>
   * | EditableList<CastExpression> | EditableList<CollectionLiteralExpression>
   * | EditableList<ElementInitializer> | EditableList<FunctionCallExpression>
   * | EditableList<LiteralExpression> |
   * EditableList<MemberSelectionExpression> |
   * EditableList<ObjectCreationExpression> |
   * EditableList<PrefixUnaryExpression> | EditableList<QualifiedName> |
   * EditableList<ScopeResolutionExpression> |
   * EditableList<SubscriptExpression> | EditableList<NameToken> |
   * EditableList<TupleExpression> | EditableList<VariableExpression> |
   * EditableList<VectorIntrinsicExpression> | Missing
   */
  public function getMembers(): ?EditableList {
    if ($this->_members->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableList::class, $this->_members);
  }

  /**
   * @return EditableList<AnonymousFunction> | EditableList<EditableNode> |
   * EditableList<ArrayCreationExpression> |
   * EditableList<ArrayIntrinsicExpression> |
   * EditableList<AwaitableCreationExpression> | EditableList<BinaryExpression>
   * | EditableList<CastExpression> | EditableList<CollectionLiteralExpression>
   * | EditableList<ElementInitializer> | EditableList<FunctionCallExpression>
   * | EditableList<LiteralExpression> |
   * EditableList<MemberSelectionExpression> |
   * EditableList<ObjectCreationExpression> |
   * EditableList<PrefixUnaryExpression> | EditableList<QualifiedName> |
   * EditableList<ScopeResolutionExpression> |
   * EditableList<SubscriptExpression> | EditableList<NameToken> |
   * EditableList<TupleExpression> | EditableList<VariableExpression> |
   * EditableList<VectorIntrinsicExpression>
   */
  public function getMembersx(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_members);
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
      new static($this->_keyword, $this->_left_paren, $this->_members, $value);
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
}
