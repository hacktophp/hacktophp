<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ObjectCreationExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_new_keyword;
    /**
     * @var EditableNode
     */
    private $_object;
    public function __construct(EditableNode $new_keyword, EditableNode $object)
    {
        parent::__construct('object_creation_expression');
        $this->_new_keyword = $new_keyword;
        $this->_object = $object;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $new_keyword = EditableNode::fromJSON($json['object_creation_new_keyword'], $file, $offset, $source);
        $offset += $new_keyword->getWidth();
        $object = EditableNode::fromJSON($json['object_creation_object'], $file, $offset, $source);
        $offset += $object->getWidth();
        return new static($new_keyword, $object);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('new_keyword' => $this->_new_keyword, 'object' => $this->_object);
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
        $new_keyword = $this->_new_keyword->rewrite($rewriter, $parents);
        $object = $this->_object->rewrite($rewriter, $parents);
        if ($new_keyword === $this->_new_keyword && $object === $this->_object) {
            return $this;
        }
        return new static($new_keyword, $object);
    }
    /**
     * @return EditableNode
     */
    public function getNewKeywordUNTYPED()
    {
        return $this->_new_keyword;
    }
    /**
     * @return static
     */
    public function withNewKeyword(EditableNode $value)
    {
        if ($value === $this->_new_keyword) {
            return $this;
        }
        return new static($value, $this->_object);
    }
    /**
     * @return bool
     */
    public function hasNewKeyword()
    {
        return !$this->_new_keyword->isMissing();
    }
    /**
     * @return NewToken
     */
    /**
     * @return NewToken
     */
    public function getNewKeyword()
    {
        return TypeAssert\instance_of(NewToken::class, $this->_new_keyword);
    }
    /**
     * @return NewToken
     */
    /**
     * @return NewToken
     */
    public function getNewKeywordx()
    {
        return $this->getNewKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getObjectUNTYPED()
    {
        return $this->_object;
    }
    /**
     * @return static
     */
    public function withObject(EditableNode $value)
    {
        if ($value === $this->_object) {
            return $this;
        }
        return new static($this->_new_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasObject()
    {
        return !$this->_object->isMissing();
    }
    /**
     * @return AnonymousClass | ConstructorCall
     */
    /**
     * @return EditableNode
     */
    public function getObject()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_object);
    }
    /**
     * @return AnonymousClass | ConstructorCall
     */
    /**
     * @return EditableNode
     */
    public function getObjectx()
    {
        return $this->getObject();
    }
}

