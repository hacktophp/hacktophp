<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<542c05b4894de43ab92b3908d4af82ae>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class KeysetIntrinsicExpression extends Node implements IHackArray, IContainer, ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'keyset_intrinsic_expression';
    /**
     * @var KeysetToken
     */
    private $_keyword;
    /**
     * @var null|TypeArguments
     */
    private $_explicit_type;
    /**
     * @var LeftBracketToken
     */
    private $_left_bracket;
    /**
     * @var NodeList<ListItem<IExpression>>|null
     */
    private $_members;
    /**
     * @var RightBracketToken
     */
    private $_right_bracket;
    /**
     * @param NodeList<ListItem<IExpression>>|null $members
     */
    public function __construct(KeysetToken $keyword, ?TypeArguments $explicit_type, LeftBracketToken $left_bracket, ?NodeList $members, RightBracketToken $right_bracket, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_explicit_type = $explicit_type;
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
        $keyword = Node::fromJSON($json['keyset_intrinsic_keyword'], $file, $offset, $source, 'KeysetToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $explicit_type = Node::fromJSON($json['keyset_intrinsic_explicit_type'], $file, $offset, $source, 'TypeArguments');
        $offset += (($__tmp1__ = $explicit_type) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $left_bracket = Node::fromJSON($json['keyset_intrinsic_left_bracket'], $file, $offset, $source, 'LeftBracketToken');
        $left_bracket = $left_bracket !== null ? $left_bracket : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_bracket->getWidth();
        $members = Node::fromJSON($json['keyset_intrinsic_members'], $file, $offset, $source, 'NodeList<ListItem<IExpression>>');
        $offset += (($__tmp2__ = $members) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $right_bracket = Node::fromJSON($json['keyset_intrinsic_right_bracket'], $file, $offset, $source, 'RightBracketToken');
        $right_bracket = $right_bracket !== null ? $right_bracket : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_bracket->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $explicit_type, $left_bracket, $members, $right_bracket, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'explicit_type' => $this->_explicit_type, 'left_bracket' => $this->_left_bracket, 'members' => $this->_members, 'right_bracket' => $this->_right_bracket]);
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
        $explicit_type = $this->_explicit_type === null ? null : $rewriter($this->_explicit_type, $parents);
        $left_bracket = $rewriter($this->_left_bracket, $parents);
        $members = $this->_members === null ? null : $rewriter($this->_members, $parents);
        $right_bracket = $rewriter($this->_right_bracket, $parents);
        if ($keyword === $this->_keyword && $explicit_type === $this->_explicit_type && $left_bracket === $this->_left_bracket && $members === $this->_members && $right_bracket === $this->_right_bracket) {
            return $this;
        }
        return new static($keyword, $explicit_type, $left_bracket, $members, $right_bracket);
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
    public function withKeyword(KeysetToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_explicit_type, $this->_left_bracket, $this->_members, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return KeysetToken
     */
    /**
     * @return KeysetToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(KeysetToken::class, $this->_keyword);
    }
    /**
     * @return KeysetToken
     */
    /**
     * @return KeysetToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getExplicitTypeUNTYPED()
    {
        return $this->_explicit_type;
    }
    /**
     * @return static
     */
    public function withExplicitType(?TypeArguments $value)
    {
        if ($value === $this->_explicit_type) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_left_bracket, $this->_members, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasExplicitType()
    {
        return $this->_explicit_type !== null;
    }
    /**
     * @return null | TypeArguments
     */
    /**
     * @return null|TypeArguments
     */
    public function getExplicitType()
    {
        return $this->_explicit_type;
    }
    /**
     * @return TypeArguments
     */
    /**
     * @return TypeArguments
     */
    public function getExplicitTypex()
    {
        return TypeAssert\not_null($this->getExplicitType());
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
        return new static($this->_keyword, $this->_explicit_type, $value, $this->_members, $this->_right_bracket);
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
     * @param NodeList<ListItem<IExpression>>|null $value
     *
     * @return static
     */
    public function withMembers(?NodeList $value)
    {
        if ($value === $this->_members) {
            return $this;
        }
        return new static($this->_keyword, $this->_explicit_type, $this->_left_bracket, $value, $this->_right_bracket);
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
     * NodeList<ListItem<ConditionalExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<NameToken>> | null
     */
    /**
     * @return NodeList<ListItem<IExpression>>|null
     */
    public function getMembers()
    {
        return $this->_members;
    }
    /**
     * @return NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<ConditionalExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<NameToken>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
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
        return new static($this->_keyword, $this->_explicit_type, $this->_left_bracket, $this->_members, $value);
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

