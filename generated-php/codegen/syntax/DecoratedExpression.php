<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<60ad2f5e844e0bde1accddb49597e116>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class DecoratedExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_decorator;
    /**
     * @var EditableNode
     */
    private $_expression;
    public function __construct(EditableNode $decorator, EditableNode $expression)
    {
        parent::__construct('decorated_expression');
        $this->_decorator = $decorator;
        $this->_expression = $expression;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $decorator = EditableNode::fromJSON($json['decorated_expression_decorator'], $file, $offset, $source);
        $offset += $decorator->getWidth();
        $expression = EditableNode::fromJSON($json['decorated_expression_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        return new static($decorator, $expression);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['decorator' => $this->_decorator, 'expression' => $this->_expression];
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
        $decorator = $this->_decorator->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);
        if ($decorator === $this->_decorator && $expression === $this->_expression) {
            return $this;
        }
        return new static($decorator, $expression);
    }
    /**
     * @return EditableNode
     */
    public function getDecoratorUNTYPED()
    {
        return $this->_decorator;
    }
    /**
     * @return static
     */
    public function withDecorator(EditableNode $value)
    {
        if ($value === $this->_decorator) {
            return $this;
        }
        return new static($value, $this->_expression);
    }
    /**
     * @return bool
     */
    public function hasDecorator()
    {
        return !$this->_decorator->isMissing();
    }
    /**
     * @return AmpersandToken | DotDotDotToken | InoutToken
     */
    /**
     * @return EditableToken
     */
    public function getDecorator()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_decorator);
    }
    /**
     * @return AmpersandToken | DotDotDotToken | InoutToken
     */
    /**
     * @return EditableToken
     */
    public function getDecoratorx()
    {
        return $this->getDecorator();
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
        return new static($this->_decorator, $value);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * DecoratedExpression | FunctionCallExpression | ScopeResolutionExpression |
     * SubscriptExpression | VariableToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_expression);
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * DecoratedExpression | FunctionCallExpression | ScopeResolutionExpression |
     * SubscriptExpression | VariableToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getExpressionx()
    {
        return $this->getExpression();
    }
}

