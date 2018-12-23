<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ConstructorCall extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_type;
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
    public function __construct(EditableNode $type, EditableNode $left_paren, EditableNode $argument_list, EditableNode $right_paren)
    {
        parent::__construct('constructor_call');
        $this->_type = $type;
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
        $type = EditableNode::fromJSON($json['constructor_call_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $left_paren = EditableNode::fromJSON($json['constructor_call_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $argument_list = EditableNode::fromJSON($json['constructor_call_argument_list'], $file, $offset, $source);
        $offset += $argument_list->getWidth();
        $right_paren = EditableNode::fromJSON($json['constructor_call_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        return new static($type, $left_paren, $argument_list, $right_paren);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('type' => $this->_type, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren);
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
        $type = $this->_type->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        if ($type === $this->_type && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($type, $left_paren, $argument_list, $right_paren);
    }
    /**
     * @return EditableNode
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(EditableNode $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_argument_list, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return GenericTypeSpecifier | MemberSelectionExpression |
     * ParenthesizedExpression | QualifiedName | ScopeResolutionExpression |
     * SimpleTypeSpecifier | SubscriptExpression | NameToken | ParentToken |
     * SelfToken | StaticToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return GenericTypeSpecifier | MemberSelectionExpression |
     * ParenthesizedExpression | QualifiedName | ScopeResolutionExpression |
     * SimpleTypeSpecifier | SubscriptExpression | NameToken | ParentToken |
     * SelfToken | StaticToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return $this->getType();
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
        return new static($this->_type, $value, $this->_argument_list, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return !$this->_left_paren->isMissing();
    }
    /**
     * @return null | LeftParenToken
     */
    /**
     * @return null|LeftParenToken
     */
    public function getLeftParen()
    {
        if ($this->_left_paren->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
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
        return new static($this->_type, $this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasArgumentList()
    {
        return !$this->_argument_list->isMissing();
    }
    /**
     * @return EditableList<AnonymousFunction> | EditableList<EditableNode> |
     * EditableList<ArrayCreationExpression> |
     * EditableList<ArrayIntrinsicExpression> | EditableList<BinaryExpression> |
     * EditableList<CastExpression> | EditableList<CollectionLiteralExpression> |
     * EditableList<ConditionalExpression> |
     * EditableList<DarrayIntrinsicExpression> |
     * EditableList<DecoratedExpression> |
     * EditableList<DictionaryIntrinsicExpression> |
     * EditableList<FunctionCallExpression> |
     * EditableList<KeysetIntrinsicExpression> | EditableList<LambdaExpression> |
     * EditableList<LiteralExpression> | EditableList<MemberSelectionExpression>
     * | EditableList<ObjectCreationExpression> |
     * EditableList<ParenthesizedExpression> |
     * EditableList<PrefixUnaryExpression> |
     * EditableList<ScopeResolutionExpression> | EditableList<ShapeExpression> |
     * EditableList<SubscriptExpression> | EditableList<NameToken> |
     * EditableList<VariableExpression> | EditableList<VarrayIntrinsicExpression>
     * | EditableList<VectorIntrinsicExpression> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getArgumentList()
    {
        if ($this->_argument_list->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_argument_list);
    }
    /**
     * @return EditableList<AnonymousFunction> | EditableList<EditableNode> |
     * EditableList<ArrayCreationExpression> |
     * EditableList<ArrayIntrinsicExpression> | EditableList<BinaryExpression> |
     * EditableList<CastExpression> | EditableList<CollectionLiteralExpression> |
     * EditableList<ConditionalExpression> |
     * EditableList<DarrayIntrinsicExpression> |
     * EditableList<DecoratedExpression> |
     * EditableList<DictionaryIntrinsicExpression> |
     * EditableList<FunctionCallExpression> |
     * EditableList<KeysetIntrinsicExpression> | EditableList<LambdaExpression> |
     * EditableList<LiteralExpression> | EditableList<MemberSelectionExpression>
     * | EditableList<ObjectCreationExpression> |
     * EditableList<ParenthesizedExpression> |
     * EditableList<PrefixUnaryExpression> |
     * EditableList<ScopeResolutionExpression> | EditableList<ShapeExpression> |
     * EditableList<SubscriptExpression> | EditableList<NameToken> |
     * EditableList<VariableExpression> | EditableList<VarrayIntrinsicExpression>
     * | EditableList<VectorIntrinsicExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getArgumentListx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_argument_list);
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
        return new static($this->_type, $this->_left_paren, $this->_argument_list, $value);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return !$this->_right_paren->isMissing();
    }
    /**
     * @return null | RightParenToken
     */
    /**
     * @return null|RightParenToken
     */
    public function getRightParen()
    {
        if ($this->_right_paren->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
    }
}

