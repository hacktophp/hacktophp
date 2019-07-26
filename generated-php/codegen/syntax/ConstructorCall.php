<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<33655cc877b06aea5cfa354c2503f1ab>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ConstructorCall extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'constructor_call';
    /**
     * @var Node
     */
    private $_type;
    /**
     * @var null|LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<IExpression>>|null
     */
    private $_argument_list;
    /**
     * @var null|RightParenToken
     */
    private $_right_paren;
    /**
     * @param NodeList<ListItem<IExpression>>|null $argument_list
     */
    public function __construct(Node $type, ?LeftParenToken $left_paren, ?NodeList $argument_list, ?RightParenToken $right_paren, ?array $source_ref = null)
    {
        $this->_type = $type;
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
        $type = Node::fromJSON($json['constructor_call_type'], $file, $offset, $source, 'Node');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $left_paren = Node::fromJSON($json['constructor_call_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $offset += (($__tmp1__ = $left_paren) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $argument_list = Node::fromJSON($json['constructor_call_argument_list'], $file, $offset, $source, 'NodeList<ListItem<IExpression>>');
        $offset += (($__tmp2__ = $argument_list) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $right_paren = Node::fromJSON($json['constructor_call_right_paren'], $file, $offset, $source, 'RightParenToken');
        $offset += (($__tmp3__ = $right_paren) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($type, $left_paren, $argument_list, $right_paren, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['type' => $this->_type, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren]);
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
        $type = $rewriter($this->_type, $parents);
        $left_paren = $this->_left_paren === null ? null : $rewriter($this->_left_paren, $parents);
        $argument_list = $this->_argument_list === null ? null : $rewriter($this->_argument_list, $parents);
        $right_paren = $this->_right_paren === null ? null : $rewriter($this->_right_paren, $parents);
        if ($type === $this->_type && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($type, $left_paren, $argument_list, $right_paren);
    }
    /**
     * @return null|Node
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(Node $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_argument_list, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return GenericTypeSpecifier | MemberSelectionExpression |
     * ParenthesizedExpression | QualifiedName | ScopeResolutionExpression |
     * SimpleTypeSpecifier | SubscriptExpression | NameToken | ParentToken |
     * SelfToken | StaticToken | VariableExpression
     */
    /**
     * @return Node
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @return GenericTypeSpecifier | MemberSelectionExpression |
     * ParenthesizedExpression | QualifiedName | ScopeResolutionExpression |
     * SimpleTypeSpecifier | SubscriptExpression | NameToken | ParentToken |
     * SelfToken | StaticToken | VariableExpression
     */
    /**
     * @return Node
     */
    public function getTypex()
    {
        return $this->getType();
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
    public function withLeftParen(?LeftParenToken $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($this->_type, $value, $this->_argument_list, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return $this->_left_paren !== null;
    }
    /**
     * @return null | LeftParenToken
     */
    /**
     * @return null|LeftParenToken
     */
    public function getLeftParen()
    {
        return $this->_left_paren;
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParenx()
    {
        return TypeAssert\not_null($this->getLeftParen());
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
        return new static($this->_type, $this->_left_paren, $value, $this->_right_paren);
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
     * NodeList<ListItem<ArrayIntrinsicExpression>> |
     * NodeList<ListItem<BinaryExpression>> | NodeList<ListItem<CastExpression>>
     * | NodeList<ListItem<CollectionLiteralExpression>> |
     * NodeList<ListItem<ConditionalExpression>> |
     * NodeList<ListItem<DarrayIntrinsicExpression>> |
     * NodeList<ListItem<DecoratedExpression>> |
     * NodeList<ListItem<DictionaryIntrinsicExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LambdaExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<ParenthesizedExpression>> |
     * NodeList<ListItem<PipeVariableExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<ShapeExpression>> |
     * NodeList<ListItem<SubscriptExpression>> | NodeList<ListItem<NameToken>> |
     * NodeList<ListItem<VariableExpression>> |
     * NodeList<ListItem<VarrayIntrinsicExpression>> |
     * NodeList<ListItem<VectorIntrinsicExpression>> | null
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
     * NodeList<ListItem<ArrayIntrinsicExpression>> |
     * NodeList<ListItem<BinaryExpression>> | NodeList<ListItem<CastExpression>>
     * | NodeList<ListItem<CollectionLiteralExpression>> |
     * NodeList<ListItem<ConditionalExpression>> |
     * NodeList<ListItem<DarrayIntrinsicExpression>> |
     * NodeList<ListItem<DecoratedExpression>> |
     * NodeList<ListItem<DictionaryIntrinsicExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LambdaExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<ParenthesizedExpression>> |
     * NodeList<ListItem<PipeVariableExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<ShapeExpression>> |
     * NodeList<ListItem<SubscriptExpression>> | NodeList<ListItem<NameToken>> |
     * NodeList<ListItem<VariableExpression>> |
     * NodeList<ListItem<VarrayIntrinsicExpression>> |
     * NodeList<ListItem<VectorIntrinsicExpression>>
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
    public function withRightParen(?RightParenToken $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_type, $this->_left_paren, $this->_argument_list, $value);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return $this->_right_paren !== null;
    }
    /**
     * @return null | RightParenToken
     */
    /**
     * @return null|RightParenToken
     */
    public function getRightParen()
    {
        return $this->_right_paren;
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParenx()
    {
        return TypeAssert\not_null($this->getRightParen());
    }
}

