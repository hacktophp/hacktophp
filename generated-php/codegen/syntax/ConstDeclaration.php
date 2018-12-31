<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e88134e868f94521b20e9623dad5e9a2>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class ConstDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_visibility;
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
    private $_type_specifier;
    /**
     * @var EditableNode
     */
    private $_declarators;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $visibility, EditableNode $abstract, EditableNode $keyword, EditableNode $type_specifier, EditableNode $declarators, EditableNode $semicolon)
    {
        parent::__construct('const_declaration');
        $this->_visibility = $visibility;
        $this->_abstract = $abstract;
        $this->_keyword = $keyword;
        $this->_type_specifier = $type_specifier;
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
        $visibility = EditableNode::fromJSON($json['const_visibility'], $file, $offset, $source);
        $offset += $visibility->getWidth();
        $abstract = EditableNode::fromJSON($json['const_abstract'], $file, $offset, $source);
        $offset += $abstract->getWidth();
        $keyword = EditableNode::fromJSON($json['const_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $type_specifier = EditableNode::fromJSON($json['const_type_specifier'], $file, $offset, $source);
        $offset += $type_specifier->getWidth();
        $declarators = EditableNode::fromJSON($json['const_declarators'], $file, $offset, $source);
        $offset += $declarators->getWidth();
        $semicolon = EditableNode::fromJSON($json['const_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($visibility, $abstract, $keyword, $type_specifier, $declarators, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['visibility' => $this->_visibility, 'abstract' => $this->_abstract, 'keyword' => $this->_keyword, 'type_specifier' => $this->_type_specifier, 'declarators' => $this->_declarators, 'semicolon' => $this->_semicolon];
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
        $visibility = $this->_visibility->rewrite($rewriter, $parents);
        $abstract = $this->_abstract->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $type_specifier = $this->_type_specifier->rewrite($rewriter, $parents);
        $declarators = $this->_declarators->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($visibility === $this->_visibility && $abstract === $this->_abstract && $keyword === $this->_keyword && $type_specifier === $this->_type_specifier && $declarators === $this->_declarators && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($visibility, $abstract, $keyword, $type_specifier, $declarators, $semicolon);
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
        return new static($value, $this->_abstract, $this->_keyword, $this->_type_specifier, $this->_declarators, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasVisibility()
    {
        return !$this->_visibility->isMissing();
    }
    /**
     * @return null | ProtectedToken | PublicToken
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
     * @return ProtectedToken | PublicToken
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
        return new static($this->_visibility, $value, $this->_keyword, $this->_type_specifier, $this->_declarators, $this->_semicolon);
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
        return new static($this->_visibility, $this->_abstract, $value, $this->_type_specifier, $this->_declarators, $this->_semicolon);
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
        return new static($this->_visibility, $this->_abstract, $this->_keyword, $value, $this->_declarators, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasTypeSpecifier()
    {
        return !$this->_type_specifier->isMissing();
    }
    /**
     * @return ClassnameTypeSpecifier | GenericTypeSpecifier |
     * KeysetTypeSpecifier | null | NullableTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier | TypeConstant | VarrayTypeSpecifier |
     * VectorTypeSpecifier
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
     * @return ClassnameTypeSpecifier | GenericTypeSpecifier |
     * KeysetTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier | TypeConstant | VarrayTypeSpecifier |
     * VectorTypeSpecifier
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
        return new static($this->_visibility, $this->_abstract, $this->_keyword, $this->_type_specifier, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasDeclarators()
    {
        return !$this->_declarators->isMissing();
    }
    /**
     * @return EditableList<ConstantDeclarator>
     */
    /**
     * @return EditableList<ConstantDeclarator>
     */
    public function getDeclarators()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_declarators);
    }
    /**
     * @return EditableList<ConstantDeclarator>
     */
    /**
     * @return EditableList<ConstantDeclarator>
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
        return new static($this->_visibility, $this->_abstract, $this->_keyword, $this->_type_specifier, $this->_declarators, $value);
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

