<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4631f5bb8f95d42c329389474931b0f3>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class DecoratedExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_decorator;
  /**
   * @var EditableNode
   */
  private $_expression;

  public function __construct(
    EditableNode $decorator,
    EditableNode $expression
  ) {
    parent::__construct('decorated_expression');
    $this->_decorator = $decorator;
    $this->_expression = $expression;
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
    $decorator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['decorated_expression_decorator'],
      $file,
      $offset,
      $source
    );
    $offset += $decorator->getWidth();
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['decorated_expression_expression'],
      $file,
      $offset,
      $source
    );
    $offset += $expression->getWidth();
    return new static($decorator, $expression);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'decorator' => $this->_decorator,
      'expression' => $this->_expression,
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
    $decorator = $this->_decorator->rewrite($rewriter, $parents);
    $expression = $this->_expression->rewrite($rewriter, $parents);
    if (
      $decorator === $this->_decorator && $expression === $this->_expression
    ) {
      return $this;
    }
    return new static($decorator, $expression);
  }

  public function getDecoratorUNTYPED(): EditableNode {
    return $this->_decorator;
  }

  /**
   * @return static
   */
  public function withDecorator(EditableNode $value) {
    if ($value === $this->_decorator) {
      return $this;
    }
    return new static($value, $this->_expression);
  }

  public function hasDecorator(): bool {
    return !$this->_decorator->isMissing();
  }

  /**
   * @return AmpersandToken | DotDotDotToken | InoutToken
   */
  public function getDecorator(): EditableToken {
    \assert($this->_decorator instanceof EditableToken);
    return $this->_decorator;
  }

  /**
   * @return AmpersandToken | DotDotDotToken | InoutToken
   */
  public function getDecoratorx(): EditableToken {
    return $this->getDecorator();
  }

  public function getExpressionUNTYPED(): EditableNode {
    return $this->_expression;
  }

  /**
   * @return static
   */
  public function withExpression(EditableNode $value) {
    if ($value === $this->_expression) {
      return $this;
    }
    return new static($this->_decorator, $value);
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @return ArrayCreationExpression | ArrayIntrinsicExpression |
   * DecoratedExpression | FunctionCallExpression | ScopeResolutionExpression |
   * SubscriptExpression | VariableToken | VariableExpression
   */
  public function getExpression(): EditableNode {
    \assert($this->_expression instanceof EditableNode);
    return $this->_expression;
  }

  /**
   * @return ArrayCreationExpression | ArrayIntrinsicExpression |
   * DecoratedExpression | FunctionCallExpression | ScopeResolutionExpression |
   * SubscriptExpression | VariableToken | VariableExpression
   */
  public function getExpressionx(): EditableNode {
    return $this->getExpression();
  }
}
