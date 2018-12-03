<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<bc0120c7c77717491e53d4ec6ab0febb>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class CollectionLiteralExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_left_brace;
  /**
   * @var EditableNode
   */
  private $_initializers;
  /**
   * @var EditableNode
   */
  private $_right_brace;

  public function __construct(
    EditableNode $name,
    EditableNode $left_brace,
    EditableNode $initializers,
    EditableNode $right_brace
  ) {
    parent::__construct('collection_literal_expression');
    $this->_name = $name;
    $this->_left_brace = $left_brace;
    $this->_initializers = $initializers;
    $this->_right_brace = $right_brace;
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
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['collection_literal_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $left_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['collection_literal_left_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $left_brace->getWidth();
    $initializers = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['collection_literal_initializers'],
      $file,
      $offset,
      $source
    );
    $offset += $initializers->getWidth();
    $right_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['collection_literal_right_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $right_brace->getWidth();
    return new static($name, $left_brace, $initializers, $right_brace);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'name' => $this->_name,
      'left_brace' => $this->_left_brace,
      'initializers' => $this->_initializers,
      'right_brace' => $this->_right_brace,
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
    $name = $this->_name->rewrite($rewriter, $parents);
    $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
    $initializers = $this->_initializers->rewrite($rewriter, $parents);
    $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
    if (
      $name === $this->_name &&
      $left_brace === $this->_left_brace &&
      $initializers === $this->_initializers &&
      $right_brace === $this->_right_brace
    ) {
      return $this;
    }
    return new static($name, $left_brace, $initializers, $right_brace);
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
    return new static(
      $value,
      $this->_left_brace,
      $this->_initializers,
      $this->_right_brace
    );
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @returns GenericTypeSpecifier | SimpleTypeSpecifier
   */
  public function getName(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_name);
  }

  /**
   * @returns GenericTypeSpecifier | SimpleTypeSpecifier
   */
  public function getNamex(): EditableNode {
    return $this->getName();
  }

  public function getLeftBraceUNTYPED(): EditableNode {
    return $this->_left_brace;
  }

  /**
   * @return static
   */
  public function withLeftBrace(EditableNode $value) {
    if ($value === $this->_left_brace) {
      return $this;
    }
    return new static(
      $this->_name,
      $value,
      $this->_initializers,
      $this->_right_brace
    );
  }

  public function hasLeftBrace(): bool {
    return !$this->_left_brace->isMissing();
  }

  /**
   * @returns LeftBraceToken
   */
  public function getLeftBrace(): LeftBraceToken {
    return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
  }

  /**
   * @returns LeftBraceToken
   */
  public function getLeftBracex(): LeftBraceToken {
    return $this->getLeftBrace();
  }

  public function getInitializersUNTYPED(): EditableNode {
    return $this->_initializers;
  }

  /**
   * @return static
   */
  public function withInitializers(EditableNode $value) {
    if ($value === $this->_initializers) {
      return $this;
    }
    return
      new static($this->_name, $this->_left_brace, $value, $this->_right_brace);
  }

  public function hasInitializers(): bool {
    return !$this->_initializers->isMissing();
  }

  /**
   * @return EditableList<AnonymousFunction> |
   * EditableList<ArrayCreationExpression> |
   * EditableList<ArrayIntrinsicExpression> | EditableList<EditableNode> |
   * EditableList<CastExpression> | EditableList<CollectionLiteralExpression> |
   * EditableList<ElementInitializer> | EditableList<FunctionCallExpression> |
   * EditableList<LambdaExpression> | EditableList<LiteralExpression> |
   * EditableList<ObjectCreationExpression> |
   * EditableList<ScopeResolutionExpression> |
   * EditableList<SubscriptExpression> | EditableList<EditableToken> |
   * EditableList<NameToken> | EditableList<ReturnToken> |
   * EditableList<TupleExpression> | EditableList<VariableExpression> |
   * EditableList<VarrayIntrinsicExpression> | Missing
   */
  public function getInitializers(): ?EditableList {
    if ($this->_initializers->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableList::class, $this->_initializers);
  }

  /**
   * @return EditableList<AnonymousFunction> |
   * EditableList<ArrayCreationExpression> |
   * EditableList<ArrayIntrinsicExpression> | EditableList<EditableNode> |
   * EditableList<CastExpression> | EditableList<CollectionLiteralExpression> |
   * EditableList<ElementInitializer> | EditableList<FunctionCallExpression> |
   * EditableList<LambdaExpression> | EditableList<LiteralExpression> |
   * EditableList<ObjectCreationExpression> |
   * EditableList<ScopeResolutionExpression> |
   * EditableList<SubscriptExpression> | EditableList<EditableToken> |
   * EditableList<NameToken> | EditableList<ReturnToken> |
   * EditableList<TupleExpression> | EditableList<VariableExpression> |
   * EditableList<VarrayIntrinsicExpression>
   */
  public function getInitializersx(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_initializers);
  }

  public function getRightBraceUNTYPED(): EditableNode {
    return $this->_right_brace;
  }

  /**
   * @return static
   */
  public function withRightBrace(EditableNode $value) {
    if ($value === $this->_right_brace) {
      return $this;
    }
    return new static(
      $this->_name,
      $this->_left_brace,
      $this->_initializers,
      $value
    );
  }

  public function hasRightBrace(): bool {
    return !$this->_right_brace->isMissing();
  }

  /**
   * @returns Missing | RightBraceToken
   */
  public function getRightBrace(): ?RightBraceToken {
    if ($this->_right_brace->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
  }

  /**
   * @returns RightBraceToken
   */
  public function getRightBracex(): RightBraceToken {
    return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
  }
}
