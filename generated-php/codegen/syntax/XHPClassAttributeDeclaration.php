<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f1fdb0d4e9b3b659625b84e67a38e451>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class XHPClassAttributeDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_attributes;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $attributes, EditableNode $semicolon)
    {
        parent::__construct('xhp_class_attribute_declaration');
        $this->_keyword = $keyword;
        $this->_attributes = $attributes;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['xhp_attribute_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $attributes = EditableNode::fromJSON($json['xhp_attribute_attributes'], $file, $offset, $source);
        $offset += $attributes->getWidth();
        $semicolon = EditableNode::fromJSON($json['xhp_attribute_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $attributes, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'attributes' => $this->_attributes, 'semicolon' => $this->_semicolon];
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
        $attributes = $this->_attributes->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $attributes === $this->_attributes && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $attributes, $semicolon);
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
        return new static($value, $this->_attributes, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return AttributeToken
     */
    /**
     * @return AttributeToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(AttributeToken::class, $this->_keyword);
    }
    /**
     * @return AttributeToken
     */
    /**
     * @return AttributeToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getAttributesUNTYPED()
    {
        return $this->_attributes;
    }
    /**
     * @return static
     */
    public function withAttributes(EditableNode $value)
    {
        if ($value === $this->_attributes) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasAttributes()
    {
        return !$this->_attributes->isMissing();
    }
    /**
     * @return EditableList<XHPClassAttribute> | EditableList<EditableNode> |
     * EditableList<XHPSimpleClassAttribute>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getAttributes()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_attributes);
    }
    /**
     * @return EditableList<XHPClassAttribute> | EditableList<EditableNode> |
     * EditableList<XHPSimpleClassAttribute>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getAttributesx()
    {
        return $this->getAttributes();
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
        return new static($this->_keyword, $this->_attributes, $value);
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

