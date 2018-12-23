<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<07c8633289b25022785c9f8bb54a459f>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ConcurrentStatement extends EditableNode
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
        parent::__construct('concurrent_statement');
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
        $keyword = EditableNode::fromJSON($json['concurrent_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $statement = EditableNode::fromJSON($json['concurrent_statement'], $file, $offset, $source);
        $offset += $statement->getWidth();
        return new static($keyword, $statement);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'statement' => $this->_statement);
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

