<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9fa0df754f5405b888c907226d3b831c>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TypeArguments extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'type_arguments';
    /**
     * @var LessThanToken
     */
    private $_left_angle;
    /**
     * @var NodeList<ListItem<ITypeSpecifier>>
     */
    private $_types;
    /**
     * @var GreaterThanToken
     */
    private $_right_angle;
    /**
     * @param NodeList<ListItem<ITypeSpecifier>> $types
     */
    public function __construct(LessThanToken $left_angle, NodeList $types, GreaterThanToken $right_angle, ?__Private\SourceRef $source_ref = null)
    {
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
        $left_angle = Node::fromJSON($json['type_arguments_left_angle'], $file, $offset, $source, 'LessThanToken');
        $left_angle = $left_angle !== null ? $left_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_angle->getWidth();
        $types = Node::fromJSON($json['type_arguments_types'], $file, $offset, $source, 'NodeList<ListItem<ITypeSpecifier>>');
        $types = $types !== null ? $types : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $types->getWidth();
        $right_angle = Node::fromJSON($json['type_arguments_right_angle'], $file, $offset, $source, 'GreaterThanToken');
        $right_angle = $right_angle !== null ? $right_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_angle->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_angle, $types, $right_angle, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_angle' => $this->_left_angle, 'types' => $this->_types, 'right_angle' => $this->_right_angle]);
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
        $types = $rewriter($this->_types, $parents);
        $right_angle = $rewriter($this->_right_angle, $parents);
        if ($left_angle === $this->_left_angle && $types === $this->_types && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($left_angle, $types, $right_angle);
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
        return new static($value, $this->_types, $this->_right_angle);
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
        return new static($this->_left_angle, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasTypes()
    {
        return $this->_types !== null;
    }
    /**
     * @return NodeList<ListItem<AttributizedSpecifier>> |
     * NodeList<ListItem<ClassnameTypeSpecifier>> |
     * NodeList<ListItem<ClosureTypeSpecifier>> |
     * NodeList<ListItem<DarrayTypeSpecifier>> |
     * NodeList<ListItem<ITypeSpecifier>> |
     * NodeList<ListItem<DictionaryTypeSpecifier>> |
     * NodeList<ListItem<GenericTypeSpecifier>> |
     * NodeList<ListItem<ISimpleCreationSpecifier>> |
     * NodeList<ListItem<KeysetTypeSpecifier>> |
     * NodeList<ListItem<LikeTypeSpecifier>> |
     * NodeList<ListItem<MapArrayTypeSpecifier>> |
     * NodeList<ListItem<NullableTypeSpecifier>> |
     * NodeList<ListItem<ShapeTypeSpecifier>> |
     * NodeList<ListItem<SimpleTypeSpecifier>> |
     * NodeList<ListItem<SoftTypeSpecifier>> |
     * NodeList<ListItem<TupleTypeSpecifier>> | NodeList<ListItem<TypeConstant>>
     * | NodeList<ListItem<VarrayTypeSpecifier>> |
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
     * @return NodeList<ListItem<AttributizedSpecifier>> |
     * NodeList<ListItem<ClassnameTypeSpecifier>> |
     * NodeList<ListItem<ClosureTypeSpecifier>> |
     * NodeList<ListItem<DarrayTypeSpecifier>> |
     * NodeList<ListItem<ITypeSpecifier>> |
     * NodeList<ListItem<DictionaryTypeSpecifier>> |
     * NodeList<ListItem<GenericTypeSpecifier>> |
     * NodeList<ListItem<ISimpleCreationSpecifier>> |
     * NodeList<ListItem<KeysetTypeSpecifier>> |
     * NodeList<ListItem<LikeTypeSpecifier>> |
     * NodeList<ListItem<MapArrayTypeSpecifier>> |
     * NodeList<ListItem<NullableTypeSpecifier>> |
     * NodeList<ListItem<ShapeTypeSpecifier>> |
     * NodeList<ListItem<SimpleTypeSpecifier>> |
     * NodeList<ListItem<SoftTypeSpecifier>> |
     * NodeList<ListItem<TupleTypeSpecifier>> | NodeList<ListItem<TypeConstant>>
     * | NodeList<ListItem<VarrayTypeSpecifier>> |
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
        return new static($this->_left_angle, $this->_types, $value);
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

