<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<fd033f8de6409e2ed7f6a5e807a1a164>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class XHPClassAttribute extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_type;
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_initializer;
    /**
     * @var EditableNode
     */
    private $_required;
    public function __construct(EditableNode $type, EditableNode $name, EditableNode $initializer, EditableNode $required)
    {
        parent::__construct('xhp_class_attribute');
        $this->_type = $type;
        $this->_name = $name;
        $this->_initializer = $initializer;
        $this->_required = $required;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $type = EditableNode::fromJSON($json['xhp_attribute_decl_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $name = EditableNode::fromJSON($json['xhp_attribute_decl_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $initializer = EditableNode::fromJSON($json['xhp_attribute_decl_initializer'], $file, $offset, $source);
        $offset += $initializer->getWidth();
        $required = EditableNode::fromJSON($json['xhp_attribute_decl_required'], $file, $offset, $source);
        $offset += $required->getWidth();
        return new static($type, $name, $initializer, $required);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('type' => $this->_type, 'name' => $this->_name, 'initializer' => $this->_initializer, 'required' => $this->_required);
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
        $name = $this->_name->rewrite($rewriter, $parents);
        $initializer = $this->_initializer->rewrite($rewriter, $parents);
        $required = $this->_required->rewrite($rewriter, $parents);
        if ($type === $this->_type && $name === $this->_name && $initializer === $this->_initializer && $required === $this->_required) {
            return $this;
        }
        return new static($type, $name, $initializer, $required);
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
        return new static($value, $this->_name, $this->_initializer, $this->_required);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return GenericTypeSpecifier | MapArrayTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier | VectorArrayTypeSpecifier |
     * XHPEnumType
     */
    /**
     * @return EditableNode
     */
    public function getType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return GenericTypeSpecifier | MapArrayTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier | VectorArrayTypeSpecifier |
     * XHPEnumType
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
        return new static($this->_type, $value, $this->_initializer, $this->_required);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return XHPElementNameToken
     */
    /**
     * @return XHPElementNameToken
     */
    public function getName()
    {
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
        return $this->getName();
    }
    /**
     * @return EditableNode
     */
    public function getInitializerUNTYPED()
    {
        return $this->_initializer;
    }
    /**
     * @return static
     */
    public function withInitializer(EditableNode $value)
    {
        if ($value === $this->_initializer) {
            return $this;
        }
        return new static($this->_type, $this->_name, $value, $this->_required);
    }
    /**
     * @return bool
     */
    public function hasInitializer()
    {
        return !$this->_initializer->isMissing();
    }
    /**
     * @return null | SimpleInitializer
     */
    /**
     * @return null|SimpleInitializer
     */
    public function getInitializer()
    {
        if ($this->_initializer->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(SimpleInitializer::class, $this->_initializer);
    }
    /**
     * @return SimpleInitializer
     */
    /**
     * @return SimpleInitializer
     */
    public function getInitializerx()
    {
        return TypeAssert\instance_of(SimpleInitializer::class, $this->_initializer);
    }
    /**
     * @return EditableNode
     */
    public function getRequiredUNTYPED()
    {
        return $this->_required;
    }
    /**
     * @return static
     */
    public function withRequired(EditableNode $value)
    {
        if ($value === $this->_required) {
            return $this;
        }
        return new static($this->_type, $this->_name, $this->_initializer, $value);
    }
    /**
     * @return bool
     */
    public function hasRequired()
    {
        return !$this->_required->isMissing();
    }
    /**
     * @return null | XHPRequired
     */
    /**
     * @return null|XHPRequired
     */
    public function getRequired()
    {
        if ($this->_required->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(XHPRequired::class, $this->_required);
    }
    /**
     * @return XHPRequired
     */
    /**
     * @return XHPRequired
     */
    public function getRequiredx()
    {
        return TypeAssert\instance_of(XHPRequired::class, $this->_required);
    }
}

