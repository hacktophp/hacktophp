<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d6288478631c64d318d5bf376613a858>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class PostfixUnaryExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_operand;
    /**
     * @var EditableNode
     */
    private $_operator;
    public function __construct(EditableNode $operand, EditableNode $operator)
    {
        parent::__construct('postfix_unary_expression');
        $this->_operand = $operand;
        $this->_operator = $operator;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $operand = EditableNode::fromJSON($json['postfix_unary_operand'], $file, $offset, $source);
        $offset += $operand->getWidth();
        $operator = EditableNode::fromJSON($json['postfix_unary_operator'], $file, $offset, $source);
        $offset += $operator->getWidth();
        return new static($operand, $operator);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['operand' => $this->_operand, 'operator' => $this->_operator];
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
        $operand = $this->_operand->rewrite($rewriter, $parents);
        $operator = $this->_operator->rewrite($rewriter, $parents);
        if ($operand === $this->_operand && $operator === $this->_operator) {
            return $this;
        }
        return new static($operand, $operator);
    }
    /**
     * @return EditableNode
     */
    public function getOperandUNTYPED()
    {
        return $this->_operand;
    }
    /**
     * @return static
     */
    public function withOperand(EditableNode $value)
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
        return !$this->_operand->isMissing();
    }
    /**
     * @return MemberSelectionExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getOperand()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_operand);
    }
    /**
     * @return MemberSelectionExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getOperandx()
    {
        return $this->getOperand();
    }
    /**
     * @return EditableNode
     */
    public function getOperatorUNTYPED()
    {
        return $this->_operator;
    }
    /**
     * @return static
     */
    public function withOperator(EditableNode $value)
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
        return !$this->_operator->isMissing();
    }
    /**
     * @return PlusPlusToken | MinusMinusToken
     */
    /**
     * @return EditableToken
     */
    public function getOperator()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_operator);
    }
    /**
     * @return PlusPlusToken | MinusMinusToken
     */
    /**
     * @return EditableToken
     */
    public function getOperatorx()
    {
        return $this->getOperator();
    }
}

