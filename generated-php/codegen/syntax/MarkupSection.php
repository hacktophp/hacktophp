<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8d4a55c43bd65e4001a5c6234c6140ee>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class MarkupSection extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'markup_section';
    /**
     * @var null|Node
     */
    private $_prefix;
    /**
     * @var MarkupToken
     */
    private $_text;
    /**
     * @var MarkupSuffix
     */
    private $_suffix;
    /**
     * @var null|Node
     */
    private $_expression;
    public function __construct(?Node $prefix, MarkupToken $text, MarkupSuffix $suffix, ?Node $expression, ?__Private\SourceRef $source_ref = null)
    {
        $this->_prefix = $prefix;
        $this->_text = $text;
        $this->_suffix = $suffix;
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
        $prefix = Node::fromJSON($json['markup_prefix'], $file, $offset, $source, 'Node');
        $offset += (($__tmp1__ = $prefix) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $text = Node::fromJSON($json['markup_text'], $file, $offset, $source, 'MarkupToken');
        $text = $text !== null ? $text : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $text->getWidth();
        $suffix = Node::fromJSON($json['markup_suffix'], $file, $offset, $source, 'MarkupSuffix');
        $suffix = $suffix !== null ? $suffix : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $suffix->getWidth();
        $expression = Node::fromJSON($json['markup_expression'], $file, $offset, $source, 'Node');
        $offset += (($__tmp2__ = $expression) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($prefix, $text, $suffix, $expression, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['prefix' => $this->_prefix, 'text' => $this->_text, 'suffix' => $this->_suffix, 'expression' => $this->_expression]);
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
        $prefix = $this->_prefix === null ? null : $rewriter($this->_prefix, $parents);
        $text = $rewriter($this->_text, $parents);
        $suffix = $rewriter($this->_suffix, $parents);
        $expression = $this->_expression === null ? null : $rewriter($this->_expression, $parents);
        if ($prefix === $this->_prefix && $text === $this->_text && $suffix === $this->_suffix && $expression === $this->_expression) {
            return $this;
        }
        return new static($prefix, $text, $suffix, $expression);
    }
    /**
     * @return null|Node
     */
    public function getPrefixUNTYPED()
    {
        return $this->_prefix;
    }
    /**
     * @return static
     */
    public function withPrefix(?Node $value)
    {
        if ($value === $this->_prefix) {
            return $this;
        }
        return new static($value, $this->_text, $this->_suffix, $this->_expression);
    }
    /**
     * @return bool
     */
    public function hasPrefix()
    {
        return $this->_prefix !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
     */
    public function getPrefix()
    {
        return $this->_prefix;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getPrefixx()
    {
        return TypeAssert\not_null($this->getPrefix());
    }
    /**
     * @return null|Node
     */
    public function getTextUNTYPED()
    {
        return $this->_text;
    }
    /**
     * @return static
     */
    public function withText(MarkupToken $value)
    {
        if ($value === $this->_text) {
            return $this;
        }
        return new static($this->_prefix, $value, $this->_suffix, $this->_expression);
    }
    /**
     * @return bool
     */
    public function hasText()
    {
        return $this->_text !== null;
    }
    /**
     * @return MarkupToken
     */
    /**
     * @return MarkupToken
     */
    public function getText()
    {
        return TypeAssert\instance_of(MarkupToken::class, $this->_text);
    }
    /**
     * @return MarkupToken
     */
    /**
     * @return MarkupToken
     */
    public function getTextx()
    {
        return $this->getText();
    }
    /**
     * @return null|Node
     */
    public function getSuffixUNTYPED()
    {
        return $this->_suffix;
    }
    /**
     * @return static
     */
    public function withSuffix(MarkupSuffix $value)
    {
        if ($value === $this->_suffix) {
            return $this;
        }
        return new static($this->_prefix, $this->_text, $value, $this->_expression);
    }
    /**
     * @return bool
     */
    public function hasSuffix()
    {
        return $this->_suffix !== null;
    }
    /**
     * @return MarkupSuffix
     */
    /**
     * @return MarkupSuffix
     */
    public function getSuffix()
    {
        return TypeAssert\instance_of(MarkupSuffix::class, $this->_suffix);
    }
    /**
     * @return MarkupSuffix
     */
    /**
     * @return MarkupSuffix
     */
    public function getSuffixx()
    {
        return $this->getSuffix();
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
    public function withExpression(?Node $value)
    {
        if ($value === $this->_expression) {
            return $this;
        }
        return new static($this->_prefix, $this->_text, $this->_suffix, $value);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return $this->_expression !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
     */
    public function getExpression()
    {
        return $this->_expression;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getExpressionx()
    {
        return TypeAssert\not_null($this->getExpression());
    }
}

