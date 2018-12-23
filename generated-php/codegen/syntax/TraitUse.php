<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class TraitUse extends EditableNode
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
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $names, EditableNode $semicolon)
    {
        parent::__construct('trait_use');
        $this->_keyword = $keyword;
        $this->_names = $names;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['trait_use_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $names = EditableNode::fromJSON($json['trait_use_names'], $file, $offset, $source);
        $offset += $names->getWidth();
        $semicolon = EditableNode::fromJSON($json['trait_use_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $names, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'names' => $this->_names, 'semicolon' => $this->_semicolon);
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
        $names = $this->_names->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $names === $this->_names && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $names, $semicolon);
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
        return new static($value, $this->_names, $this->_semicolon);
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
        return new static($this->_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasNames()
    {
        return !$this->_names->isMissing();
    }
    /**
     * @return EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
     * EditableList<SimpleTypeSpecifier>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getNames()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_names);
    }
    /**
     * @return EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
     * EditableList<SimpleTypeSpecifier>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getNamesx()
    {
        return $this->getNames();
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
        return new static($this->_keyword, $this->_names, $value);
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

