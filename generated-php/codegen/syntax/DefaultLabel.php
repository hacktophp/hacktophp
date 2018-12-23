<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class DefaultLabel extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_colon;
    public function __construct(EditableNode $keyword, EditableNode $colon)
    {
        parent::__construct('default_label');
        $this->_keyword = $keyword;
        $this->_colon = $colon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['default_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $colon = EditableNode::fromJSON($json['default_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        return new static($keyword, $colon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'colon' => $this->_colon);
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
        $colon = $this->_colon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $colon === $this->_colon) {
            return $this;
        }
        return new static($keyword, $colon);
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
        return new static($value, $this->_colon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return DefaultToken
     */
    /**
     * @return DefaultToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(DefaultToken::class, $this->_keyword);
    }
    /**
     * @return DefaultToken
     */
    /**
     * @return DefaultToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
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
        return new static($this->_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return !$this->_colon->isMissing();
    }
    /**
     * @return ColonToken | SemicolonToken
     */
    /**
     * @return EditableToken
     */
    public function getColon()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_colon);
    }
    /**
     * @return ColonToken | SemicolonToken
     */
    /**
     * @return EditableToken
     */
    public function getColonx()
    {
        return $this->getColon();
    }
}

