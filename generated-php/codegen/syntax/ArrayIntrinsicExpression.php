<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ArrayIntrinsicExpression extends EditableNode
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
    private $_members;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $members, EditableNode $right_paren)
    {
        parent::__construct('array_intrinsic_expression');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_members = $members;
        $this->_right_paren = $right_paren;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['array_intrinsic_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['array_intrinsic_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $members = EditableNode::fromJSON($json['array_intrinsic_members'], $file, $offset, $source);
        $offset += $members->getWidth();
        $right_paren = EditableNode::fromJSON($json['array_intrinsic_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        return new static($keyword, $left_paren, $members, $right_paren);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'members' => $this->_members, 'right_paren' => $this->_right_paren);
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
        $members = $this->_members->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $members === $this->_members && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($keyword, $left_paren, $members, $right_paren);
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
        return new static($value, $this->_left_paren, $this->_members, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return ArrayToken
     */
    /**
     * @return ArrayToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ArrayToken::class, $this->_keyword);
    }
    /**
     * @return ArrayToken
     */
    /**
     * @return ArrayToken
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
        return new static($this->_keyword, $value, $this->_members, $this->_right_paren);
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
    public function getMembersUNTYPED()
    {
        return $this->_members;
    }
    /**
     * @return static
     */
    public function withMembers(EditableNode $value)
    {
        if ($value === $this->_members) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasMembers()
    {
        return !$this->_members->isMissing();
    }
    /**
     * @return EditableList<AnonymousFunction> | EditableList<EditableNode> |
     * EditableList<ArrayCreationExpression> |
     * EditableList<ArrayIntrinsicExpression> |
     * EditableList<AwaitableCreationExpression> | EditableList<BinaryExpression>
     * | EditableList<CastExpression> | EditableList<CollectionLiteralExpression>
     * | EditableList<ElementInitializer> | EditableList<FunctionCallExpression>
     * | EditableList<LiteralExpression> |
     * EditableList<MemberSelectionExpression> |
     * EditableList<ObjectCreationExpression> |
     * EditableList<PrefixUnaryExpression> | EditableList<QualifiedName> |
     * EditableList<ScopeResolutionExpression> |
     * EditableList<SubscriptExpression> | EditableList<NameToken> |
     * EditableList<TupleExpression> | EditableList<VariableExpression> |
     * EditableList<VectorIntrinsicExpression> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getMembers()
    {
        if ($this->_members->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_members);
    }
    /**
     * @return EditableList<AnonymousFunction> | EditableList<EditableNode> |
     * EditableList<ArrayCreationExpression> |
     * EditableList<ArrayIntrinsicExpression> |
     * EditableList<AwaitableCreationExpression> | EditableList<BinaryExpression>
     * | EditableList<CastExpression> | EditableList<CollectionLiteralExpression>
     * | EditableList<ElementInitializer> | EditableList<FunctionCallExpression>
     * | EditableList<LiteralExpression> |
     * EditableList<MemberSelectionExpression> |
     * EditableList<ObjectCreationExpression> |
     * EditableList<PrefixUnaryExpression> | EditableList<QualifiedName> |
     * EditableList<ScopeResolutionExpression> |
     * EditableList<SubscriptExpression> | EditableList<NameToken> |
     * EditableList<TupleExpression> | EditableList<VariableExpression> |
     * EditableList<VectorIntrinsicExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getMembersx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_members);
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
        return new static($this->_keyword, $this->_left_paren, $this->_members, $value);
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

