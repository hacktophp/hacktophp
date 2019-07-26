<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c4e2d8ee4cf88fc311943304f0f04d2c>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ArrayIntrinsicExpression extends Node implements IPHPArray, IContainer, ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'array_intrinsic_expression';
    /**
     * @var ArrayToken
     */
    private $_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<Node>>|null
     */
    private $_members;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @param NodeList<ListItem<Node>>|null $members
     */
    public function __construct(ArrayToken $keyword, LeftParenToken $left_paren, ?NodeList $members, RightParenToken $right_paren, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_members = $members;
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
        $keyword = Node::fromJSON($json['array_intrinsic_keyword'], $file, $offset, $source, 'ArrayToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['array_intrinsic_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $members = Node::fromJSON($json['array_intrinsic_members'], $file, $offset, $source, 'NodeList<ListItem<Node>>');
        $offset += (($__tmp1__ = $members) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_paren = Node::fromJSON($json['array_intrinsic_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $members, $right_paren, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'members' => $this->_members, 'right_paren' => $this->_right_paren]);
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
        $keyword = $rewriter($this->_keyword, $parents);
        $left_paren = $rewriter($this->_left_paren, $parents);
        $members = $this->_members === null ? null : $rewriter($this->_members, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $members === $this->_members && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($keyword, $left_paren, $members, $right_paren);
    }
    /**
     * @return null|Node
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(ArrayToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_members, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return ArrayToken
     */
    /**
     * @return ArrayToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ArrayToken::class, $this->_keyword);
    }
    /**
     * @return ArrayToken
     */
    /**
     * @return ArrayToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
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
        return new static($this->_keyword, $value, $this->_members, $this->_right_paren);
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
    public function getMembersUNTYPED()
    {
        return $this->_members;
    }
    /**
     * @param NodeList<ListItem<Node>>|null $value
     *
     * @return static
     */
    public function withMembers(?NodeList $value)
    {
        if ($value === $this->_members) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasMembers()
    {
        return $this->_members !== null;
    }
    /**
     * @return NodeList<ListItem<AnonymousFunction>> |
     * NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<ArrayCreationExpression>> |
     * NodeList<ListItem<ArrayIntrinsicExpression>> | NodeList<ListItem<Node>> |
     * NodeList<ListItem<AwaitableCreationExpression>> |
     * NodeList<ListItem<BinaryExpression>> | NodeList<ListItem<IHasOperator>> |
     * NodeList<ListItem<CollectionLiteralExpression>> |
     * NodeList<ListItem<ElementInitializer>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<QualifiedName>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<SubscriptExpression>> | NodeList<ListItem<NameToken>> |
     * NodeList<ListItem<TupleExpression>> |
     * NodeList<ListItem<VariableExpression>> |
     * NodeList<ListItem<VectorIntrinsicExpression>> | null
     */
    /**
     * @return NodeList<ListItem<Node>>|null
     */
    public function getMembers()
    {
        return $this->_members;
    }
    /**
     * @return NodeList<ListItem<AnonymousFunction>> |
     * NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<ArrayCreationExpression>> |
     * NodeList<ListItem<ArrayIntrinsicExpression>> | NodeList<ListItem<Node>> |
     * NodeList<ListItem<AwaitableCreationExpression>> |
     * NodeList<ListItem<BinaryExpression>> | NodeList<ListItem<IHasOperator>> |
     * NodeList<ListItem<CollectionLiteralExpression>> |
     * NodeList<ListItem<ElementInitializer>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<QualifiedName>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<SubscriptExpression>> | NodeList<ListItem<NameToken>> |
     * NodeList<ListItem<TupleExpression>> |
     * NodeList<ListItem<VariableExpression>> |
     * NodeList<ListItem<VectorIntrinsicExpression>>
     */
    /**
     * @return NodeList<ListItem<Node>>
     */
    public function getMembersx()
    {
        return TypeAssert\not_null($this->getMembers());
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
        return new static($this->_keyword, $this->_left_paren, $this->_members, $value);
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

