<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e95b5d63c2ac17dbedbee736c5c8b2d5>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class GotoLabel extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_colon;
    public function __construct(EditableNode $name, EditableNode $colon)
    {
        parent::__construct('goto_label');
        $this->_name = $name;
        $this->_colon = $colon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $name = EditableNode::fromJSON($json['goto_label_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $colon = EditableNode::fromJSON($json['goto_label_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        return new static($name, $colon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('name' => $this->_name, 'colon' => $this->_colon);
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
        $name = $this->_name->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        if ($name === $this->_name && $colon === $this->_colon) {
            return $this;
        }
        return new static($name, $colon);
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
        return new static($value, $this->_colon);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_name);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getNamex()
    {
        return $this->getName();
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
        return new static($this->_name, $value);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return !$this->_colon->isMissing();
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColon()
    {
        return TypeAssert\instance_of(ColonToken::class, $this->_colon);
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColonx()
    {
        return $this->getColon();
    }
}

