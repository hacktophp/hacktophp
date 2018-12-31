<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f5fb0079b4d56dfa30164e7c65a0d39e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class ArrayCreationExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_bracket;
    /**
     * @var EditableNode
     */
    private $_members;
    /**
     * @var EditableNode
     */
    private $_right_bracket;
    public function __construct(EditableNode $left_bracket, EditableNode $members, EditableNode $right_bracket)
    {
        parent::__construct('array_creation_expression');
        $this->_left_bracket = $left_bracket;
        $this->_members = $members;
        $this->_right_bracket = $right_bracket;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_bracket = EditableNode::fromJSON($json['array_creation_left_bracket'], $file, $offset, $source);
        $offset += $left_bracket->getWidth();
        $members = EditableNode::fromJSON($json['array_creation_members'], $file, $offset, $source);
        $offset += $members->getWidth();
        $right_bracket = EditableNode::fromJSON($json['array_creation_right_bracket'], $file, $offset, $source);
        $offset += $right_bracket->getWidth();
        return new static($left_bracket, $members, $right_bracket);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['left_bracket' => $this->_left_bracket, 'members' => $this->_members, 'right_bracket' => $this->_right_bracket];
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
        $left_bracket = $this->_left_bracket->rewrite($rewriter, $parents);
        $members = $this->_members->rewrite($rewriter, $parents);
        $right_bracket = $this->_right_bracket->rewrite($rewriter, $parents);
        if ($left_bracket === $this->_left_bracket && $members === $this->_members && $right_bracket === $this->_right_bracket) {
            return $this;
        }
        return new static($left_bracket, $members, $right_bracket);
    }
    /**
     * @return EditableNode
     */
    public function getLeftBracketUNTYPED()
    {
        return $this->_left_bracket;
    }
    /**
     * @return static
     */
    public function withLeftBracket(EditableNode $value)
    {
        if ($value === $this->_left_bracket) {
            return $this;
        }
        return new static($value, $this->_members, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasLeftBracket()
    {
        return !$this->_left_bracket->isMissing();
    }
    /**
     * @return LeftBracketToken
     */
    /**
     * @return LeftBracketToken
     */
    public function getLeftBracket()
    {
        return TypeAssert\instance_of(LeftBracketToken::class, $this->_left_bracket);
    }
    /**
     * @return LeftBracketToken
     */
    /**
     * @return LeftBracketToken
     */
    public function getLeftBracketx()
    {
        return $this->getLeftBracket();
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
        return new static($this->_left_bracket, $value, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasMembers()
    {
        return !$this->_members->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | EditableList<ArrayCreationExpression>
     * | EditableList<ArrayIntrinsicExpression> | EditableList<BinaryExpression>
     * | EditableList<ConditionalExpression> |
     * EditableList<DictionaryIntrinsicExpression> |
     * EditableList<ElementInitializer> | EditableList<FunctionCallExpression> |
     * EditableList<KeysetIntrinsicExpression> | EditableList<LiteralExpression>
     * | EditableList<ObjectCreationExpression> |
     * EditableList<PrefixUnaryExpression> |
     * EditableList<ScopeResolutionExpression> |
     * EditableList<SubscriptExpression> | EditableList<NameToken> |
     * EditableList<VariableExpression> | EditableList<VarrayIntrinsicExpression>
     * | EditableList<VectorIntrinsicExpression> | null
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
     * @return EditableList<EditableNode> | EditableList<ArrayCreationExpression>
     * | EditableList<ArrayIntrinsicExpression> | EditableList<BinaryExpression>
     * | EditableList<ConditionalExpression> |
     * EditableList<DictionaryIntrinsicExpression> |
     * EditableList<ElementInitializer> | EditableList<FunctionCallExpression> |
     * EditableList<KeysetIntrinsicExpression> | EditableList<LiteralExpression>
     * | EditableList<ObjectCreationExpression> |
     * EditableList<PrefixUnaryExpression> |
     * EditableList<ScopeResolutionExpression> |
     * EditableList<SubscriptExpression> | EditableList<NameToken> |
     * EditableList<VariableExpression> | EditableList<VarrayIntrinsicExpression>
     * | EditableList<VectorIntrinsicExpression>
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
    public function getRightBracketUNTYPED()
    {
        return $this->_right_bracket;
    }
    /**
     * @return static
     */
    public function withRightBracket(EditableNode $value)
    {
        if ($value === $this->_right_bracket) {
            return $this;
        }
        return new static($this->_left_bracket, $this->_members, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBracket()
    {
        return !$this->_right_bracket->isMissing();
    }
    /**
     * @return RightBracketToken
     */
    /**
     * @return RightBracketToken
     */
    public function getRightBracket()
    {
        return TypeAssert\instance_of(RightBracketToken::class, $this->_right_bracket);
    }
    /**
     * @return RightBracketToken
     */
    /**
     * @return RightBracketToken
     */
    public function getRightBracketx()
    {
        return $this->getRightBracket();
    }
}

