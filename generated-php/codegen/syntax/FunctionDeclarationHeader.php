<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class FunctionDeclarationHeader extends EditableNode
{
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
    private $_ampersand;
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_type_parameter_list;
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_parameter_list;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_colon;
    /**
     * @var EditableNode
     */
    private $_type;
    /**
     * @var EditableNode
     */
    private $_where_clause;
    public function __construct(EditableNode $modifiers, EditableNode $keyword, EditableNode $ampersand, EditableNode $name, EditableNode $type_parameter_list, EditableNode $left_paren, EditableNode $parameter_list, EditableNode $right_paren, EditableNode $colon, EditableNode $type, EditableNode $where_clause)
    {
        parent::__construct('function_declaration_header');
        $this->_modifiers = $modifiers;
        $this->_keyword = $keyword;
        $this->_ampersand = $ampersand;
        $this->_name = $name;
        $this->_type_parameter_list = $type_parameter_list;
        $this->_left_paren = $left_paren;
        $this->_parameter_list = $parameter_list;
        $this->_right_paren = $right_paren;
        $this->_colon = $colon;
        $this->_type = $type;
        $this->_where_clause = $where_clause;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $modifiers = EditableNode::fromJSON($json['function_modifiers'], $file, $offset, $source);
        $offset += $modifiers->getWidth();
        $keyword = EditableNode::fromJSON($json['function_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $ampersand = EditableNode::fromJSON($json['function_ampersand'], $file, $offset, $source);
        $offset += $ampersand->getWidth();
        $name = EditableNode::fromJSON($json['function_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $type_parameter_list = EditableNode::fromJSON($json['function_type_parameter_list'], $file, $offset, $source);
        $offset += $type_parameter_list->getWidth();
        $left_paren = EditableNode::fromJSON($json['function_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $parameter_list = EditableNode::fromJSON($json['function_parameter_list'], $file, $offset, $source);
        $offset += $parameter_list->getWidth();
        $right_paren = EditableNode::fromJSON($json['function_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $colon = EditableNode::fromJSON($json['function_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        $type = EditableNode::fromJSON($json['function_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $where_clause = EditableNode::fromJSON($json['function_where_clause'], $file, $offset, $source);
        $offset += $where_clause->getWidth();
        return new static($modifiers, $keyword, $ampersand, $name, $type_parameter_list, $left_paren, $parameter_list, $right_paren, $colon, $type, $where_clause);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('modifiers' => $this->_modifiers, 'keyword' => $this->_keyword, 'ampersand' => $this->_ampersand, 'name' => $this->_name, 'type_parameter_list' => $this->_type_parameter_list, 'left_paren' => $this->_left_paren, 'parameter_list' => $this->_parameter_list, 'right_paren' => $this->_right_paren, 'colon' => $this->_colon, 'type' => $this->_type, 'where_clause' => $this->_where_clause);
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
        $modifiers = $this->_modifiers->rewrite($rewriter, $parents);
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $ampersand = $this->_ampersand->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        $type_parameter_list = $this->_type_parameter_list->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $parameter_list = $this->_parameter_list->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $where_clause = $this->_where_clause->rewrite($rewriter, $parents);
        if ($modifiers === $this->_modifiers && $keyword === $this->_keyword && $ampersand === $this->_ampersand && $name === $this->_name && $type_parameter_list === $this->_type_parameter_list && $left_paren === $this->_left_paren && $parameter_list === $this->_parameter_list && $right_paren === $this->_right_paren && $colon === $this->_colon && $type === $this->_type && $where_clause === $this->_where_clause) {
            return $this;
        }
        return new static($modifiers, $keyword, $ampersand, $name, $type_parameter_list, $left_paren, $parameter_list, $right_paren, $colon, $type, $where_clause);
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
        return new static($value, $this->_keyword, $this->_ampersand, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
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
        return new static($this->_modifiers, $value, $this->_ampersand, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return null | FunctionToken
     */
    /**
     * @return null|FunctionToken
     */
    public function getKeyword()
    {
        if ($this->_keyword->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(FunctionToken::class, $this->_keyword);
    }
    /**
     * @return EditableNode
     */
    public function getAmpersandUNTYPED()
    {
        return $this->_ampersand;
    }
    /**
     * @return static
     */
    public function withAmpersand(EditableNode $value)
    {
        if ($value === $this->_ampersand) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $value, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasAmpersand()
    {
        return !$this->_ampersand->isMissing();
    }
    /**
     * @return null | AmpersandToken
     */
    /**
     * @return null|AmpersandToken
     */
    public function getAmpersand()
    {
        if ($this->_ampersand->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AmpersandToken::class, $this->_ampersand);
    }
    /**
     * @return AmpersandToken
     */
    /**
     * @return AmpersandToken
     */
    public function getAmpersandx()
    {
        return TypeAssert\instance_of(AmpersandToken::class, $this->_ampersand);
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
        return new static($this->_modifiers, $this->_keyword, $this->_ampersand, $value, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return ConstructToken | DestructToken | NameToken
     */
    /**
     * @return EditableToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_name);
    }
    /**
     * @return ConstructToken | DestructToken | NameToken
     */
    /**
     * @return EditableToken
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return EditableNode
     */
    public function getTypeParameterListUNTYPED()
    {
        return $this->_type_parameter_list;
    }
    /**
     * @return static
     */
    public function withTypeParameterList(EditableNode $value)
    {
        if ($value === $this->_type_parameter_list) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_ampersand, $this->_name, $value, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasTypeParameterList()
    {
        return !$this->_type_parameter_list->isMissing();
    }
    /**
     * @return null | TypeParameters
     */
    /**
     * @return null|TypeParameters
     */
    public function getTypeParameterList()
    {
        if ($this->_type_parameter_list->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(TypeParameters::class, $this->_type_parameter_list);
    }
    /**
     * @return TypeParameters
     */
    /**
     * @return TypeParameters
     */
    public function getTypeParameterListx()
    {
        return TypeAssert\instance_of(TypeParameters::class, $this->_type_parameter_list);
    }
    /**
     * @return EditableNode
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(EditableNode $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_ampersand, $this->_name, $this->_type_parameter_list, $value, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return !$this->_left_paren->isMissing();
    }
    /**
     * @return null | LeftParenToken
     */
    /**
     * @return null|LeftParenToken
     */
    public function getLeftParen()
    {
        if ($this->_left_paren->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
    }
    /**
     * @return EditableNode
     */
    public function getParameterListUNTYPED()
    {
        return $this->_parameter_list;
    }
    /**
     * @return static
     */
    public function withParameterList(EditableNode $value)
    {
        if ($value === $this->_parameter_list) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_ampersand, $this->_name, $this->_type_parameter_list, $this->_left_paren, $value, $this->_right_paren, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasParameterList()
    {
        return !$this->_parameter_list->isMissing();
    }
    /**
     * @return EditableList<?ParameterDeclaration> |
     * EditableList<ParameterDeclaration> | EditableList<EditableNode> |
     * EditableList<VariadicParameter> | null
     */
    /**
     * @return EditableList<null|EditableNode>|null
     */
    public function getParameterList()
    {
        if ($this->_parameter_list->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_parameter_list);
    }
    /**
     * @return EditableList<?ParameterDeclaration> |
     * EditableList<ParameterDeclaration> | EditableList<EditableNode> |
     * EditableList<VariadicParameter>
     */
    /**
     * @return EditableList<null|EditableNode>
     */
    public function getParameterListx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_parameter_list);
    }
    /**
     * @return EditableNode
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(EditableNode $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_ampersand, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $value, $this->_colon, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return !$this->_right_paren->isMissing();
    }
    /**
     * @return null | RightParenToken
     */
    /**
     * @return null|RightParenToken
     */
    public function getRightParen()
    {
        if ($this->_right_paren->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
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
        return new static($this->_modifiers, $this->_keyword, $this->_ampersand, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $value, $this->_type, $this->_where_clause);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return !$this->_colon->isMissing();
    }
    /**
     * @return null | ColonToken
     */
    /**
     * @return null|ColonToken
     */
    public function getColon()
    {
        if ($this->_colon->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(ColonToken::class, $this->_colon);
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
        return new static($this->_modifiers, $this->_keyword, $this->_ampersand, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $value, $this->_where_clause);
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
     * DarrayTypeSpecifier | DictionaryTypeSpecifier | GenericTypeSpecifier |
     * KeysetTypeSpecifier | MapArrayTypeSpecifier | null | NullableTypeSpecifier
     * | ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
     * NoreturnToken | TupleTypeSpecifier | TypeConstant | VarrayTypeSpecifier |
     * VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return null|EditableNode
     */
    public function getType()
    {
        if ($this->_type->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
     * DarrayTypeSpecifier | DictionaryTypeSpecifier | GenericTypeSpecifier |
     * KeysetTypeSpecifier | MapArrayTypeSpecifier | NullableTypeSpecifier |
     * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
     * NoreturnToken | TupleTypeSpecifier | TypeConstant | VarrayTypeSpecifier |
     * VectorArrayTypeSpecifier | VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return EditableNode
     */
    public function getWhereClauseUNTYPED()
    {
        return $this->_where_clause;
    }
    /**
     * @return static
     */
    public function withWhereClause(EditableNode $value)
    {
        if ($value === $this->_where_clause) {
            return $this;
        }
        return new static($this->_modifiers, $this->_keyword, $this->_ampersand, $this->_name, $this->_type_parameter_list, $this->_left_paren, $this->_parameter_list, $this->_right_paren, $this->_colon, $this->_type, $value);
    }
    /**
     * @return bool
     */
    public function hasWhereClause()
    {
        return !$this->_where_clause->isMissing();
    }
    /**
     * @return null | WhereClause
     */
    /**
     * @return null|WhereClause
     */
    public function getWhereClause()
    {
        if ($this->_where_clause->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(WhereClause::class, $this->_where_clause);
    }
    /**
     * @return WhereClause
     */
    /**
     * @return WhereClause
     */
    public function getWhereClausex()
    {
        return TypeAssert\instance_of(WhereClause::class, $this->_where_clause);
    }
}

