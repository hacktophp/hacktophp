<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a4d6dbd92c4ad63db081be9180667b28>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class EmbeddedBracedExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_brace;
    /**
     * @var EditableNode
     */
    private $_expression;
    /**
     * @var EditableNode
     */
    private $_right_brace;
    public function __construct(EditableNode $left_brace, EditableNode $expression, EditableNode $right_brace)
    {
        parent::__construct('embedded_braced_expression');
        $this->_left_brace = $left_brace;
        $this->_expression = $expression;
        $this->_right_brace = $right_brace;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_brace = EditableNode::fromJSON($json['embedded_braced_expression_left_brace'], $file, $offset, $source);
        $offset += $left_brace->getWidth();
        $expression = EditableNode::fromJSON($json['embedded_braced_expression_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        $right_brace = EditableNode::fromJSON($json['embedded_braced_expression_right_brace'], $file, $offset, $source);
        $offset += $right_brace->getWidth();
        return new static($left_brace, $expression, $right_brace);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['left_brace' => $this->_left_brace, 'expression' => $this->_expression, 'right_brace' => $this->_right_brace];
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
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
        if ($left_brace === $this->_left_brace && $expression === $this->_expression && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($left_brace, $expression, $right_brace);
    }
    /**
     * @return EditableNode
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(EditableNode $value)
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
        return !$this->_left_brace->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getLeftBrace()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_left_brace);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return EditableNode
     */
    public function getExpressionUNTYPED()
    {
        return $this->_expression;
    }
    /**
     * @return static
     */
    public function withExpression(EditableNode $value)
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
        return !$this->_expression->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_expression);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getExpressionx()
    {
        return $this->getExpression();
    }
    /**
     * @return EditableNode
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(EditableNode $value)
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
        return !$this->_right_brace->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getRightBrace()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_right_brace);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

