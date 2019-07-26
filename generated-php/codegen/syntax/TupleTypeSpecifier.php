<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4d94fa72a352a5940133bd250ca4cd48>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TupleTypeSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'tuple_type_specifier';
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<ITypeSpecifier>>
     */
    private $_types;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @param NodeList<ListItem<ITypeSpecifier>> $types
     */
    public function __construct(LeftParenToken $left_paren, NodeList $types, RightParenToken $right_paren, ?array $source_ref = null)
    {
        $this->_left_paren = $left_paren;
        $this->_types = $types;
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
        $left_paren = Node::fromJSON($json['tuple_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $types = Node::fromJSON($json['tuple_types'], $file, $offset, $source, 'NodeList<ListItem<ITypeSpecifier>>');
        $types = $types !== null ? $types : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $types->getWidth();
        $right_paren = Node::fromJSON($json['tuple_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_paren, $types, $right_paren, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_paren' => $this->_left_paren, 'types' => $this->_types, 'right_paren' => $this->_right_paren]);
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
        $left_paren = $rewriter($this->_left_paren, $parents);
        $types = $rewriter($this->_types, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        if ($left_paren === $this->_left_paren && $types === $this->_types && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($left_paren, $types, $right_paren);
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
        return new static($value, $this->_types, $this->_right_paren);
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
    public function getTypesUNTYPED()
    {
        return $this->_types;
    }
    /**
     * @param NodeList<ListItem<ITypeSpecifier>> $value
     *
     * @return static
     */
    public function withTypes(NodeList $value)
    {
        if ($value === $this->_types) {
            return $this;
        }
        return new static($this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasTypes()
    {
        return $this->_types !== null;
    }
    /**
     * @return NodeList<ListItem<ITypeSpecifier>> |
     * NodeList<ListItem<GenericTypeSpecifier>> |
     * NodeList<ListItem<ISimpleCreationSpecifier>> |
     * NodeList<ListItem<SimpleTypeSpecifier>> |
     * NodeList<ListItem<TupleTypeSpecifier>> |
     * NodeList<ListItem<VectorArrayTypeSpecifier>> |
     * NodeList<ListItem<VectorTypeSpecifier>>
     */
    /**
     * @return NodeList<ListItem<ITypeSpecifier>>
     */
    public function getTypes()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_types);
    }
    /**
     * @return NodeList<ListItem<ITypeSpecifier>> |
     * NodeList<ListItem<GenericTypeSpecifier>> |
     * NodeList<ListItem<ISimpleCreationSpecifier>> |
     * NodeList<ListItem<SimpleTypeSpecifier>> |
     * NodeList<ListItem<TupleTypeSpecifier>> |
     * NodeList<ListItem<VectorArrayTypeSpecifier>> |
     * NodeList<ListItem<VectorTypeSpecifier>>
     */
    /**
     * @return NodeList<ListItem<ITypeSpecifier>>
     */
    public function getTypesx()
    {
        return $this->getTypes();
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
        return new static($this->_left_paren, $this->_types, $value);
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

