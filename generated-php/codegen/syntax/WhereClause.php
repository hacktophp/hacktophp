<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6a80d5adb0456d8f2ca7856311e8e804>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class WhereClause extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'where_clause';
    /**
     * @var WhereToken
     */
    private $_keyword;
    /**
     * @var NodeList<ListItem<WhereConstraint>>
     */
    private $_constraints;
    /**
     * @param NodeList<ListItem<WhereConstraint>> $constraints
     */
    public function __construct(WhereToken $keyword, NodeList $constraints, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_constraints = $constraints;
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
        $keyword = Node::fromJSON($json['where_clause_keyword'], $file, $offset, $source, 'WhereToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $constraints = Node::fromJSON($json['where_clause_constraints'], $file, $offset, $source, 'NodeList<ListItem<WhereConstraint>>');
        $constraints = $constraints !== null ? $constraints : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $constraints->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $constraints, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'constraints' => $this->_constraints]);
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
        $keyword = $rewriter($this->_keyword, $parents);
        $constraints = $rewriter($this->_constraints, $parents);
        if ($keyword === $this->_keyword && $constraints === $this->_constraints) {
            return $this;
        }
        return new static($keyword, $constraints);
    }
    /**
     * @return null|Node
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(WhereToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_constraints);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return WhereToken
     */
    /**
     * @return WhereToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(WhereToken::class, $this->_keyword);
    }
    /**
     * @return WhereToken
     */
    /**
     * @return WhereToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getConstraintsUNTYPED()
    {
        return $this->_constraints;
    }
    /**
     * @param NodeList<ListItem<WhereConstraint>> $value
     *
     * @return static
     */
    public function withConstraints(NodeList $value)
    {
        if ($value === $this->_constraints) {
            return $this;
        }
        return new static($this->_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasConstraints()
    {
        return $this->_constraints !== null;
    }
    /**
     * @return NodeList<ListItem<WhereConstraint>>
     */
    /**
     * @return NodeList<ListItem<WhereConstraint>>
     */
    public function getConstraints()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_constraints);
    }
    /**
     * @return NodeList<ListItem<WhereConstraint>>
     */
    /**
     * @return NodeList<ListItem<WhereConstraint>>
     */
    public function getConstraintsx()
    {
        return $this->getConstraints();
    }
}

