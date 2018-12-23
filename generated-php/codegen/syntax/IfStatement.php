<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class IfStatement extends EditableNode implements IControlFlowStatement
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
    private $_statement;
    /**
     * @var EditableNode
     */
    private $_elseif_clauses;
    /**
     * @var EditableNode
     */
    private $_else_clause;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $condition, EditableNode $right_paren, EditableNode $statement, EditableNode $elseif_clauses, EditableNode $else_clause)
    {
        parent::__construct('if_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_condition = $condition;
        $this->_right_paren = $right_paren;
        $this->_statement = $statement;
        $this->_elseif_clauses = $elseif_clauses;
        $this->_else_clause = $else_clause;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['if_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['if_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $condition = EditableNode::fromJSON($json['if_condition'], $file, $offset, $source);
        $offset += $condition->getWidth();
        $right_paren = EditableNode::fromJSON($json['if_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $statement = EditableNode::fromJSON($json['if_statement'], $file, $offset, $source);
        $offset += $statement->getWidth();
        $elseif_clauses = EditableNode::fromJSON($json['if_elseif_clauses'], $file, $offset, $source);
        $offset += $elseif_clauses->getWidth();
        $else_clause = EditableNode::fromJSON($json['if_else_clause'], $file, $offset, $source);
        $offset += $else_clause->getWidth();
        return new static($keyword, $left_paren, $condition, $right_paren, $statement, $elseif_clauses, $else_clause);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'condition' => $this->_condition, 'right_paren' => $this->_right_paren, 'statement' => $this->_statement, 'elseif_clauses' => $this->_elseif_clauses, 'else_clause' => $this->_else_clause);
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $condition = $this->_condition->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $statement = $this->_statement->rewrite($rewriter, $parents);
        $elseif_clauses = $this->_elseif_clauses->rewrite($rewriter, $parents);
        $else_clause = $this->_else_clause->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $condition === $this->_condition && $right_paren === $this->_right_paren && $statement === $this->_statement && $elseif_clauses === $this->_elseif_clauses && $else_clause === $this->_else_clause) {
            return $this;
        }
        return new static($keyword, $left_paren, $condition, $right_paren, $statement, $elseif_clauses, $else_clause);
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
        return new static($value, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_statement, $this->_elseif_clauses, $this->_else_clause);
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
        return new static($this->_keyword, $value, $this->_condition, $this->_right_paren, $this->_statement, $this->_elseif_clauses, $this->_else_clause);
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
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_statement, $this->_elseif_clauses, $this->_else_clause);
    }
    /**
     * @return bool
     */
    public function hasCondition()
    {
        return !$this->_condition->isMissing();
    }
    /**
     * @return ArrayIntrinsicExpression | AsExpression | BinaryExpression |
     * CastExpression | EmptyExpression | FunctionCallExpression |
     * InstanceofExpression | IsExpression | IssetExpression | LiteralExpression
     * | MemberSelectionExpression | ParenthesizedExpression |
     * PrefixUnaryExpression | QualifiedName | ScopeResolutionExpression |
     * SubscriptExpression | NameToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getCondition()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_condition);
    }
    /**
     * @return ArrayIntrinsicExpression | AsExpression | BinaryExpression |
     * CastExpression | EmptyExpression | FunctionCallExpression |
     * InstanceofExpression | IsExpression | IssetExpression | LiteralExpression
     * | MemberSelectionExpression | ParenthesizedExpression |
     * PrefixUnaryExpression | QualifiedName | ScopeResolutionExpression |
     * SubscriptExpression | NameToken | VariableExpression
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
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $value, $this->_statement, $this->_elseif_clauses, $this->_else_clause);
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
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $value, $this->_elseif_clauses, $this->_else_clause);
    }
    /**
     * @return bool
     */
    public function hasStatement()
    {
        return !$this->_statement->isMissing();
    }
    /**
     * @return BreakStatement | CompoundStatement | ContinueStatement |
     * EchoStatement | ExpressionStatement | GlobalStatement | GotoStatement |
     * ReturnStatement | ThrowStatement | UnsetStatement
     */
    /**
     * @return EditableNode
     */
    public function getStatement()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_statement);
    }
    /**
     * @return BreakStatement | CompoundStatement | ContinueStatement |
     * EchoStatement | ExpressionStatement | GlobalStatement | GotoStatement |
     * ReturnStatement | ThrowStatement | UnsetStatement
     */
    /**
     * @return EditableNode
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
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_statement, $value, $this->_else_clause);
    }
    /**
     * @return bool
     */
    public function hasElseifClauses()
    {
        return !$this->_elseif_clauses->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getElseifClauses()
    {
        if ($this->_elseif_clauses->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_elseif_clauses);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getElseifClausesx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_elseif_clauses);
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
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_statement, $this->_elseif_clauses, $value);
    }
    /**
     * @return bool
     */
    public function hasElseClause()
    {
        return !$this->_else_clause->isMissing();
    }
    /**
     * @return ElseClause | null
     */
    /**
     * @return null|ElseClause
     */
    public function getElseClause()
    {
        if ($this->_else_clause->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(ElseClause::class, $this->_else_clause);
    }
    /**
     * @return ElseClause
     */
    /**
     * @return ElseClause
     */
    public function getElseClausex()
    {
        return TypeAssert\instance_of(ElseClause::class, $this->_else_clause);
    }
}

