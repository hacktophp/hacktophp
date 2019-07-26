<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<dc6edba4755aafa2fa5069b8a84ddd0f>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TupleTypeExplicitSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'tuple_type_explicit_specifier';
    /**
     * @var Node
     */
    private $_keyword;
    /**
     * @var Node
     */
    private $_left_angle;
    /**
     * @var Node
     */
    private $_types;
    /**
     * @var Node
     */
    private $_right_angle;
    public function __construct(Node $keyword, Node $left_angle, Node $types, Node $right_angle, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_types = $types;
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
        $keyword = Node::fromJSON($json['tuple_type_keyword'], $file, $offset, $source, 'Node');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_angle = Node::fromJSON($json['tuple_type_left_angle'], $file, $offset, $source, 'Node');
        $left_angle = $left_angle !== null ? $left_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_angle->getWidth();
        $types = Node::fromJSON($json['tuple_type_types'], $file, $offset, $source, 'Node');
        $types = $types !== null ? $types : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $types->getWidth();
        $right_angle = Node::fromJSON($json['tuple_type_right_angle'], $file, $offset, $source, 'Node');
        $right_angle = $right_angle !== null ? $right_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_angle->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_angle, $types, $right_angle, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'types' => $this->_types, 'right_angle' => $this->_right_angle]);
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
        $types = $rewriter($this->_types, $parents);
        $right_angle = $rewriter($this->_right_angle, $parents);
        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $types === $this->_types && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($keyword, $left_angle, $types, $right_angle);
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
    public function withKeyword(Node $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_angle, $this->_types, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getKeyword()
    {
        return $this->_keyword;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
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
    public function withLeftAngle(Node $value)
    {
        if ($value === $this->_left_angle) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_types, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasLeftAngle()
    {
        return $this->_left_angle !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getLeftAngle()
    {
        return $this->_left_angle;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getLeftAnglex()
    {
        return $this->getLeftAngle();
    }
    /**
     * @return null|Node
     */
    public function getTypesUNTYPED()
    {
        return $this->_types;
    }
    /**
     * @return static
     */
    public function withTypes(Node $value)
    {
        if ($value === $this->_types) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasTypes()
    {
        return $this->_types !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getTypes()
    {
        return $this->_types;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getTypesx()
    {
        return $this->getTypes();
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
    public function withRightAngle(Node $value)
    {
        if ($value === $this->_right_angle) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $this->_types, $value);
    }
    /**
     * @return bool
     */
    public function hasRightAngle()
    {
        return $this->_right_angle !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getRightAngle()
    {
        return $this->_right_angle;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getRightAnglex()
    {
        return $this->getRightAngle();
    }
}

