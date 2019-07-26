<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3b5c5c31ae1aa8d7bd77dd869fe1a1d4>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPOpen extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_open';
    /**
     * @var LessThanToken
     */
    private $_left_angle;
    /**
     * @var XHPElementNameToken
     */
    private $_name;
    /**
     * @var NodeList<Node>|null
     */
    private $_attributes;
    /**
     * @var Token
     */
    private $_right_angle;
    /**
     * @param NodeList<Node>|null $attributes
     */
    public function __construct(LessThanToken $left_angle, XHPElementNameToken $name, ?NodeList $attributes, Token $right_angle, ?__Private\SourceRef $source_ref = null)
    {
        $this->_left_angle = $left_angle;
        $this->_name = $name;
        $this->_attributes = $attributes;
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
        $left_angle = Node::fromJSON($json['xhp_open_left_angle'], $file, $offset, $source, 'LessThanToken');
        $left_angle = $left_angle !== null ? $left_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_angle->getWidth();
        $name = Node::fromJSON($json['xhp_open_name'], $file, $offset, $source, 'XHPElementNameToken');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $attributes = Node::fromJSON($json['xhp_open_attributes'], $file, $offset, $source, 'NodeList<Node>');
        $offset += (($__tmp1__ = $attributes) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_angle = Node::fromJSON($json['xhp_open_right_angle'], $file, $offset, $source, 'Token');
        $right_angle = $right_angle !== null ? $right_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_angle->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_angle, $name, $attributes, $right_angle, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_angle' => $this->_left_angle, 'name' => $this->_name, 'attributes' => $this->_attributes, 'right_angle' => $this->_right_angle]);
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
        $left_angle = $rewriter($this->_left_angle, $parents);
        $name = $rewriter($this->_name, $parents);
        $attributes = $this->_attributes === null ? null : $rewriter($this->_attributes, $parents);
        $right_angle = $rewriter($this->_right_angle, $parents);
        if ($left_angle === $this->_left_angle && $name === $this->_name && $attributes === $this->_attributes && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($left_angle, $name, $attributes, $right_angle);
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
        return new static($value, $this->_name, $this->_attributes, $this->_right_angle);
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
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(XHPElementNameToken $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_left_angle, $value, $this->_attributes, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return XHPElementNameToken
     */
    /**
     * @return XHPElementNameToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(XHPElementNameToken::class, $this->_name);
    }
    /**
     * @return XHPElementNameToken
     */
    /**
     * @return XHPElementNameToken
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return null|Node
     */
    public function getAttributesUNTYPED()
    {
        return $this->_attributes;
    }
    /**
     * @param NodeList<Node>|null $value
     *
     * @return static
     */
    public function withAttributes(?NodeList $value)
    {
        if ($value === $this->_attributes) {
            return $this;
        }
        return new static($this->_left_angle, $this->_name, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasAttributes()
    {
        return $this->_attributes !== null;
    }
    /**
     * @return NodeList<XHPSimpleAttribute> | NodeList<Node> |
     * NodeList<XHPSpreadAttribute> | null
     */
    /**
     * @return NodeList<Node>|null
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }
    /**
     * @return NodeList<XHPSimpleAttribute> | NodeList<Node> |
     * NodeList<XHPSpreadAttribute>
     */
    /**
     * @return NodeList<Node>
     */
    public function getAttributesx()
    {
        return TypeAssert\not_null($this->getAttributes());
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
    public function withRightAngle(Token $value)
    {
        if ($value === $this->_right_angle) {
            return $this;
        }
        return new static($this->_left_angle, $this->_name, $this->_attributes, $value);
    }
    /**
     * @return bool
     */
    public function hasRightAngle()
    {
        return $this->_right_angle !== null;
    }
    /**
     * @return SlashGreaterThanToken | GreaterThanToken
     */
    /**
     * @return Token
     */
    public function getRightAngle()
    {
        return TypeAssert\instance_of(Token::class, $this->_right_angle);
    }
    /**
     * @return SlashGreaterThanToken | GreaterThanToken
     */
    /**
     * @return Token
     */
    public function getRightAnglex()
    {
        return $this->getRightAngle();
    }
}

