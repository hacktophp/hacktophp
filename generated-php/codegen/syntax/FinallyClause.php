<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<29362d550571fffc19ae025baad52e8f>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class FinallyClause extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'finally_clause';
    /**
     * @var FinallyToken
     */
    private $_keyword;
    /**
     * @var CompoundStatement
     */
    private $_body;
    public function __construct(FinallyToken $keyword, CompoundStatement $body, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
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
        $keyword = Node::fromJSON($json['finally_keyword'], $file, $offset, $source, 'FinallyToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $body = Node::fromJSON($json['finally_body'], $file, $offset, $source, 'CompoundStatement');
        $body = $body !== null ? $body : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $body->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $body, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'body' => $this->_body]);
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
        $body = $rewriter($this->_body, $parents);
        if ($keyword === $this->_keyword && $body === $this->_body) {
            return $this;
        }
        return new static($keyword, $body);
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
    public function withKeyword(FinallyToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return FinallyToken
     */
    /**
     * @return FinallyToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(FinallyToken::class, $this->_keyword);
    }
    /**
     * @return FinallyToken
     */
    /**
     * @return FinallyToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
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
    public function withBody(CompoundStatement $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return $this->_body !== null;
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getBody()
    {
        return TypeAssert\instance_of(CompoundStatement::class, $this->_body);
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

