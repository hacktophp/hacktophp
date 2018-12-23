<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<954899c7bb0796e80afe72c6330afc77>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class PipeVariableExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_expression;

  public function __construct(EditableNode $expression) {
    parent::__construct('pipe_variable_expression');
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
      /* UNSAFE_EXPR */ $json['pipe_variable_expression'],
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
   * @return unknown
   */
  public function getExpression(): EditableNode {
    \assert($this->_expression instanceof EditableNode);
    return $this->_expression;
  }

  /**
   * @return unknown
   */
  public function getExpressionx(): EditableNode {
    return $this->getExpression();
  }
}
