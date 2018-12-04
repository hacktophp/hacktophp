<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<eb6b6e673a313df22fe6711c08c9ed7b>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class UsingStatementBlockScoped extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_await_keyword;
  /**
   * @var EditableNode
   */
  private $_using_keyword;
  /**
   * @var EditableNode
   */
  private $_left_paren;
  /**
   * @var EditableNode
   */
  private $_expressions;
  /**
   * @var EditableNode
   */
  private $_right_paren;
  /**
   * @var EditableNode
   */
  private $_body;

  public function __construct(
    EditableNode $await_keyword,
    EditableNode $using_keyword,
    EditableNode $left_paren,
    EditableNode $expressions,
    EditableNode $right_paren,
    EditableNode $body
  ) {
    parent::__construct('using_statement_block_scoped');
    $this->_await_keyword = $await_keyword;
    $this->_using_keyword = $using_keyword;
    $this->_left_paren = $left_paren;
    $this->_expressions = $expressions;
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
    $await_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['using_block_await_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $await_keyword->getWidth();
    $using_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['using_block_using_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $using_keyword->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['using_block_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $expressions = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['using_block_expressions'],
      $file,
      $offset,
      $source
    );
    $offset += $expressions->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['using_block_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    $body = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['using_block_body'],
      $file,
      $offset,
      $source
    );
    $offset += $body->getWidth();
    return new static(
      $await_keyword,
      $using_keyword,
      $left_paren,
      $expressions,
      $right_paren,
      $body
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'await_keyword' => $this->_await_keyword,
      'using_keyword' => $this->_using_keyword,
      'left_paren' => $this->_left_paren,
      'expressions' => $this->_expressions,
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
    $await_keyword = $this->_await_keyword->rewrite($rewriter, $parents);
    $using_keyword = $this->_using_keyword->rewrite($rewriter, $parents);
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $expressions = $this->_expressions->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    $body = $this->_body->rewrite($rewriter, $parents);
    if (
      $await_keyword === $this->_await_keyword &&
      $using_keyword === $this->_using_keyword &&
      $left_paren === $this->_left_paren &&
      $expressions === $this->_expressions &&
      $right_paren === $this->_right_paren &&
      $body === $this->_body
    ) {
      return $this;
    }
    return new static(
      $await_keyword,
      $using_keyword,
      $left_paren,
      $expressions,
      $right_paren,
      $body
    );
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
      $value,
      $this->_using_keyword,
      $this->_left_paren,
      $this->_expressions,
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

  public function getUsingKeywordUNTYPED(): EditableNode {
    return $this->_using_keyword;
  }

  /**
   * @return static
   */
  public function withUsingKeyword(EditableNode $value) {
    if ($value === $this->_using_keyword) {
      return $this;
    }
    return new static(
      $this->_await_keyword,
      $value,
      $this->_left_paren,
      $this->_expressions,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasUsingKeyword(): bool {
    return !$this->_using_keyword->isMissing();
  }

  /**
   * @return UsingToken
   */
  public function getUsingKeyword(): UsingToken {
    \assert($this->_using_keyword instanceof UsingToken);
    return $this->_using_keyword;
  }

  /**
   * @return UsingToken
   */
  public function getUsingKeywordx(): UsingToken {
    return $this->getUsingKeyword();
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
      $this->_await_keyword,
      $this->_using_keyword,
      $value,
      $this->_expressions,
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

  public function getExpressionsUNTYPED(): EditableNode {
    return $this->_expressions;
  }

  /**
   * @return static
   */
  public function withExpressions(EditableNode $value) {
    if ($value === $this->_expressions) {
      return $this;
    }
    return new static(
      $this->_await_keyword,
      $this->_using_keyword,
      $this->_left_paren,
      $value,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasExpressions(): bool {
    return !$this->_expressions->isMissing();
  }

  /**
   * @return EditableList<AnonymousFunction> | EditableList<BinaryExpression>
   * | EditableList<LambdaExpression> | EditableList<LiteralExpression> |
   * EditableList<ObjectCreationExpression> | EditableList<EditableNode> |
   * EditableList<PrefixUnaryExpression> | EditableList<VariableExpression>
   */
  public function getExpressions(): EditableList {
    \assert($this->_expressions instanceof EditableList);
    return $this->_expressions;
  }

  /**
   * @return EditableList<AnonymousFunction> | EditableList<BinaryExpression>
   * | EditableList<LambdaExpression> | EditableList<LiteralExpression> |
   * EditableList<ObjectCreationExpression> | EditableList<EditableNode> |
   * EditableList<PrefixUnaryExpression> | EditableList<VariableExpression>
   */
  public function getExpressionsx(): EditableList {
    return $this->getExpressions();
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
      $this->_await_keyword,
      $this->_using_keyword,
      $this->_left_paren,
      $this->_expressions,
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
      $this->_await_keyword,
      $this->_using_keyword,
      $this->_left_paren,
      $this->_expressions,
      $this->_right_paren,
      $value
    );
  }

  public function hasBody(): bool {
    return !$this->_body->isMissing();
  }

  /**
   * @return CompoundStatement
   */
  public function getBody(): CompoundStatement {
    \assert($this->_body instanceof CompoundStatement);
    return $this->_body;
  }

  /**
   * @return CompoundStatement
   */
  public function getBodyx(): CompoundStatement {
    return $this->getBody();
  }
}
