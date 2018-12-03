<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<86a36e36a886a01ecd8ed02dd91754e9>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class LetStatement extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_colon;
  /**
   * @var EditableNode
   */
  private $_type;
  /**
   * @var EditableNode
   */
  private $_initializer;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $name,
    EditableNode $colon,
    EditableNode $type,
    EditableNode $initializer,
    EditableNode $semicolon
  ) {
    parent::__construct('let_statement');
    $this->_keyword = $keyword;
    $this->_name = $name;
    $this->_colon = $colon;
    $this->_type = $type;
    $this->_initializer = $initializer;
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
      /* UNSAFE_EXPR */ $json['let_statement_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['let_statement_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $colon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['let_statement_colon'],
      $file,
      $offset,
      $source
    );
    $offset += $colon->getWidth();
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['let_statement_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    $initializer = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['let_statement_initializer'],
      $file,
      $offset,
      $source
    );
    $offset += $initializer->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['let_statement_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($keyword, $name, $colon, $type, $initializer, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'name' => $this->_name,
      'colon' => $this->_colon,
      'type' => $this->_type,
      'initializer' => $this->_initializer,
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
    $name = $this->_name->rewrite($rewriter, $parents);
    $colon = $this->_colon->rewrite($rewriter, $parents);
    $type = $this->_type->rewrite($rewriter, $parents);
    $initializer = $this->_initializer->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $name === $this->_name &&
      $colon === $this->_colon &&
      $type === $this->_type &&
      $initializer === $this->_initializer &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($keyword, $name, $colon, $type, $initializer, $semicolon);
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
      $this->_name,
      $this->_colon,
      $this->_type,
      $this->_initializer,
      $this->_semicolon
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns LetToken
   */
  public function getKeyword(): LetToken {
    return TypeAssert\instance_of(LetToken::class, $this->_keyword);
  }

  /**
   * @returns LetToken
   */
  public function getKeywordx(): LetToken {
    return $this->getKeyword();
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
    return new static(
      $this->_keyword,
      $value,
      $this->_colon,
      $this->_type,
      $this->_initializer,
      $this->_semicolon
    );
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @returns NameToken
   */
  public function getName(): NameToken {
    return TypeAssert\instance_of(NameToken::class, $this->_name);
  }

  /**
   * @returns NameToken
   */
  public function getNamex(): NameToken {
    return $this->getName();
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
    return new static(
      $this->_keyword,
      $this->_name,
      $value,
      $this->_type,
      $this->_initializer,
      $this->_semicolon
    );
  }

  public function hasColon(): bool {
    return !$this->_colon->isMissing();
  }

  /**
   * @returns Missing | ColonToken
   */
  public function getColon(): ?ColonToken {
    if ($this->_colon->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(ColonToken::class, $this->_colon);
  }

  /**
   * @returns ColonToken
   */
  public function getColonx(): ColonToken {
    return TypeAssert\instance_of(ColonToken::class, $this->_colon);
  }

  public function getTypeUNTYPED(): EditableNode {
    return $this->_type;
  }

  /**
   * @return static
   */
  public function withType(EditableNode $value) {
    if ($value === $this->_type) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_name,
      $this->_colon,
      $value,
      $this->_initializer,
      $this->_semicolon
    );
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @returns ClosureTypeSpecifier | GenericTypeSpecifier | Missing |
   * NullableTypeSpecifier | SimpleTypeSpecifier
   */
  public function getType(): ?EditableNode {
    if ($this->_type->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_type);
  }

  /**
   * @returns ClosureTypeSpecifier | GenericTypeSpecifier |
   * NullableTypeSpecifier | SimpleTypeSpecifier
   */
  public function getTypex(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_type);
  }

  public function getInitializerUNTYPED(): EditableNode {
    return $this->_initializer;
  }

  /**
   * @return static
   */
  public function withInitializer(EditableNode $value) {
    if ($value === $this->_initializer) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_name,
      $this->_colon,
      $this->_type,
      $value,
      $this->_semicolon
    );
  }

  public function hasInitializer(): bool {
    return !$this->_initializer->isMissing();
  }

  /**
   * @returns SimpleInitializer
   */
  public function getInitializer(): SimpleInitializer {
    return
      TypeAssert\instance_of(SimpleInitializer::class, $this->_initializer);
  }

  /**
   * @returns SimpleInitializer
   */
  public function getInitializerx(): SimpleInitializer {
    return $this->getInitializer();
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
      $this->_name,
      $this->_colon,
      $this->_type,
      $this->_initializer,
      $value
    );
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @returns SemicolonToken
   */
  public function getSemicolon(): SemicolonToken {
    return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
  }

  /**
   * @returns SemicolonToken
   */
  public function getSemicolonx(): SemicolonToken {
    return $this->getSemicolon();
  }
}
