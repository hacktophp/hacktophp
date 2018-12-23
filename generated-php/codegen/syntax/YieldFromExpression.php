<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<602a1310ce34aad6cabbce2a6b490384>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class YieldFromExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_yield_keyword;
    /**
     * @var EditableNode
     */
    private $_from_keyword;
    /**
     * @var EditableNode
     */
    private $_operand;
    public function __construct(EditableNode $yield_keyword, EditableNode $from_keyword, EditableNode $operand)
    {
        parent::__construct('yield_from_expression');
        $this->_yield_keyword = $yield_keyword;
        $this->_from_keyword = $from_keyword;
        $this->_operand = $operand;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $yield_keyword = EditableNode::fromJSON($json['yield_from_yield_keyword'], $file, $offset, $source);
        $offset += $yield_keyword->getWidth();
        $from_keyword = EditableNode::fromJSON($json['yield_from_from_keyword'], $file, $offset, $source);
        $offset += $from_keyword->getWidth();
        $operand = EditableNode::fromJSON($json['yield_from_operand'], $file, $offset, $source);
        $offset += $operand->getWidth();
        return new static($yield_keyword, $from_keyword, $operand);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('yield_keyword' => $this->_yield_keyword, 'from_keyword' => $this->_from_keyword, 'operand' => $this->_operand);
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
        $yield_keyword = $this->_yield_keyword->rewrite($rewriter, $parents);
        $from_keyword = $this->_from_keyword->rewrite($rewriter, $parents);
        $operand = $this->_operand->rewrite($rewriter, $parents);
        if ($yield_keyword === $this->_yield_keyword && $from_keyword === $this->_from_keyword && $operand === $this->_operand) {
            return $this;
        }
        return new static($yield_keyword, $from_keyword, $operand);
    }
    /**
     * @return EditableNode
     */
    public function getYieldKeywordUNTYPED()
    {
        return $this->_yield_keyword;
    }
    /**
     * @return static
     */
    public function withYieldKeyword(EditableNode $value)
    {
        if ($value === $this->_yield_keyword) {
            return $this;
        }
        return new static($value, $this->_from_keyword, $this->_operand);
    }
    /**
     * @return bool
     */
    public function hasYieldKeyword()
    {
        return !$this->_yield_keyword->isMissing();
    }
    /**
     * @return YieldToken
     */
    /**
     * @return YieldToken
     */
    public function getYieldKeyword()
    {
        return TypeAssert\instance_of(YieldToken::class, $this->_yield_keyword);
    }
    /**
     * @return YieldToken
     */
    /**
     * @return YieldToken
     */
    public function getYieldKeywordx()
    {
        return $this->getYieldKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getFromKeywordUNTYPED()
    {
        return $this->_from_keyword;
    }
    /**
     * @return static
     */
    public function withFromKeyword(EditableNode $value)
    {
        if ($value === $this->_from_keyword) {
            return $this;
        }
        return new static($this->_yield_keyword, $value, $this->_operand);
    }
    /**
     * @return bool
     */
    public function hasFromKeyword()
    {
        return !$this->_from_keyword->isMissing();
    }
    /**
     * @return FromToken
     */
    /**
     * @return FromToken
     */
    public function getFromKeyword()
    {
        return TypeAssert\instance_of(FromToken::class, $this->_from_keyword);
    }
    /**
     * @return FromToken
     */
    /**
     * @return FromToken
     */
    public function getFromKeywordx()
    {
        return $this->getFromKeyword();
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
        return new static($this->_yield_keyword, $this->_from_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasOperand()
    {
        return !$this->_operand->isMissing();
    }
    /**
     * @return ArrayCreationExpression | FunctionCallExpression |
     * LiteralExpression | ParenthesizedExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getOperand()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_operand);
    }
    /**
     * @return ArrayCreationExpression | FunctionCallExpression |
     * LiteralExpression | ParenthesizedExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getOperandx()
    {
        return $this->getOperand();
    }
}

