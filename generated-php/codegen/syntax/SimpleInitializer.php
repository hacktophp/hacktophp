<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a30482e692ac25438c91717dac4691e3>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class SimpleInitializer extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'simple_initializer';
    /**
     * @var EqualToken
     */
    private $_equal;
    /**
     * @var IExpression
     */
    private $_value;
    public function __construct(EqualToken $equal, IExpression $value, ?__Private\SourceRef $source_ref = null)
    {
        $this->_equal = $equal;
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
        $equal = Node::fromJSON($json['simple_initializer_equal'], $file, $offset, $source, 'EqualToken');
        $equal = $equal !== null ? $equal : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $equal->getWidth();
        $value = Node::fromJSON($json['simple_initializer_value'], $file, $offset, $source, 'IExpression');
        $value = $value !== null ? $value : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $value->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($equal, $value, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['equal' => $this->_equal, 'value' => $this->_value]);
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
        $equal = $rewriter($this->_equal, $parents);
        $value = $rewriter($this->_value, $parents);
        if ($equal === $this->_equal && $value === $this->_value) {
            return $this;
        }
        return new static($equal, $value);
    }
    /**
     * @return null|Node
     */
    public function getEqualUNTYPED()
    {
        return $this->_equal;
    }
    /**
     * @return static
     */
    public function withEqual(EqualToken $value)
    {
        if ($value === $this->_equal) {
            return $this;
        }
        return new static($value, $this->_value);
    }
    /**
     * @return bool
     */
    public function hasEqual()
    {
        return $this->_equal !== null;
    }
    /**
     * @return EqualToken
     */
    /**
     * @return EqualToken
     */
    public function getEqual()
    {
        return TypeAssert\instance_of(EqualToken::class, $this->_equal);
    }
    /**
     * @return EqualToken
     */
    /**
     * @return EqualToken
     */
    public function getEqualx()
    {
        return $this->getEqual();
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
        return new static($this->_equal, $value);
    }
    /**
     * @return bool
     */
    public function hasValue()
    {
        return $this->_value !== null;
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * BinaryExpression | CollectionLiteralExpression | ConditionalExpression |
     * DarrayIntrinsicExpression | DictionaryIntrinsicExpression |
     * FunctionCallExpression | KeysetIntrinsicExpression | LambdaExpression |
     * LiteralExpression | ParenthesizedExpression | PrefixUnaryExpression |
     * QualifiedName | ScopeResolutionExpression | ShapeExpression | NameToken |
     * TupleExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression |
     * XHPExpression
     */
    /**
     * @return IExpression
     */
    public function getValue()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_value);
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * BinaryExpression | CollectionLiteralExpression | ConditionalExpression |
     * DarrayIntrinsicExpression | DictionaryIntrinsicExpression |
     * FunctionCallExpression | KeysetIntrinsicExpression | LambdaExpression |
     * LiteralExpression | ParenthesizedExpression | PrefixUnaryExpression |
     * QualifiedName | ScopeResolutionExpression | ShapeExpression | NameToken |
     * TupleExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression |
     * XHPExpression
     */
    /**
     * @return IExpression
     */
    public function getValuex()
    {
        return $this->getValue();
    }
}

