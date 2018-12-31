<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b012cdc9ece422a269624cecf9ce9a05>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class ElseClause extends EditableNode implements IControlFlowStatement
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_statement;
    public function __construct(EditableNode $keyword, EditableNode $statement)
    {
        parent::__construct('else_clause');
        $this->_keyword = $keyword;
        $this->_statement = $statement;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['else_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $statement = EditableNode::fromJSON($json['else_statement'], $file, $offset, $source);
        $offset += $statement->getWidth();
        return new static($keyword, $statement);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'statement' => $this->_statement];
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
        $statement = $this->_statement->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $statement === $this->_statement) {
            return $this;
        }
        return new static($keyword, $statement);
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
        return new static($value, $this->_statement);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
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
     * @return EditableNode
     */
    public function getStatementUNTYPED()
    {
        return $this->_statement;
    }
    /**
     * @return static
     */
    public function withStatement(EditableNode $value)
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
        return !$this->_statement->isMissing();
    }
    /**
     * @return CompoundStatement | EchoStatement | ExpressionStatement |
     * IfStatement | ReturnStatement
     */
    /**
     * @return EditableNode
     */
    public function getStatement()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_statement);
    }
    /**
     * @return CompoundStatement | EchoStatement | ExpressionStatement |
     * IfStatement | ReturnStatement
     */
    /**
     * @return EditableNode
     */
    public function getStatementx()
    {
        return $this->getStatement();
    }
}

