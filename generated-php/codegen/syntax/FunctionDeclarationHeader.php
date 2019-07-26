<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1b25b31043eca73c1eef7ec665a5775f>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class FunctionDeclarationHeader extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'function_declaration_header';
    /**
     * @var NodeList<Token>|null
     */
    private $_modifiers;
    /**
     * @var FunctionToken
     */
    private $_keyword;
    /**
     * @var Token
     */
    private $_name;
    /**
     * @var null|TypeParameters
     */
    private $_type_parameter_list;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<IParameter>>|null
     */
    private $_parameter_list;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @var null|ColonToken
     */
    private $_colon;
    /**
     * @var null|ITypeSpecifier
     */
    private $_type;
    /**
     * @var null|WhereClause
     */
    private $_where_clause;
    /**
     * @param NodeList<Token>|null $modifiers
     * @param NodeList<ListItem<IParameter>>|null $parameter_list
     */
    public function __construct(?NodeList $modifiers, FunctionToken $keyword, Token $name, ?TypeParameters $type_parameter_list, LeftParenToken $left_paren, ?NodeList $parameter_list, RightParenToken $right_paren, ?ColonToken $colon, ?ITypeSpecifier $type, ?WhereClause $where_clause, ?array $source_ref = null)
    {
        $this->_modifiers = $modifiers;
        $this->_keyword = $keyword;
        $this->_name = $name;
        $this->_type_parameter_list = $type_parameter_list;
        $this->_left_paren = $left_paren;
        $this->_parameter_list = $parameter_list;
        $this->_right_paren = $right_paren;
        $this->_colon = $colon;
        $this->_type = $type;
        $this->_where_clause = $where_clause;
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
        $modifiers = Node::fromJSON($json['function_modifiers'], $file, $offset, $source, 'NodeList<Token>');
        $offset += (($__tmp1__ = $modifiers) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $keyword = Node::fromJSON($json['function_keyword'], $file, $offset, $source, 'FunctionToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $name = Node::fromJSON($json['function_name'], $file, $offset, $source, 'Token');
        $name = $name !== null ? $name : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $name->getWidth();
        $type_parameter_list = Node::fromJSON($json['function_type_parameter_list'], $file, $offset, $source, 'TypeParameters');
        $offset += (($__tmp2__ = $type_parameter_list) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $left_paren = Node::fromJSON($json['function_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $parameter_list = Node::fromJSON($json['function_parameter_list'], $file, $offset, $source, 'NodeList<ListItem<IParameter>>');
        $offset += (($__tmp3__ = $parameter_list) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $right_paren = Node::fromJSON($json['function_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $colon = Node::fromJSON($json['function_colon'], $file, $offset, $source, 'ColonToken');
        $offset += (($__tmp4__ = $colon) !== null ? $__tmp4__->getWidth() : null) ?? 0;
        $type = Node::fromJSON($json['function_type'], $file, $offset, $source, 'ITypeSpecifier');
        $offset += (($__tmp5__ = $type) !== null ? $__tmp5__->getWidth() : null) ?? 0;
        $where_clause = Node::fromJSON($json['function_where_clause'], $file, $offset, $source, 'WhereClause');
        $offset += (($__tmp6__ = $where_clause) !== null ? $__tmp6__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($modifiers, $keyword, $name, $type_parameter_list, $left_paren, $parameter_list, $right_paren, $colon, $type, $where_clause, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['modifiers' => $this->_modifiers, 'keyword' => $this->_keyword, 'name' => $this->_name, 'type_parameter_list' => $this->_type_parameter_list, 'left_paren' => $this->_left_paren, 'parameter_list' => $this->_parameter_list, 'right_paren' => $this->_right_paren, 'colon' => $this->_colon, 'type' => $this->_type, 'where_clause' => $this->_where_clause]);
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
        $modifiers = $this->_modifiers === null ? null : $rewriter($this->_modifiers, $parents);
        $keyword = $rewriter($this->_keyword, $parents);
        $name = $rewriter($this->_name, $parents);
        $type_parameter_list = $this->_type_parameter_list === null ? null : $rewriter($this->_type_parameter_list, $parents);
        $left_paren = $rewriter($this->_left_paren, $parents);
        $parameter_list = $this->_parameter_list === null ? null : $rewriter($this->_parameter_list, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $colon = $this->_colon === null ? null : $rewriter($this->_colon, $parents);
        $type = $this->_type === null ? null : $rewriter($this->_type, $parents);
        $where_clause = $this->_where_clause === null ? null : $rewriter($this->_where_clause, $parents);
        if ($modifiers === $this->_modifiers && $keyword === $this->_keyword && $name === $this->_name && $type_parameter_list === $this->_type_parameter_list && $left_paren === $this->_left_paren && $parameter_list === $this->_parameter_list && $right_paren === $this->_right_paren && $colon === $this->_colon && $type === $this->_type && $where_clause === $this->_where_clause) {
            return $this;
        }
        return new static($modifiers, $keyword, $name, $type_parameter_list, $left_paren, $parameter_list, $right_paren, $colon, $type, $where_clause);
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
        return new static($value, $this->_keyword, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasModifiers()
    {
        return $this->_modifiers !== null;
    }
    /**
     * @return NodeList<AbstractToken> | NodeList<Token> | NodeList<AsyncToken> |
     * NodeList<FinalToken> | NodeList<PrivateToken> | NodeList<ProtectedToken> |
     * NodeList<PublicToken> | NodeList<StaticToken> | null
     */
    /**
     * @return NodeList<Token>|null
     */
    public function getModifiers()
    {
        return $this->_modifiers;
    }
    /**
     * @return NodeList<AbstractToken> | NodeList<Token> | NodeList<AsyncToken> |
     * NodeList<FinalToken> | NodeList<PrivateToken> | NodeList<ProtectedToken> |
     * NodeList<PublicToken> | NodeList<StaticToken>
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
    public function withKeyword(FunctionToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($this->_modifiers, $value, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return FunctionToken
     */
    /**
     * @return FunctionToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(FunctionToken::class, $this->_keyword);
    }
    /**
     * @return FunctionToken
     */
    /**
     * @return FunctionToken
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
        return new static($this->_modifiers, $this->_keyword, $value, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return $this->_name !== null;
    }
    /**
     * @return ConstructToken | DestructToken | NameToken
     */
    /**
     * @return Token
     */
    public function getName()
    {
        return TypeAssert\instance_of(Token::class, $this->_name);
    }
    /**
     * @return ConstructToken | DestructToken | NameToken
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
    public function getTypeParameterListUNTYPED()
    {
        return $this->_type_parameter_list;
    }
    /**
     * @return static
     */
    public function withTypeParameterList(?TypeParameters $value)
    {
        if ($value === $this->_type_parameter_list) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_name, $value, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasTypeParameterList()
    {
        return $this->_type_parameter_list !== null;
    }
    /**
     * @return null | TypeParameters
     */
    /**
     * @return null|TypeParameters
     */
    public function getTypeParameterList()
    {
        return $this->_type_parameter_list;
    }
    /**
     * @return TypeParameters
     */
    /**
     * @return TypeParameters
     */
    public function getTypeParameterListx()
    {
        return TypeAssert\not_null($this->getTypeParameterList());
    }
    /**
     * @return null|Node
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(LeftParenToken $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameter_list, $value, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return $this->_left_paren !== null;
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParen()
    {
        return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParenx()
    {
        return $this->getLeftParen();
    }
    /**
     * @return null|Node
     */
    public function getParameterListUNTYPED()
    {
        return $this->_parameter_list;
    }
    /**
     * @param NodeList<ListItem<IParameter>>|null $value
     *
     * @return static
     */
    public function withParameterList(?NodeList $value)
    {
        if ($value === $this->_parameter_list) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameter_list, $this->_left_paren, $value, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasParameterList()
    {
        return $this->_parameter_list !== null;
    }
    /**
     * @return NodeList<ListItem<ParameterDeclaration>> |
     * NodeList<ListItem<IParameter>> | NodeList<ListItem<VariadicParameter>> |
     * null
     */
    /**
     * @return NodeList<ListItem<IParameter>>|null
     */
    public function getParameterList()
    {
        return $this->_parameter_list;
    }
    /**
     * @return NodeList<ListItem<ParameterDeclaration>> |
     * NodeList<ListItem<IParameter>> | NodeList<ListItem<VariadicParameter>>
     */
    /**
     * @return NodeList<ListItem<IParameter>>
     */
    public function getParameterListx()
    {
        return TypeAssert\not_null($this->getParameterList());
    }
    /**
     * @return null|Node
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(RightParenToken $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $value, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return $this->_right_paren !== null;
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParen()
    {
        return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParenx()
    {
        return $this->getRightParen();
    }
    /**
     * @return null|Node
     */
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(?ColonToken $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $value, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return $this->_colon !== null;
    }
    /**
     * @return null | ColonToken
     */
    /**
     * @return null|ColonToken
     */
    public function getColon()
    {
        return $this->_colon;
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColonx()
    {
        return TypeAssert\not_null($this->getColon());
    }
    /**
     * @return null|Node
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(?ITypeSpecifier $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $value, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return AttributizedSpecifier | ClassnameTypeSpecifier |
     * ClosureTypeSpecifier | DarrayTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | KeysetTypeSpecifier | LikeTypeSpecifier |
     * MapArrayTypeSpecifier | null | NullableTypeSpecifier | ShapeTypeSpecifier
     * | SimpleTypeSpecifier | SoftTypeSpecifier | NoreturnToken |
     * TupleTypeSpecifier | TypeConstant | VarrayTypeSpecifier |
     * VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return null|ITypeSpecifier
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @return AttributizedSpecifier | ClassnameTypeSpecifier |
     * ClosureTypeSpecifier | DarrayTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | KeysetTypeSpecifier | LikeTypeSpecifier |
     * MapArrayTypeSpecifier | NullableTypeSpecifier | ShapeTypeSpecifier |
     * SimpleTypeSpecifier | SoftTypeSpecifier | NoreturnToken |
     * TupleTypeSpecifier | TypeConstant | VarrayTypeSpecifier |
     * VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return TypeAssert\not_null($this->getType());
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
    public function withWhereClause(?WhereClause $value)
    {
        if ($value === $this->_where_clause) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $value);
    }
    /**
     * @return bool
     */
    public function hasWhereClause()
    {
        return $this->_where_clause !== null;
    }
    /**
     * @return null | WhereClause
     */
    /**
     * @return null|WhereClause
     */
    public function getWhereClause()
    {
        return $this->_where_clause;
    }
    /**
     * @return WhereClause
     */
    /**
     * @return WhereClause
     */
    public function getWhereClausex()
    {
        return TypeAssert\not_null($this->getWhereClause());
    }
}

