<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<971623ea2da1125d5b6909ff0573dabf>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class NamespaceUseClause extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'namespace_use_clause';
    /**
     * @var null|Token
     */
    private $_clause_kind;
    /**
     * @var INameishNode
     */
    private $_name;
    /**
     * @var null|AsToken
     */
    private $_as;
    /**
     * @var null|NameToken
     */
    private $_alias;
    public function __construct(?Token $clause_kind, INameishNode $name, ?AsToken $as, ?NameToken $alias, ?array $source_ref = null)
    {
        $this->_clause_kind = $clause_kind;
        $this->_name = $name;
        $this->_as = $as;
        $this->_alias = $alias;
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
        $clause_kind = Node::fromJSON($json['namespace_use_clause_kind'], $file, $offset, $source, 'Token');
        $offset += (($__tmp1__ = $clause_kind) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $name = Node::fromJSON($json['namespace_use_name'], $file, $offset, $source, 'INameishNode');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $as = Node::fromJSON($json['namespace_use_as'], $file, $offset, $source, 'AsToken');
        $offset += (($__tmp2__ = $as) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $alias = Node::fromJSON($json['namespace_use_alias'], $file, $offset, $source, 'NameToken');
        $offset += (($__tmp3__ = $alias) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($clause_kind, $name, $as, $alias, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['clause_kind' => $this->_clause_kind, 'name' => $this->_name, 'as' => $this->_as, 'alias' => $this->_alias]);
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
        $clause_kind = $this->_clause_kind === null ? null : $rewriter($this->_clause_kind, $parents);
        $name = $rewriter($this->_name, $parents);
        $as = $this->_as === null ? null : $rewriter($this->_as, $parents);
        $alias = $this->_alias === null ? null : $rewriter($this->_alias, $parents);
        if ($clause_kind === $this->_clause_kind && $name === $this->_name && $as === $this->_as && $alias === $this->_alias) {
            return $this;
        }
        return new static($clause_kind, $name, $as, $alias);
    }
    /**
     * @return null|Node
     */
    public function getClauseKindUNTYPED()
    {
        return $this->_clause_kind;
    }
    /**
     * @return static
     */
    public function withClauseKind(?Token $value)
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
        return $this->_clause_kind !== null;
    }
    /**
     * @return null | ConstToken | FunctionToken
     */
    /**
     * @return null|Token
     */
    public function getClauseKind()
    {
        return $this->_clause_kind;
    }
    /**
     * @return ConstToken | FunctionToken
     */
    /**
     * @return Token
     */
    public function getClauseKindx()
    {
        return TypeAssert\not_null($this->getClauseKind());
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
    public function withName(INameishNode $value)
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
        return $this->_name !== null;
    }
    /**
     * @return QualifiedName | NameToken
     */
    /**
     * @return INameishNode
     */
    public function getName()
    {
        return TypeAssert\instance_of(INameishNode::class, $this->_name);
    }
    /**
     * @return QualifiedName | NameToken
     */
    /**
     * @return INameishNode
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return null|Node
     */
    public function getAsUNTYPED()
    {
        return $this->_as;
    }
    /**
     * @return static
     */
    public function withAs(?AsToken $value)
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
        return $this->_as !== null;
    }
    /**
     * @return null | AsToken
     */
    /**
     * @return null|AsToken
     */
    public function getAs()
    {
        return $this->_as;
    }
    /**
     * @return AsToken
     */
    /**
     * @return AsToken
     */
    public function getAsx()
    {
        return TypeAssert\not_null($this->getAs());
    }
    /**
     * @return null|Node
     */
    public function getAliasUNTYPED()
    {
        return $this->_alias;
    }
    /**
     * @return static
     */
    public function withAlias(?NameToken $value)
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
        return $this->_alias !== null;
    }
    /**
     * @return null | NameToken
     */
    /**
     * @return null|NameToken
     */
    public function getAlias()
    {
        return $this->_alias;
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getAliasx()
    {
        return TypeAssert\not_null($this->getAlias());
    }
}

