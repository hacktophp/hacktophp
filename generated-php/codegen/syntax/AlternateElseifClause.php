<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<51c625f0a4f326cb519cbe6810d2fac0>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class AlternateElseifClause extends EditableNode implements IControlFlowStatement
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_condition;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_colon;
    /**
     * @var EditableNode
     */
    private $_statement;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $condition, EditableNode $right_paren, EditableNode $colon, EditableNode $statement)
    {
        parent::__construct('alternate_elseif_clause');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_condition = $condition;
        $this->_right_paren = $right_paren;
        $this->_colon = $colon;
        $this->_statement = $statement;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['alternate_elseif_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['alternate_elseif_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $condition = EditableNode::fromJSON($json['alternate_elseif_condition'], $file, $offset, $source);
        $offset += $condition->getWidth();
        $right_paren = EditableNode::fromJSON($json['alternate_elseif_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $colon = EditableNode::fromJSON($json['alternate_elseif_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        $statement = EditableNode::fromJSON($json['alternate_elseif_statement'], $file, $offset, $source);
        $offset += $statement->getWidth();
        return new static($keyword, $left_paren, $condition, $right_paren, $colon, $statement);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'condition' => $this->_condition, 'right_paren' => $this->_right_paren, 'colon' => $this->_colon, 'statement' => $this->_statement);
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $condition = $this->_condition->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $statement = $this->_statement->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $condition === $this->_condition && $right_paren === $this->_right_paren && $colon === $this->_colon && $statement === $this->_statement) {
            return $this;
        }
        return new static($keyword, $left_paren, $condition, $right_paren, $colon, $statement);
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
        return new static($value, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_keyword);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(EditableNode $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_condition, $this->_right_paren, $this->_colon, $this->_statement);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return !$this->_left_paren->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getLeftParen()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_left_paren);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getLeftParenx()
    {
        return $this->getLeftParen();
    }
    /**
     * @return EditableNode
     */
    public function getConditionUNTYPED()
    {
        return $this->_condition;
    }
    /**
     * @return static
     */
    public function withCondition(EditableNode $value)
    {
        if ($value === $this->_condition) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_colon, $this->_statement);
    }
    /**
     * @return bool
     */
    public function hasCondition()
    {
        return !$this->_condition->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getCondition()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_condition);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getConditionx()
    {
        return $this->getCondition();
    }
    /**
     * @return EditableNode
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(EditableNode $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $value, $this->_colon, $this->_statement);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return !$this->_right_paren->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getRightParen()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_right_paren);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getRightParenx()
    {
        return $this->getRightParen();
    }
    /**
     * @return EditableNode
     */
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(EditableNode $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $value, $this->_statement);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return !$this->_colon->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getColon()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_colon);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getColonx()
    {
        return $this->getColon();
    }
    /**
     * @return EditableNode
     */
    public function getStatementUNTYPED()
    {
        return $this->_statement;
    }
    /**
     * @return static
     */
    public function withStatement(EditableNode $value)
    {
        if ($value === $this->_statement) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_condition, $this->_right_paren, $this->_colon, $value);
    }
    /**
     * @return bool
     */
    public function hasStatement()
    {
        return !$this->_statement->isMissing();
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getStatement()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_statement);
    }
    /**
     * @return unknown
     */
    /**
     * @return EditableNode
     */
    public function getStatementx()
    {
        return $this->getStatement();
    }
}

