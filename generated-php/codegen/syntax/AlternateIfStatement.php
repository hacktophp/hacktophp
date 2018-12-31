<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<98a6c2f20c31e8729507c3524979c3f4>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class AlternateIfStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_condition;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_colon;
    /**
     * @var EditableNode
     */
    private $_statement;
    /**
     * @var EditableNode
     */
    private $_elseif_clauses;
    /**
     * @var EditableNode
     */
    private $_else_clause;
    /**
     * @var EditableNode
     */
    private $_endif_keyword;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $condition, EditableNode $right_paren, EditableNode $colon, EditableNode $statement, EditableNode $elseif_clauses, EditableNode $else_clause, EditableNode $endif_keyword, EditableNode $semicolon)
    {
        parent::__construct('alternate_if_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_condition = $condition;
        $this->_right_paren = $right_paren;
        $this->_colon = $colon;
        $this->_statement = $statement;
        $this->_elseif_clauses = $elseif_clauses;
        $this->_else_clause = $else_clause;
        $this->_endif_keyword = $endif_keyword;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['alternate_if_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['alternate_if_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $condition = EditableNode::fromJSON($json['alternate_if_condition'], $file, $offset, $source);
        $offset += $condition->getWidth();
        $right_paren = EditableNode::fromJSON($json['alternate_if_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $colon = EditableNode::fromJSON($json['alternate_if_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        $statement = EditableNode::fromJSON($json['alternate_if_statement'], $file, $offset, $source);
        $offset += $statement->getWidth();
        $elseif_clauses = EditableNode::fromJSON($json['alternate_if_elseif_clauses'], $file, $offset, $source);
        $offset += $elseif_clauses->getWidth();
        $else_clause = EditableNode::fromJSON($json['alternate_if_else_clause'], $file, $offset, $source);
        $offset += $else_clause->getWidth();
        $endif_keyword = EditableNode::fromJSON($json['alternate_if_endif_keyword'], $file, $offset, $source);
        $offset += $endif_keyword->getWidth();
        $semicolon = EditableNode::fromJSON($json['alternate_if_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $left_paren, $condition, $right_paren, $colon, $statement, $elseif_clauses, $else_clause, $endif_keyword, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'condition' => $this->_condition, 'right_paren' => $this->_right_paren, 'colon' => $this->_colon, 'statement' => $this->_statement, 'elseif_clauses' => $this->_elseif_clauses, 'else_clause' => $this->_else_clause, 'endif_keyword' => $this->_endif_keyword, 'semicolon' => $this->_semicolon];
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $condition = $this->_condition->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $statement = $this->_statement->rewrite($rewriter, $parents);
        $elseif_clauses = $this->_elseif_clauses->rewrite($rewriter, $parents);
        $else_clause = $this->_else_clause->rewrite($rewriter, $parents);
        $endif_keyword = $this->_endif_keyword->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $condition === $this->_condition && $right_paren === $this->_right_paren && $colon === $this->_colon && $statement === $this->_statement && $elseif_clauses === $this->_elseif_clauses && $else_clause === $this->_else_clause && $endif_keyword === $this->_endif_keyword && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $left_paren, $condition, $right_paren, $colon, $statement, $elseif_clauses, $else_clause, $endif_keyword, $semicolon);
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
        return new static($value, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return IfToken
     */
    /**
     * @return IfToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(IfToken::class, $this->_keyword);
    }
    /**
     * @return IfToken
     */
    /**
     * @return IfToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(EditableNode $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return !$this->_left_paren->isMissing();
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParen()
    {
        return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParenx()
    {
        return $this->getLeftParen();
    }
    /**
     * @return EditableNode
     */
    public function getConditionUNTYPED()
    {
        return $this->_condition;
    }
    /**
     * @return static
     */
    public function withCondition(EditableNode $value)
    {
        if ($value === $this->_condition) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_colon, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasCondition()
    {
        return !$this->_condition->isMissing();
    }
    /**
     * @return BinaryExpression | LiteralExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getCondition()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_condition);
    }
    /**
     * @return BinaryExpression | LiteralExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getConditionx()
    {
        return $this->getCondition();
    }
    /**
     * @return EditableNode
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(EditableNode $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $value, $this->_colon, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return !$this->_right_paren->isMissing();
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParen()
    {
        return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParenx()
    {
        return $this->getRightParen();
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
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $value, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
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
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $value, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
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
    /**
     * @return EditableNode
     */
    public function getElseifClausesUNTYPED()
    {
        return $this->_elseif_clauses;
    }
    /**
     * @return static
     */
    public function withElseifClauses(EditableNode $value)
    {
        if ($value === $this->_elseif_clauses) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement, $value, $this->_else_clause, $this->_endif_keyword, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasElseifClauses()
    {
        return !$this->_elseif_clauses->isMissing();
    }
    /**
     * @return null
     */
    /**
     * @return null|EditableNode
     */
    public function getElseifClauses()
    {
        if ($this->_elseif_clauses->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_elseif_clauses);
    }
    /**
     * @return
     */
    /**
     * @return EditableNode
     */
    public function getElseifClausesx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_elseif_clauses);
    }
    /**
     * @return EditableNode
     */
    public function getElseClauseUNTYPED()
    {
        return $this->_else_clause;
    }
    /**
     * @return static
     */
    public function withElseClause(EditableNode $value)
    {
        if ($value === $this->_else_clause) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement, $this->_elseif_clauses, $value, $this->_endif_keyword, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasElseClause()
    {
        return !$this->_else_clause->isMissing();
    }
    /**
     * @return AlternateElseClause | null
     */
    /**
     * @return null|AlternateElseClause
     */
    public function getElseClause()
    {
        if ($this->_else_clause->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AlternateElseClause::class, $this->_else_clause);
    }
    /**
     * @return AlternateElseClause
     */
    /**
     * @return AlternateElseClause
     */
    public function getElseClausex()
    {
        return TypeAssert\instance_of(AlternateElseClause::class, $this->_else_clause);
    }
    /**
     * @return EditableNode
     */
    public function getEndifKeywordUNTYPED()
    {
        return $this->_endif_keyword;
    }
    /**
     * @return static
     */
    public function withEndifKeyword(EditableNode $value)
    {
        if ($value === $this->_endif_keyword) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasEndifKeyword()
    {
        return !$this->_endif_keyword->isMissing();
    }
    /**
     * @return EndifToken
     */
    /**
     * @return EndifToken
     */
    public function getEndifKeyword()
    {
        return TypeAssert\instance_of(EndifToken::class, $this->_endif_keyword);
    }
    /**
     * @return EndifToken
     */
    /**
     * @return EndifToken
     */
    public function getEndifKeywordx()
    {
        return $this->getEndifKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(EditableNode $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement, $this->_elseif_clauses, $this->_else_clause, $this->_endif_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
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

