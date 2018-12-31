<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<426c12b1880cf2c49e04ad89e32aabf1>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class TupleTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_types;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    public function __construct(EditableNode $left_paren, EditableNode $types, EditableNode $right_paren)
    {
        parent::__construct('tuple_type_specifier');
        $this->_left_paren = $left_paren;
        $this->_types = $types;
        $this->_right_paren = $right_paren;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_paren = EditableNode::fromJSON($json['tuple_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $types = EditableNode::fromJSON($json['tuple_types'], $file, $offset, $source);
        $offset += $types->getWidth();
        $right_paren = EditableNode::fromJSON($json['tuple_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        return new static($left_paren, $types, $right_paren);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['left_paren' => $this->_left_paren, 'types' => $this->_types, 'right_paren' => $this->_right_paren];
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $types = $this->_types->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        if ($left_paren === $this->_left_paren && $types === $this->_types && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($left_paren, $types, $right_paren);
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
        return new static($value, $this->_types, $this->_right_paren);
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
    public function getTypesUNTYPED()
    {
        return $this->_types;
    }
    /**
     * @return static
     */
    public function withTypes(EditableNode $value)
    {
        if ($value === $this->_types) {
            return $this;
        }
        return new static($this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasTypes()
    {
        return !$this->_types->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | EditableList<SimpleTypeSpecifier> |
     * EditableList<TupleTypeSpecifier> | EditableList<VectorArrayTypeSpecifier>
     * | EditableList<VectorTypeSpecifier>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getTypes()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_types);
    }
    /**
     * @return EditableList<EditableNode> | EditableList<SimpleTypeSpecifier> |
     * EditableList<TupleTypeSpecifier> | EditableList<VectorArrayTypeSpecifier>
     * | EditableList<VectorTypeSpecifier>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getTypesx()
    {
        return $this->getTypes();
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
        return new static($this->_left_paren, $this->_types, $value);
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

