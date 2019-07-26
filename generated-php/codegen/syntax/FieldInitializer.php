<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<564e8da5fd051884f976d56d8930e46e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class FieldInitializer extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'field_initializer';
    /**
     * @var IExpression
     */
    private $_name;
    /**
     * @var EqualGreaterThanToken
     */
    private $_arrow;
    /**
     * @var IExpression
     */
    private $_value;
    public function __construct(IExpression $name, EqualGreaterThanToken $arrow, IExpression $value, ?array $source_ref = null)
    {
        $this->_name = $name;
        $this->_arrow = $arrow;
        $this->_value = $value;
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
        $name = Node::fromJSON($json['field_initializer_name'], $file, $offset, $source, 'IExpression');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $arrow = Node::fromJSON($json['field_initializer_arrow'], $file, $offset, $source, 'EqualGreaterThanToken');
        $arrow = $arrow !== null ? $arrow : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $arrow->getWidth();
        $value = Node::fromJSON($json['field_initializer_value'], $file, $offset, $source, 'IExpression');
        $value = $value !== null ? $value : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $value->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($name, $arrow, $value, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['name' => $this->_name, 'arrow' => $this->_arrow, 'value' => $this->_value]);
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
        $name = $rewriter($this->_name, $parents);
        $arrow = $rewriter($this->_arrow, $parents);
        $value = $rewriter($this->_value, $parents);
        if ($name === $this->_name && $arrow === $this->_arrow && $value === $this->_value) {
            return $this;
        }
        return new static($name, $arrow, $value);
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
    public function withName(IExpression $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($value, $this->_arrow, $this->_value);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return LiteralExpression | ScopeResolutionExpression
     */
    /**
     * @return IExpression
     */
    public function getName()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_name);
    }
    /**
     * @return LiteralExpression | ScopeResolutionExpression
     */
    /**
     * @return IExpression
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return null|Node
     */
    public function getArrowUNTYPED()
    {
        return $this->_arrow;
    }
    /**
     * @return static
     */
    public function withArrow(EqualGreaterThanToken $value)
    {
        if ($value === $this->_arrow) {
            return $this;
        }
        return new static($this->_name, $value, $this->_value);
    }
    /**
     * @return bool
     */
    public function hasArrow()
    {
        return $this->_arrow !== null;
    }
    /**
     * @return EqualGreaterThanToken
     */
    /**
     * @return EqualGreaterThanToken
     */
    public function getArrow()
    {
        return TypeAssert\instance_of(EqualGreaterThanToken::class, $this->_arrow);
    }
    /**
     * @return EqualGreaterThanToken
     */
    /**
     * @return EqualGreaterThanToken
     */
    public function getArrowx()
    {
        return $this->getArrow();
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
    public function withValue(IExpression $value)
    {
        if ($value === $this->_value) {
            return $this;
        }
        return new static($this->_name, $this->_arrow, $value);
    }
    /**
     * @return bool
     */
    public function hasValue()
    {
        return $this->_value !== null;
    }
    /**
     * @return ArrayIntrinsicExpression | BinaryExpression |
     * DarrayIntrinsicExpression | LambdaExpression | LiteralExpression |
     * ObjectCreationExpression | ScopeResolutionExpression | SubscriptExpression
     * | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getValue()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_value);
    }
    /**
     * @return ArrayIntrinsicExpression | BinaryExpression |
     * DarrayIntrinsicExpression | LambdaExpression | LiteralExpression |
     * ObjectCreationExpression | ScopeResolutionExpression | SubscriptExpression
     * | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getValuex()
    {
        return $this->getValue();
    }
}

