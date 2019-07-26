<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1829381ea114088113b6474c9e23e8b7>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TypeParameters extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'type_parameters';
    /**
     * @var LessThanToken
     */
    private $_left_angle;
    /**
     * @var NodeList<ListItem<TypeParameter>>
     */
    private $_parameters;
    /**
     * @var GreaterThanToken
     */
    private $_right_angle;
    /**
     * @param NodeList<ListItem<TypeParameter>> $parameters
     */
    public function __construct(LessThanToken $left_angle, NodeList $parameters, GreaterThanToken $right_angle, ?__Private\SourceRef $source_ref = null)
    {
        $this->_left_angle = $left_angle;
        $this->_parameters = $parameters;
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
        $left_angle = Node::fromJSON($json['type_parameters_left_angle'], $file, $offset, $source, 'LessThanToken');
        $left_angle = $left_angle !== null ? $left_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_angle->getWidth();
        $parameters = Node::fromJSON($json['type_parameters_parameters'], $file, $offset, $source, 'NodeList<ListItem<TypeParameter>>');
        $parameters = $parameters !== null ? $parameters : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $parameters->getWidth();
        $right_angle = Node::fromJSON($json['type_parameters_right_angle'], $file, $offset, $source, 'GreaterThanToken');
        $right_angle = $right_angle !== null ? $right_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_angle->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_angle, $parameters, $right_angle, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_angle' => $this->_left_angle, 'parameters' => $this->_parameters, 'right_angle' => $this->_right_angle]);
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
        $parameters = $rewriter($this->_parameters, $parents);
        $right_angle = $rewriter($this->_right_angle, $parents);
        if ($left_angle === $this->_left_angle && $parameters === $this->_parameters && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($left_angle, $parameters, $right_angle);
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
        return new static($value, $this->_parameters, $this->_right_angle);
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
    public function getParametersUNTYPED()
    {
        return $this->_parameters;
    }
    /**
     * @param NodeList<ListItem<TypeParameter>> $value
     *
     * @return static
     */
    public function withParameters(NodeList $value)
    {
        if ($value === $this->_parameters) {
            return $this;
        }
        return new static($this->_left_angle, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasParameters()
    {
        return $this->_parameters !== null;
    }
    /**
     * @return NodeList<ListItem<TypeParameter>>
     */
    /**
     * @return NodeList<ListItem<TypeParameter>>
     */
    public function getParameters()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_parameters);
    }
    /**
     * @return NodeList<ListItem<TypeParameter>>
     */
    /**
     * @return NodeList<ListItem<TypeParameter>>
     */
    public function getParametersx()
    {
        return $this->getParameters();
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
        return new static($this->_left_angle, $this->_parameters, $value);
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

