<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ad4a714a065604a3491c3900cb370474>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PocketAtomExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'pocket_atom_expression';
    /**
     * @var Node
     */
    private $_glyph;
    /**
     * @var Node
     */
    private $_expression;
    public function __construct(Node $glyph, Node $expression, ?__Private\SourceRef $source_ref = null)
    {
        $this->_glyph = $glyph;
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
        $glyph = Node::fromJSON($json['pocket_atom_glyph'], $file, $offset, $source, 'Node');
        $glyph = $glyph !== null ? $glyph : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $glyph->getWidth();
        $expression = Node::fromJSON($json['pocket_atom_expression'], $file, $offset, $source, 'Node');
        $expression = $expression !== null ? $expression : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expression->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($glyph, $expression, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['glyph' => $this->_glyph, 'expression' => $this->_expression]);
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
        $glyph = $rewriter($this->_glyph, $parents);
        $expression = $rewriter($this->_expression, $parents);
        if ($glyph === $this->_glyph && $expression === $this->_expression) {
            return $this;
        }
        return new static($glyph, $expression);
    }
    /**
     * @return null|Node
     */
    public function getGlyphUNTYPED()
    {
        return $this->_glyph;
    }
    /**
     * @return static
     */
    public function withGlyph(Node $value)
    {
        if ($value === $this->_glyph) {
            return $this;
        }
        return new static($value, $this->_expression);
    }
    /**
     * @return bool
     */
    public function hasGlyph()
    {
        return $this->_glyph !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getGlyph()
    {
        return $this->_glyph;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getGlyphx()
    {
        return $this->getGlyph();
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
        return new static($this->_glyph, $value);
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

