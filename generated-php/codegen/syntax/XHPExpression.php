<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ab2e2563506717419b4bc32cde94a27c>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_expression';
    /**
     * @var XHPOpen
     */
    private $_open;
    /**
     * @var NodeList<Node>|null
     */
    private $_body;
    /**
     * @var null|XHPClose
     */
    private $_close;
    /**
     * @param NodeList<Node>|null $body
     */
    public function __construct(XHPOpen $open, ?NodeList $body, ?XHPClose $close, ?__Private\SourceRef $source_ref = null)
    {
        $this->_open = $open;
        $this->_body = $body;
        $this->_close = $close;
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
        $open = Node::fromJSON($json['xhp_open'], $file, $offset, $source, 'XHPOpen');
        $open = $open !== null ? $open : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $open->getWidth();
        $body = Node::fromJSON($json['xhp_body'], $file, $offset, $source, 'NodeList<Node>');
        $offset += (($__tmp1__ = $body) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $close = Node::fromJSON($json['xhp_close'], $file, $offset, $source, 'XHPClose');
        $offset += (($__tmp2__ = $close) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($open, $body, $close, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['open' => $this->_open, 'body' => $this->_body, 'close' => $this->_close]);
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
        $open = $rewriter($this->_open, $parents);
        $body = $this->_body === null ? null : $rewriter($this->_body, $parents);
        $close = $this->_close === null ? null : $rewriter($this->_close, $parents);
        if ($open === $this->_open && $body === $this->_body && $close === $this->_close) {
            return $this;
        }
        return new static($open, $body, $close);
    }
    /**
     * @return null|Node
     */
    public function getOpenUNTYPED()
    {
        return $this->_open;
    }
    /**
     * @return static
     */
    public function withOpen(XHPOpen $value)
    {
        if ($value === $this->_open) {
            return $this;
        }
        return new static($value, $this->_body, $this->_close);
    }
    /**
     * @return bool
     */
    public function hasOpen()
    {
        return $this->_open !== null;
    }
    /**
     * @return XHPOpen
     */
    /**
     * @return XHPOpen
     */
    public function getOpen()
    {
        return TypeAssert\instance_of(XHPOpen::class, $this->_open);
    }
    /**
     * @return XHPOpen
     */
    /**
     * @return XHPOpen
     */
    public function getOpenx()
    {
        return $this->getOpen();
    }
    /**
     * @return null|Node
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @param NodeList<Node>|null $value
     *
     * @return static
     */
    public function withBody(?NodeList $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_open, $value, $this->_close);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return $this->_body !== null;
    }
    /**
     * @return NodeList<BracedExpression> | NodeList<Node> |
     * NodeList<XHPBodyToken> | NodeList<XHPCommentToken> |
     * NodeList<XHPExpression> | null
     */
    /**
     * @return NodeList<Node>|null
     */
    public function getBody()
    {
        return $this->_body;
    }
    /**
     * @return NodeList<BracedExpression> | NodeList<Node> |
     * NodeList<XHPBodyToken> | NodeList<XHPCommentToken> |
     * NodeList<XHPExpression>
     */
    /**
     * @return NodeList<Node>
     */
    public function getBodyx()
    {
        return TypeAssert\not_null($this->getBody());
    }
    /**
     * @return null|Node
     */
    public function getCloseUNTYPED()
    {
        return $this->_close;
    }
    /**
     * @return static
     */
    public function withClose(?XHPClose $value)
    {
        if ($value === $this->_close) {
            return $this;
        }
        return new static($this->_open, $this->_body, $value);
    }
    /**
     * @return bool
     */
    public function hasClose()
    {
        return $this->_close !== null;
    }
    /**
     * @return null | XHPClose
     */
    /**
     * @return null|XHPClose
     */
    public function getClose()
    {
        return $this->_close;
    }
    /**
     * @return XHPClose
     */
    /**
     * @return XHPClose
     */
    public function getClosex()
    {
        return TypeAssert\not_null($this->getClose());
    }
}

