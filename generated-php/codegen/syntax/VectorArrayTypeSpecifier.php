<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<20fa8999e65132e2dadd524b825f7fa7>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class VectorArrayTypeSpecifier extends EditableNode
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
    private $_type;
    /**
     * @var EditableNode
     */
    private $_right_angle;
    public function __construct(EditableNode $keyword, EditableNode $left_angle, EditableNode $type, EditableNode $right_angle)
    {
        parent::__construct('vector_array_type_specifier');
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_type = $type;
        $this->_right_angle = $right_angle;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['vector_array_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_angle = EditableNode::fromJSON($json['vector_array_left_angle'], $file, $offset, $source);
        $offset += $left_angle->getWidth();
        $type = EditableNode::fromJSON($json['vector_array_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $right_angle = EditableNode::fromJSON($json['vector_array_right_angle'], $file, $offset, $source);
        $offset += $right_angle->getWidth();
        return new static($keyword, $left_angle, $type, $right_angle);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'type' => $this->_type, 'right_angle' => $this->_right_angle];
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
        $type = $this->_type->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $type === $this->_type && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($keyword, $left_angle, $type, $right_angle);
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
        return new static($value, $this->_left_angle, $this->_type, $this->_right_angle);
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
        return new static($this->_keyword, $value, $this->_type, $this->_right_angle);
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
        return new static($this->_keyword, $this->_left_angle, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return DarrayTypeSpecifier | GenericTypeSpecifier | MapArrayTypeSpecifier
     * | NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier | VarrayTypeSpecifier | VectorArrayTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return DarrayTypeSpecifier | GenericTypeSpecifier | MapArrayTypeSpecifier
     * | NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier | VarrayTypeSpecifier | VectorArrayTypeSpecifier
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
        return new static($this->_keyword, $this->_left_angle, $this->_type, $value);
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

