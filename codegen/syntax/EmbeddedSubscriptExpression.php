<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<eb64c2d5fe88012704c27434f0a4dead>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class EmbeddedSubscriptExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_receiver;
  /**
   * @var EditableNode
   */
  private $_left_bracket;
  /**
   * @var EditableNode
   */
  private $_index;
  /**
   * @var EditableNode
   */
  private $_right_bracket;

  public function __construct(
    EditableNode $receiver,
    EditableNode $left_bracket,
    EditableNode $index,
    EditableNode $right_bracket
  ) {
    parent::__construct('embedded_subscript_expression');
    $this->_receiver = $receiver;
    $this->_left_bracket = $left_bracket;
    $this->_index = $index;
    $this->_right_bracket = $right_bracket;
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
    $receiver = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_subscript_receiver'],
      $file,
      $offset,
      $source
    );
    $offset += $receiver->getWidth();
    $left_bracket = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_subscript_left_bracket'],
      $file,
      $offset,
      $source
    );
    $offset += $left_bracket->getWidth();
    $index = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_subscript_index'],
      $file,
      $offset,
      $source
    );
    $offset += $index->getWidth();
    $right_bracket = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['embedded_subscript_right_bracket'],
      $file,
      $offset,
      $source
    );
    $offset += $right_bracket->getWidth();
    return new static($receiver, $left_bracket, $index, $right_bracket);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'receiver' => $this->_receiver,
      'left_bracket' => $this->_left_bracket,
      'index' => $this->_index,
      'right_bracket' => $this->_right_bracket,
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
    $receiver = $this->_receiver->rewrite($rewriter, $parents);
    $left_bracket = $this->_left_bracket->rewrite($rewriter, $parents);
    $index = $this->_index->rewrite($rewriter, $parents);
    $right_bracket = $this->_right_bracket->rewrite($rewriter, $parents);
    if (
      $receiver === $this->_receiver &&
      $left_bracket === $this->_left_bracket &&
      $index === $this->_index &&
      $right_bracket === $this->_right_bracket
    ) {
      return $this;
    }
    return new static($receiver, $left_bracket, $index, $right_bracket);
  }

  public function getReceiverUNTYPED(): EditableNode {
    return $this->_receiver;
  }

  /**
   * @return static
   */
  public function withReceiver(EditableNode $value) {
    if ($value === $this->_receiver) {
      return $this;
    }
    return new static(
      $value,
      $this->_left_bracket,
      $this->_index,
      $this->_right_bracket
    );
  }

  public function hasReceiver(): bool {
    return !$this->_receiver->isMissing();
  }

  /**
   * @return unknown
   */
  public function getReceiver(): EditableNode {
    \assert($this->_receiver instanceof EditableNode);
    return $this->_receiver;
  }

  /**
   * @return unknown
   */
  public function getReceiverx(): EditableNode {
    return $this->getReceiver();
  }

  public function getLeftBracketUNTYPED(): EditableNode {
    return $this->_left_bracket;
  }

  /**
   * @return static
   */
  public function withLeftBracket(EditableNode $value) {
    if ($value === $this->_left_bracket) {
      return $this;
    }
    return new static(
      $this->_receiver,
      $value,
      $this->_index,
      $this->_right_bracket
    );
  }

  public function hasLeftBracket(): bool {
    return !$this->_left_bracket->isMissing();
  }

  /**
   * @return unknown
   */
  public function getLeftBracket(): EditableNode {
    \assert($this->_left_bracket instanceof EditableNode);
    return $this->_left_bracket;
  }

  /**
   * @return unknown
   */
  public function getLeftBracketx(): EditableNode {
    return $this->getLeftBracket();
  }

  public function getIndexUNTYPED(): EditableNode {
    return $this->_index;
  }

  /**
   * @return static
   */
  public function withIndex(EditableNode $value) {
    if ($value === $this->_index) {
      return $this;
    }
    return new static(
      $this->_receiver,
      $this->_left_bracket,
      $value,
      $this->_right_bracket
    );
  }

  public function hasIndex(): bool {
    return !$this->_index->isMissing();
  }

  /**
   * @return unknown
   */
  public function getIndex(): EditableNode {
    \assert($this->_index instanceof EditableNode);
    return $this->_index;
  }

  /**
   * @return unknown
   */
  public function getIndexx(): EditableNode {
    return $this->getIndex();
  }

  public function getRightBracketUNTYPED(): EditableNode {
    return $this->_right_bracket;
  }

  /**
   * @return static
   */
  public function withRightBracket(EditableNode $value) {
    if ($value === $this->_right_bracket) {
      return $this;
    }
    return
      new static($this->_receiver, $this->_left_bracket, $this->_index, $value);
  }

  public function hasRightBracket(): bool {
    return !$this->_right_bracket->isMissing();
  }

  /**
   * @return unknown
   */
  public function getRightBracket(): EditableNode {
    \assert($this->_right_bracket instanceof EditableNode);
    return $this->_right_bracket;
  }

  /**
   * @return unknown
   */
  public function getRightBracketx(): EditableNode {
    return $this->getRightBracket();
  }
}
