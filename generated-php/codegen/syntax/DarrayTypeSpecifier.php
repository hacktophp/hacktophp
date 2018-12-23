<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class DarrayTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_left_angle;
    /**
     * @var EditableNode
     */
    private $_key;
    /**
     * @var EditableNode
     */
    private $_comma;
    /**
     * @var EditableNode
     */
    private $_value;
    /**
     * @var EditableNode
     */
    private $_trailing_comma;
    /**
     * @var EditableNode
     */
    private $_right_angle;
    public function __construct(EditableNode $keyword, EditableNode $left_angle, EditableNode $key, EditableNode $comma, EditableNode $value, EditableNode $trailing_comma, EditableNode $right_angle)
    {
        parent::__construct('darray_type_specifier');
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_key = $key;
        $this->_comma = $comma;
        $this->_value = $value;
        $this->_trailing_comma = $trailing_comma;
        $this->_right_angle = $right_angle;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['darray_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_angle = EditableNode::fromJSON($json['darray_left_angle'], $file, $offset, $source);
        $offset += $left_angle->getWidth();
        $key = EditableNode::fromJSON($json['darray_key'], $file, $offset, $source);
        $offset += $key->getWidth();
        $comma = EditableNode::fromJSON($json['darray_comma'], $file, $offset, $source);
        $offset += $comma->getWidth();
        $value = EditableNode::fromJSON($json['darray_value'], $file, $offset, $source);
        $offset += $value->getWidth();
        $trailing_comma = EditableNode::fromJSON($json['darray_trailing_comma'], $file, $offset, $source);
        $offset += $trailing_comma->getWidth();
        $right_angle = EditableNode::fromJSON($json['darray_right_angle'], $file, $offset, $source);
        $offset += $right_angle->getWidth();
        return new static($keyword, $left_angle, $key, $comma, $value, $trailing_comma, $right_angle);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'key' => $this->_key, 'comma' => $this->_comma, 'value' => $this->_value, 'trailing_comma' => $this->_trailing_comma, 'right_angle' => $this->_right_angle);
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
        $left_angle = $this->_left_angle->rewrite($rewriter, $parents);
        $key = $this->_key->rewrite($rewriter, $parents);
        $comma = $this->_comma->rewrite($rewriter, $parents);
        $value = $this->_value->rewrite($rewriter, $parents);
        $trailing_comma = $this->_trailing_comma->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $key === $this->_key && $comma === $this->_comma && $value === $this->_value && $trailing_comma === $this->_trailing_comma && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($keyword, $left_angle, $key, $comma, $value, $trailing_comma, $right_angle);
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
        return new static($value, $this->_left_angle, $this->_key, $this->_comma, $this->_value, $this->_trailing_comma, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return DarrayToken
     */
    /**
     * @return DarrayToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(DarrayToken::class, $this->_keyword);
    }
    /**
     * @return DarrayToken
     */
    /**
     * @return DarrayToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getLeftAngleUNTYPED()
    {
        return $this->_left_angle;
    }
    /**
     * @return static
     */
    public function withLeftAngle(EditableNode $value)
    {
        if ($value === $this->_left_angle) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_key, $this->_comma, $this->_value, $this->_trailing_comma, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasLeftAngle()
    {
        return !$this->_left_angle->isMissing();
    }
    /**
     * @return LessThanToken
     */
    /**
     * @return LessThanToken
     */
    public function getLeftAngle()
    {
        return TypeAssert\instance_of(LessThanToken::class, $this->_left_angle);
    }
    /**
     * @return LessThanToken
     */
    /**
     * @return LessThanToken
     */
    public function getLeftAnglex()
    {
        return $this->getLeftAngle();
    }
    /**
     * @return EditableNode
     */
    public function getKeyUNTYPED()
    {
        return $this->_key;
    }
    /**
     * @return static
     */
    public function withKey(EditableNode $value)
    {
        if ($value === $this->_key) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $value, $this->_comma, $this->_value, $this->_trailing_comma, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasKey()
    {
        return !$this->_key->isMissing();
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getKey()
    {
        return TypeAssert\instance_of(SimpleTypeSpecifier::class, $this->_key);
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getKeyx()
    {
        return $this->getKey();
    }
    /**
     * @return EditableNode
     */
    public function getCommaUNTYPED()
    {
        return $this->_comma;
    }
    /**
     * @return static
     */
    public function withComma(EditableNode $value)
    {
        if ($value === $this->_comma) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $this->_key, $value, $this->_value, $this->_trailing_comma, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasComma()
    {
        return !$this->_comma->isMissing();
    }
    /**
     * @return CommaToken
     */
    /**
     * @return CommaToken
     */
    public function getComma()
    {
        return TypeAssert\instance_of(CommaToken::class, $this->_comma);
    }
    /**
     * @return CommaToken
     */
    /**
     * @return CommaToken
     */
    public function getCommax()
    {
        return $this->getComma();
    }
    /**
     * @return EditableNode
     */
    public function getValueUNTYPED()
    {
        return $this->_value;
    }
    /**
     * @return static
     */
    public function withValue(EditableNode $value)
    {
        if ($value === $this->_value) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $this->_key, $this->_comma, $value, $this->_trailing_comma, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasValue()
    {
        return !$this->_value->isMissing();
    }
    /**
     * @return DarrayTypeSpecifier | SimpleTypeSpecifier | VarrayTypeSpecifier |
     * VectorArrayTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getValue()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_value);
    }
    /**
     * @return DarrayTypeSpecifier | SimpleTypeSpecifier | VarrayTypeSpecifier |
     * VectorArrayTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getValuex()
    {
        return $this->getValue();
    }
    /**
     * @return EditableNode
     */
    public function getTrailingCommaUNTYPED()
    {
        return $this->_trailing_comma;
    }
    /**
     * @return static
     */
    public function withTrailingComma(EditableNode $value)
    {
        if ($value === $this->_trailing_comma) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $this->_key, $this->_comma, $this->_value, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasTrailingComma()
    {
        return !$this->_trailing_comma->isMissing();
    }
    /**
     * @return null
     */
    /**
     * @return null|EditableNode
     */
    public function getTrailingComma()
    {
        if ($this->_trailing_comma->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_trailing_comma);
    }
    /**
     * @return
     */
    /**
     * @return EditableNode
     */
    public function getTrailingCommax()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_trailing_comma);
    }
    /**
     * @return EditableNode
     */
    public function getRightAngleUNTYPED()
    {
        return $this->_right_angle;
    }
    /**
     * @return static
     */
    public function withRightAngle(EditableNode $value)
    {
        if ($value === $this->_right_angle) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_angle, $this->_key, $this->_comma, $this->_value, $this->_trailing_comma, $value);
    }
    /**
     * @return bool
     */
    public function hasRightAngle()
    {
        return !$this->_right_angle->isMissing();
    }
    /**
     * @return GreaterThanToken
     */
    /**
     * @return GreaterThanToken
     */
    public function getRightAngle()
    {
        return TypeAssert\instance_of(GreaterThanToken::class, $this->_right_angle);
    }
    /**
     * @return GreaterThanToken
     */
    /**
     * @return GreaterThanToken
     */
    public function getRightAnglex()
    {
        return $this->getRightAngle();
    }
}

