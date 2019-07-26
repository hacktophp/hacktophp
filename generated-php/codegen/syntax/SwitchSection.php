<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<cd1494994bc3159b277cbc3d79923467>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class SwitchSection extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'switch_section';
    /**
     * @var NodeList<ISwitchLabel>
     */
    private $_labels;
    /**
     * @var NodeList<IStatement>|null
     */
    private $_statements;
    /**
     * @var null|SwitchFallthrough
     */
    private $_fallthrough;
    /**
     * @param NodeList<ISwitchLabel> $labels
     * @param NodeList<IStatement>|null $statements
     */
    public function __construct(NodeList $labels, ?NodeList $statements, ?SwitchFallthrough $fallthrough, ?array $source_ref = null)
    {
        $this->_labels = $labels;
        $this->_statements = $statements;
        $this->_fallthrough = $fallthrough;
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
        $labels = Node::fromJSON($json['switch_section_labels'], $file, $offset, $source, 'NodeList<ISwitchLabel>');
        $labels = $labels !== null ? $labels : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $labels->getWidth();
        $statements = Node::fromJSON($json['switch_section_statements'], $file, $offset, $source, 'NodeList<IStatement>');
        $offset += (($__tmp1__ = $statements) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $fallthrough = Node::fromJSON($json['switch_section_fallthrough'], $file, $offset, $source, 'SwitchFallthrough');
        $offset += (($__tmp2__ = $fallthrough) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($labels, $statements, $fallthrough, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['labels' => $this->_labels, 'statements' => $this->_statements, 'fallthrough' => $this->_fallthrough]);
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
        $labels = $rewriter($this->_labels, $parents);
        $statements = $this->_statements === null ? null : $rewriter($this->_statements, $parents);
        $fallthrough = $this->_fallthrough === null ? null : $rewriter($this->_fallthrough, $parents);
        if ($labels === $this->_labels && $statements === $this->_statements && $fallthrough === $this->_fallthrough) {
            return $this;
        }
        return new static($labels, $statements, $fallthrough);
    }
    /**
     * @return null|Node
     */
    public function getLabelsUNTYPED()
    {
        return $this->_labels;
    }
    /**
     * @param NodeList<ISwitchLabel> $value
     *
     * @return static
     */
    public function withLabels(NodeList $value)
    {
        if ($value === $this->_labels) {
            return $this;
        }
        return new static($value, $this->_statements, $this->_fallthrough);
    }
    /**
     * @return bool
     */
    public function hasLabels()
    {
        return $this->_labels !== null;
    }
    /**
     * @return NodeList<CaseLabel> | NodeList<ISwitchLabel> |
     * NodeList<DefaultLabel>
     */
    /**
     * @return NodeList<ISwitchLabel>
     */
    public function getLabels()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_labels);
    }
    /**
     * @return NodeList<CaseLabel> | NodeList<ISwitchLabel> |
     * NodeList<DefaultLabel>
     */
    /**
     * @return NodeList<ISwitchLabel>
     */
    public function getLabelsx()
    {
        return $this->getLabels();
    }
    /**
     * @return null|Node
     */
    public function getStatementsUNTYPED()
    {
        return $this->_statements;
    }
    /**
     * @param NodeList<IStatement>|null $value
     *
     * @return static
     */
    public function withStatements(?NodeList $value)
    {
        if ($value === $this->_statements) {
            return $this;
        }
        return new static($this->_labels, $value, $this->_fallthrough);
    }
    /**
     * @return bool
     */
    public function hasStatements()
    {
        return $this->_statements !== null;
    }
    /**
     * @return NodeList<BreakStatement> | NodeList<IStatement> |
     * NodeList<DoStatement> | NodeList<EchoStatement> |
     * NodeList<ExpressionStatement> | NodeList<ForeachStatement> |
     * NodeList<GotoStatement> | NodeList<IfStatement> |
     * NodeList<ReturnStatement> | NodeList<ThrowStatement> | null
     */
    /**
     * @return NodeList<IStatement>|null
     */
    public function getStatements()
    {
        return $this->_statements;
    }
    /**
     * @return NodeList<BreakStatement> | NodeList<IStatement> |
     * NodeList<DoStatement> | NodeList<EchoStatement> |
     * NodeList<ExpressionStatement> | NodeList<ForeachStatement> |
     * NodeList<GotoStatement> | NodeList<IfStatement> |
     * NodeList<ReturnStatement> | NodeList<ThrowStatement>
     */
    /**
     * @return NodeList<IStatement>
     */
    public function getStatementsx()
    {
        return TypeAssert\not_null($this->getStatements());
    }
    /**
     * @return null|Node
     */
    public function getFallthroughUNTYPED()
    {
        return $this->_fallthrough;
    }
    /**
     * @return static
     */
    public function withFallthrough(?SwitchFallthrough $value)
    {
        if ($value === $this->_fallthrough) {
            return $this;
        }
        return new static($this->_labels, $this->_statements, $value);
    }
    /**
     * @return bool
     */
    public function hasFallthrough()
    {
        return $this->_fallthrough !== null;
    }
    /**
     * @return null | SwitchFallthrough
     */
    /**
     * @return null|SwitchFallthrough
     */
    public function getFallthrough()
    {
        return $this->_fallthrough;
    }
    /**
     * @return SwitchFallthrough
     */
    /**
     * @return SwitchFallthrough
     */
    public function getFallthroughx()
    {
        return TypeAssert\not_null($this->getFallthrough());
    }
}

