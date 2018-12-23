<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<46b07d07c23f5fae6e98976311bc8773>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class IssetExpression extends EditableNode
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
    private $_argument_list;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $argument_list, EditableNode $right_paren)
    {
        parent::__construct('isset_expression');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_argument_list = $argument_list;
        $this->_right_paren = $right_paren;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['isset_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['isset_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $argument_list = EditableNode::fromJSON($json['isset_argument_list'], $file, $offset, $source);
        $offset += $argument_list->getWidth();
        $right_paren = EditableNode::fromJSON($json['isset_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        return new static($keyword, $left_paren, $argument_list, $right_paren);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren);
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
        $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($keyword, $left_paren, $argument_list, $right_paren);
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
        return new static($value, $this->_left_paren, $this->_argument_list, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return IssetToken
     */
    /**
     * @return IssetToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(IssetToken::class, $this->_keyword);
    }
    /**
     * @return IssetToken
     */
    /**
     * @return IssetToken
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
        return new static($this->_keyword, $value, $this->_argument_list, $this->_right_paren);
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
    public function getArgumentListUNTYPED()
    {
        return $this->_argument_list;
    }
    /**
     * @return static
     */
    public function withArgumentList(EditableNode $value)
    {
        if ($value === $this->_argument_list) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasArgumentList()
    {
        return !$this->_argument_list->isMissing();
    }
    /**
     * @return EditableList<FunctionCallExpression> | EditableList<EditableNode>
     * | EditableList<MemberSelectionExpression> |
     * EditableList<PrefixUnaryExpression> |
     * EditableList<SafeMemberSelectionExpression> |
     * EditableList<ScopeResolutionExpression> |
     * EditableList<SubscriptExpression> | EditableList<VariableExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getArgumentList()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_argument_list);
    }
    /**
     * @return EditableList<FunctionCallExpression> | EditableList<EditableNode>
     * | EditableList<MemberSelectionExpression> |
     * EditableList<PrefixUnaryExpression> |
     * EditableList<SafeMemberSelectionExpression> |
     * EditableList<ScopeResolutionExpression> |
     * EditableList<SubscriptExpression> | EditableList<VariableExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getArgumentListx()
    {
        return $this->getArgumentList();
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
        return new static($this->_keyword, $this->_left_paren, $this->_argument_list, $value);
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

