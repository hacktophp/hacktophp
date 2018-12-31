<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<bc196035e77196040fdeba5790dbab05>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class SwitchFallthrough extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $semicolon)
    {
        parent::__construct('switch_fallthrough');
        $this->_keyword = $keyword;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['fallthrough_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $semicolon = EditableNode::fromJSON($json['fallthrough_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'semicolon' => $this->_semicolon];
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
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $semicolon);
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
        return new static($value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return null
     */
    /**
     * @return null|EditableNode
     */
    public function getKeyword()
    {
        if ($this->_keyword->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_keyword);
    }
    /**
     * @return
     */
    /**
     * @return EditableNode
     */
    public function getKeywordx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_keyword);
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
        return new static($this->_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
    }
    /**
     * @return null
     */
    /**
     * @return null|EditableNode
     */
    public function getSemicolon()
    {
        if ($this->_semicolon->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_semicolon);
    }
    /**
     * @return
     */
    /**
     * @return EditableNode
     */
    public function getSemicolonx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_semicolon);
    }
}

