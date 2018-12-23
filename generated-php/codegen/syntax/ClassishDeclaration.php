<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ClassishDeclaration extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute;
    /**
     * @var EditableNode
     */
    private $_modifiers;
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_type_parameters;
    /**
     * @var EditableNode
     */
    private $_extends_keyword;
    /**
     * @var EditableNode
     */
    private $_extends_list;
    /**
     * @var EditableNode
     */
    private $_implements_keyword;
    /**
     * @var EditableNode
     */
    private $_implements_list;
    /**
     * @var EditableNode
     */
    private $_body;
    public function __construct(EditableNode $attribute, EditableNode $modifiers, EditableNode $keyword, EditableNode $name, EditableNode $type_parameters, EditableNode $extends_keyword, EditableNode $extends_list, EditableNode $implements_keyword, EditableNode $implements_list, EditableNode $body)
    {
        parent::__construct('classish_declaration');
        $this->_attribute = $attribute;
        $this->_modifiers = $modifiers;
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_type_parameters = $type_parameters;
        $this->_extends_keyword = $extends_keyword;
        $this->_extends_list = $extends_list;
        $this->_implements_keyword = $implements_keyword;
        $this->_implements_list = $implements_list;
        $this->_body = $body;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $attribute = EditableNode::fromJSON($json['classish_attribute'], $file, $offset, $source);
        $offset += $attribute->getWidth();
        $modifiers = EditableNode::fromJSON($json['classish_modifiers'], $file, $offset, $source);
        $offset += $modifiers->getWidth();
        $keyword = EditableNode::fromJSON($json['classish_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $name = EditableNode::fromJSON($json['classish_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $type_parameters = EditableNode::fromJSON($json['classish_type_parameters'], $file, $offset, $source);
        $offset += $type_parameters->getWidth();
        $extends_keyword = EditableNode::fromJSON($json['classish_extends_keyword'], $file, $offset, $source);
        $offset += $extends_keyword->getWidth();
        $extends_list = EditableNode::fromJSON($json['classish_extends_list'], $file, $offset, $source);
        $offset += $extends_list->getWidth();
        $implements_keyword = EditableNode::fromJSON($json['classish_implements_keyword'], $file, $offset, $source);
        $offset += $implements_keyword->getWidth();
        $implements_list = EditableNode::fromJSON($json['classish_implements_list'], $file, $offset, $source);
        $offset += $implements_list->getWidth();
        $body = EditableNode::fromJSON($json['classish_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        return new static($attribute, $modifiers, $keyword, $name, $type_parameters, $extends_keyword, $extends_list, $implements_keyword, $implements_list, $body);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('attribute' => $this->_attribute, 'modifiers' => $this->_modifiers, 'keyword' => $this->_keyword, 'name' => $this->_name, 'type_parameters' => $this->_type_parameters, 'extends_keyword' => $this->_extends_keyword, 'extends_list' => $this->_extends_list, 'implements_keyword' => $this->_implements_keyword, 'implements_list' => $this->_implements_list, 'body' => $this->_body);
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
        $attribute = $this->_attribute->rewrite($rewriter, $parents);
        $modifiers = $this->_modifiers->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $type_parameters = $this->_type_parameters->rewrite($rewriter, $parents);
        $extends_keyword = $this->_extends_keyword->rewrite($rewriter, $parents);
        $extends_list = $this->_extends_list->rewrite($rewriter, $parents);
        $implements_keyword = $this->_implements_keyword->rewrite($rewriter, $parents);
        $implements_list = $this->_implements_list->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        if ($attribute === $this->_attribute && $modifiers === $this->_modifiers && $keyword === $this->_keyword && $name === $this->_name && $type_parameters === $this->_type_parameters && $extends_keyword === $this->_extends_keyword && $extends_list === $this->_extends_list && $implements_keyword === $this->_implements_keyword && $implements_list === $this->_implements_list && $body === $this->_body) {
            return $this;
        }
        return new static($attribute, $modifiers, $keyword, $name, $type_parameters, $extends_keyword, $extends_list, $implements_keyword, $implements_list, $body);
    }
    /**
     * @return EditableNode
     */
    public function getAttributeUNTYPED()
    {
        return $this->_attribute;
    }
    /**
     * @return static
     */
    public function withAttribute(EditableNode $value)
    {
        if ($value === $this->_attribute) {
            return $this;
        }
        return new static($value, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasAttribute()
    {
        return !$this->_attribute->isMissing();
    }
    /**
     * @return AttributeSpecification | null
     */
    /**
     * @return null|AttributeSpecification
     */
    public function getAttribute()
    {
        if ($this->_attribute->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute);
    }
    /**
     * @return AttributeSpecification
     */
    /**
     * @return AttributeSpecification
     */
    public function getAttributex()
    {
        return TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute);
    }
    /**
     * @return EditableNode
     */
    public function getModifiersUNTYPED()
    {
        return $this->_modifiers;
    }
    /**
     * @return static
     */
    public function withModifiers(EditableNode $value)
    {
        if ($value === $this->_modifiers) {
            return $this;
        }
        return new static($this->_attribute, $value, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasModifiers()
    {
        return !$this->_modifiers->isMissing();
    }
    /**
     * @return EditableList<EditableNode> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getModifiers()
    {
        if ($this->_modifiers->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_modifiers);
    }
    /**
     * @return EditableList<EditableNode>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getModifiersx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_modifiers);
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
        return new static($this->_attribute, $this->_modifiers, $value, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return ClassToken | InterfaceToken | TraitToken
     */
    /**
     * @return EditableToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_keyword);
    }
    /**
     * @return ClassToken | InterfaceToken | TraitToken
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
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $value, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return null | XHPClassNameToken | NameToken
     */
    /**
     * @return null|EditableToken
     */
    public function getName()
    {
        if ($this->_name->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableToken::class, $this->_name);
    }
    /**
     * @return XHPClassNameToken | NameToken
     */
    /**
     * @return EditableToken
     */
    public function getNamex()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_name);
    }
    /**
     * @return EditableNode
     */
    public function getTypeParametersUNTYPED()
    {
        return $this->_type_parameters;
    }
    /**
     * @return static
     */
    public function withTypeParameters(EditableNode $value)
    {
        if ($value === $this->_type_parameters) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $value, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasTypeParameters()
    {
        return !$this->_type_parameters->isMissing();
    }
    /**
     * @return null | TypeParameters
     */
    /**
     * @return null|TypeParameters
     */
    public function getTypeParameters()
    {
        if ($this->_type_parameters->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(TypeParameters::class, $this->_type_parameters);
    }
    /**
     * @return TypeParameters
     */
    /**
     * @return TypeParameters
     */
    public function getTypeParametersx()
    {
        return TypeAssert\instance_of(TypeParameters::class, $this->_type_parameters);
    }
    /**
     * @return EditableNode
     */
    public function getExtendsKeywordUNTYPED()
    {
        return $this->_extends_keyword;
    }
    /**
     * @return static
     */
    public function withExtendsKeyword(EditableNode $value)
    {
        if ($value === $this->_extends_keyword) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $value, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasExtendsKeyword()
    {
        return !$this->_extends_keyword->isMissing();
    }
    /**
     * @return null | ExtendsToken
     */
    /**
     * @return null|ExtendsToken
     */
    public function getExtendsKeyword()
    {
        if ($this->_extends_keyword->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(ExtendsToken::class, $this->_extends_keyword);
    }
    /**
     * @return ExtendsToken
     */
    /**
     * @return ExtendsToken
     */
    public function getExtendsKeywordx()
    {
        return TypeAssert\instance_of(ExtendsToken::class, $this->_extends_keyword);
    }
    /**
     * @return EditableNode
     */
    public function getExtendsListUNTYPED()
    {
        return $this->_extends_list;
    }
    /**
     * @return static
     */
    public function withExtendsList(EditableNode $value)
    {
        if ($value === $this->_extends_list) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $value, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasExtendsList()
    {
        return !$this->_extends_list->isMissing();
    }
    /**
     * @return EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
     * EditableList<?EditableNode> | EditableList<SimpleTypeSpecifier> | null
     */
    /**
     * @return EditableList<null|EditableNode>|null
     */
    public function getExtendsList()
    {
        if ($this->_extends_list->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_extends_list);
    }
    /**
     * @return EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
     * EditableList<?EditableNode> | EditableList<SimpleTypeSpecifier>
     */
    /**
     * @return EditableList<null|EditableNode>
     */
    public function getExtendsListx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_extends_list);
    }
    /**
     * @return EditableNode
     */
    public function getImplementsKeywordUNTYPED()
    {
        return $this->_implements_keyword;
    }
    /**
     * @return static
     */
    public function withImplementsKeyword(EditableNode $value)
    {
        if ($value === $this->_implements_keyword) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $value, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasImplementsKeyword()
    {
        return !$this->_implements_keyword->isMissing();
    }
    /**
     * @return null | ImplementsToken
     */
    /**
     * @return null|ImplementsToken
     */
    public function getImplementsKeyword()
    {
        if ($this->_implements_keyword->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(ImplementsToken::class, $this->_implements_keyword);
    }
    /**
     * @return ImplementsToken
     */
    /**
     * @return ImplementsToken
     */
    public function getImplementsKeywordx()
    {
        return TypeAssert\instance_of(ImplementsToken::class, $this->_implements_keyword);
    }
    /**
     * @return EditableNode
     */
    public function getImplementsListUNTYPED()
    {
        return $this->_implements_list;
    }
    /**
     * @return static
     */
    public function withImplementsList(EditableNode $value)
    {
        if ($value === $this->_implements_list) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasImplementsList()
    {
        return !$this->_implements_list->isMissing();
    }
    /**
     * @return EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
     * EditableList<?EditableNode> | EditableList<SimpleTypeSpecifier> | null
     */
    /**
     * @return EditableList<null|EditableNode>|null
     */
    public function getImplementsList()
    {
        if ($this->_implements_list->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_implements_list);
    }
    /**
     * @return EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
     * EditableList<?EditableNode> | EditableList<SimpleTypeSpecifier>
     */
    /**
     * @return EditableList<null|EditableNode>
     */
    public function getImplementsListx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_implements_list);
    }
    /**
     * @return EditableNode
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(EditableNode $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return !$this->_body->isMissing();
    }
    /**
     * @return ClassishBody
     */
    /**
     * @return ClassishBody
     */
    public function getBody()
    {
        return TypeAssert\instance_of(ClassishBody::class, $this->_body);
    }
    /**
     * @return ClassishBody
     */
    /**
     * @return ClassishBody
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

