<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<da380a3559a97a464f979b5ce730d953>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class TypeConstant extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'type_constant';
    /**
     * @var ITypeSpecifier
     */
    private $_left_type;
    /**
     * @var ColonColonToken
     */
    private $_separator;
    /**
     * @var NameToken
     */
    private $_right_type;
    public function __construct(ITypeSpecifier $left_type, ColonColonToken $separator, NameToken $right_type, ?array $source_ref = null)
    {
        $this->_left_type = $left_type;
        $this->_separator = $separator;
        $this->_right_type = $right_type;
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
        $left_type = Node::fromJSON($json['type_constant_left_type'], $file, $offset, $source, 'ITypeSpecifier');
        $left_type = $left_type !== null ? $left_type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_type->getWidth();
        $separator = Node::fromJSON($json['type_constant_separator'], $file, $offset, $source, 'ColonColonToken');
        $separator = $separator !== null ? $separator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $separator->getWidth();
        $right_type = Node::fromJSON($json['type_constant_right_type'], $file, $offset, $source, 'NameToken');
        $right_type = $right_type !== null ? $right_type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_type->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_type, $separator, $right_type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_type' => $this->_left_type, 'separator' => $this->_separator, 'right_type' => $this->_right_type]);
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
        $left_type = $rewriter($this->_left_type, $parents);
        $separator = $rewriter($this->_separator, $parents);
        $right_type = $rewriter($this->_right_type, $parents);
        if ($left_type === $this->_left_type && $separator === $this->_separator && $right_type === $this->_right_type) {
            return $this;
        }
        return new static($left_type, $separator, $right_type);
    }
    /**
     * @return null|Node
     */
    public function getLeftTypeUNTYPED()
    {
        return $this->_left_type;
    }
    /**
     * @return static
     */
    public function withLeftType(ITypeSpecifier $value)
    {
        if ($value === $this->_left_type) {
            return $this;
        }
        return new static($value, $this->_separator, $this->_right_type);
    }
    /**
     * @return bool
     */
    public function hasLeftType()
    {
        return $this->_left_type !== null;
    }
    /**
     * @return NameToken | ParentToken | SelfToken | ThisToken | TypeConstant
     */
    /**
     * @return ITypeSpecifier
     */
    public function getLeftType()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_left_type);
    }
    /**
     * @return NameToken | ParentToken | SelfToken | ThisToken | TypeConstant
     */
    /**
     * @return ITypeSpecifier
     */
    public function getLeftTypex()
    {
        return $this->getLeftType();
    }
    /**
     * @return null|Node
     */
    public function getSeparatorUNTYPED()
    {
        return $this->_separator;
    }
    /**
     * @return static
     */
    public function withSeparator(ColonColonToken $value)
    {
        if ($value === $this->_separator) {
            return $this;
        }
        return new static($this->_left_type, $value, $this->_right_type);
    }
    /**
     * @return bool
     */
    public function hasSeparator()
    {
        return $this->_separator !== null;
    }
    /**
     * @return ColonColonToken
     */
    /**
     * @return ColonColonToken
     */
    public function getSeparator()
    {
        return TypeAssert\instance_of(ColonColonToken::class, $this->_separator);
    }
    /**
     * @return ColonColonToken
     */
    /**
     * @return ColonColonToken
     */
    public function getSeparatorx()
    {
        return $this->getSeparator();
    }
    /**
     * @return null|Node
     */
    public function getRightTypeUNTYPED()
    {
        return $this->_right_type;
    }
    /**
     * @return static
     */
    public function withRightType(NameToken $value)
    {
        if ($value === $this->_right_type) {
            return $this;
        }
        return new static($this->_left_type, $this->_separator, $value);
    }
    /**
     * @return bool
     */
    public function hasRightType()
    {
        return $this->_right_type !== null;
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getRightType()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_right_type);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getRightTypex()
    {
        return $this->getRightType();
    }
}

