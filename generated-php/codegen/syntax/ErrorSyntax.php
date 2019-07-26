<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f52d0a8b1e9e2c31a9b0b67ed0ece675>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ErrorSyntax extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'error';
    /**
     * @var Node
     */
    private $_error;
    public function __construct(Node $error, ?__Private\SourceRef $source_ref = null)
    {
        $this->_error = $error;
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
        $error = Node::fromJSON($json['error_error'], $file, $offset, $source, 'Node');
        $error = $error !== null ? $error : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $error->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($error, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['error' => $this->_error]);
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
        $error = $rewriter($this->_error, $parents);
        if ($error === $this->_error) {
            return $this;
        }
        return new static($error);
    }
    /**
     * @return null|Node
     */
    public function getErrorUNTYPED()
    {
        return $this->_error;
    }
    /**
     * @return static
     */
    public function withError(Node $value)
    {
        if ($value === $this->_error) {
            return $this;
        }
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasError()
    {
        return $this->_error !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getError()
    {
        return $this->_error;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getErrorx()
    {
        return $this->getError();
    }
}

