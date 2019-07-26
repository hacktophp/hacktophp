<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<74b0fe34d7089e957b97707c8cd90df6>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class EmbeddedSubscriptExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'embedded_subscript_expression';
    /**
     * @var Node
     */
    private $_receiver;
    /**
     * @var Node
     */
    private $_left_bracket;
    /**
     * @var Node
     */
    private $_index;
    /**
     * @var Node
     */
    private $_right_bracket;
    public function __construct(Node $receiver, Node $left_bracket, Node $index, Node $right_bracket, ?__Private\SourceRef $source_ref = null)
    {
        $this->_receiver = $receiver;
        $this->_left_bracket = $left_bracket;
        $this->_index = $index;
        $this->_right_bracket = $right_bracket;
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
        $receiver = Node::fromJSON($json['embedded_subscript_receiver'], $file, $offset, $source, 'Node');
        $receiver = $receiver !== null ? $receiver : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $receiver->getWidth();
        $left_bracket = Node::fromJSON($json['embedded_subscript_left_bracket'], $file, $offset, $source, 'Node');
        $left_bracket = $left_bracket !== null ? $left_bracket : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_bracket->getWidth();
        $index = Node::fromJSON($json['embedded_subscript_index'], $file, $offset, $source, 'Node');
        $index = $index !== null ? $index : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $index->getWidth();
        $right_bracket = Node::fromJSON($json['embedded_subscript_right_bracket'], $file, $offset, $source, 'Node');
        $right_bracket = $right_bracket !== null ? $right_bracket : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_bracket->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($receiver, $left_bracket, $index, $right_bracket, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['receiver' => $this->_receiver, 'left_bracket' => $this->_left_bracket, 'index' => $this->_index, 'right_bracket' => $this->_right_bracket]);
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
        $receiver = $rewriter($this->_receiver, $parents);
        $left_bracket = $rewriter($this->_left_bracket, $parents);
        $index = $rewriter($this->_index, $parents);
        $right_bracket = $rewriter($this->_right_bracket, $parents);
        if ($receiver === $this->_receiver && $left_bracket === $this->_left_bracket && $index === $this->_index && $right_bracket === $this->_right_bracket) {
            return $this;
        }
        return new static($receiver, $left_bracket, $index, $right_bracket);
    }
    /**
     * @return null|Node
     */
    public function getReceiverUNTYPED()
    {
        return $this->_receiver;
    }
    /**
     * @return static
     */
    public function withReceiver(Node $value)
    {
        if ($value === $this->_receiver) {
            return $this;
        }
        return new static($value, $this->_left_bracket, $this->_index, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasReceiver()
    {
        return $this->_receiver !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getReceiver()
    {
        return $this->_receiver;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getReceiverx()
    {
        return $this->getReceiver();
    }
    /**
     * @return null|Node
     */
    public function getLeftBracketUNTYPED()
    {
        return $this->_left_bracket;
    }
    /**
     * @return static
     */
    public function withLeftBracket(Node $value)
    {
        if ($value === $this->_left_bracket) {
            return $this;
        }
        return new static($this->_receiver, $value, $this->_index, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasLeftBracket()
    {
        return $this->_left_bracket !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getLeftBracket()
    {
        return $this->_left_bracket;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getLeftBracketx()
    {
        return $this->getLeftBracket();
    }
    /**
     * @return null|Node
     */
    public function getIndexUNTYPED()
    {
        return $this->_index;
    }
    /**
     * @return static
     */
    public function withIndex(Node $value)
    {
        if ($value === $this->_index) {
            return $this;
        }
        return new static($this->_receiver, $this->_left_bracket, $value, $this->_right_bracket);
    }
    /**
     * @return bool
     */
    public function hasIndex()
    {
        return $this->_index !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getIndex()
    {
        return $this->_index;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getIndexx()
    {
        return $this->getIndex();
    }
    /**
     * @return null|Node
     */
    public function getRightBracketUNTYPED()
    {
        return $this->_right_bracket;
    }
    /**
     * @return static
     */
    public function withRightBracket(Node $value)
    {
        if ($value === $this->_right_bracket) {
            return $this;
        }
        return new static($this->_receiver, $this->_left_bracket, $this->_index, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBracket()
    {
        return $this->_right_bracket !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getRightBracket()
    {
        return $this->_right_bracket;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getRightBracketx()
    {
        return $this->getRightBracket();
    }
}

