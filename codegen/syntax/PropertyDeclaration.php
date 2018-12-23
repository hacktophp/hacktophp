<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<117575a6e9acfce27a772e4ae2b2a68a>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class PropertyDeclaration extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_attribute_spec;
  /**
   * @var EditableNode
   */
  private $_modifiers;
  /**
   * @var EditableNode
   */
  private $_type;
  /**
   * @var EditableNode
   */
  private $_declarators;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $attribute_spec,
    EditableNode $modifiers,
    EditableNode $type,
    EditableNode $declarators,
    EditableNode $semicolon
  ) {
    parent::__construct('property_declaration');
    $this->_attribute_spec = $attribute_spec;
    $this->_modifiers = $modifiers;
    $this->_type = $type;
    $this->_declarators = $declarators;
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
    $attribute_spec = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['property_attribute_spec'],
      $file,
      $offset,
      $source
    );
    $offset += $attribute_spec->getWidth();
    $modifiers = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['property_modifiers'],
      $file,
      $offset,
      $source
    );
    $offset += $modifiers->getWidth();
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['property_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    $declarators = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['property_declarators'],
      $file,
      $offset,
      $source
    );
    $offset += $declarators->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['property_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return
      new static($attribute_spec, $modifiers, $type, $declarators, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'attribute_spec' => $this->_attribute_spec,
      'modifiers' => $this->_modifiers,
      'type' => $this->_type,
      'declarators' => $this->_declarators,
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
    $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
    $modifiers = $this->_modifiers->rewrite($rewriter, $parents);
    $type = $this->_type->rewrite($rewriter, $parents);
    $declarators = $this->_declarators->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $attribute_spec === $this->_attribute_spec &&
      $modifiers === $this->_modifiers &&
      $type === $this->_type &&
      $declarators === $this->_declarators &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return
      new static($attribute_spec, $modifiers, $type, $declarators, $semicolon);
  }

  public function getAttributeSpecUNTYPED(): EditableNode {
    return $this->_attribute_spec;
  }

  /**
   * @return static
   */
  public function withAttributeSpec(EditableNode $value) {
    if ($value === $this->_attribute_spec) {
      return $this;
    }
    return new static(
      $value,
      $this->_modifiers,
      $this->_type,
      $this->_declarators,
      $this->_semicolon
    );
  }

  public function hasAttributeSpec(): bool {
    return !$this->_attribute_spec->isMissing();
  }

  /**
   * @return AttributeSpecification | Missing
   */
  public function getAttributeSpec(): ?AttributeSpecification {
    if ($this->_attribute_spec->isMissing()) {
      return null;
    }
    \assert($this->_attribute_spec instanceof AttributeSpecification);
    return $this->_attribute_spec;
  }

  /**
   * @return AttributeSpecification
   */
  public function getAttributeSpecx(): AttributeSpecification {
    \assert($this->_attribute_spec instanceof AttributeSpecification);
    return $this->_attribute_spec;
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
      $this->_attribute_spec,
      $value,
      $this->_type,
      $this->_declarators,
      $this->_semicolon
    );
  }

  public function hasModifiers(): bool {
    return !$this->_modifiers->isMissing();
  }

  /**
   * @return EditableList<EditableNode> | VarToken
   */
  public function getModifiers(): EditableNode {
    \assert($this->_modifiers instanceof EditableNode);
    return $this->_modifiers;
  }

  /**
   * @return EditableList<EditableNode> | VarToken
   */
  public function getModifiersx(): EditableNode {
    return $this->getModifiers();
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
      $this->_attribute_spec,
      $this->_modifiers,
      $value,
      $this->_declarators,
      $this->_semicolon
    );
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @return ClosureTypeSpecifier | DarrayTypeSpecifier |
   * DictionaryTypeSpecifier | GenericTypeSpecifier | MapArrayTypeSpecifier |
   * Missing | NullableTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier
   * | TupleTypeSpecifier | TypeConstant | VarrayTypeSpecifier |
   * VectorArrayTypeSpecifier | VectorTypeSpecifier
   */
  public function getType(): ?EditableNode {
    if ($this->_type->isMissing()) {
      return null;
    }
    \assert($this->_type instanceof EditableNode);
    return $this->_type;
  }

  /**
   * @return ClosureTypeSpecifier | DarrayTypeSpecifier |
   * DictionaryTypeSpecifier | GenericTypeSpecifier | MapArrayTypeSpecifier |
   * NullableTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
   * TupleTypeSpecifier | TypeConstant | VarrayTypeSpecifier |
   * VectorArrayTypeSpecifier | VectorTypeSpecifier
   */
  public function getTypex(): EditableNode {
    \assert($this->_type instanceof EditableNode);
    return $this->_type;
  }

  public function getDeclaratorsUNTYPED(): EditableNode {
    return $this->_declarators;
  }

  /**
   * @return static
   */
  public function withDeclarators(EditableNode $value) {
    if ($value === $this->_declarators) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $this->_modifiers,
      $this->_type,
      $value,
      $this->_semicolon
    );
  }

  public function hasDeclarators(): bool {
    return !$this->_declarators->isMissing();
  }

  /**
   * @return EditableList<PropertyDeclarator>
   */
  public function getDeclarators(): EditableList {
    \assert($this->_declarators instanceof EditableList);
    return $this->_declarators;
  }

  /**
   * @return EditableList<PropertyDeclarator>
   */
  public function getDeclaratorsx(): EditableList {
    return $this->getDeclarators();
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
      $this->_attribute_spec,
      $this->_modifiers,
      $this->_type,
      $this->_declarators,
      $value
    );
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
