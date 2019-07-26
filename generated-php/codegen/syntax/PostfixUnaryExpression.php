<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<77d5bc272f27a797378dbaa408414755>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PostfixUnaryExpression extends Node implements IHasOperator, ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'postfix_unary_expression';
    /**
     * @var IExpression
     */
    private $_operand;
    /**
     * @var Token
     */
    private $_operator;
    public function __construct(IExpression $operand, Token $operator, ?array $source_ref = null)
    {
        $this->_operand = $operand;
        $this->_operator = $operator;
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
        $operand = Node::fromJSON($json['postfix_unary_operand'], $file, $offset, $source, 'IExpression');
        $operand = $operand !== null ? $operand : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operand->getWidth();
        $operator = Node::fromJSON($json['postfix_unary_operator'], $file, $offset, $source, 'Token');
        $operator = $operator !== null ? $operator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operator->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($operand, $operator, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['operand' => $this->_operand, 'operator' => $this->_operator]);
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
        $operand = $rewriter($this->_operand, $parents);
        $operator = $rewriter($this->_operator, $parents);
        if ($operand === $this->_operand && $operator === $this->_operator) {
            return $this;
        }
        return new static($operand, $operator);
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
        return new static($value, $this->_operator);
    }
    /**
     * @return bool
     */
    public function hasOperand()
    {
        return $this->_operand !== null;
    }
    /**
     * @return MemberSelectionExpression | ScopeResolutionExpression |
     * SubscriptExpression | XHPClassNameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getOperand()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_operand);
    }
    /**
     * @return MemberSelectionExpression | ScopeResolutionExpression |
     * SubscriptExpression | XHPClassNameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getOperandx()
    {
        return $this->getOperand();
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
        return new static($this->_operand, $value);
    }
    /**
     * @return bool
     */
    public function hasOperator()
    {
        return $this->_operator !== null;
    }
    /**
     * @return StarToken | PlusPlusToken | MinusMinusToken | QuestionToken
     */
    /**
     * @return Token
     */
    public function getOperator()
    {
        return TypeAssert\instance_of(Token::class, $this->_operator);
    }
    /**
     * @return StarToken | PlusPlusToken | MinusMinusToken | QuestionToken
     */
    /**
     * @return Token
     */
    public function getOperatorx()
    {
        return $this->getOperator();
    }
}

