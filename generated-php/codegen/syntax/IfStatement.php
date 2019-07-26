<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3228a0ae642be068aadb87bbc4d4abab>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class IfStatement extends Node implements IControlFlowStatement, IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'if_statement';
    /**
     * @var IfToken
     */
    private $_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var IExpression
     */
    private $_condition;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @var IStatement
     */
    private $_statement;
    /**
     * @var NodeList<ElseifClause>|null
     */
    private $_elseif_clauses;
    /**
     * @var null|ElseClause
     */
    private $_else_clause;
    /**
     * @param NodeList<ElseifClause>|null $elseif_clauses
     */
    public function __construct(IfToken $keyword, LeftParenToken $left_paren, IExpression $condition, RightParenToken $right_paren, IStatement $statement, ?NodeList $elseif_clauses, ?ElseClause $else_clause, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_condition = $condition;
        $this->_right_paren = $right_paren;
        $this->_statement = $statement;
        $this->_elseif_clauses = $elseif_clauses;
        $this->_else_clause = $else_clause;
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
        $keyword = Node::fromJSON($json['if_keyword'], $file, $offset, $source, 'IfToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['if_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $condition = Node::fromJSON($json['if_condition'], $file, $offset, $source, 'IExpression');
        $condition = $condition !== null ? $condition : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $condition->getWidth();
        $right_paren = Node::fromJSON($json['if_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $statement = Node::fromJSON($json['if_statement'], $file, $offset, $source, 'IStatement');
        $statement = $statement !== null ? $statement : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $statement->getWidth();
        $elseif_clauses = Node::fromJSON($json['if_elseif_clauses'], $file, $offset, $source, 'NodeList<ElseifClause>');
        $offset += (($__tmp1__ = $elseif_clauses) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $else_clause = Node::fromJSON($json['if_else_clause'], $file, $offset, $source, 'ElseClause');
        $offset += (($__tmp2__ = $else_clause) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $condition, $right_paren, $statement, $elseif_clauses, $else_clause, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'condition' => $this->_condition, 'right_paren' => $this->_right_paren, 'statement' => $this->_statement, 'elseif_clauses' => $this->_elseif_clauses, 'else_clause' => $this->_else_clause]);
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
        $left_paren = $rewriter($this->_left_paren, $parents);
        $condition = $rewriter($this->_condition, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $statement = $rewriter($this->_statement, $parents);
        $elseif_clauses = $this->_elseif_clauses === null ? null : $rewriter($this->_elseif_clauses, $parents);
        $else_clause = $this->_else_clause === null ? null : $rewriter($this->_else_clause, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $condition === $this->_condition && $right_paren === $this->_right_paren && $statement === $this->_statement && $elseif_clauses === $this->_elseif_clauses && $else_clause === $this->_else_clause) {
            return $this;
        }
        return new static($keyword, $left_paren, $condition, $right_paren, $statement, $elseif_clauses, $else_clause);
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
    public function withKeyword(IfToken $value)
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
        return $this->_keyword !== null;
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
     * @return null|Node
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(LeftParenToken $value)
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
        return $this->_left_paren !== null;
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
     * @return null|Node
     */
    public function getConditionUNTYPED()
    {
        return $this->_condition;
    }
    /**
     * @return static
     */
    public function withCondition(IExpression $value)
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
        return $this->_condition !== null;
    }
    /**
     * @return ArrayIntrinsicExpression | AsExpression | BinaryExpression |
     * CastExpression | FunctionCallExpression | IsExpression | IssetExpression |
     * LiteralExpression | MemberSelectionExpression | ParenthesizedExpression |
     * PrefixUnaryExpression | QualifiedName | ScopeResolutionExpression |
     * SubscriptExpression | NameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getCondition()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_condition);
    }
    /**
     * @return ArrayIntrinsicExpression | AsExpression | BinaryExpression |
     * CastExpression | FunctionCallExpression | IsExpression | IssetExpression |
     * LiteralExpression | MemberSelectionExpression | ParenthesizedExpression |
     * PrefixUnaryExpression | QualifiedName | ScopeResolutionExpression |
     * SubscriptExpression | NameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getConditionx()
    {
        return $this->getCondition();
    }
    /**
     * @return null|Node
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(RightParenToken $value)
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
        return $this->_right_paren !== null;
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
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $value, $this->_elseif_clauses, $this->_else_clause);
    }
    /**
     * @return bool
     */
    public function hasStatement()
    {
        return $this->_statement !== null;
    }
    /**
     * @return BreakStatement | CompoundStatement | ContinueStatement |
     * EchoStatement | ExpressionStatement | GotoStatement | ReturnStatement |
     * ThrowStatement | UnsetStatement
     */
    /**
     * @return IStatement
     */
    public function getStatement()
    {
        return TypeAssert\instance_of(IStatement::class, $this->_statement);
    }
    /**
     * @return BreakStatement | CompoundStatement | ContinueStatement |
     * EchoStatement | ExpressionStatement | GotoStatement | ReturnStatement |
     * ThrowStatement | UnsetStatement
     */
    /**
     * @return IStatement
     */
    public function getStatementx()
    {
        return $this->getStatement();
    }
    /**
     * @return null|Node
     */
    public function getElseifClausesUNTYPED()
    {
        return $this->_elseif_clauses;
    }
    /**
     * @param NodeList<ElseifClause>|null $value
     *
     * @return static
     */
    public function withElseifClauses(?NodeList $value)
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
        return $this->_elseif_clauses !== null;
    }
    /**
     * @return NodeList<ElseifClause> | null
     */
    /**
     * @return NodeList<ElseifClause>|null
     */
    public function getElseifClauses()
    {
        return $this->_elseif_clauses;
    }
    /**
     * @return NodeList<ElseifClause>
     */
    /**
     * @return NodeList<ElseifClause>
     */
    public function getElseifClausesx()
    {
        return TypeAssert\not_null($this->getElseifClauses());
    }
    /**
     * @return null|Node
     */
    public function getElseClauseUNTYPED()
    {
        return $this->_else_clause;
    }
    /**
     * @return static
     */
    public function withElseClause(?ElseClause $value)
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
        return $this->_else_clause !== null;
    }
    /**
     * @return ElseClause | null
     */
    /**
     * @return null|ElseClause
     */
    public function getElseClause()
    {
        return $this->_else_clause;
    }
    /**
     * @return ElseClause
     */
    /**
     * @return ElseClause
     */
    public function getElseClausex()
    {
        return TypeAssert\not_null($this->getElseClause());
    }
}

