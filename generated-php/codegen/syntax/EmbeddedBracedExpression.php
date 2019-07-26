<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<24ce63d134866c05f283218dff54d486>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class EmbeddedBracedExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'embedded_braced_expression';
    /**
     * @var Node
     */
    private $_left_brace;
    /**
     * @var Node
     */
    private $_expression;
    /**
     * @var Node
     */
    private $_right_brace;
    public function __construct(Node $left_brace, Node $expression, Node $right_brace, ?__Private\SourceRef $source_ref = null)
    {
        $this->_left_brace = $left_brace;
        $this->_expression = $expression;
        $this->_right_brace = $right_brace;
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
        $left_brace = Node::fromJSON($json['embedded_braced_expression_left_brace'], $file, $offset, $source, 'Node');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $expression = Node::fromJSON($json['embedded_braced_expression_expression'], $file, $offset, $source, 'Node');
        $expression = $expression !== null ? $expression : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expression->getWidth();
        $right_brace = Node::fromJSON($json['embedded_braced_expression_right_brace'], $file, $offset, $source, 'Node');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_brace, $expression, $right_brace, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_brace' => $this->_left_brace, 'expression' => $this->_expression, 'right_brace' => $this->_right_brace]);
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
        $left_brace = $rewriter($this->_left_brace, $parents);
        $expression = $rewriter($this->_expression, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        if ($left_brace === $this->_left_brace && $expression === $this->_expression && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($left_brace, $expression, $right_brace);
    }
    /**
     * @return null|Node
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(Node $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($value, $this->_expression, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return $this->_left_brace !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getLeftBrace()
    {
        return $this->_left_brace;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
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
        return new static($this->_left_brace, $value, $this->_right_brace);
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
    /**
     * @return null|Node
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(Node $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_left_brace, $this->_expression, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return $this->_right_brace !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getRightBrace()
    {
        return $this->_right_brace;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

