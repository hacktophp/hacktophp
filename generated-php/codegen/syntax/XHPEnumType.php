<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8f735c3b9856fa6c95abe9d4f9708260>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class XHPEnumType extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_optional;
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_left_brace;
    /**
     * @var EditableNode
     */
    private $_values;
    /**
     * @var EditableNode
     */
    private $_right_brace;
    public function __construct(EditableNode $optional, EditableNode $keyword, EditableNode $left_brace, EditableNode $values, EditableNode $right_brace)
    {
        parent::__construct('xhp_enum_type');
        $this->_optional = $optional;
        $this->_keyword = $keyword;
        $this->_left_brace = $left_brace;
        $this->_values = $values;
        $this->_right_brace = $right_brace;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $optional = EditableNode::fromJSON($json['xhp_enum_optional'], $file, $offset, $source);
        $offset += $optional->getWidth();
        $keyword = EditableNode::fromJSON($json['xhp_enum_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_brace = EditableNode::fromJSON($json['xhp_enum_left_brace'], $file, $offset, $source);
        $offset += $left_brace->getWidth();
        $values = EditableNode::fromJSON($json['xhp_enum_values'], $file, $offset, $source);
        $offset += $values->getWidth();
        $right_brace = EditableNode::fromJSON($json['xhp_enum_right_brace'], $file, $offset, $source);
        $offset += $right_brace->getWidth();
        return new static($optional, $keyword, $left_brace, $values, $right_brace);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['optional' => $this->_optional, 'keyword' => $this->_keyword, 'left_brace' => $this->_left_brace, 'values' => $this->_values, 'right_brace' => $this->_right_brace];
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
        $optional = $this->_optional->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $values = $this->_values->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
        if ($optional === $this->_optional && $keyword === $this->_keyword && $left_brace === $this->_left_brace && $values === $this->_values && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($optional, $keyword, $left_brace, $values, $right_brace);
    }
    /**
     * @return EditableNode
     */
    public function getOptionalUNTYPED()
    {
        return $this->_optional;
    }
    /**
     * @return static
     */
    public function withOptional(EditableNode $value)
    {
        if ($value === $this->_optional) {
            return $this;
        }
        return new static($value, $this->_keyword, $this->_left_brace, $this->_values, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasOptional()
    {
        return !$this->_optional->isMissing();
    }
    /**
     * @return null
     */
    /**
     * @return null|EditableNode
     */
    public function getOptional()
    {
        if ($this->_optional->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_optional);
    }
    /**
     * @return
     */
    /**
     * @return EditableNode
     */
    public function getOptionalx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_optional);
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
        return new static($this->_optional, $value, $this->_left_brace, $this->_values, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return EnumToken
     */
    /**
     * @return EnumToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(EnumToken::class, $this->_keyword);
    }
    /**
     * @return EnumToken
     */
    /**
     * @return EnumToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(EditableNode $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($this->_optional, $this->_keyword, $value, $this->_values, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return !$this->_left_brace->isMissing();
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBrace()
    {
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return EditableNode
     */
    public function getValuesUNTYPED()
    {
        return $this->_values;
    }
    /**
     * @return static
     */
    public function withValues(EditableNode $value)
    {
        if ($value === $this->_values) {
            return $this;
        }
        return new static($this->_optional, $this->_keyword, $this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasValues()
    {
        return !$this->_values->isMissing();
    }
    /**
     * @return EditableList<LiteralExpression>
     */
    /**
     * @return EditableList<LiteralExpression>
     */
    public function getValues()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_values);
    }
    /**
     * @return EditableList<LiteralExpression>
     */
    /**
     * @return EditableList<LiteralExpression>
     */
    public function getValuesx()
    {
        return $this->getValues();
    }
    /**
     * @return EditableNode
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(EditableNode $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_optional, $this->_keyword, $this->_left_brace, $this->_values, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return !$this->_right_brace->isMissing();
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBrace()
    {
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

