<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8f85b4ea79f10c3d9924c9ce5d9cfcfb>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class RequireClause extends EditableNode {

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
  private $_name;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $kind,
    EditableNode $name,
    EditableNode $semicolon
  ) {
    parent::__construct('require_clause');
    $this->_keyword = $keyword;
    $this->_kind = $kind;
    $this->_name = $name;
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
      /* UNSAFE_EXPR */ $json['require_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $kind = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['require_kind'],
      $file,
      $offset,
      $source
    );
    $offset += $kind->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['require_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['require_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($keyword, $kind, $name, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'kind' => $this->_kind,
      'name' => $this->_name,
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
    $name = $this->_name->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $kind === $this->_kind &&
      $name === $this->_name &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($keyword, $kind, $name, $semicolon);
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
    return new static($value, $this->_kind, $this->_name, $this->_semicolon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return RequireToken
   */
  public function getKeyword(): RequireToken {
    \assert($this->_keyword instanceof RequireToken);
    return $this->_keyword;
  }

  /**
   * @return RequireToken
   */
  public function getKeywordx(): RequireToken {
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
    return new static($this->_keyword, $value, $this->_name, $this->_semicolon);
  }

  public function hasKind(): bool {
    return !$this->_kind->isMissing();
  }

  /**
   * @return ExtendsToken | ImplementsToken
   */
  public function getKind(): EditableToken {
    \assert($this->_kind instanceof EditableToken);
    return $this->_kind;
  }

  /**
   * @return ExtendsToken | ImplementsToken
   */
  public function getKindx(): EditableToken {
    return $this->getKind();
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
    return new static($this->_keyword, $this->_kind, $value, $this->_semicolon);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return GenericTypeSpecifier | SimpleTypeSpecifier
   */
  public function getName(): EditableNode {
    \assert($this->_name instanceof EditableNode);
    return $this->_name;
  }

  /**
   * @return GenericTypeSpecifier | SimpleTypeSpecifier
   */
  public function getNamex(): EditableNode {
    return $this->getName();
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
    return new static($this->_keyword, $this->_kind, $this->_name, $value);
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
