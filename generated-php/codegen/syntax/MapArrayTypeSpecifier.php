<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b2c636f44514939bf1727d927bf52623>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class MapArrayTypeSpecifier extends EditableNode
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
    private $_right_angle;
    public function __construct(EditableNode $keyword, EditableNode $left_angle, EditableNode $key, EditableNode $comma, EditableNode $value, EditableNode $right_angle)
    {
        parent::__construct('map_array_type_specifier');
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_key = $key;
        $this->_comma = $comma;
        $this->_value = $value;
        $this->_right_angle = $right_angle;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['map_array_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_angle = EditableNode::fromJSON($json['map_array_left_angle'], $file, $offset, $source);
        $offset += $left_angle->getWidth();
        $key = EditableNode::fromJSON($json['map_array_key'], $file, $offset, $source);
        $offset += $key->getWidth();
        $comma = EditableNode::fromJSON($json['map_array_comma'], $file, $offset, $source);
        $offset += $comma->getWidth();
        $value = EditableNode::fromJSON($json['map_array_value'], $file, $offset, $source);
        $offset += $value->getWidth();
        $right_angle = EditableNode::fromJSON($json['map_array_right_angle'], $file, $offset, $source);
        $offset += $right_angle->getWidth();
        return new static($keyword, $left_angle, $key, $comma, $value, $right_angle);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'key' => $this->_key, 'comma' => $this->_comma, 'value' => $this->_value, 'right_angle' => $this->_right_angle];
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
        $left_angle = $this->_left_angle->rewrite($rewriter, $parents);
        $key = $this->_key->rewrite($rewriter, $parents);
        $comma = $this->_comma->rewrite($rewriter, $parents);
        $value = $this->_value->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $key === $this->_key && $comma === $this->_comma && $value === $this->_value && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($keyword, $left_angle, $key, $comma, $value, $right_angle);
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
        return new static($value, $this->_left_angle, $this->_key, $this->_comma, $this->_value, $this->_right_angle);
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
        return new static($this->_keyword, $value, $this->_key, $this->_comma, $this->_value, $this->_right_angle);
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
        return new static($this->_keyword, $this->_left_angle, $value, $this->_comma, $this->_value, $this->_right_angle);
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
        return new static($this->_keyword, $this->_left_angle, $this->_key, $value, $this->_value, $this->_right_angle);
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
        return new static($this->_keyword, $this->_left_angle, $this->_key, $this->_comma, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasValue()
    {
        return !$this->_value->isMissing();
    }
    /**
     * @return GenericTypeSpecifier | null | NullableTypeSpecifier |
     * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
     * TupleTypeSpecifier
     */
    /**
     * @return null|EditableNode
     */
    public function getValue()
    {
        if ($this->_value->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_value);
    }
    /**
     * @return GenericTypeSpecifier | NullableTypeSpecifier | ShapeTypeSpecifier
     * | SimpleTypeSpecifier | SoftTypeSpecifier | TupleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getValuex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_value);
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
        return new static($this->_keyword, $this->_left_angle, $this->_key, $this->_comma, $this->_value, $value);
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

