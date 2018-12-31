<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a1f0b89a8b0fbc1763cacfe591e2c18a>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class AliasDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute_spec;
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
    private $_generic_parameter;
    /**
     * @var EditableNode
     */
    private $_constraint;
    /**
     * @var EditableNode
     */
    private $_equal;
    /**
     * @var EditableNode
     */
    private $_type;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $attribute_spec, EditableNode $keyword, EditableNode $name, EditableNode $generic_parameter, EditableNode $constraint, EditableNode $equal, EditableNode $type, EditableNode $semicolon)
    {
        parent::__construct('alias_declaration');
        $this->_attribute_spec = $attribute_spec;
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_generic_parameter = $generic_parameter;
        $this->_constraint = $constraint;
        $this->_equal = $equal;
        $this->_type = $type;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $attribute_spec = EditableNode::fromJSON($json['alias_attribute_spec'], $file, $offset, $source);
        $offset += $attribute_spec->getWidth();
        $keyword = EditableNode::fromJSON($json['alias_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $name = EditableNode::fromJSON($json['alias_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $generic_parameter = EditableNode::fromJSON($json['alias_generic_parameter'], $file, $offset, $source);
        $offset += $generic_parameter->getWidth();
        $constraint = EditableNode::fromJSON($json['alias_constraint'], $file, $offset, $source);
        $offset += $constraint->getWidth();
        $equal = EditableNode::fromJSON($json['alias_equal'], $file, $offset, $source);
        $offset += $equal->getWidth();
        $type = EditableNode::fromJSON($json['alias_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $semicolon = EditableNode::fromJSON($json['alias_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($attribute_spec, $keyword, $name, $generic_parameter, $constraint, $equal, $type, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['attribute_spec' => $this->_attribute_spec, 'keyword' => $this->_keyword, 'name' => $this->_name, 'generic_parameter' => $this->_generic_parameter, 'constraint' => $this->_constraint, 'equal' => $this->_equal, 'type' => $this->_type, 'semicolon' => $this->_semicolon];
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? [] : (array) $parents;
        $parents[] = $this;
        $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $generic_parameter = $this->_generic_parameter->rewrite($rewriter, $parents);
        $constraint = $this->_constraint->rewrite($rewriter, $parents);
        $equal = $this->_equal->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($attribute_spec === $this->_attribute_spec && $keyword === $this->_keyword && $name === $this->_name && $generic_parameter === $this->_generic_parameter && $constraint === $this->_constraint && $equal === $this->_equal && $type === $this->_type && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($attribute_spec, $keyword, $name, $generic_parameter, $constraint, $equal, $type, $semicolon);
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
        return new static($value, $this->_keyword, $this->_name, $this->_generic_parameter, $this->_constraint, $this->_equal, $this->_type, $this->_semicolon);
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
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(EditableNode $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $value, $this->_name, $this->_generic_parameter, $this->_constraint, $this->_equal, $this->_type, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return NewtypeToken | TypeToken
     */
    /**
     * @return EditableToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_keyword);
    }
    /**
     * @return NewtypeToken | TypeToken
     */
    /**
     * @return EditableToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
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
        return new static($this->_attribute_spec, $this->_keyword, $value, $this->_generic_parameter, $this->_constraint, $this->_equal, $this->_type, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_name);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return EditableNode
     */
    public function getGenericParameterUNTYPED()
    {
        return $this->_generic_parameter;
    }
    /**
     * @return static
     */
    public function withGenericParameter(EditableNode $value)
    {
        if ($value === $this->_generic_parameter) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $value, $this->_constraint, $this->_equal, $this->_type, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasGenericParameter()
    {
        return !$this->_generic_parameter->isMissing();
    }
    /**
     * @return null | TypeParameters
     */
    /**
     * @return null|TypeParameters
     */
    public function getGenericParameter()
    {
        if ($this->_generic_parameter->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(TypeParameters::class, $this->_generic_parameter);
    }
    /**
     * @return TypeParameters
     */
    /**
     * @return TypeParameters
     */
    public function getGenericParameterx()
    {
        return TypeAssert\instance_of(TypeParameters::class, $this->_generic_parameter);
    }
    /**
     * @return EditableNode
     */
    public function getConstraintUNTYPED()
    {
        return $this->_constraint;
    }
    /**
     * @return static
     */
    public function withConstraint(EditableNode $value)
    {
        if ($value === $this->_constraint) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_generic_parameter, $value, $this->_equal, $this->_type, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasConstraint()
    {
        return !$this->_constraint->isMissing();
    }
    /**
     * @return null | TypeConstraint
     */
    /**
     * @return null|TypeConstraint
     */
    public function getConstraint()
    {
        if ($this->_constraint->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(TypeConstraint::class, $this->_constraint);
    }
    /**
     * @return TypeConstraint
     */
    /**
     * @return TypeConstraint
     */
    public function getConstraintx()
    {
        return TypeAssert\instance_of(TypeConstraint::class, $this->_constraint);
    }
    /**
     * @return EditableNode
     */
    public function getEqualUNTYPED()
    {
        return $this->_equal;
    }
    /**
     * @return static
     */
    public function withEqual(EditableNode $value)
    {
        if ($value === $this->_equal) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_generic_parameter, $this->_constraint, $value, $this->_type, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasEqual()
    {
        return !$this->_equal->isMissing();
    }
    /**
     * @return EqualToken
     */
    /**
     * @return EqualToken
     */
    public function getEqual()
    {
        return TypeAssert\instance_of(EqualToken::class, $this->_equal);
    }
    /**
     * @return EqualToken
     */
    /**
     * @return EqualToken
     */
    public function getEqualx()
    {
        return $this->getEqual();
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
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_generic_parameter, $this->_constraint, $this->_equal, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | KeysetTypeSpecifier | MapArrayTypeSpecifier |
     * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier | VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | KeysetTypeSpecifier | MapArrayTypeSpecifier |
     * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier | VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return $this->getType();
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
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_generic_parameter, $this->_constraint, $this->_equal, $this->_type, $value);
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

