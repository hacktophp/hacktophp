<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<45d5817de78fbb7e5dad129bed9ef60c>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class ParenthesizedExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_expression;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    public function __construct(EditableNode $left_paren, EditableNode $expression, EditableNode $right_paren)
    {
        parent::__construct('parenthesized_expression');
        $this->_left_paren = $left_paren;
        $this->_expression = $expression;
        $this->_right_paren = $right_paren;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_paren = EditableNode::fromJSON($json['parenthesized_expression_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $expression = EditableNode::fromJSON($json['parenthesized_expression_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        $right_paren = EditableNode::fromJSON($json['parenthesized_expression_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        return new static($left_paren, $expression, $right_paren);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['left_paren' => $this->_left_paren, 'expression' => $this->_expression, 'right_paren' => $this->_right_paren];
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        if ($left_paren === $this->_left_paren && $expression === $this->_expression && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($left_paren, $expression, $right_paren);
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
        return new static($value, $this->_expression, $this->_right_paren);
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
    public function getExpressionUNTYPED()
    {
        return $this->_expression;
    }
    /**
     * @return static
     */
    public function withExpression(EditableNode $value)
    {
        if ($value === $this->_expression) {
            return $this;
        }
        return new static($this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return AnonymousFunction | ArrayIntrinsicExpression | BinaryExpression |
     * CastExpression | CollectionLiteralExpression | ConditionalExpression |
     * EmptyExpression | FunctionCallExpression | InclusionExpression |
     * InstanceofExpression | IsExpression | IssetExpression | LambdaExpression |
     * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * QualifiedName | ScopeResolutionExpression | SubscriptExpression |
     * RightParenToken | QuestionToken | NameToken | TupleExpression |
     * VariableExpression | VectorIntrinsicExpression | XHPExpression |
     * YieldExpression
     */
    /**
     * @return EditableNode
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_expression);
    }
    /**
     * @return AnonymousFunction | ArrayIntrinsicExpression | BinaryExpression |
     * CastExpression | CollectionLiteralExpression | ConditionalExpression |
     * EmptyExpression | FunctionCallExpression | InclusionExpression |
     * InstanceofExpression | IsExpression | IssetExpression | LambdaExpression |
     * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * QualifiedName | ScopeResolutionExpression | SubscriptExpression |
     * RightParenToken | QuestionToken | NameToken | TupleExpression |
     * VariableExpression | VectorIntrinsicExpression | XHPExpression |
     * YieldExpression
     */
    /**
     * @return EditableNode
     */
    public function getExpressionx()
    {
        return $this->getExpression();
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
        return new static($this->_left_paren, $this->_expression, $value);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return !$this->_right_paren->isMissing();
    }
    /**
     * @return null | RightParenToken
     */
    /**
     * @return null|RightParenToken
     */
    public function getRightParen()
    {
        if ($this->_right_paren->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
    }
}

