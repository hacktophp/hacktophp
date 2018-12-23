<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ShapeTypeSpecifier extends EditableNode
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
    private $_ellipsis;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $fields, EditableNode $ellipsis, EditableNode $right_paren)
    {
        parent::__construct('shape_type_specifier');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_fields = $fields;
        $this->_ellipsis = $ellipsis;
        $this->_right_paren = $right_paren;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['shape_type_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['shape_type_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $fields = EditableNode::fromJSON($json['shape_type_fields'], $file, $offset, $source);
        $offset += $fields->getWidth();
        $ellipsis = EditableNode::fromJSON($json['shape_type_ellipsis'], $file, $offset, $source);
        $offset += $ellipsis->getWidth();
        $right_paren = EditableNode::fromJSON($json['shape_type_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        return new static($keyword, $left_paren, $fields, $ellipsis, $right_paren);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'fields' => $this->_fields, 'ellipsis' => $this->_ellipsis, 'right_paren' => $this->_right_paren);
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
        $fields = $this->_fields->rewrite($rewriter, $parents);
        $ellipsis = $this->_ellipsis->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $fields === $this->_fields && $ellipsis === $this->_ellipsis && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($keyword, $left_paren, $fields, $ellipsis, $right_paren);
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
        return new static($value, $this->_left_paren, $this->_fields, $this->_ellipsis, $this->_right_paren);
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
        return new static($this->_keyword, $value, $this->_fields, $this->_ellipsis, $this->_right_paren);
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
        return new static($this->_keyword, $this->_left_paren, $value, $this->_ellipsis, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasFields()
    {
        return !$this->_fields->isMissing();
    }
    /**
     * @return EditableList<FieldSpecifier> | null
     */
    /**
     * @return EditableList<FieldSpecifier>|null
     */
    public function getFields()
    {
        if ($this->_fields->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_fields);
    }
    /**
     * @return EditableList<FieldSpecifier>
     */
    /**
     * @return EditableList<FieldSpecifier>
     */
    public function getFieldsx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_fields);
    }
    /**
     * @return EditableNode
     */
    public function getEllipsisUNTYPED()
    {
        return $this->_ellipsis;
    }
    /**
     * @return static
     */
    public function withEllipsis(EditableNode $value)
    {
        if ($value === $this->_ellipsis) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_fields, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasEllipsis()
    {
        return !$this->_ellipsis->isMissing();
    }
    /**
     * @return null | DotDotDotToken
     */
    /**
     * @return null|DotDotDotToken
     */
    public function getEllipsis()
    {
        if ($this->_ellipsis->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(DotDotDotToken::class, $this->_ellipsis);
    }
    /**
     * @return DotDotDotToken
     */
    /**
     * @return DotDotDotToken
     */
    public function getEllipsisx()
    {
        return TypeAssert\instance_of(DotDotDotToken::class, $this->_ellipsis);
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
        return new static($this->_keyword, $this->_left_paren, $this->_fields, $this->_ellipsis, $value);
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

