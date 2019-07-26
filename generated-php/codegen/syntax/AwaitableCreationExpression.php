<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5de150e71e150a65e56c39ea7042424d>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
abstract class AwaitableCreationExpressionGeneratedBase extends Node implements IHasFunctionBody, ILambdaBody, IHasAttributeSpec, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'awaitable_creation_expression';
    /**
     * @var null|OldAttributeSpecification
     */
    private $_attribute_spec;
    /**
     * @var AsyncToken
     */
    private $_async;
    /**
     * @var null|Node
     */
    private $_coroutine;
    /**
     * @var CompoundStatement
     */
    private $_compound_statement;
    public function __construct(?OldAttributeSpecification $attribute_spec, AsyncToken $async, ?Node $coroutine, CompoundStatement $compound_statement, ?array $source_ref = null)
    {
        $this->_attribute_spec = $attribute_spec;
        $this->_async = $async;
        $this->_coroutine = $coroutine;
        $this->_compound_statement = $compound_statement;
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
        $attribute_spec = Node::fromJSON($json['awaitable_attribute_spec'], $file, $offset, $source, 'OldAttributeSpecification');
        $offset += (($__tmp1__ = $attribute_spec) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $async = Node::fromJSON($json['awaitable_async'], $file, $offset, $source, 'AsyncToken');
        $async = $async !== null ? $async : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $async->getWidth();
        $coroutine = Node::fromJSON($json['awaitable_coroutine'], $file, $offset, $source, 'Node');
        $offset += (($__tmp2__ = $coroutine) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $compound_statement = Node::fromJSON($json['awaitable_compound_statement'], $file, $offset, $source, 'CompoundStatement');
        $compound_statement = $compound_statement !== null ? $compound_statement : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $compound_statement->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute_spec, $async, $coroutine, $compound_statement, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute_spec' => $this->_attribute_spec, 'async' => $this->_async, 'coroutine' => $this->_coroutine, 'compound_statement' => $this->_compound_statement]);
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
        $attribute_spec = $this->_attribute_spec === null ? null : $rewriter($this->_attribute_spec, $parents);
        $async = $rewriter($this->_async, $parents);
        $coroutine = $this->_coroutine === null ? null : $rewriter($this->_coroutine, $parents);
        $compound_statement = $rewriter($this->_compound_statement, $parents);
        if ($attribute_spec === $this->_attribute_spec && $async === $this->_async && $coroutine === $this->_coroutine && $compound_statement === $this->_compound_statement) {
            return $this;
        }
        return new static($attribute_spec, $async, $coroutine, $compound_statement);
    }
    /**
     * @return null|Node
     */
    public function getAttributeSpecUNTYPED()
    {
        return $this->_attribute_spec;
    }
    /**
     * @return static
     */
    public function withAttributeSpec(?OldAttributeSpecification $value)
    {
        if ($value === $this->_attribute_spec) {
            return $this;
        }
        return new static($value, $this->_async, $this->_coroutine, $this->_compound_statement);
    }
    /**
     * @return bool
     */
    public function hasAttributeSpec()
    {
        return $this->_attribute_spec !== null;
    }
    /**
     * @return null | OldAttributeSpecification
     */
    /**
     * @return null|OldAttributeSpecification
     */
    public function getAttributeSpec()
    {
        return $this->_attribute_spec;
    }
    /**
     * @return OldAttributeSpecification
     */
    /**
     * @return OldAttributeSpecification
     */
    public function getAttributeSpecx()
    {
        return TypeAssert\not_null($this->getAttributeSpec());
    }
    /**
     * @return null|Node
     */
    public function getAsyncUNTYPED()
    {
        return $this->_async;
    }
    /**
     * @return static
     */
    public function withAsync(AsyncToken $value)
    {
        if ($value === $this->_async) {
            return $this;
        }
        return new static($this->_attribute_spec, $value, $this->_coroutine, $this->_compound_statement);
    }
    /**
     * @return bool
     */
    public function hasAsync()
    {
        return $this->_async !== null;
    }
    /**
     * @return AsyncToken
     */
    /**
     * @return AsyncToken
     */
    public function getAsync()
    {
        return TypeAssert\instance_of(AsyncToken::class, $this->_async);
    }
    /**
     * @return AsyncToken
     */
    /**
     * @return AsyncToken
     */
    public function getAsyncx()
    {
        return $this->getAsync();
    }
    /**
     * @return null|Node
     */
    public function getCoroutineUNTYPED()
    {
        return $this->_coroutine;
    }
    /**
     * @return static
     */
    public function withCoroutine(?Node $value)
    {
        if ($value === $this->_coroutine) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_async, $value, $this->_compound_statement);
    }
    /**
     * @return bool
     */
    public function hasCoroutine()
    {
        return $this->_coroutine !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
     */
    public function getCoroutine()
    {
        return $this->_coroutine;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getCoroutinex()
    {
        return TypeAssert\not_null($this->getCoroutine());
    }
    /**
     * @return null|Node
     */
    public function getCompoundStatementUNTYPED()
    {
        return $this->_compound_statement;
    }
    /**
     * @return static
     */
    public function withCompoundStatement(CompoundStatement $value)
    {
        if ($value === $this->_compound_statement) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_async, $this->_coroutine, $value);
    }
    /**
     * @return bool
     */
    public function hasCompoundStatement()
    {
        return $this->_compound_statement !== null;
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getCompoundStatement()
    {
        return TypeAssert\instance_of(CompoundStatement::class, $this->_compound_statement);
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getCompoundStatementx()
    {
        return $this->getCompoundStatement();
    }
}

