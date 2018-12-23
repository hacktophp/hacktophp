<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a796a8ef44e27f673f0ff975741c563e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class VarrayIntrinsicExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_explicit_type;
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
    public function __construct(EditableNode $keyword, EditableNode $explicit_type, EditableNode $left_bracket, EditableNode $members, EditableNode $right_bracket)
    {
        parent::__construct('varray_intrinsic_expression');
        $this->_keyword = $keyword;
        $this->_explicit_type = $explicit_type;
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
        $keyword = EditableNode::fromJSON($json['varray_intrinsic_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $explicit_type = EditableNode::fromJSON($json['varray_intrinsic_explicit_type'], $file, $offset, $source);
        $offset += $explicit_type->getWidth();
        $left_bracket = EditableNode::fromJSON($json['varray_intrinsic_left_bracket'], $file, $offset, $source);
        $offset += $left_bracket->getWidth();
        $members = EditableNode::fromJSON($json['varray_intrinsic_members'], $file, $offset, $source);
        $offset += $members->getWidth();
        $right_bracket = EditableNode::fromJSON($json['varray_intrinsic_right_bracket'], $file, $offset, $source);
        $offset += $right_bracket->getWidth();
        return new static($keyword, $explicit_type, $left_bracket, $members, $right_bracket);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'explicit_type' => $this->_explicit_type, 'left_bracket' => $this->_left_bracket, 'members' => $this->_members, 'right_bracket' => $this->_right_bracket);
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
        $explicit_type = $this->_explicit_type->rewrite($rewriter, $parents);
        $left_bracket = $this->_left_bracket->rewrite($rewriter, $parents);
        $members = $this->_members->rewrite($rewriter, $parents);
        $right_bracket = $this->_right_bracket->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $explicit_type === $this->_explicit_type && $left_bracket === $this->_left_bracket && $members === $this->_members && $right_bracket === $this->_right_bracket) {
            return $this;
        }
        return new static($keyword, $explicit_type, $left_bracket, $members, $right_bracket);
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
        return new static($value, $this->_explicit_type, $this->_left_bracket, $this->_members, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return VarrayToken
     */
    /**
     * @return VarrayToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(VarrayToken::class, $this->_keyword);
    }
    /**
     * @return VarrayToken
     */
    /**
     * @return VarrayToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getExplicitTypeUNTYPED()
    {
        return $this->_explicit_type;
    }
    /**
     * @return static
     */
    public function withExplicitType(EditableNode $value)
    {
        if ($value === $this->_explicit_type) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_left_bracket, $this->_members, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasExplicitType()
    {
        return !$this->_explicit_type->isMissing();
    }
    /**
     * @return null
     */
    /**
     * @return null|EditableNode
     */
    public function getExplicitType()
    {
        if ($this->_explicit_type->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_explicit_type);
    }
    /**
     * @return
     */
    /**
     * @return EditableNode
     */
    public function getExplicitTypex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_explicit_type);
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
        return new static($this->_keyword, $this->_explicit_type, $value, $this->_members, $this->_right_bracket);
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
        return new static($this->_keyword, $this->_explicit_type, $this->_left_bracket, $value, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasMembers()
    {
        return !$this->_members->isMissing();
    }
    /**
     * @return EditableList<EditableNode> |
     * EditableList<ArrayIntrinsicExpression> |
     * EditableList<DarrayIntrinsicExpression> |
     * EditableList<FunctionCallExpression> | EditableList<LiteralExpression> |
     * EditableList<ScopeResolutionExpression> | EditableList<NameToken> |
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
     * @return EditableList<EditableNode> |
     * EditableList<ArrayIntrinsicExpression> |
     * EditableList<DarrayIntrinsicExpression> |
     * EditableList<FunctionCallExpression> | EditableList<LiteralExpression> |
     * EditableList<ScopeResolutionExpression> | EditableList<NameToken> |
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
        return new static($this->_keyword, $this->_explicit_type, $this->_left_bracket, $this->_members, $value);
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

