<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<835fecc817f2f53f05449eb8fd15fb3f>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
abstract class AlternateLoopStatementGeneratedBase extends EditableNode implements IControlFlowStatement, ILoopStatement
{
    /**
     * @var EditableNode
     */
    private $_opening_colon;
    /**
     * @var EditableNode
     */
    private $_statements;
    /**
     * @var EditableNode
     */
    private $_closing_keyword;
    /**
     * @var EditableNode
     */
    private $_closing_semicolon;
    public function __construct(EditableNode $opening_colon, EditableNode $statements, EditableNode $closing_keyword, EditableNode $closing_semicolon)
    {
        parent::__construct('alternate_loop_statement');
        $this->_opening_colon = $opening_colon;
        $this->_statements = $statements;
        $this->_closing_keyword = $closing_keyword;
        $this->_closing_semicolon = $closing_semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $opening_colon = EditableNode::fromJSON($json['alternate_loop_opening_colon'], $file, $offset, $source);
        $offset += $opening_colon->getWidth();
        $statements = EditableNode::fromJSON($json['alternate_loop_statements'], $file, $offset, $source);
        $offset += $statements->getWidth();
        $closing_keyword = EditableNode::fromJSON($json['alternate_loop_closing_keyword'], $file, $offset, $source);
        $offset += $closing_keyword->getWidth();
        $closing_semicolon = EditableNode::fromJSON($json['alternate_loop_closing_semicolon'], $file, $offset, $source);
        $offset += $closing_semicolon->getWidth();
        return new static($opening_colon, $statements, $closing_keyword, $closing_semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('opening_colon' => $this->_opening_colon, 'statements' => $this->_statements, 'closing_keyword' => $this->_closing_keyword, 'closing_semicolon' => $this->_closing_semicolon);
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
        $opening_colon = $this->_opening_colon->rewrite($rewriter, $parents);
        $statements = $this->_statements->rewrite($rewriter, $parents);
        $closing_keyword = $this->_closing_keyword->rewrite($rewriter, $parents);
        $closing_semicolon = $this->_closing_semicolon->rewrite($rewriter, $parents);
        if ($opening_colon === $this->_opening_colon && $statements === $this->_statements && $closing_keyword === $this->_closing_keyword && $closing_semicolon === $this->_closing_semicolon) {
            return $this;
        }
        return new static($opening_colon, $statements, $closing_keyword, $closing_semicolon);
    }
    /**
     * @return EditableNode
     */
    public function getOpeningColonUNTYPED()
    {
        return $this->_opening_colon;
    }
    /**
     * @return static
     */
    public function withOpeningColon(EditableNode $value)
    {
        if ($value === $this->_opening_colon) {
            return $this;
        }
        return new static($value, $this->_statements, $this->_closing_keyword, $this->_closing_semicolon);
    }
    /**
     * @return bool
     */
    public function hasOpeningColon()
    {
        return !$this->_opening_colon->isMissing();
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getOpeningColon()
    {
        return TypeAssert\instance_of(ColonToken::class, $this->_opening_colon);
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getOpeningColonx()
    {
        return $this->getOpeningColon();
    }
    /**
     * @return EditableNode
     */
    public function getStatementsUNTYPED()
    {
        return $this->_statements;
    }
    /**
     * @return static
     */
    public function withStatements(EditableNode $value)
    {
        if ($value === $this->_statements) {
            return $this;
        }
        return new static($this->_opening_colon, $value, $this->_closing_keyword, $this->_closing_semicolon);
    }
    /**
     * @return bool
     */
    public function hasStatements()
    {
        return !$this->_statements->isMissing();
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getStatements()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_statements);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getStatementsx()
    {
        return $this->getStatements();
    }
    /**
     * @return EditableNode
     */
    public function getClosingKeywordUNTYPED()
    {
        return $this->_closing_keyword;
    }
    /**
     * @return static
     */
    public function withClosingKeyword(EditableNode $value)
    {
        if ($value === $this->_closing_keyword) {
            return $this;
        }
        return new static($this->_opening_colon, $this->_statements, $value, $this->_closing_semicolon);
    }
    /**
     * @return bool
     */
    public function hasClosingKeyword()
    {
        return !$this->_closing_keyword->isMissing();
    }
    /**
     * @return EnddeclareToken | EndforToken | EndforeachToken | EndwhileToken
     */
    /**
     * @return EditableToken
     */
    public function getClosingKeyword()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_closing_keyword);
    }
    /**
     * @return EnddeclareToken | EndforToken | EndforeachToken | EndwhileToken
     */
    /**
     * @return EditableToken
     */
    public function getClosingKeywordx()
    {
        return $this->getClosingKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getClosingSemicolonUNTYPED()
    {
        return $this->_closing_semicolon;
    }
    /**
     * @return static
     */
    public function withClosingSemicolon(EditableNode $value)
    {
        if ($value === $this->_closing_semicolon) {
            return $this;
        }
        return new static($this->_opening_colon, $this->_statements, $this->_closing_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasClosingSemicolon()
    {
        return !$this->_closing_semicolon->isMissing();
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getClosingSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_closing_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getClosingSemicolonx()
    {
        return $this->getClosingSemicolon();
    }
}

