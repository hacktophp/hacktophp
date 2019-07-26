<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3462ef6cbb50c239582cdb4322561787>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class EndOfFile extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'end_of_file';
    /**
     * @var EndOfFileToken
     */
    private $_token;
    public function __construct(EndOfFileToken $token, ?__Private\SourceRef $source_ref = null)
    {
        $this->_token = $token;
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
        $token = Node::fromJSON($json['end_of_file_token'], $file, $offset, $source, 'EndOfFileToken');
        $token = $token !== null ? $token : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $token->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($token, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['token' => $this->_token]);
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
        $token = $rewriter($this->_token, $parents);
        if ($token === $this->_token) {
            return $this;
        }
        return new static($token);
    }
    /**
     * @return null|Node
     */
    public function getTokenUNTYPED()
    {
        return $this->_token;
    }
    /**
     * @return static
     */
    public function withToken(EndOfFileToken $value)
    {
        if ($value === $this->_token) {
            return $this;
        }
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasToken()
    {
        return $this->_token !== null;
    }
    /**
     * @return EndOfFileToken
     */
    /**
     * @return EndOfFileToken
     */
    public function getToken()
    {
        return TypeAssert\instance_of(EndOfFileToken::class, $this->_token);
    }
    /**
     * @return EndOfFileToken
     */
    /**
     * @return EndOfFileToken
     */
    public function getTokenx()
    {
        return $this->getToken();
    }
}

