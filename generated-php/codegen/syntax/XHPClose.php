<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<be7c21cc10293ab2c02a21e280046c54>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPClose extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_close';
    /**
     * @var LessThanSlashToken
     */
    private $_left_angle;
    /**
     * @var XHPElementNameToken
     */
    private $_name;
    /**
     * @var GreaterThanToken
     */
    private $_right_angle;
    public function __construct(LessThanSlashToken $left_angle, XHPElementNameToken $name, GreaterThanToken $right_angle, ?__Private\SourceRef $source_ref = null)
    {
        $this->_left_angle = $left_angle;
        $this->_name = $name;
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
        $left_angle = Node::fromJSON($json['xhp_close_left_angle'], $file, $offset, $source, 'LessThanSlashToken');
        $left_angle = $left_angle !== null ? $left_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_angle->getWidth();
        $name = Node::fromJSON($json['xhp_close_name'], $file, $offset, $source, 'XHPElementNameToken');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $right_angle = Node::fromJSON($json['xhp_close_right_angle'], $file, $offset, $source, 'GreaterThanToken');
        $right_angle = $right_angle !== null ? $right_angle : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_angle->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_angle, $name, $right_angle, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_angle' => $this->_left_angle, 'name' => $this->_name, 'right_angle' => $this->_right_angle]);
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
        $right_angle = $rewriter($this->_right_angle, $parents);
        if ($left_angle === $this->_left_angle && $name === $this->_name && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($left_angle, $name, $right_angle);
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
    public function withLeftAngle(LessThanSlashToken $value)
    {
        if ($value === $this->_left_angle) {
            return $this;
        }
        return new static($value, $this->_name, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasLeftAngle()
    {
        return $this->_left_angle !== null;
    }
    /**
     * @return LessThanSlashToken
     */
    /**
     * @return LessThanSlashToken
     */
    public function getLeftAngle()
    {
        return TypeAssert\instance_of(LessThanSlashToken::class, $this->_left_angle);
    }
    /**
     * @return LessThanSlashToken
     */
    /**
     * @return LessThanSlashToken
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
        return new static($this->_left_angle, $value, $this->_right_angle);
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
        return new static($this->_left_angle, $this->_name, $value);
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

