<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4c8b60669b284b2eb04e4a0a7af10440>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class DoStatement extends EditableNode implements IControlFlowStatement, ILoopStatement
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_body;
    /**
     * @var EditableNode
     */
    private $_while_keyword;
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
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $body, EditableNode $while_keyword, EditableNode $left_paren, EditableNode $condition, EditableNode $right_paren, EditableNode $semicolon)
    {
        parent::__construct('do_statement');
        $this->_keyword = $keyword;
        $this->_body = $body;
        $this->_while_keyword = $while_keyword;
        $this->_left_paren = $left_paren;
        $this->_condition = $condition;
        $this->_right_paren = $right_paren;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['do_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $body = EditableNode::fromJSON($json['do_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        $while_keyword = EditableNode::fromJSON($json['do_while_keyword'], $file, $offset, $source);
        $offset += $while_keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['do_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $condition = EditableNode::fromJSON($json['do_condition'], $file, $offset, $source);
        $offset += $condition->getWidth();
        $right_paren = EditableNode::fromJSON($json['do_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $semicolon = EditableNode::fromJSON($json['do_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $body, $while_keyword, $left_paren, $condition, $right_paren, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'body' => $this->_body, 'while_keyword' => $this->_while_keyword, 'left_paren' => $this->_left_paren, 'condition' => $this->_condition, 'right_paren' => $this->_right_paren, 'semicolon' => $this->_semicolon);
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
        $body = $this->_body->rewrite($rewriter, $parents);
        $while_keyword = $this->_while_keyword->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $condition = $this->_condition->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $body === $this->_body && $while_keyword === $this->_while_keyword && $left_paren === $this->_left_paren && $condition === $this->_condition && $right_paren === $this->_right_paren && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $body, $while_keyword, $left_paren, $condition, $right_paren, $semicolon);
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
        return new static($value, $this->_body, $this->_while_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
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
     * @return EditableNode
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(EditableNode $value)
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
        return !$this->_body->isMissing();
    }
    /**
     * @return CompoundStatement | ExpressionStatement
     */
    /**
     * @return EditableNode
     */
    public function getBody()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_body);
    }
    /**
     * @return CompoundStatement | ExpressionStatement
     */
    /**
     * @return EditableNode
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
    /**
     * @return EditableNode
     */
    public function getWhileKeywordUNTYPED()
    {
        return $this->_while_keyword;
    }
    /**
     * @return static
     */
    public function withWhileKeyword(EditableNode $value)
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
        return !$this->_while_keyword->isMissing();
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
        return new static($this->_keyword, $this->_body, $this->_while_keyword, $value, $this->_condition, $this->_right_paren, $this->_semicolon);
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
        return new static($this->_keyword, $this->_body, $this->_while_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasCondition()
    {
        return !$this->_condition->isMissing();
    }
    /**
     * @return BinaryExpression | FunctionCallExpression | LiteralExpression |
     * PrefixUnaryExpression | SubscriptExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getCondition()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_condition);
    }
    /**
     * @return BinaryExpression | FunctionCallExpression | LiteralExpression |
     * PrefixUnaryExpression | SubscriptExpression | VariableExpression
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
        return new static($this->_keyword, $this->_body, $this->_while_keyword, $this->_left_paren, $this->_condition, $value, $this->_semicolon);
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
        return new static($this->_keyword, $this->_body, $this->_while_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $value);
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

