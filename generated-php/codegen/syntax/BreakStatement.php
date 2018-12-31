<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<773041621a96ba09d56ab30f584c764b>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class BreakStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_level;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $level, EditableNode $semicolon)
    {
        parent::__construct('break_statement');
        $this->_keyword = $keyword;
        $this->_level = $level;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['break_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $level = EditableNode::fromJSON($json['break_level'], $file, $offset, $source);
        $offset += $level->getWidth();
        $semicolon = EditableNode::fromJSON($json['break_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $level, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'level' => $this->_level, 'semicolon' => $this->_semicolon];
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
        $level = $this->_level->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $level === $this->_level && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $level, $semicolon);
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
        return new static($value, $this->_level, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return BreakToken
     */
    /**
     * @return BreakToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(BreakToken::class, $this->_keyword);
    }
    /**
     * @return BreakToken
     */
    /**
     * @return BreakToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getLevelUNTYPED()
    {
        return $this->_level;
    }
    /**
     * @return static
     */
    public function withLevel(EditableNode $value)
    {
        if ($value === $this->_level) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasLevel()
    {
        return !$this->_level->isMissing();
    }
    /**
     * @return LiteralExpression | null | VariableExpression
     */
    /**
     * @return null|EditableNode
     */
    public function getLevel()
    {
        if ($this->_level->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_level);
    }
    /**
     * @return LiteralExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getLevelx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_level);
    }
    /**
     * @return EditableNode
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(EditableNode $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_level, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

