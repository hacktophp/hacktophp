<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<883e1e11a4eeb3c4ecbd6c009c05a893>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class FileAttributeSpecification extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'file_attribute_specification';
    /**
     * @var LessThanLessThanToken
     */
    private $_left_double_angle;
    /**
     * @var FileToken
     */
    private $_keyword;
    /**
     * @var ColonToken
     */
    private $_colon;
    /**
     * @var NodeList<ListItem<ConstructorCall>>
     */
    private $_attributes;
    /**
     * @var GreaterThanGreaterThanToken
     */
    private $_right_double_angle;
    /**
     * @param NodeList<ListItem<ConstructorCall>> $attributes
     */
    public function __construct(LessThanLessThanToken $left_double_angle, FileToken $keyword, ColonToken $colon, NodeList $attributes, GreaterThanGreaterThanToken $right_double_angle, ?array $source_ref = null)
    {
        $this->_left_double_angle = $left_double_angle;
        $this->_keyword = $keyword;
        $this->_colon = $colon;
        $this->_attributes = $attributes;
        $this->_right_double_angle = $right_double_angle;
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
        $left_double_angle = Node::fromJSON($json['file_attribute_specification_left_double_angle'], $file, $offset, $source, 'LessThanLessThanToken');
        $left_double_angle = $left_double_angle !== null ? $left_double_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_double_angle->getWidth();
        $keyword = Node::fromJSON($json['file_attribute_specification_keyword'], $file, $offset, $source, 'FileToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $colon = Node::fromJSON($json['file_attribute_specification_colon'], $file, $offset, $source, 'ColonToken');
        $colon = $colon !== null ? $colon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $colon->getWidth();
        $attributes = Node::fromJSON($json['file_attribute_specification_attributes'], $file, $offset, $source, 'NodeList<ListItem<ConstructorCall>>');
        $attributes = $attributes !== null ? $attributes : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $attributes->getWidth();
        $right_double_angle = Node::fromJSON($json['file_attribute_specification_right_double_angle'], $file, $offset, $source, 'GreaterThanGreaterThanToken');
        $right_double_angle = $right_double_angle !== null ? $right_double_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_double_angle->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_double_angle, $keyword, $colon, $attributes, $right_double_angle, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_double_angle' => $this->_left_double_angle, 'keyword' => $this->_keyword, 'colon' => $this->_colon, 'attributes' => $this->_attributes, 'right_double_angle' => $this->_right_double_angle]);
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
        $left_double_angle = $rewriter($this->_left_double_angle, $parents);
        $keyword = $rewriter($this->_keyword, $parents);
        $colon = $rewriter($this->_colon, $parents);
        $attributes = $rewriter($this->_attributes, $parents);
        $right_double_angle = $rewriter($this->_right_double_angle, $parents);
        if ($left_double_angle === $this->_left_double_angle && $keyword === $this->_keyword && $colon === $this->_colon && $attributes === $this->_attributes && $right_double_angle === $this->_right_double_angle) {
            return $this;
        }
        return new static($left_double_angle, $keyword, $colon, $attributes, $right_double_angle);
    }
    /**
     * @return null|Node
     */
    public function getLeftDoubleAngleUNTYPED()
    {
        return $this->_left_double_angle;
    }
    /**
     * @return static
     */
    public function withLeftDoubleAngle(LessThanLessThanToken $value)
    {
        if ($value === $this->_left_double_angle) {
            return $this;
        }
        return new static($value, $this->_keyword, $this->_colon, $this->_attributes, $this->_right_double_angle);
    }
    /**
     * @return bool
     */
    public function hasLeftDoubleAngle()
    {
        return $this->_left_double_angle !== null;
    }
    /**
     * @return LessThanLessThanToken
     */
    /**
     * @return LessThanLessThanToken
     */
    public function getLeftDoubleAngle()
    {
        return TypeAssert\instance_of(LessThanLessThanToken::class, $this->_left_double_angle);
    }
    /**
     * @return LessThanLessThanToken
     */
    /**
     * @return LessThanLessThanToken
     */
    public function getLeftDoubleAnglex()
    {
        return $this->getLeftDoubleAngle();
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
    public function withKeyword(FileToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($this->_left_double_angle, $value, $this->_colon, $this->_attributes, $this->_right_double_angle);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return FileToken
     */
    /**
     * @return FileToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(FileToken::class, $this->_keyword);
    }
    /**
     * @return FileToken
     */
    /**
     * @return FileToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(ColonToken $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_left_double_angle, $this->_keyword, $value, $this->_attributes, $this->_right_double_angle);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return $this->_colon !== null;
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColon()
    {
        return TypeAssert\instance_of(ColonToken::class, $this->_colon);
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColonx()
    {
        return $this->getColon();
    }
    /**
     * @return null|Node
     */
    public function getAttributesUNTYPED()
    {
        return $this->_attributes;
    }
    /**
     * @param NodeList<ListItem<ConstructorCall>> $value
     *
     * @return static
     */
    public function withAttributes(NodeList $value)
    {
        if ($value === $this->_attributes) {
            return $this;
        }
        return new static($this->_left_double_angle, $this->_keyword, $this->_colon, $value, $this->_right_double_angle);
    }
    /**
     * @return bool
     */
    public function hasAttributes()
    {
        return $this->_attributes !== null;
    }
    /**
     * @return NodeList<ListItem<ConstructorCall>>
     */
    /**
     * @return NodeList<ListItem<ConstructorCall>>
     */
    public function getAttributes()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_attributes);
    }
    /**
     * @return NodeList<ListItem<ConstructorCall>>
     */
    /**
     * @return NodeList<ListItem<ConstructorCall>>
     */
    public function getAttributesx()
    {
        return $this->getAttributes();
    }
    /**
     * @return null|Node
     */
    public function getRightDoubleAngleUNTYPED()
    {
        return $this->_right_double_angle;
    }
    /**
     * @return static
     */
    public function withRightDoubleAngle(GreaterThanGreaterThanToken $value)
    {
        if ($value === $this->_right_double_angle) {
            return $this;
        }
        return new static($this->_left_double_angle, $this->_keyword, $this->_colon, $this->_attributes, $value);
    }
    /**
     * @return bool
     */
    public function hasRightDoubleAngle()
    {
        return $this->_right_double_angle !== null;
    }
    /**
     * @return GreaterThanGreaterThanToken
     */
    /**
     * @return GreaterThanGreaterThanToken
     */
    public function getRightDoubleAngle()
    {
        return TypeAssert\instance_of(GreaterThanGreaterThanToken::class, $this->_right_double_angle);
    }
    /**
     * @return GreaterThanGreaterThanToken
     */
    /**
     * @return GreaterThanGreaterThanToken
     */
    public function getRightDoubleAnglex()
    {
        return $this->getRightDoubleAngle();
    }
}

