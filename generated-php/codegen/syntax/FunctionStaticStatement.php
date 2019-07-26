<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<0778d4161d8d42f7246d448261462a00>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class FunctionStaticStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_static_keyword;
    /**
     * @var EditableNode
     */
    private $_declarations;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $static_keyword, EditableNode $declarations, EditableNode $semicolon)
    {
        parent::__construct('function_static_statement');
        $this->_static_keyword = $static_keyword;
        $this->_declarations = $declarations;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $static_keyword = EditableNode::fromJSON($json['static_static_keyword'], $file, $offset, $source);
        $offset += $static_keyword->getWidth();
        $declarations = EditableNode::fromJSON($json['static_declarations'], $file, $offset, $source);
        $offset += $declarations->getWidth();
        $semicolon = EditableNode::fromJSON($json['static_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($static_keyword, $declarations, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['static_keyword' => $this->_static_keyword, 'declarations' => $this->_declarations, 'semicolon' => $this->_semicolon];
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
        $static_keyword = $this->_static_keyword->rewrite($rewriter, $parents);
        $declarations = $this->_declarations->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($static_keyword === $this->_static_keyword && $declarations === $this->_declarations && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($static_keyword, $declarations, $semicolon);
    }
    /**
     * @return EditableNode
     */
    public function getStaticKeywordUNTYPED()
    {
        return $this->_static_keyword;
    }
    /**
     * @return static
     */
    public function withStaticKeyword(EditableNode $value)
    {
        if ($value === $this->_static_keyword) {
            return $this;
        }
        return new static($value, $this->_declarations, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasStaticKeyword()
    {
        return !$this->_static_keyword->isMissing();
    }
    /**
     * @return StaticToken
     */
    /**
     * @return StaticToken
     */
    public function getStaticKeyword()
    {
        return TypeAssert\instance_of(StaticToken::class, $this->_static_keyword);
    }
    /**
     * @return StaticToken
     */
    /**
     * @return StaticToken
     */
    public function getStaticKeywordx()
    {
        return $this->getStaticKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getDeclarationsUNTYPED()
    {
        return $this->_declarations;
    }
    /**
     * @return static
     */
    public function withDeclarations(EditableNode $value)
    {
        if ($value === $this->_declarations) {
            return $this;
        }
        return new static($this->_static_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasDeclarations()
    {
        return !$this->_declarations->isMissing();
    }
    /**
     * @return NodeList<StaticDeclarator>
     */
    /**
     * @return NodeList<StaticDeclarator>
     */
    public function getDeclarations()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_declarations);
    }
    /**
     * @return NodeList<StaticDeclarator>
     */
    /**
     * @return NodeList<StaticDeclarator>
     */
    public function getDeclarationsx()
    {
        return $this->getDeclarations();
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
        return new static($this->_static_keyword, $this->_declarations, $value);
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

