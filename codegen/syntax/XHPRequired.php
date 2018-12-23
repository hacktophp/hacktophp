<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ad9bc060af97cef9f55ad959bef34ab8>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class XHPRequired extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_at;
  /**
   * @var EditableNode
   */
  private $_keyword;

  public function __construct(EditableNode $at, EditableNode $keyword) {
    parent::__construct('xhp_required');
    $this->_at = $at;
    $this->_keyword = $keyword;
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
    $at = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_required_at'],
      $file,
      $offset,
      $source
    );
    $offset += $at->getWidth();
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_required_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    return new static($at, $keyword);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'at' => $this->_at,
      'keyword' => $this->_keyword,
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
    $at = $this->_at->rewrite($rewriter, $parents);
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    if ($at === $this->_at && $keyword === $this->_keyword) {
      return $this;
    }
    return new static($at, $keyword);
  }

  public function getAtUNTYPED(): EditableNode {
    return $this->_at;
  }

  /**
   * @return static
   */
  public function withAt(EditableNode $value) {
    if ($value === $this->_at) {
      return $this;
    }
    return new static($value, $this->_keyword);
  }

  public function hasAt(): bool {
    return !$this->_at->isMissing();
  }

  /**
   * @return AtToken
   */
  public function getAt(): AtToken {
    \assert($this->_at instanceof AtToken);
    return $this->_at;
  }

  /**
   * @return AtToken
   */
  public function getAtx(): AtToken {
    return $this->getAt();
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
    return new static($this->_at, $value);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return RequiredToken
   */
  public function getKeyword(): RequiredToken {
    \assert($this->_keyword instanceof RequiredToken);
    return $this->_keyword;
  }

  /**
   * @return RequiredToken
   */
  public function getKeywordx(): RequiredToken {
    return $this->getKeyword();
  }
}
