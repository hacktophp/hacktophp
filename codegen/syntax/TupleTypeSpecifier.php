<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b3f7e6f720869406e1462903e7f50b09>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class TupleTypeSpecifier extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_paren;
  /**
   * @var EditableNode
   */
  private $_types;
  /**
   * @var EditableNode
   */
  private $_right_paren;

  public function __construct(
    EditableNode $left_paren,
    EditableNode $types,
    EditableNode $right_paren
  ) {
    parent::__construct('tuple_type_specifier');
    $this->_left_paren = $left_paren;
    $this->_types = $types;
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
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['tuple_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $types = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['tuple_types'],
      $file,
      $offset,
      $source
    );
    $offset += $types->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['tuple_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    return new static($left_paren, $types, $right_paren);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_paren' => $this->_left_paren,
      'types' => $this->_types,
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
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $types = $this->_types->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    if (
      $left_paren === $this->_left_paren &&
      $types === $this->_types &&
      $right_paren === $this->_right_paren
    ) {
      return $this;
    }
    return new static($left_paren, $types, $right_paren);
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
    return new static($value, $this->_types, $this->_right_paren);
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

  public function getTypesUNTYPED(): EditableNode {
    return $this->_types;
  }

  /**
   * @return static
   */
  public function withTypes(EditableNode $value) {
    if ($value === $this->_types) {
      return $this;
    }
    return new static($this->_left_paren, $value, $this->_right_paren);
  }

  public function hasTypes(): bool {
    return !$this->_types->isMissing();
  }

  /**
   * @return EditableList<EditableNode> | EditableList<SimpleTypeSpecifier> |
   * EditableList<VectorArrayTypeSpecifier> | EditableList<VectorTypeSpecifier>
   */
  public function getTypes(): EditableList {
    \assert($this->_types instanceof EditableList);
    return $this->_types;
  }

  /**
   * @return EditableList<EditableNode> | EditableList<SimpleTypeSpecifier> |
   * EditableList<VectorArrayTypeSpecifier> | EditableList<VectorTypeSpecifier>
   */
  public function getTypesx(): EditableList {
    return $this->getTypes();
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
    return new static($this->_left_paren, $this->_types, $value);
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
