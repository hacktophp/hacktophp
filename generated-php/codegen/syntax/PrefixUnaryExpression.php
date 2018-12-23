<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class PrefixUnaryExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_operator;
    /**
     * @var EditableNode
     */
    private $_operand;
    public function __construct(EditableNode $operator, EditableNode $operand)
    {
        parent::__construct('prefix_unary_expression');
        $this->_operator = $operator;
        $this->_operand = $operand;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $operator = EditableNode::fromJSON($json['prefix_unary_operator'], $file, $offset, $source);
        $offset += $operator->getWidth();
        $operand = EditableNode::fromJSON($json['prefix_unary_operand'], $file, $offset, $source);
        $offset += $operand->getWidth();
        return new static($operator, $operand);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('operator' => $this->_operator, 'operand' => $this->_operand);
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
        $operator = $this->_operator->rewrite($rewriter, $parents);
        $operand = $this->_operand->rewrite($rewriter, $parents);
        if ($operator === $this->_operator && $operand === $this->_operand) {
            return $this;
        }
        return new static($operator, $operand);
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
        return new static($value, $this->_operand);
    }
    /**
     * @return bool
     */
    public function hasOperator()
    {
        return !$this->_operator->isMissing();
    }
    /**
     * @return ExclamationToken | DollarToken | AmpersandToken | PlusToken |
     * PlusPlusToken | MinusToken | MinusMinusToken | AtToken | AwaitToken |
     * CloneToken | PrintToken | SuspendToken | TildeToken
     */
    /**
     * @return EditableToken
     */
    public function getOperator()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_operator);
    }
    /**
     * @return ExclamationToken | DollarToken | AmpersandToken | PlusToken |
     * PlusPlusToken | MinusToken | MinusMinusToken | AtToken | AwaitToken |
     * CloneToken | PrintToken | SuspendToken | TildeToken
     */
    /**
     * @return EditableToken
     */
    public function getOperatorx()
    {
        return $this->getOperator();
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
        return new static($this->_operator, $value);
    }
    /**
     * @return bool
     */
    public function hasOperand()
    {
        return !$this->_operand->isMissing();
    }
    /**
     * @return AnonymousFunction | ArrayIntrinsicExpression |
     * AwaitableCreationExpression | BinaryExpression | BracedExpression |
     * CastExpression | ConditionalExpression | DefineExpression |
     * EmptyExpression | EvalExpression | FunctionCallExpression |
     * InclusionExpression | InstanceofExpression | IssetExpression |
     * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PipeVariableExpression | PostfixUnaryExpression
     * | PrefixUnaryExpression | SafeMemberSelectionExpression |
     * ScopeResolutionExpression | SubscriptExpression | EndOfFileToken |
     * NameToken | VariableToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getOperand()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_operand);
    }
    /**
     * @return AnonymousFunction | ArrayIntrinsicExpression |
     * AwaitableCreationExpression | BinaryExpression | BracedExpression |
     * CastExpression | ConditionalExpression | DefineExpression |
     * EmptyExpression | EvalExpression | FunctionCallExpression |
     * InclusionExpression | InstanceofExpression | IssetExpression |
     * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PipeVariableExpression | PostfixUnaryExpression
     * | PrefixUnaryExpression | SafeMemberSelectionExpression |
     * ScopeResolutionExpression | SubscriptExpression | EndOfFileToken |
     * NameToken | VariableToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getOperandx()
    {
        return $this->getOperand();
    }
}

