<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0cb0490a13e72e3728f1dbaefb79cc16>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class VectorArrayTypeSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'vector_array_type_specifier';
    /**
     * @var ArrayToken
     */
    private $_keyword;
    /**
     * @var LessThanToken
     */
    private $_left_angle;
    /**
     * @var ITypeSpecifier
     */
    private $_type;
    /**
     * @var GreaterThanToken
     */
    private $_right_angle;
    public function __construct(ArrayToken $keyword, LessThanToken $left_angle, ITypeSpecifier $type, GreaterThanToken $right_angle, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_type = $type;
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
        $keyword = Node::fromJSON($json['vector_array_keyword'], $file, $offset, $source, 'ArrayToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_angle = Node::fromJSON($json['vector_array_left_angle'], $file, $offset, $source, 'LessThanToken');
        $left_angle = $left_angle !== null ? $left_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_angle->getWidth();
        $type = Node::fromJSON($json['vector_array_type'], $file, $offset, $source, 'ITypeSpecifier');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $right_angle = Node::fromJSON($json['vector_array_right_angle'], $file, $offset, $source, 'GreaterThanToken');
        $right_angle = $right_angle !== null ? $right_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_angle->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_angle, $type, $right_angle, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'type' => $this->_type, 'right_angle' => $this->_right_angle]);
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
        $type = $rewriter($this->_type, $parents);
        $right_angle = $rewriter($this->_right_angle, $parents);
        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $type === $this->_type && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($keyword, $left_angle, $type, $right_angle);
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
        return new static($value, $this->_left_angle, $this->_type, $this->_right_angle);
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
        return new static($this->_keyword, $value, $this->_type, $this->_right_angle);
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
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(ITypeSpecifier $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return DarrayTypeSpecifier | GenericTypeSpecifier | MapArrayTypeSpecifier
     * | NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier | VarrayTypeSpecifier | VectorArrayTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_type);
    }
    /**
     * @return DarrayTypeSpecifier | GenericTypeSpecifier | MapArrayTypeSpecifier
     * | NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier | VarrayTypeSpecifier | VectorArrayTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
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
        return new static($this->_keyword, $this->_left_angle, $this->_type, $value);
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

