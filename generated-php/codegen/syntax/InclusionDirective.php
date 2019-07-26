<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<43acf0e27b6549e2765714132075686e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class InclusionDirective extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'inclusion_directive';
    /**
     * @var InclusionExpression
     */
    private $_expression;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(InclusionExpression $expression, SemicolonToken $semicolon, ?array $source_ref = null)
    {
        $this->_expression = $expression;
        $this->_semicolon = $semicolon;
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
        $expression = Node::fromJSON($json['inclusion_expression'], $file, $offset, $source, 'InclusionExpression');
        $expression = $expression !== null ? $expression : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expression->getWidth();
        $semicolon = Node::fromJSON($json['inclusion_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($expression, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['expression' => $this->_expression, 'semicolon' => $this->_semicolon]);
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
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($expression === $this->_expression && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($expression, $semicolon);
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
    public function withExpression(InclusionExpression $value)
    {
        if ($value === $this->_expression) {
            return $this;
        }
        return new static($value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return $this->_expression !== null;
    }
    /**
     * @return InclusionExpression
     */
    /**
     * @return InclusionExpression
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(InclusionExpression::class, $this->_expression);
    }
    /**
     * @return InclusionExpression
     */
    /**
     * @return InclusionExpression
     */
    public function getExpressionx()
    {
        return $this->getExpression();
    }
    /**
     * @return null|Node
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(SemicolonToken $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_expression, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return $this->_semicolon !== null;
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

