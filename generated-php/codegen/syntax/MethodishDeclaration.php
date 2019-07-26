<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8dbdcf9db4b5900b0efbc630d1a378e8>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
abstract class MethodishDeclarationGeneratedBase extends Node implements IClassBodyDeclaration, IFunctionishDeclaration, IHasAttributeSpec
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'methodish_declaration';
    /**
     * @var null|OldAttributeSpecification
     */
    private $_attribute;
    /**
     * @var FunctionDeclarationHeader
     */
    private $_function_decl_header;
    /**
     * @var null|CompoundStatement
     */
    private $_function_body;
    /**
     * @var null|SemicolonToken
     */
    private $_semicolon;
    public function __construct(?OldAttributeSpecification $attribute, FunctionDeclarationHeader $function_decl_header, ?CompoundStatement $function_body, ?SemicolonToken $semicolon, ?array $source_ref = null)
    {
        $this->_attribute = $attribute;
        $this->_function_decl_header = $function_decl_header;
        $this->_function_body = $function_body;
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
        $attribute = Node::fromJSON($json['methodish_attribute'], $file, $offset, $source, 'OldAttributeSpecification');
        $offset += (($__tmp1__ = $attribute) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $function_decl_header = Node::fromJSON($json['methodish_function_decl_header'], $file, $offset, $source, 'FunctionDeclarationHeader');
        $function_decl_header = $function_decl_header !== null ? $function_decl_header : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $function_decl_header->getWidth();
        $function_body = Node::fromJSON($json['methodish_function_body'], $file, $offset, $source, 'CompoundStatement');
        $offset += (($__tmp2__ = $function_body) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $semicolon = Node::fromJSON($json['methodish_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $offset += (($__tmp3__ = $semicolon) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute, $function_decl_header, $function_body, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute' => $this->_attribute, 'function_decl_header' => $this->_function_decl_header, 'function_body' => $this->_function_body, 'semicolon' => $this->_semicolon]);
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
        $function_body = $this->_function_body === null ? null : $rewriter($this->_function_body, $parents);
        $semicolon = $this->_semicolon === null ? null : $rewriter($this->_semicolon, $parents);
        if ($attribute === $this->_attribute && $function_decl_header === $this->_function_decl_header && $function_body === $this->_function_body && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($attribute, $function_decl_header, $function_body, $semicolon);
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
        return new static($value, $this->_function_decl_header, $this->_function_body, $this->_semicolon);
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
        return new static($this->_attribute, $value, $this->_function_body, $this->_semicolon);
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
    public function getFunctionBodyUNTYPED()
    {
        return $this->_function_body;
    }
    /**
     * @return static
     */
    public function withFunctionBody(?CompoundStatement $value)
    {
        if ($value === $this->_function_body) {
            return $this;
        }
        return new static($this->_attribute, $this->_function_decl_header, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasFunctionBody()
    {
        return $this->_function_body !== null;
    }
    /**
     * @return CompoundStatement | null
     */
    /**
     * @return null|CompoundStatement
     */
    public function getFunctionBody()
    {
        return $this->_function_body;
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getFunctionBodyx()
    {
        return TypeAssert\not_null($this->getFunctionBody());
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
    public function withSemicolon(?SemicolonToken $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_attribute, $this->_function_decl_header, $this->_function_body, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return $this->_semicolon !== null;
    }
    /**
     * @return null | SemicolonToken
     */
    /**
     * @return null|SemicolonToken
     */
    public function getSemicolon()
    {
        return $this->_semicolon;
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolonx()
    {
        return TypeAssert\not_null($this->getSemicolon());
    }
}

