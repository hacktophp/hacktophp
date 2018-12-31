<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b65d38f96f5f58f4a966ec6880c5085d>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class RequireClause extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_kind;
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $kind, EditableNode $name, EditableNode $semicolon)
    {
        parent::__construct('require_clause');
        $this->_keyword = $keyword;
        $this->_kind = $kind;
        $this->_name = $name;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['require_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $kind = EditableNode::fromJSON($json['require_kind'], $file, $offset, $source);
        $offset += $kind->getWidth();
        $name = EditableNode::fromJSON($json['require_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $semicolon = EditableNode::fromJSON($json['require_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $kind, $name, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'kind' => $this->_kind, 'name' => $this->_name, 'semicolon' => $this->_semicolon];
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
        $kind = $this->_kind->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $kind === $this->_kind && $name === $this->_name && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $kind, $name, $semicolon);
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
        return new static($value, $this->_kind, $this->_name, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return RequireToken
     */
    /**
     * @return RequireToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(RequireToken::class, $this->_keyword);
    }
    /**
     * @return RequireToken
     */
    /**
     * @return RequireToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getKindUNTYPED()
    {
        return $this->_kind;
    }
    /**
     * @return static
     */
    public function withKind(EditableNode $value)
    {
        if ($value === $this->_kind) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_name, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKind()
    {
        return !$this->_kind->isMissing();
    }
    /**
     * @return ExtendsToken | ImplementsToken
     */
    /**
     * @return EditableToken
     */
    public function getKind()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_kind);
    }
    /**
     * @return ExtendsToken | ImplementsToken
     */
    /**
     * @return EditableToken
     */
    public function getKindx()
    {
        return $this->getKind();
    }
    /**
     * @return EditableNode
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(EditableNode $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_keyword, $this->_kind, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getName()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_name);
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getNamex()
    {
        return $this->getName();
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
        return new static($this->_keyword, $this->_kind, $this->_name, $value);
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

