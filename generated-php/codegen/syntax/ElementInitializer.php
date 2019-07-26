<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<94ef02e78c959c5ba25c8098df476c63>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ElementInitializer extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'element_initializer';
    /**
     * @var IExpression
     */
    private $_key;
    /**
     * @var EqualGreaterThanToken
     */
    private $_arrow;
    /**
     * @var IExpression
     */
    private $_value;
    public function __construct(IExpression $key, EqualGreaterThanToken $arrow, IExpression $value, ?array $source_ref = null)
    {
        $this->_key = $key;
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
        $key = Node::fromJSON($json['element_key'], $file, $offset, $source, 'IExpression');
        $key = $key !== null ? $key : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $key->getWidth();
        $arrow = Node::fromJSON($json['element_arrow'], $file, $offset, $source, 'EqualGreaterThanToken');
        $arrow = $arrow !== null ? $arrow : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $arrow->getWidth();
        $value = Node::fromJSON($json['element_value'], $file, $offset, $source, 'IExpression');
        $value = $value !== null ? $value : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $value->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($key, $arrow, $value, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['key' => $this->_key, 'arrow' => $this->_arrow, 'value' => $this->_value]);
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
        $key = $rewriter($this->_key, $parents);
        $arrow = $rewriter($this->_arrow, $parents);
        $value = $rewriter($this->_value, $parents);
        if ($key === $this->_key && $arrow === $this->_arrow && $value === $this->_value) {
            return $this;
        }
        return new static($key, $arrow, $value);
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
    public function withKey(IExpression $value)
    {
        if ($value === $this->_key) {
            return $this;
        }
        return new static($value, $this->_arrow, $this->_value);
    }
    /**
     * @return bool
     */
    public function hasKey()
    {
        return $this->_key !== null;
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
     * FunctionCallExpression | LiteralExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression | QualifiedName |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getKey()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_key);
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
     * FunctionCallExpression | LiteralExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression | QualifiedName |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getKeyx()
    {
        return $this->getKey();
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
        return new static($this->_key, $value, $this->_value);
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
        return new static($this->_key, $this->_arrow, $value);
    }
    /**
     * @return bool
     */
    public function hasValue()
    {
        return $this->_value !== null;
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | AwaitableCreationExpression | BinaryExpression
     * | CastExpression | CollectionLiteralExpression | ConditionalExpression |
     * DarrayIntrinsicExpression | DictionaryIntrinsicExpression |
     * FunctionCallExpression | IssetExpression | KeysetIntrinsicExpression |
     * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression | QualifiedName |
     * ScopeResolutionExpression | ShapeExpression | SubscriptExpression |
     * NameToken | TupleExpression | VariableExpression |
     * VarrayIntrinsicExpression | VectorIntrinsicExpression
     */
    /**
     * @return IExpression
     */
    public function getValue()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_value);
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | AwaitableCreationExpression | BinaryExpression
     * | CastExpression | CollectionLiteralExpression | ConditionalExpression |
     * DarrayIntrinsicExpression | DictionaryIntrinsicExpression |
     * FunctionCallExpression | IssetExpression | KeysetIntrinsicExpression |
     * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression | QualifiedName |
     * ScopeResolutionExpression | ShapeExpression | SubscriptExpression |
     * NameToken | TupleExpression | VariableExpression |
     * VarrayIntrinsicExpression | VectorIntrinsicExpression
     */
    /**
     * @return IExpression
     */
    public function getValuex()
    {
        return $this->getValue();
    }
}

