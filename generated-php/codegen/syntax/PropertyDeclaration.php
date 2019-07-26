<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<7649910cb5c2fb2b399b0d7d2abddf79>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PropertyDeclaration extends Node implements IClassBodyDeclaration, IHasTypeHint, IHasAttributeSpec
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'property_declaration';
    /**
     * @var null|OldAttributeSpecification
     */
    private $_attribute_spec;
    /**
     * @var Node
     */
    private $_modifiers;
    /**
     * @var null|ITypeSpecifier
     */
    private $_type;
    /**
     * @var NodeList<ListItem<PropertyDeclarator>>
     */
    private $_declarators;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    /**
     * @param NodeList<ListItem<PropertyDeclarator>> $declarators
     */
    public function __construct(?OldAttributeSpecification $attribute_spec, Node $modifiers, ?ITypeSpecifier $type, NodeList $declarators, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_attribute_spec = $attribute_spec;
        $this->_modifiers = $modifiers;
        $this->_type = $type;
        $this->_declarators = $declarators;
        $this->_semicolon = $semicolon;
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
        $attribute_spec = Node::fromJSON($json['property_attribute_spec'], $file, $offset, $source, 'OldAttributeSpecification');
        $offset += (($__tmp1__ = $attribute_spec) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $modifiers = Node::fromJSON($json['property_modifiers'], $file, $offset, $source, 'Node');
        $modifiers = $modifiers !== null ? $modifiers : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $modifiers->getWidth();
        $type = Node::fromJSON($json['property_type'], $file, $offset, $source, 'ITypeSpecifier');
        $offset += (($__tmp2__ = $type) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $declarators = Node::fromJSON($json['property_declarators'], $file, $offset, $source, 'NodeList<ListItem<PropertyDeclarator>>');
        $declarators = $declarators !== null ? $declarators : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $declarators->getWidth();
        $semicolon = Node::fromJSON($json['property_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute_spec, $modifiers, $type, $declarators, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute_spec' => $this->_attribute_spec, 'modifiers' => $this->_modifiers, 'type' => $this->_type, 'declarators' => $this->_declarators, 'semicolon' => $this->_semicolon]);
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
        $attribute_spec = $this->_attribute_spec === null ? null : $rewriter($this->_attribute_spec, $parents);
        $modifiers = $rewriter($this->_modifiers, $parents);
        $type = $this->_type === null ? null : $rewriter($this->_type, $parents);
        $declarators = $rewriter($this->_declarators, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($attribute_spec === $this->_attribute_spec && $modifiers === $this->_modifiers && $type === $this->_type && $declarators === $this->_declarators && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($attribute_spec, $modifiers, $type, $declarators, $semicolon);
    }
    /**
     * @return null|Node
     */
    public function getAttributeSpecUNTYPED()
    {
        return $this->_attribute_spec;
    }
    /**
     * @return static
     */
    public function withAttributeSpec(?OldAttributeSpecification $value)
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
        return $this->_attribute_spec !== null;
    }
    /**
     * @return null | OldAttributeSpecification
     */
    /**
     * @return null|OldAttributeSpecification
     */
    public function getAttributeSpec()
    {
        return $this->_attribute_spec;
    }
    /**
     * @return OldAttributeSpecification
     */
    /**
     * @return OldAttributeSpecification
     */
    public function getAttributeSpecx()
    {
        return TypeAssert\not_null($this->getAttributeSpec());
    }
    /**
     * @return null|Node
     */
    public function getModifiersUNTYPED()
    {
        return $this->_modifiers;
    }
    /**
     * @return static
     */
    public function withModifiers(Node $value)
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
        return $this->_modifiers !== null;
    }
    /**
     * @return NodeList<PrivateToken> | NodeList<Token> |
     * NodeList<ProtectedToken> | NodeList<PublicToken> | NodeList<StaticToken> |
     * VarToken
     */
    /**
     * @return Node
     */
    public function getModifiers()
    {
        return $this->_modifiers;
    }
    /**
     * @return NodeList<PrivateToken> | NodeList<Token> |
     * NodeList<ProtectedToken> | NodeList<PublicToken> | NodeList<StaticToken> |
     * VarToken
     */
    /**
     * @return Node
     */
    public function getModifiersx()
    {
        return $this->getModifiers();
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
        return new static($this->_attribute_spec, $this->_modifiers, $value, $this->_declarators, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return ClosureTypeSpecifier | DarrayTypeSpecifier |
     * DictionaryTypeSpecifier | GenericTypeSpecifier | LikeTypeSpecifier |
     * MapArrayTypeSpecifier | null | NullableTypeSpecifier | SimpleTypeSpecifier
     * | SoftTypeSpecifier | TupleTypeSpecifier | TypeConstant |
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
     * @return ClosureTypeSpecifier | DarrayTypeSpecifier |
     * DictionaryTypeSpecifier | GenericTypeSpecifier | LikeTypeSpecifier |
     * MapArrayTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier |
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
    public function getDeclaratorsUNTYPED()
    {
        return $this->_declarators;
    }
    /**
     * @param NodeList<ListItem<PropertyDeclarator>> $value
     *
     * @return static
     */
    public function withDeclarators(NodeList $value)
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
        return $this->_declarators !== null;
    }
    /**
     * @return NodeList<ListItem<PropertyDeclarator>>
     */
    /**
     * @return NodeList<ListItem<PropertyDeclarator>>
     */
    public function getDeclarators()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_declarators);
    }
    /**
     * @return NodeList<ListItem<PropertyDeclarator>>
     */
    /**
     * @return NodeList<ListItem<PropertyDeclarator>>
     */
    public function getDeclaratorsx()
    {
        return $this->getDeclarators();
    }
    /**
     * @return null|Node
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(SemicolonToken $value)
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
        return $this->_semicolon !== null;
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

