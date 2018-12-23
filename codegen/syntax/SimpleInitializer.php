<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d13ceb1786a12012ae19e4eb23d7925a>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class SimpleInitializer extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_equal;
  /**
   * @var EditableNode
   */
  private $_value;

  public function __construct(EditableNode $equal, EditableNode $value) {
    parent::__construct('simple_initializer');
    $this->_equal = $equal;
    $this->_value = $value;
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
    $equal = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['simple_initializer_equal'],
      $file,
      $offset,
      $source
    );
    $offset += $equal->getWidth();
    $value = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['simple_initializer_value'],
      $file,
      $offset,
      $source
    );
    $offset += $value->getWidth();
    return new static($equal, $value);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'equal' => $this->_equal,
      'value' => $this->_value,
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
    $equal = $this->_equal->rewrite($rewriter, $parents);
    $value = $this->_value->rewrite($rewriter, $parents);
    if ($equal === $this->_equal && $value === $this->_value) {
      return $this;
    }
    return new static($equal, $value);
  }

  public function getEqualUNTYPED(): EditableNode {
    return $this->_equal;
  }

  /**
   * @return static
   */
  public function withEqual(EditableNode $value) {
    if ($value === $this->_equal) {
      return $this;
    }
    return new static($value, $this->_value);
  }

  public function hasEqual(): bool {
    return !$this->_equal->isMissing();
  }

  /**
   * @return EqualToken
   */
  public function getEqual(): EqualToken {
    \assert($this->_equal instanceof EqualToken);
    return $this->_equal;
  }

  /**
   * @return EqualToken
   */
  public function getEqualx(): EqualToken {
    return $this->getEqual();
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
    return new static($this->_equal, $value);
  }

  public function hasValue(): bool {
    return !$this->_value->isMissing();
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
   * CollectionLiteralExpression | ConditionalExpression |
   * DarrayIntrinsicExpression | DictionaryIntrinsicExpression |
   * FunctionCallExpression | KeysetIntrinsicExpression | LambdaExpression |
   * LiteralExpression | ObjectCreationExpression | ParenthesizedExpression |
   * PrefixUnaryExpression | QualifiedName | ScopeResolutionExpression |
   * ShapeExpression | SubscriptExpression | NameToken | TupleExpression |
   * VariableExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression
   * | XHPExpression
   */
  public function getValue(): EditableNode {
    \assert($this->_value instanceof EditableNode);
    return $this->_value;
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
   * CollectionLiteralExpression | ConditionalExpression |
   * DarrayIntrinsicExpression | DictionaryIntrinsicExpression |
   * FunctionCallExpression | KeysetIntrinsicExpression | LambdaExpression |
   * LiteralExpression | ObjectCreationExpression | ParenthesizedExpression |
   * PrefixUnaryExpression | QualifiedName | ScopeResolutionExpression |
   * ShapeExpression | SubscriptExpression | NameToken | TupleExpression |
   * VariableExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression
   * | XHPExpression
   */
  public function getValuex(): EditableNode {
    return $this->getValue();
  }
}
