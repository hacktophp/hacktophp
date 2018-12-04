<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<45205ee6dbb85aa08d61a64d3de85dfc>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class XHPChildrenParenthesizedList extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_paren;
  /**
   * @var EditableNode
   */
  private $_xhp_children;
  /**
   * @var EditableNode
   */
  private $_right_paren;

  public function __construct(
    EditableNode $left_paren,
    EditableNode $xhp_children,
    EditableNode $right_paren
  ) {
    parent::__construct('xhp_children_parenthesized_list');
    $this->_left_paren = $left_paren;
    $this->_xhp_children = $xhp_children;
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
      /* UNSAFE_EXPR */ $json['xhp_children_list_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $xhp_children = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_children_list_xhp_children'],
      $file,
      $offset,
      $source
    );
    $offset += $xhp_children->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_children_list_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    return new static($left_paren, $xhp_children, $right_paren);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_paren' => $this->_left_paren,
      'xhp_children' => $this->_xhp_children,
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
    $xhp_children = $this->_xhp_children->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    if (
      $left_paren === $this->_left_paren &&
      $xhp_children === $this->_xhp_children &&
      $right_paren === $this->_right_paren
    ) {
      return $this;
    }
    return new static($left_paren, $xhp_children, $right_paren);
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
    return new static($value, $this->_xhp_children, $this->_right_paren);
  }

  public function hasLeftParen(): bool {
    return !$this->_left_paren->isMissing();
  }

  /**
   * @return unknown
   */
  public function getLeftParen(): EditableNode {
    \assert($this->_left_paren instanceof EditableNode);
    return $this->_left_paren;
  }

  /**
   * @return unknown
   */
  public function getLeftParenx(): EditableNode {
    return $this->getLeftParen();
  }

  public function getXhpChildrenUNTYPED(): EditableNode {
    return $this->_xhp_children;
  }

  /**
   * @return static
   */
  public function withXhpChildren(EditableNode $value) {
    if ($value === $this->_xhp_children) {
      return $this;
    }
    return new static($this->_left_paren, $value, $this->_right_paren);
  }

  public function hasXhpChildren(): bool {
    return !$this->_xhp_children->isMissing();
  }

  /**
   * @return unknown
   */
  public function getXhpChildren(): EditableNode {
    \assert($this->_xhp_children instanceof EditableNode);
    return $this->_xhp_children;
  }

  /**
   * @return unknown
   */
  public function getXhpChildrenx(): EditableNode {
    return $this->getXhpChildren();
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
    return new static($this->_left_paren, $this->_xhp_children, $value);
  }

  public function hasRightParen(): bool {
    return !$this->_right_paren->isMissing();
  }

  /**
   * @return unknown
   */
  public function getRightParen(): EditableNode {
    \assert($this->_right_paren instanceof EditableNode);
    return $this->_right_paren;
  }

  /**
   * @return unknown
   */
  public function getRightParenx(): EditableNode {
    return $this->getRightParen();
  }
}
