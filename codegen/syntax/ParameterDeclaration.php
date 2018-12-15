<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3098dc5df2a146e1613910226564a4f0>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class ParameterDeclaration extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_attribute;
  /**
   * @var EditableNode
   */
  private $_visibility;
  /**
   * @var EditableNode
   */
  private $_call_convention;
  /**
   * @var EditableNode
   */
  private $_type;
  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_default_value;

  public function __construct(
    EditableNode $attribute,
    EditableNode $visibility,
    EditableNode $call_convention,
    EditableNode $type,
    EditableNode $name,
    EditableNode $default_value
  ) {
    parent::__construct('parameter_declaration');
    $this->_attribute = $attribute;
    $this->_visibility = $visibility;
    $this->_call_convention = $call_convention;
    $this->_type = $type;
    $this->_name = $name;
    $this->_default_value = $default_value;
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
    $attribute = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['parameter_attribute'],
      $file,
      $offset,
      $source
    );
    $offset += $attribute->getWidth();
    $visibility = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['parameter_visibility'],
      $file,
      $offset,
      $source
    );
    $offset += $visibility->getWidth();
    $call_convention = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['parameter_call_convention'],
      $file,
      $offset,
      $source
    );
    $offset += $call_convention->getWidth();
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['parameter_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['parameter_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $default_value = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['parameter_default_value'],
      $file,
      $offset,
      $source
    );
    $offset += $default_value->getWidth();
    return new static(
      $attribute,
      $visibility,
      $call_convention,
      $type,
      $name,
      $default_value
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'attribute' => $this->_attribute,
      'visibility' => $this->_visibility,
      'call_convention' => $this->_call_convention,
      'type' => $this->_type,
      'name' => $this->_name,
      'default_value' => $this->_default_value,
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
    $attribute = $this->_attribute->rewrite($rewriter, $parents);
    $visibility = $this->_visibility->rewrite($rewriter, $parents);
    $call_convention = $this->_call_convention->rewrite($rewriter, $parents);
    $type = $this->_type->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    $default_value = $this->_default_value->rewrite($rewriter, $parents);
    if (
      $attribute === $this->_attribute &&
      $visibility === $this->_visibility &&
      $call_convention === $this->_call_convention &&
      $type === $this->_type &&
      $name === $this->_name &&
      $default_value === $this->_default_value
    ) {
      return $this;
    }
    return new static(
      $attribute,
      $visibility,
      $call_convention,
      $type,
      $name,
      $default_value
    );
  }

  public function getAttributeUNTYPED(): EditableNode {
    return $this->_attribute;
  }

  /**
   * @return static
   */
  public function withAttribute(EditableNode $value) {
    if ($value === $this->_attribute) {
      return $this;
    }
    return new static(
      $value,
      $this->_visibility,
      $this->_call_convention,
      $this->_type,
      $this->_name,
      $this->_default_value
    );
  }

  public function hasAttribute(): bool {
    return !$this->_attribute->isMissing();
  }

  /**
   * @return AttributeSpecification | Missing
   */
  public function getAttribute(): ?AttributeSpecification {
    if ($this->_attribute->isMissing()) {
      return null;
    }
    \assert($this->_attribute instanceof AttributeSpecification);
    return $this->_attribute;
  }

  /**
   * @return AttributeSpecification
   */
  public function getAttributex(): AttributeSpecification {
    \assert($this->_attribute instanceof AttributeSpecification);
    return $this->_attribute;
  }

  public function getVisibilityUNTYPED(): EditableNode {
    return $this->_visibility;
  }

  /**
   * @return static
   */
  public function withVisibility(EditableNode $value) {
    if ($value === $this->_visibility) {
      return $this;
    }
    return new static(
      $this->_attribute,
      $value,
      $this->_call_convention,
      $this->_type,
      $this->_name,
      $this->_default_value
    );
  }

  public function hasVisibility(): bool {
    return !$this->_visibility->isMissing();
  }

  /**
   * @return null | PrivateToken | ProtectedToken | PublicToken
   */
  public function getVisibility(): ?EditableToken {
    if ($this->_visibility->isMissing()) {
      return null;
    }
    \assert($this->_visibility instanceof EditableToken);
    return $this->_visibility;
  }

  /**
   * @return PrivateToken | ProtectedToken | PublicToken
   */
  public function getVisibilityx(): EditableToken {
    \assert($this->_visibility instanceof EditableToken);
    return $this->_visibility;
  }

  public function getCallConventionUNTYPED(): EditableNode {
    return $this->_call_convention;
  }

  /**
   * @return static
   */
  public function withCallConvention(EditableNode $value) {
    if ($value === $this->_call_convention) {
      return $this;
    }
    return new static(
      $this->_attribute,
      $this->_visibility,
      $value,
      $this->_type,
      $this->_name,
      $this->_default_value
    );
  }

  public function hasCallConvention(): bool {
    return !$this->_call_convention->isMissing();
  }

  /**
   * @return null | InoutToken
   */
  public function getCallConvention(): ?InoutToken {
    if ($this->_call_convention->isMissing()) {
      return null;
    }
    \assert($this->_call_convention instanceof InoutToken);
    return $this->_call_convention;
  }

  /**
   * @return InoutToken
   */
  public function getCallConventionx(): InoutToken {
    \assert($this->_call_convention instanceof InoutToken);
    return $this->_call_convention;
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
      $this->_attribute,
      $this->_visibility,
      $this->_call_convention,
      $value,
      $this->_name,
      $this->_default_value
    );
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
   * DarrayTypeSpecifier | DictionaryTypeSpecifier | GenericTypeSpecifier |
   * KeysetTypeSpecifier | MapArrayTypeSpecifier | Missing |
   * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
   * SoftTypeSpecifier | TupleTypeSpecifier | TypeConstant |
   * VarrayTypeSpecifier | VectorArrayTypeSpecifier | VectorTypeSpecifier
   */
  public function getType(): ?EditableNode {
    if ($this->_type->isMissing()) {
      return null;
    }
    \assert($this->_type instanceof EditableNode);
    return $this->_type;
  }

  /**
   * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
   * DarrayTypeSpecifier | DictionaryTypeSpecifier | GenericTypeSpecifier |
   * KeysetTypeSpecifier | MapArrayTypeSpecifier | NullableTypeSpecifier |
   * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
   * TupleTypeSpecifier | TypeConstant | VarrayTypeSpecifier |
   * VectorArrayTypeSpecifier | VectorTypeSpecifier
   */
  public function getTypex(): EditableNode {
    \assert($this->_type instanceof EditableNode);
    return $this->_type;
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
      $this->_attribute,
      $this->_visibility,
      $this->_call_convention,
      $this->_type,
      $value,
      $this->_default_value
    );
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return DecoratedExpression | Missing | VariableToken
   */
  public function getName(): ?EditableNode {
    if ($this->_name->isMissing()) {
      return null;
    }
    \assert($this->_name instanceof EditableNode);
    return $this->_name;
  }

  /**
   * @return DecoratedExpression | VariableToken
   */
  public function getNamex(): EditableNode {
    \assert($this->_name instanceof EditableNode);
    return $this->_name;
  }

  public function getDefaultValueUNTYPED(): EditableNode {
    return $this->_default_value;
  }

  /**
   * @return static
   */
  public function withDefaultValue(EditableNode $value) {
    if ($value === $this->_default_value) {
      return $this;
    }
    return new static(
      $this->_attribute,
      $this->_visibility,
      $this->_call_convention,
      $this->_type,
      $this->_name,
      $value
    );
  }

  public function hasDefaultValue(): bool {
    return !$this->_default_value->isMissing();
  }

  /**
   * @return null | SimpleInitializer
   */
  public function getDefaultValue(): ?SimpleInitializer {
    if ($this->_default_value->isMissing()) {
      return null;
    }
    \assert($this->_default_value instanceof SimpleInitializer);
    return $this->_default_value;
  }

  /**
   * @return SimpleInitializer
   */
  public function getDefaultValuex(): SimpleInitializer {
    \assert($this->_default_value instanceof SimpleInitializer);
    return $this->_default_value;
  }
}
