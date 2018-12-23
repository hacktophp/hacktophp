<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ed29e58ee125748d5d5476807e438f23>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ReifiedTypeArgument extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_reified;
    /**
     * @var EditableNode
     */
    private $_type;
    public function __construct(EditableNode $reified, EditableNode $type)
    {
        parent::__construct('reified_type_argument');
        $this->_reified = $reified;
        $this->_type = $type;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $reified = EditableNode::fromJSON($json['reified_type_argument_reified'], $file, $offset, $source);
        $offset += $reified->getWidth();
        $type = EditableNode::fromJSON($json['reified_type_argument_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        return new static($reified, $type);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('reified' => $this->_reified, 'type' => $this->_type);
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
        $reified = $this->_reified->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        if ($reified === $this->_reified && $type === $this->_type) {
            return $this;
        }
        return new static($reified, $type);
    }
    /**
     * @return EditableNode
     */
    public function getReifiedUNTYPED()
    {
        return $this->_reified;
    }
    /**
     * @return static
     */
    public function withReified(EditableNode $value)
    {
        if ($value === $this->_reified) {
            return $this;
        }
        return new static($value, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasReified()
    {
        return !$this->_reified->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getReified()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_reified);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getReifiedx()
    {
        return $this->getReified();
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
        return new static($this->_reified, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

