<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5f3d7404dfdaea70da39ffc1641c4a5a>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class WhereClause extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_constraints;
    public function __construct(EditableNode $keyword, EditableNode $constraints)
    {
        parent::__construct('where_clause');
        $this->_keyword = $keyword;
        $this->_constraints = $constraints;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['where_clause_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $constraints = EditableNode::fromJSON($json['where_clause_constraints'], $file, $offset, $source);
        $offset += $constraints->getWidth();
        return new static($keyword, $constraints);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'constraints' => $this->_constraints];
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $constraints = $this->_constraints->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $constraints === $this->_constraints) {
            return $this;
        }
        return new static($keyword, $constraints);
    }
    /**
     * @return EditableNode
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(EditableNode $value)
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
        return !$this->_keyword->isMissing();
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
     * @return EditableNode
     */
    public function getConstraintsUNTYPED()
    {
        return $this->_constraints;
    }
    /**
     * @return static
     */
    public function withConstraints(EditableNode $value)
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
        return !$this->_constraints->isMissing();
    }
    /**
     * @return EditableList<WhereConstraint>
     */
    /**
     * @return EditableList<WhereConstraint>
     */
    public function getConstraints()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_constraints);
    }
    /**
     * @return EditableList<WhereConstraint>
     */
    /**
     * @return EditableList<WhereConstraint>
     */
    public function getConstraintsx()
    {
        return $this->getConstraints();
    }
}

