<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<08b588245b3ec90bb0c2d7b60b132a18>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class XHPSpreadAttribute extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_brace;
    /**
     * @var EditableNode
     */
    private $_spread_operator;
    /**
     * @var EditableNode
     */
    private $_expression;
    /**
     * @var EditableNode
     */
    private $_right_brace;
    public function __construct(EditableNode $left_brace, EditableNode $spread_operator, EditableNode $expression, EditableNode $right_brace)
    {
        parent::__construct('xhp_spread_attribute');
        $this->_left_brace = $left_brace;
        $this->_spread_operator = $spread_operator;
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
        $left_brace = EditableNode::fromJSON($json['xhp_spread_attribute_left_brace'], $file, $offset, $source);
        $offset += $left_brace->getWidth();
        $spread_operator = EditableNode::fromJSON($json['xhp_spread_attribute_spread_operator'], $file, $offset, $source);
        $offset += $spread_operator->getWidth();
        $expression = EditableNode::fromJSON($json['xhp_spread_attribute_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        $right_brace = EditableNode::fromJSON($json['xhp_spread_attribute_right_brace'], $file, $offset, $source);
        $offset += $right_brace->getWidth();
        return new static($left_brace, $spread_operator, $expression, $right_brace);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('left_brace' => $this->_left_brace, 'spread_operator' => $this->_spread_operator, 'expression' => $this->_expression, 'right_brace' => $this->_right_brace);
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? array() : (array) $parents;
        $parents[] = $this;
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $spread_operator = $this->_spread_operator->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
        if ($left_brace === $this->_left_brace && $spread_operator === $this->_spread_operator && $expression === $this->_expression && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($left_brace, $spread_operator, $expression, $right_brace);
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
        return new static($value, $this->_spread_operator, $this->_expression, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return !$this->_left_brace->isMissing();
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBrace()
    {
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return EditableNode
     */
    public function getSpreadOperatorUNTYPED()
    {
        return $this->_spread_operator;
    }
    /**
     * @return static
     */
    public function withSpreadOperator(EditableNode $value)
    {
        if ($value === $this->_spread_operator) {
            return $this;
        }
        return new static($this->_left_brace, $value, $this->_expression, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasSpreadOperator()
    {
        return !$this->_spread_operator->isMissing();
    }
    /**
     * @return DotDotDotToken
     */
    /**
     * @return DotDotDotToken
     */
    public function getSpreadOperator()
    {
        return TypeAssert\instance_of(DotDotDotToken::class, $this->_spread_operator);
    }
    /**
     * @return DotDotDotToken
     */
    /**
     * @return DotDotDotToken
     */
    public function getSpreadOperatorx()
    {
        return $this->getSpreadOperator();
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
        return new static($this->_left_brace, $this->_spread_operator, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return VariableExpression | XHPExpression
     */
    /**
     * @return EditableNode
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_expression);
    }
    /**
     * @return VariableExpression | XHPExpression
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
        return new static($this->_left_brace, $this->_spread_operator, $this->_expression, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return !$this->_right_brace->isMissing();
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBrace()
    {
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

