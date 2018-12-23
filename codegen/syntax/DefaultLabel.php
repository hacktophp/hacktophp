<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d9bac9601f00d81a1848e52e1c61111a>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class DefaultLabel extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_colon;

  public function __construct(EditableNode $keyword, EditableNode $colon) {
    parent::__construct('default_label');
    $this->_keyword = $keyword;
    $this->_colon = $colon;
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
      /* UNSAFE_EXPR */ $json['default_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $colon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['default_colon'],
      $file,
      $offset,
      $source
    );
    $offset += $colon->getWidth();
    return new static($keyword, $colon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'colon' => $this->_colon,
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
    $colon = $this->_colon->rewrite($rewriter, $parents);
    if ($keyword === $this->_keyword && $colon === $this->_colon) {
      return $this;
    }
    return new static($keyword, $colon);
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
    return new static($value, $this->_colon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return DefaultToken
   */
  public function getKeyword(): DefaultToken {
    \assert($this->_keyword instanceof DefaultToken);
    return $this->_keyword;
  }

  /**
   * @return DefaultToken
   */
  public function getKeywordx(): DefaultToken {
    return $this->getKeyword();
  }

  public function getColonUNTYPED(): EditableNode {
    return $this->_colon;
  }

  /**
   * @return static
   */
  public function withColon(EditableNode $value) {
    if ($value === $this->_colon) {
      return $this;
    }
    return new static($this->_keyword, $value);
  }

  public function hasColon(): bool {
    return !$this->_colon->isMissing();
  }

  /**
   * @return ColonToken | SemicolonToken
   */
  public function getColon(): EditableToken {
    \assert($this->_colon instanceof EditableToken);
    return $this->_colon;
  }

  /**
   * @return ColonToken | SemicolonToken
   */
  public function getColonx(): EditableToken {
    return $this->getColon();
  }
}
