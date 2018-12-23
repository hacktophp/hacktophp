<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class Script extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_declarations;
    public function __construct(EditableNode $declarations)
    {
        parent::__construct('script');
        $this->_declarations = $declarations;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $declarations = EditableNode::fromJSON($json['script_declarations'], $file, $offset, $source);
        $offset += $declarations->getWidth();
        return new static($declarations);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('declarations' => $this->_declarations);
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
        $declarations = $this->_declarations->rewrite($rewriter, $parents);
        if ($declarations === $this->_declarations) {
            return $this;
        }
        return new static($declarations);
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
        return new static($value);
    }
    /**
     * @return bool
     */
    public function hasDeclarations()
    {
        return !$this->_declarations->isMissing();
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getDeclarations()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_declarations);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getDeclarationsx()
    {
        return $this->getDeclarations();
    }
}

