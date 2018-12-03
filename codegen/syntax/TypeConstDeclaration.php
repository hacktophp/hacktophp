<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3c879b204c1c4bd03a5b565af6461a41>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class TypeConstDeclaration extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_abstract;
  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_type_keyword;
  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_type_parameters;
  /**
   * @var EditableNode
   */
  private $_type_constraint;
  /**
   * @var EditableNode
   */
  private $_equal;
  /**
   * @var EditableNode
   */
  private $_type_specifier;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $abstract,
    EditableNode $keyword,
    EditableNode $type_keyword,
    EditableNode $name,
    EditableNode $type_parameters,
    EditableNode $type_constraint,
    EditableNode $equal,
    EditableNode $type_specifier,
    EditableNode $semicolon
  ) {
    parent::__construct('type_const_declaration');
    $this->_abstract = $abstract;
    $this->_keyword = $keyword;
    $this->_type_keyword = $type_keyword;
    $this->_name = $name;
    $this->_type_parameters = $type_parameters;
    $this->_type_constraint = $type_constraint;
    $this->_equal = $equal;
    $this->_type_specifier = $type_specifier;
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
    $abstract = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_const_abstract'],
      $file,
      $offset,
      $source
    );
    $offset += $abstract->getWidth();
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_const_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $type_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_const_type_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $type_keyword->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_const_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $type_parameters = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_const_type_parameters'],
      $file,
      $offset,
      $source
    );
    $offset += $type_parameters->getWidth();
    $type_constraint = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_const_type_constraint'],
      $file,
      $offset,
      $source
    );
    $offset += $type_constraint->getWidth();
    $equal = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_const_equal'],
      $file,
      $offset,
      $source
    );
    $offset += $equal->getWidth();
    $type_specifier = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_const_type_specifier'],
      $file,
      $offset,
      $source
    );
    $offset += $type_specifier->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['type_const_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static(
      $abstract,
      $keyword,
      $type_keyword,
      $name,
      $type_parameters,
      $type_constraint,
      $equal,
      $type_specifier,
      $semicolon
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'abstract' => $this->_abstract,
      'keyword' => $this->_keyword,
      'type_keyword' => $this->_type_keyword,
      'name' => $this->_name,
      'type_parameters' => $this->_type_parameters,
      'type_constraint' => $this->_type_constraint,
      'equal' => $this->_equal,
      'type_specifier' => $this->_type_specifier,
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
    $abstract = $this->_abstract->rewrite($rewriter, $parents);
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $type_keyword = $this->_type_keyword->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    $type_parameters = $this->_type_parameters->rewrite($rewriter, $parents);
    $type_constraint = $this->_type_constraint->rewrite($rewriter, $parents);
    $equal = $this->_equal->rewrite($rewriter, $parents);
    $type_specifier = $this->_type_specifier->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $abstract === $this->_abstract &&
      $keyword === $this->_keyword &&
      $type_keyword === $this->_type_keyword &&
      $name === $this->_name &&
      $type_parameters === $this->_type_parameters &&
      $type_constraint === $this->_type_constraint &&
      $equal === $this->_equal &&
      $type_specifier === $this->_type_specifier &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static(
      $abstract,
      $keyword,
      $type_keyword,
      $name,
      $type_parameters,
      $type_constraint,
      $equal,
      $type_specifier,
      $semicolon
    );
  }

  public function getAbstractUNTYPED(): EditableNode {
    return $this->_abstract;
  }

  /**
   * @return static
   */
  public function withAbstract(EditableNode $value) {
    if ($value === $this->_abstract) {
      return $this;
    }
    return new static(
      $value,
      $this->_keyword,
      $this->_type_keyword,
      $this->_name,
      $this->_type_parameters,
      $this->_type_constraint,
      $this->_equal,
      $this->_type_specifier,
      $this->_semicolon
    );
  }

  public function hasAbstract(): bool {
    return !$this->_abstract->isMissing();
  }

  /**
   * @returns Missing | AbstractToken
   */
  public function getAbstract(): ?AbstractToken {
    if ($this->_abstract->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(AbstractToken::class, $this->_abstract);
  }

  /**
   * @returns AbstractToken
   */
  public function getAbstractx(): AbstractToken {
    return TypeAssert\instance_of(AbstractToken::class, $this->_abstract);
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
      $this->_abstract,
      $value,
      $this->_type_keyword,
      $this->_name,
      $this->_type_parameters,
      $this->_type_constraint,
      $this->_equal,
      $this->_type_specifier,
      $this->_semicolon
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns ConstToken
   */
  public function getKeyword(): ConstToken {
    return TypeAssert\instance_of(ConstToken::class, $this->_keyword);
  }

  /**
   * @returns ConstToken
   */
  public function getKeywordx(): ConstToken {
    return $this->getKeyword();
  }

  public function getTypeKeywordUNTYPED(): EditableNode {
    return $this->_type_keyword;
  }

  /**
   * @return static
   */
  public function withTypeKeyword(EditableNode $value) {
    if ($value === $this->_type_keyword) {
      return $this;
    }
    return new static(
      $this->_abstract,
      $this->_keyword,
      $value,
      $this->_name,
      $this->_type_parameters,
      $this->_type_constraint,
      $this->_equal,
      $this->_type_specifier,
      $this->_semicolon
    );
  }

  public function hasTypeKeyword(): bool {
    return !$this->_type_keyword->isMissing();
  }

  /**
   * @returns TypeToken
   */
  public function getTypeKeyword(): TypeToken {
    return TypeAssert\instance_of(TypeToken::class, $this->_type_keyword);
  }

  /**
   * @returns TypeToken
   */
  public function getTypeKeywordx(): TypeToken {
    return $this->getTypeKeyword();
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
      $this->_abstract,
      $this->_keyword,
      $this->_type_keyword,
      $value,
      $this->_type_parameters,
      $this->_type_constraint,
      $this->_equal,
      $this->_type_specifier,
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

  public function getTypeParametersUNTYPED(): EditableNode {
    return $this->_type_parameters;
  }

  /**
   * @return static
   */
  public function withTypeParameters(EditableNode $value) {
    if ($value === $this->_type_parameters) {
      return $this;
    }
    return new static(
      $this->_abstract,
      $this->_keyword,
      $this->_type_keyword,
      $this->_name,
      $value,
      $this->_type_constraint,
      $this->_equal,
      $this->_type_specifier,
      $this->_semicolon
    );
  }

  public function hasTypeParameters(): bool {
    return !$this->_type_parameters->isMissing();
  }

  /**
   * @returns Missing
   */
  public function getTypeParameters(): ?EditableNode {
    if ($this->_type_parameters->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_type_parameters);
  }

  /**
   * @returns
   */
  public function getTypeParametersx(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_type_parameters);
  }

  public function getTypeConstraintUNTYPED(): EditableNode {
    return $this->_type_constraint;
  }

  /**
   * @return static
   */
  public function withTypeConstraint(EditableNode $value) {
    if ($value === $this->_type_constraint) {
      return $this;
    }
    return new static(
      $this->_abstract,
      $this->_keyword,
      $this->_type_keyword,
      $this->_name,
      $this->_type_parameters,
      $value,
      $this->_equal,
      $this->_type_specifier,
      $this->_semicolon
    );
  }

  public function hasTypeConstraint(): bool {
    return !$this->_type_constraint->isMissing();
  }

  /**
   * @returns Missing | TypeConstraint
   */
  public function getTypeConstraint(): ?TypeConstraint {
    if ($this->_type_constraint->isMissing()) {
      return null;
    }
    return
      TypeAssert\instance_of(TypeConstraint::class, $this->_type_constraint);
  }

  /**
   * @returns TypeConstraint
   */
  public function getTypeConstraintx(): TypeConstraint {
    return
      TypeAssert\instance_of(TypeConstraint::class, $this->_type_constraint);
  }

  public function getEqualUNTYPED(): EditableNode {
    return $this->_equal;
  }

  /**
   * @return static
   */
  public function withEqual(EditableNode $value) {
    if ($value === $this->_equal) {
      return $this;
    }
    return new static(
      $this->_abstract,
      $this->_keyword,
      $this->_type_keyword,
      $this->_name,
      $this->_type_parameters,
      $this->_type_constraint,
      $value,
      $this->_type_specifier,
      $this->_semicolon
    );
  }

  public function hasEqual(): bool {
    return !$this->_equal->isMissing();
  }

  /**
   * @returns Missing | EqualToken
   */
  public function getEqual(): ?EqualToken {
    if ($this->_equal->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EqualToken::class, $this->_equal);
  }

  /**
   * @returns EqualToken
   */
  public function getEqualx(): EqualToken {
    return TypeAssert\instance_of(EqualToken::class, $this->_equal);
  }

  public function getTypeSpecifierUNTYPED(): EditableNode {
    return $this->_type_specifier;
  }

  /**
   * @return static
   */
  public function withTypeSpecifier(EditableNode $value) {
    if ($value === $this->_type_specifier) {
      return $this;
    }
    return new static(
      $this->_abstract,
      $this->_keyword,
      $this->_type_keyword,
      $this->_name,
      $this->_type_parameters,
      $this->_type_constraint,
      $this->_equal,
      $value,
      $this->_semicolon
    );
  }

  public function hasTypeSpecifier(): bool {
    return !$this->_type_specifier->isMissing();
  }

  /**
   * @returns ClosureTypeSpecifier | DictionaryTypeSpecifier |
   * GenericTypeSpecifier | KeysetTypeSpecifier | Missing |
   * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
   * TupleTypeSpecifier | TypeConstant | VectorTypeSpecifier
   */
  public function getTypeSpecifier(): ?EditableNode {
    if ($this->_type_specifier->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_type_specifier);
  }

  /**
   * @returns ClosureTypeSpecifier | DictionaryTypeSpecifier |
   * GenericTypeSpecifier | KeysetTypeSpecifier | NullableTypeSpecifier |
   * ShapeTypeSpecifier | SimpleTypeSpecifier | TupleTypeSpecifier |
   * TypeConstant | VectorTypeSpecifier
   */
  public function getTypeSpecifierx(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_type_specifier);
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
      $this->_abstract,
      $this->_keyword,
      $this->_type_keyword,
      $this->_name,
      $this->_type_parameters,
      $this->_type_constraint,
      $this->_equal,
      $this->_type_specifier,
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
