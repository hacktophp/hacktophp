<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0742c19fad16c5e9ab8bb585161ecf96>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class RecordCreationExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'record_creation_expression';
    /**
     * @var NameToken
     */
    private $_type;
    /**
     * @var null|Node
     */
    private $_array_token;
    /**
     * @var LeftBracketToken
     */
    private $_left_bracket;
    /**
     * @var NodeList<ListItem<ElementInitializer>>
     */
    private $_members;
    /**
     * @var RightBracketToken
     */
    private $_right_bracket;
    /**
     * @param NodeList<ListItem<ElementInitializer>> $members
     */
    public function __construct(NameToken $type, ?Node $array_token, LeftBracketToken $left_bracket, NodeList $members, RightBracketToken $right_bracket, ?__Private\SourceRef $source_ref = null)
    {
        $this->_type = $type;
        $this->_array_token = $array_token;
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
        $type = Node::fromJSON($json['record_creation_type'], $file, $offset, $source, 'NameToken');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $array_token = Node::fromJSON($json['record_creation_array_token'], $file, $offset, $source, 'Node');
        $offset += (($__tmp1__ = $array_token) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $left_bracket = Node::fromJSON($json['record_creation_left_bracket'], $file, $offset, $source, 'LeftBracketToken');
        $left_bracket = $left_bracket !== null ? $left_bracket : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_bracket->getWidth();
        $members = Node::fromJSON($json['record_creation_members'], $file, $offset, $source, 'NodeList<ListItem<ElementInitializer>>');
        $members = $members !== null ? $members : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $members->getWidth();
        $right_bracket = Node::fromJSON($json['record_creation_right_bracket'], $file, $offset, $source, 'RightBracketToken');
        $right_bracket = $right_bracket !== null ? $right_bracket : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_bracket->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($type, $array_token, $left_bracket, $members, $right_bracket, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['type' => $this->_type, 'array_token' => $this->_array_token, 'left_bracket' => $this->_left_bracket, 'members' => $this->_members, 'right_bracket' => $this->_right_bracket]);
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
        $array_token = $this->_array_token === null ? null : $rewriter($this->_array_token, $parents);
        $left_bracket = $rewriter($this->_left_bracket, $parents);
        $members = $rewriter($this->_members, $parents);
        $right_bracket = $rewriter($this->_right_bracket, $parents);
        if ($type === $this->_type && $array_token === $this->_array_token && $left_bracket === $this->_left_bracket && $members === $this->_members && $right_bracket === $this->_right_bracket) {
            return $this;
        }
        return new static($type, $array_token, $left_bracket, $members, $right_bracket);
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
    public function withType(NameToken $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($value, $this->_array_token, $this->_left_bracket, $this->_members, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getType()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_type);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getTypex()
    {
        return $this->getType();
    }
    /**
     * @return null|Node
     */
    public function getArrayTokenUNTYPED()
    {
        return $this->_array_token;
    }
    /**
     * @return static
     */
    public function withArrayToken(?Node $value)
    {
        if ($value === $this->_array_token) {
            return $this;
        }
        return new static($this->_type, $value, $this->_left_bracket, $this->_members, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasArrayToken()
    {
        return $this->_array_token !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
     */
    public function getArrayToken()
    {
        return $this->_array_token;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getArrayTokenx()
    {
        return TypeAssert\not_null($this->getArrayToken());
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
        return new static($this->_type, $this->_array_token, $value, $this->_members, $this->_right_bracket);
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
     * @param NodeList<ListItem<ElementInitializer>> $value
     *
     * @return static
     */
    public function withMembers(NodeList $value)
    {
        if ($value === $this->_members) {
            return $this;
        }
        return new static($this->_type, $this->_array_token, $this->_left_bracket, $value, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasMembers()
    {
        return $this->_members !== null;
    }
    /**
     * @return NodeList<ListItem<ElementInitializer>>
     */
    /**
     * @return NodeList<ListItem<ElementInitializer>>
     */
    public function getMembers()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_members);
    }
    /**
     * @return NodeList<ListItem<ElementInitializer>>
     */
    /**
     * @return NodeList<ListItem<ElementInitializer>>
     */
    public function getMembersx()
    {
        return $this->getMembers();
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
        return new static($this->_type, $this->_array_token, $this->_left_bracket, $this->_members, $value);
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

