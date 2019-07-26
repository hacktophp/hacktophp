<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d5a6a3c03987af1c7f93950a4b0b596d>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ArrayCreationExpression extends Node implements IPHPArray, IContainer, ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'array_creation_expression';
    /**
     * @var LeftBracketToken
     */
    private $_left_bracket;
    /**
     * @var NodeList<ListItem<Node>>|null
     */
    private $_members;
    /**
     * @var RightBracketToken
     */
    private $_right_bracket;
    /**
     * @param NodeList<ListItem<Node>>|null $members
     */
    public function __construct(LeftBracketToken $left_bracket, ?NodeList $members, RightBracketToken $right_bracket, ?__Private\SourceRef $source_ref = null)
    {
        $this->_left_bracket = $left_bracket;
        $this->_members = $members;
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
        $left_bracket = Node::fromJSON($json['array_creation_left_bracket'], $file, $offset, $source, 'LeftBracketToken');
        $left_bracket = $left_bracket !== null ? $left_bracket : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_bracket->getWidth();
        $members = Node::fromJSON($json['array_creation_members'], $file, $offset, $source, 'NodeList<ListItem<Node>>');
        $offset += (($__tmp1__ = $members) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_bracket = Node::fromJSON($json['array_creation_right_bracket'], $file, $offset, $source, 'RightBracketToken');
        $right_bracket = $right_bracket !== null ? $right_bracket : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_bracket->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_bracket, $members, $right_bracket, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_bracket' => $this->_left_bracket, 'members' => $this->_members, 'right_bracket' => $this->_right_bracket]);
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
        $left_bracket = $rewriter($this->_left_bracket, $parents);
        $members = $this->_members === null ? null : $rewriter($this->_members, $parents);
        $right_bracket = $rewriter($this->_right_bracket, $parents);
        if ($left_bracket === $this->_left_bracket && $members === $this->_members && $right_bracket === $this->_right_bracket) {
            return $this;
        }
        return new static($left_bracket, $members, $right_bracket);
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
        return new static($value, $this->_members, $this->_right_bracket);
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
        return new static($this->_left_bracket, $value, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasMembers()
    {
        return $this->_members !== null;
    }
    /**
     * @return NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<ArrayCreationExpression>> |
     * NodeList<ListItem<IPHPArray>> | NodeList<ListItem<IContainer>> |
     * NodeList<ListItem<Node>> | NodeList<ListItem<BinaryExpression>> |
     * NodeList<ListItem<ConditionalExpression>> |
     * NodeList<ListItem<DictionaryIntrinsicExpression>> |
     * NodeList<ListItem<IHackArray>> | NodeList<ListItem<ElementInitializer>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<KeysetIntrinsicExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<SubscriptExpression>> | NodeList<ListItem<NameToken>> |
     * NodeList<ListItem<VariableExpression>> |
     * NodeList<ListItem<VarrayIntrinsicExpression>> |
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
     * @return NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<ArrayCreationExpression>> |
     * NodeList<ListItem<IPHPArray>> | NodeList<ListItem<IContainer>> |
     * NodeList<ListItem<Node>> | NodeList<ListItem<BinaryExpression>> |
     * NodeList<ListItem<ConditionalExpression>> |
     * NodeList<ListItem<DictionaryIntrinsicExpression>> |
     * NodeList<ListItem<IHackArray>> | NodeList<ListItem<ElementInitializer>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<KeysetIntrinsicExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<ObjectCreationExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<SubscriptExpression>> | NodeList<ListItem<NameToken>> |
     * NodeList<ListItem<VariableExpression>> |
     * NodeList<ListItem<VarrayIntrinsicExpression>> |
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
        return new static($this->_left_bracket, $this->_members, $value);
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

