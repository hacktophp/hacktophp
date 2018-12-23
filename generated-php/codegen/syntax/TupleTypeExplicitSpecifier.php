<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class TupleTypeExplicitSpecifier extends EditableNode
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
    private $_types;
    /**
     * @var EditableNode
     */
    private $_right_angle;
    public function __construct(EditableNode $keyword, EditableNode $left_angle, EditableNode $types, EditableNode $right_angle)
    {
        parent::__construct('tuple_type_explicit_specifier');
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_types = $types;
        $this->_right_angle = $right_angle;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['tuple_type_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_angle = EditableNode::fromJSON($json['tuple_type_left_angle'], $file, $offset, $source);
        $offset += $left_angle->getWidth();
        $types = EditableNode::fromJSON($json['tuple_type_types'], $file, $offset, $source);
        $offset += $types->getWidth();
        $right_angle = EditableNode::fromJSON($json['tuple_type_right_angle'], $file, $offset, $source);
        $offset += $right_angle->getWidth();
        return new static($keyword, $left_angle, $types, $right_angle);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'types' => $this->_types, 'right_angle' => $this->_right_angle);
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
        $types = $this->_types->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $types === $this->_types && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($keyword, $left_angle, $types, $right_angle);
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
        return new static($value, $this->_left_angle, $this->_types, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_keyword);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
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
        return new static($this->_keyword, $value, $this->_types, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasLeftAngle()
    {
        return !$this->_left_angle->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getLeftAngle()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_left_angle);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getLeftAnglex()
    {
        return $this->getLeftAngle();
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
        return new static($this->_keyword, $this->_left_angle, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasTypes()
    {
        return !$this->_types->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getTypes()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_types);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getTypesx()
    {
        return $this->getTypes();
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
        return new static($this->_keyword, $this->_left_angle, $this->_types, $value);
    }
    /**
     * @return bool
     */
    public function hasRightAngle()
    {
        return !$this->_right_angle->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getRightAngle()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_right_angle);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getRightAnglex()
    {
        return $this->getRightAngle();
    }
}

