<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ec668586f3d06a259177d749e406ba62>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
abstract class ParameterDeclarationGeneratedBase extends Node implements IHasTypeHint, IHasAttributeSpec, IParameter
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'parameter_declaration';
    /**
     * @var null|OldAttributeSpecification
     */
    private $_attribute;
    /**
     * @var null|Token
     */
    private $_visibility;
    /**
     * @var null|InoutToken
     */
    private $_call_convention;
    /**
     * @var null|ITypeSpecifier
     */
    private $_type;
    /**
     * @var IExpression
     */
    private $_name;
    /**
     * @var null|SimpleInitializer
     */
    private $_default_value;
    public function __construct(?OldAttributeSpecification $attribute, ?Token $visibility, ?InoutToken $call_convention, ?ITypeSpecifier $type, IExpression $name, ?SimpleInitializer $default_value, ?array $source_ref = null)
    {
        $this->_attribute = $attribute;
        $this->_visibility = $visibility;
        $this->_call_convention = $call_convention;
        $this->_type = $type;
        $this->_name = $name;
        $this->_default_value = $default_value;
        parent::__construct($source_ref);
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $initial_offset, string $source, string $_type_hint)
    {
        $offset = $initial_offset;
        $attribute = Node::fromJSON($json['parameter_attribute'], $file, $offset, $source, 'OldAttributeSpecification');
        $offset += (($__tmp1__ = $attribute) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $visibility = Node::fromJSON($json['parameter_visibility'], $file, $offset, $source, 'Token');
        $offset += (($__tmp2__ = $visibility) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $call_convention = Node::fromJSON($json['parameter_call_convention'], $file, $offset, $source, 'InoutToken');
        $offset += (($__tmp3__ = $call_convention) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $type = Node::fromJSON($json['parameter_type'], $file, $offset, $source, 'ITypeSpecifier');
        $offset += (($__tmp4__ = $type) !== null ? $__tmp4__->getWidth() : null) ?? 0;
        $name = Node::fromJSON($json['parameter_name'], $file, $offset, $source, 'IExpression');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $default_value = Node::fromJSON($json['parameter_default_value'], $file, $offset, $source, 'SimpleInitializer');
        $offset += (($__tmp5__ = $default_value) !== null ? $__tmp5__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute, $visibility, $call_convention, $type, $name, $default_value, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute' => $this->_attribute, 'visibility' => $this->_visibility, 'call_convention' => $this->_call_convention, 'type' => $this->_type, 'name' => $this->_name, 'default_value' => $this->_default_value]);
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return static
     */
    public function rewriteChildren(\Closure $rewriter, array $parents = [])
    {
        $parents[] = $this;
        $attribute = $this->_attribute === null ? null : $rewriter($this->_attribute, $parents);
        $visibility = $this->_visibility === null ? null : $rewriter($this->_visibility, $parents);
        $call_convention = $this->_call_convention === null ? null : $rewriter($this->_call_convention, $parents);
        $type = $this->_type === null ? null : $rewriter($this->_type, $parents);
        $name = $rewriter($this->_name, $parents);
        $default_value = $this->_default_value === null ? null : $rewriter($this->_default_value, $parents);
        if ($attribute === $this->_attribute && $visibility === $this->_visibility && $call_convention === $this->_call_convention && $type === $this->_type && $name === $this->_name && $default_value === $this->_default_value) {
            return $this;
        }
        return new static($attribute, $visibility, $call_convention, $type, $name, $default_value);
    }
    /**
     * @return null|Node
     */
    public function getAttributeUNTYPED()
    {
        return $this->_attribute;
    }
    /**
     * @return static
     */
    public function withAttribute(?OldAttributeSpecification $value)
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
        return $this->_attribute !== null;
    }
    /**
     * @return null | OldAttributeSpecification
     */
    /**
     * @return null|OldAttributeSpecification
     */
    public function getAttribute()
    {
        return $this->_attribute;
    }
    /**
     * @return OldAttributeSpecification
     */
    /**
     * @return OldAttributeSpecification
     */
    public function getAttributex()
    {
        return TypeAssert\not_null($this->getAttribute());
    }
    /**
     * @return null|Node
     */
    public function getVisibilityUNTYPED()
    {
        return $this->_visibility;
    }
    /**
     * @return static
     */
    public function withVisibility(?Token $value)
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
        return $this->_visibility !== null;
    }
    /**
     * @return null | PrivateToken | ProtectedToken | PublicToken
     */
    /**
     * @return null|Token
     */
    public function getVisibility()
    {
        return $this->_visibility;
    }
    /**
     * @return PrivateToken | ProtectedToken | PublicToken
     */
    /**
     * @return Token
     */
    public function getVisibilityx()
    {
        return TypeAssert\not_null($this->getVisibility());
    }
    /**
     * @return null|Node
     */
    public function getCallConventionUNTYPED()
    {
        return $this->_call_convention;
    }
    /**
     * @return static
     */
    public function withCallConvention(?InoutToken $value)
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
        return $this->_call_convention !== null;
    }
    /**
     * @return null | InoutToken
     */
    /**
     * @return null|InoutToken
     */
    public function getCallConvention()
    {
        return $this->_call_convention;
    }
    /**
     * @return InoutToken
     */
    /**
     * @return InoutToken
     */
    public function getCallConventionx()
    {
        return TypeAssert\not_null($this->getCallConvention());
    }
    /**
     * @return null|Node
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(?ITypeSpecifier $value)
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
        return $this->_type !== null;
    }
    /**
     * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
     * DarrayTypeSpecifier | DictionaryTypeSpecifier | GenericTypeSpecifier |
     * KeysetTypeSpecifier | LikeTypeSpecifier | MapArrayTypeSpecifier | null |
     * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * SoftTypeSpecifier | TupleTypeSpecifier | TypeConstant |
     * VarrayTypeSpecifier | VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return null|ITypeSpecifier
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
     * DarrayTypeSpecifier | DictionaryTypeSpecifier | GenericTypeSpecifier |
     * KeysetTypeSpecifier | LikeTypeSpecifier | MapArrayTypeSpecifier |
     * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * SoftTypeSpecifier | TupleTypeSpecifier | TypeConstant |
     * VarrayTypeSpecifier | VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return TypeAssert\not_null($this->getType());
    }
    /**
     * @return null|Node
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(IExpression $value)
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
        return $this->_name !== null;
    }
    /**
     * @return DecoratedExpression | VariableToken
     */
    /**
     * @return IExpression
     */
    public function getName()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_name);
    }
    /**
     * @return DecoratedExpression | VariableToken
     */
    /**
     * @return IExpression
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return null|Node
     */
    public function getDefaultValueUNTYPED()
    {
        return $this->_default_value;
    }
    /**
     * @return static
     */
    public function withDefaultValue(?SimpleInitializer $value)
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
        return $this->_default_value !== null;
    }
    /**
     * @return null | SimpleInitializer
     */
    /**
     * @return null|SimpleInitializer
     */
    public function getDefaultValue()
    {
        return $this->_default_value;
    }
    /**
     * @return SimpleInitializer
     */
    /**
     * @return SimpleInitializer
     */
    public function getDefaultValuex()
    {
        return TypeAssert\not_null($this->getDefaultValue());
    }
}

