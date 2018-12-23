<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class TupleExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_items;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $items, EditableNode $right_paren)
    {
        parent::__construct('tuple_expression');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_items = $items;
        $this->_right_paren = $right_paren;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['tuple_expression_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['tuple_expression_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $items = EditableNode::fromJSON($json['tuple_expression_items'], $file, $offset, $source);
        $offset += $items->getWidth();
        $right_paren = EditableNode::fromJSON($json['tuple_expression_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        return new static($keyword, $left_paren, $items, $right_paren);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'items' => $this->_items, 'right_paren' => $this->_right_paren);
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $items = $this->_items->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $items === $this->_items && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($keyword, $left_paren, $items, $right_paren);
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
        return new static($value, $this->_left_paren, $this->_items, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return TupleToken
     */
    /**
     * @return TupleToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(TupleToken::class, $this->_keyword);
    }
    /**
     * @return TupleToken
     */
    /**
     * @return TupleToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(EditableNode $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_items, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return !$this->_left_paren->isMissing();
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParen()
    {
        return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParenx()
    {
        return $this->getLeftParen();
    }
    /**
     * @return EditableNode
     */
    public function getItemsUNTYPED()
    {
        return $this->_items;
    }
    /**
     * @return static
     */
    public function withItems(EditableNode $value)
    {
        if ($value === $this->_items) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasItems()
    {
        return !$this->_items->isMissing();
    }
    /**
     * @return EditableList<EditableNode> |
     * EditableList<ArrayIntrinsicExpression> | EditableList<BinaryExpression> |
     * EditableList<CastExpression> | EditableList<FunctionCallExpression> |
     * EditableList<LiteralExpression> | EditableList<VariableExpression> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getItems()
    {
        if ($this->_items->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_items);
    }
    /**
     * @return EditableList<EditableNode> |
     * EditableList<ArrayIntrinsicExpression> | EditableList<BinaryExpression> |
     * EditableList<CastExpression> | EditableList<FunctionCallExpression> |
     * EditableList<LiteralExpression> | EditableList<VariableExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getItemsx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_items);
    }
    /**
     * @return EditableNode
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(EditableNode $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_items, $value);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return !$this->_right_paren->isMissing();
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParen()
    {
        return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParenx()
    {
        return $this->getRightParen();
    }
}

