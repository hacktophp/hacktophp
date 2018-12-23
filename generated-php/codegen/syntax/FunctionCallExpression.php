<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4456cfba91b9442a975c974415b35a53>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class FunctionCallExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_receiver;
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
    public function __construct(EditableNode $receiver, EditableNode $left_paren, EditableNode $argument_list, EditableNode $right_paren)
    {
        parent::__construct('function_call_expression');
        $this->_receiver = $receiver;
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
        $receiver = EditableNode::fromJSON($json['function_call_receiver'], $file, $offset, $source);
        $offset += $receiver->getWidth();
        $left_paren = EditableNode::fromJSON($json['function_call_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $argument_list = EditableNode::fromJSON($json['function_call_argument_list'], $file, $offset, $source);
        $offset += $argument_list->getWidth();
        $right_paren = EditableNode::fromJSON($json['function_call_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        return new static($receiver, $left_paren, $argument_list, $right_paren);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('receiver' => $this->_receiver, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren);
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
        $receiver = $this->_receiver->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        if ($receiver === $this->_receiver && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($receiver, $left_paren, $argument_list, $right_paren);
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
        return new static($value, $this->_left_paren, $this->_argument_list, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasReceiver()
    {
        return !$this->_receiver->isMissing();
    }
    /**
     * @return ArrayCreationExpression | FunctionCallExpression |
     * LiteralExpression | MemberSelectionExpression | ParenthesizedExpression |
     * PrefixUnaryExpression | QualifiedName | SafeMemberSelectionExpression |
     * ScopeResolutionExpression | SubscriptExpression | GreaterThanToken |
     * CatchToken | IfToken | NameToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getReceiver()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_receiver);
    }
    /**
     * @return ArrayCreationExpression | FunctionCallExpression |
     * LiteralExpression | MemberSelectionExpression | ParenthesizedExpression |
     * PrefixUnaryExpression | QualifiedName | SafeMemberSelectionExpression |
     * ScopeResolutionExpression | SubscriptExpression | GreaterThanToken |
     * CatchToken | IfToken | NameToken | VariableExpression
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
        return new static($this->_receiver, $value, $this->_argument_list, $this->_right_paren);
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
        return new static($this->_receiver, $this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasArgumentList()
    {
        return !$this->_argument_list->isMissing();
    }
    /**
     * @return EditableList<AnonymousFunction> | EditableList<EditableNode> |
     * EditableList<ArrayCreationExpression> |
     * EditableList<ArrayIntrinsicExpression> | EditableList<AsExpression> |
     * EditableList<AwaitableCreationExpression> | EditableList<BinaryExpression>
     * | EditableList<CastExpression> | EditableList<CollectionLiteralExpression>
     * | EditableList<ConditionalExpression> |
     * EditableList<DarrayIntrinsicExpression> |
     * EditableList<DecoratedExpression> | EditableList<DefineExpression> |
     * EditableList<DictionaryIntrinsicExpression> |
     * EditableList<EmptyExpression> | EditableList<EvalExpression> |
     * EditableList<FunctionCallExpression> | EditableList<InclusionExpression> |
     * EditableList<InstanceofExpression> | EditableList<IsExpression> |
     * EditableList<IssetExpression> | EditableList<KeysetIntrinsicExpression> |
     * EditableList<LambdaExpression> | EditableList<LiteralExpression> |
     * EditableList<?LiteralExpression> | EditableList<MemberSelectionExpression>
     * | EditableList<ObjectCreationExpression> |
     * EditableList<ParenthesizedExpression> |
     * EditableList<PipeVariableExpression> |
     * EditableList<PostfixUnaryExpression> | EditableList<PrefixUnaryExpression>
     * | EditableList<QualifiedName> |
     * EditableList<SafeMemberSelectionExpression> |
     * EditableList<ScopeResolutionExpression> | EditableList<ShapeExpression> |
     * EditableList<SubscriptExpression> | EditableList<NameToken> |
     * EditableList<TupleExpression> | EditableList<VariableExpression> |
     * EditableList<VarrayIntrinsicExpression> |
     * EditableList<VectorIntrinsicExpression> | EditableList<XHPExpression> |
     * null
     */
    /**
     * @return EditableList<null|EditableNode>|null
     */
    public function getArgumentList()
    {
        if ($this->_argument_list->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_argument_list);
    }
    /**
     * @return EditableList<AnonymousFunction> | EditableList<EditableNode> |
     * EditableList<ArrayCreationExpression> |
     * EditableList<ArrayIntrinsicExpression> | EditableList<AsExpression> |
     * EditableList<AwaitableCreationExpression> | EditableList<BinaryExpression>
     * | EditableList<CastExpression> | EditableList<CollectionLiteralExpression>
     * | EditableList<ConditionalExpression> |
     * EditableList<DarrayIntrinsicExpression> |
     * EditableList<DecoratedExpression> | EditableList<DefineExpression> |
     * EditableList<DictionaryIntrinsicExpression> |
     * EditableList<EmptyExpression> | EditableList<EvalExpression> |
     * EditableList<FunctionCallExpression> | EditableList<InclusionExpression> |
     * EditableList<InstanceofExpression> | EditableList<IsExpression> |
     * EditableList<IssetExpression> | EditableList<KeysetIntrinsicExpression> |
     * EditableList<LambdaExpression> | EditableList<LiteralExpression> |
     * EditableList<?LiteralExpression> | EditableList<MemberSelectionExpression>
     * | EditableList<ObjectCreationExpression> |
     * EditableList<ParenthesizedExpression> |
     * EditableList<PipeVariableExpression> |
     * EditableList<PostfixUnaryExpression> | EditableList<PrefixUnaryExpression>
     * | EditableList<QualifiedName> |
     * EditableList<SafeMemberSelectionExpression> |
     * EditableList<ScopeResolutionExpression> | EditableList<ShapeExpression> |
     * EditableList<SubscriptExpression> | EditableList<NameToken> |
     * EditableList<TupleExpression> | EditableList<VariableExpression> |
     * EditableList<VarrayIntrinsicExpression> |
     * EditableList<VectorIntrinsicExpression> | EditableList<XHPExpression>
     */
    /**
     * @return EditableList<null|EditableNode>
     */
    public function getArgumentListx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_argument_list);
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
        return new static($this->_receiver, $this->_left_paren, $this->_argument_list, $value);
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

