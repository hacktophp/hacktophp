<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e368d0ae1b8aed7b3e1f422098fd0fcc>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class FunctionDeclaration extends EditableNode implements IFunctionishDeclaration
{
    /**
     * @var EditableNode
     */
    private $_attribute_spec;
    /**
     * @var EditableNode
     */
    private $_declaration_header;
    /**
     * @var EditableNode
     */
    private $_body;
    public function __construct(EditableNode $attribute_spec, EditableNode $declaration_header, EditableNode $body)
    {
        parent::__construct('function_declaration');
        $this->_attribute_spec = $attribute_spec;
        $this->_declaration_header = $declaration_header;
        $this->_body = $body;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $attribute_spec = EditableNode::fromJSON($json['function_attribute_spec'], $file, $offset, $source);
        $offset += $attribute_spec->getWidth();
        $declaration_header = EditableNode::fromJSON($json['function_declaration_header'], $file, $offset, $source);
        $offset += $declaration_header->getWidth();
        $body = EditableNode::fromJSON($json['function_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        return new static($attribute_spec, $declaration_header, $body);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('attribute_spec' => $this->_attribute_spec, 'declaration_header' => $this->_declaration_header, 'body' => $this->_body);
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
        $declaration_header = $this->_declaration_header->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        if ($attribute_spec === $this->_attribute_spec && $declaration_header === $this->_declaration_header && $body === $this->_body) {
            return $this;
        }
        return new static($attribute_spec, $declaration_header, $body);
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
        return new static($value, $this->_declaration_header, $this->_body);
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
    public function getDeclarationHeaderUNTYPED()
    {
        return $this->_declaration_header;
    }
    /**
     * @return static
     */
    public function withDeclarationHeader(EditableNode $value)
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
        return !$this->_declaration_header->isMissing();
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
     * @return EditableNode
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(EditableNode $value)
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
        return !$this->_body->isMissing();
    }
    /**
     * @return CompoundStatement | SemicolonToken
     */
    /**
     * @return EditableNode
     */
    public function getBody()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_body);
    }
    /**
     * @return CompoundStatement | SemicolonToken
     */
    /**
     * @return EditableNode
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

