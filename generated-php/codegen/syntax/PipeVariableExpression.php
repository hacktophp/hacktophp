<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<fc84ad384da673c529cb2b6608313b7e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PipeVariableExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'pipe_variable_expression';
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
        $expression = Node::fromJSON($json['pipe_variable_expression'], $file, $offset, $source, 'Node');
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

