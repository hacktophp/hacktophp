<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<263b3e09f94796a9099579ce6cec0921>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ParameterDeclaration extends EditableNode
{
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
    public function __construct(EditableNode $attribute, EditableNode $visibility, EditableNode $call_convention, EditableNode $type, EditableNode $name, EditableNode $default_value)
    {
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
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $attribute = EditableNode::fromJSON($json['parameter_attribute'], $file, $offset, $source);
        $offset += $attribute->getWidth();
        $visibility = EditableNode::fromJSON($json['parameter_visibility'], $file, $offset, $source);
        $offset += $visibility->getWidth();
        $call_convention = EditableNode::fromJSON($json['parameter_call_convention'], $file, $offset, $source);
        $offset += $call_convention->getWidth();
        $type = EditableNode::fromJSON($json['parameter_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $name = EditableNode::fromJSON($json['parameter_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $default_value = EditableNode::fromJSON($json['parameter_default_value'], $file, $offset, $source);
        $offset += $default_value->getWidth();
        return new static($attribute, $visibility, $call_convention, $type, $name, $default_value);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('attribute' => $this->_attribute, 'visibility' => $this->_visibility, 'call_convention' => $this->_call_convention, 'type' => $this->_type, 'name' => $this->_name, 'default_value' => $this->_default_value);
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? array() : (array) $parents;
        $parents[] = $this;
        $attribute = $this->_attribute->rewrite($rewriter, $parents);
        $visibility = $this->_visibility->rewrite($rewriter, $parents);
        $call_convention = $this->_call_convention->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $default_value = $this->_default_value->rewrite($rewriter, $parents);
        if ($attribute === $this->_attribute && $visibility === $this->_visibility && $call_convention === $this->_call_convention && $type === $this->_type && $name === $this->_name && $default_value === $this->_default_value) {
            return $this;
        }
        return new static($attribute, $visibility, $call_convention, $type, $name, $default_value);
    }
    /**
     * @return EditableNode
     */
    public function getAttributeUNTYPED()
    {
        return $this->_attribute;
    }
    /**
     * @return static
     */
    public function withAttribute(EditableNode $value)
    {
        if ($value === $this->_attribute) {
            return $this;
        }
        return new static($value, $this->_visibility, $this->_call_convention, $this->_type, $this->_name, $this->_default_value);
    }
    /**
     * @return bool
     */
    public function hasAttribute()
    {
        return !$this->_attribute->isMissing();
    }
    /**
     * @return AttributeSpecification | null
     */
    /**
     * @return null|AttributeSpecification
     */
    public function getAttribute()
    {
        if ($this->_attribute->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute);
    }
    /**
     * @return AttributeSpecification
     */
    /**
     * @return AttributeSpecification
     */
    public function getAttributex()
    {
        return TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute);
    }
    /**
     * @return EditableNode
     */
    public function getVisibilityUNTYPED()
    {
        return $this->_visibility;
    }
    /**
     * @return static
     */
    public function withVisibility(EditableNode $value)
    {
        if ($value === $this->_visibility) {
            return $this;
        }
        return new static($this->_attribute, $value, $this->_call_convention, $this->_type, $this->_name, $this->_default_value);
    }
    /**
     * @return bool
     */
    public function hasVisibility()
    {
        return !$this->_visibility->isMissing();
    }
    /**
     * @return null | PrivateToken | ProtectedToken | PublicToken
     */
    /**
     * @return null|EditableToken
     */
    public function getVisibility()
    {
        if ($this->_visibility->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableToken::class, $this->_visibility);
    }
    /**
     * @return PrivateToken | ProtectedToken | PublicToken
     */
    /**
     * @return EditableToken
     */
    public function getVisibilityx()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_visibility);
    }
    /**
     * @return EditableNode
     */
    public function getCallConventionUNTYPED()
    {
        return $this->_call_convention;
    }
    /**
     * @return static
     */
    public function withCallConvention(EditableNode $value)
    {
        if ($value === $this->_call_convention) {
            return $this;
        }
        return new static($this->_attribute, $this->_visibility, $value, $this->_type, $this->_name, $this->_default_value);
    }
    /**
     * @return bool
     */
    public function hasCallConvention()
    {
        return !$this->_call_convention->isMissing();
    }
    /**
     * @return null | InoutToken
     */
    /**
     * @return null|InoutToken
     */
    public function getCallConvention()
    {
        if ($this->_call_convention->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(InoutToken::class, $this->_call_convention);
    }
    /**
     * @return InoutToken
     */
    /**
     * @return InoutToken
     */
    public function getCallConventionx()
    {
        return TypeAssert\instance_of(InoutToken::class, $this->_call_convention);
    }
    /**
     * @return EditableNode
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(EditableNode $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_attribute, $this->_visibility, $this->_call_convention, $value, $this->_name, $this->_default_value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
     * DarrayTypeSpecifier | DictionaryTypeSpecifier | GenericTypeSpecifier |
     * KeysetTypeSpecifier | MapArrayTypeSpecifier | null | NullableTypeSpecifier
     * | ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
     * TupleTypeSpecifier | TypeConstant | VarrayTypeSpecifier |
     * VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return null|EditableNode
     */
    public function getType()
    {
        if ($this->_type->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
     * DarrayTypeSpecifier | DictionaryTypeSpecifier | GenericTypeSpecifier |
     * KeysetTypeSpecifier | MapArrayTypeSpecifier | NullableTypeSpecifier |
     * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
     * TupleTypeSpecifier | TypeConstant | VarrayTypeSpecifier |
     * VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return EditableNode
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(EditableNode $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_attribute, $this->_visibility, $this->_call_convention, $this->_type, $value, $this->_default_value);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return DecoratedExpression | null | VariableToken
     */
    /**
     * @return null|EditableNode
     */
    public function getName()
    {
        if ($this->_name->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_name);
    }
    /**
     * @return DecoratedExpression | VariableToken
     */
    /**
     * @return EditableNode
     */
    public function getNamex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_name);
    }
    /**
     * @return EditableNode
     */
    public function getDefaultValueUNTYPED()
    {
        return $this->_default_value;
    }
    /**
     * @return static
     */
    public function withDefaultValue(EditableNode $value)
    {
        if ($value === $this->_default_value) {
            return $this;
        }
        return new static($this->_attribute, $this->_visibility, $this->_call_convention, $this->_type, $this->_name, $value);
    }
    /**
     * @return bool
     */
    public function hasDefaultValue()
    {
        return !$this->_default_value->isMissing();
    }
    /**
     * @return null | SimpleInitializer
     */
    /**
     * @return null|SimpleInitializer
     */
    public function getDefaultValue()
    {
        if ($this->_default_value->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(SimpleInitializer::class, $this->_default_value);
    }
    /**
     * @return SimpleInitializer
     */
    /**
     * @return SimpleInitializer
     */
    public function getDefaultValuex()
    {
        return TypeAssert\instance_of(SimpleInitializer::class, $this->_default_value);
    }
}

