<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4a260a532cad42ca00c96e1ee697c6d4>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPClassAttributeDeclaration extends Node implements IClassBodyDeclaration
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_class_attribute_declaration';
    /**
     * @var AttributeToken
     */
    private $_keyword;
    /**
     * @var NodeList<ListItem<Node>>
     */
    private $_attributes;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    /**
     * @param NodeList<ListItem<Node>> $attributes
     */
    public function __construct(AttributeToken $keyword, NodeList $attributes, SemicolonToken $semicolon, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_attributes = $attributes;
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
        $keyword = Node::fromJSON($json['xhp_attribute_keyword'], $file, $offset, $source, 'AttributeToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $attributes = Node::fromJSON($json['xhp_attribute_attributes'], $file, $offset, $source, 'NodeList<ListItem<Node>>');
        $attributes = $attributes !== null ? $attributes : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $attributes->getWidth();
        $semicolon = Node::fromJSON($json['xhp_attribute_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $attributes, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'attributes' => $this->_attributes, 'semicolon' => $this->_semicolon]);
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
        $keyword = $rewriter($this->_keyword, $parents);
        $attributes = $rewriter($this->_attributes, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $attributes === $this->_attributes && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $attributes, $semicolon);
    }
    /**
     * @return null|Node
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(AttributeToken $value)
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
        return $this->_keyword !== null;
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
     * @return null|Node
     */
    public function getAttributesUNTYPED()
    {
        return $this->_attributes;
    }
    /**
     * @param NodeList<ListItem<Node>> $value
     *
     * @return static
     */
    public function withAttributes(NodeList $value)
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
        return $this->_attributes !== null;
    }
    /**
     * @return NodeList<ListItem<XHPClassAttribute>> | NodeList<ListItem<Node>> |
     * NodeList<ListItem<XHPSimpleClassAttribute>>
     */
    /**
     * @return NodeList<ListItem<Node>>
     */
    public function getAttributes()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_attributes);
    }
    /**
     * @return NodeList<ListItem<XHPClassAttribute>> | NodeList<ListItem<Node>> |
     * NodeList<ListItem<XHPSimpleClassAttribute>>
     */
    /**
     * @return NodeList<ListItem<Node>>
     */
    public function getAttributesx()
    {
        return $this->getAttributes();
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
        return new static($this->_keyword, $this->_attributes, $value);
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

