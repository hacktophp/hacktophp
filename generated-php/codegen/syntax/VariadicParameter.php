<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1a5b716a62a2550a151b879d3de6e51d>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class VariadicParameter extends Node implements IHasTypeHint, IParameter, ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'variadic_parameter';
    /**
     * @var null|Node
     */
    private $_call_convention;
    /**
     * @var null|ITypeSpecifier
     */
    private $_type;
    /**
     * @var DotDotDotToken
     */
    private $_ellipsis;
    public function __construct(?Node $call_convention, ?ITypeSpecifier $type, DotDotDotToken $ellipsis, ?array $source_ref = null)
    {
        $this->_call_convention = $call_convention;
        $this->_type = $type;
        $this->_ellipsis = $ellipsis;
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
        $call_convention = Node::fromJSON($json['variadic_parameter_call_convention'], $file, $offset, $source, 'Node');
        $offset += (($__tmp1__ = $call_convention) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $type = Node::fromJSON($json['variadic_parameter_type'], $file, $offset, $source, 'ITypeSpecifier');
        $offset += (($__tmp2__ = $type) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $ellipsis = Node::fromJSON($json['variadic_parameter_ellipsis'], $file, $offset, $source, 'DotDotDotToken');
        $ellipsis = $ellipsis !== null ? $ellipsis : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $ellipsis->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($call_convention, $type, $ellipsis, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['call_convention' => $this->_call_convention, 'type' => $this->_type, 'ellipsis' => $this->_ellipsis]);
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
        $type = $this->_type === null ? null : $rewriter($this->_type, $parents);
        $ellipsis = $rewriter($this->_ellipsis, $parents);
        if ($call_convention === $this->_call_convention && $type === $this->_type && $ellipsis === $this->_ellipsis) {
            return $this;
        }
        return new static($call_convention, $type, $ellipsis);
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
    public function withCallConvention(?Node $value)
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
        return $this->_call_convention !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
     */
    public function getCallConvention()
    {
        return $this->_call_convention;
    }
    /**
     * @return
     */
    /**
     * @return Node
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
    public function withType(?ITypeSpecifier $value)
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
        return $this->_type !== null;
    }
    /**
     * @return ClosureTypeSpecifier | null | SimpleTypeSpecifier |
     * TupleTypeSpecifier
     */
    /**
     * @return null|ITypeSpecifier
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @return ClosureTypeSpecifier | SimpleTypeSpecifier | TupleTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return TypeAssert\not_null($this->getType());
    }
    /**
     * @return null|Node
     */
    public function getEllipsisUNTYPED()
    {
        return $this->_ellipsis;
    }
    /**
     * @return static
     */
    public function withEllipsis(DotDotDotToken $value)
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
        return $this->_ellipsis !== null;
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

