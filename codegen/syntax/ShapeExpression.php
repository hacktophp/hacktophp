<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5c0c853456635ddd29e88cf3d10dfa57>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class ShapeExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_left_paren;
  /**
   * @var EditableNode
   */
  private $_fields;
  /**
   * @var EditableNode
   */
  private $_right_paren;

  public function __construct(
    EditableNode $keyword,
    EditableNode $left_paren,
    EditableNode $fields,
    EditableNode $right_paren
  ) {
    parent::__construct('shape_expression');
    $this->_keyword = $keyword;
    $this->_left_paren = $left_paren;
    $this->_fields = $fields;
    $this->_right_paren = $right_paren;
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
      /* UNSAFE_EXPR */ $json['shape_expression_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['shape_expression_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $fields = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['shape_expression_fields'],
      $file,
      $offset,
      $source
    );
    $offset += $fields->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['shape_expression_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    return new static($keyword, $left_paren, $fields, $right_paren);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'left_paren' => $this->_left_paren,
      'fields' => $this->_fields,
      'right_paren' => $this->_right_paren,
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
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $fields = $this->_fields->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $left_paren === $this->_left_paren &&
      $fields === $this->_fields &&
      $right_paren === $this->_right_paren
    ) {
      return $this;
    }
    return new static($keyword, $left_paren, $fields, $right_paren);
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
      $value,
      $this->_left_paren,
      $this->_fields,
      $this->_right_paren
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return ShapeToken
   */
  public function getKeyword(): ShapeToken {
    \assert($this->_keyword instanceof ShapeToken);
    return $this->_keyword;
  }

  /**
   * @return ShapeToken
   */
  public function getKeywordx(): ShapeToken {
    return $this->getKeyword();
  }

  public function getLeftParenUNTYPED(): EditableNode {
    return $this->_left_paren;
  }

  /**
   * @return static
   */
  public function withLeftParen(EditableNode $value) {
    if ($value === $this->_left_paren) {
      return $this;
    }
    return
      new static($this->_keyword, $value, $this->_fields, $this->_right_paren);
  }

  public function hasLeftParen(): bool {
    return !$this->_left_paren->isMissing();
  }

  /**
   * @return LeftParenToken
   */
  public function getLeftParen(): LeftParenToken {
    \assert($this->_left_paren instanceof LeftParenToken);
    return $this->_left_paren;
  }

  /**
   * @return LeftParenToken
   */
  public function getLeftParenx(): LeftParenToken {
    return $this->getLeftParen();
  }

  public function getFieldsUNTYPED(): EditableNode {
    return $this->_fields;
  }

  /**
   * @return static
   */
  public function withFields(EditableNode $value) {
    if ($value === $this->_fields) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $value,
      $this->_right_paren
    );
  }

  public function hasFields(): bool {
    return !$this->_fields->isMissing();
  }

  /**
   * @return EditableList<FieldInitializer> | null
   */
  public function getFields(): ?EditableList {
    if ($this->_fields->isMissing()) {
      return null;
    }
    \assert($this->_fields instanceof EditableList);
    return $this->_fields;
  }

  /**
   * @return EditableList<FieldInitializer>
   */
  public function getFieldsx(): EditableList {
    \assert($this->_fields instanceof EditableList);
    return $this->_fields;
  }

  public function getRightParenUNTYPED(): EditableNode {
    return $this->_right_paren;
  }

  /**
   * @return static
   */
  public function withRightParen(EditableNode $value) {
    if ($value === $this->_right_paren) {
      return $this;
    }
    return
      new static($this->_keyword, $this->_left_paren, $this->_fields, $value);
  }

  public function hasRightParen(): bool {
    return !$this->_right_paren->isMissing();
  }

  /**
   * @return RightParenToken
   */
  public function getRightParen(): RightParenToken {
    \assert($this->_right_paren instanceof RightParenToken);
    return $this->_right_paren;
  }

  /**
   * @return RightParenToken
   */
  public function getRightParenx(): RightParenToken {
    return $this->getRightParen();
  }
}
