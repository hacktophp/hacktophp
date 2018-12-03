<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b7a1514549bc1d2d38e140b2ba81fd5f>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class SwitchFallthrough extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(EditableNode $keyword, EditableNode $semicolon) {
    parent::__construct('switch_fallthrough');
    $this->_keyword = $keyword;
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
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['fallthrough_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['fallthrough_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($keyword, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
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
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if ($keyword === $this->_keyword && $semicolon === $this->_semicolon) {
      return $this;
    }
    return new static($keyword, $semicolon);
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
    return new static($value, $this->_semicolon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns Missing
   */
  public function getKeyword(): ?EditableNode {
    if ($this->_keyword->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_keyword);
  }

  /**
   * @returns
   */
  public function getKeywordx(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_keyword);
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
    return new static($this->_keyword, $value);
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @returns Missing
   */
  public function getSemicolon(): ?EditableNode {
    if ($this->_semicolon->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_semicolon);
  }

  /**
   * @returns
   */
  public function getSemicolonx(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_semicolon);
  }
}
