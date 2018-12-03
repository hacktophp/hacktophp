<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<32a406ddb605e6d4e369f6ff14f90774>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class XHPSpreadAttribute extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_brace;
  /**
   * @var EditableNode
   */
  private $_spread_operator;
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
    EditableNode $spread_operator,
    EditableNode $expression,
    EditableNode $right_brace
  ) {
    parent::__construct('xhp_spread_attribute');
    $this->_left_brace = $left_brace;
    $this->_spread_operator = $spread_operator;
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
      /* UNSAFE_EXPR */ $json['xhp_spread_attribute_left_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $left_brace->getWidth();
    $spread_operator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_spread_attribute_spread_operator'],
      $file,
      $offset,
      $source
    );
    $offset += $spread_operator->getWidth();
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_spread_attribute_expression'],
      $file,
      $offset,
      $source
    );
    $offset += $expression->getWidth();
    $right_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_spread_attribute_right_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $right_brace->getWidth();
    return new static($left_brace, $spread_operator, $expression, $right_brace);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_brace' => $this->_left_brace,
      'spread_operator' => $this->_spread_operator,
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
    $spread_operator = $this->_spread_operator->rewrite($rewriter, $parents);
    $expression = $this->_expression->rewrite($rewriter, $parents);
    $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
    if (
      $left_brace === $this->_left_brace &&
      $spread_operator === $this->_spread_operator &&
      $expression === $this->_expression &&
      $right_brace === $this->_right_brace
    ) {
      return $this;
    }
    return new static($left_brace, $spread_operator, $expression, $right_brace);
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
      $value,
      $this->_spread_operator,
      $this->_expression,
      $this->_right_brace
    );
  }

  public function hasLeftBrace(): bool {
    return !$this->_left_brace->isMissing();
  }

  /**
   * @return LeftBraceToken
   */
  public function getLeftBrace(): LeftBraceToken {
    \assert($this->_left_brace instanceof LeftBraceToken);
    return $this->_left_brace;
  }

  /**
   * @return LeftBraceToken
   */
  public function getLeftBracex(): LeftBraceToken {
    return $this->getLeftBrace();
  }

  public function getSpreadOperatorUNTYPED(): EditableNode {
    return $this->_spread_operator;
  }

  /**
   * @return static
   */
  public function withSpreadOperator(EditableNode $value) {
    if ($value === $this->_spread_operator) {
      return $this;
    }
    return new static(
      $this->_left_brace,
      $value,
      $this->_expression,
      $this->_right_brace
    );
  }

  public function hasSpreadOperator(): bool {
    return !$this->_spread_operator->isMissing();
  }

  /**
   * @return DotDotDotToken
   */
  public function getSpreadOperator(): DotDotDotToken {
    return
      TypeAssert\instance_of(DotDotDotToken::class, $this->_spread_operator);
  }

  /**
   * @return DotDotDotToken
   */
  public function getSpreadOperatorx(): DotDotDotToken {
    return $this->getSpreadOperator();
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
    return new static(
      $this->_left_brace,
      $this->_spread_operator,
      $value,
      $this->_right_brace
    );
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @return VariableExpression | XHPExpression
   */
  public function getExpression(): EditableNode {
    \assert($this->_expression instanceof EditableNode);
    return $this->_expression;
  }

  /**
   * @return VariableExpression | XHPExpression
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
    return new static(
      $this->_left_brace,
      $this->_spread_operator,
      $this->_expression,
      $value
    );
  }

  public function hasRightBrace(): bool {
    return !$this->_right_brace->isMissing();
  }

  /**
   * @return RightBraceToken
   */
  public function getRightBrace(): RightBraceToken {
    \assert($this->_right_brace instanceof RightBraceToken);
    return $this->_right_brace;
  }

  /**
   * @return RightBraceToken
   */
  public function getRightBracex(): RightBraceToken {
    return $this->getRightBrace();
  }
}
