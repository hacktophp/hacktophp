<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6aedcde9623d7eef999d29547c7e8136>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class EmbeddedBracedExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_brace;
  /**
   * @var EditableNode
   */
  private $_expression;
  /**
   * @var EditableNode
   */
  private $_right_brace;

  public function __construct(
    EditableNode $left_brace,
    EditableNode $expression,
    EditableNode $right_brace
  ) {
    parent::__construct('embedded_braced_expression');
    $this->_left_brace = $left_brace;
    $this->_expression = $expression;
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
    $left_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_braced_expression_left_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $left_brace->getWidth();
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_braced_expression_expression'],
      $file,
      $offset,
      $source
    );
    $offset += $expression->getWidth();
    $right_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_braced_expression_right_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $right_brace->getWidth();
    return new static($left_brace, $expression, $right_brace);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_brace' => $this->_left_brace,
      'expression' => $this->_expression,
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
    $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
    $expression = $this->_expression->rewrite($rewriter, $parents);
    $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
    if (
      $left_brace === $this->_left_brace &&
      $expression === $this->_expression &&
      $right_brace === $this->_right_brace
    ) {
      return $this;
    }
    return new static($left_brace, $expression, $right_brace);
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
    return new static($value, $this->_expression, $this->_right_brace);
  }

  public function hasLeftBrace(): bool {
    return !$this->_left_brace->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getLeftBrace(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_left_brace);
  }

  /**
   * @returns unknown
   */
  public function getLeftBracex(): EditableNode {
    return $this->getLeftBrace();
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
    return new static($this->_left_brace, $value, $this->_right_brace);
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
    return new static($this->_left_brace, $this->_expression, $value);
  }

  public function hasRightBrace(): bool {
    return !$this->_right_brace->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getRightBrace(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_right_brace);
  }

  /**
   * @returns unknown
   */
  public function getRightBracex(): EditableNode {
    return $this->getRightBrace();
  }
}
