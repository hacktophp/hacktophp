<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class VariableExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_expression;
    public function __construct(EditableNode $expression)
    {
        parent::__construct('variable_expression');
        $this->_expression = $expression;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $expression = EditableNode::fromJSON($json['variable_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        return new static($expression);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('expression' => $this->_expression);
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
        $expression = $this->_expression->rewrite($rewriter, $parents);
        if ($expression === $this->_expression) {
            return $this;
        }
        return new static($expression);
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
        return new static($value);
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
}

