<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3ad0c323c15f82424947348cf76a65ca>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class SoftTypeSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'soft_type_specifier';
    /**
     * @var AtToken
     */
    private $_at;
    /**
     * @var ITypeSpecifier
     */
    private $_type;
    public function __construct(AtToken $at, ITypeSpecifier $type, ?__Private\SourceRef $source_ref = null)
    {
        $this->_at = $at;
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
        $at = Node::fromJSON($json['soft_at'], $file, $offset, $source, 'AtToken');
        $at = $at !== null ? $at : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $at->getWidth();
        $type = Node::fromJSON($json['soft_type'], $file, $offset, $source, 'ITypeSpecifier');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($at, $type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['at' => $this->_at, 'type' => $this->_type]);
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
        $at = $rewriter($this->_at, $parents);
        $type = $rewriter($this->_type, $parents);
        if ($at === $this->_at && $type === $this->_type) {
            return $this;
        }
        return new static($at, $type);
    }
    /**
     * @return null|Node
     */
    public function getAtUNTYPED()
    {
        return $this->_at;
    }
    /**
     * @return static
     */
    public function withAt(AtToken $value)
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
        return $this->_at !== null;
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
        return new static($this->_at, $value);
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
     * MapArrayTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier
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
     * MapArrayTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier |
     * TupleTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

