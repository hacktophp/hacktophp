<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d873988fa4d46b798103120ae6d10bcb>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class EnumDeclaration extends Node implements IHasAttributeSpec
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'enum_declaration';
    /**
     * @var null|OldAttributeSpecification
     */
    private $_attribute_spec;
    /**
     * @var EnumToken
     */
    private $_keyword;
    /**
     * @var NameToken
     */
    private $_name;
    /**
     * @var ColonToken
     */
    private $_colon;
    /**
     * @var ITypeSpecifier
     */
    private $_base;
    /**
     * @var null|TypeConstraint
     */
    private $_type;
    /**
     * @var LeftBraceToken
     */
    private $_left_brace;
    /**
     * @var NodeList<Enumerator>|null
     */
    private $_enumerators;
    /**
     * @var RightBraceToken
     */
    private $_right_brace;
    /**
     * @param NodeList<Enumerator>|null $enumerators
     */
    public function __construct(?OldAttributeSpecification $attribute_spec, EnumToken $keyword, NameToken $name, ColonToken $colon, ITypeSpecifier $base, ?TypeConstraint $type, LeftBraceToken $left_brace, ?NodeList $enumerators, RightBraceToken $right_brace, ?array $source_ref = null)
    {
        $this->_attribute_spec = $attribute_spec;
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_colon = $colon;
        $this->_base = $base;
        $this->_type = $type;
        $this->_left_brace = $left_brace;
        $this->_enumerators = $enumerators;
        $this->_right_brace = $right_brace;
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
        $attribute_spec = Node::fromJSON($json['enum_attribute_spec'], $file, $offset, $source, 'OldAttributeSpecification');
        $offset += (($__tmp1__ = $attribute_spec) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $keyword = Node::fromJSON($json['enum_keyword'], $file, $offset, $source, 'EnumToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $name = Node::fromJSON($json['enum_name'], $file, $offset, $source, 'NameToken');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $colon = Node::fromJSON($json['enum_colon'], $file, $offset, $source, 'ColonToken');
        $colon = $colon !== null ? $colon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $colon->getWidth();
        $base = Node::fromJSON($json['enum_base'], $file, $offset, $source, 'ITypeSpecifier');
        $base = $base !== null ? $base : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $base->getWidth();
        $type = Node::fromJSON($json['enum_type'], $file, $offset, $source, 'TypeConstraint');
        $offset += (($__tmp2__ = $type) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $left_brace = Node::fromJSON($json['enum_left_brace'], $file, $offset, $source, 'LeftBraceToken');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $enumerators = Node::fromJSON($json['enum_enumerators'], $file, $offset, $source, 'NodeList<Enumerator>');
        $offset += (($__tmp3__ = $enumerators) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $right_brace = Node::fromJSON($json['enum_right_brace'], $file, $offset, $source, 'RightBraceToken');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute_spec, $keyword, $name, $colon, $base, $type, $left_brace, $enumerators, $right_brace, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute_spec' => $this->_attribute_spec, 'keyword' => $this->_keyword, 'name' => $this->_name, 'colon' => $this->_colon, 'base' => $this->_base, 'type' => $this->_type, 'left_brace' => $this->_left_brace, 'enumerators' => $this->_enumerators, 'right_brace' => $this->_right_brace]);
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
        $colon = $rewriter($this->_colon, $parents);
        $base = $rewriter($this->_base, $parents);
        $type = $this->_type === null ? null : $rewriter($this->_type, $parents);
        $left_brace = $rewriter($this->_left_brace, $parents);
        $enumerators = $this->_enumerators === null ? null : $rewriter($this->_enumerators, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        if ($attribute_spec === $this->_attribute_spec && $keyword === $this->_keyword && $name === $this->_name && $colon === $this->_colon && $base === $this->_base && $type === $this->_type && $left_brace === $this->_left_brace && $enumerators === $this->_enumerators && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($attribute_spec, $keyword, $name, $colon, $base, $type, $left_brace, $enumerators, $right_brace);
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
        return new static($value, $this->_keyword, $this->_name, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
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
    public function withKeyword(EnumToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $value, $this->_name, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return EnumToken
     */
    /**
     * @return EnumToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(EnumToken::class, $this->_keyword);
    }
    /**
     * @return EnumToken
     */
    /**
     * @return EnumToken
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
        return new static($this->_attribute_spec, $this->_keyword, $value, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
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
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(ColonToken $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $value, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return $this->_colon !== null;
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColon()
    {
        return TypeAssert\instance_of(ColonToken::class, $this->_colon);
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColonx()
    {
        return $this->getColon();
    }
    /**
     * @return null|Node
     */
    public function getBaseUNTYPED()
    {
        return $this->_base;
    }
    /**
     * @return static
     */
    public function withBase(ITypeSpecifier $value)
    {
        if ($value === $this->_base) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_colon, $value, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasBase()
    {
        return $this->_base !== null;
    }
    /**
     * @return ClassnameTypeSpecifier | GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getBase()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_base);
    }
    /**
     * @return ClassnameTypeSpecifier | GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getBasex()
    {
        return $this->getBase();
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
    public function withType(?TypeConstraint $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_colon, $this->_base, $value, $this->_left_brace, $this->_enumerators, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return null | TypeConstraint
     */
    /**
     * @return null|TypeConstraint
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @return TypeConstraint
     */
    /**
     * @return TypeConstraint
     */
    public function getTypex()
    {
        return TypeAssert\not_null($this->getType());
    }
    /**
     * @return null|Node
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(LeftBraceToken $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_colon, $this->_base, $this->_type, $value, $this->_enumerators, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return $this->_left_brace !== null;
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBrace()
    {
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return null|Node
     */
    public function getEnumeratorsUNTYPED()
    {
        return $this->_enumerators;
    }
    /**
     * @param NodeList<Enumerator>|null $value
     *
     * @return static
     */
    public function withEnumerators(?NodeList $value)
    {
        if ($value === $this->_enumerators) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasEnumerators()
    {
        return $this->_enumerators !== null;
    }
    /**
     * @return NodeList<Enumerator> | null
     */
    /**
     * @return NodeList<Enumerator>|null
     */
    public function getEnumerators()
    {
        return $this->_enumerators;
    }
    /**
     * @return NodeList<Enumerator>
     */
    /**
     * @return NodeList<Enumerator>
     */
    public function getEnumeratorsx()
    {
        return TypeAssert\not_null($this->getEnumerators());
    }
    /**
     * @return null|Node
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(RightBraceToken $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return $this->_right_brace !== null;
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBrace()
    {
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

