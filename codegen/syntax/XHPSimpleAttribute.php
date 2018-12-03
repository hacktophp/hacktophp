<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<44bf35f6a4e060c8e778f6029be67c1a>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class XHPSimpleAttribute extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_equal;
  /**
   * @var EditableNode
   */
  private $_expression;

  public function __construct(
    EditableNode $name,
    EditableNode $equal,
    EditableNode $expression
  ) {
    parent::__construct('xhp_simple_attribute');
    $this->_name = $name;
    $this->_equal = $equal;
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
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_simple_attribute_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $equal = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_simple_attribute_equal'],
      $file,
      $offset,
      $source
    );
    $offset += $equal->getWidth();
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_simple_attribute_expression'],
      $file,
      $offset,
      $source
    );
    $offset += $expression->getWidth();
    return new static($name, $equal, $expression);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'name' => $this->_name,
      'equal' => $this->_equal,
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
    $name = $this->_name->rewrite($rewriter, $parents);
    $equal = $this->_equal->rewrite($rewriter, $parents);
    $expression = $this->_expression->rewrite($rewriter, $parents);
    if (
      $name === $this->_name &&
      $equal === $this->_equal &&
      $expression === $this->_expression
    ) {
      return $this;
    }
    return new static($name, $equal, $expression);
  }

  public function getNameUNTYPED(): EditableNode {
    return $this->_name;
  }

  /**
   * @return static
   */
  public function withName(EditableNode $value) {
    if ($value === $this->_name) {
      return $this;
    }
    return new static($value, $this->_equal, $this->_expression);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @returns XHPElementNameToken
   */
  public function getName(): XHPElementNameToken {
    return TypeAssert\instance_of(XHPElementNameToken::class, $this->_name);
  }

  /**
   * @returns XHPElementNameToken
   */
  public function getNamex(): XHPElementNameToken {
    return $this->getName();
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
    return new static($this->_name, $value, $this->_expression);
  }

  public function hasEqual(): bool {
    return !$this->_equal->isMissing();
  }

  /**
   * @returns EqualToken
   */
  public function getEqual(): EqualToken {
    return TypeAssert\instance_of(EqualToken::class, $this->_equal);
  }

  /**
   * @returns EqualToken
   */
  public function getEqualx(): EqualToken {
    return $this->getEqual();
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
    return new static($this->_name, $this->_equal, $value);
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @returns BracedExpression | XHPStringLiteralToken
   */
  public function getExpression(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_expression);
  }

  /**
   * @returns BracedExpression | XHPStringLiteralToken
   */
  public function getExpressionx(): EditableNode {
    return $this->getExpression();
  }
}
