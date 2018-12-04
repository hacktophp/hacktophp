<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8aec8e80c06f10ec335320c77637937e>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class TraitUse extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_names;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $names,
    EditableNode $semicolon
  ) {
    parent::__construct('trait_use');
    $this->_keyword = $keyword;
    $this->_names = $names;
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
      /* UNSAFE_EXPR */ $json['trait_use_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $names = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_names'],
      $file,
      $offset,
      $source
    );
    $offset += $names->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($keyword, $names, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'names' => $this->_names,
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
    $names = $this->_names->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $names === $this->_names &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($keyword, $names, $semicolon);
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
    return new static($value, $this->_names, $this->_semicolon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return UseToken
   */
  public function getKeyword(): UseToken {
    \assert($this->_keyword instanceof UseToken);
    return $this->_keyword;
  }

  /**
   * @return UseToken
   */
  public function getKeywordx(): UseToken {
    return $this->getKeyword();
  }

  public function getNamesUNTYPED(): EditableNode {
    return $this->_names;
  }

  /**
   * @return static
   */
  public function withNames(EditableNode $value) {
    if ($value === $this->_names) {
      return $this;
    }
    return new static($this->_keyword, $value, $this->_semicolon);
  }

  public function hasNames(): bool {
    return !$this->_names->isMissing();
  }

  /**
   * @return EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
   * EditableList<SimpleTypeSpecifier>
   */
  public function getNames(): EditableList {
    \assert($this->_names instanceof EditableList);
    return $this->_names;
  }

  /**
   * @return EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
   * EditableList<SimpleTypeSpecifier>
   */
  public function getNamesx(): EditableList {
    return $this->getNames();
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
    return new static($this->_keyword, $this->_names, $value);
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @return SemicolonToken
   */
  public function getSemicolon(): SemicolonToken {
    \assert($this->_semicolon instanceof SemicolonToken);
    return $this->_semicolon;
  }

  /**
   * @return SemicolonToken
   */
  public function getSemicolonx(): SemicolonToken {
    return $this->getSemicolon();
  }
}
