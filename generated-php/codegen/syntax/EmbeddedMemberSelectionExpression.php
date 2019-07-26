<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<21ff3924ff4f71f85a21c63513a66b9b>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class EmbeddedMemberSelectionExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'embedded_member_selection_expression';
    /**
     * @var Node
     */
    private $_object;
    /**
     * @var Node
     */
    private $_operator;
    /**
     * @var Node
     */
    private $_name;
    public function __construct(Node $object, Node $operator, Node $name, ?array $source_ref = null)
    {
        $this->_object = $object;
        $this->_operator = $operator;
        $this->_name = $name;
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
        $object = Node::fromJSON($json['embedded_member_object'], $file, $offset, $source, 'Node');
        $object = $object !== null ? $object : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $object->getWidth();
        $operator = Node::fromJSON($json['embedded_member_operator'], $file, $offset, $source, 'Node');
        $operator = $operator !== null ? $operator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operator->getWidth();
        $name = Node::fromJSON($json['embedded_member_name'], $file, $offset, $source, 'Node');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($object, $operator, $name, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['object' => $this->_object, 'operator' => $this->_operator, 'name' => $this->_name]);
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
        $object = $rewriter($this->_object, $parents);
        $operator = $rewriter($this->_operator, $parents);
        $name = $rewriter($this->_name, $parents);
        if ($object === $this->_object && $operator === $this->_operator && $name === $this->_name) {
            return $this;
        }
        return new static($object, $operator, $name);
    }
    /**
     * @return null|Node
     */
    public function getObjectUNTYPED()
    {
        return $this->_object;
    }
    /**
     * @return static
     */
    public function withObject(Node $value)
    {
        if ($value === $this->_object) {
            return $this;
        }
        return new static($value, $this->_operator, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasObject()
    {
        return $this->_object !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getObject()
    {
        return $this->_object;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getObjectx()
    {
        return $this->getObject();
    }
    /**
     * @return null|Node
     */
    public function getOperatorUNTYPED()
    {
        return $this->_operator;
    }
    /**
     * @return static
     */
    public function withOperator(Node $value)
    {
        if ($value === $this->_operator) {
            return $this;
        }
        return new static($this->_object, $value, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasOperator()
    {
        return $this->_operator !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getOperator()
    {
        return $this->_operator;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getOperatorx()
    {
        return $this->getOperator();
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
    public function withName(Node $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_object, $this->_operator, $value);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getNamex()
    {
        return $this->getName();
    }
}

