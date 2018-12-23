<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<63b1b67bd97ff9e9af6cb6751d821db6>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class XHPEnumType extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_optional;
  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_left_brace;
  /**
   * @var EditableNode
   */
  private $_values;
  /**
   * @var EditableNode
   */
  private $_right_brace;

  public function __construct(
    EditableNode $optional,
    EditableNode $keyword,
    EditableNode $left_brace,
    EditableNode $values,
    EditableNode $right_brace
  ) {
    parent::__construct('xhp_enum_type');
    $this->_optional = $optional;
    $this->_keyword = $keyword;
    $this->_left_brace = $left_brace;
    $this->_values = $values;
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
    $optional = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_enum_optional'],
      $file,
      $offset,
      $source
    );
    $offset += $optional->getWidth();
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_enum_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $left_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_enum_left_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $left_brace->getWidth();
    $values = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_enum_values'],
      $file,
      $offset,
      $source
    );
    $offset += $values->getWidth();
    $right_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_enum_right_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $right_brace->getWidth();
    return new static($optional, $keyword, $left_brace, $values, $right_brace);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'optional' => $this->_optional,
      'keyword' => $this->_keyword,
      'left_brace' => $this->_left_brace,
      'values' => $this->_values,
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
    $optional = $this->_optional->rewrite($rewriter, $parents);
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
    $values = $this->_values->rewrite($rewriter, $parents);
    $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
    if (
      $optional === $this->_optional &&
      $keyword === $this->_keyword &&
      $left_brace === $this->_left_brace &&
      $values === $this->_values &&
      $right_brace === $this->_right_brace
    ) {
      return $this;
    }
    return new static($optional, $keyword, $left_brace, $values, $right_brace);
  }

  public function getOptionalUNTYPED(): EditableNode {
    return $this->_optional;
  }

  /**
   * @return static
   */
  public function withOptional(EditableNode $value) {
    if ($value === $this->_optional) {
      return $this;
    }
    return new static(
      $value,
      $this->_keyword,
      $this->_left_brace,
      $this->_values,
      $this->_right_brace
    );
  }

  public function hasOptional(): bool {
    return !$this->_optional->isMissing();
  }

  /**
   * @return Missing
   */
  public function getOptional(): ?EditableNode {
    if ($this->_optional->isMissing()) {
      return null;
    }
    \assert($this->_optional instanceof EditableNode);
    return $this->_optional;
  }

  /**
   * @return s
   */
  public function getOptionalx(): EditableNode {
    \assert($this->_optional instanceof EditableNode);
    return $this->_optional;
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
    return new static(
      $this->_optional,
      $value,
      $this->_left_brace,
      $this->_values,
      $this->_right_brace
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return EnumToken
   */
  public function getKeyword(): EnumToken {
    \assert($this->_keyword instanceof EnumToken);
    return $this->_keyword;
  }

  /**
   * @return EnumToken
   */
  public function getKeywordx(): EnumToken {
    return $this->getKeyword();
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
      $this->_optional,
      $this->_keyword,
      $value,
      $this->_values,
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

  public function getValuesUNTYPED(): EditableNode {
    return $this->_values;
  }

  /**
   * @return static
   */
  public function withValues(EditableNode $value) {
    if ($value === $this->_values) {
      return $this;
    }
    return new static(
      $this->_optional,
      $this->_keyword,
      $this->_left_brace,
      $value,
      $this->_right_brace
    );
  }

  public function hasValues(): bool {
    return !$this->_values->isMissing();
  }

  /**
   * @return EditableList<LiteralExpression>
   */
  public function getValues(): EditableList {
    \assert($this->_values instanceof EditableList);
    return $this->_values;
  }

  /**
   * @return EditableList<LiteralExpression>
   */
  public function getValuesx(): EditableList {
    return $this->getValues();
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
      $this->_optional,
      $this->_keyword,
      $this->_left_brace,
      $this->_values,
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
