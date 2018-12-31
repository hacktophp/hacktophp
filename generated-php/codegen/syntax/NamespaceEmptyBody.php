<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5a4d1b0d87fec8ca12a2f6f81a2d7606>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class NamespaceEmptyBody extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $semicolon)
    {
        parent::__construct('namespace_empty_body');
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $semicolon = EditableNode::fromJSON($json['namespace_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['semicolon' => $this->_semicolon];
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
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($semicolon);
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
        return new static($value);
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

