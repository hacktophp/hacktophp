<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<2d59bd3c0bc907955ddea4538b5ba6a5>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
abstract class ScriptGeneratedBase extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'script';
    /**
     * @var NodeList<Node>
     */
    private $_declarations;
    /**
     * @param NodeList<Node> $declarations
     */
    public function __construct(NodeList $declarations, ?array $source_ref = null)
    {
        $this->_declarations = $declarations;
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
        $declarations = Node::fromJSON($json['script_declarations'], $file, $offset, $source, 'NodeList<Node>');
        $declarations = $declarations !== null ? $declarations : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $declarations->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($declarations, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['declarations' => $this->_declarations]);
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
        $declarations = $rewriter($this->_declarations, $parents);
        if ($declarations === $this->_declarations) {
            return $this;
        }
        return new static($declarations);
    }
    /**
     * @return null|Node
     */
    public function getDeclarationsUNTYPED()
    {
        return $this->_declarations;
    }
    /**
     * @param NodeList<Node> $value
     *
     * @return static
     */
    public function withDeclarations(NodeList $value)
    {
        if ($value === $this->_declarations) {
            return $this;
        }
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasDeclarations()
    {
        return $this->_declarations !== null;
    }
    /**
     * @return NodeList<Node>
     */
    /**
     * @return NodeList<Node>
     */
    public function getDeclarations()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_declarations);
    }
    /**
     * @return NodeList<Node>
     */
    /**
     * @return NodeList<Node>
     */
    public function getDeclarationsx()
    {
        return $this->getDeclarations();
    }
}

