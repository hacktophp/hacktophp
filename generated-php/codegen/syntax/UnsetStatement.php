<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c407cf717680a6576a74d2d64a7744bc>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class UnsetStatement extends EditableNode
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
    private $_variables;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $variables, EditableNode $right_paren, EditableNode $semicolon)
    {
        parent::__construct('unset_statement');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_variables = $variables;
        $this->_right_paren = $right_paren;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['unset_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['unset_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $variables = EditableNode::fromJSON($json['unset_variables'], $file, $offset, $source);
        $offset += $variables->getWidth();
        $right_paren = EditableNode::fromJSON($json['unset_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $semicolon = EditableNode::fromJSON($json['unset_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $left_paren, $variables, $right_paren, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'variables' => $this->_variables, 'right_paren' => $this->_right_paren, 'semicolon' => $this->_semicolon);
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
        $variables = $this->_variables->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $variables === $this->_variables && $right_paren === $this->_right_paren && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $left_paren, $variables, $right_paren, $semicolon);
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
        return new static($value, $this->_left_paren, $this->_variables, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return UnsetToken
     */
    /**
     * @return UnsetToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(UnsetToken::class, $this->_keyword);
    }
    /**
     * @return UnsetToken
     */
    /**
     * @return UnsetToken
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
        return new static($this->_keyword, $value, $this->_variables, $this->_right_paren, $this->_semicolon);
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
    public function getVariablesUNTYPED()
    {
        return $this->_variables;
    }
    /**
     * @return static
     */
    public function withVariables(EditableNode $value)
    {
        if ($value === $this->_variables) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasVariables()
    {
        return !$this->_variables->isMissing();
    }
    /**
     * @return EditableList<MemberSelectionExpression> |
     * EditableList<EditableNode> | EditableList<PrefixUnaryExpression> |
     * EditableList<SafeMemberSelectionExpression> |
     * EditableList<ScopeResolutionExpression> |
     * EditableList<SubscriptExpression> | EditableList<VariableExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getVariables()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_variables);
    }
    /**
     * @return EditableList<MemberSelectionExpression> |
     * EditableList<EditableNode> | EditableList<PrefixUnaryExpression> |
     * EditableList<SafeMemberSelectionExpression> |
     * EditableList<ScopeResolutionExpression> |
     * EditableList<SubscriptExpression> | EditableList<VariableExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getVariablesx()
    {
        return $this->getVariables();
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
        return new static($this->_keyword, $this->_left_paren, $this->_variables, $value, $this->_semicolon);
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
    /**
     * @return EditableNode
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(EditableNode $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_variables, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

