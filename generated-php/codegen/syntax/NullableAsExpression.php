<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0688f1f8ffa547fcaa797dac32239d11>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class NullableAsExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'nullable_as_expression';
    /**
     * @var IExpression
     */
    private $_left_operand;
    /**
     * @var QuestionAsToken
     */
    private $_operator;
    /**
     * @var SimpleTypeSpecifier
     */
    private $_right_operand;
    public function __construct(IExpression $left_operand, QuestionAsToken $operator, SimpleTypeSpecifier $right_operand, ?array $source_ref = null)
    {
        $this->_left_operand = $left_operand;
        $this->_operator = $operator;
        $this->_right_operand = $right_operand;
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
        $left_operand = Node::fromJSON($json['nullable_as_left_operand'], $file, $offset, $source, 'IExpression');
        $left_operand = $left_operand !== null ? $left_operand : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_operand->getWidth();
        $operator = Node::fromJSON($json['nullable_as_operator'], $file, $offset, $source, 'QuestionAsToken');
        $operator = $operator !== null ? $operator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operator->getWidth();
        $right_operand = Node::fromJSON($json['nullable_as_right_operand'], $file, $offset, $source, 'SimpleTypeSpecifier');
        $right_operand = $right_operand !== null ? $right_operand : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_operand->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_operand, $operator, $right_operand, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_operand' => $this->_left_operand, 'operator' => $this->_operator, 'right_operand' => $this->_right_operand]);
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
        $left_operand = $rewriter($this->_left_operand, $parents);
        $operator = $rewriter($this->_operator, $parents);
        $right_operand = $rewriter($this->_right_operand, $parents);
        if ($left_operand === $this->_left_operand && $operator === $this->_operator && $right_operand === $this->_right_operand) {
            return $this;
        }
        return new static($left_operand, $operator, $right_operand);
    }
    /**
     * @return null|Node
     */
    public function getLeftOperandUNTYPED()
    {
        return $this->_left_operand;
    }
    /**
     * @return static
     */
    public function withLeftOperand(IExpression $value)
    {
        if ($value === $this->_left_operand) {
            return $this;
        }
        return new static($value, $this->_operator, $this->_right_operand);
    }
    /**
     * @return bool
     */
    public function hasLeftOperand()
    {
        return $this->_left_operand !== null;
    }
    /**
     * @return FunctionCallExpression | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getLeftOperand()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_left_operand);
    }
    /**
     * @return FunctionCallExpression | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getLeftOperandx()
    {
        return $this->getLeftOperand();
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
    public function withOperator(QuestionAsToken $value)
    {
        if ($value === $this->_operator) {
            return $this;
        }
        return new static($this->_left_operand, $value, $this->_right_operand);
    }
    /**
     * @return bool
     */
    public function hasOperator()
    {
        return $this->_operator !== null;
    }
    /**
     * @return QuestionAsToken
     */
    /**
     * @return QuestionAsToken
     */
    public function getOperator()
    {
        return TypeAssert\instance_of(QuestionAsToken::class, $this->_operator);
    }
    /**
     * @return QuestionAsToken
     */
    /**
     * @return QuestionAsToken
     */
    public function getOperatorx()
    {
        return $this->getOperator();
    }
    /**
     * @return null|Node
     */
    public function getRightOperandUNTYPED()
    {
        return $this->_right_operand;
    }
    /**
     * @return static
     */
    public function withRightOperand(SimpleTypeSpecifier $value)
    {
        if ($value === $this->_right_operand) {
            return $this;
        }
        return new static($this->_left_operand, $this->_operator, $value);
    }
    /**
     * @return bool
     */
    public function hasRightOperand()
    {
        return $this->_right_operand !== null;
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getRightOperand()
    {
        return TypeAssert\instance_of(SimpleTypeSpecifier::class, $this->_right_operand);
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getRightOperandx()
    {
        return $this->getRightOperand();
    }
}

