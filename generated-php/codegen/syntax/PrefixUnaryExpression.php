<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<bd8797c078ab95557bf06675da01c6b3>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PrefixUnaryExpression extends Node implements IHasOperator, ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'prefix_unary_expression';
    /**
     * @var Token
     */
    private $_operator;
    /**
     * @var IExpression
     */
    private $_operand;
    public function __construct(Token $operator, IExpression $operand, ?__Private\SourceRef $source_ref = null)
    {
        $this->_operator = $operator;
        $this->_operand = $operand;
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
        $operator = Node::fromJSON($json['prefix_unary_operator'], $file, $offset, $source, 'Token');
        $operator = $operator !== null ? $operator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operator->getWidth();
        $operand = Node::fromJSON($json['prefix_unary_operand'], $file, $offset, $source, 'IExpression');
        $operand = $operand !== null ? $operand : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operand->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($operator, $operand, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['operator' => $this->_operator, 'operand' => $this->_operand]);
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
        $operator = $rewriter($this->_operator, $parents);
        $operand = $rewriter($this->_operand, $parents);
        if ($operator === $this->_operator && $operand === $this->_operand) {
            return $this;
        }
        return new static($operator, $operand);
    }
    /**
     * @return null|Node
     */
    public function getOperatorUNTYPED()
    {
        return $this->_operator;
    }
    /**
     * @return static
     */
    public function withOperator(Token $value)
    {
        if ($value === $this->_operator) {
            return $this;
        }
        return new static($value, $this->_operand);
    }
    /**
     * @return bool
     */
    public function hasOperator()
    {
        return $this->_operator !== null;
    }
    /**
     * @return ExclamationToken | AmpersandToken | PlusToken | PlusPlusToken |
     * MinusToken | MinusMinusToken | AtToken | AwaitToken | CloneToken |
     * PrintToken | TildeToken
     */
    /**
     * @return Token
     */
    public function getOperator()
    {
        return TypeAssert\instance_of(Token::class, $this->_operator);
    }
    /**
     * @return ExclamationToken | AmpersandToken | PlusToken | PlusPlusToken |
     * MinusToken | MinusMinusToken | AtToken | AwaitToken | CloneToken |
     * PrintToken | TildeToken
     */
    /**
     * @return Token
     */
    public function getOperatorx()
    {
        return $this->getOperator();
    }
    /**
     * @return null|Node
     */
    public function getOperandUNTYPED()
    {
        return $this->_operand;
    }
    /**
     * @return static
     */
    public function withOperand(IExpression $value)
    {
        if ($value === $this->_operand) {
            return $this;
        }
        return new static($this->_operator, $value);
    }
    /**
     * @return bool
     */
    public function hasOperand()
    {
        return $this->_operand !== null;
    }
    /**
     * @return AnonymousFunction | ArrayIntrinsicExpression |
     * AwaitableCreationExpression | BinaryExpression | CastExpression |
     * ConditionalExpression | EvalExpression | FunctionCallExpression |
     * InclusionExpression | IsExpression | IssetExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * QualifiedName | ScopeResolutionExpression | SubscriptExpression |
     * NameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getOperand()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_operand);
    }
    /**
     * @return AnonymousFunction | ArrayIntrinsicExpression |
     * AwaitableCreationExpression | BinaryExpression | CastExpression |
     * ConditionalExpression | EvalExpression | FunctionCallExpression |
     * InclusionExpression | IsExpression | IssetExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * QualifiedName | ScopeResolutionExpression | SubscriptExpression |
     * NameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getOperandx()
    {
        return $this->getOperand();
    }
}

