<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b6339026e5946791e8cb51a9b88774a1>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
abstract class NamespaceDeclarationGeneratedBase extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'namespace_declaration';
    /**
     * @var NamespaceToken
     */
    private $_keyword;
    /**
     * @var null|INameishNode
     */
    private $_name;
    /**
     * @var INamespaceBody
     */
    private $_body;
    public function __construct(NamespaceToken $keyword, ?INameishNode $name, INamespaceBody $body, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_name = $name;
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
        $keyword = Node::fromJSON($json['namespace_keyword'], $file, $offset, $source, 'NamespaceToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $name = Node::fromJSON($json['namespace_name'], $file, $offset, $source, 'INameishNode');
        $offset += (($__tmp1__ = $name) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $body = Node::fromJSON($json['namespace_body'], $file, $offset, $source, 'INamespaceBody');
        $body = $body !== null ? $body : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $body->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $name, $body, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'name' => $this->_name, 'body' => $this->_body]);
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
        $name = $this->_name === null ? null : $rewriter($this->_name, $parents);
        $body = $rewriter($this->_body, $parents);
        if ($keyword === $this->_keyword && $name === $this->_name && $body === $this->_body) {
            return $this;
        }
        return new static($keyword, $name, $body);
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
    public function withKeyword(NamespaceToken $value)
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
        return $this->_keyword !== null;
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
     * @return null|Node
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(?INameishNode $value)
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
        return $this->_name !== null;
    }
    /**
     * @return null | QualifiedName | NameToken
     */
    /**
     * @return null|INameishNode
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @return QualifiedName | NameToken
     */
    /**
     * @return INameishNode
     */
    public function getNamex()
    {
        return TypeAssert\not_null($this->getName());
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
    public function withBody(INamespaceBody $value)
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
        return $this->_body !== null;
    }
    /**
     * @return NamespaceBody | NamespaceEmptyBody
     */
    /**
     * @return INamespaceBody
     */
    public function getBody()
    {
        return TypeAssert\instance_of(INamespaceBody::class, $this->_body);
    }
    /**
     * @return NamespaceBody | NamespaceEmptyBody
     */
    /**
     * @return INamespaceBody
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

