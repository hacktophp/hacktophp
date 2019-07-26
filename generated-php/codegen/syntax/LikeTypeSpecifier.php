<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<799f85ed60269d145a56d952716de6e0>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class LikeTypeSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'like_type_specifier';
    /**
     * @var TildeToken
     */
    private $_tilde;
    /**
     * @var ITypeSpecifier
     */
    private $_type;
    public function __construct(TildeToken $tilde, ITypeSpecifier $type, ?array $source_ref = null)
    {
        $this->_tilde = $tilde;
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
        $tilde = Node::fromJSON($json['like_tilde'], $file, $offset, $source, 'TildeToken');
        $tilde = $tilde !== null ? $tilde : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $tilde->getWidth();
        $type = Node::fromJSON($json['like_type'], $file, $offset, $source, 'ITypeSpecifier');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($tilde, $type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['tilde' => $this->_tilde, 'type' => $this->_type]);
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
        $tilde = $rewriter($this->_tilde, $parents);
        $type = $rewriter($this->_type, $parents);
        if ($tilde === $this->_tilde && $type === $this->_type) {
            return $this;
        }
        return new static($tilde, $type);
    }
    /**
     * @return null|Node
     */
    public function getTildeUNTYPED()
    {
        return $this->_tilde;
    }
    /**
     * @return static
     */
    public function withTilde(TildeToken $value)
    {
        if ($value === $this->_tilde) {
            return $this;
        }
        return new static($value, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasTilde()
    {
        return $this->_tilde !== null;
    }
    /**
     * @return TildeToken
     */
    /**
     * @return TildeToken
     */
    public function getTilde()
    {
        return TypeAssert\instance_of(TildeToken::class, $this->_tilde);
    }
    /**
     * @return TildeToken
     */
    /**
     * @return TildeToken
     */
    public function getTildex()
    {
        return $this->getTilde();
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
        return new static($this->_tilde, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | LikeTypeSpecifier | SimpleTypeSpecifier |
     * TypeConstant
     */
    /**
     * @return ITypeSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | LikeTypeSpecifier | SimpleTypeSpecifier |
     * TypeConstant
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

