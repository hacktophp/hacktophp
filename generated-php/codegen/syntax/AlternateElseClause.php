<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0584a02f7feae8f1c89b78af82cf0f93>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class AlternateElseClause extends EditableNode implements IControlFlowStatement
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_colon;
    /**
     * @var EditableNode
     */
    private $_statement;
    public function __construct(EditableNode $keyword, EditableNode $colon, EditableNode $statement)
    {
        parent::__construct('alternate_else_clause');
        $this->_keyword = $keyword;
        $this->_colon = $colon;
        $this->_statement = $statement;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['alternate_else_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $colon = EditableNode::fromJSON($json['alternate_else_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        $statement = EditableNode::fromJSON($json['alternate_else_statement'], $file, $offset, $source);
        $offset += $statement->getWidth();
        return new static($keyword, $colon, $statement);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'colon' => $this->_colon, 'statement' => $this->_statement];
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
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $statement = $this->_statement->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $colon === $this->_colon && $statement === $this->_statement) {
            return $this;
        }
        return new static($keyword, $colon, $statement);
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
        return new static($value, $this->_colon, $this->_statement);
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
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(EditableNode $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_statement);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return !$this->_colon->isMissing();
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColon()
    {
        return TypeAssert\instance_of(ColonToken::class, $this->_colon);
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColonx()
    {
        return $this->getColon();
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
        return new static($this->_keyword, $this->_colon, $value);
    }
    /**
     * @return bool
     */
    public function hasStatement()
    {
        return !$this->_statement->isMissing();
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getStatement()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_statement);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getStatementx()
    {
        return $this->getStatement();
    }
}

