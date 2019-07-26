<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ce64854ae86d2617d99ec06f44ddcdb3>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class CollectionLiteralExpression extends Node implements IContainer, ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'collection_literal_expression';
    /**
     * @var ISimpleCreationSpecifier
     */
    private $_name;
    /**
     * @var LeftBraceToken
     */
    private $_left_brace;
    /**
     * @var NodeList<ListItem<Node>>|null
     */
    private $_initializers;
    /**
     * @var RightBraceToken
     */
    private $_right_brace;
    /**
     * @param NodeList<ListItem<Node>>|null $initializers
     */
    public function __construct(ISimpleCreationSpecifier $name, LeftBraceToken $left_brace, ?NodeList $initializers, RightBraceToken $right_brace, ?array $source_ref = null)
    {
        $this->_name = $name;
        $this->_left_brace = $left_brace;
        $this->_initializers = $initializers;
        $this->_right_brace = $right_brace;
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
        $name = Node::fromJSON($json['collection_literal_name'], $file, $offset, $source, 'ISimpleCreationSpecifier');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $left_brace = Node::fromJSON($json['collection_literal_left_brace'], $file, $offset, $source, 'LeftBraceToken');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $initializers = Node::fromJSON($json['collection_literal_initializers'], $file, $offset, $source, 'NodeList<ListItem<Node>>');
        $offset += (($__tmp1__ = $initializers) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_brace = Node::fromJSON($json['collection_literal_right_brace'], $file, $offset, $source, 'RightBraceToken');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($name, $left_brace, $initializers, $right_brace, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['name' => $this->_name, 'left_brace' => $this->_left_brace, 'initializers' => $this->_initializers, 'right_brace' => $this->_right_brace]);
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
        $name = $rewriter($this->_name, $parents);
        $left_brace = $rewriter($this->_left_brace, $parents);
        $initializers = $this->_initializers === null ? null : $rewriter($this->_initializers, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        if ($name === $this->_name && $left_brace === $this->_left_brace && $initializers === $this->_initializers && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($name, $left_brace, $initializers, $right_brace);
    }
    /**
     * @return null|Node
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(ISimpleCreationSpecifier $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($value, $this->_left_brace, $this->_initializers, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return ISimpleCreationSpecifier
     */
    public function getName()
    {
        return TypeAssert\instance_of(ISimpleCreationSpecifier::class, $this->_name);
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return ISimpleCreationSpecifier
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return null|Node
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(LeftBraceToken $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($this->_name, $value, $this->_initializers, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return $this->_left_brace !== null;
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBrace()
    {
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return null|Node
     */
    public function getInitializersUNTYPED()
    {
        return $this->_initializers;
    }
    /**
     * @param NodeList<ListItem<Node>>|null $value
     *
     * @return static
     */
    public function withInitializers(?NodeList $value)
    {
        if ($value === $this->_initializers) {
            return $this;
        }
        return new static($this->_name, $this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasInitializers()
    {
        return $this->_initializers !== null;
    }
    /**
     * @return NodeList<ListItem<AnonymousFunction>> |
     * NodeList<ListItem<ArrayCreationExpression>> |
     * NodeList<ListItem<ArrayIntrinsicExpression>> |
     * NodeList<ListItem<IContainer>> | NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<CastExpression>> |
     * NodeList<ListItem<CollectionLiteralExpression>> |
     * NodeList<ListItem<ElementInitializer>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LambdaExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<ShapeExpression>> |
     * NodeList<ListItem<SubscriptExpression>> | NodeList<ListItem<NameToken>> |
     * NodeList<ListItem<TupleExpression>> |
     * NodeList<ListItem<VariableExpression>> |
     * NodeList<ListItem<VarrayIntrinsicExpression>> | null
     */
    /**
     * @return NodeList<ListItem<Node>>|null
     */
    public function getInitializers()
    {
        return $this->_initializers;
    }
    /**
     * @return NodeList<ListItem<AnonymousFunction>> |
     * NodeList<ListItem<ArrayCreationExpression>> |
     * NodeList<ListItem<ArrayIntrinsicExpression>> |
     * NodeList<ListItem<IContainer>> | NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<CastExpression>> |
     * NodeList<ListItem<CollectionLiteralExpression>> |
     * NodeList<ListItem<ElementInitializer>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LambdaExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<ShapeExpression>> |
     * NodeList<ListItem<SubscriptExpression>> | NodeList<ListItem<NameToken>> |
     * NodeList<ListItem<TupleExpression>> |
     * NodeList<ListItem<VariableExpression>> |
     * NodeList<ListItem<VarrayIntrinsicExpression>>
     */
    /**
     * @return NodeList<ListItem<Node>>
     */
    public function getInitializersx()
    {
        return TypeAssert\not_null($this->getInitializers());
    }
    /**
     * @return null|Node
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(RightBraceToken $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_name, $this->_left_brace, $this->_initializers, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return $this->_right_brace !== null;
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBrace()
    {
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

