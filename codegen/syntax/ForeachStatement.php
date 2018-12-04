<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<543cc69b87f4df641d8ac42b36ca6233>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class ForeachStatement
  extends EditableNode
  implements IControlFlowStatement, ILoopStatement {

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
  private $_collection;
  /**
   * @var EditableNode
   */
  private $_await_keyword;
  /**
   * @var EditableNode
   */
  private $_as;
  /**
   * @var EditableNode
   */
  private $_key;
  /**
   * @var EditableNode
   */
  private $_arrow;
  /**
   * @var EditableNode
   */
  private $_value;
  /**
   * @var EditableNode
   */
  private $_right_paren;
  /**
   * @var EditableNode
   */
  private $_body;

  public function __construct(
    EditableNode $keyword,
    EditableNode $left_paren,
    EditableNode $collection,
    EditableNode $await_keyword,
    EditableNode $as,
    EditableNode $key,
    EditableNode $arrow,
    EditableNode $value,
    EditableNode $right_paren,
    EditableNode $body
  ) {
    parent::__construct('foreach_statement');
    $this->_keyword = $keyword;
    $this->_left_paren = $left_paren;
    $this->_collection = $collection;
    $this->_await_keyword = $await_keyword;
    $this->_as = $as;
    $this->_key = $key;
    $this->_arrow = $arrow;
    $this->_value = $value;
    $this->_right_paren = $right_paren;
    $this->_body = $body;
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
      /* UNSAFE_EXPR */ $json['foreach_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['foreach_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $collection = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['foreach_collection'],
      $file,
      $offset,
      $source
    );
    $offset += $collection->getWidth();
    $await_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['foreach_await_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $await_keyword->getWidth();
    $as = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['foreach_as'],
      $file,
      $offset,
      $source
    );
    $offset += $as->getWidth();
    $key = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['foreach_key'],
      $file,
      $offset,
      $source
    );
    $offset += $key->getWidth();
    $arrow = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['foreach_arrow'],
      $file,
      $offset,
      $source
    );
    $offset += $arrow->getWidth();
    $value = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['foreach_value'],
      $file,
      $offset,
      $source
    );
    $offset += $value->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['foreach_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    $body = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['foreach_body'],
      $file,
      $offset,
      $source
    );
    $offset += $body->getWidth();
    return new static(
      $keyword,
      $left_paren,
      $collection,
      $await_keyword,
      $as,
      $key,
      $arrow,
      $value,
      $right_paren,
      $body
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'left_paren' => $this->_left_paren,
      'collection' => $this->_collection,
      'await_keyword' => $this->_await_keyword,
      'as' => $this->_as,
      'key' => $this->_key,
      'arrow' => $this->_arrow,
      'value' => $this->_value,
      'right_paren' => $this->_right_paren,
      'body' => $this->_body,
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
    $collection = $this->_collection->rewrite($rewriter, $parents);
    $await_keyword = $this->_await_keyword->rewrite($rewriter, $parents);
    $as = $this->_as->rewrite($rewriter, $parents);
    $key = $this->_key->rewrite($rewriter, $parents);
    $arrow = $this->_arrow->rewrite($rewriter, $parents);
    $value = $this->_value->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    $body = $this->_body->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $left_paren === $this->_left_paren &&
      $collection === $this->_collection &&
      $await_keyword === $this->_await_keyword &&
      $as === $this->_as &&
      $key === $this->_key &&
      $arrow === $this->_arrow &&
      $value === $this->_value &&
      $right_paren === $this->_right_paren &&
      $body === $this->_body
    ) {
      return $this;
    }
    return new static(
      $keyword,
      $left_paren,
      $collection,
      $await_keyword,
      $as,
      $key,
      $arrow,
      $value,
      $right_paren,
      $body
    );
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
      $this->_collection,
      $this->_await_keyword,
      $this->_as,
      $this->_key,
      $this->_arrow,
      $this->_value,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return ForeachToken
   */
  public function getKeyword(): ForeachToken {
    \assert($this->_keyword instanceof ForeachToken);
    return $this->_keyword;
  }

  /**
   * @return ForeachToken
   */
  public function getKeywordx(): ForeachToken {
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
    return new static(
      $this->_keyword,
      $value,
      $this->_collection,
      $this->_await_keyword,
      $this->_as,
      $this->_key,
      $this->_arrow,
      $this->_value,
      $this->_right_paren,
      $this->_body
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

  public function getCollectionUNTYPED(): EditableNode {
    return $this->_collection;
  }

  /**
   * @return static
   */
  public function withCollection(EditableNode $value) {
    if ($value === $this->_collection) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $value,
      $this->_await_keyword,
      $this->_as,
      $this->_key,
      $this->_arrow,
      $this->_value,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasCollection(): bool {
    return !$this->_collection->isMissing();
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | CastExpression | CollectionLiteralExpression |
   * FunctionCallExpression | MemberSelectionExpression |
   * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
   * | ScopeResolutionExpression | SubscriptExpression | NameToken |
   * VariableExpression | VectorIntrinsicExpression
   */
  public function getCollection(): EditableNode {
    \assert($this->_collection instanceof EditableNode);
    return $this->_collection;
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | CastExpression | CollectionLiteralExpression |
   * FunctionCallExpression | MemberSelectionExpression |
   * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
   * | ScopeResolutionExpression | SubscriptExpression | NameToken |
   * VariableExpression | VectorIntrinsicExpression
   */
  public function getCollectionx(): EditableNode {
    return $this->getCollection();
  }

  public function getAwaitKeywordUNTYPED(): EditableNode {
    return $this->_await_keyword;
  }

  /**
   * @return static
   */
  public function withAwaitKeyword(EditableNode $value) {
    if ($value === $this->_await_keyword) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_collection,
      $value,
      $this->_as,
      $this->_key,
      $this->_arrow,
      $this->_value,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasAwaitKeyword(): bool {
    return !$this->_await_keyword->isMissing();
  }

  /**
   * @return null | AwaitToken
   */
  public function getAwaitKeyword(): ?AwaitToken {
    if ($this->_await_keyword->isMissing()) {
      return null;
    }
    \assert($this->_await_keyword instanceof AwaitToken);
    return $this->_await_keyword;
  }

  /**
   * @return AwaitToken
   */
  public function getAwaitKeywordx(): AwaitToken {
    \assert($this->_await_keyword instanceof AwaitToken);
    return $this->_await_keyword;
  }

  public function getAsUNTYPED(): EditableNode {
    return $this->_as;
  }

  /**
   * @return static
   */
  public function withAs(EditableNode $value) {
    if ($value === $this->_as) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_collection,
      $this->_await_keyword,
      $value,
      $this->_key,
      $this->_arrow,
      $this->_value,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasAs(): bool {
    return !$this->_as->isMissing();
  }

  /**
   * @return AsToken
   */
  public function getAs(): AsToken {
    \assert($this->_as instanceof AsToken);
    return $this->_as;
  }

  /**
   * @return AsToken
   */
  public function getAsx(): AsToken {
    return $this->getAs();
  }

  public function getKeyUNTYPED(): EditableNode {
    return $this->_key;
  }

  /**
   * @return static
   */
  public function withKey(EditableNode $value) {
    if ($value === $this->_key) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_collection,
      $this->_await_keyword,
      $this->_as,
      $value,
      $this->_arrow,
      $this->_value,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasKey(): bool {
    return !$this->_key->isMissing();
  }

  /**
   * @return FunctionCallExpression | ListExpression |
   * MemberSelectionExpression | Missing | PrefixUnaryExpression |
   * ScopeResolutionExpression | SubscriptExpression | NameToken |
   * VariableExpression
   */
  public function getKey(): ?EditableNode {
    if ($this->_key->isMissing()) {
      return null;
    }
    \assert($this->_key instanceof EditableNode);
    return $this->_key;
  }

  /**
   * @return FunctionCallExpression | ListExpression |
   * MemberSelectionExpression | PrefixUnaryExpression |
   * ScopeResolutionExpression | SubscriptExpression | NameToken |
   * VariableExpression
   */
  public function getKeyx(): EditableNode {
    \assert($this->_key instanceof EditableNode);
    return $this->_key;
  }

  public function getArrowUNTYPED(): EditableNode {
    return $this->_arrow;
  }

  /**
   * @return static
   */
  public function withArrow(EditableNode $value) {
    if ($value === $this->_arrow) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_collection,
      $this->_await_keyword,
      $this->_as,
      $this->_key,
      $value,
      $this->_value,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasArrow(): bool {
    return !$this->_arrow->isMissing();
  }

  /**
   * @return null | EqualGreaterThanToken
   */
  public function getArrow(): ?EqualGreaterThanToken {
    if ($this->_arrow->isMissing()) {
      return null;
    }
    \assert($this->_arrow instanceof EqualGreaterThanToken);
    return $this->_arrow;
  }

  /**
   * @return EqualGreaterThanToken
   */
  public function getArrowx(): EqualGreaterThanToken {
    \assert($this->_arrow instanceof EqualGreaterThanToken);
    return $this->_arrow;
  }

  public function getValueUNTYPED(): EditableNode {
    return $this->_value;
  }

  /**
   * @return static
   */
  public function withValue(EditableNode $value) {
    if ($value === $this->_value) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_collection,
      $this->_await_keyword,
      $this->_as,
      $this->_key,
      $this->_arrow,
      $value,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasValue(): bool {
    return !$this->_value->isMissing();
  }

  /**
   * @return FunctionCallExpression | ListExpression |
   * MemberSelectionExpression | PrefixUnaryExpression |
   * ScopeResolutionExpression | SubscriptExpression | NameToken |
   * VariableExpression
   */
  public function getValue(): EditableNode {
    \assert($this->_value instanceof EditableNode);
    return $this->_value;
  }

  /**
   * @return FunctionCallExpression | ListExpression |
   * MemberSelectionExpression | PrefixUnaryExpression |
   * ScopeResolutionExpression | SubscriptExpression | NameToken |
   * VariableExpression
   */
  public function getValuex(): EditableNode {
    return $this->getValue();
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
      $this->_keyword,
      $this->_left_paren,
      $this->_collection,
      $this->_await_keyword,
      $this->_as,
      $this->_key,
      $this->_arrow,
      $this->_value,
      $value,
      $this->_body
    );
  }

  public function hasRightParen(): bool {
    return !$this->_right_paren->isMissing();
  }

  /**
   * @return RightParenToken
   */
  public function getRightParen(): RightParenToken {
    \assert($this->_right_paren instanceof RightParenToken);
    return $this->_right_paren;
  }

  /**
   * @return RightParenToken
   */
  public function getRightParenx(): RightParenToken {
    return $this->getRightParen();
  }

  public function getBodyUNTYPED(): EditableNode {
    return $this->_body;
  }

  /**
   * @return static
   */
  public function withBody(EditableNode $value) {
    if ($value === $this->_body) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_collection,
      $this->_await_keyword,
      $this->_as,
      $this->_key,
      $this->_arrow,
      $this->_value,
      $this->_right_paren,
      $value
    );
  }

  public function hasBody(): bool {
    return !$this->_body->isMissing();
  }

  /**
   * @return AlternateLoopStatement | CompoundStatement | EchoStatement |
   * ExpressionStatement | ForeachStatement
   */
  public function getBody(): EditableNode {
    \assert($this->_body instanceof EditableNode);
    return $this->_body;
  }

  /**
   * @return AlternateLoopStatement | CompoundStatement | EchoStatement |
   * ExpressionStatement | ForeachStatement
   */
  public function getBodyx(): EditableNode {
    return $this->getBody();
  }
}
