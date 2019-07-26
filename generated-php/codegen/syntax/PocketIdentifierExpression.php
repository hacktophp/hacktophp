<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9677ae3744a6ae5b5bc40865a35f5640>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class PocketIdentifierExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'pocket_identifier_expression';
    /**
     * @var Node
     */
    private $_qualifier;
    /**
     * @var Node
     */
    private $_pu_operator;
    /**
     * @var Node
     */
    private $_field;
    /**
     * @var Node
     */
    private $_operator;
    /**
     * @var Node
     */
    private $_name;
    public function __construct(Node $qualifier, Node $pu_operator, Node $field, Node $operator, Node $name, ?__Private\SourceRef $source_ref = null)
    {
        $this->_qualifier = $qualifier;
        $this->_pu_operator = $pu_operator;
        $this->_field = $field;
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
        $qualifier = Node::fromJSON($json['pocket_identifier_qualifier'], $file, $offset, $source, 'Node');
        $qualifier = $qualifier !== null ? $qualifier : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $qualifier->getWidth();
        $pu_operator = Node::fromJSON($json['pocket_identifier_pu_operator'], $file, $offset, $source, 'Node');
        $pu_operator = $pu_operator !== null ? $pu_operator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $pu_operator->getWidth();
        $field = Node::fromJSON($json['pocket_identifier_field'], $file, $offset, $source, 'Node');
        $field = $field !== null ? $field : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $field->getWidth();
        $operator = Node::fromJSON($json['pocket_identifier_operator'], $file, $offset, $source, 'Node');
        $operator = $operator !== null ? $operator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operator->getWidth();
        $name = Node::fromJSON($json['pocket_identifier_name'], $file, $offset, $source, 'Node');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($qualifier, $pu_operator, $field, $operator, $name, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['qualifier' => $this->_qualifier, 'pu_operator' => $this->_pu_operator, 'field' => $this->_field, 'operator' => $this->_operator, 'name' => $this->_name]);
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
        $qualifier = $rewriter($this->_qualifier, $parents);
        $pu_operator = $rewriter($this->_pu_operator, $parents);
        $field = $rewriter($this->_field, $parents);
        $operator = $rewriter($this->_operator, $parents);
        $name = $rewriter($this->_name, $parents);
        if ($qualifier === $this->_qualifier && $pu_operator === $this->_pu_operator && $field === $this->_field && $operator === $this->_operator && $name === $this->_name) {
            return $this;
        }
        return new static($qualifier, $pu_operator, $field, $operator, $name);
    }
    /**
     * @return null|Node
     */
    public function getQualifierUNTYPED()
    {
        return $this->_qualifier;
    }
    /**
     * @return static
     */
    public function withQualifier(Node $value)
    {
        if ($value === $this->_qualifier) {
            return $this;
        }
        return new static($value, $this->_pu_operator, $this->_field, $this->_operator, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasQualifier()
    {
        return $this->_qualifier !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getQualifier()
    {
        return $this->_qualifier;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getQualifierx()
    {
        return $this->getQualifier();
    }
    /**
     * @return null|Node
     */
    public function getPuOperatorUNTYPED()
    {
        return $this->_pu_operator;
    }
    /**
     * @return static
     */
    public function withPuOperator(Node $value)
    {
        if ($value === $this->_pu_operator) {
            return $this;
        }
        return new static($this->_qualifier, $value, $this->_field, $this->_operator, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasPuOperator()
    {
        return $this->_pu_operator !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getPuOperator()
    {
        return $this->_pu_operator;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getPuOperatorx()
    {
        return $this->getPuOperator();
    }
    /**
     * @return null|Node
     */
    public function getFieldUNTYPED()
    {
        return $this->_field;
    }
    /**
     * @return static
     */
    public function withField(Node $value)
    {
        if ($value === $this->_field) {
            return $this;
        }
        return new static($this->_qualifier, $this->_pu_operator, $value, $this->_operator, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasField()
    {
        return $this->_field !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getField()
    {
        return $this->_field;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getFieldx()
    {
        return $this->getField();
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
        return new static($this->_qualifier, $this->_pu_operator, $this->_field, $value, $this->_name);
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
        return new static($this->_qualifier, $this->_pu_operator, $this->_field, $this->_operator, $value);
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

