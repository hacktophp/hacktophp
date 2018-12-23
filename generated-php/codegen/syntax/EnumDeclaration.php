<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class EnumDeclaration extends EditableNode
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
    private $_colon;
    /**
     * @var EditableNode
     */
    private $_base;
    /**
     * @var EditableNode
     */
    private $_type;
    /**
     * @var EditableNode
     */
    private $_left_brace;
    /**
     * @var EditableNode
     */
    private $_enumerators;
    /**
     * @var EditableNode
     */
    private $_right_brace;
    public function __construct(EditableNode $attribute_spec, EditableNode $keyword, EditableNode $name, EditableNode $colon, EditableNode $base, EditableNode $type, EditableNode $left_brace, EditableNode $enumerators, EditableNode $right_brace)
    {
        parent::__construct('enum_declaration');
        $this->_attribute_spec = $attribute_spec;
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_colon = $colon;
        $this->_base = $base;
        $this->_type = $type;
        $this->_left_brace = $left_brace;
        $this->_enumerators = $enumerators;
        $this->_right_brace = $right_brace;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $attribute_spec = EditableNode::fromJSON($json['enum_attribute_spec'], $file, $offset, $source);
        $offset += $attribute_spec->getWidth();
        $keyword = EditableNode::fromJSON($json['enum_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $name = EditableNode::fromJSON($json['enum_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $colon = EditableNode::fromJSON($json['enum_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        $base = EditableNode::fromJSON($json['enum_base'], $file, $offset, $source);
        $offset += $base->getWidth();
        $type = EditableNode::fromJSON($json['enum_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $left_brace = EditableNode::fromJSON($json['enum_left_brace'], $file, $offset, $source);
        $offset += $left_brace->getWidth();
        $enumerators = EditableNode::fromJSON($json['enum_enumerators'], $file, $offset, $source);
        $offset += $enumerators->getWidth();
        $right_brace = EditableNode::fromJSON($json['enum_right_brace'], $file, $offset, $source);
        $offset += $right_brace->getWidth();
        return new static($attribute_spec, $keyword, $name, $colon, $base, $type, $left_brace, $enumerators, $right_brace);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('attribute_spec' => $this->_attribute_spec, 'keyword' => $this->_keyword, 'name' => $this->_name, 'colon' => $this->_colon, 'base' => $this->_base, 'type' => $this->_type, 'left_brace' => $this->_left_brace, 'enumerators' => $this->_enumerators, 'right_brace' => $this->_right_brace);
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $base = $this->_base->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $enumerators = $this->_enumerators->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
        if ($attribute_spec === $this->_attribute_spec && $keyword === $this->_keyword && $name === $this->_name && $colon === $this->_colon && $base === $this->_base && $type === $this->_type && $left_brace === $this->_left_brace && $enumerators === $this->_enumerators && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($attribute_spec, $keyword, $name, $colon, $base, $type, $left_brace, $enumerators, $right_brace);
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
        return new static($value, $this->_keyword, $this->_name, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
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
        return new static($this->_attribute_spec, $value, $this->_name, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
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
        return new static($this->_attribute_spec, $this->_keyword, $value, $this->_colon, $this->_base, $this->_type, $this->_left_brace, $this->_enumerators, $this->_right_brace);
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
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(EditableNode $value)
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
        return !$this->_colon->isMissing();
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
     * @return EditableNode
     */
    public function getBaseUNTYPED()
    {
        return $this->_base;
    }
    /**
     * @return static
     */
    public function withBase(EditableNode $value)
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
        return !$this->_base->isMissing();
    }
    /**
     * @return ClassnameTypeSpecifier | GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getBase()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_base);
    }
    /**
     * @return ClassnameTypeSpecifier | GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getBasex()
    {
        return $this->getBase();
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
        return new static($this->_attribute_spec, $this->_keyword, $this->_name, $this->_colon, $this->_base, $value, $this->_left_brace, $this->_enumerators, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return null | TypeConstraint
     */
    /**
     * @return null|TypeConstraint
     */
    public function getType()
    {
        if ($this->_type->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(TypeConstraint::class, $this->_type);
    }
    /**
     * @return TypeConstraint
     */
    /**
     * @return TypeConstraint
     */
    public function getTypex()
    {
        return TypeAssert\instance_of(TypeConstraint::class, $this->_type);
    }
    /**
     * @return EditableNode
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(EditableNode $value)
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
        return !$this->_left_brace->isMissing();
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
     * @return EditableNode
     */
    public function getEnumeratorsUNTYPED()
    {
        return $this->_enumerators;
    }
    /**
     * @return static
     */
    public function withEnumerators(EditableNode $value)
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
        return !$this->_enumerators->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getEnumerators()
    {
        if ($this->_enumerators->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_enumerators);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getEnumeratorsx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_enumerators);
    }
    /**
     * @return EditableNode
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(EditableNode $value)
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
        return !$this->_right_brace->isMissing();
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

