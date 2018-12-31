<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8a1fb20674d6644f8671275e37181d54>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
abstract class NamespaceDeclarationGeneratedBase extends EditableNode
{
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
    private $_body;
    public function __construct(EditableNode $keyword, EditableNode $name, EditableNode $body)
    {
        parent::__construct('namespace_declaration');
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_body = $body;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['namespace_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $name = EditableNode::fromJSON($json['namespace_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $body = EditableNode::fromJSON($json['namespace_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        return new static($keyword, $name, $body);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'name' => $this->_name, 'body' => $this->_body];
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $name === $this->_name && $body === $this->_body) {
            return $this;
        }
        return new static($keyword, $name, $body);
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
        return new static($value, $this->_name, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return NamespaceToken
     */
    /**
     * @return NamespaceToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(NamespaceToken::class, $this->_keyword);
    }
    /**
     * @return NamespaceToken
     */
    /**
     * @return NamespaceToken
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
        return new static($this->_keyword, $value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return null | QualifiedName | NameToken
     */
    /**
     * @return null|EditableNode
     */
    public function getName()
    {
        if ($this->_name->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_name);
    }
    /**
     * @return QualifiedName | NameToken
     */
    /**
     * @return EditableNode
     */
    public function getNamex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_name);
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
        return new static($this->_keyword, $this->_name, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return !$this->_body->isMissing();
    }
    /**
     * @return NamespaceBody | NamespaceEmptyBody
     */
    /**
     * @return EditableNode
     */
    public function getBody()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_body);
    }
    /**
     * @return NamespaceBody | NamespaceEmptyBody
     */
    /**
     * @return EditableNode
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

