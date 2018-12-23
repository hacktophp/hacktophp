<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<48b091b96e2c8388f41e3ecd9f4e303e>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class NamespaceUseClause extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_clause_kind;
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_as;
    /**
     * @var EditableNode
     */
    private $_alias;
    public function __construct(EditableNode $clause_kind, EditableNode $name, EditableNode $as, EditableNode $alias)
    {
        parent::__construct('namespace_use_clause');
        $this->_clause_kind = $clause_kind;
        $this->_name = $name;
        $this->_as = $as;
        $this->_alias = $alias;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $clause_kind = EditableNode::fromJSON($json['namespace_use_clause_kind'], $file, $offset, $source);
        $offset += $clause_kind->getWidth();
        $name = EditableNode::fromJSON($json['namespace_use_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $as = EditableNode::fromJSON($json['namespace_use_as'], $file, $offset, $source);
        $offset += $as->getWidth();
        $alias = EditableNode::fromJSON($json['namespace_use_alias'], $file, $offset, $source);
        $offset += $alias->getWidth();
        return new static($clause_kind, $name, $as, $alias);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('clause_kind' => $this->_clause_kind, 'name' => $this->_name, 'as' => $this->_as, 'alias' => $this->_alias);
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? array() : (array) $parents;
        $parents[] = $this;
        $clause_kind = $this->_clause_kind->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $as = $this->_as->rewrite($rewriter, $parents);
        $alias = $this->_alias->rewrite($rewriter, $parents);
        if ($clause_kind === $this->_clause_kind && $name === $this->_name && $as === $this->_as && $alias === $this->_alias) {
            return $this;
        }
        return new static($clause_kind, $name, $as, $alias);
    }
    /**
     * @return EditableNode
     */
    public function getClauseKindUNTYPED()
    {
        return $this->_clause_kind;
    }
    /**
     * @return static
     */
    public function withClauseKind(EditableNode $value)
    {
        if ($value === $this->_clause_kind) {
            return $this;
        }
        return new static($value, $this->_name, $this->_as, $this->_alias);
    }
    /**
     * @return bool
     */
    public function hasClauseKind()
    {
        return !$this->_clause_kind->isMissing();
    }
    /**
     * @return null | ConstToken | FunctionToken
     */
    /**
     * @return null|EditableToken
     */
    public function getClauseKind()
    {
        if ($this->_clause_kind->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableToken::class, $this->_clause_kind);
    }
    /**
     * @return ConstToken | FunctionToken
     */
    /**
     * @return EditableToken
     */
    public function getClauseKindx()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_clause_kind);
    }
    /**
     * @return EditableNode
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(EditableNode $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_clause_kind, $value, $this->_as, $this->_alias);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return QualifiedName | NameToken
     */
    /**
     * @return EditableNode
     */
    public function getName()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_name);
    }
    /**
     * @return QualifiedName | NameToken
     */
    /**
     * @return EditableNode
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return EditableNode
     */
    public function getAsUNTYPED()
    {
        return $this->_as;
    }
    /**
     * @return static
     */
    public function withAs(EditableNode $value)
    {
        if ($value === $this->_as) {
            return $this;
        }
        return new static($this->_clause_kind, $this->_name, $value, $this->_alias);
    }
    /**
     * @return bool
     */
    public function hasAs()
    {
        return !$this->_as->isMissing();
    }
    /**
     * @return null | AsToken
     */
    /**
     * @return null|AsToken
     */
    public function getAs()
    {
        if ($this->_as->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AsToken::class, $this->_as);
    }
    /**
     * @return AsToken
     */
    /**
     * @return AsToken
     */
    public function getAsx()
    {
        return TypeAssert\instance_of(AsToken::class, $this->_as);
    }
    /**
     * @return EditableNode
     */
    public function getAliasUNTYPED()
    {
        return $this->_alias;
    }
    /**
     * @return static
     */
    public function withAlias(EditableNode $value)
    {
        if ($value === $this->_alias) {
            return $this;
        }
        return new static($this->_clause_kind, $this->_name, $this->_as, $value);
    }
    /**
     * @return bool
     */
    public function hasAlias()
    {
        return !$this->_alias->isMissing();
    }
    /**
     * @return null | NameToken
     */
    /**
     * @return null|NameToken
     */
    public function getAlias()
    {
        if ($this->_alias->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(NameToken::class, $this->_alias);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getAliasx()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_alias);
    }
}

