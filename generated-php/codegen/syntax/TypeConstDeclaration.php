<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d241e0f0d408ce55acf7ddc60b3e5f22>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class TypeConstDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_abstract;
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_type_keyword;
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_type_parameters;
    /**
     * @var EditableNode
     */
    private $_type_constraint;
    /**
     * @var EditableNode
     */
    private $_equal;
    /**
     * @var EditableNode
     */
    private $_type_specifier;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $abstract, EditableNode $keyword, EditableNode $type_keyword, EditableNode $name, EditableNode $type_parameters, EditableNode $type_constraint, EditableNode $equal, EditableNode $type_specifier, EditableNode $semicolon)
    {
        parent::__construct('type_const_declaration');
        $this->_abstract = $abstract;
        $this->_keyword = $keyword;
        $this->_type_keyword = $type_keyword;
        $this->_name = $name;
        $this->_type_parameters = $type_parameters;
        $this->_type_constraint = $type_constraint;
        $this->_equal = $equal;
        $this->_type_specifier = $type_specifier;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $abstract = EditableNode::fromJSON($json['type_const_abstract'], $file, $offset, $source);
        $offset += $abstract->getWidth();
        $keyword = EditableNode::fromJSON($json['type_const_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $type_keyword = EditableNode::fromJSON($json['type_const_type_keyword'], $file, $offset, $source);
        $offset += $type_keyword->getWidth();
        $name = EditableNode::fromJSON($json['type_const_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $type_parameters = EditableNode::fromJSON($json['type_const_type_parameters'], $file, $offset, $source);
        $offset += $type_parameters->getWidth();
        $type_constraint = EditableNode::fromJSON($json['type_const_type_constraint'], $file, $offset, $source);
        $offset += $type_constraint->getWidth();
        $equal = EditableNode::fromJSON($json['type_const_equal'], $file, $offset, $source);
        $offset += $equal->getWidth();
        $type_specifier = EditableNode::fromJSON($json['type_const_type_specifier'], $file, $offset, $source);
        $offset += $type_specifier->getWidth();
        $semicolon = EditableNode::fromJSON($json['type_const_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($abstract, $keyword, $type_keyword, $name, $type_parameters, $type_constraint, $equal, $type_specifier, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('abstract' => $this->_abstract, 'keyword' => $this->_keyword, 'type_keyword' => $this->_type_keyword, 'name' => $this->_name, 'type_parameters' => $this->_type_parameters, 'type_constraint' => $this->_type_constraint, 'equal' => $this->_equal, 'type_specifier' => $this->_type_specifier, 'semicolon' => $this->_semicolon);
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
        $abstract = $this->_abstract->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $type_keyword = $this->_type_keyword->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $type_parameters = $this->_type_parameters->rewrite($rewriter, $parents);
        $type_constraint = $this->_type_constraint->rewrite($rewriter, $parents);
        $equal = $this->_equal->rewrite($rewriter, $parents);
        $type_specifier = $this->_type_specifier->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($abstract === $this->_abstract && $keyword === $this->_keyword && $type_keyword === $this->_type_keyword && $name === $this->_name && $type_parameters === $this->_type_parameters && $type_constraint === $this->_type_constraint && $equal === $this->_equal && $type_specifier === $this->_type_specifier && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($abstract, $keyword, $type_keyword, $name, $type_parameters, $type_constraint, $equal, $type_specifier, $semicolon);
    }
    /**
     * @return EditableNode
     */
    public function getAbstractUNTYPED()
    {
        return $this->_abstract;
    }
    /**
     * @return static
     */
    public function withAbstract(EditableNode $value)
    {
        if ($value === $this->_abstract) {
            return $this;
        }
        return new static($value, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasAbstract()
    {
        return !$this->_abstract->isMissing();
    }
    /**
     * @return null | AbstractToken
     */
    /**
     * @return null|AbstractToken
     */
    public function getAbstract()
    {
        if ($this->_abstract->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AbstractToken::class, $this->_abstract);
    }
    /**
     * @return AbstractToken
     */
    /**
     * @return AbstractToken
     */
    public function getAbstractx()
    {
        return TypeAssert\instance_of(AbstractToken::class, $this->_abstract);
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
        return new static($this->_abstract, $value, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
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
     * @return EditableNode
     */
    public function getTypeKeywordUNTYPED()
    {
        return $this->_type_keyword;
    }
    /**
     * @return static
     */
    public function withTypeKeyword(EditableNode $value)
    {
        if ($value === $this->_type_keyword) {
            return $this;
        }
        return new static($this->_abstract, $this->_keyword, $value, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasTypeKeyword()
    {
        return !$this->_type_keyword->isMissing();
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
        return new static($this->_abstract, $this->_keyword, $this->_type_keyword, $value, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
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
    public function getTypeParametersUNTYPED()
    {
        return $this->_type_parameters;
    }
    /**
     * @return static
     */
    public function withTypeParameters(EditableNode $value)
    {
        if ($value === $this->_type_parameters) {
            return $this;
        }
        return new static($this->_abstract, $this->_keyword, $this->_type_keyword, $this->_name, $value, $this->_type_constraint, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasTypeParameters()
    {
        return !$this->_type_parameters->isMissing();
    }
    /**
     * @return null
     */
    /**
     * @return null|EditableNode
     */
    public function getTypeParameters()
    {
        if ($this->_type_parameters->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_type_parameters);
    }
    /**
     * @return
     */
    /**
     * @return EditableNode
     */
    public function getTypeParametersx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type_parameters);
    }
    /**
     * @return EditableNode
     */
    public function getTypeConstraintUNTYPED()
    {
        return $this->_type_constraint;
    }
    /**
     * @return static
     */
    public function withTypeConstraint(EditableNode $value)
    {
        if ($value === $this->_type_constraint) {
            return $this;
        }
        return new static($this->_abstract, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $value, $this->_equal, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasTypeConstraint()
    {
        return !$this->_type_constraint->isMissing();
    }
    /**
     * @return null | TypeConstraint
     */
    /**
     * @return null|TypeConstraint
     */
    public function getTypeConstraint()
    {
        if ($this->_type_constraint->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(TypeConstraint::class, $this->_type_constraint);
    }
    /**
     * @return TypeConstraint
     */
    /**
     * @return TypeConstraint
     */
    public function getTypeConstraintx()
    {
        return TypeAssert\instance_of(TypeConstraint::class, $this->_type_constraint);
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
        return new static($this->_abstract, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $value, $this->_type_specifier, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasEqual()
    {
        return !$this->_equal->isMissing();
    }
    /**
     * @return null | EqualToken
     */
    /**
     * @return null|EqualToken
     */
    public function getEqual()
    {
        if ($this->_equal->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(EqualToken::class, $this->_equal);
    }
    /**
     * @return EditableNode
     */
    public function getTypeSpecifierUNTYPED()
    {
        return $this->_type_specifier;
    }
    /**
     * @return static
     */
    public function withTypeSpecifier(EditableNode $value)
    {
        if ($value === $this->_type_specifier) {
            return $this;
        }
        return new static($this->_abstract, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasTypeSpecifier()
    {
        return !$this->_type_specifier->isMissing();
    }
    /**
     * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | KeysetTypeSpecifier | null | NullableTypeSpecifier
     * | ShapeTypeSpecifier | SimpleTypeSpecifier | TupleTypeSpecifier |
     * TypeConstant | VectorTypeSpecifier
     */
    /**
     * @return null|EditableNode
     */
    public function getTypeSpecifier()
    {
        if ($this->_type_specifier->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_type_specifier);
    }
    /**
     * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | KeysetTypeSpecifier | NullableTypeSpecifier |
     * ShapeTypeSpecifier | SimpleTypeSpecifier | TupleTypeSpecifier |
     * TypeConstant | VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getTypeSpecifierx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type_specifier);
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
        return new static($this->_abstract, $this->_keyword, $this->_type_keyword, $this->_name, $this->_type_parameters, $this->_type_constraint, $this->_equal, $this->_type_specifier, $value);
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

