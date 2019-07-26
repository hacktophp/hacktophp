<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<53f3c055afe65ba90126f4515b937b22>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ClassnameTypeSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'classname_type_specifier';
    /**
     * @var ClassnameToken
     */
    private $_keyword;
    /**
     * @var null|LessThanToken
     */
    private $_left_angle;
    /**
     * @var null|ITypeSpecifier
     */
    private $_type;
    /**
     * @var null|Node
     */
    private $_trailing_comma;
    /**
     * @var null|GreaterThanToken
     */
    private $_right_angle;
    public function __construct(ClassnameToken $keyword, ?LessThanToken $left_angle, ?ITypeSpecifier $type, ?Node $trailing_comma, ?GreaterThanToken $right_angle, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_type = $type;
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
        $keyword = Node::fromJSON($json['classname_keyword'], $file, $offset, $source, 'ClassnameToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_angle = Node::fromJSON($json['classname_left_angle'], $file, $offset, $source, 'LessThanToken');
        $offset += (($__tmp1__ = $left_angle) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $type = Node::fromJSON($json['classname_type'], $file, $offset, $source, 'ITypeSpecifier');
        $offset += (($__tmp2__ = $type) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $trailing_comma = Node::fromJSON($json['classname_trailing_comma'], $file, $offset, $source, 'Node');
        $offset += (($__tmp3__ = $trailing_comma) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $right_angle = Node::fromJSON($json['classname_right_angle'], $file, $offset, $source, 'GreaterThanToken');
        $offset += (($__tmp4__ = $right_angle) !== null ? $__tmp4__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_angle, $type, $trailing_comma, $right_angle, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'type' => $this->_type, 'trailing_comma' => $this->_trailing_comma, 'right_angle' => $this->_right_angle]);
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
        $left_angle = $this->_left_angle === null ? null : $rewriter($this->_left_angle, $parents);
        $type = $this->_type === null ? null : $rewriter($this->_type, $parents);
        $trailing_comma = $this->_trailing_comma === null ? null : $rewriter($this->_trailing_comma, $parents);
        $right_angle = $this->_right_angle === null ? null : $rewriter($this->_right_angle, $parents);
        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $type === $this->_type && $trailing_comma === $this->_trailing_comma && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($keyword, $left_angle, $type, $trailing_comma, $right_angle);
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
    public function withKeyword(ClassnameToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_angle, $this->_type, $this->_trailing_comma, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return ClassnameToken
     */
    /**
     * @return ClassnameToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ClassnameToken::class, $this->_keyword);
    }
    /**
     * @return ClassnameToken
     */
    /**
     * @return ClassnameToken
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
    public function withLeftAngle(?LessThanToken $value)
    {
        if ($value === $this->_left_angle) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_type, $this->_trailing_comma, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasLeftAngle()
    {
        return $this->_left_angle !== null;
    }
    /**
     * @return null | LessThanToken
     */
    /**
     * @return null|LessThanToken
     */
    public function getLeftAngle()
    {
        return $this->_left_angle;
    }
    /**
     * @return LessThanToken
     */
    /**
     * @return LessThanToken
     */
    public function getLeftAnglex()
    {
        return TypeAssert\not_null($this->getLeftAngle());
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
    public function withType(?ITypeSpecifier $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $value, $this->_trailing_comma, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return GenericTypeSpecifier | null | SimpleTypeSpecifier | TypeConstant
     */
    /**
     * @return null|ITypeSpecifier
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier | TypeConstant
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return TypeAssert\not_null($this->getType());
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
        return new static($this->_keyword, $this->_left_angle, $this->_type, $value, $this->_right_angle);
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
    public function withRightAngle(?GreaterThanToken $value)
    {
        if ($value === $this->_right_angle) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $this->_type, $this->_trailing_comma, $value);
    }
    /**
     * @return bool
     */
    public function hasRightAngle()
    {
        return $this->_right_angle !== null;
    }
    /**
     * @return null | GreaterThanToken
     */
    /**
     * @return null|GreaterThanToken
     */
    public function getRightAngle()
    {
        return $this->_right_angle;
    }
    /**
     * @return GreaterThanToken
     */
    /**
     * @return GreaterThanToken
     */
    public function getRightAnglex()
    {
        return TypeAssert\not_null($this->getRightAngle());
    }
}

