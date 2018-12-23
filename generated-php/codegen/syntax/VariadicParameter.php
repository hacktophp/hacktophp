<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b72721ecae227204e9c77ab745e6c3a6>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class VariadicParameter extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_call_convention;
    /**
     * @var EditableNode
     */
    private $_type;
    /**
     * @var EditableNode
     */
    private $_ellipsis;
    public function __construct(EditableNode $call_convention, EditableNode $type, EditableNode $ellipsis)
    {
        parent::__construct('variadic_parameter');
        $this->_call_convention = $call_convention;
        $this->_type = $type;
        $this->_ellipsis = $ellipsis;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $call_convention = EditableNode::fromJSON($json['variadic_parameter_call_convention'], $file, $offset, $source);
        $offset += $call_convention->getWidth();
        $type = EditableNode::fromJSON($json['variadic_parameter_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $ellipsis = EditableNode::fromJSON($json['variadic_parameter_ellipsis'], $file, $offset, $source);
        $offset += $ellipsis->getWidth();
        return new static($call_convention, $type, $ellipsis);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('call_convention' => $this->_call_convention, 'type' => $this->_type, 'ellipsis' => $this->_ellipsis);
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
        $call_convention = $this->_call_convention->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $ellipsis = $this->_ellipsis->rewrite($rewriter, $parents);
        if ($call_convention === $this->_call_convention && $type === $this->_type && $ellipsis === $this->_ellipsis) {
            return $this;
        }
        return new static($call_convention, $type, $ellipsis);
    }
    /**
     * @return EditableNode
     */
    public function getCallConventionUNTYPED()
    {
        return $this->_call_convention;
    }
    /**
     * @return static
     */
    public function withCallConvention(EditableNode $value)
    {
        if ($value === $this->_call_convention) {
            return $this;
        }
        return new static($value, $this->_type, $this->_ellipsis);
    }
    /**
     * @return bool
     */
    public function hasCallConvention()
    {
        return !$this->_call_convention->isMissing();
    }
    /**
     * @return null
     */
    /**
     * @return null|EditableNode
     */
    public function getCallConvention()
    {
        if ($this->_call_convention->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_call_convention);
    }
    /**
     * @return
     */
    /**
     * @return EditableNode
     */
    public function getCallConventionx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_call_convention);
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
        return new static($this->_call_convention, $value, $this->_ellipsis);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return ClosureTypeSpecifier | null | SimpleTypeSpecifier |
     * TupleTypeSpecifier
     */
    /**
     * @return null|EditableNode
     */
    public function getType()
    {
        if ($this->_type->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | SimpleTypeSpecifier | TupleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return EditableNode
     */
    public function getEllipsisUNTYPED()
    {
        return $this->_ellipsis;
    }
    /**
     * @return static
     */
    public function withEllipsis(EditableNode $value)
    {
        if ($value === $this->_ellipsis) {
            return $this;
        }
        return new static($this->_call_convention, $this->_type, $value);
    }
    /**
     * @return bool
     */
    public function hasEllipsis()
    {
        return !$this->_ellipsis->isMissing();
    }
    /**
     * @return DotDotDotToken
     */
    /**
     * @return DotDotDotToken
     */
    public function getEllipsis()
    {
        return TypeAssert\instance_of(DotDotDotToken::class, $this->_ellipsis);
    }
    /**
     * @return DotDotDotToken
     */
    /**
     * @return DotDotDotToken
     */
    public function getEllipsisx()
    {
        return $this->getEllipsis();
    }
}

