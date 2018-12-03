<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e4bedfc5bea6f7a3f55fd95f901c40e1>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class XHPExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_open;
  /**
   * @var EditableNode
   */
  private $_body;
  /**
   * @var EditableNode
   */
  private $_close;

  public function __construct(
    EditableNode $open,
    EditableNode $body,
    EditableNode $close
  ) {
    parent::__construct('xhp_expression');
    $this->_open = $open;
    $this->_body = $body;
    $this->_close = $close;
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
    $open = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_open'],
      $file,
      $offset,
      $source
    );
    $offset += $open->getWidth();
    $body = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_body'],
      $file,
      $offset,
      $source
    );
    $offset += $body->getWidth();
    $close = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_close'],
      $file,
      $offset,
      $source
    );
    $offset += $close->getWidth();
    return new static($open, $body, $close);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'open' => $this->_open,
      'body' => $this->_body,
      'close' => $this->_close,
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
    $open = $this->_open->rewrite($rewriter, $parents);
    $body = $this->_body->rewrite($rewriter, $parents);
    $close = $this->_close->rewrite($rewriter, $parents);
    if (
      $open === $this->_open &&
      $body === $this->_body &&
      $close === $this->_close
    ) {
      return $this;
    }
    return new static($open, $body, $close);
  }

  public function getOpenUNTYPED(): EditableNode {
    return $this->_open;
  }

  /**
   * @return static
   */
  public function withOpen(EditableNode $value) {
    if ($value === $this->_open) {
      return $this;
    }
    return new static($value, $this->_body, $this->_close);
  }

  public function hasOpen(): bool {
    return !$this->_open->isMissing();
  }

  /**
   * @return XHPOpen
   */
  public function getOpen(): XHPOpen {
    \assert($this->_open instanceof XHPOpen);
    return $this->_open;
  }

  /**
   * @return XHPOpen
   */
  public function getOpenx(): XHPOpen {
    return $this->getOpen();
  }

  public function getBodyUNTYPED(): EditableNode {
    return $this->_body;
  }

  /**
   * @return static
   */
  public function withBody(EditableNode $value) {
    if ($value === $this->_body) {
      return $this;
    }
    return new static($this->_open, $value, $this->_close);
  }

  public function hasBody(): bool {
    return !$this->_body->isMissing();
  }

  /**
   * @return EditableList<EditableNode> | null
   */
  public function getBody(): ?EditableList {
    if ($this->_body->isMissing()) {
      return null;
    }
    \assert($this->_body instanceof EditableList);
    return $this->_body;
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getBodyx(): EditableList {
    \assert($this->_body instanceof EditableList);
    return $this->_body;
  }

  public function getCloseUNTYPED(): EditableNode {
    return $this->_close;
  }

  /**
   * @return static
   */
  public function withClose(EditableNode $value) {
    if ($value === $this->_close) {
      return $this;
    }
    return new static($this->_open, $this->_body, $value);
  }

  public function hasClose(): bool {
    return !$this->_close->isMissing();
  }

  /**
   * @return null | XHPClose
   */
  public function getClose(): ?XHPClose {
    if ($this->_close->isMissing()) {
      return null;
    }
    \assert($this->_close instanceof XHPClose);
    return $this->_close;
  }

  /**
   * @return XHPClose
   */
  public function getClosex(): XHPClose {
    \assert($this->_close instanceof XHPClose);
    return $this->_close;
  }
}
