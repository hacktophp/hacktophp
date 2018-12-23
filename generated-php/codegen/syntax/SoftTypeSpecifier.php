<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d1cfee3afd819a945841c2ac9b1e77c3>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class SoftTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_at;
    /**
     * @var EditableNode
     */
    private $_type;
    public function __construct(EditableNode $at, EditableNode $type)
    {
        parent::__construct('soft_type_specifier');
        $this->_at = $at;
        $this->_type = $type;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $at = EditableNode::fromJSON($json['soft_at'], $file, $offset, $source);
        $offset += $at->getWidth();
        $type = EditableNode::fromJSON($json['soft_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        return new static($at, $type);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('at' => $this->_at, 'type' => $this->_type);
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
        $at = $this->_at->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        if ($at === $this->_at && $type === $this->_type) {
            return $this;
        }
        return new static($at, $type);
    }
    /**
     * @return EditableNode
     */
    public function getAtUNTYPED()
    {
        return $this->_at;
    }
    /**
     * @return static
     */
    public function withAt(EditableNode $value)
    {
        if ($value === $this->_at) {
            return $this;
        }
        return new static($value, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasAt()
    {
        return !$this->_at->isMissing();
    }
    /**
     * @return AtToken
     */
    /**
     * @return AtToken
     */
    public function getAt()
    {
        return TypeAssert\instance_of(AtToken::class, $this->_at);
    }
    /**
     * @return AtToken
     */
    /**
     * @return AtToken
     */
    public function getAtx()
    {
        return $this->getAt();
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
        return new static($this->_at, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * MapArrayTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * MapArrayTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

