<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6ffb27af92b6e0d366ae248d24cf2010>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ShapeTypeSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'shape_type_specifier';
    /**
     * @var ShapeToken
     */
    private $_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<FieldSpecifier>>|null
     */
    private $_fields;
    /**
     * @var null|DotDotDotToken
     */
    private $_ellipsis;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @param NodeList<ListItem<FieldSpecifier>>|null $fields
     */
    public function __construct(ShapeToken $keyword, LeftParenToken $left_paren, ?NodeList $fields, ?DotDotDotToken $ellipsis, RightParenToken $right_paren, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_fields = $fields;
        $this->_ellipsis = $ellipsis;
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
        $keyword = Node::fromJSON($json['shape_type_keyword'], $file, $offset, $source, 'ShapeToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['shape_type_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $fields = Node::fromJSON($json['shape_type_fields'], $file, $offset, $source, 'NodeList<ListItem<FieldSpecifier>>');
        $offset += (($__tmp1__ = $fields) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $ellipsis = Node::fromJSON($json['shape_type_ellipsis'], $file, $offset, $source, 'DotDotDotToken');
        $offset += (($__tmp2__ = $ellipsis) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $right_paren = Node::fromJSON($json['shape_type_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $fields, $ellipsis, $right_paren, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'fields' => $this->_fields, 'ellipsis' => $this->_ellipsis, 'right_paren' => $this->_right_paren]);
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
        $fields = $this->_fields === null ? null : $rewriter($this->_fields, $parents);
        $ellipsis = $this->_ellipsis === null ? null : $rewriter($this->_ellipsis, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $fields === $this->_fields && $ellipsis === $this->_ellipsis && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($keyword, $left_paren, $fields, $ellipsis, $right_paren);
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
    public function withKeyword(ShapeToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_fields, $this->_ellipsis, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return ShapeToken
     */
    /**
     * @return ShapeToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ShapeToken::class, $this->_keyword);
    }
    /**
     * @return ShapeToken
     */
    /**
     * @return ShapeToken
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
        return new static($this->_keyword, $value, $this->_fields, $this->_ellipsis, $this->_right_paren);
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
    public function getFieldsUNTYPED()
    {
        return $this->_fields;
    }
    /**
     * @param NodeList<ListItem<FieldSpecifier>>|null $value
     *
     * @return static
     */
    public function withFields(?NodeList $value)
    {
        if ($value === $this->_fields) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_ellipsis, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasFields()
    {
        return $this->_fields !== null;
    }
    /**
     * @return NodeList<ListItem<FieldSpecifier>> | null
     */
    /**
     * @return NodeList<ListItem<FieldSpecifier>>|null
     */
    public function getFields()
    {
        return $this->_fields;
    }
    /**
     * @return NodeList<ListItem<FieldSpecifier>>
     */
    /**
     * @return NodeList<ListItem<FieldSpecifier>>
     */
    public function getFieldsx()
    {
        return TypeAssert\not_null($this->getFields());
    }
    /**
     * @return null|Node
     */
    public function getEllipsisUNTYPED()
    {
        return $this->_ellipsis;
    }
    /**
     * @return static
     */
    public function withEllipsis(?DotDotDotToken $value)
    {
        if ($value === $this->_ellipsis) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_fields, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasEllipsis()
    {
        return $this->_ellipsis !== null;
    }
    /**
     * @return null | DotDotDotToken
     */
    /**
     * @return null|DotDotDotToken
     */
    public function getEllipsis()
    {
        return $this->_ellipsis;
    }
    /**
     * @return DotDotDotToken
     */
    /**
     * @return DotDotDotToken
     */
    public function getEllipsisx()
    {
        return TypeAssert\not_null($this->getEllipsis());
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
        return new static($this->_keyword, $this->_left_paren, $this->_fields, $this->_ellipsis, $value);
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

