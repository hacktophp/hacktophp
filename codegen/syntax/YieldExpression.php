<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a26e1b549982cd290973e44d82f5e752>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class YieldExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_operand;

  public function __construct(EditableNode $keyword, EditableNode $operand) {
    parent::__construct('yield_expression');
    $this->_keyword = $keyword;
    $this->_operand = $operand;
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
      /* UNSAFE_EXPR */ $json['yield_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $operand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['yield_operand'],
      $file,
      $offset,
      $source
    );
    $offset += $operand->getWidth();
    return new static($keyword, $operand);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'operand' => $this->_operand,
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
    $operand = $this->_operand->rewrite($rewriter, $parents);
    if ($keyword === $this->_keyword && $operand === $this->_operand) {
      return $this;
    }
    return new static($keyword, $operand);
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
    return new static($value, $this->_operand);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return YieldToken
   */
  public function getKeyword(): YieldToken {
    \assert($this->_keyword instanceof YieldToken);
    return $this->_keyword;
  }

  /**
   * @return YieldToken
   */
  public function getKeywordx(): YieldToken {
    return $this->getKeyword();
  }

  public function getOperandUNTYPED(): EditableNode {
    return $this->_operand;
  }

  /**
   * @return static
   */
  public function withOperand(EditableNode $value) {
    if ($value === $this->_operand) {
      return $this;
    }
    return new static($this->_keyword, $value);
  }

  public function hasOperand(): bool {
    return !$this->_operand->isMissing();
  }

  /**
   * @return AnonymousFunction | BinaryExpression | ElementInitializer |
   * FunctionCallExpression | LambdaExpression | LiteralExpression |
   * MemberSelectionExpression | Missing | ObjectCreationExpression |
   * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
   * SubscriptExpression | BreakToken | NameToken | TupleExpression |
   * VariableExpression
   */
  public function getOperand(): ?EditableNode {
    if ($this->_operand->isMissing()) {
      return null;
    }
    \assert($this->_operand instanceof EditableNode);
    return $this->_operand;
  }

  /**
   * @return AnonymousFunction | BinaryExpression | ElementInitializer |
   * FunctionCallExpression | LambdaExpression | LiteralExpression |
   * MemberSelectionExpression | ObjectCreationExpression |
   * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
   * SubscriptExpression | BreakToken | NameToken | TupleExpression |
   * VariableExpression
   */
  public function getOperandx(): EditableNode {
    \assert($this->_operand instanceof EditableNode);
    return $this->_operand;
  }
}
