<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<975e872c87c59506997082b79c70aa96>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class GlobalStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_variables;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $variables, EditableNode $semicolon)
    {
        parent::__construct('global_statement');
        $this->_keyword = $keyword;
        $this->_variables = $variables;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['global_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $variables = EditableNode::fromJSON($json['global_variables'], $file, $offset, $source);
        $offset += $variables->getWidth();
        $semicolon = EditableNode::fromJSON($json['global_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $variables, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'variables' => $this->_variables, 'semicolon' => $this->_semicolon];
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
        $variables = $this->_variables->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $variables === $this->_variables && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $variables, $semicolon);
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
        return new static($value, $this->_variables, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return GlobalToken
     */
    /**
     * @return GlobalToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(GlobalToken::class, $this->_keyword);
    }
    /**
     * @return GlobalToken
     */
    /**
     * @return GlobalToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getVariablesUNTYPED()
    {
        return $this->_variables;
    }
    /**
     * @return static
     */
    public function withVariables(EditableNode $value)
    {
        if ($value === $this->_variables) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasVariables()
    {
        return !$this->_variables->isMissing();
    }
    /**
     * @return EditableList<PrefixUnaryExpression> | EditableList<VariableToken>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getVariables()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_variables);
    }
    /**
     * @return EditableList<PrefixUnaryExpression> | EditableList<VariableToken>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getVariablesx()
    {
        return $this->getVariables();
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
        return new static($this->_keyword, $this->_variables, $value);
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

