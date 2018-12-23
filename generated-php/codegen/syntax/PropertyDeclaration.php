<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6a0228d7313440582561c59f7f06a726>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class PropertyDeclaration extends EditableNode
{
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
    public function __construct(EditableNode $attribute_spec, EditableNode $modifiers, EditableNode $type, EditableNode $declarators, EditableNode $semicolon)
    {
        parent::__construct('property_declaration');
        $this->_attribute_spec = $attribute_spec;
        $this->_modifiers = $modifiers;
        $this->_type = $type;
        $this->_declarators = $declarators;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $attribute_spec = EditableNode::fromJSON($json['property_attribute_spec'], $file, $offset, $source);
        $offset += $attribute_spec->getWidth();
        $modifiers = EditableNode::fromJSON($json['property_modifiers'], $file, $offset, $source);
        $offset += $modifiers->getWidth();
        $type = EditableNode::fromJSON($json['property_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $declarators = EditableNode::fromJSON($json['property_declarators'], $file, $offset, $source);
        $offset += $declarators->getWidth();
        $semicolon = EditableNode::fromJSON($json['property_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($attribute_spec, $modifiers, $type, $declarators, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('attribute_spec' => $this->_attribute_spec, 'modifiers' => $this->_modifiers, 'type' => $this->_type, 'declarators' => $this->_declarators, 'semicolon' => $this->_semicolon);
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
        $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
        $modifiers = $this->_modifiers->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $declarators = $this->_declarators->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($attribute_spec === $this->_attribute_spec && $modifiers === $this->_modifiers && $type === $this->_type && $declarators === $this->_declarators && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($attribute_spec, $modifiers, $type, $declarators, $semicolon);
    }
    /**
     * @return EditableNode
     */
    public function getAttributeSpecUNTYPED()
    {
        return $this->_attribute_spec;
    }
    /**
     * @return static
     */
    public function withAttributeSpec(EditableNode $value)
    {
        if ($value === $this->_attribute_spec) {
            return $this;
        }
        return new static($value, $this->_modifiers, $this->_type, $this->_declarators, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasAttributeSpec()
    {
        return !$this->_attribute_spec->isMissing();
    }
    /**
     * @return AttributeSpecification | null
     */
    /**
     * @return null|AttributeSpecification
     */
    public function getAttributeSpec()
    {
        if ($this->_attribute_spec->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute_spec);
    }
    /**
     * @return AttributeSpecification
     */
    /**
     * @return AttributeSpecification
     */
    public function getAttributeSpecx()
    {
        return TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute_spec);
    }
    /**
     * @return EditableNode
     */
    public function getModifiersUNTYPED()
    {
        return $this->_modifiers;
    }
    /**
     * @return static
     */
    public function withModifiers(EditableNode $value)
    {
        if ($value === $this->_modifiers) {
            return $this;
        }
        return new static($this->_attribute_spec, $value, $this->_type, $this->_declarators, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasModifiers()
    {
        return !$this->_modifiers->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | VarToken
     */
    /**
     * @return EditableNode
     */
    public function getModifiers()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_modifiers);
    }
    /**
     * @return EditableList<EditableNode> | VarToken
     */
    /**
     * @return EditableNode
     */
    public function getModifiersx()
    {
        return $this->getModifiers();
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
        return new static($this->_attribute_spec, $this->_modifiers, $value, $this->_declarators, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return ClosureTypeSpecifier | DarrayTypeSpecifier |
     * DictionaryTypeSpecifier | GenericTypeSpecifier | MapArrayTypeSpecifier |
     * null | NullableTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
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
     * @return ClosureTypeSpecifier | DarrayTypeSpecifier |
     * DictionaryTypeSpecifier | GenericTypeSpecifier | MapArrayTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
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
    public function getDeclaratorsUNTYPED()
    {
        return $this->_declarators;
    }
    /**
     * @return static
     */
    public function withDeclarators(EditableNode $value)
    {
        if ($value === $this->_declarators) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_modifiers, $this->_type, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasDeclarators()
    {
        return !$this->_declarators->isMissing();
    }
    /**
     * @return EditableList<PropertyDeclarator>
     */
    /**
     * @return EditableList<PropertyDeclarator>
     */
    public function getDeclarators()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_declarators);
    }
    /**
     * @return EditableList<PropertyDeclarator>
     */
    /**
     * @return EditableList<PropertyDeclarator>
     */
    public function getDeclaratorsx()
    {
        return $this->getDeclarators();
    }
    /**
     * @return EditableNode
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(EditableNode $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_modifiers, $this->_type, $this->_declarators, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

