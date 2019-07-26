<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<af1ba4a413ae40871b0eb8d47f600bf7>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ClosureParameterTypeSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'closure_parameter_type_specifier';
    /**
     * @var null|InoutToken
     */
    private $_call_convention;
    /**
     * @var ITypeSpecifier
     */
    private $_type;
    public function __construct(?InoutToken $call_convention, ITypeSpecifier $type, ?__Private\SourceRef $source_ref = null)
    {
        $this->_call_convention = $call_convention;
        $this->_type = $type;
        parent::__construct($source_ref);
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $initial_offset, string $source, string $_type_hint)
    {
        $offset = $initial_offset;
        $call_convention = Node::fromJSON($json['closure_parameter_call_convention'], $file, $offset, $source, 'InoutToken');
        $offset += (($__tmp1__ = $call_convention) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $type = Node::fromJSON($json['closure_parameter_type'], $file, $offset, $source, 'ITypeSpecifier');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($call_convention, $type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['call_convention' => $this->_call_convention, 'type' => $this->_type]);
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return static
     */
    public function rewriteChildren(\Closure $rewriter, array $parents = [])
    {
        $parents[] = $this;
        $call_convention = $this->_call_convention === null ? null : $rewriter($this->_call_convention, $parents);
        $type = $rewriter($this->_type, $parents);
        if ($call_convention === $this->_call_convention && $type === $this->_type) {
            return $this;
        }
        return new static($call_convention, $type);
    }
    /**
     * @return null|Node
     */
    public function getCallConventionUNTYPED()
    {
        return $this->_call_convention;
    }
    /**
     * @return static
     */
    public function withCallConvention(?InoutToken $value)
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
        return $this->_call_convention !== null;
    }
    /**
     * @return null | InoutToken
     */
    /**
     * @return null|InoutToken
     */
    public function getCallConvention()
    {
        return $this->_call_convention;
    }
    /**
     * @return InoutToken
     */
    /**
     * @return InoutToken
     */
    public function getCallConventionx()
    {
        return TypeAssert\not_null($this->getCallConvention());
    }
    /**
     * @return null|Node
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(ITypeSpecifier $value)
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
        return $this->_type !== null;
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
     * TupleTypeSpecifier | TypeConstant
     */
    /**
     * @return ITypeSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
     * TupleTypeSpecifier | TypeConstant
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

