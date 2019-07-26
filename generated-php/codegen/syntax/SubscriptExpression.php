<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<521fc2a89473f1214168e55b8972800c>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class SubscriptExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'subscript_expression';
    /**
     * @var IExpression
     */
    private $_receiver;
    /**
     * @var LeftBracketToken
     */
    private $_left_bracket;
    /**
     * @var null|IExpression
     */
    private $_index;
    /**
     * @var RightBracketToken
     */
    private $_right_bracket;
    public function __construct(IExpression $receiver, LeftBracketToken $left_bracket, ?IExpression $index, RightBracketToken $right_bracket, ?__Private\SourceRef $source_ref = null)
    {
        $this->_receiver = $receiver;
        $this->_left_bracket = $left_bracket;
        $this->_index = $index;
        $this->_right_bracket = $right_bracket;
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
        $receiver = Node::fromJSON($json['subscript_receiver'], $file, $offset, $source, 'IExpression');
        $receiver = $receiver !== null ? $receiver : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $receiver->getWidth();
        $left_bracket = Node::fromJSON($json['subscript_left_bracket'], $file, $offset, $source, 'LeftBracketToken');
        $left_bracket = $left_bracket !== null ? $left_bracket : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_bracket->getWidth();
        $index = Node::fromJSON($json['subscript_index'], $file, $offset, $source, 'IExpression');
        $offset += (($__tmp1__ = $index) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_bracket = Node::fromJSON($json['subscript_right_bracket'], $file, $offset, $source, 'RightBracketToken');
        $right_bracket = $right_bracket !== null ? $right_bracket : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_bracket->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($receiver, $left_bracket, $index, $right_bracket, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['receiver' => $this->_receiver, 'left_bracket' => $this->_left_bracket, 'index' => $this->_index, 'right_bracket' => $this->_right_bracket]);
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
        $left_bracket = $rewriter($this->_left_bracket, $parents);
        $index = $this->_index === null ? null : $rewriter($this->_index, $parents);
        $right_bracket = $rewriter($this->_right_bracket, $parents);
        if ($receiver === $this->_receiver && $left_bracket === $this->_left_bracket && $index === $this->_index && $right_bracket === $this->_right_bracket) {
            return $this;
        }
        return new static($receiver, $left_bracket, $index, $right_bracket);
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
    public function withReceiver(IExpression $value)
    {
        if ($value === $this->_receiver) {
            return $this;
        }
        return new static($value, $this->_left_bracket, $this->_index, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasReceiver()
    {
        return $this->_receiver !== null;
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * FunctionCallExpression | LiteralExpression | MemberSelectionExpression |
     * ParenthesizedExpression | SafeMemberSelectionExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getReceiver()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_receiver);
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * FunctionCallExpression | LiteralExpression | MemberSelectionExpression |
     * ParenthesizedExpression | SafeMemberSelectionExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getReceiverx()
    {
        return $this->getReceiver();
    }
    /**
     * @return null|Node
     */
    public function getLeftBracketUNTYPED()
    {
        return $this->_left_bracket;
    }
    /**
     * @return static
     */
    public function withLeftBracket(LeftBracketToken $value)
    {
        if ($value === $this->_left_bracket) {
            return $this;
        }
        return new static($this->_receiver, $value, $this->_index, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasLeftBracket()
    {
        return $this->_left_bracket !== null;
    }
    /**
     * @return LeftBracketToken
     */
    /**
     * @return LeftBracketToken
     */
    public function getLeftBracket()
    {
        return TypeAssert\instance_of(LeftBracketToken::class, $this->_left_bracket);
    }
    /**
     * @return LeftBracketToken
     */
    /**
     * @return LeftBracketToken
     */
    public function getLeftBracketx()
    {
        return $this->getLeftBracket();
    }
    /**
     * @return null|Node
     */
    public function getIndexUNTYPED()
    {
        return $this->_index;
    }
    /**
     * @return static
     */
    public function withIndex(?IExpression $value)
    {
        if ($value === $this->_index) {
            return $this;
        }
        return new static($this->_receiver, $this->_left_bracket, $value, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasIndex()
    {
        return $this->_index !== null;
    }
    /**
     * @return BinaryExpression | CastExpression | FunctionCallExpression |
     * LiteralExpression | MemberSelectionExpression | null |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return null|IExpression
     */
    public function getIndex()
    {
        return $this->_index;
    }
    /**
     * @return BinaryExpression | CastExpression | FunctionCallExpression |
     * LiteralExpression | MemberSelectionExpression | ParenthesizedExpression |
     * PostfixUnaryExpression | PrefixUnaryExpression | ScopeResolutionExpression
     * | SubscriptExpression | NameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getIndexx()
    {
        return TypeAssert\not_null($this->getIndex());
    }
    /**
     * @return null|Node
     */
    public function getRightBracketUNTYPED()
    {
        return $this->_right_bracket;
    }
    /**
     * @return static
     */
    public function withRightBracket(RightBracketToken $value)
    {
        if ($value === $this->_right_bracket) {
            return $this;
        }
        return new static($this->_receiver, $this->_left_bracket, $this->_index, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBracket()
    {
        return $this->_right_bracket !== null;
    }
    /**
     * @return RightBracketToken
     */
    /**
     * @return RightBracketToken
     */
    public function getRightBracket()
    {
        return TypeAssert\instance_of(RightBracketToken::class, $this->_right_bracket);
    }
    /**
     * @return RightBracketToken
     */
    /**
     * @return RightBracketToken
     */
    public function getRightBracketx()
    {
        return $this->getRightBracket();
    }
}

