<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<928736883fc6861fc2dcb834e258f805>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class QualifiedName extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_parts;
    public function __construct(EditableNode $parts)
    {
        parent::__construct('qualified_name');
        $this->_parts = $parts;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $parts = EditableNode::fromJSON($json['qualified_name_parts'], $file, $offset, $source);
        $offset += $parts->getWidth();
        return new static($parts);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['parts' => $this->_parts];
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
        $parts = $this->_parts->rewrite($rewriter, $parents);
        if ($parts === $this->_parts) {
            return $this;
        }
        return new static($parts);
    }
    /**
     * @return EditableNode
     */
    public function getPartsUNTYPED()
    {
        return $this->_parts;
    }
    /**
     * @return static
     */
    public function withParts(EditableNode $value)
    {
        if ($value === $this->_parts) {
            return $this;
        }
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasParts()
    {
        return !$this->_parts->isMissing();
    }
    /**
     * @return EditableList<?NameToken> | EditableList<NameToken>
     */
    /**
     * @return EditableList<null|NameToken>
     */
    public function getParts()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_parts);
    }
    /**
     * @return EditableList<?NameToken> | EditableList<NameToken>
     */
    /**
     * @return EditableList<null|NameToken>
     */
    public function getPartsx()
    {
        return $this->getParts();
    }
}

