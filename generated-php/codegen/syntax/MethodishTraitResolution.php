<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<acd6d37f2b2e1e4d1da9f1bdd2815c5e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class MethodishTraitResolution extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute;
    /**
     * @var EditableNode
     */
    private $_function_decl_header;
    /**
     * @var EditableNode
     */
    private $_equal;
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $attribute, EditableNode $function_decl_header, EditableNode $equal, EditableNode $name, EditableNode $semicolon)
    {
        parent::__construct('methodish_trait_resolution');
        $this->_attribute = $attribute;
        $this->_function_decl_header = $function_decl_header;
        $this->_equal = $equal;
        $this->_name = $name;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $attribute = EditableNode::fromJSON($json['methodish_trait_attribute'], $file, $offset, $source);
        $offset += $attribute->getWidth();
        $function_decl_header = EditableNode::fromJSON($json['methodish_trait_function_decl_header'], $file, $offset, $source);
        $offset += $function_decl_header->getWidth();
        $equal = EditableNode::fromJSON($json['methodish_trait_equal'], $file, $offset, $source);
        $offset += $equal->getWidth();
        $name = EditableNode::fromJSON($json['methodish_trait_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $semicolon = EditableNode::fromJSON($json['methodish_trait_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($attribute, $function_decl_header, $equal, $name, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['attribute' => $this->_attribute, 'function_decl_header' => $this->_function_decl_header, 'equal' => $this->_equal, 'name' => $this->_name, 'semicolon' => $this->_semicolon];
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
        $attribute = $this->_attribute->rewrite($rewriter, $parents);
        $function_decl_header = $this->_function_decl_header->rewrite($rewriter, $parents);
        $equal = $this->_equal->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($attribute === $this->_attribute && $function_decl_header === $this->_function_decl_header && $equal === $this->_equal && $name === $this->_name && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($attribute, $function_decl_header, $equal, $name, $semicolon);
    }
    /**
     * @return EditableNode
     */
    public function getAttributeUNTYPED()
    {
        return $this->_attribute;
    }
    /**
     * @return static
     */
    public function withAttribute(EditableNode $value)
    {
        if ($value === $this->_attribute) {
            return $this;
        }
        return new static($value, $this->_function_decl_header, $this->_equal, $this->_name, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasAttribute()
    {
        return !$this->_attribute->isMissing();
    }
    /**
     * @return null
     */
    /**
     * @return null|EditableNode
     */
    public function getAttribute()
    {
        if ($this->_attribute->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_attribute);
    }
    /**
     * @return
     */
    /**
     * @return EditableNode
     */
    public function getAttributex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_attribute);
    }
    /**
     * @return EditableNode
     */
    public function getFunctionDeclHeaderUNTYPED()
    {
        return $this->_function_decl_header;
    }
    /**
     * @return static
     */
    public function withFunctionDeclHeader(EditableNode $value)
    {
        if ($value === $this->_function_decl_header) {
            return $this;
        }
        return new static($this->_attribute, $value, $this->_equal, $this->_name, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasFunctionDeclHeader()
    {
        return !$this->_function_decl_header->isMissing();
    }
    /**
     * @return FunctionDeclarationHeader
     */
    /**
     * @return FunctionDeclarationHeader
     */
    public function getFunctionDeclHeader()
    {
        return TypeAssert\instance_of(FunctionDeclarationHeader::class, $this->_function_decl_header);
    }
    /**
     * @return FunctionDeclarationHeader
     */
    /**
     * @return FunctionDeclarationHeader
     */
    public function getFunctionDeclHeaderx()
    {
        return $this->getFunctionDeclHeader();
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
        return new static($this->_attribute, $this->_function_decl_header, $value, $this->_name, $this->_semicolon);
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
        return new static($this->_attribute, $this->_function_decl_header, $this->_equal, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return ScopeResolutionExpression
     */
    /**
     * @return ScopeResolutionExpression
     */
    public function getName()
    {
        return TypeAssert\instance_of(ScopeResolutionExpression::class, $this->_name);
    }
    /**
     * @return ScopeResolutionExpression
     */
    /**
     * @return ScopeResolutionExpression
     */
    public function getNamex()
    {
        return $this->getName();
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
        return new static($this->_attribute, $this->_function_decl_header, $this->_equal, $this->_name, $value);
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

