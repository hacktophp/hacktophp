<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<2a13db192b3d143ed1641971bab0d13b>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class TraitUseAliasItem extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_aliasing_name;
  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_modifiers;
  /**
   * @var EditableNode
   */
  private $_aliased_name;

  public function __construct(
    EditableNode $aliasing_name,
    EditableNode $keyword,
    EditableNode $modifiers,
    EditableNode $aliased_name
  ) {
    parent::__construct('trait_use_alias_item');
    $this->_aliasing_name = $aliasing_name;
    $this->_keyword = $keyword;
    $this->_modifiers = $modifiers;
    $this->_aliased_name = $aliased_name;
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
    $aliasing_name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_alias_item_aliasing_name'],
      $file,
      $offset,
      $source
    );
    $offset += $aliasing_name->getWidth();
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_alias_item_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $modifiers = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_alias_item_modifiers'],
      $file,
      $offset,
      $source
    );
    $offset += $modifiers->getWidth();
    $aliased_name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['trait_use_alias_item_aliased_name'],
      $file,
      $offset,
      $source
    );
    $offset += $aliased_name->getWidth();
    return new static($aliasing_name, $keyword, $modifiers, $aliased_name);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'aliasing_name' => $this->_aliasing_name,
      'keyword' => $this->_keyword,
      'modifiers' => $this->_modifiers,
      'aliased_name' => $this->_aliased_name,
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
    $aliasing_name = $this->_aliasing_name->rewrite($rewriter, $parents);
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $modifiers = $this->_modifiers->rewrite($rewriter, $parents);
    $aliased_name = $this->_aliased_name->rewrite($rewriter, $parents);
    if (
      $aliasing_name === $this->_aliasing_name &&
      $keyword === $this->_keyword &&
      $modifiers === $this->_modifiers &&
      $aliased_name === $this->_aliased_name
    ) {
      return $this;
    }
    return new static($aliasing_name, $keyword, $modifiers, $aliased_name);
  }

  public function getAliasingNameUNTYPED(): EditableNode {
    return $this->_aliasing_name;
  }

  /**
   * @return static
   */
  public function withAliasingName(EditableNode $value) {
    if ($value === $this->_aliasing_name) {
      return $this;
    }
    return new static(
      $value,
      $this->_keyword,
      $this->_modifiers,
      $this->_aliased_name
    );
  }

  public function hasAliasingName(): bool {
    return !$this->_aliasing_name->isMissing();
  }

  /**
   * @return ScopeResolutionExpression | SimpleTypeSpecifier
   */
  public function getAliasingName(): EditableNode {
    \assert($this->_aliasing_name instanceof EditableNode);
    return $this->_aliasing_name;
  }

  /**
   * @return ScopeResolutionExpression | SimpleTypeSpecifier
   */
  public function getAliasingNamex(): EditableNode {
    return $this->getAliasingName();
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
    return new static(
      $this->_aliasing_name,
      $value,
      $this->_modifiers,
      $this->_aliased_name
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return AsToken
   */
  public function getKeyword(): AsToken {
    \assert($this->_keyword instanceof AsToken);
    return $this->_keyword;
  }

  /**
   * @return AsToken
   */
  public function getKeywordx(): AsToken {
    return $this->getKeyword();
  }

  public function getModifiersUNTYPED(): EditableNode {
    return $this->_modifiers;
  }

  /**
   * @return static
   */
  public function withModifiers(EditableNode $value) {
    if ($value === $this->_modifiers) {
      return $this;
    }
    return new static(
      $this->_aliasing_name,
      $this->_keyword,
      $value,
      $this->_aliased_name
    );
  }

  public function hasModifiers(): bool {
    return !$this->_modifiers->isMissing();
  }

  /**
   * @return EditableList<EditableNode> | null
   */
  public function getModifiers(): ?EditableList {
    if ($this->_modifiers->isMissing()) {
      return null;
    }
    \assert($this->_modifiers instanceof EditableList);
    return $this->_modifiers;
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getModifiersx(): EditableList {
    \assert($this->_modifiers instanceof EditableList);
    return $this->_modifiers;
  }

  public function getAliasedNameUNTYPED(): EditableNode {
    return $this->_aliased_name;
  }

  /**
   * @return static
   */
  public function withAliasedName(EditableNode $value) {
    if ($value === $this->_aliased_name) {
      return $this;
    }
    return new static(
      $this->_aliasing_name,
      $this->_keyword,
      $this->_modifiers,
      $value
    );
  }

  public function hasAliasedName(): bool {
    return !$this->_aliased_name->isMissing();
  }

  /**
   * @return null | SimpleTypeSpecifier
   */
  public function getAliasedName(): ?SimpleTypeSpecifier {
    if ($this->_aliased_name->isMissing()) {
      return null;
    }
    \assert($this->_aliased_name instanceof SimpleTypeSpecifier);
    return $this->_aliased_name;
  }

  /**
   * @return SimpleTypeSpecifier
   */
  public function getAliasedNamex(): SimpleTypeSpecifier {
    \assert($this->_aliased_name instanceof SimpleTypeSpecifier);
    return $this->_aliased_name;
  }
}
