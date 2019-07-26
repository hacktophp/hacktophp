<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5af15ff8d57a27541a024e738d826b7c>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
abstract class ClassishDeclarationGeneratedBase extends Node implements IHasAttributeSpec
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'classish_declaration';
    /**
     * @var null|OldAttributeSpecification
     */
    private $_attribute;
    /**
     * @var NodeList<Token>|null
     */
    private $_modifiers;
    /**
     * @var Token
     */
    private $_keyword;
    /**
     * @var Token
     */
    private $_name;
    /**
     * @var null|TypeParameters
     */
    private $_type_parameters;
    /**
     * @var null|ExtendsToken
     */
    private $_extends_keyword;
    /**
     * @var NodeList<ListItem<ISimpleCreationSpecifier>>|null
     */
    private $_extends_list;
    /**
     * @var null|ImplementsToken
     */
    private $_implements_keyword;
    /**
     * @var NodeList<ListItem<ISimpleCreationSpecifier>>|null
     */
    private $_implements_list;
    /**
     * @var null|Node
     */
    private $_where_clause;
    /**
     * @var ClassishBody
     */
    private $_body;
    /**
     * @param NodeList<Token>|null $modifiers
     * @param NodeList<ListItem<ISimpleCreationSpecifier>>|null $extends_list
     * @param NodeList<ListItem<ISimpleCreationSpecifier>>|null $implements_list
     */
    public function __construct(?OldAttributeSpecification $attribute, ?NodeList $modifiers, Token $keyword, Token $name, ?TypeParameters $type_parameters, ?ExtendsToken $extends_keyword, ?NodeList $extends_list, ?ImplementsToken $implements_keyword, ?NodeList $implements_list, ?Node $where_clause, ClassishBody $body, ?__Private\SourceRef $source_ref = null)
    {
        $this->_attribute = $attribute;
        $this->_modifiers = $modifiers;
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_type_parameters = $type_parameters;
        $this->_extends_keyword = $extends_keyword;
        $this->_extends_list = $extends_list;
        $this->_implements_keyword = $implements_keyword;
        $this->_implements_list = $implements_list;
        $this->_where_clause = $where_clause;
        $this->_body = $body;
        parent::__construct($source_ref);
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $initial_offset, string $source, string $_type_hint)
    {
        $offset = $initial_offset;
        $attribute = Node::fromJSON($json['classish_attribute'], $file, $offset, $source, 'OldAttributeSpecification');
        $offset += (($__tmp1__ = $attribute) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $modifiers = Node::fromJSON($json['classish_modifiers'], $file, $offset, $source, 'NodeList<Token>');
        $offset += (($__tmp2__ = $modifiers) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $keyword = Node::fromJSON($json['classish_keyword'], $file, $offset, $source, 'Token');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $name = Node::fromJSON($json['classish_name'], $file, $offset, $source, 'Token');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $type_parameters = Node::fromJSON($json['classish_type_parameters'], $file, $offset, $source, 'TypeParameters');
        $offset += (($__tmp3__ = $type_parameters) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $extends_keyword = Node::fromJSON($json['classish_extends_keyword'], $file, $offset, $source, 'ExtendsToken');
        $offset += (($__tmp4__ = $extends_keyword) !== null ? $__tmp4__->getWidth() : null) ?? 0;
        $extends_list = Node::fromJSON($json['classish_extends_list'], $file, $offset, $source, 'NodeList<ListItem<ISimpleCreationSpecifier>>');
        $offset += (($__tmp5__ = $extends_list) !== null ? $__tmp5__->getWidth() : null) ?? 0;
        $implements_keyword = Node::fromJSON($json['classish_implements_keyword'], $file, $offset, $source, 'ImplementsToken');
        $offset += (($__tmp6__ = $implements_keyword) !== null ? $__tmp6__->getWidth() : null) ?? 0;
        $implements_list = Node::fromJSON($json['classish_implements_list'], $file, $offset, $source, 'NodeList<ListItem<ISimpleCreationSpecifier>>');
        $offset += (($__tmp7__ = $implements_list) !== null ? $__tmp7__->getWidth() : null) ?? 0;
        $where_clause = Node::fromJSON($json['classish_where_clause'], $file, $offset, $source, 'Node');
        $offset += (($__tmp8__ = $where_clause) !== null ? $__tmp8__->getWidth() : null) ?? 0;
        $body = Node::fromJSON($json['classish_body'], $file, $offset, $source, 'ClassishBody');
        $body = $body !== null ? $body : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $body->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute, $modifiers, $keyword, $name, $type_parameters, $extends_keyword, $extends_list, $implements_keyword, $implements_list, $where_clause, $body, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute' => $this->_attribute, 'modifiers' => $this->_modifiers, 'keyword' => $this->_keyword, 'name' => $this->_name, 'type_parameters' => $this->_type_parameters, 'extends_keyword' => $this->_extends_keyword, 'extends_list' => $this->_extends_list, 'implements_keyword' => $this->_implements_keyword, 'implements_list' => $this->_implements_list, 'where_clause' => $this->_where_clause, 'body' => $this->_body]);
    }
    /**
     * @template Tret as null|Node
     *
     * @param \Closure(Node, array<int, Node>):Tret $rewriter
     * @param array<int, Node> $parents
     *
     * @return static
     */
    public function rewriteChildren(\Closure $rewriter, array $parents = [])
    {
        $parents[] = $this;
        $attribute = $this->_attribute === null ? null : $rewriter($this->_attribute, $parents);
        $modifiers = $this->_modifiers === null ? null : $rewriter($this->_modifiers, $parents);
        $keyword = $rewriter($this->_keyword, $parents);
        $name = $rewriter($this->_name, $parents);
        $type_parameters = $this->_type_parameters === null ? null : $rewriter($this->_type_parameters, $parents);
        $extends_keyword = $this->_extends_keyword === null ? null : $rewriter($this->_extends_keyword, $parents);
        $extends_list = $this->_extends_list === null ? null : $rewriter($this->_extends_list, $parents);
        $implements_keyword = $this->_implements_keyword === null ? null : $rewriter($this->_implements_keyword, $parents);
        $implements_list = $this->_implements_list === null ? null : $rewriter($this->_implements_list, $parents);
        $where_clause = $this->_where_clause === null ? null : $rewriter($this->_where_clause, $parents);
        $body = $rewriter($this->_body, $parents);
        if ($attribute === $this->_attribute && $modifiers === $this->_modifiers && $keyword === $this->_keyword && $name === $this->_name && $type_parameters === $this->_type_parameters && $extends_keyword === $this->_extends_keyword && $extends_list === $this->_extends_list && $implements_keyword === $this->_implements_keyword && $implements_list === $this->_implements_list && $where_clause === $this->_where_clause && $body === $this->_body) {
            return $this;
        }
        return new static($attribute, $modifiers, $keyword, $name, $type_parameters, $extends_keyword, $extends_list, $implements_keyword, $implements_list, $where_clause, $body);
    }
    /**
     * @return null|Node
     */
    public function getAttributeUNTYPED()
    {
        return $this->_attribute;
    }
    /**
     * @return static
     */
    public function withAttribute(?OldAttributeSpecification $value)
    {
        if ($value === $this->_attribute) {
            return $this;
        }
        return new static($value, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_where_clause, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasAttribute()
    {
        return $this->_attribute !== null;
    }
    /**
     * @return null | OldAttributeSpecification
     */
    /**
     * @return null|OldAttributeSpecification
     */
    public function getAttribute()
    {
        return $this->_attribute;
    }
    /**
     * @return OldAttributeSpecification
     */
    /**
     * @return OldAttributeSpecification
     */
    public function getAttributex()
    {
        return TypeAssert\not_null($this->getAttribute());
    }
    /**
     * @return null|Node
     */
    public function getModifiersUNTYPED()
    {
        return $this->_modifiers;
    }
    /**
     * @param NodeList<Token>|null $value
     *
     * @return static
     */
    public function withModifiers(?NodeList $value)
    {
        if ($value === $this->_modifiers) {
            return $this;
        }
        return new static($this->_attribute, $value, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_where_clause, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasModifiers()
    {
        return $this->_modifiers !== null;
    }
    /**
     * @return NodeList<AbstractToken> | NodeList<Token> | NodeList<FinalToken> |
     * null
     */
    /**
     * @return NodeList<Token>|null
     */
    public function getModifiers()
    {
        return $this->_modifiers;
    }
    /**
     * @return NodeList<AbstractToken> | NodeList<Token> | NodeList<FinalToken>
     */
    /**
     * @return NodeList<Token>
     */
    public function getModifiersx()
    {
        return TypeAssert\not_null($this->getModifiers());
    }
    /**
     * @return null|Node
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(Token $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $value, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_where_clause, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return ClassToken | InterfaceToken | TraitToken
     */
    /**
     * @return Token
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(Token::class, $this->_keyword);
    }
    /**
     * @return ClassToken | InterfaceToken | TraitToken
     */
    /**
     * @return Token
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(Token $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $value, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_where_clause, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return XHPClassNameToken | NameToken
     */
    /**
     * @return Token
     */
    public function getName()
    {
        return TypeAssert\instance_of(Token::class, $this->_name);
    }
    /**
     * @return XHPClassNameToken | NameToken
     */
    /**
     * @return Token
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return null|Node
     */
    public function getTypeParametersUNTYPED()
    {
        return $this->_type_parameters;
    }
    /**
     * @return static
     */
    public function withTypeParameters(?TypeParameters $value)
    {
        if ($value === $this->_type_parameters) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $value, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_where_clause, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasTypeParameters()
    {
        return $this->_type_parameters !== null;
    }
    /**
     * @return null | TypeParameters
     */
    /**
     * @return null|TypeParameters
     */
    public function getTypeParameters()
    {
        return $this->_type_parameters;
    }
    /**
     * @return TypeParameters
     */
    /**
     * @return TypeParameters
     */
    public function getTypeParametersx()
    {
        return TypeAssert\not_null($this->getTypeParameters());
    }
    /**
     * @return null|Node
     */
    public function getExtendsKeywordUNTYPED()
    {
        return $this->_extends_keyword;
    }
    /**
     * @return static
     */
    public function withExtendsKeyword(?ExtendsToken $value)
    {
        if ($value === $this->_extends_keyword) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $value, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_where_clause, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasExtendsKeyword()
    {
        return $this->_extends_keyword !== null;
    }
    /**
     * @return null | ExtendsToken
     */
    /**
     * @return null|ExtendsToken
     */
    public function getExtendsKeyword()
    {
        return $this->_extends_keyword;
    }
    /**
     * @return ExtendsToken
     */
    /**
     * @return ExtendsToken
     */
    public function getExtendsKeywordx()
    {
        return TypeAssert\not_null($this->getExtendsKeyword());
    }
    /**
     * @return null|Node
     */
    public function getExtendsListUNTYPED()
    {
        return $this->_extends_list;
    }
    /**
     * @param NodeList<ListItem<ISimpleCreationSpecifier>>|null $value
     *
     * @return static
     */
    public function withExtendsList(?NodeList $value)
    {
        if ($value === $this->_extends_list) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $value, $this->_implements_keyword, $this->_implements_list, $this->_where_clause, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasExtendsList()
    {
        return $this->_extends_list !== null;
    }
    /**
     * @return NodeList<ListItem<GenericTypeSpecifier>> |
     * NodeList<ListItem<ISimpleCreationSpecifier>> |
     * NodeList<ListItem<SimpleTypeSpecifier>> | null
     */
    /**
     * @return NodeList<ListItem<ISimpleCreationSpecifier>>|null
     */
    public function getExtendsList()
    {
        return $this->_extends_list;
    }
    /**
     * @return NodeList<ListItem<GenericTypeSpecifier>> |
     * NodeList<ListItem<ISimpleCreationSpecifier>> |
     * NodeList<ListItem<SimpleTypeSpecifier>>
     */
    /**
     * @return NodeList<ListItem<ISimpleCreationSpecifier>>
     */
    public function getExtendsListx()
    {
        return TypeAssert\not_null($this->getExtendsList());
    }
    /**
     * @return null|Node
     */
    public function getImplementsKeywordUNTYPED()
    {
        return $this->_implements_keyword;
    }
    /**
     * @return static
     */
    public function withImplementsKeyword(?ImplementsToken $value)
    {
        if ($value === $this->_implements_keyword) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $value, $this->_implements_list, $this->_where_clause, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasImplementsKeyword()
    {
        return $this->_implements_keyword !== null;
    }
    /**
     * @return null | ImplementsToken
     */
    /**
     * @return null|ImplementsToken
     */
    public function getImplementsKeyword()
    {
        return $this->_implements_keyword;
    }
    /**
     * @return ImplementsToken
     */
    /**
     * @return ImplementsToken
     */
    public function getImplementsKeywordx()
    {
        return TypeAssert\not_null($this->getImplementsKeyword());
    }
    /**
     * @return null|Node
     */
    public function getImplementsListUNTYPED()
    {
        return $this->_implements_list;
    }
    /**
     * @param NodeList<ListItem<ISimpleCreationSpecifier>>|null $value
     *
     * @return static
     */
    public function withImplementsList(?NodeList $value)
    {
        if ($value === $this->_implements_list) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $value, $this->_where_clause, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasImplementsList()
    {
        return $this->_implements_list !== null;
    }
    /**
     * @return NodeList<ListItem<GenericTypeSpecifier>> |
     * NodeList<ListItem<ISimpleCreationSpecifier>> |
     * NodeList<ListItem<SimpleTypeSpecifier>> | null
     */
    /**
     * @return NodeList<ListItem<ISimpleCreationSpecifier>>|null
     */
    public function getImplementsList()
    {
        return $this->_implements_list;
    }
    /**
     * @return NodeList<ListItem<GenericTypeSpecifier>> |
     * NodeList<ListItem<ISimpleCreationSpecifier>> |
     * NodeList<ListItem<SimpleTypeSpecifier>>
     */
    /**
     * @return NodeList<ListItem<ISimpleCreationSpecifier>>
     */
    public function getImplementsListx()
    {
        return TypeAssert\not_null($this->getImplementsList());
    }
    /**
     * @return null|Node
     */
    public function getWhereClauseUNTYPED()
    {
        return $this->_where_clause;
    }
    /**
     * @return static
     */
    public function withWhereClause(?Node $value)
    {
        if ($value === $this->_where_clause) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasWhereClause()
    {
        return $this->_where_clause !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
     */
    public function getWhereClause()
    {
        return $this->_where_clause;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getWhereClausex()
    {
        return TypeAssert\not_null($this->getWhereClause());
    }
    /**
     * @return null|Node
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(ClassishBody $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_attribute, $this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameters, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_where_clause, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return $this->_body !== null;
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

