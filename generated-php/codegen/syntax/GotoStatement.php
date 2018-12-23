<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class GotoStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_label_name;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $label_name, EditableNode $semicolon)
    {
        parent::__construct('goto_statement');
        $this->_keyword = $keyword;
        $this->_label_name = $label_name;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['goto_statement_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $label_name = EditableNode::fromJSON($json['goto_statement_label_name'], $file, $offset, $source);
        $offset += $label_name->getWidth();
        $semicolon = EditableNode::fromJSON($json['goto_statement_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $label_name, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'label_name' => $this->_label_name, 'semicolon' => $this->_semicolon);
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
        $label_name = $this->_label_name->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $label_name === $this->_label_name && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $label_name, $semicolon);
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
        return new static($value, $this->_label_name, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return GotoToken
     */
    /**
     * @return GotoToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(GotoToken::class, $this->_keyword);
    }
    /**
     * @return GotoToken
     */
    /**
     * @return GotoToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getLabelNameUNTYPED()
    {
        return $this->_label_name;
    }
    /**
     * @return static
     */
    public function withLabelName(EditableNode $value)
    {
        if ($value === $this->_label_name) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasLabelName()
    {
        return !$this->_label_name->isMissing();
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getLabelName()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_label_name);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getLabelNamex()
    {
        return $this->getLabelName();
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
        return new static($this->_keyword, $this->_label_name, $value);
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

