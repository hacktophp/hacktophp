<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class TypeConstraint extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_type;
    public function __construct(EditableNode $keyword, EditableNode $type)
    {
        parent::__construct('type_constraint');
        $this->_keyword = $keyword;
        $this->_type = $type;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['constraint_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $type = EditableNode::fromJSON($json['constraint_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        return new static($keyword, $type);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'type' => $this->_type);
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
        $type = $this->_type->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $type === $this->_type) {
            return $this;
        }
        return new static($keyword, $type);
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
        return new static($value, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return AsToken | SuperToken
     */
    /**
     * @return EditableToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_keyword);
    }
    /**
     * @return AsToken | SuperToken
     */
    /**
     * @return EditableToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(EditableNode $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
     * DictionaryTypeSpecifier | GenericTypeSpecifier | KeysetTypeSpecifier |
     * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * TypeConstant | VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
     * DictionaryTypeSpecifier | GenericTypeSpecifier | KeysetTypeSpecifier |
     * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * TypeConstant | VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

