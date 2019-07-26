<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b79f7688191d4e2c8d2bb992f7fbf99e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ScopeResolutionExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'scope_resolution_expression';
    /**
     * @var Node
     */
    private $_qualifier;
    /**
     * @var ColonColonToken
     */
    private $_operator;
    /**
     * @var Node
     */
    private $_name;
    public function __construct(Node $qualifier, ColonColonToken $operator, Node $name, ?array $source_ref = null)
    {
        $this->_qualifier = $qualifier;
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
        $qualifier = Node::fromJSON($json['scope_resolution_qualifier'], $file, $offset, $source, 'Node');
        $qualifier = $qualifier !== null ? $qualifier : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $qualifier->getWidth();
        $operator = Node::fromJSON($json['scope_resolution_operator'], $file, $offset, $source, 'ColonColonToken');
        $operator = $operator !== null ? $operator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operator->getWidth();
        $name = Node::fromJSON($json['scope_resolution_name'], $file, $offset, $source, 'Node');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($qualifier, $operator, $name, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['qualifier' => $this->_qualifier, 'operator' => $this->_operator, 'name' => $this->_name]);
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
        $operator = $rewriter($this->_operator, $parents);
        $name = $rewriter($this->_name, $parents);
        if ($qualifier === $this->_qualifier && $operator === $this->_operator && $name === $this->_name) {
            return $this;
        }
        return new static($qualifier, $operator, $name);
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
        return new static($value, $this->_operator, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasQualifier()
    {
        return $this->_qualifier !== null;
    }
    /**
     * @return PipeVariableExpression | QualifiedName | SimpleTypeSpecifier |
     * XHPClassNameToken | NameToken | ParentToken | SelfToken | StaticToken |
     * VariableExpression
     */
    /**
     * @return Node
     */
    public function getQualifier()
    {
        return $this->_qualifier;
    }
    /**
     * @return PipeVariableExpression | QualifiedName | SimpleTypeSpecifier |
     * XHPClassNameToken | NameToken | ParentToken | SelfToken | StaticToken |
     * VariableExpression
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
    public function getOperatorUNTYPED()
    {
        return $this->_operator;
    }
    /**
     * @return static
     */
    public function withOperator(ColonColonToken $value)
    {
        if ($value === $this->_operator) {
            return $this;
        }
        return new static($this->_qualifier, $value, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasOperator()
    {
        return $this->_operator !== null;
    }
    /**
     * @return ColonColonToken
     */
    /**
     * @return ColonColonToken
     */
    public function getOperator()
    {
        return TypeAssert\instance_of(ColonColonToken::class, $this->_operator);
    }
    /**
     * @return ColonColonToken
     */
    /**
     * @return ColonColonToken
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
        return new static($this->_qualifier, $this->_operator, $value);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return BracedExpression | ClassToken | NameToken | VariableToken
     */
    /**
     * @return Node
     */
    public function getName()
    {
        return $this->_name;
    }
    /**
     * @return BracedExpression | ClassToken | NameToken | VariableToken
     */
    /**
     * @return Node
     */
    public function getNamex()
    {
        return $this->getName();
    }
}

