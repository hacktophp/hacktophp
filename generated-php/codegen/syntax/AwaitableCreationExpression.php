<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<7c7e5c101c44d4c7fc7745f31f60384d>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class AwaitableCreationExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute_spec;
    /**
     * @var EditableNode
     */
    private $_async;
    /**
     * @var EditableNode
     */
    private $_coroutine;
    /**
     * @var EditableNode
     */
    private $_compound_statement;
    public function __construct(EditableNode $attribute_spec, EditableNode $async, EditableNode $coroutine, EditableNode $compound_statement)
    {
        parent::__construct('awaitable_creation_expression');
        $this->_attribute_spec = $attribute_spec;
        $this->_async = $async;
        $this->_coroutine = $coroutine;
        $this->_compound_statement = $compound_statement;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $attribute_spec = EditableNode::fromJSON($json['awaitable_attribute_spec'], $file, $offset, $source);
        $offset += $attribute_spec->getWidth();
        $async = EditableNode::fromJSON($json['awaitable_async'], $file, $offset, $source);
        $offset += $async->getWidth();
        $coroutine = EditableNode::fromJSON($json['awaitable_coroutine'], $file, $offset, $source);
        $offset += $coroutine->getWidth();
        $compound_statement = EditableNode::fromJSON($json['awaitable_compound_statement'], $file, $offset, $source);
        $offset += $compound_statement->getWidth();
        return new static($attribute_spec, $async, $coroutine, $compound_statement);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['attribute_spec' => $this->_attribute_spec, 'async' => $this->_async, 'coroutine' => $this->_coroutine, 'compound_statement' => $this->_compound_statement];
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
        $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
        $async = $this->_async->rewrite($rewriter, $parents);
        $coroutine = $this->_coroutine->rewrite($rewriter, $parents);
        $compound_statement = $this->_compound_statement->rewrite($rewriter, $parents);
        if ($attribute_spec === $this->_attribute_spec && $async === $this->_async && $coroutine === $this->_coroutine && $compound_statement === $this->_compound_statement) {
            return $this;
        }
        return new static($attribute_spec, $async, $coroutine, $compound_statement);
    }
    /**
     * @return EditableNode
     */
    public function getAttributeSpecUNTYPED()
    {
        return $this->_attribute_spec;
    }
    /**
     * @return static
     */
    public function withAttributeSpec(EditableNode $value)
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
        return !$this->_attribute_spec->isMissing();
    }
    /**
     * @return AttributeSpecification | null
     */
    /**
     * @return null|AttributeSpecification
     */
    public function getAttributeSpec()
    {
        if ($this->_attribute_spec->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute_spec);
    }
    /**
     * @return AttributeSpecification
     */
    /**
     * @return AttributeSpecification
     */
    public function getAttributeSpecx()
    {
        return TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute_spec);
    }
    /**
     * @return EditableNode
     */
    public function getAsyncUNTYPED()
    {
        return $this->_async;
    }
    /**
     * @return static
     */
    public function withAsync(EditableNode $value)
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
        return !$this->_async->isMissing();
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
     * @return EditableNode
     */
    public function getCoroutineUNTYPED()
    {
        return $this->_coroutine;
    }
    /**
     * @return static
     */
    public function withCoroutine(EditableNode $value)
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
        return !$this->_coroutine->isMissing();
    }
    /**
     * @return null
     */
    /**
     * @return null|EditableNode
     */
    public function getCoroutine()
    {
        if ($this->_coroutine->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_coroutine);
    }
    /**
     * @return
     */
    /**
     * @return EditableNode
     */
    public function getCoroutinex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_coroutine);
    }
    /**
     * @return EditableNode
     */
    public function getCompoundStatementUNTYPED()
    {
        return $this->_compound_statement;
    }
    /**
     * @return static
     */
    public function withCompoundStatement(EditableNode $value)
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
        return !$this->_compound_statement->isMissing();
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

