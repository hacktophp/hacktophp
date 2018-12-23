<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8a5328ddb2884528c7791b14d1d8912e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class PrefixedStringExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_str;
    public function __construct(EditableNode $name, EditableNode $str)
    {
        parent::__construct('prefixed_string_expression');
        $this->_name = $name;
        $this->_str = $str;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $name = EditableNode::fromJSON($json['prefixed_string_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $str = EditableNode::fromJSON($json['prefixed_string_str'], $file, $offset, $source);
        $offset += $str->getWidth();
        return new static($name, $str);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('name' => $this->_name, 'str' => $this->_str);
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
        $name = $this->_name->rewrite($rewriter, $parents);
        $str = $this->_str->rewrite($rewriter, $parents);
        if ($name === $this->_name && $str === $this->_str) {
            return $this;
        }
        return new static($name, $str);
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
        return new static($value, $this->_str);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getName()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_name);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return EditableNode
     */
    public function getStrUNTYPED()
    {
        return $this->_str;
    }
    /**
     * @return static
     */
    public function withStr(EditableNode $value)
    {
        if ($value === $this->_str) {
            return $this;
        }
        return new static($this->_name, $value);
    }
    /**
     * @return bool
     */
    public function hasStr()
    {
        return !$this->_str->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getStr()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_str);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getStrx()
    {
        return $this->getStr();
    }
}

