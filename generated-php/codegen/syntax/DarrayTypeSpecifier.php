<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5ed3cb2020598fd22ed851e29c94f885>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class DarrayTypeSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'darray_type_specifier';
    /**
     * @var DarrayToken
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
     * @var ITypeSpecifier
     */
    private $_value;
    /**
     * @var null|Node
     */
    private $_trailing_comma;
    /**
     * @var GreaterThanToken
     */
    private $_right_angle;
    public function __construct(DarrayToken $keyword, LessThanToken $left_angle, SimpleTypeSpecifier $key, CommaToken $comma, ITypeSpecifier $value, ?Node $trailing_comma, GreaterThanToken $right_angle, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_key = $key;
        $this->_comma = $comma;
        $this->_value = $value;
        $this->_trailing_comma = $trailing_comma;
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
        $keyword = Node::fromJSON($json['darray_keyword'], $file, $offset, $source, 'DarrayToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_angle = Node::fromJSON($json['darray_left_angle'], $file, $offset, $source, 'LessThanToken');
        $left_angle = $left_angle !== null ? $left_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_angle->getWidth();
        $key = Node::fromJSON($json['darray_key'], $file, $offset, $source, 'SimpleTypeSpecifier');
        $key = $key !== null ? $key : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $key->getWidth();
        $comma = Node::fromJSON($json['darray_comma'], $file, $offset, $source, 'CommaToken');
        $comma = $comma !== null ? $comma : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $comma->getWidth();
        $value = Node::fromJSON($json['darray_value'], $file, $offset, $source, 'ITypeSpecifier');
        $value = $value !== null ? $value : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $value->getWidth();
        $trailing_comma = Node::fromJSON($json['darray_trailing_comma'], $file, $offset, $source, 'Node');
        $offset += (($__tmp1__ = $trailing_comma) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_angle = Node::fromJSON($json['darray_right_angle'], $file, $offset, $source, 'GreaterThanToken');
        $right_angle = $right_angle !== null ? $right_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_angle->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_angle, $key, $comma, $value, $trailing_comma, $right_angle, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'key' => $this->_key, 'comma' => $this->_comma, 'value' => $this->_value, 'trailing_comma' => $this->_trailing_comma, 'right_angle' => $this->_right_angle]);
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
        $value = $rewriter($this->_value, $parents);
        $trailing_comma = $this->_trailing_comma === null ? null : $rewriter($this->_trailing_comma, $parents);
        $right_angle = $rewriter($this->_right_angle, $parents);
        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $key === $this->_key && $comma === $this->_comma && $value === $this->_value && $trailing_comma === $this->_trailing_comma && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($keyword, $left_angle, $key, $comma, $value, $trailing_comma, $right_angle);
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
    public function withKeyword(DarrayToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_angle, $this->_key, $this->_comma, $this->_value, $this->_trailing_comma, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return DarrayToken
     */
    /**
     * @return DarrayToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(DarrayToken::class, $this->_keyword);
    }
    /**
     * @return DarrayToken
     */
    /**
     * @return DarrayToken
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
        return new static($this->_keyword, $value, $this->_key, $this->_comma, $this->_value, $this->_trailing_comma, $this->_right_angle);
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
        return new static($this->_keyword, $this->_left_angle, $value, $this->_comma, $this->_value, $this->_trailing_comma, $this->_right_angle);
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
        return new static($this->_keyword, $this->_left_angle, $this->_key, $value, $this->_value, $this->_trailing_comma, $this->_right_angle);
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
    public function withValue(ITypeSpecifier $value)
    {
        if ($value === $this->_value) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $this->_key, $this->_comma, $value, $this->_trailing_comma, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasValue()
    {
        return $this->_value !== null;
    }
    /**
     * @return DarrayTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier
     * | VarrayTypeSpecifier | VectorArrayTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getValue()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_value);
    }
    /**
     * @return DarrayTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier
     * | VarrayTypeSpecifier | VectorArrayTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getValuex()
    {
        return $this->getValue();
    }
    /**
     * @return null|Node
     */
    public function getTrailingCommaUNTYPED()
    {
        return $this->_trailing_comma;
    }
    /**
     * @return static
     */
    public function withTrailingComma(?Node $value)
    {
        if ($value === $this->_trailing_comma) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $this->_key, $this->_comma, $this->_value, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasTrailingComma()
    {
        return $this->_trailing_comma !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
     */
    public function getTrailingComma()
    {
        return $this->_trailing_comma;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getTrailingCommax()
    {
        return TypeAssert\not_null($this->getTrailingComma());
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
        return new static($this->_keyword, $this->_left_angle, $this->_key, $this->_comma, $this->_value, $this->_trailing_comma, $value);
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

