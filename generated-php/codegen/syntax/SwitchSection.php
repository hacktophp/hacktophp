<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<fdffbb6998a2b11732e17abeeb2ee85e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class SwitchSection extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_labels;
    /**
     * @var EditableNode
     */
    private $_statements;
    /**
     * @var EditableNode
     */
    private $_fallthrough;
    public function __construct(EditableNode $labels, EditableNode $statements, EditableNode $fallthrough)
    {
        parent::__construct('switch_section');
        $this->_labels = $labels;
        $this->_statements = $statements;
        $this->_fallthrough = $fallthrough;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $labels = EditableNode::fromJSON($json['switch_section_labels'], $file, $offset, $source);
        $offset += $labels->getWidth();
        $statements = EditableNode::fromJSON($json['switch_section_statements'], $file, $offset, $source);
        $offset += $statements->getWidth();
        $fallthrough = EditableNode::fromJSON($json['switch_section_fallthrough'], $file, $offset, $source);
        $offset += $fallthrough->getWidth();
        return new static($labels, $statements, $fallthrough);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['labels' => $this->_labels, 'statements' => $this->_statements, 'fallthrough' => $this->_fallthrough];
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? [] : (array) $parents;
        $parents[] = $this;
        $labels = $this->_labels->rewrite($rewriter, $parents);
        $statements = $this->_statements->rewrite($rewriter, $parents);
        $fallthrough = $this->_fallthrough->rewrite($rewriter, $parents);
        if ($labels === $this->_labels && $statements === $this->_statements && $fallthrough === $this->_fallthrough) {
            return $this;
        }
        return new static($labels, $statements, $fallthrough);
    }
    /**
     * @return EditableNode
     */
    public function getLabelsUNTYPED()
    {
        return $this->_labels;
    }
    /**
     * @return static
     */
    public function withLabels(EditableNode $value)
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
        return !$this->_labels->isMissing();
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getLabels()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_labels);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getLabelsx()
    {
        return $this->getLabels();
    }
    /**
     * @return EditableNode
     */
    public function getStatementsUNTYPED()
    {
        return $this->_statements;
    }
    /**
     * @return static
     */
    public function withStatements(EditableNode $value)
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
        return !$this->_statements->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getStatements()
    {
        if ($this->_statements->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_statements);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getStatementsx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_statements);
    }
    /**
     * @return EditableNode
     */
    public function getFallthroughUNTYPED()
    {
        return $this->_fallthrough;
    }
    /**
     * @return static
     */
    public function withFallthrough(EditableNode $value)
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
        return !$this->_fallthrough->isMissing();
    }
    /**
     * @return null | SwitchFallthrough
     */
    /**
     * @return null|SwitchFallthrough
     */
    public function getFallthrough()
    {
        if ($this->_fallthrough->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(SwitchFallthrough::class, $this->_fallthrough);
    }
    /**
     * @return SwitchFallthrough
     */
    /**
     * @return SwitchFallthrough
     */
    public function getFallthroughx()
    {
        return TypeAssert\instance_of(SwitchFallthrough::class, $this->_fallthrough);
    }
}

