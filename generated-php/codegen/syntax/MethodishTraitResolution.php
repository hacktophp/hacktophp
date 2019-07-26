<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<64839851419cf832b421c3b78631d9d3>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class MethodishTraitResolution extends Node implements IClassBodyDeclaration
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'methodish_trait_resolution';
    /**
     * @var null|Node
     */
    private $_attribute;
    /**
     * @var FunctionDeclarationHeader
     */
    private $_function_decl_header;
    /**
     * @var EqualToken
     */
    private $_equal;
    /**
     * @var ScopeResolutionExpression
     */
    private $_name;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(?Node $attribute, FunctionDeclarationHeader $function_decl_header, EqualToken $equal, ScopeResolutionExpression $name, SemicolonToken $semicolon, ?array $source_ref = null)
    {
        $this->_attribute = $attribute;
        $this->_function_decl_header = $function_decl_header;
        $this->_equal = $equal;
        $this->_name = $name;
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
        $attribute = Node::fromJSON($json['methodish_trait_attribute'], $file, $offset, $source, 'Node');
        $offset += (($__tmp1__ = $attribute) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $function_decl_header = Node::fromJSON($json['methodish_trait_function_decl_header'], $file, $offset, $source, 'FunctionDeclarationHeader');
        $function_decl_header = $function_decl_header !== null ? $function_decl_header : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $function_decl_header->getWidth();
        $equal = Node::fromJSON($json['methodish_trait_equal'], $file, $offset, $source, 'EqualToken');
        $equal = $equal !== null ? $equal : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $equal->getWidth();
        $name = Node::fromJSON($json['methodish_trait_name'], $file, $offset, $source, 'ScopeResolutionExpression');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $semicolon = Node::fromJSON($json['methodish_trait_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute, $function_decl_header, $equal, $name, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute' => $this->_attribute, 'function_decl_header' => $this->_function_decl_header, 'equal' => $this->_equal, 'name' => $this->_name, 'semicolon' => $this->_semicolon]);
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
        $function_decl_header = $rewriter($this->_function_decl_header, $parents);
        $equal = $rewriter($this->_equal, $parents);
        $name = $rewriter($this->_name, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($attribute === $this->_attribute && $function_decl_header === $this->_function_decl_header && $equal === $this->_equal && $name === $this->_name && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($attribute, $function_decl_header, $equal, $name, $semicolon);
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
    public function withAttribute(?Node $value)
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
        return $this->_attribute !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
     */
    public function getAttribute()
    {
        return $this->_attribute;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getAttributex()
    {
        return TypeAssert\not_null($this->getAttribute());
    }
    /**
     * @return null|Node
     */
    public function getFunctionDeclHeaderUNTYPED()
    {
        return $this->_function_decl_header;
    }
    /**
     * @return static
     */
    public function withFunctionDeclHeader(FunctionDeclarationHeader $value)
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
        return $this->_function_decl_header !== null;
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
        return new static($this->_attribute, $this->_function_decl_header, $value, $this->_name, $this->_semicolon);
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
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(ScopeResolutionExpression $value)
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
        return $this->_name !== null;
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
        return new static($this->_attribute, $this->_function_decl_header, $this->_equal, $this->_name, $value);
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

