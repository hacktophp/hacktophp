<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<bba9ce2e5be75dbaf7212090f51fcf73>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class NamespaceGroupUseDeclaration
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
  private $_prefix;
  /**
   * @var EditableNode
   */
  private $_left_brace;
  /**
   * @var EditableNode
   */
  private $_clauses;
  /**
   * @var EditableNode
   */
  private $_right_brace;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $kind,
    EditableNode $prefix,
    EditableNode $left_brace,
    EditableNode $clauses,
    EditableNode $right_brace,
    EditableNode $semicolon
  ) {
    parent::__construct('namespace_group_use_declaration');
    $this->_keyword = $keyword;
    $this->_kind = $kind;
    $this->_prefix = $prefix;
    $this->_left_brace = $left_brace;
    $this->_clauses = $clauses;
    $this->_right_brace = $right_brace;
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
      /* UNSAFE_EXPR */ $json['namespace_group_use_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $kind = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_group_use_kind'],
      $file,
      $offset,
      $source
    );
    $offset += $kind->getWidth();
    $prefix = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_group_use_prefix'],
      $file,
      $offset,
      $source
    );
    $offset += $prefix->getWidth();
    $left_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_group_use_left_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $left_brace->getWidth();
    $clauses = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_group_use_clauses'],
      $file,
      $offset,
      $source
    );
    $offset += $clauses->getWidth();
    $right_brace = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_group_use_right_brace'],
      $file,
      $offset,
      $source
    );
    $offset += $right_brace->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_group_use_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static(
      $keyword,
      $kind,
      $prefix,
      $left_brace,
      $clauses,
      $right_brace,
      $semicolon
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'kind' => $this->_kind,
      'prefix' => $this->_prefix,
      'left_brace' => $this->_left_brace,
      'clauses' => $this->_clauses,
      'right_brace' => $this->_right_brace,
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
    $prefix = $this->_prefix->rewrite($rewriter, $parents);
    $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
    $clauses = $this->_clauses->rewrite($rewriter, $parents);
    $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $kind === $this->_kind &&
      $prefix === $this->_prefix &&
      $left_brace === $this->_left_brace &&
      $clauses === $this->_clauses &&
      $right_brace === $this->_right_brace &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static(
      $keyword,
      $kind,
      $prefix,
      $left_brace,
      $clauses,
      $right_brace,
      $semicolon
    );
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
      $value,
      $this->_kind,
      $this->_prefix,
      $this->_left_brace,
      $this->_clauses,
      $this->_right_brace,
      $this->_semicolon
    );
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
    return new static(
      $this->_keyword,
      $value,
      $this->_prefix,
      $this->_left_brace,
      $this->_clauses,
      $this->_right_brace,
      $this->_semicolon
    );
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

  public function getPrefixUNTYPED(): EditableNode {
    return $this->_prefix;
  }

  /**
   * @return static
   */
  public function withPrefix(EditableNode $value) {
    if ($value === $this->_prefix) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_kind,
      $value,
      $this->_left_brace,
      $this->_clauses,
      $this->_right_brace,
      $this->_semicolon
    );
  }

  public function hasPrefix(): bool {
    return !$this->_prefix->isMissing();
  }

  /**
   * @return QualifiedName
   */
  public function getPrefix(): QualifiedName {
    \assert($this->_prefix instanceof QualifiedName);
    return $this->_prefix;
  }

  /**
   * @return QualifiedName
   */
  public function getPrefixx(): QualifiedName {
    return $this->getPrefix();
  }

  public function getLeftBraceUNTYPED(): EditableNode {
    return $this->_left_brace;
  }

  /**
   * @return static
   */
  public function withLeftBrace(EditableNode $value) {
    if ($value === $this->_left_brace) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_kind,
      $this->_prefix,
      $value,
      $this->_clauses,
      $this->_right_brace,
      $this->_semicolon
    );
  }

  public function hasLeftBrace(): bool {
    return !$this->_left_brace->isMissing();
  }

  /**
   * @return LeftBraceToken
   */
  public function getLeftBrace(): LeftBraceToken {
    \assert($this->_left_brace instanceof LeftBraceToken);
    return $this->_left_brace;
  }

  /**
   * @return LeftBraceToken
   */
  public function getLeftBracex(): LeftBraceToken {
    return $this->getLeftBrace();
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
    return new static(
      $this->_keyword,
      $this->_kind,
      $this->_prefix,
      $this->_left_brace,
      $value,
      $this->_right_brace,
      $this->_semicolon
    );
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

  public function getRightBraceUNTYPED(): EditableNode {
    return $this->_right_brace;
  }

  /**
   * @return static
   */
  public function withRightBrace(EditableNode $value) {
    if ($value === $this->_right_brace) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_kind,
      $this->_prefix,
      $this->_left_brace,
      $this->_clauses,
      $value,
      $this->_semicolon
    );
  }

  public function hasRightBrace(): bool {
    return !$this->_right_brace->isMissing();
  }

  /**
   * @return null | RightBraceToken
   */
  public function getRightBrace(): ?RightBraceToken {
    if ($this->_right_brace->isMissing()) {
      return null;
    }
    \assert($this->_right_brace instanceof RightBraceToken);
    return $this->_right_brace;
  }

  /**
   * @return RightBraceToken
   */
  public function getRightBracex(): RightBraceToken {
    \assert($this->_right_brace instanceof RightBraceToken);
    return $this->_right_brace;
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
    return new static(
      $this->_keyword,
      $this->_kind,
      $this->_prefix,
      $this->_left_brace,
      $this->_clauses,
      $this->_right_brace,
      $value
    );
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @return null | SemicolonToken
   */
  public function getSemicolon(): ?SemicolonToken {
    if ($this->_semicolon->isMissing()) {
      return null;
    }
    \assert($this->_semicolon instanceof SemicolonToken);
    return $this->_semicolon;
  }

  /**
   * @return SemicolonToken
   */
  public function getSemicolonx(): SemicolonToken {
    \assert($this->_semicolon instanceof SemicolonToken);
    return $this->_semicolon;
  }
}
