<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class MethodishDeclaration extends EditableNode implements IFunctionishDeclaration
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
    private $_function_body;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $attribute, EditableNode $function_decl_header, EditableNode $function_body, EditableNode $semicolon)
    {
        parent::__construct('methodish_declaration');
        $this->_attribute = $attribute;
        $this->_function_decl_header = $function_decl_header;
        $this->_function_body = $function_body;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $attribute = EditableNode::fromJSON($json['methodish_attribute'], $file, $offset, $source);
        $offset += $attribute->getWidth();
        $function_decl_header = EditableNode::fromJSON($json['methodish_function_decl_header'], $file, $offset, $source);
        $offset += $function_decl_header->getWidth();
        $function_body = EditableNode::fromJSON($json['methodish_function_body'], $file, $offset, $source);
        $offset += $function_body->getWidth();
        $semicolon = EditableNode::fromJSON($json['methodish_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($attribute, $function_decl_header, $function_body, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('attribute' => $this->_attribute, 'function_decl_header' => $this->_function_decl_header, 'function_body' => $this->_function_body, 'semicolon' => $this->_semicolon);
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
        $attribute = $this->_attribute->rewrite($rewriter, $parents);
        $function_decl_header = $this->_function_decl_header->rewrite($rewriter, $parents);
        $function_body = $this->_function_body->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($attribute === $this->_attribute && $function_decl_header === $this->_function_decl_header && $function_body === $this->_function_body && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($attribute, $function_decl_header, $function_body, $semicolon);
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
        return new static($value, $this->_function_decl_header, $this->_function_body, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasAttribute()
    {
        return !$this->_attribute->isMissing();
    }
    /**
     * @return AttributeSpecification | null
     */
    /**
     * @return null|AttributeSpecification
     */
    public function getAttribute()
    {
        if ($this->_attribute->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute);
    }
    /**
     * @return AttributeSpecification
     */
    /**
     * @return AttributeSpecification
     */
    public function getAttributex()
    {
        return TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute);
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
        return new static($this->_attribute, $value, $this->_function_body, $this->_semicolon);
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
    public function getFunctionBodyUNTYPED()
    {
        return $this->_function_body;
    }
    /**
     * @return static
     */
    public function withFunctionBody(EditableNode $value)
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
        return !$this->_function_body->isMissing();
    }
    /**
     * @return CompoundStatement | null
     */
    /**
     * @return null|CompoundStatement
     */
    public function getFunctionBody()
    {
        if ($this->_function_body->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(CompoundStatement::class, $this->_function_body);
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getFunctionBodyx()
    {
        return TypeAssert\instance_of(CompoundStatement::class, $this->_function_body);
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
        return new static($this->_attribute, $this->_function_decl_header, $this->_function_body, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
    }
    /**
     * @return null | SemicolonToken
     */
    /**
     * @return null|SemicolonToken
     */
    public function getSemicolon()
    {
        if ($this->_semicolon->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
}

