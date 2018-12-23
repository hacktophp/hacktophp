<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<2e9c7ea3792ff3bcc7d8955a6d35c51f>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class XHPSimpleClassAttribute extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_type;
    public function __construct(EditableNode $type)
    {
        parent::__construct('xhp_simple_class_attribute');
        $this->_type = $type;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $type = EditableNode::fromJSON($json['xhp_simple_class_attribute_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        return new static($type);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('type' => $this->_type);
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
        $type = $this->_type->rewrite($rewriter, $parents);
        if ($type === $this->_type) {
            return $this;
        }
        return new static($type);
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
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(SimpleTypeSpecifier::class, $this->_type);
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

