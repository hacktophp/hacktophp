<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6fd444ca29cafed58a9172461341b5be>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class DictionaryTypeSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'dictionary_type_specifier';
    /**
     * @var DictToken
     */
    private $_keyword;
    /**
     * @var LessThanToken
     */
    private $_left_angle;
    /**
     * @var NodeList<ListItem<ITypeSpecifier>>
     */
    private $_members;
    /**
     * @var GreaterThanToken
     */
    private $_right_angle;
    /**
     * @param NodeList<ListItem<ITypeSpecifier>> $members
     */
    public function __construct(DictToken $keyword, LessThanToken $left_angle, NodeList $members, GreaterThanToken $right_angle, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_members = $members;
        $this->_right_angle = $right_angle;
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
        $keyword = Node::fromJSON($json['dictionary_type_keyword'], $file, $offset, $source, 'DictToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_angle = Node::fromJSON($json['dictionary_type_left_angle'], $file, $offset, $source, 'LessThanToken');
        $left_angle = $left_angle !== null ? $left_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_angle->getWidth();
        $members = Node::fromJSON($json['dictionary_type_members'], $file, $offset, $source, 'NodeList<ListItem<ITypeSpecifier>>');
        $members = $members !== null ? $members : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $members->getWidth();
        $right_angle = Node::fromJSON($json['dictionary_type_right_angle'], $file, $offset, $source, 'GreaterThanToken');
        $right_angle = $right_angle !== null ? $right_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_angle->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_angle, $members, $right_angle, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'members' => $this->_members, 'right_angle' => $this->_right_angle]);
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
        $left_angle = $rewriter($this->_left_angle, $parents);
        $members = $rewriter($this->_members, $parents);
        $right_angle = $rewriter($this->_right_angle, $parents);
        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $members === $this->_members && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($keyword, $left_angle, $members, $right_angle);
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
    public function withKeyword(DictToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_angle, $this->_members, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return DictToken
     */
    /**
     * @return DictToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(DictToken::class, $this->_keyword);
    }
    /**
     * @return DictToken
     */
    /**
     * @return DictToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getLeftAngleUNTYPED()
    {
        return $this->_left_angle;
    }
    /**
     * @return static
     */
    public function withLeftAngle(LessThanToken $value)
    {
        if ($value === $this->_left_angle) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_members, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasLeftAngle()
    {
        return $this->_left_angle !== null;
    }
    /**
     * @return LessThanToken
     */
    /**
     * @return LessThanToken
     */
    public function getLeftAngle()
    {
        return TypeAssert\instance_of(LessThanToken::class, $this->_left_angle);
    }
    /**
     * @return LessThanToken
     */
    /**
     * @return LessThanToken
     */
    public function getLeftAnglex()
    {
        return $this->getLeftAngle();
    }
    /**
     * @return null|Node
     */
    public function getMembersUNTYPED()
    {
        return $this->_members;
    }
    /**
     * @param NodeList<ListItem<ITypeSpecifier>> $value
     *
     * @return static
     */
    public function withMembers(NodeList $value)
    {
        if ($value === $this->_members) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasMembers()
    {
        return $this->_members !== null;
    }
    /**
     * @return NodeList<ListItem<ITypeSpecifier>> |
     * NodeList<ListItem<SimpleTypeSpecifier>>
     */
    /**
     * @return NodeList<ListItem<ITypeSpecifier>>
     */
    public function getMembers()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_members);
    }
    /**
     * @return NodeList<ListItem<ITypeSpecifier>> |
     * NodeList<ListItem<SimpleTypeSpecifier>>
     */
    /**
     * @return NodeList<ListItem<ITypeSpecifier>>
     */
    public function getMembersx()
    {
        return $this->getMembers();
    }
    /**
     * @return null|Node
     */
    public function getRightAngleUNTYPED()
    {
        return $this->_right_angle;
    }
    /**
     * @return static
     */
    public function withRightAngle(GreaterThanToken $value)
    {
        if ($value === $this->_right_angle) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $this->_members, $value);
    }
    /**
     * @return bool
     */
    public function hasRightAngle()
    {
        return $this->_right_angle !== null;
    }
    /**
     * @return GreaterThanToken
     */
    /**
     * @return GreaterThanToken
     */
    public function getRightAngle()
    {
        return TypeAssert\instance_of(GreaterThanToken::class, $this->_right_angle);
    }
    /**
     * @return GreaterThanToken
     */
    /**
     * @return GreaterThanToken
     */
    public function getRightAnglex()
    {
        return $this->getRightAngle();
    }
}

