<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6d1ed53ce97533a091fef3e88aacbba5>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ReifiedTypeArgument extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'reified_type_argument';
    /**
     * @var Node
     */
    private $_reified;
    /**
     * @var Node
     */
    private $_type;
    public function __construct(Node $reified, Node $type, ?array $source_ref = null)
    {
        $this->_reified = $reified;
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
        $reified = Node::fromJSON($json['reified_type_argument_reified'], $file, $offset, $source, 'Node');
        $reified = $reified !== null ? $reified : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $reified->getWidth();
        $type = Node::fromJSON($json['reified_type_argument_type'], $file, $offset, $source, 'Node');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($reified, $type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['reified' => $this->_reified, 'type' => $this->_type]);
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
        $reified = $rewriter($this->_reified, $parents);
        $type = $rewriter($this->_type, $parents);
        if ($reified === $this->_reified && $type === $this->_type) {
            return $this;
        }
        return new static($reified, $type);
    }
    /**
     * @return null|Node
     */
    public function getReifiedUNTYPED()
    {
        return $this->_reified;
    }
    /**
     * @return static
     */
    public function withReified(Node $value)
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
        return $this->_reified !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getReified()
    {
        return $this->_reified;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getReifiedx()
    {
        return $this->getReified();
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
    public function withType(Node $value)
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
        return $this->_type !== null;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

