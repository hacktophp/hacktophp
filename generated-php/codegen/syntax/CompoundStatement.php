<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class CompoundStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_brace;
    /**
     * @var EditableNode
     */
    private $_statements;
    /**
     * @var EditableNode
     */
    private $_right_brace;
    public function __construct(EditableNode $left_brace, EditableNode $statements, EditableNode $right_brace)
    {
        parent::__construct('compound_statement');
        $this->_left_brace = $left_brace;
        $this->_statements = $statements;
        $this->_right_brace = $right_brace;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_brace = EditableNode::fromJSON($json['compound_left_brace'], $file, $offset, $source);
        $offset += $left_brace->getWidth();
        $statements = EditableNode::fromJSON($json['compound_statements'], $file, $offset, $source);
        $offset += $statements->getWidth();
        $right_brace = EditableNode::fromJSON($json['compound_right_brace'], $file, $offset, $source);
        $offset += $right_brace->getWidth();
        return new static($left_brace, $statements, $right_brace);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('left_brace' => $this->_left_brace, 'statements' => $this->_statements, 'right_brace' => $this->_right_brace);
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
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $statements = $this->_statements->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
        if ($left_brace === $this->_left_brace && $statements === $this->_statements && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($left_brace, $statements, $right_brace);
    }
    /**
     * @return EditableNode
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(EditableNode $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($value, $this->_statements, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return !$this->_left_brace->isMissing();
    }
    /**
     * @return null | LeftBraceToken
     */
    /**
     * @return null|LeftBraceToken
     */
    public function getLeftBrace()
    {
        if ($this->_left_brace->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBracex()
    {
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
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
        return new static($this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasStatements()
    {
        return !$this->_statements->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getStatements()
    {
        if ($this->_statements->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(EditableList::class, $this->_statements);
    }
    /**
     * @return EditableNode
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(EditableNode $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_left_brace, $this->_statements, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return !$this->_right_brace->isMissing();
    }
    /**
     * @return null | RightBraceToken
     */
    /**
     * @return null|RightBraceToken
     */
    public function getRightBrace()
    {
        if ($this->_right_brace->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBracex()
    {
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
}

