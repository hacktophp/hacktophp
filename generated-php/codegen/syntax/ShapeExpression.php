<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<7340a1b66509f40efaeeeebe2bc10795>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class ShapeExpression extends EditableNode
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
    private $_fields;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $fields, EditableNode $right_paren)
    {
        parent::__construct('shape_expression');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_fields = $fields;
        $this->_right_paren = $right_paren;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['shape_expression_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['shape_expression_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $fields = EditableNode::fromJSON($json['shape_expression_fields'], $file, $offset, $source);
        $offset += $fields->getWidth();
        $right_paren = EditableNode::fromJSON($json['shape_expression_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        return new static($keyword, $left_paren, $fields, $right_paren);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'fields' => $this->_fields, 'right_paren' => $this->_right_paren];
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $fields = $this->_fields->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $fields === $this->_fields && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($keyword, $left_paren, $fields, $right_paren);
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
        return new static($value, $this->_left_paren, $this->_fields, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return ShapeToken
     */
    /**
     * @return ShapeToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ShapeToken::class, $this->_keyword);
    }
    /**
     * @return ShapeToken
     */
    /**
     * @return ShapeToken
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
        return new static($this->_keyword, $value, $this->_fields, $this->_right_paren);
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
    public function getFieldsUNTYPED()
    {
        return $this->_fields;
    }
    /**
     * @return static
     */
    public function withFields(EditableNode $value)
    {
        if ($value === $this->_fields) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasFields()
    {
        return !$this->_fields->isMissing();
    }
    /**
     * @return EditableList<FieldInitializer> | null
     */
    /**
     * @return EditableList<FieldInitializer>|null
     */
    public function getFields()
    {
        if ($this->_fields->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_fields);
    }
    /**
     * @return EditableList<FieldInitializer>
     */
    /**
     * @return EditableList<FieldInitializer>
     */
    public function getFieldsx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_fields);
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
        return new static($this->_keyword, $this->_left_paren, $this->_fields, $value);
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

