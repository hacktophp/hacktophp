<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5029007fc66dc195883cb200b72807db>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class XHPExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_open;
    /**
     * @var EditableNode
     */
    private $_body;
    /**
     * @var EditableNode
     */
    private $_close;
    public function __construct(EditableNode $open, EditableNode $body, EditableNode $close)
    {
        parent::__construct('xhp_expression');
        $this->_open = $open;
        $this->_body = $body;
        $this->_close = $close;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $open = EditableNode::fromJSON($json['xhp_open'], $file, $offset, $source);
        $offset += $open->getWidth();
        $body = EditableNode::fromJSON($json['xhp_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        $close = EditableNode::fromJSON($json['xhp_close'], $file, $offset, $source);
        $offset += $close->getWidth();
        return new static($open, $body, $close);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['open' => $this->_open, 'body' => $this->_body, 'close' => $this->_close];
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? [] : (array) $parents;
        $parents[] = $this;
        $open = $this->_open->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        $close = $this->_close->rewrite($rewriter, $parents);
        if ($open === $this->_open && $body === $this->_body && $close === $this->_close) {
            return $this;
        }
        return new static($open, $body, $close);
    }
    /**
     * @return EditableNode
     */
    public function getOpenUNTYPED()
    {
        return $this->_open;
    }
    /**
     * @return static
     */
    public function withOpen(EditableNode $value)
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
        return !$this->_open->isMissing();
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
     * @return EditableNode
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(EditableNode $value)
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
        return !$this->_body->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getBody()
    {
        if ($this->_body->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_body);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getBodyx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_body);
    }
    /**
     * @return EditableNode
     */
    public function getCloseUNTYPED()
    {
        return $this->_close;
    }
    /**
     * @return static
     */
    public function withClose(EditableNode $value)
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
        return !$this->_close->isMissing();
    }
    /**
     * @return null | XHPClose
     */
    /**
     * @return null|XHPClose
     */
    public function getClose()
    {
        if ($this->_close->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(XHPClose::class, $this->_close);
    }
    /**
     * @return XHPClose
     */
    /**
     * @return XHPClose
     */
    public function getClosex()
    {
        return TypeAssert\instance_of(XHPClose::class, $this->_close);
    }
}

