<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4aa1b957f661620dd2c029198bb63af4>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class FunctionCallExpression extends Node implements IFunctionCallishExpression, ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'function_call_expression';
    /**
     * @var Node
     */
    private $_receiver;
    /**
     * @var null|TypeArguments
     */
    private $_type_args;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<IExpression>>|null
     */
    private $_argument_list;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @param NodeList<ListItem<IExpression>>|null $argument_list
     */
    public function __construct(Node $receiver, ?TypeArguments $type_args, LeftParenToken $left_paren, ?NodeList $argument_list, RightParenToken $right_paren, ?__Private\SourceRef $source_ref = null)
    {
        $this->_receiver = $receiver;
        $this->_type_args = $type_args;
        $this->_left_paren = $left_paren;
        $this->_argument_list = $argument_list;
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
        $receiver = Node::fromJSON($json['function_call_receiver'], $file, $offset, $source, 'Node');
        $receiver = $receiver !== null ? $receiver : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $receiver->getWidth();
        $type_args = Node::fromJSON($json['function_call_type_args'], $file, $offset, $source, 'TypeArguments');
        $offset += (($__tmp1__ = $type_args) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $left_paren = Node::fromJSON($json['function_call_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $argument_list = Node::fromJSON($json['function_call_argument_list'], $file, $offset, $source, 'NodeList<ListItem<IExpression>>');
        $offset += (($__tmp2__ = $argument_list) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $right_paren = Node::fromJSON($json['function_call_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($receiver, $type_args, $left_paren, $argument_list, $right_paren, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['receiver' => $this->_receiver, 'type_args' => $this->_type_args, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren]);
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
        $receiver = $rewriter($this->_receiver, $parents);
        $type_args = $this->_type_args === null ? null : $rewriter($this->_type_args, $parents);
        $left_paren = $rewriter($this->_left_paren, $parents);
        $argument_list = $this->_argument_list === null ? null : $rewriter($this->_argument_list, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        if ($receiver === $this->_receiver && $type_args === $this->_type_args && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($receiver, $type_args, $left_paren, $argument_list, $right_paren);
    }
    /**
     * @return null|Node
     */
    public function getReceiverUNTYPED()
    {
        return $this->_receiver;
    }
    /**
     * @return static
     */
    public function withReceiver(Node $value)
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
        return $this->_receiver !== null;
    }
    /**
     * @return function_call_expression | member_selection_expression |
     * parenthesized_expression | qualified_name |
     * safe_member_selection_expression | scope_resolution_expression |
     * subscript_expression | token:name | variable
     */
    /**
     * @return Node
     */
    public function getReceiver()
    {
        return $this->_receiver;
    }
    /**
     * @return function_call_expression | member_selection_expression |
     * parenthesized_expression | qualified_name |
     * safe_member_selection_expression | scope_resolution_expression |
     * subscript_expression | token:name | variable
     */
    /**
     * @return Node
     */
    public function getReceiverx()
    {
        return $this->getReceiver();
    }
    /**
     * @return null|Node
     */
    public function getTypeArgsUNTYPED()
    {
        return $this->_type_args;
    }
    /**
     * @return static
     */
    public function withTypeArgs(?TypeArguments $value)
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
        return $this->_type_args !== null;
    }
    /**
     * @return null | TypeArguments
     */
    /**
     * @return null|TypeArguments
     */
    public function getTypeArgs()
    {
        return $this->_type_args;
    }
    /**
     * @return TypeArguments
     */
    /**
     * @return TypeArguments
     */
    public function getTypeArgsx()
    {
        return TypeAssert\not_null($this->getTypeArgs());
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
        return new static($this->_receiver, $this->_type_args, $value, $this->_argument_list, $this->_right_paren);
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
    public function getArgumentListUNTYPED()
    {
        return $this->_argument_list;
    }
    /**
     * @param NodeList<ListItem<IExpression>>|null $value
     *
     * @return static
     */
    public function withArgumentList(?NodeList $value)
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
        return $this->_argument_list !== null;
    }
    /**
     * @return NodeList<ListItem<AnonymousFunction>> |
     * NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<ArrayCreationExpression>> |
     * NodeList<ListItem<IContainer>> |
     * NodeList<ListItem<ArrayIntrinsicExpression>> |
     * NodeList<ListItem<AsExpression>> |
     * NodeList<ListItem<AwaitableCreationExpression>> |
     * NodeList<ListItem<BinaryExpression>> | NodeList<ListItem<IHasOperator>> |
     * NodeList<ListItem<CastExpression>> |
     * NodeList<ListItem<CollectionLiteralExpression>> |
     * NodeList<ListItem<ConditionalExpression>> |
     * NodeList<ListItem<DarrayIntrinsicExpression>> |
     * NodeList<ListItem<DecoratedExpression>> |
     * NodeList<ListItem<DictionaryIntrinsicExpression>> |
     * NodeList<ListItem<IHackArray>> | NodeList<ListItem<EvalExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<IFunctionCallishExpression>> |
     * NodeList<ListItem<IsExpression>> | NodeList<ListItem<IssetExpression>> |
     * NodeList<ListItem<KeysetIntrinsicExpression>> |
     * NodeList<ListItem<LambdaExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<ParenthesizedExpression>> |
     * NodeList<ListItem<PipeVariableExpression>> |
     * NodeList<ListItem<PostfixUnaryExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<QualifiedName>> |
     * NodeList<ListItem<SafeMemberSelectionExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<ShapeExpression>> |
     * NodeList<ListItem<SubscriptExpression>> | NodeList<ListItem<NameToken>> |
     * NodeList<ListItem<TupleExpression>> |
     * NodeList<ListItem<VariableExpression>> |
     * NodeList<ListItem<VarrayIntrinsicExpression>> |
     * NodeList<ListItem<VectorIntrinsicExpression>> |
     * NodeList<ListItem<XHPExpression>> | null
     */
    /**
     * @return NodeList<ListItem<IExpression>>|null
     */
    public function getArgumentList()
    {
        return $this->_argument_list;
    }
    /**
     * @return NodeList<ListItem<AnonymousFunction>> |
     * NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<ArrayCreationExpression>> |
     * NodeList<ListItem<IContainer>> |
     * NodeList<ListItem<ArrayIntrinsicExpression>> |
     * NodeList<ListItem<AsExpression>> |
     * NodeList<ListItem<AwaitableCreationExpression>> |
     * NodeList<ListItem<BinaryExpression>> | NodeList<ListItem<IHasOperator>> |
     * NodeList<ListItem<CastExpression>> |
     * NodeList<ListItem<CollectionLiteralExpression>> |
     * NodeList<ListItem<ConditionalExpression>> |
     * NodeList<ListItem<DarrayIntrinsicExpression>> |
     * NodeList<ListItem<DecoratedExpression>> |
     * NodeList<ListItem<DictionaryIntrinsicExpression>> |
     * NodeList<ListItem<IHackArray>> | NodeList<ListItem<EvalExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<IFunctionCallishExpression>> |
     * NodeList<ListItem<IsExpression>> | NodeList<ListItem<IssetExpression>> |
     * NodeList<ListItem<KeysetIntrinsicExpression>> |
     * NodeList<ListItem<LambdaExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<ParenthesizedExpression>> |
     * NodeList<ListItem<PipeVariableExpression>> |
     * NodeList<ListItem<PostfixUnaryExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<QualifiedName>> |
     * NodeList<ListItem<SafeMemberSelectionExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<ShapeExpression>> |
     * NodeList<ListItem<SubscriptExpression>> | NodeList<ListItem<NameToken>> |
     * NodeList<ListItem<TupleExpression>> |
     * NodeList<ListItem<VariableExpression>> |
     * NodeList<ListItem<VarrayIntrinsicExpression>> |
     * NodeList<ListItem<VectorIntrinsicExpression>> |
     * NodeList<ListItem<XHPExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getArgumentListx()
    {
        return TypeAssert\not_null($this->getArgumentList());
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
        return new static($this->_receiver, $this->_type_args, $this->_left_paren, $this->_argument_list, $value);
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

