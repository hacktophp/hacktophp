<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<68219344482a251921750b67ce37dc97>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class ClassishBody extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_brace;
  /**
   * @var EditableNode
   */
  private $_elements;
  /**
   * @var EditableNode
   */
  private $_right_brace;

  public function __construct(
    EditableNode $left_brace,
    EditableNode $elements,
    EditableNode $right_brace
  ) {
    parent::__construct('classish_body');
    $this->_left_brace = $left_brace;
    $this->_elements = $elements;
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
      /* UNSAFE_EXPR */ $json['classish_body_left_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $left_brace->getWidth();
    $elements = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['classish_body_elements'],
      $file,
      $offset,
      $source
    );
    $offset += $elements->getWidth();
    $right_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['classish_body_right_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $right_brace->getWidth();
    return new static($left_brace, $elements, $right_brace);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_brace' => $this->_left_brace,
      'elements' => $this->_elements,
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
    $elements = $this->_elements->rewrite($rewriter, $parents);
    $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
    if (
      $left_brace === $this->_left_brace &&
      $elements === $this->_elements &&
      $right_brace === $this->_right_brace
    ) {
      return $this;
    }
    return new static($left_brace, $elements, $right_brace);
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
    return new static($value, $this->_elements, $this->_right_brace);
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

  public function getElementsUNTYPED(): EditableNode {
    return $this->_elements;
  }

  /**
   * @return static
   */
  public function withElements(EditableNode $value) {
    if ($value === $this->_elements) {
      return $this;
    }
    return new static($this->_left_brace, $value, $this->_right_brace);
  }

  public function hasElements(): bool {
    return !$this->_elements->isMissing();
  }

  /**
   * @return ?EditableList
   */
  public function getElements(): ?EditableList {
    if ($this->_elements->isMissing()) {
      return null;
    }
    \assert($this->_elements instanceof EditableList);
    return $this->_elements;
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getElementsx(): EditableList {
    \assert($this->_elements instanceof EditableList);
    return $this->_elements;
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
    return new static($this->_left_brace, $this->_elements, $value);
  }

  public function hasRightBrace(): bool {
    return !$this->_right_brace->isMissing();
  }

  /**
   * @return null | RightBraceToken
   */
  public function getRightBrace(): ?RightBraceToken {
    if ($this->_right_brace->isMissing()) {
      return null;
    }
    \assert($this->_right_brace instanceof RightBraceToken);
    return $this->_right_brace;
  }

  /**
   * @return RightBraceToken
   */
  public function getRightBracex(): RightBraceToken {
    \assert($this->_right_brace instanceof RightBraceToken);
    return $this->_right_brace;
  }
}
