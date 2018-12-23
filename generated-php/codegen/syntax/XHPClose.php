<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class XHPClose extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_angle;
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_right_angle;
    public function __construct(EditableNode $left_angle, EditableNode $name, EditableNode $right_angle)
    {
        parent::__construct('xhp_close');
        $this->_left_angle = $left_angle;
        $this->_name = $name;
        $this->_right_angle = $right_angle;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_angle = EditableNode::fromJSON($json['xhp_close_left_angle'], $file, $offset, $source);
        $offset += $left_angle->getWidth();
        $name = EditableNode::fromJSON($json['xhp_close_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $right_angle = EditableNode::fromJSON($json['xhp_close_right_angle'], $file, $offset, $source);
        $offset += $right_angle->getWidth();
        return new static($left_angle, $name, $right_angle);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('left_angle' => $this->_left_angle, 'name' => $this->_name, 'right_angle' => $this->_right_angle);
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
        $left_angle = $this->_left_angle->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
        if ($left_angle === $this->_left_angle && $name === $this->_name && $right_angle === $this->_right_angle) {
            return $this;
        }
        return new static($left_angle, $name, $right_angle);
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
        return new static($value, $this->_name, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasLeftAngle()
    {
        return !$this->_left_angle->isMissing();
    }
    /**
     * @return LessThanToken | LessThanSlashToken | EndOfFileToken
     */
    /**
     * @return EditableToken
     */
    public function getLeftAngle()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_left_angle);
    }
    /**
     * @return LessThanToken | LessThanSlashToken | EndOfFileToken
     */
    /**
     * @return EditableToken
     */
    public function getLeftAnglex()
    {
        return $this->getLeftAngle();
    }
    /**
     * @return EditableNode
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(EditableNode $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_left_angle, $value, $this->_right_angle);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return null | XHPElementNameToken
     */
    /**
     * @return null|XHPElementNameToken
     */
    public function getName()
    {
        if ($this->_name->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(XHPElementNameToken::class, $this->_name);
    }
    /**
     * @return XHPElementNameToken
     */
    /**
     * @return XHPElementNameToken
     */
    public function getNamex()
    {
        return TypeAssert\instance_of(XHPElementNameToken::class, $this->_name);
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
        return new static($this->_left_angle, $this->_name, $value);
    }
    /**
     * @return bool
     */
    public function hasRightAngle()
    {
        return !$this->_right_angle->isMissing();
    }
    /**
     * @return null | GreaterThanToken
     */
    /**
     * @return null|GreaterThanToken
     */
    public function getRightAngle()
    {
        if ($this->_right_angle->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(GreaterThanToken::class, $this->_right_angle);
    }
}

