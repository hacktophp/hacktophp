<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<cf6b7f9ba85379334c291c90f1bfdb6e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class MapArrayTypeSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'map_array_type_specifier';
    /**
     * @var ArrayToken
     */
    private $_keyword;
    /**
     * @var LessThanToken
     */
    private $_left_angle;
    /**
     * @var SimpleTypeSpecifier
     */
    private $_key;
    /**
     * @var CommaToken
     */
    private $_comma;
    /**
     * @var null|ITypeSpecifier
     */
    private $_value;
    /**
     * @var GreaterThanToken
     */
    private $_right_angle;
    public function __construct(ArrayToken $keyword, LessThanToken $left_angle, SimpleTypeSpecifier $key, CommaToken $comma, ?ITypeSpecifier $value, GreaterThanToken $right_angle, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_key = $key;
        $this->_comma = $comma;
        $this->_value = $value;
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
        $keyword = Node::fromJSON($json['map_array_keyword'], $file, $offset, $source, 'ArrayToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_angle = Node::fromJSON($json['map_array_left_angle'], $file, $offset, $source, 'LessThanToken');
        $left_angle = $left_angle !== null ? $left_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_angle->getWidth();
        $key = Node::fromJSON($json['map_array_key'], $file, $offset, $source, 'SimpleTypeSpecifier');
        $key = $key !== null ? $key : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $key->getWidth();
        $comma = Node::fromJSON($json['map_array_comma'], $file, $offset, $source, 'CommaToken');
        $comma = $comma !== null ? $comma : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $comma->getWidth();
        $value = Node::fromJSON($json['map_array_value'], $file, $offset, $source, 'ITypeSpecifier');
        $offset += (($__tmp1__ = $value) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_angle = Node::fromJSON($json['map_array_right_angle'], $file, $offset, $source, 'GreaterThanToken');
        $right_angle = $right_angle !== null ? $right_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_angle->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_angle, $key, $comma, $value, $right_angle, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'key' => $this->_key, 'comma' => $this->_comma, 'value' => $this->_value, 'right_angle' => $this->_right_angle]);
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
        $key = $rewriter($this->_key, $parents);
        $comma = $rewriter($this->_comma, $parents);
        $value = $this->_value === null ? null : $rewriter($this->_value, $parents);
        $right_angle = $rewriter($this->_right_angle, $parents);
        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $key === $this->_key && $comma === $this->_comma && $value === $this->_value && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($keyword, $left_angle, $key, $comma, $value, $right_angle);
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
    public function withKeyword(ArrayToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_angle, $this->_key, $this->_comma, $this->_value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return ArrayToken
     */
    /**
     * @return ArrayToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ArrayToken::class, $this->_keyword);
    }
    /**
     * @return ArrayToken
     */
    /**
     * @return ArrayToken
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
        return new static($this->_keyword, $value, $this->_key, $this->_comma, $this->_value, $this->_right_angle);
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
    public function getKeyUNTYPED()
    {
        return $this->_key;
    }
    /**
     * @return static
     */
    public function withKey(SimpleTypeSpecifier $value)
    {
        if ($value === $this->_key) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $value, $this->_comma, $this->_value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasKey()
    {
        return $this->_key !== null;
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getKey()
    {
        return TypeAssert\instance_of(SimpleTypeSpecifier::class, $this->_key);
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getKeyx()
    {
        return $this->getKey();
    }
    /**
     * @return null|Node
     */
    public function getCommaUNTYPED()
    {
        return $this->_comma;
    }
    /**
     * @return static
     */
    public function withComma(CommaToken $value)
    {
        if ($value === $this->_comma) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $this->_key, $value, $this->_value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasComma()
    {
        return $this->_comma !== null;
    }
    /**
     * @return CommaToken
     */
    /**
     * @return CommaToken
     */
    public function getComma()
    {
        return TypeAssert\instance_of(CommaToken::class, $this->_comma);
    }
    /**
     * @return CommaToken
     */
    /**
     * @return CommaToken
     */
    public function getCommax()
    {
        return $this->getComma();
    }
    /**
     * @return null|Node
     */
    public function getValueUNTYPED()
    {
        return $this->_value;
    }
    /**
     * @return static
     */
    public function withValue(?ITypeSpecifier $value)
    {
        if ($value === $this->_value) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $this->_key, $this->_comma, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasValue()
    {
        return $this->_value !== null;
    }
    /**
     * @return GenericTypeSpecifier | null | NullableTypeSpecifier |
     * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier
     */
    /**
     * @return null|ITypeSpecifier
     */
    public function getValue()
    {
        return $this->_value;
    }
    /**
     * @return GenericTypeSpecifier | NullableTypeSpecifier | ShapeTypeSpecifier
     * | SimpleTypeSpecifier | SoftTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getValuex()
    {
        return TypeAssert\not_null($this->getValue());
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
        return new static($this->_keyword, $this->_left_angle, $this->_key, $this->_comma, $this->_value, $value);
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

