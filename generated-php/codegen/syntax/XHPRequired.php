<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<7de13b3e1e58f71e0375b56d59008061>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class XHPRequired extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_at;
    /**
     * @var EditableNode
     */
    private $_keyword;
    public function __construct(EditableNode $at, EditableNode $keyword)
    {
        parent::__construct('xhp_required');
        $this->_at = $at;
        $this->_keyword = $keyword;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $at = EditableNode::fromJSON($json['xhp_required_at'], $file, $offset, $source);
        $offset += $at->getWidth();
        $keyword = EditableNode::fromJSON($json['xhp_required_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        return new static($at, $keyword);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['at' => $this->_at, 'keyword' => $this->_keyword];
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
        $at = $this->_at->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        if ($at === $this->_at && $keyword === $this->_keyword) {
            return $this;
        }
        return new static($at, $keyword);
    }
    /**
     * @return EditableNode
     */
    public function getAtUNTYPED()
    {
        return $this->_at;
    }
    /**
     * @return static
     */
    public function withAt(EditableNode $value)
    {
        if ($value === $this->_at) {
            return $this;
        }
        return new static($value, $this->_keyword);
    }
    /**
     * @return bool
     */
    public function hasAt()
    {
        return !$this->_at->isMissing();
    }
    /**
     * @return AtToken
     */
    /**
     * @return AtToken
     */
    public function getAt()
    {
        return TypeAssert\instance_of(AtToken::class, $this->_at);
    }
    /**
     * @return AtToken
     */
    /**
     * @return AtToken
     */
    public function getAtx()
    {
        return $this->getAt();
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
        return new static($this->_at, $value);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return RequiredToken
     */
    /**
     * @return RequiredToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(RequiredToken::class, $this->_keyword);
    }
    /**
     * @return RequiredToken
     */
    /**
     * @return RequiredToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
}

