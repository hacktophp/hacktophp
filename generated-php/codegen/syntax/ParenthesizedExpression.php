<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<99ed6ac7ce06bd029ce229a8f91ea8ff>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ParenthesizedExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'parenthesized_expression';
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var IExpression
     */
    private $_expression;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    public function __construct(LeftParenToken $left_paren, IExpression $expression, RightParenToken $right_paren, ?__Private\SourceRef $source_ref = null)
    {
        $this->_left_paren = $left_paren;
        $this->_expression = $expression;
        $this->_right_paren = $right_paren;
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
        $left_paren = Node::fromJSON($json['parenthesized_expression_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $expression = Node::fromJSON($json['parenthesized_expression_expression'], $file, $offset, $source, 'IExpression');
        $expression = $expression !== null ? $expression : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expression->getWidth();
        $right_paren = Node::fromJSON($json['parenthesized_expression_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_paren, $expression, $right_paren, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_paren' => $this->_left_paren, 'expression' => $this->_expression, 'right_paren' => $this->_right_paren]);
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
        $left_paren = $rewriter($this->_left_paren, $parents);
        $expression = $rewriter($this->_expression, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        if ($left_paren === $this->_left_paren && $expression === $this->_expression && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($left_paren, $expression, $right_paren);
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
        return new static($value, $this->_expression, $this->_right_paren);
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
    public function getExpressionUNTYPED()
    {
        return $this->_expression;
    }
    /**
     * @return static
     */
    public function withExpression(IExpression $value)
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
        return $this->_expression !== null;
    }
    /**
     * @return AnonymousFunction | ArrayIntrinsicExpression | BinaryExpression |
     * CastExpression | CollectionLiteralExpression | ConditionalExpression |
     * FunctionCallExpression | InclusionExpression | IsExpression |
     * IssetExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * QualifiedName | ScopeResolutionExpression | SubscriptExpression |
     * NameToken | VariableExpression | VectorIntrinsicExpression | XHPExpression
     * | YieldExpression
     */
    /**
     * @return IExpression
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_expression);
    }
    /**
     * @return AnonymousFunction | ArrayIntrinsicExpression | BinaryExpression |
     * CastExpression | CollectionLiteralExpression | ConditionalExpression |
     * FunctionCallExpression | InclusionExpression | IsExpression |
     * IssetExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * QualifiedName | ScopeResolutionExpression | SubscriptExpression |
     * NameToken | VariableExpression | VectorIntrinsicExpression | XHPExpression
     * | YieldExpression
     */
    /**
     * @return IExpression
     */
    public function getExpressionx()
    {
        return $this->getExpression();
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
        return new static($this->_left_paren, $this->_expression, $value);
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
}

