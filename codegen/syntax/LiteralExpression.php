<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5196b52bffd06ea799ab56d3e8da9dda>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class LiteralExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_expression;

  public function __construct(EditableNode $expression) {
    parent::__construct('literal_expression');
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
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['literal_expression'],
      $file,
      $offset,
      $source
    );
    $offset += $expression->getWidth();
    return new static($expression);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
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
    $expression = $this->_expression->rewrite($rewriter, $parents);
    if ($expression === $this->_expression) {
      return $this;
    }
    return new static($expression);
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
    return new static($value);
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getExpression(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_expression);
  }

  /**
   * @returns unknown
   */
  public function getExpressionx(): EditableNode {
    return $this->getExpression();
  }
}
