<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f2a0865818f7fe893a1ad777c66e9c51>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class YieldExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_operand;
    public function __construct(EditableNode $keyword, EditableNode $operand)
    {
        parent::__construct('yield_expression');
        $this->_keyword = $keyword;
        $this->_operand = $operand;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['yield_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $operand = EditableNode::fromJSON($json['yield_operand'], $file, $offset, $source);
        $offset += $operand->getWidth();
        return new static($keyword, $operand);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'operand' => $this->_operand];
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $operand = $this->_operand->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $operand === $this->_operand) {
            return $this;
        }
        return new static($keyword, $operand);
    }
    /**
     * @return EditableNode
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(EditableNode $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_operand);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return YieldToken
     */
    /**
     * @return YieldToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(YieldToken::class, $this->_keyword);
    }
    /**
     * @return YieldToken
     */
    /**
     * @return YieldToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getOperandUNTYPED()
    {
        return $this->_operand;
    }
    /**
     * @return static
     */
    public function withOperand(EditableNode $value)
    {
        if ($value === $this->_operand) {
            return $this;
        }
        return new static($this->_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasOperand()
    {
        return !$this->_operand->isMissing();
    }
    /**
     * @return AnonymousFunction | BinaryExpression | ElementInitializer |
     * FunctionCallExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | null | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * SubscriptExpression | BreakToken | NameToken | TupleExpression |
     * VariableExpression
     */
    /**
     * @return null|EditableNode
     */
    public function getOperand()
    {
        if ($this->_operand->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_operand);
    }
    /**
     * @return AnonymousFunction | BinaryExpression | ElementInitializer |
     * FunctionCallExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * SubscriptExpression | BreakToken | NameToken | TupleExpression |
     * VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getOperandx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_operand);
    }
}

