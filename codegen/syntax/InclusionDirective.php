<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<83a55a9df91186c9e378cc690d403865>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class InclusionDirective extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_expression;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $expression,
    EditableNode $semicolon
  ) {
    parent::__construct('inclusion_directive');
    $this->_expression = $expression;
    $this->_semicolon = $semicolon;
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
      /* UNSAFE_EXPR */ $json['inclusion_expression'],
      $file,
      $offset,
      $source
    );
    $offset += $expression->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['inclusion_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($expression, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'expression' => $this->_expression,
      'semicolon' => $this->_semicolon,
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
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $expression === $this->_expression && $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($expression, $semicolon);
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
    return new static($value, $this->_semicolon);
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @return InclusionExpression
   */
  public function getExpression(): InclusionExpression {
    \assert($this->_expression instanceof InclusionExpression);
    return $this->_expression;
  }

  /**
   * @return InclusionExpression
   */
  public function getExpressionx(): InclusionExpression {
    return $this->getExpression();
  }

  public function getSemicolonUNTYPED(): EditableNode {
    return $this->_semicolon;
  }

  /**
   * @return static
   */
  public function withSemicolon(EditableNode $value) {
    if ($value === $this->_semicolon) {
      return $this;
    }
    return new static($this->_expression, $value);
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @return SemicolonToken
   */
  public function getSemicolon(): SemicolonToken {
    \assert($this->_semicolon instanceof SemicolonToken);
    return $this->_semicolon;
  }

  /**
   * @return SemicolonToken
   */
  public function getSemicolonx(): SemicolonToken {
    return $this->getSemicolon();
  }
}
