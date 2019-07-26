<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<39c51bb03d107b2a32c4e197c50f39ab>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class Enumerator extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'enumerator';
    /**
     * @var NameToken
     */
    private $_name;
    /**
     * @var EqualToken
     */
    private $_equal;
    /**
     * @var IExpression
     */
    private $_value;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(NameToken $name, EqualToken $equal, IExpression $value, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_name = $name;
        $this->_equal = $equal;
        $this->_value = $value;
        $this->_semicolon = $semicolon;
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
        $name = Node::fromJSON($json['enumerator_name'], $file, $offset, $source, 'NameToken');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $equal = Node::fromJSON($json['enumerator_equal'], $file, $offset, $source, 'EqualToken');
        $equal = $equal !== null ? $equal : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $equal->getWidth();
        $value = Node::fromJSON($json['enumerator_value'], $file, $offset, $source, 'IExpression');
        $value = $value !== null ? $value : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $value->getWidth();
        $semicolon = Node::fromJSON($json['enumerator_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($name, $equal, $value, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['name' => $this->_name, 'equal' => $this->_equal, 'value' => $this->_value, 'semicolon' => $this->_semicolon]);
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
        $name = $rewriter($this->_name, $parents);
        $equal = $rewriter($this->_equal, $parents);
        $value = $rewriter($this->_value, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($name === $this->_name && $equal === $this->_equal && $value === $this->_value && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($name, $equal, $value, $semicolon);
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
    public function withName(NameToken $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($value, $this->_equal, $this->_value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_name);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return null|Node
     */
    public function getEqualUNTYPED()
    {
        return $this->_equal;
    }
    /**
     * @return static
     */
    public function withEqual(EqualToken $value)
    {
        if ($value === $this->_equal) {
            return $this;
        }
        return new static($this->_name, $value, $this->_value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasEqual()
    {
        return $this->_equal !== null;
    }
    /**
     * @return EqualToken
     */
    /**
     * @return EqualToken
     */
    public function getEqual()
    {
        return TypeAssert\instance_of(EqualToken::class, $this->_equal);
    }
    /**
     * @return EqualToken
     */
    /**
     * @return EqualToken
     */
    public function getEqualx()
    {
        return $this->getEqual();
    }
    /**
     * @return null|Node
     */
    public function getValueUNTYPED()
    {
        return $this->_value;
    }
    /**
     * @return static
     */
    public function withValue(IExpression $value)
    {
        if ($value === $this->_value) {
            return $this;
        }
        return new static($this->_name, $this->_equal, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasValue()
    {
        return $this->_value !== null;
    }
    /**
     * @return BinaryExpression | LiteralExpression | ScopeResolutionExpression |
     * NameToken
     */
    /**
     * @return IExpression
     */
    public function getValue()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_value);
    }
    /**
     * @return BinaryExpression | LiteralExpression | ScopeResolutionExpression |
     * NameToken
     */
    /**
     * @return IExpression
     */
    public function getValuex()
    {
        return $this->getValue();
    }
    /**
     * @return null|Node
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(SemicolonToken $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_name, $this->_equal, $this->_value, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return $this->_semicolon !== null;
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

