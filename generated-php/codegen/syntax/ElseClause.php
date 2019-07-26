<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8d7f4902d1ce553ef85f5e5a7eaf7404>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ElseClause extends Node implements IControlFlowStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'else_clause';
    /**
     * @var ElseToken
     */
    private $_keyword;
    /**
     * @var IStatement
     */
    private $_statement;
    public function __construct(ElseToken $keyword, IStatement $statement, ?array $source_ref = null)
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
        $keyword = Node::fromJSON($json['else_keyword'], $file, $offset, $source, 'ElseToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $statement = Node::fromJSON($json['else_statement'], $file, $offset, $source, 'IStatement');
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
    public function withKeyword(ElseToken $value)
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
     * @return ElseToken
     */
    /**
     * @return ElseToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ElseToken::class, $this->_keyword);
    }
    /**
     * @return ElseToken
     */
    /**
     * @return ElseToken
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
    public function withStatement(IStatement $value)
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
     * @return CompoundStatement | EchoStatement | ExpressionStatement |
     * IfStatement | ReturnStatement
     */
    /**
     * @return IStatement
     */
    public function getStatement()
    {
        return TypeAssert\instance_of(IStatement::class, $this->_statement);
    }
    /**
     * @return CompoundStatement | EchoStatement | ExpressionStatement |
     * IfStatement | ReturnStatement
     */
    /**
     * @return IStatement
     */
    public function getStatementx()
    {
        return $this->getStatement();
    }
}

