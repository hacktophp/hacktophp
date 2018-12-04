<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<23b0ec3cd1d7b9ae07b8ce5b25dfad83>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class ElementInitializer extends EditableNode {

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

  public function __construct(
    EditableNode $key,
    EditableNode $arrow,
    EditableNode $value
  ) {
    parent::__construct('element_initializer');
    $this->_key = $key;
    $this->_arrow = $arrow;
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
    $key = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['element_key'],
      $file,
      $offset,
      $source
    );
    $offset += $key->getWidth();
    $arrow = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['element_arrow'],
      $file,
      $offset,
      $source
    );
    $offset += $arrow->getWidth();
    $value = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['element_value'],
      $file,
      $offset,
      $source
    );
    $offset += $value->getWidth();
    return new static($key, $arrow, $value);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'key' => $this->_key,
      'arrow' => $this->_arrow,
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
    $key = $this->_key->rewrite($rewriter, $parents);
    $arrow = $this->_arrow->rewrite($rewriter, $parents);
    $value = $this->_value->rewrite($rewriter, $parents);
    if (
      $key === $this->_key &&
      $arrow === $this->_arrow &&
      $value === $this->_value
    ) {
      return $this;
    }
    return new static($key, $arrow, $value);
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
    return new static($value, $this->_arrow, $this->_value);
  }

  public function hasKey(): bool {
    return !$this->_key->isMissing();
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
   * CollectionLiteralExpression | DictionaryIntrinsicExpression |
   * FunctionCallExpression | KeysetIntrinsicExpression | LiteralExpression |
   * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
   * | QualifiedName | ScopeResolutionExpression | NameToken |
   * VariableExpression | VectorIntrinsicExpression
   */
  public function getKey(): EditableNode {
    \assert($this->_key instanceof EditableNode);
    return $this->_key;
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
   * CollectionLiteralExpression | DictionaryIntrinsicExpression |
   * FunctionCallExpression | KeysetIntrinsicExpression | LiteralExpression |
   * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
   * | QualifiedName | ScopeResolutionExpression | NameToken |
   * VariableExpression | VectorIntrinsicExpression
   */
  public function getKeyx(): EditableNode {
    return $this->getKey();
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
    return new static($this->_key, $value, $this->_value);
  }

  public function hasArrow(): bool {
    return !$this->_arrow->isMissing();
  }

  /**
   * @return EqualGreaterThanToken
   */
  public function getArrow(): EqualGreaterThanToken {
    \assert($this->_arrow instanceof EqualGreaterThanToken);
    return $this->_arrow;
  }

  /**
   * @return EqualGreaterThanToken
   */
  public function getArrowx(): EqualGreaterThanToken {
    return $this->getArrow();
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
    return new static($this->_key, $this->_arrow, $value);
  }

  public function hasValue(): bool {
    return !$this->_value->isMissing();
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
   * CollectionLiteralExpression | ConditionalExpression |
   * DarrayIntrinsicExpression | DictionaryIntrinsicExpression |
   * FunctionCallExpression | IssetExpression | KeysetIntrinsicExpression |
   * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
   * ParenthesizedExpression | PrefixUnaryExpression | QualifiedName |
   * ScopeResolutionExpression | SubscriptExpression | NameToken |
   * TupleExpression | VariableExpression | VarrayIntrinsicExpression |
   * VectorIntrinsicExpression
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
   * FunctionCallExpression | IssetExpression | KeysetIntrinsicExpression |
   * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
   * ParenthesizedExpression | PrefixUnaryExpression | QualifiedName |
   * ScopeResolutionExpression | SubscriptExpression | NameToken |
   * TupleExpression | VariableExpression | VarrayIntrinsicExpression |
   * VectorIntrinsicExpression
   */
  public function getValuex(): EditableNode {
    return $this->getValue();
  }
}
