<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e78b745a276beaa83b02711291a3e3d8>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class AliasDeclaration extends Node implements IHasAttributeSpec
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'alias_declaration';
    /**
     * @var null|OldAttributeSpecification
     */
    private $_attribute_spec;
    /**
     * @var Token
     */
    private $_keyword;
    /**
     * @var NameToken
     */
    private $_name;
    /**
     * @var null|TypeParameters
     */
    private $_generic_parameter;
    /**
     * @var null|TypeConstraint
     */
    private $_constraint;
    /**
     * @var EqualToken
     */
    private $_equal;
    /**
     * @var ITypeSpecifier
     */
    private $_type;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(?OldAttributeSpecification $attribute_spec, Token $keyword, NameToken $name, ?TypeParameters $generic_parameter, ?TypeConstraint $constraint, EqualToken $equal, ITypeSpecifier $type, SemicolonToken $semicolon, ?array $source_ref = null)
    {
        $this->_attribute_spec = $attribute_spec;
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_generic_parameter = $generic_parameter;
        $this->_constraint = $constraint;
        $this->_equal = $equal;
        $this->_type = $type;
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
        $attribute_spec = Node::fromJSON($json['alias_attribute_spec'], $file, $offset, $source, 'OldAttributeSpecification');
        $offset += (($__tmp1__ = $attribute_spec) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $keyword = Node::fromJSON($json['alias_keyword'], $file, $offset, $source, 'Token');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $name = Node::fromJSON($json['alias_name'], $file, $offset, $source, 'NameToken');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $generic_parameter = Node::fromJSON($json['alias_generic_parameter'], $file, $offset, $source, 'TypeParameters');
        $offset += (($__tmp2__ = $generic_parameter) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $constraint = Node::fromJSON($json['alias_constraint'], $file, $offset, $source, 'TypeConstraint');
        $offset += (($__tmp3__ = $constraint) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $equal = Node::fromJSON($json['alias_equal'], $file, $offset, $source, 'EqualToken');
        $equal = $equal !== null ? $equal : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $equal->getWidth();
        $type = Node::fromJSON($json['alias_type'], $file, $offset, $source, 'ITypeSpecifier');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $semicolon = Node::fromJSON($json['alias_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute_spec, $keyword, $name, $generic_parameter, $constraint, $equal, $type, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute_spec' => $this->_attribute_spec, 'keyword' => $this->_keyword, 'name' => $this->_name, 'generic_parameter' => $this->_generic_parameter, 'constraint' => $this->_constraint, 'equal' => $this->_equal, 'type' => $this->_type, 'semicolon' => $this->_semicolon]);
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
        $keyword = $rewriter($this->_keyword, $parents);
        $name = $rewriter($this->_name, $parents);
        $generic_parameter = $this->_generic_parameter === null ? null : $rewriter($this->_generic_parameter, $parents);
        $constraint = $this->_constraint === null ? null : $rewriter($this->_constraint, $parents);
        $equal = $rewriter($this->_equal, $parents);
        $type = $rewriter($this->_type, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($attribute_spec === $this->_attribute_spec && $keyword === $this->_keyword && $name === $this->_name && $generic_parameter === $this->_generic_parameter && $constraint === $this->_constraint && $equal === $this->_equal && $type === $this->_type && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($attribute_spec, $keyword, $name, $generic_parameter, $constraint, $equal, $type, $semicolon);
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
        return new static($value, $this->_keyword, $this->_name, $this->_generic_parameter, $this->_constraint, $this->_equal, $this->_type, $this->_semicolon);
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
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(Token $value)
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
        return $this->_keyword !== null;
    }
    /**
     * @return NewtypeToken | TypeToken
     */
    /**
     * @return Token
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(Token::class, $this->_keyword);
    }
    /**
     * @return NewtypeToken | TypeToken
     */
    /**
     * @return Token
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
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
        return new static($this->_attribute_spec, $this->_keyword, $value, $this->_generic_parameter, $this->_constraint, $this->_equal, $this->_type, $this->_semicolon);
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
    public function getGenericParameterUNTYPED()
    {
        return $this->_generic_parameter;
    }
    /**
     * @return static
     */
    public function withGenericParameter(?TypeParameters $value)
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
        return $this->_generic_parameter !== null;
    }
    /**
     * @return null | TypeParameters
     */
    /**
     * @return null|TypeParameters
     */
    public function getGenericParameter()
    {
        return $this->_generic_parameter;
    }
    /**
     * @return TypeParameters
     */
    /**
     * @return TypeParameters
     */
    public function getGenericParameterx()
    {
        return TypeAssert\not_null($this->getGenericParameter());
    }
    /**
     * @return null|Node
     */
    public function getConstraintUNTYPED()
    {
        return $this->_constraint;
    }
    /**
     * @return static
     */
    public function withConstraint(?TypeConstraint $value)
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
        return $this->_constraint !== null;
    }
    /**
     * @return null | TypeConstraint
     */
    /**
     * @return null|TypeConstraint
     */
    public function getConstraint()
    {
        return $this->_constraint;
    }
    /**
     * @return TypeConstraint
     */
    /**
     * @return TypeConstraint
     */
    public function getConstraintx()
    {
        return TypeAssert\not_null($this->getConstraint());
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
    public function withEqual(EqualToken $value)
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
        return $this->_equal !== null;
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
     * @return null|Node
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(ITypeSpecifier $value)
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
        return $this->_type !== null;
    }
    /**
     * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | KeysetTypeSpecifier | MapArrayTypeSpecifier |
     * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier | VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | KeysetTypeSpecifier | MapArrayTypeSpecifier |
     * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier | VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
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
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_generic_parameter, $this->_constraint, $this->_equal, $this->_type, $value);
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

