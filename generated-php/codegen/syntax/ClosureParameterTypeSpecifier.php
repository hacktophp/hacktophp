<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6ec29544b823cff8da2fcf41b8d5f5cf>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ClosureParameterTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_call_convention;
    /**
     * @var EditableNode
     */
    private $_type;
    public function __construct(EditableNode $call_convention, EditableNode $type)
    {
        parent::__construct('closure_parameter_type_specifier');
        $this->_call_convention = $call_convention;
        $this->_type = $type;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $call_convention = EditableNode::fromJSON($json['closure_parameter_call_convention'], $file, $offset, $source);
        $offset += $call_convention->getWidth();
        $type = EditableNode::fromJSON($json['closure_parameter_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        return new static($call_convention, $type);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('call_convention' => $this->_call_convention, 'type' => $this->_type);
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
        if ($call_convention === $this->_call_convention && $type === $this->_type) {
            return $this;
        }
        return new static($call_convention, $type);
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
        return new static($value, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasCallConvention()
    {
        return !$this->_call_convention->isMissing();
    }
    /**
     * @return null | InoutToken
     */
    /**
     * @return null|InoutToken
     */
    public function getCallConvention()
    {
        if ($this->_call_convention->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(InoutToken::class, $this->_call_convention);
    }
    /**
     * @return InoutToken
     */
    /**
     * @return InoutToken
     */
    public function getCallConventionx()
    {
        return TypeAssert\instance_of(InoutToken::class, $this->_call_convention);
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
        return new static($this->_call_convention, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return GenericTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier
     * | SoftTypeSpecifier | TupleTypeSpecifier | TypeConstant
     */
    /**
     * @return EditableNode
     */
    public function getType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return GenericTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier
     * | SoftTypeSpecifier | TupleTypeSpecifier | TypeConstant
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

