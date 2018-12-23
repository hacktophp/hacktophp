<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<bf6a4e3092776a7feb0cb3c285708c16>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class MarkupSection extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_prefix;
  /**
   * @var EditableNode
   */
  private $_text;
  /**
   * @var EditableNode
   */
  private $_suffix;
  /**
   * @var EditableNode
   */
  private $_expression;

  public function __construct(
    EditableNode $prefix,
    EditableNode $text,
    EditableNode $suffix,
    EditableNode $expression
  ) {
    parent::__construct('markup_section');
    $this->_prefix = $prefix;
    $this->_text = $text;
    $this->_suffix = $suffix;
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
    $prefix = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['markup_prefix'],
      $file,
      $offset,
      $source
    );
    $offset += $prefix->getWidth();
    $text = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['markup_text'],
      $file,
      $offset,
      $source
    );
    $offset += $text->getWidth();
    $suffix = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['markup_suffix'],
      $file,
      $offset,
      $source
    );
    $offset += $suffix->getWidth();
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['markup_expression'],
      $file,
      $offset,
      $source
    );
    $offset += $expression->getWidth();
    return new static($prefix, $text, $suffix, $expression);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'prefix' => $this->_prefix,
      'text' => $this->_text,
      'suffix' => $this->_suffix,
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
    $prefix = $this->_prefix->rewrite($rewriter, $parents);
    $text = $this->_text->rewrite($rewriter, $parents);
    $suffix = $this->_suffix->rewrite($rewriter, $parents);
    $expression = $this->_expression->rewrite($rewriter, $parents);
    if (
      $prefix === $this->_prefix &&
      $text === $this->_text &&
      $suffix === $this->_suffix &&
      $expression === $this->_expression
    ) {
      return $this;
    }
    return new static($prefix, $text, $suffix, $expression);
  }

  public function getPrefixUNTYPED(): EditableNode {
    return $this->_prefix;
  }

  /**
   * @return static
   */
  public function withPrefix(EditableNode $value) {
    if ($value === $this->_prefix) {
      return $this;
    }
    return new static($value, $this->_text, $this->_suffix, $this->_expression);
  }

  public function hasPrefix(): bool {
    return !$this->_prefix->isMissing();
  }

  /**
   * @return null | QuestionGreaterThanToken
   */
  public function getPrefix(): ?QuestionGreaterThanToken {
    if ($this->_prefix->isMissing()) {
      return null;
    }
    \assert($this->_prefix instanceof QuestionGreaterThanToken);
    return $this->_prefix;
  }

  /**
   * @return QuestionGreaterThanToken
   */
  public function getPrefixx(): QuestionGreaterThanToken {
    \assert($this->_prefix instanceof QuestionGreaterThanToken);
    return $this->_prefix;
  }

  public function getTextUNTYPED(): EditableNode {
    return $this->_text;
  }

  /**
   * @return static
   */
  public function withText(EditableNode $value) {
    if ($value === $this->_text) {
      return $this;
    }
    return
      new static($this->_prefix, $value, $this->_suffix, $this->_expression);
  }

  public function hasText(): bool {
    return !$this->_text->isMissing();
  }

  /**
   * @return null | MarkupToken
   */
  public function getText(): ?MarkupToken {
    if ($this->_text->isMissing()) {
      return null;
    }
    \assert($this->_text instanceof MarkupToken);
    return $this->_text;
  }

  /**
   * @return MarkupToken
   */
  public function getTextx(): MarkupToken {
    \assert($this->_text instanceof MarkupToken);
    return $this->_text;
  }

  public function getSuffixUNTYPED(): EditableNode {
    return $this->_suffix;
  }

  /**
   * @return static
   */
  public function withSuffix(EditableNode $value) {
    if ($value === $this->_suffix) {
      return $this;
    }
    return new static($this->_prefix, $this->_text, $value, $this->_expression);
  }

  public function hasSuffix(): bool {
    return !$this->_suffix->isMissing();
  }

  /**
   * @return MarkupSuffix | Missing
   */
  public function getSuffix(): ?MarkupSuffix {
    if ($this->_suffix->isMissing()) {
      return null;
    }
    \assert($this->_suffix instanceof MarkupSuffix);
    return $this->_suffix;
  }

  /**
   * @return MarkupSuffix
   */
  public function getSuffixx(): MarkupSuffix {
    \assert($this->_suffix instanceof MarkupSuffix);
    return $this->_suffix;
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
    return new static($this->_prefix, $this->_text, $this->_suffix, $value);
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @return ExpressionStatement | Missing
   */
  public function getExpression(): ?ExpressionStatement {
    if ($this->_expression->isMissing()) {
      return null;
    }
    \assert($this->_expression instanceof ExpressionStatement);
    return $this->_expression;
  }

  /**
   * @return ExpressionStatement
   */
  public function getExpressionx(): ExpressionStatement {
    \assert($this->_expression instanceof ExpressionStatement);
    return $this->_expression;
  }
}
