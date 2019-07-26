<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5b95f2867843e864fd0ed3263c8cf034>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ConcurrentStatement extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'concurrent_statement';
    /**
     * @var ConcurrentToken
     */
    private $_keyword;
    /**
     * @var CompoundStatement
     */
    private $_statement;
    public function __construct(ConcurrentToken $keyword, CompoundStatement $statement, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_statement = $statement;
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
        $keyword = Node::fromJSON($json['concurrent_keyword'], $file, $offset, $source, 'ConcurrentToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $statement = Node::fromJSON($json['concurrent_statement'], $file, $offset, $source, 'CompoundStatement');
        $statement = $statement !== null ? $statement : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $statement->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $statement, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'statement' => $this->_statement]);
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
        $statement = $rewriter($this->_statement, $parents);
        if ($keyword === $this->_keyword && $statement === $this->_statement) {
            return $this;
        }
        return new static($keyword, $statement);
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
    public function withKeyword(ConcurrentToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_statement);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return ConcurrentToken
     */
    /**
     * @return ConcurrentToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ConcurrentToken::class, $this->_keyword);
    }
    /**
     * @return ConcurrentToken
     */
    /**
     * @return ConcurrentToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getStatementUNTYPED()
    {
        return $this->_statement;
    }
    /**
     * @return static
     */
    public function withStatement(CompoundStatement $value)
    {
        if ($value === $this->_statement) {
            return $this;
        }
        return new static($this->_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasStatement()
    {
        return $this->_statement !== null;
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getStatement()
    {
        return TypeAssert\instance_of(CompoundStatement::class, $this->_statement);
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getStatementx()
    {
        return $this->getStatement();
    }
}

