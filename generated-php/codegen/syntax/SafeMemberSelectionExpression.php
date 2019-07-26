<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<02c38437c5fa843f0a2fe85502d05a52>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class SafeMemberSelectionExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'safe_member_selection_expression';
    /**
     * @var IExpression
     */
    private $_object;
    /**
     * @var QuestionMinusGreaterThanToken
     */
    private $_operator;
    /**
     * @var NameToken
     */
    private $_name;
    public function __construct(IExpression $object, QuestionMinusGreaterThanToken $operator, NameToken $name, ?__Private\SourceRef $source_ref = null)
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
        $object = Node::fromJSON($json['safe_member_object'], $file, $offset, $source, 'IExpression');
        $object = $object !== null ? $object : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $object->getWidth();
        $operator = Node::fromJSON($json['safe_member_operator'], $file, $offset, $source, 'QuestionMinusGreaterThanToken');
        $operator = $operator !== null ? $operator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operator->getWidth();
        $name = Node::fromJSON($json['safe_member_name'], $file, $offset, $source, 'NameToken');
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
    public function withObject(IExpression $value)
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
     * @return FunctionCallExpression | MemberSelectionExpression |
     * SafeMemberSelectionExpression | ScopeResolutionExpression |
     * VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getObject()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_object);
    }
    /**
     * @return FunctionCallExpression | MemberSelectionExpression |
     * SafeMemberSelectionExpression | ScopeResolutionExpression |
     * VariableExpression
     */
    /**
     * @return IExpression
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
    public function withOperator(QuestionMinusGreaterThanToken $value)
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
     * @return QuestionMinusGreaterThanToken
     */
    /**
     * @return QuestionMinusGreaterThanToken
     */
    public function getOperator()
    {
        return TypeAssert\instance_of(QuestionMinusGreaterThanToken::class, $this->_operator);
    }
    /**
     * @return QuestionMinusGreaterThanToken
     */
    /**
     * @return QuestionMinusGreaterThanToken
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
    public function withName(NameToken $value)
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
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_name);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getNamex()
    {
        return $this->getName();
    }
}

