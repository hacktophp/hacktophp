<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<2372d482aa5df13aef09653f4b5acfc2>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class NamespaceEmptyBody extends Node implements INamespaceBody
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'namespace_empty_body';
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
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
        $semicolon = Node::fromJSON($json['namespace_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['semicolon' => $this->_semicolon]);
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
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($semicolon);
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
        return new static($value);
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

