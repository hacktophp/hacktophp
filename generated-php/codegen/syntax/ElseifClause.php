<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<70e1af07db5479b8347c1b04cbd42f99>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ElseifClause extends Node implements IControlFlowStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'elseif_clause';
    /**
     * @var ElseifToken
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
    public function __construct(ElseifToken $keyword, LeftParenToken $left_paren, IExpression $condition, RightParenToken $right_paren, IStatement $statement, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_condition = $condition;
        $this->_right_paren = $right_paren;
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
        $keyword = Node::fromJSON($json['elseif_keyword'], $file, $offset, $source, 'ElseifToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['elseif_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $condition = Node::fromJSON($json['elseif_condition'], $file, $offset, $source, 'IExpression');
        $condition = $condition !== null ? $condition : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $condition->getWidth();
        $right_paren = Node::fromJSON($json['elseif_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $statement = Node::fromJSON($json['elseif_statement'], $file, $offset, $source, 'IStatement');
        $statement = $statement !== null ? $statement : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $statement->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $condition, $right_paren, $statement, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'condition' => $this->_condition, 'right_paren' => $this->_right_paren, 'statement' => $this->_statement]);
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
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $condition === $this->_condition && $right_paren === $this->_right_paren && $statement === $this->_statement) {
            return $this;
        }
        return new static($keyword, $left_paren, $condition, $right_paren, $statement);
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
    public function withKeyword(ElseifToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_statement);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return ElseifToken
     */
    /**
     * @return ElseifToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ElseifToken::class, $this->_keyword);
    }
    /**
     * @return ElseifToken
     */
    /**
     * @return ElseifToken
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
        return new static($this->_keyword, $value, $this->_condition, $this->_right_paren, $this->_statement);
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
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_statement);
    }
    /**
     * @return bool
     */
    public function hasCondition()
    {
        return $this->_condition !== null;
    }
    /**
     * @return BinaryExpression | FunctionCallExpression | LiteralExpression |
     * VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getCondition()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_condition);
    }
    /**
     * @return BinaryExpression | FunctionCallExpression | LiteralExpression |
     * VariableExpression
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
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $value, $this->_statement);
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
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasStatement()
    {
        return $this->_statement !== null;
    }
    /**
     * @return CompoundStatement | ExpressionStatement
     */
    /**
     * @return IStatement
     */
    public function getStatement()
    {
        return TypeAssert\instance_of(IStatement::class, $this->_statement);
    }
    /**
     * @return CompoundStatement | ExpressionStatement
     */
    /**
     * @return IStatement
     */
    public function getStatementx()
    {
        return $this->getStatement();
    }
}

