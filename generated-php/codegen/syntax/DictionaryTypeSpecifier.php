<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3a49fd643b95b441259ebc8c30034aef>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class DictionaryTypeSpecifier extends EditableNode
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
    private $_members;
    /**
     * @var EditableNode
     */
    private $_right_angle;
    public function __construct(EditableNode $keyword, EditableNode $left_angle, EditableNode $members, EditableNode $right_angle)
    {
        parent::__construct('dictionary_type_specifier');
        $this->_keyword = $keyword;
        $this->_left_angle = $left_angle;
        $this->_members = $members;
        $this->_right_angle = $right_angle;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['dictionary_type_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_angle = EditableNode::fromJSON($json['dictionary_type_left_angle'], $file, $offset, $source);
        $offset += $left_angle->getWidth();
        $members = EditableNode::fromJSON($json['dictionary_type_members'], $file, $offset, $source);
        $offset += $members->getWidth();
        $right_angle = EditableNode::fromJSON($json['dictionary_type_right_angle'], $file, $offset, $source);
        $offset += $right_angle->getWidth();
        return new static($keyword, $left_angle, $members, $right_angle);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_angle' => $this->_left_angle, 'members' => $this->_members, 'right_angle' => $this->_right_angle);
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
        $members = $this->_members->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_angle === $this->_left_angle && $members === $this->_members && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($keyword, $left_angle, $members, $right_angle);
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
        return new static($value, $this->_left_angle, $this->_members, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return DictToken
     */
    /**
     * @return DictToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(DictToken::class, $this->_keyword);
    }
    /**
     * @return DictToken
     */
    /**
     * @return DictToken
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
        return new static($this->_keyword, $value, $this->_members, $this->_right_angle);
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
        return new static($this->_keyword, $this->_left_angle, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasMembers()
    {
        return !$this->_members->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | EditableList<SimpleTypeSpecifier>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getMembers()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_members);
    }
    /**
     * @return EditableList<EditableNode> | EditableList<SimpleTypeSpecifier>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getMembersx()
    {
        return $this->getMembers();
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
        return new static($this->_keyword, $this->_left_angle, $this->_members, $value);
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

