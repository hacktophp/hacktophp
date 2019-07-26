<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d3232d58973572138bdebaf0eb5aa1b5>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPEnumType extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_enum_type';
    /**
     * @var null|Node
     */
    private $_optional;
    /**
     * @var EnumToken
     */
    private $_keyword;
    /**
     * @var LeftBraceToken
     */
    private $_left_brace;
    /**
     * @var NodeList<ListItem<LiteralExpression>>
     */
    private $_values;
    /**
     * @var RightBraceToken
     */
    private $_right_brace;
    /**
     * @param NodeList<ListItem<LiteralExpression>> $values
     */
    public function __construct(?Node $optional, EnumToken $keyword, LeftBraceToken $left_brace, NodeList $values, RightBraceToken $right_brace, ?__Private\SourceRef $source_ref = null)
    {
        $this->_optional = $optional;
        $this->_keyword = $keyword;
        $this->_left_brace = $left_brace;
        $this->_values = $values;
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
        $optional = Node::fromJSON($json['xhp_enum_optional'], $file, $offset, $source, 'Node');
        $offset += (($__tmp1__ = $optional) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $keyword = Node::fromJSON($json['xhp_enum_keyword'], $file, $offset, $source, 'EnumToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_brace = Node::fromJSON($json['xhp_enum_left_brace'], $file, $offset, $source, 'LeftBraceToken');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $values = Node::fromJSON($json['xhp_enum_values'], $file, $offset, $source, 'NodeList<ListItem<LiteralExpression>>');
        $values = $values !== null ? $values : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $values->getWidth();
        $right_brace = Node::fromJSON($json['xhp_enum_right_brace'], $file, $offset, $source, 'RightBraceToken');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($optional, $keyword, $left_brace, $values, $right_brace, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['optional' => $this->_optional, 'keyword' => $this->_keyword, 'left_brace' => $this->_left_brace, 'values' => $this->_values, 'right_brace' => $this->_right_brace]);
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
        $optional = $this->_optional === null ? null : $rewriter($this->_optional, $parents);
        $keyword = $rewriter($this->_keyword, $parents);
        $left_brace = $rewriter($this->_left_brace, $parents);
        $values = $rewriter($this->_values, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        if ($optional === $this->_optional && $keyword === $this->_keyword && $left_brace === $this->_left_brace && $values === $this->_values && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($optional, $keyword, $left_brace, $values, $right_brace);
    }
    /**
     * @return null|Node
     */
    public function getOptionalUNTYPED()
    {
        return $this->_optional;
    }
    /**
     * @return static
     */
    public function withOptional(?Node $value)
    {
        if ($value === $this->_optional) {
            return $this;
        }
        return new static($value, $this->_keyword, $this->_left_brace, $this->_values, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasOptional()
    {
        return $this->_optional !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
     */
    public function getOptional()
    {
        return $this->_optional;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getOptionalx()
    {
        return TypeAssert\not_null($this->getOptional());
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
    public function withKeyword(EnumToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($this->_optional, $value, $this->_left_brace, $this->_values, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return EnumToken
     */
    /**
     * @return EnumToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(EnumToken::class, $this->_keyword);
    }
    /**
     * @return EnumToken
     */
    /**
     * @return EnumToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
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
        return new static($this->_optional, $this->_keyword, $value, $this->_values, $this->_right_brace);
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
    public function getValuesUNTYPED()
    {
        return $this->_values;
    }
    /**
     * @param NodeList<ListItem<LiteralExpression>> $value
     *
     * @return static
     */
    public function withValues(NodeList $value)
    {
        if ($value === $this->_values) {
            return $this;
        }
        return new static($this->_optional, $this->_keyword, $this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasValues()
    {
        return $this->_values !== null;
    }
    /**
     * @return NodeList<ListItem<LiteralExpression>>
     */
    /**
     * @return NodeList<ListItem<LiteralExpression>>
     */
    public function getValues()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_values);
    }
    /**
     * @return NodeList<ListItem<LiteralExpression>>
     */
    /**
     * @return NodeList<ListItem<LiteralExpression>>
     */
    public function getValuesx()
    {
        return $this->getValues();
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
        return new static($this->_optional, $this->_keyword, $this->_left_brace, $this->_values, $value);
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

