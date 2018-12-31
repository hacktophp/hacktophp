<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<104863f267c902e235bfbf6f0a444c00>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class TraitUseConflictResolution extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_names;
    /**
     * @var EditableNode
     */
    private $_left_brace;
    /**
     * @var EditableNode
     */
    private $_clauses;
    /**
     * @var EditableNode
     */
    private $_right_brace;
    public function __construct(EditableNode $keyword, EditableNode $names, EditableNode $left_brace, EditableNode $clauses, EditableNode $right_brace)
    {
        parent::__construct('trait_use_conflict_resolution');
        $this->_keyword = $keyword;
        $this->_names = $names;
        $this->_left_brace = $left_brace;
        $this->_clauses = $clauses;
        $this->_right_brace = $right_brace;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['trait_use_conflict_resolution_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $names = EditableNode::fromJSON($json['trait_use_conflict_resolution_names'], $file, $offset, $source);
        $offset += $names->getWidth();
        $left_brace = EditableNode::fromJSON($json['trait_use_conflict_resolution_left_brace'], $file, $offset, $source);
        $offset += $left_brace->getWidth();
        $clauses = EditableNode::fromJSON($json['trait_use_conflict_resolution_clauses'], $file, $offset, $source);
        $offset += $clauses->getWidth();
        $right_brace = EditableNode::fromJSON($json['trait_use_conflict_resolution_right_brace'], $file, $offset, $source);
        $offset += $right_brace->getWidth();
        return new static($keyword, $names, $left_brace, $clauses, $right_brace);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'names' => $this->_names, 'left_brace' => $this->_left_brace, 'clauses' => $this->_clauses, 'right_brace' => $this->_right_brace];
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
        $names = $this->_names->rewrite($rewriter, $parents);
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $clauses = $this->_clauses->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $names === $this->_names && $left_brace === $this->_left_brace && $clauses === $this->_clauses && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($keyword, $names, $left_brace, $clauses, $right_brace);
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
        return new static($value, $this->_names, $this->_left_brace, $this->_clauses, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return UseToken
     */
    /**
     * @return UseToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(UseToken::class, $this->_keyword);
    }
    /**
     * @return UseToken
     */
    /**
     * @return UseToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getNamesUNTYPED()
    {
        return $this->_names;
    }
    /**
     * @return static
     */
    public function withNames(EditableNode $value)
    {
        if ($value === $this->_names) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_left_brace, $this->_clauses, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasNames()
    {
        return !$this->_names->isMissing();
    }
    /**
     * @return EditableList<SimpleTypeSpecifier>
     */
    /**
     * @return EditableList<SimpleTypeSpecifier>
     */
    public function getNames()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_names);
    }
    /**
     * @return EditableList<SimpleTypeSpecifier>
     */
    /**
     * @return EditableList<SimpleTypeSpecifier>
     */
    public function getNamesx()
    {
        return $this->getNames();
    }
    /**
     * @return EditableNode
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(EditableNode $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($this->_keyword, $this->_names, $value, $this->_clauses, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return !$this->_left_brace->isMissing();
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBrace()
    {
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return EditableNode
     */
    public function getClausesUNTYPED()
    {
        return $this->_clauses;
    }
    /**
     * @return static
     */
    public function withClauses(EditableNode $value)
    {
        if ($value === $this->_clauses) {
            return $this;
        }
        return new static($this->_keyword, $this->_names, $this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasClauses()
    {
        return !$this->_clauses->isMissing();
    }
    /**
     * @return EditableList<TraitUseAliasItem> | EditableList<EditableNode> |
     * EditableList<TraitUsePrecedenceItem> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getClauses()
    {
        if ($this->_clauses->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_clauses);
    }
    /**
     * @return EditableList<TraitUseAliasItem> | EditableList<EditableNode> |
     * EditableList<TraitUsePrecedenceItem>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getClausesx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_clauses);
    }
    /**
     * @return EditableNode
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(EditableNode $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_keyword, $this->_names, $this->_left_brace, $this->_clauses, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return !$this->_right_brace->isMissing();
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBrace()
    {
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

