<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1784a6cb61eaac5c1869e675b74d70f6>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class FunctionCallWithTypeArgumentsExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_receiver;
    /**
     * @var EditableNode
     */
    private $_type_args;
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_argument_list;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    public function __construct(EditableNode $receiver, EditableNode $type_args, EditableNode $left_paren, EditableNode $argument_list, EditableNode $right_paren)
    {
        parent::__construct('function_call_with_type_arguments_expression');
        $this->_receiver = $receiver;
        $this->_type_args = $type_args;
        $this->_left_paren = $left_paren;
        $this->_argument_list = $argument_list;
        $this->_right_paren = $right_paren;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $receiver = EditableNode::fromJSON($json['function_call_with_type_arguments_receiver'], $file, $offset, $source);
        $offset += $receiver->getWidth();
        $type_args = EditableNode::fromJSON($json['function_call_with_type_arguments_type_args'], $file, $offset, $source);
        $offset += $type_args->getWidth();
        $left_paren = EditableNode::fromJSON($json['function_call_with_type_arguments_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $argument_list = EditableNode::fromJSON($json['function_call_with_type_arguments_argument_list'], $file, $offset, $source);
        $offset += $argument_list->getWidth();
        $right_paren = EditableNode::fromJSON($json['function_call_with_type_arguments_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        return new static($receiver, $type_args, $left_paren, $argument_list, $right_paren);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['receiver' => $this->_receiver, 'type_args' => $this->_type_args, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren];
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
        $receiver = $this->_receiver->rewrite($rewriter, $parents);
        $type_args = $this->_type_args->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        if ($receiver === $this->_receiver && $type_args === $this->_type_args && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($receiver, $type_args, $left_paren, $argument_list, $right_paren);
    }
    /**
     * @return EditableNode
     */
    public function getReceiverUNTYPED()
    {
        return $this->_receiver;
    }
    /**
     * @return static
     */
    public function withReceiver(EditableNode $value)
    {
        if ($value === $this->_receiver) {
            return $this;
        }
        return new static($value, $this->_type_args, $this->_left_paren, $this->_argument_list, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasReceiver()
    {
        return !$this->_receiver->isMissing();
    }
    /**
     * @return MemberSelectionExpression | ScopeResolutionExpression | NameToken
     */
    /**
     * @return EditableNode
     */
    public function getReceiver()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_receiver);
    }
    /**
     * @return MemberSelectionExpression | ScopeResolutionExpression | NameToken
     */
    /**
     * @return EditableNode
     */
    public function getReceiverx()
    {
        return $this->getReceiver();
    }
    /**
     * @return EditableNode
     */
    public function getTypeArgsUNTYPED()
    {
        return $this->_type_args;
    }
    /**
     * @return static
     */
    public function withTypeArgs(EditableNode $value)
    {
        if ($value === $this->_type_args) {
            return $this;
        }
        return new static($this->_receiver, $value, $this->_left_paren, $this->_argument_list, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasTypeArgs()
    {
        return !$this->_type_args->isMissing();
    }
    /**
     * @return TypeArguments
     */
    /**
     * @return TypeArguments
     */
    public function getTypeArgs()
    {
        return TypeAssert\instance_of(TypeArguments::class, $this->_type_args);
    }
    /**
     * @return TypeArguments
     */
    /**
     * @return TypeArguments
     */
    public function getTypeArgsx()
    {
        return $this->getTypeArgs();
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
        return new static($this->_receiver, $this->_type_args, $value, $this->_argument_list, $this->_right_paren);
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
    public function getArgumentListUNTYPED()
    {
        return $this->_argument_list;
    }
    /**
     * @return static
     */
    public function withArgumentList(EditableNode $value)
    {
        if ($value === $this->_argument_list) {
            return $this;
        }
        return new static($this->_receiver, $this->_type_args, $this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasArgumentList()
    {
        return !$this->_argument_list->isMissing();
    }
    /**
     * @return NodeList<EditableNode> | NodeList<LiteralExpression> |
     * NodeList<VariableExpression> | null
     */
    /**
     * @return NodeList<EditableNode>|null
     */
    public function getArgumentList()
    {
        if ($this->_argument_list->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(NodeList::class, $this->_argument_list);
    }
    /**
     * @return NodeList<EditableNode> | NodeList<LiteralExpression> |
     * NodeList<VariableExpression>
     */
    /**
     * @return NodeList<EditableNode>
     */
    public function getArgumentListx()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_argument_list);
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
        return new static($this->_receiver, $this->_type_args, $this->_left_paren, $this->_argument_list, $value);
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
}

