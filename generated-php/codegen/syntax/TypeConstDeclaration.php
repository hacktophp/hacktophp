<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<822b517e8d5ca177416b9f6bc5ab3565>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TypeConstDeclaration extends Node implements IClassBodyDeclaration
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'type_const_declaration';
    /**
     * @var null|OldAttributeSpecification
     */
    private $_attribute_spec;
    /**
     * @var NodeList<Token>|null
     */
    private $_modifiers;
    /**
     * @var ConstToken
     */
    private $_keyword;
    /**
     * @var TypeToken
     */
    private $_type_keyword;
    /**
     * @var NameToken
     */
    private $_name;
    /**
     * @var null|Node
     */
    private $_type_parameters;
    /**
     * @var null|TypeConstraint
     */
    private $_type_constraint;
    /**
     * @var null|EqualToken
     */
    private $_equal;
    /**
     * @var null|ITypeSpecifier
     */
    private $_type_specifier;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    /**
     * @param NodeList<Token>|null $modifiers
     */
    public function __construct(?OldAttributeSpecification $attribute_spec, ?NodeList $modifiers, ConstToken $keyword, TypeToken $type_keyword, NameToken $name, ?Node $type_parameters, ?TypeConstraint $type_constraint, ?EqualToken $equal, ?ITypeSpecifier $type_specifier, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_attribute_spec = $attribute_spec;
        $this->_modifiers = $modifiers;
        $this->_keyword = $keyword;
        $this->_type_keyword = $type_keyword;
        $this->_name = $name;
        $this->_type_parameters = $type_parameters;
        $this->_type_constraint = $type_constraint;
        $this->_equal = $equal;
        $this->_type_specifier = $type_specifier;
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
        $attribute_spec = Node::fromJSON($json['type_const_attribute_spec'], $file, $offset, $source, 'OldAttributeSpecification');
        $offset += (($__tmp1__ = $attribute_spec) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $modifiers = Node::fromJSON($json['type_const_modifiers'], $file, $offset, $source, 'NodeList<Token>');
        $offset += (($__tmp2__ = $modifiers) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $keyword = Node::fromJSON($json['type_const_keyword'], $file, $offset, $source, 'ConstToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $type_keyword = Node::fromJSON($json['type_const_type_keyword'], $file, $offset, $source, 'TypeToken');
        $type_keyword = $type_keyword !== null ? $type_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type_keyword->getWidth();
        $name = Node::fromJSON($json['type_const_name'], $file, $offset, $source, 'NameToken');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $type_parameters = Node::fromJSON($json['type_const_type_parameters'], $file, $offset, $source, 'Node');
        $offset += (($__tmp3__ = $type_parameters) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $type_constraint = Node::fromJSON($json['type_const_type_constraint'], $file, $offset, $source, 'TypeConstraint');
        $offset += (($__tmp4__ = $type_constraint) !== null ? $__tmp4__->getWidth() : null) ?? 0;
        $equal = Node::fromJSON($json['type_const_equal'], $file, $offset, $source, 'EqualToken');
        $offset += (($__tmp5__ = $equal) !== null ? $__tmp5__->getWidth() : null) ?? 0;
        $type_specifier = Node::fromJSON($json['type_const_type_specifier'], $file, $offset, $source, 'ITypeSpecifier');
        $offset += (($__tmp6__ = $type_specifier) !== null ? $__tmp6__->getWidth() : null) ?? 0;
        $semicolon = Node::fromJSON($json['type_const_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute_spec, $modifiers, $keyword, $type_keyword, $name, $type_parameters, $type_constraint, $equal, $type_specifier, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute_spec' => $this->_attribute_spec, 'modifiers' => $this->_modifiers, 'keyword' => $this->_keyword, 'type_keyword' => $this->_type_keyword, 'name' => $this->_name, 'type_parameters' => $this->_type_parameters, 'type_constraint' => $this->_type_constraint, 'equal' => $this->_equal, 'type_specifier' => $this->_type_specifier, 'semicolon' => $this->_semicolon]);
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
        $modifiers = $this->_modifiers === null ? null : $rewriter($this->_modifiers, $parents);
        $keyword = $rewriter($this->_keyword, $parents);
        $type_keyword = $rewriter($this->_type_keyword, $parents);
        $name = $rewriter($this->_name, $parents);
        $type_parameters = $this->_type_parameters === null ? null : $rewriter($this->_type_parameters, $parents);
        $type_constraint = $this->_type_constraint === null ? null : $rewriter($this->_type_constraint, $parents);
        $equal = $this->_equal === null ? null : $rewriter($this->_equal, $parents);
        $type_specifier = $this->_type_specifier === null ? null : $rewriter($this->_type_specifier, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($attribute_spec === $this->_attribute_spec && $modifiers === $this->_modifiers && $keyword === $this->_keyword && $type_keyword === $this->_type_keyword && $name === $this->_name && $type_parameters === $this->_type_parameters && $type_constraint === $this->_type_constraint && $equal === $this->_equal && $type_specifier === $this->_type_specifier && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($attribute_spec, $modifiers, $keyword, $type_keyword, $name, $type_parameters, $type_constraint, $equal, $type_specifier, $semicolon);
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
        return new static($value, $this->_modifiers, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
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
     * @param NodeList<Token>|null $value
     *
     * @return static
     */
    public function withModifiers(?NodeList $value)
    {
        if ($value === $this->_modifiers) {
            return $this;
        }
        return new static($this->_attribute_spec, $value, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasModifiers()
    {
        return $this->_modifiers !== null;
    }
    /**
     * @return NodeList<AbstractToken> | NodeList<Token> | NodeList<PublicToken>
     * | null
     */
    /**
     * @return NodeList<Token>|null
     */
    public function getModifiers()
    {
        return $this->_modifiers;
    }
    /**
     * @return NodeList<AbstractToken> | NodeList<Token> | NodeList<PublicToken>
     */
    /**
     * @return NodeList<Token>
     */
    public function getModifiersx()
    {
        return TypeAssert\not_null($this->getModifiers());
    }
    /**
     * @return null|Node
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(ConstToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_modifiers, $value, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return ConstToken
     */
    /**
     * @return ConstToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ConstToken::class, $this->_keyword);
    }
    /**
     * @return ConstToken
     */
    /**
     * @return ConstToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getTypeKeywordUNTYPED()
    {
        return $this->_type_keyword;
    }
    /**
     * @return static
     */
    public function withTypeKeyword(TypeToken $value)
    {
        if ($value === $this->_type_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_modifiers, $this->_keyword, $value, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasTypeKeyword()
    {
        return $this->_type_keyword !== null;
    }
    /**
     * @return TypeToken
     */
    /**
     * @return TypeToken
     */
    public function getTypeKeyword()
    {
        return TypeAssert\instance_of(TypeToken::class, $this->_type_keyword);
    }
    /**
     * @return TypeToken
     */
    /**
     * @return TypeToken
     */
    public function getTypeKeywordx()
    {
        return $this->getTypeKeyword();
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
    public function withName(NameToken $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_modifiers, $this->_keyword, $this->_type_keyword, $value, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
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
     * @return null|Node
     */
    public function getTypeParametersUNTYPED()
    {
        return $this->_type_parameters;
    }
    /**
     * @return static
     */
    public function withTypeParameters(?Node $value)
    {
        if ($value === $this->_type_parameters) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_modifiers, $this->_keyword, $this->_type_keyword, $this->_name, $value, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasTypeParameters()
    {
        return $this->_type_parameters !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
     */
    public function getTypeParameters()
    {
        return $this->_type_parameters;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getTypeParametersx()
    {
        return TypeAssert\not_null($this->getTypeParameters());
    }
    /**
     * @return null|Node
     */
    public function getTypeConstraintUNTYPED()
    {
        return $this->_type_constraint;
    }
    /**
     * @return static
     */
    public function withTypeConstraint(?TypeConstraint $value)
    {
        if ($value === $this->_type_constraint) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_modifiers, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $value, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasTypeConstraint()
    {
        return $this->_type_constraint !== null;
    }
    /**
     * @return null | TypeConstraint
     */
    /**
     * @return null|TypeConstraint
     */
    public function getTypeConstraint()
    {
        return $this->_type_constraint;
    }
    /**
     * @return TypeConstraint
     */
    /**
     * @return TypeConstraint
     */
    public function getTypeConstraintx()
    {
        return TypeAssert\not_null($this->getTypeConstraint());
    }
    /**
     * @return null|Node
     */
    public function getEqualUNTYPED()
    {
        return $this->_equal;
    }
    /**
     * @return static
     */
    public function withEqual(?EqualToken $value)
    {
        if ($value === $this->_equal) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_modifiers, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $value, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasEqual()
    {
        return $this->_equal !== null;
    }
    /**
     * @return null | EqualToken
     */
    /**
     * @return null|EqualToken
     */
    public function getEqual()
    {
        return $this->_equal;
    }
    /**
     * @return EqualToken
     */
    /**
     * @return EqualToken
     */
    public function getEqualx()
    {
        return TypeAssert\not_null($this->getEqual());
    }
    /**
     * @return null|Node
     */
    public function getTypeSpecifierUNTYPED()
    {
        return $this->_type_specifier;
    }
    /**
     * @return static
     */
    public function withTypeSpecifier(?ITypeSpecifier $value)
    {
        if ($value === $this->_type_specifier) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_modifiers, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasTypeSpecifier()
    {
        return $this->_type_specifier !== null;
    }
    /**
     * @return ClosureTypeSpecifier | DarrayTypeSpecifier |
     * DictionaryTypeSpecifier | GenericTypeSpecifier | KeysetTypeSpecifier |
     * LikeTypeSpecifier | null | NullableTypeSpecifier | ShapeTypeSpecifier |
     * SimpleTypeSpecifier | TupleTypeSpecifier | TypeConstant |
     * VarrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return null|ITypeSpecifier
     */
    public function getTypeSpecifier()
    {
        return $this->_type_specifier;
    }
    /**
     * @return ClosureTypeSpecifier | DarrayTypeSpecifier |
     * DictionaryTypeSpecifier | GenericTypeSpecifier | KeysetTypeSpecifier |
     * LikeTypeSpecifier | NullableTypeSpecifier | ShapeTypeSpecifier |
     * SimpleTypeSpecifier | TupleTypeSpecifier | TypeConstant |
     * VarrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypeSpecifierx()
    {
        return TypeAssert\not_null($this->getTypeSpecifier());
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
        return new static($this->_attribute_spec, $this->_modifiers, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $value);
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

