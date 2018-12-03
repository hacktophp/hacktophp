<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<948770ddde2618e0d8218a85cd0d3823>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class LambdaExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_attribute_spec;
  /**
   * @var EditableNode
   */
  private $_async;
  /**
   * @var EditableNode
   */
  private $_coroutine;
  /**
   * @var EditableNode
   */
  private $_signature;
  /**
   * @var EditableNode
   */
  private $_arrow;
  /**
   * @var EditableNode
   */
  private $_body;

  public function __construct(
    EditableNode $attribute_spec,
    EditableNode $async,
    EditableNode $coroutine,
    EditableNode $signature,
    EditableNode $arrow,
    EditableNode $body
  ) {
    parent::__construct('lambda_expression');
    $this->_attribute_spec = $attribute_spec;
    $this->_async = $async;
    $this->_coroutine = $coroutine;
    $this->_signature = $signature;
    $this->_arrow = $arrow;
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
    $attribute_spec = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['lambda_attribute_spec'],
      $file,
      $offset,
      $source
    );
    $offset += $attribute_spec->getWidth();
    $async = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['lambda_async'],
      $file,
      $offset,
      $source
    );
    $offset += $async->getWidth();
    $coroutine = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['lambda_coroutine'],
      $file,
      $offset,
      $source
    );
    $offset += $coroutine->getWidth();
    $signature = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['lambda_signature'],
      $file,
      $offset,
      $source
    );
    $offset += $signature->getWidth();
    $arrow = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['lambda_arrow'],
      $file,
      $offset,
      $source
    );
    $offset += $arrow->getWidth();
    $body = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['lambda_body'],
      $file,
      $offset,
      $source
    );
    $offset += $body->getWidth();
    return new static(
      $attribute_spec,
      $async,
      $coroutine,
      $signature,
      $arrow,
      $body
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'attribute_spec' => $this->_attribute_spec,
      'async' => $this->_async,
      'coroutine' => $this->_coroutine,
      'signature' => $this->_signature,
      'arrow' => $this->_arrow,
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
    $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
    $async = $this->_async->rewrite($rewriter, $parents);
    $coroutine = $this->_coroutine->rewrite($rewriter, $parents);
    $signature = $this->_signature->rewrite($rewriter, $parents);
    $arrow = $this->_arrow->rewrite($rewriter, $parents);
    $body = $this->_body->rewrite($rewriter, $parents);
    if (
      $attribute_spec === $this->_attribute_spec &&
      $async === $this->_async &&
      $coroutine === $this->_coroutine &&
      $signature === $this->_signature &&
      $arrow === $this->_arrow &&
      $body === $this->_body
    ) {
      return $this;
    }
    return new static(
      $attribute_spec,
      $async,
      $coroutine,
      $signature,
      $arrow,
      $body
    );
  }

  public function getAttributeSpecUNTYPED(): EditableNode {
    return $this->_attribute_spec;
  }

  /**
   * @return static
   */
  public function withAttributeSpec(EditableNode $value) {
    if ($value === $this->_attribute_spec) {
      return $this;
    }
    return new static(
      $value,
      $this->_async,
      $this->_coroutine,
      $this->_signature,
      $this->_arrow,
      $this->_body
    );
  }

  public function hasAttributeSpec(): bool {
    return !$this->_attribute_spec->isMissing();
  }

  /**
   * @returns AttributeSpecification | Missing
   */
  public function getAttributeSpec(): ?AttributeSpecification {
    if ($this->_attribute_spec->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(
      AttributeSpecification::class,
      $this->_attribute_spec
    );
  }

  /**
   * @returns AttributeSpecification
   */
  public function getAttributeSpecx(): AttributeSpecification {
    return TypeAssert\instance_of(
      AttributeSpecification::class,
      $this->_attribute_spec
    );
  }

  public function getAsyncUNTYPED(): EditableNode {
    return $this->_async;
  }

  /**
   * @return static
   */
  public function withAsync(EditableNode $value) {
    if ($value === $this->_async) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $value,
      $this->_coroutine,
      $this->_signature,
      $this->_arrow,
      $this->_body
    );
  }

  public function hasAsync(): bool {
    return !$this->_async->isMissing();
  }

  /**
   * @returns Missing | AsyncToken
   */
  public function getAsync(): ?AsyncToken {
    if ($this->_async->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(AsyncToken::class, $this->_async);
  }

  /**
   * @returns AsyncToken
   */
  public function getAsyncx(): AsyncToken {
    return TypeAssert\instance_of(AsyncToken::class, $this->_async);
  }

  public function getCoroutineUNTYPED(): EditableNode {
    return $this->_coroutine;
  }

  /**
   * @return static
   */
  public function withCoroutine(EditableNode $value) {
    if ($value === $this->_coroutine) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $this->_async,
      $value,
      $this->_signature,
      $this->_arrow,
      $this->_body
    );
  }

  public function hasCoroutine(): bool {
    return !$this->_coroutine->isMissing();
  }

  /**
   * @returns Missing | CoroutineToken
   */
  public function getCoroutine(): ?CoroutineToken {
    if ($this->_coroutine->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(CoroutineToken::class, $this->_coroutine);
  }

  /**
   * @returns CoroutineToken
   */
  public function getCoroutinex(): CoroutineToken {
    return TypeAssert\instance_of(CoroutineToken::class, $this->_coroutine);
  }

  public function getSignatureUNTYPED(): EditableNode {
    return $this->_signature;
  }

  /**
   * @return static
   */
  public function withSignature(EditableNode $value) {
    if ($value === $this->_signature) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $this->_async,
      $this->_coroutine,
      $value,
      $this->_arrow,
      $this->_body
    );
  }

  public function hasSignature(): bool {
    return !$this->_signature->isMissing();
  }

  /**
   * @returns LambdaSignature | VariableToken
   */
  public function getSignature(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_signature);
  }

  /**
   * @returns LambdaSignature | VariableToken
   */
  public function getSignaturex(): EditableNode {
    return $this->getSignature();
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
      $this->_attribute_spec,
      $this->_async,
      $this->_coroutine,
      $this->_signature,
      $value,
      $this->_body
    );
  }

  public function hasArrow(): bool {
    return !$this->_arrow->isMissing();
  }

  /**
   * @returns EqualEqualGreaterThanToken
   */
  public function getArrow(): EqualEqualGreaterThanToken {
    return
      TypeAssert\instance_of(EqualEqualGreaterThanToken::class, $this->_arrow);
  }

  /**
   * @returns EqualEqualGreaterThanToken
   */
  public function getArrowx(): EqualEqualGreaterThanToken {
    return $this->getArrow();
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
      $this->_attribute_spec,
      $this->_async,
      $this->_coroutine,
      $this->_signature,
      $this->_arrow,
      $value
    );
  }

  public function hasBody(): bool {
    return !$this->_body->isMissing();
  }

  /**
   * @returns ArrayIntrinsicExpression | BinaryExpression | CastExpression |
   * CompoundStatement | ConditionalExpression | FunctionCallExpression |
   * LambdaExpression | LiteralExpression | MemberSelectionExpression |
   * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
   * | SubscriptExpression | VariableExpression
   */
  public function getBody(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_body);
  }

  /**
   * @returns ArrayIntrinsicExpression | BinaryExpression | CastExpression |
   * CompoundStatement | ConditionalExpression | FunctionCallExpression |
   * LambdaExpression | LiteralExpression | MemberSelectionExpression |
   * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
   * | SubscriptExpression | VariableExpression
   */
  public function getBodyx(): EditableNode {
    return $this->getBody();
  }
}
