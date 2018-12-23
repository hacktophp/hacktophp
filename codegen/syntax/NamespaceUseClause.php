<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5892b70cbe60b77e5419604b0a5650b4>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class NamespaceUseClause extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_clause_kind;
  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_as;
  /**
   * @var EditableNode
   */
  private $_alias;

  public function __construct(
    EditableNode $clause_kind,
    EditableNode $name,
    EditableNode $as,
    EditableNode $alias
  ) {
    parent::__construct('namespace_use_clause');
    $this->_clause_kind = $clause_kind;
    $this->_name = $name;
    $this->_as = $as;
    $this->_alias = $alias;
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
    $clause_kind = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_use_clause_kind'],
      $file,
      $offset,
      $source
    );
    $offset += $clause_kind->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_use_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $as = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_use_as'],
      $file,
      $offset,
      $source
    );
    $offset += $as->getWidth();
    $alias = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_use_alias'],
      $file,
      $offset,
      $source
    );
    $offset += $alias->getWidth();
    return new static($clause_kind, $name, $as, $alias);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'clause_kind' => $this->_clause_kind,
      'name' => $this->_name,
      'as' => $this->_as,
      'alias' => $this->_alias,
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
    $clause_kind = $this->_clause_kind->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    $as = $this->_as->rewrite($rewriter, $parents);
    $alias = $this->_alias->rewrite($rewriter, $parents);
    if (
      $clause_kind === $this->_clause_kind &&
      $name === $this->_name &&
      $as === $this->_as &&
      $alias === $this->_alias
    ) {
      return $this;
    }
    return new static($clause_kind, $name, $as, $alias);
  }

  public function getClauseKindUNTYPED(): EditableNode {
    return $this->_clause_kind;
  }

  /**
   * @return static
   */
  public function withClauseKind(EditableNode $value) {
    if ($value === $this->_clause_kind) {
      return $this;
    }
    return new static($value, $this->_name, $this->_as, $this->_alias);
  }

  public function hasClauseKind(): bool {
    return !$this->_clause_kind->isMissing();
  }

  /**
   * @return null | ConstToken | FunctionToken
   */
  public function getClauseKind(): ?EditableToken {
    if ($this->_clause_kind->isMissing()) {
      return null;
    }
    \assert($this->_clause_kind instanceof EditableToken);
    return $this->_clause_kind;
  }

  /**
   * @return ConstToken | FunctionToken
   */
  public function getClauseKindx(): EditableToken {
    \assert($this->_clause_kind instanceof EditableToken);
    return $this->_clause_kind;
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
    return new static($this->_clause_kind, $value, $this->_as, $this->_alias);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return QualifiedName | NameToken
   */
  public function getName(): EditableNode {
    \assert($this->_name instanceof EditableNode);
    return $this->_name;
  }

  /**
   * @return QualifiedName | NameToken
   */
  public function getNamex(): EditableNode {
    return $this->getName();
  }

  public function getAsUNTYPED(): EditableNode {
    return $this->_as;
  }

  /**
   * @return static
   */
  public function withAs(EditableNode $value) {
    if ($value === $this->_as) {
      return $this;
    }
    return new static($this->_clause_kind, $this->_name, $value, $this->_alias);
  }

  public function hasAs(): bool {
    return !$this->_as->isMissing();
  }

  /**
   * @return null | AsToken
   */
  public function getAs(): ?AsToken {
    if ($this->_as->isMissing()) {
      return null;
    }
    \assert($this->_as instanceof AsToken);
    return $this->_as;
  }

  /**
   * @return AsToken
   */
  public function getAsx(): AsToken {
    \assert($this->_as instanceof AsToken);
    return $this->_as;
  }

  public function getAliasUNTYPED(): EditableNode {
    return $this->_alias;
  }

  /**
   * @return static
   */
  public function withAlias(EditableNode $value) {
    if ($value === $this->_alias) {
      return $this;
    }
    return new static($this->_clause_kind, $this->_name, $this->_as, $value);
  }

  public function hasAlias(): bool {
    return !$this->_alias->isMissing();
  }

  /**
   * @return null | NameToken
   */
  public function getAlias(): ?NameToken {
    if ($this->_alias->isMissing()) {
      return null;
    }
    \assert($this->_alias instanceof NameToken);
    return $this->_alias;
  }

  /**
   * @return NameToken
   */
  public function getAliasx(): NameToken {
    \assert($this->_alias instanceof NameToken);
    return $this->_alias;
  }
}
