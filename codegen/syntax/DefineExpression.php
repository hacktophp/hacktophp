<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1afdd5fcea4316ebfc84050d96a1780c>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class DefineExpression extends EditableNode {

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
  private $_argument_list;
  /**
   * @var EditableNode
   */
  private $_right_paren;

  public function __construct(
    EditableNode $keyword,
    EditableNode $left_paren,
    EditableNode $argument_list,
    EditableNode $right_paren
  ) {
    parent::__construct('define_expression');
    $this->_keyword = $keyword;
    $this->_left_paren = $left_paren;
    $this->_argument_list = $argument_list;
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
      /* UNSAFE_EXPR */ $json['define_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['define_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $argument_list = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['define_argument_list'],
      $file,
      $offset,
      $source
    );
    $offset += $argument_list->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['define_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    return new static($keyword, $left_paren, $argument_list, $right_paren);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'left_paren' => $this->_left_paren,
      'argument_list' => $this->_argument_list,
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
    $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $left_paren === $this->_left_paren &&
      $argument_list === $this->_argument_list &&
      $right_paren === $this->_right_paren
    ) {
      return $this;
    }
    return new static($keyword, $left_paren, $argument_list, $right_paren);
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
      $this->_argument_list,
      $this->_right_paren
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return DefineToken
   */
  public function getKeyword(): DefineToken {
    \assert($this->_keyword instanceof DefineToken);
    return $this->_keyword;
  }

  /**
   * @return DefineToken
   */
  public function getKeywordx(): DefineToken {
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
    return new static(
      $this->_keyword,
      $value,
      $this->_argument_list,
      $this->_right_paren
    );
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

  public function getArgumentListUNTYPED(): EditableNode {
    return $this->_argument_list;
  }

  /**
   * @return static
   */
  public function withArgumentList(EditableNode $value) {
    if ($value === $this->_argument_list) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $value,
      $this->_right_paren
    );
  }

  public function hasArgumentList(): bool {
    return !$this->_argument_list->isMissing();
  }

  /**
   * @return EditableList<EditableNode> | EditableList<LiteralExpression> |
   * Missing
   */
  public function getArgumentList(): ?EditableList {
    if ($this->_argument_list->isMissing()) {
      return null;
    }
    \assert($this->_argument_list instanceof EditableList);
    return $this->_argument_list;
  }

  /**
   * @return EditableList<EditableNode> | EditableList<LiteralExpression>
   */
  public function getArgumentListx(): EditableList {
    \assert($this->_argument_list instanceof EditableList);
    return $this->_argument_list;
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
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_argument_list,
      $value
    );
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
