<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5c0c75552fb2187898dd2f2213f930c2>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class QualifiedName extends Node implements INameishNode, __Private\IWrappableWithSimpleTypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'qualified_name';
    /**
     * @var NodeList<ListItem<null|NameToken>>
     */
    private $_parts;
    /**
     * @param NodeList<ListItem<null|NameToken>> $parts
     */
    public function __construct(NodeList $parts, ?__Private\SourceRef $source_ref = null)
    {
        $this->_parts = $parts;
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
        $parts = Node::fromJSON($json['qualified_name_parts'], $file, $offset, $source, 'NodeList<ListItem<?NameToken>>');
        $parts = $parts !== null ? $parts : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $parts->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($parts, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['parts' => $this->_parts]);
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
        $parts = $rewriter($this->_parts, $parents);
        if ($parts === $this->_parts) {
            return $this;
        }
        return new static($parts);
    }
    /**
     * @return null|Node
     */
    public function getPartsUNTYPED()
    {
        return $this->_parts;
    }
    /**
     * @param NodeList<ListItem<null|NameToken>> $value
     *
     * @return static
     */
    public function withParts(NodeList $value)
    {
        if ($value === $this->_parts) {
            return $this;
        }
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasParts()
    {
        return $this->_parts !== null;
    }
    /**
     * @return NodeList<ListItem<?NameToken>> | NodeList<ListItem<NameToken>>
     */
    /**
     * @return NodeList<ListItem<null|NameToken>>
     */
    public function getParts()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_parts);
    }
    /**
     * @return NodeList<ListItem<?NameToken>> | NodeList<ListItem<NameToken>>
     */
    /**
     * @return NodeList<ListItem<null|NameToken>>
     */
    public function getPartsx()
    {
        return $this->getParts();
    }
}

