<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<fc9ce1fb37896c4298f2a586f0cfb3f5>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

use Facebook\HHAST\EditableToken;

final class NamespaceUseDeclaration
  extends EditableNode
  implements INamespaceUseDeclaration {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_kind;
  /**
   * @var EditableNode
   */
  private $_clauses;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $kind,
    EditableNode $clauses,
    EditableNode $semicolon
  ) {
    parent::__construct('namespace_use_declaration');
    $this->_keyword = $keyword;
    $this->_kind = $kind;
    $this->_clauses = $clauses;
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
      /* UNSAFE_EXPR */ $json['namespace_use_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $kind = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_use_kind'],
      $file,
      $offset,
      $source
    );
    $offset += $kind->getWidth();
    $clauses = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_use_clauses'],
      $file,
      $offset,
      $source
    );
    $offset += $clauses->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_use_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($keyword, $kind, $clauses, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'kind' => $this->_kind,
      'clauses' => $this->_clauses,
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
    $kind = $this->_kind->rewrite($rewriter, $parents);
    $clauses = $this->_clauses->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $kind === $this->_kind &&
      $clauses === $this->_clauses &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($keyword, $kind, $clauses, $semicolon);
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
    return new static($value, $this->_kind, $this->_clauses, $this->_semicolon);
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

  public function getKindUNTYPED(): EditableNode {
    return $this->_kind;
  }

  /**
   * @return static
   */
  public function withKind(EditableNode $value) {
    if ($value === $this->_kind) {
      return $this;
    }
    return
      new static($this->_keyword, $value, $this->_clauses, $this->_semicolon);
  }

  public function hasKind(): bool {
    return !$this->_kind->isMissing();
  }

  /**
   * @return null | ConstToken | FunctionToken | NamespaceToken | TypeToken
   */
  public function getKind(): ?EditableToken {
    if ($this->_kind->isMissing()) {
      return null;
    }
    \assert($this->_kind instanceof EditableToken);
    return $this->_kind;
  }

  /**
   * @return ConstToken | FunctionToken | NamespaceToken | TypeToken
   */
  public function getKindx(): EditableToken {
    \assert($this->_kind instanceof EditableToken);
    return $this->_kind;
  }

  public function getClausesUNTYPED(): EditableNode {
    return $this->_clauses;
  }

  /**
   * @return static
   */
  public function withClauses(EditableNode $value) {
    if ($value === $this->_clauses) {
      return $this;
    }
    return new static($this->_keyword, $this->_kind, $value, $this->_semicolon);
  }

  public function hasClauses(): bool {
    return !$this->_clauses->isMissing();
  }

  /**
   * @return EditableList<NamespaceUseClause>
   */
  public function getClauses(): EditableList {
    \assert($this->_clauses instanceof EditableList);
    return $this->_clauses;
  }

  /**
   * @return EditableList<NamespaceUseClause>
   */
  public function getClausesx(): EditableList {
    return $this->getClauses();
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
    return new static($this->_keyword, $this->_kind, $this->_clauses, $value);
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
