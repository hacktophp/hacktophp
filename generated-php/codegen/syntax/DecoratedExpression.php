<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<fc1f397fd9af47e87d5edf6168f275ba>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class DecoratedExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'decorated_expression';
    /**
     * @var Token
     */
    private $_decorator;
    /**
     * @var IExpression
     */
    private $_expression;
    public function __construct(Token $decorator, IExpression $expression, ?__Private\SourceRef $source_ref = null)
    {
        $this->_decorator = $decorator;
        $this->_expression = $expression;
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
        $decorator = Node::fromJSON($json['decorated_expression_decorator'], $file, $offset, $source, 'Token');
        $decorator = $decorator !== null ? $decorator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $decorator->getWidth();
        $expression = Node::fromJSON($json['decorated_expression_expression'], $file, $offset, $source, 'IExpression');
        $expression = $expression !== null ? $expression : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expression->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($decorator, $expression, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['decorator' => $this->_decorator, 'expression' => $this->_expression]);
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
        $decorator = $rewriter($this->_decorator, $parents);
        $expression = $rewriter($this->_expression, $parents);
        if ($decorator === $this->_decorator && $expression === $this->_expression) {
            return $this;
        }
        return new static($decorator, $expression);
    }
    /**
     * @return null|Node
     */
    public function getDecoratorUNTYPED()
    {
        return $this->_decorator;
    }
    /**
     * @return static
     */
    public function withDecorator(Token $value)
    {
        if ($value === $this->_decorator) {
            return $this;
        }
        return new static($value, $this->_expression);
    }
    /**
     * @return bool
     */
    public function hasDecorator()
    {
        return $this->_decorator !== null;
    }
    /**
     * @return AmpersandToken | DotDotDotToken | InoutToken
     */
    /**
     * @return Token
     */
    public function getDecorator()
    {
        return TypeAssert\instance_of(Token::class, $this->_decorator);
    }
    /**
     * @return AmpersandToken | DotDotDotToken | InoutToken
     */
    /**
     * @return Token
     */
    public function getDecoratorx()
    {
        return $this->getDecorator();
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
        return new static($this->_decorator, $value);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return $this->_expression !== null;
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * FunctionCallExpression | ScopeResolutionExpression | SubscriptExpression |
     * VariableToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_expression);
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * FunctionCallExpression | ScopeResolutionExpression | SubscriptExpression |
     * VariableToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getExpressionx()
    {
        return $this->getExpression();
    }
}

