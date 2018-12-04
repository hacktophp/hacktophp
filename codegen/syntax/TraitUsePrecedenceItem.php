<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<55cf773eff1a2640f2467e1573f96111>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class TraitUsePrecedenceItem extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_removed_names;

  public function __construct(
    EditableNode $name,
    EditableNode $keyword,
    EditableNode $removed_names
  ) {
    parent::__construct('trait_use_precedence_item');
    $this->_name = $name;
    $this->_keyword = $keyword;
    $this->_removed_names = $removed_names;
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
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_precedence_item_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_precedence_item_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $removed_names = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_precedence_item_removed_names'],
      $file,
      $offset,
      $source
    );
    $offset += $removed_names->getWidth();
    return new static($name, $keyword, $removed_names);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'name' => $this->_name,
      'keyword' => $this->_keyword,
      'removed_names' => $this->_removed_names,
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
    $name = $this->_name->rewrite($rewriter, $parents);
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $removed_names = $this->_removed_names->rewrite($rewriter, $parents);
    if (
      $name === $this->_name &&
      $keyword === $this->_keyword &&
      $removed_names === $this->_removed_names
    ) {
      return $this;
    }
    return new static($name, $keyword, $removed_names);
  }

  public function getNameUNTYPED(): EditableNode {
    return $this->_name;
  }

  /**
   * @return static
   */
  public function withName(EditableNode $value) {
    if ($value === $this->_name) {
      return $this;
    }
    return new static($value, $this->_keyword, $this->_removed_names);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return ScopeResolutionExpression
   */
  public function getName(): ScopeResolutionExpression {
    return
      TypeAssert\instance_of(ScopeResolutionExpression::class, $this->_name);
  }

  /**
   * @return ScopeResolutionExpression
   */
  public function getNamex(): ScopeResolutionExpression {
    return $this->getName();
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
    return new static($this->_name, $value, $this->_removed_names);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return InsteadofToken
   */
  public function getKeyword(): InsteadofToken {
    \assert($this->_keyword instanceof InsteadofToken);
    return $this->_keyword;
  }

  /**
   * @return InsteadofToken
   */
  public function getKeywordx(): InsteadofToken {
    return $this->getKeyword();
  }

  public function getRemovedNamesUNTYPED(): EditableNode {
    return $this->_removed_names;
  }

  /**
   * @return static
   */
  public function withRemovedNames(EditableNode $value) {
    if ($value === $this->_removed_names) {
      return $this;
    }
    return new static($this->_name, $this->_keyword, $value);
  }

  public function hasRemovedNames(): bool {
    return !$this->_removed_names->isMissing();
  }

  /**
   * @return EditableList<SimpleTypeSpecifier>
   */
  public function getRemovedNames(): EditableList {
    \assert($this->_removed_names instanceof EditableList);
    return $this->_removed_names;
  }

  /**
   * @return EditableList<SimpleTypeSpecifier>
   */
  public function getRemovedNamesx(): EditableList {
    return $this->getRemovedNames();
  }
}
