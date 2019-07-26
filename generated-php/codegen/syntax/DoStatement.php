<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<7f61a524d6e3573bae77348c6cb71da7>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class DoStatement extends Node implements IControlFlowStatement, ILoopStatement, IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'do_statement';
    /**
     * @var DoToken
     */
    private $_keyword;
    /**
     * @var IStatement
     */
    private $_body;
    /**
     * @var WhileToken
     */
    private $_while_keyword;
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
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(DoToken $keyword, IStatement $body, WhileToken $while_keyword, LeftParenToken $left_paren, IExpression $condition, RightParenToken $right_paren, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_body = $body;
        $this->_while_keyword = $while_keyword;
        $this->_left_paren = $left_paren;
        $this->_condition = $condition;
        $this->_right_paren = $right_paren;
        $this->_semicolon = $semicolon;
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
        $keyword = Node::fromJSON($json['do_keyword'], $file, $offset, $source, 'DoToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $body = Node::fromJSON($json['do_body'], $file, $offset, $source, 'IStatement');
        $body = $body !== null ? $body : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $body->getWidth();
        $while_keyword = Node::fromJSON($json['do_while_keyword'], $file, $offset, $source, 'WhileToken');
        $while_keyword = $while_keyword !== null ? $while_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $while_keyword->getWidth();
        $left_paren = Node::fromJSON($json['do_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $condition = Node::fromJSON($json['do_condition'], $file, $offset, $source, 'IExpression');
        $condition = $condition !== null ? $condition : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $condition->getWidth();
        $right_paren = Node::fromJSON($json['do_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $semicolon = Node::fromJSON($json['do_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $body, $while_keyword, $left_paren, $condition, $right_paren, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'body' => $this->_body, 'while_keyword' => $this->_while_keyword, 'left_paren' => $this->_left_paren, 'condition' => $this->_condition, 'right_paren' => $this->_right_paren, 'semicolon' => $this->_semicolon]);
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
        $body = $rewriter($this->_body, $parents);
        $while_keyword = $rewriter($this->_while_keyword, $parents);
        $left_paren = $rewriter($this->_left_paren, $parents);
        $condition = $rewriter($this->_condition, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $body === $this->_body && $while_keyword === $this->_while_keyword && $left_paren === $this->_left_paren && $condition === $this->_condition && $right_paren === $this->_right_paren && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $body, $while_keyword, $left_paren, $condition, $right_paren, $semicolon);
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
    public function withKeyword(DoToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_body, $this->_while_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return DoToken
     */
    /**
     * @return DoToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(DoToken::class, $this->_keyword);
    }
    /**
     * @return DoToken
     */
    /**
     * @return DoToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(IStatement $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_while_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return $this->_body !== null;
    }
    /**
     * @return CompoundStatement | ExpressionStatement
     */
    /**
     * @return IStatement
     */
    public function getBody()
    {
        return TypeAssert\instance_of(IStatement::class, $this->_body);
    }
    /**
     * @return CompoundStatement | ExpressionStatement
     */
    /**
     * @return IStatement
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
    /**
     * @return null|Node
     */
    public function getWhileKeywordUNTYPED()
    {
        return $this->_while_keyword;
    }
    /**
     * @return static
     */
    public function withWhileKeyword(WhileToken $value)
    {
        if ($value === $this->_while_keyword) {
            return $this;
        }
        return new static($this->_keyword, $this->_body, $value, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasWhileKeyword()
    {
        return $this->_while_keyword !== null;
    }
    /**
     * @return WhileToken
     */
    /**
     * @return WhileToken
     */
    public function getWhileKeyword()
    {
        return TypeAssert\instance_of(WhileToken::class, $this->_while_keyword);
    }
    /**
     * @return WhileToken
     */
    /**
     * @return WhileToken
     */
    public function getWhileKeywordx()
    {
        return $this->getWhileKeyword();
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
        return new static($this->_keyword, $this->_body, $this->_while_keyword, $value, $this->_condition, $this->_right_paren, $this->_semicolon);
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
        return new static($this->_keyword, $this->_body, $this->_while_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_semicolon);
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
     * SubscriptExpression | VariableExpression
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
     * SubscriptExpression | VariableExpression
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
        return new static($this->_keyword, $this->_body, $this->_while_keyword, $this->_left_paren, $this->_condition, $value, $this->_semicolon);
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
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(SemicolonToken $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_body, $this->_while_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return $this->_semicolon !== null;
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

