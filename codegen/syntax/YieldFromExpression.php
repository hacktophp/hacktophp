<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<00647d20bf77b9010554b131680a31a1>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class YieldFromExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_yield_keyword;
  /**
   * @var EditableNode
   */
  private $_from_keyword;
  /**
   * @var EditableNode
   */
  private $_operand;

  public function __construct(
    EditableNode $yield_keyword,
    EditableNode $from_keyword,
    EditableNode $operand
  ) {
    parent::__construct('yield_from_expression');
    $this->_yield_keyword = $yield_keyword;
    $this->_from_keyword = $from_keyword;
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
    $yield_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['yield_from_yield_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $yield_keyword->getWidth();
    $from_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['yield_from_from_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $from_keyword->getWidth();
    $operand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['yield_from_operand'],
      $file,
      $offset,
      $source
    );
    $offset += $operand->getWidth();
    return new static($yield_keyword, $from_keyword, $operand);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'yield_keyword' => $this->_yield_keyword,
      'from_keyword' => $this->_from_keyword,
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
    $yield_keyword = $this->_yield_keyword->rewrite($rewriter, $parents);
    $from_keyword = $this->_from_keyword->rewrite($rewriter, $parents);
    $operand = $this->_operand->rewrite($rewriter, $parents);
    if (
      $yield_keyword === $this->_yield_keyword &&
      $from_keyword === $this->_from_keyword &&
      $operand === $this->_operand
    ) {
      return $this;
    }
    return new static($yield_keyword, $from_keyword, $operand);
  }

  public function getYieldKeywordUNTYPED(): EditableNode {
    return $this->_yield_keyword;
  }

  /**
   * @return static
   */
  public function withYieldKeyword(EditableNode $value) {
    if ($value === $this->_yield_keyword) {
      return $this;
    }
    return new static($value, $this->_from_keyword, $this->_operand);
  }

  public function hasYieldKeyword(): bool {
    return !$this->_yield_keyword->isMissing();
  }

  /**
   * @return YieldToken
   */
  public function getYieldKeyword(): YieldToken {
    \assert($this->_yield_keyword instanceof YieldToken);
    return $this->_yield_keyword;
  }

  /**
   * @return YieldToken
   */
  public function getYieldKeywordx(): YieldToken {
    return $this->getYieldKeyword();
  }

  public function getFromKeywordUNTYPED(): EditableNode {
    return $this->_from_keyword;
  }

  /**
   * @return static
   */
  public function withFromKeyword(EditableNode $value) {
    if ($value === $this->_from_keyword) {
      return $this;
    }
    return new static($this->_yield_keyword, $value, $this->_operand);
  }

  public function hasFromKeyword(): bool {
    return !$this->_from_keyword->isMissing();
  }

  /**
   * @return FromToken
   */
  public function getFromKeyword(): FromToken {
    \assert($this->_from_keyword instanceof FromToken);
    return $this->_from_keyword;
  }

  /**
   * @return FromToken
   */
  public function getFromKeywordx(): FromToken {
    return $this->getFromKeyword();
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
    return new static($this->_yield_keyword, $this->_from_keyword, $value);
  }

  public function hasOperand(): bool {
    return !$this->_operand->isMissing();
  }

  /**
   * @return ArrayCreationExpression | FunctionCallExpression |
   * LiteralExpression | ParenthesizedExpression | VariableExpression
   */
  public function getOperand(): EditableNode {
    \assert($this->_operand instanceof EditableNode);
    return $this->_operand;
  }

  /**
   * @return ArrayCreationExpression | FunctionCallExpression |
   * LiteralExpression | ParenthesizedExpression | VariableExpression
   */
  public function getOperandx(): EditableNode {
    return $this->getOperand();
  }
}
