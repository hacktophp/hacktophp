<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<bc97003efe9c404c9f07953a54e55f13>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class FunctionDeclaration extends Node implements IFunctionishDeclaration, IHasFunctionBody, IHasAttributeSpec
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'function_declaration';
    /**
     * @var null|OldAttributeSpecification
     */
    private $_attribute_spec;
    /**
     * @var FunctionDeclarationHeader
     */
    private $_declaration_header;
    /**
     * @var Node
     */
    private $_body;
    public function __construct(?OldAttributeSpecification $attribute_spec, FunctionDeclarationHeader $declaration_header, Node $body, ?__Private\SourceRef $source_ref = null)
    {
        $this->_attribute_spec = $attribute_spec;
        $this->_declaration_header = $declaration_header;
        $this->_body = $body;
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
        $attribute_spec = Node::fromJSON($json['function_attribute_spec'], $file, $offset, $source, 'OldAttributeSpecification');
        $offset += (($__tmp1__ = $attribute_spec) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $declaration_header = Node::fromJSON($json['function_declaration_header'], $file, $offset, $source, 'FunctionDeclarationHeader');
        $declaration_header = $declaration_header !== null ? $declaration_header : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $declaration_header->getWidth();
        $body = Node::fromJSON($json['function_body'], $file, $offset, $source, 'Node');
        $body = $body !== null ? $body : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $body->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute_spec, $declaration_header, $body, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute_spec' => $this->_attribute_spec, 'declaration_header' => $this->_declaration_header, 'body' => $this->_body]);
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
        $declaration_header = $rewriter($this->_declaration_header, $parents);
        $body = $rewriter($this->_body, $parents);
        if ($attribute_spec === $this->_attribute_spec && $declaration_header === $this->_declaration_header && $body === $this->_body) {
            return $this;
        }
        return new static($attribute_spec, $declaration_header, $body);
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
        return new static($value, $this->_declaration_header, $this->_body);
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
    public function getDeclarationHeaderUNTYPED()
    {
        return $this->_declaration_header;
    }
    /**
     * @return static
     */
    public function withDeclarationHeader(FunctionDeclarationHeader $value)
    {
        if ($value === $this->_declaration_header) {
            return $this;
        }
        return new static($this->_attribute_spec, $value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasDeclarationHeader()
    {
        return $this->_declaration_header !== null;
    }
    /**
     * @return FunctionDeclarationHeader
     */
    /**
     * @return FunctionDeclarationHeader
     */
    public function getDeclarationHeader()
    {
        return TypeAssert\instance_of(FunctionDeclarationHeader::class, $this->_declaration_header);
    }
    /**
     * @return FunctionDeclarationHeader
     */
    /**
     * @return FunctionDeclarationHeader
     */
    public function getDeclarationHeaderx()
    {
        return $this->getDeclarationHeader();
    }
    /**
     * @return null|Node
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(Node $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_declaration_header, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return $this->_body !== null;
    }
    /**
     * @return CompoundStatement | SemicolonToken
     */
    /**
     * @return Node
     */
    public function getBody()
    {
        return $this->_body;
    }
    /**
     * @return CompoundStatement | SemicolonToken
     */
    /**
     * @return Node
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

