<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9da8795b1761ca14331658cb590da295>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPClassAttribute extends Node implements IXHPAttribute
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_class_attribute';
    /**
     * @var ITypeSpecifier
     */
    private $_type;
    /**
     * @var XHPElementNameToken
     */
    private $_name;
    /**
     * @var null|SimpleInitializer
     */
    private $_initializer;
    /**
     * @var null|Node
     */
    private $_required;
    public function __construct(ITypeSpecifier $type, XHPElementNameToken $name, ?SimpleInitializer $initializer, ?Node $required, ?__Private\SourceRef $source_ref = null)
    {
        $this->_type = $type;
        $this->_name = $name;
        $this->_initializer = $initializer;
        $this->_required = $required;
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
        $type = Node::fromJSON($json['xhp_attribute_decl_type'], $file, $offset, $source, 'ITypeSpecifier');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $name = Node::fromJSON($json['xhp_attribute_decl_name'], $file, $offset, $source, 'XHPElementNameToken');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $initializer = Node::fromJSON($json['xhp_attribute_decl_initializer'], $file, $offset, $source, 'SimpleInitializer');
        $offset += (($__tmp1__ = $initializer) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $required = Node::fromJSON($json['xhp_attribute_decl_required'], $file, $offset, $source, 'Node');
        $offset += (($__tmp2__ = $required) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($type, $name, $initializer, $required, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['type' => $this->_type, 'name' => $this->_name, 'initializer' => $this->_initializer, 'required' => $this->_required]);
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
        $type = $rewriter($this->_type, $parents);
        $name = $rewriter($this->_name, $parents);
        $initializer = $this->_initializer === null ? null : $rewriter($this->_initializer, $parents);
        $required = $this->_required === null ? null : $rewriter($this->_required, $parents);
        if ($type === $this->_type && $name === $this->_name && $initializer === $this->_initializer && $required === $this->_required) {
            return $this;
        }
        return new static($type, $name, $initializer, $required);
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
        return new static($value, $this->_name, $this->_initializer, $this->_required);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return GenericTypeSpecifier | MapArrayTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier | VectorArrayTypeSpecifier |
     * XHPEnumType
     */
    /**
     * @return ITypeSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_type);
    }
    /**
     * @return GenericTypeSpecifier | MapArrayTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier | VectorArrayTypeSpecifier |
     * XHPEnumType
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
    }
    /**
     * @return null|Node
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(XHPElementNameToken $value)
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
        return $this->_name !== null;
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
     * @return null|Node
     */
    public function getInitializerUNTYPED()
    {
        return $this->_initializer;
    }
    /**
     * @return static
     */
    public function withInitializer(?SimpleInitializer $value)
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
        return $this->_initializer !== null;
    }
    /**
     * @return null | SimpleInitializer
     */
    /**
     * @return null|SimpleInitializer
     */
    public function getInitializer()
    {
        return $this->_initializer;
    }
    /**
     * @return SimpleInitializer
     */
    /**
     * @return SimpleInitializer
     */
    public function getInitializerx()
    {
        return TypeAssert\not_null($this->getInitializer());
    }
    /**
     * @return null|Node
     */
    public function getRequiredUNTYPED()
    {
        return $this->_required;
    }
    /**
     * @return static
     */
    public function withRequired(?Node $value)
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
        return $this->_required !== null;
    }
    /**
     * @return null | XHPLateinit | XHPRequired
     */
    /**
     * @return null|Node
     */
    public function getRequired()
    {
        return $this->_required;
    }
    /**
     * @return XHPLateinit | XHPRequired
     */
    /**
     * @return Node
     */
    public function getRequiredx()
    {
        return TypeAssert\not_null($this->getRequired());
    }
}

