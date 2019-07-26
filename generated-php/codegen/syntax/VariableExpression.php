<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c9f2a2bd581cfa2384f231d0cd337783>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class VariableExpression extends Node implements ILambdaBody, ILambdaSignature, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'variable_expression';
    /**
     * @var Node
     */
    private $_expression;
    public function __construct(Node $expression, ?__Private\SourceRef $source_ref = null)
    {
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
        $expression = Node::fromJSON($json['variable_expression'], $file, $offset, $source, 'Node');
        $expression = $expression !== null ? $expression : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expression->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($expression, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['expression' => $this->_expression]);
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
        $expression = $rewriter($this->_expression, $parents);
        if ($expression === $this->_expression) {
            return $this;
        }
        return new static($expression);
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
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return $this->_expression !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getExpression()
    {
        return $this->_expression;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getExpressionx()
    {
        return $this->getExpression();
    }
}

