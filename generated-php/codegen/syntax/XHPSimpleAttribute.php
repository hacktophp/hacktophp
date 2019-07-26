<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<44f88d87e78cc9ec66a1dc2aa3053e3c>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPSimpleAttribute extends Node implements IXHPAttribute
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_simple_attribute';
    /**
     * @var XHPElementNameToken
     */
    private $_name;
    /**
     * @var EqualToken
     */
    private $_equal;
    /**
     * @var Node
     */
    private $_expression;
    public function __construct(XHPElementNameToken $name, EqualToken $equal, Node $expression, ?__Private\SourceRef $source_ref = null)
    {
        $this->_name = $name;
        $this->_equal = $equal;
        $this->_expression = $expression;
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
        $name = Node::fromJSON($json['xhp_simple_attribute_name'], $file, $offset, $source, 'XHPElementNameToken');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $equal = Node::fromJSON($json['xhp_simple_attribute_equal'], $file, $offset, $source, 'EqualToken');
        $equal = $equal !== null ? $equal : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $equal->getWidth();
        $expression = Node::fromJSON($json['xhp_simple_attribute_expression'], $file, $offset, $source, 'Node');
        $expression = $expression !== null ? $expression : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expression->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($name, $equal, $expression, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['name' => $this->_name, 'equal' => $this->_equal, 'expression' => $this->_expression]);
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
        $equal = $rewriter($this->_equal, $parents);
        $expression = $rewriter($this->_expression, $parents);
        if ($name === $this->_name && $equal === $this->_equal && $expression === $this->_expression) {
            return $this;
        }
        return new static($name, $equal, $expression);
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
        return new static($value, $this->_equal, $this->_expression);
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
        return new static($this->_name, $value, $this->_expression);
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
    public function getExpressionUNTYPED()
    {
        return $this->_expression;
    }
    /**
     * @return static
     */
    public function withExpression(Node $value)
    {
        if ($value === $this->_expression) {
            return $this;
        }
        return new static($this->_name, $this->_equal, $value);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return $this->_expression !== null;
    }
    /**
     * @return BracedExpression | XHPStringLiteralToken
     */
    /**
     * @return Node
     */
    public function getExpression()
    {
        return $this->_expression;
    }
    /**
     * @return BracedExpression | XHPStringLiteralToken
     */
    /**
     * @return Node
     */
    public function getExpressionx()
    {
        return $this->getExpression();
    }
}

