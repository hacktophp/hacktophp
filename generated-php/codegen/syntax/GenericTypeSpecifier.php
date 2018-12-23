<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6de5ec36e6e08b97e4cbd4d3f8e0c86c>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class GenericTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_class_type;
    /**
     * @var EditableNode
     */
    private $_argument_list;
    public function __construct(EditableNode $class_type, EditableNode $argument_list)
    {
        parent::__construct('generic_type_specifier');
        $this->_class_type = $class_type;
        $this->_argument_list = $argument_list;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $class_type = EditableNode::fromJSON($json['generic_class_type'], $file, $offset, $source);
        $offset += $class_type->getWidth();
        $argument_list = EditableNode::fromJSON($json['generic_argument_list'], $file, $offset, $source);
        $offset += $argument_list->getWidth();
        return new static($class_type, $argument_list);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('class_type' => $this->_class_type, 'argument_list' => $this->_argument_list);
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
        $class_type = $this->_class_type->rewrite($rewriter, $parents);
        $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
        if ($class_type === $this->_class_type && $argument_list === $this->_argument_list) {
            return $this;
        }
        return new static($class_type, $argument_list);
    }
    /**
     * @return EditableNode
     */
    public function getClassTypeUNTYPED()
    {
        return $this->_class_type;
    }
    /**
     * @return static
     */
    public function withClassType(EditableNode $value)
    {
        if ($value === $this->_class_type) {
            return $this;
        }
        return new static($value, $this->_argument_list);
    }
    /**
     * @return bool
     */
    public function hasClassType()
    {
        return !$this->_class_type->isMissing();
    }
    /**
     * @return QualifiedName | XHPClassNameToken | NameToken | StringToken
     */
    /**
     * @return EditableNode
     */
    public function getClassType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_class_type);
    }
    /**
     * @return QualifiedName | XHPClassNameToken | NameToken | StringToken
     */
    /**
     * @return EditableNode
     */
    public function getClassTypex()
    {
        return $this->getClassType();
    }
    /**
     * @return EditableNode
     */
    public function getArgumentListUNTYPED()
    {
        return $this->_argument_list;
    }
    /**
     * @return static
     */
    public function withArgumentList(EditableNode $value)
    {
        if ($value === $this->_argument_list) {
            return $this;
        }
        return new static($this->_class_type, $value);
    }
    /**
     * @return bool
     */
    public function hasArgumentList()
    {
        return !$this->_argument_list->isMissing();
    }
    /**
     * @return TypeArguments
     */
    /**
     * @return TypeArguments
     */
    public function getArgumentList()
    {
        return TypeAssert\instance_of(TypeArguments::class, $this->_argument_list);
    }
    /**
     * @return TypeArguments
     */
    /**
     * @return TypeArguments
     */
    public function getArgumentListx()
    {
        return $this->getArgumentList();
    }
}

