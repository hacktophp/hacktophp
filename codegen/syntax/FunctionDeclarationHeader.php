<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<2547bcd75a637fc92376ac2c86223997>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class FunctionDeclarationHeader extends EditableNode {

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

  public function __construct(
    EditableNode $modifiers,
    EditableNode $keyword,
    EditableNode $ampersand,
    EditableNode $name,
    EditableNode $type_parameter_list,
    EditableNode $left_paren,
    EditableNode $parameter_list,
    EditableNode $right_paren,
    EditableNode $colon,
    EditableNode $type,
    EditableNode $where_clause
  ) {
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
   * @return static
   */
  public static function fromJSON(
    array $json,
    string $file,
    int $offset,
    string $source
  ) {
    $modifiers = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_modifiers'],
      $file,
      $offset,
      $source
    );
    $offset += $modifiers->getWidth();
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $ampersand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_ampersand'],
      $file,
      $offset,
      $source
    );
    $offset += $ampersand->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $type_parameter_list = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_type_parameter_list'],
      $file,
      $offset,
      $source
    );
    $offset += $type_parameter_list->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $parameter_list = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_parameter_list'],
      $file,
      $offset,
      $source
    );
    $offset += $parameter_list->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    $colon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_colon'],
      $file,
      $offset,
      $source
    );
    $offset += $colon->getWidth();
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    $where_clause = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_where_clause'],
      $file,
      $offset,
      $source
    );
    $offset += $where_clause->getWidth();
    return new static(
      $modifiers,
      $keyword,
      $ampersand,
      $name,
      $type_parameter_list,
      $left_paren,
      $parameter_list,
      $right_paren,
      $colon,
      $type,
      $where_clause
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'modifiers' => $this->_modifiers,
      'keyword' => $this->_keyword,
      'ampersand' => $this->_ampersand,
      'name' => $this->_name,
      'type_parameter_list' => $this->_type_parameter_list,
      'left_paren' => $this->_left_paren,
      'parameter_list' => $this->_parameter_list,
      'right_paren' => $this->_right_paren,
      'colon' => $this->_colon,
      'type' => $this->_type,
      'where_clause' => $this->_where_clause,
    ];
  }

  /**
   * @psalm-param (\Closure(EditableNode, ?array<int, EditableNode>): EditableNode) $rewriter
   * @param ?array<int, EditableNode> $parents
   * @return static
   */
  public function rewriteDescendants(
    \Closure $rewriter,
    ?array $parents = null
  ) {
    $parents = $parents === null ? [] : vec($parents);
    $parents[] = $this;
    $modifiers = $this->_modifiers->rewrite($rewriter, $parents);
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $ampersand = $this->_ampersand->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    $type_parameter_list =
      $this->_type_parameter_list->rewrite($rewriter, $parents);
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $parameter_list = $this->_parameter_list->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    $colon = $this->_colon->rewrite($rewriter, $parents);
    $type = $this->_type->rewrite($rewriter, $parents);
    $where_clause = $this->_where_clause->rewrite($rewriter, $parents);
    if (
      $modifiers === $this->_modifiers &&
      $keyword === $this->_keyword &&
      $ampersand === $this->_ampersand &&
      $name === $this->_name &&
      $type_parameter_list === $this->_type_parameter_list &&
      $left_paren === $this->_left_paren &&
      $parameter_list === $this->_parameter_list &&
      $right_paren === $this->_right_paren &&
      $colon === $this->_colon &&
      $type === $this->_type &&
      $where_clause === $this->_where_clause
    ) {
      return $this;
    }
    return new static(
      $modifiers,
      $keyword,
      $ampersand,
      $name,
      $type_parameter_list,
      $left_paren,
      $parameter_list,
      $right_paren,
      $colon,
      $type,
      $where_clause
    );
  }

  public function getModifiersUNTYPED(): EditableNode {
    return $this->_modifiers;
  }

  /**
   * @return static
   */
  public function withModifiers(EditableNode $value) {
    if ($value === $this->_modifiers) {
      return $this;
    }
    return new static(
      $value,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause
    );
  }

  public function hasModifiers(): bool {
    return !$this->_modifiers->isMissing();
  }

  /**
   * @return EditableList<EditableNode> | null
   */
  public function getModifiers(): ?EditableList {
    if ($this->_modifiers->isMissing()) {
      return null;
    }
    \assert($this->_modifiers instanceof EditableList);
    return $this->_modifiers;
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getModifiersx(): EditableList {
    \assert($this->_modifiers instanceof EditableList);
    return $this->_modifiers;
  }

  public function getKeywordUNTYPED(): EditableNode {
    return $this->_keyword;
  }

  /**
   * @return static
   */
  public function withKeyword(EditableNode $value) {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new static(
      $this->_modifiers,
      $value,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return null | FunctionToken
   */
  public function getKeyword(): ?FunctionToken {
    if ($this->_keyword->isMissing()) {
      return null;
    }
    \assert($this->_keyword instanceof FunctionToken);
    return $this->_keyword;
  }

  /**
   * @return FunctionToken
   */
  public function getKeywordx(): FunctionToken {
    \assert($this->_keyword instanceof FunctionToken);
    return $this->_keyword;
  }

  public function getAmpersandUNTYPED(): EditableNode {
    return $this->_ampersand;
  }

  /**
   * @return static
   */
  public function withAmpersand(EditableNode $value) {
    if ($value === $this->_ampersand) {
      return $this;
    }
    return new static(
      $this->_modifiers,
      $this->_keyword,
      $value,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause
    );
  }

  public function hasAmpersand(): bool {
    return !$this->_ampersand->isMissing();
  }

  /**
   * @return null | AmpersandToken
   */
  public function getAmpersand(): ?AmpersandToken {
    if ($this->_ampersand->isMissing()) {
      return null;
    }
    \assert($this->_ampersand instanceof AmpersandToken);
    return $this->_ampersand;
  }

  /**
   * @return AmpersandToken
   */
  public function getAmpersandx(): AmpersandToken {
    \assert($this->_ampersand instanceof AmpersandToken);
    return $this->_ampersand;
  }

  public function getNameUNTYPED(): EditableNode {
    return $this->_name;
  }

  /**
   * @return static
   */
  public function withName(EditableNode $value) {
    if ($value === $this->_name) {
      return $this;
    }
    return new static(
      $this->_modifiers,
      $this->_keyword,
      $this->_ampersand,
      $value,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause
    );
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return ConstructToken | DestructToken | NameToken
   */
  public function getName(): EditableToken {
    \assert($this->_name instanceof EditableToken);
    return $this->_name;
  }

  /**
   * @return ConstructToken | DestructToken | NameToken
   */
  public function getNamex(): EditableToken {
    return $this->getName();
  }

  public function getTypeParameterListUNTYPED(): EditableNode {
    return $this->_type_parameter_list;
  }

  /**
   * @return static
   */
  public function withTypeParameterList(EditableNode $value) {
    if ($value === $this->_type_parameter_list) {
      return $this;
    }
    return new static(
      $this->_modifiers,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $value,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause
    );
  }

  public function hasTypeParameterList(): bool {
    return !$this->_type_parameter_list->isMissing();
  }

  /**
   * @return null | TypeParameters
   */
  public function getTypeParameterList(): ?TypeParameters {
    if ($this->_type_parameter_list->isMissing()) {
      return null;
    }
    \assert($this->_type_parameter_list instanceof TypeParameters);
    return $this->_type_parameter_list;
  }

  /**
   * @return TypeParameters
   */
  public function getTypeParameterListx(): TypeParameters {
    \assert($this->_type_parameter_list instanceof TypeParameters);
    return $this->_type_parameter_list;
  }

  public function getLeftParenUNTYPED(): EditableNode {
    return $this->_left_paren;
  }

  /**
   * @return static
   */
  public function withLeftParen(EditableNode $value) {
    if ($value === $this->_left_paren) {
      return $this;
    }
    return new static(
      $this->_modifiers,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $value,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause
    );
  }

  public function hasLeftParen(): bool {
    return !$this->_left_paren->isMissing();
  }

  /**
   * @return null | LeftParenToken
   */
  public function getLeftParen(): ?LeftParenToken {
    if ($this->_left_paren->isMissing()) {
      return null;
    }
    \assert($this->_left_paren instanceof LeftParenToken);
    return $this->_left_paren;
  }

  /**
   * @return LeftParenToken
   */
  public function getLeftParenx(): LeftParenToken {
    \assert($this->_left_paren instanceof LeftParenToken);
    return $this->_left_paren;
  }

  public function getParameterListUNTYPED(): EditableNode {
    return $this->_parameter_list;
  }

  /**
   * @return static
   */
  public function withParameterList(EditableNode $value) {
    if ($value === $this->_parameter_list) {
      return $this;
    }
    return new static(
      $this->_modifiers,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $value,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $this->_where_clause
    );
  }

  public function hasParameterList(): bool {
    return !$this->_parameter_list->isMissing();
  }

  /**
   * @return EditableList<?ParameterDeclaration> |
   * EditableList<ParameterDeclaration> | EditableList<EditableNode> |
   * EditableList<VariadicParameter> | Missing
   */
  public function getParameterList(): ?EditableList {
    if ($this->_parameter_list->isMissing()) {
      return null;
    }
    \assert($this->_parameter_list instanceof EditableList);
    return $this->_parameter_list;
  }

  /**
   * @return EditableList<?ParameterDeclaration> |
   * EditableList<ParameterDeclaration> | EditableList<EditableNode> |
   * EditableList<VariadicParameter>
   */
  public function getParameterListx(): EditableList {
    \assert($this->_parameter_list instanceof EditableList);
    return $this->_parameter_list;
  }

  public function getRightParenUNTYPED(): EditableNode {
    return $this->_right_paren;
  }

  /**
   * @return static
   */
  public function withRightParen(EditableNode $value) {
    if ($value === $this->_right_paren) {
      return $this;
    }
    return new static(
      $this->_modifiers,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $value,
      $this->_colon,
      $this->_type,
      $this->_where_clause
    );
  }

  public function hasRightParen(): bool {
    return !$this->_right_paren->isMissing();
  }

  /**
   * @return null | RightParenToken
   */
  public function getRightParen(): ?RightParenToken {
    if ($this->_right_paren->isMissing()) {
      return null;
    }
    \assert($this->_right_paren instanceof RightParenToken);
    return $this->_right_paren;
  }

  /**
   * @return RightParenToken
   */
  public function getRightParenx(): RightParenToken {
    \assert($this->_right_paren instanceof RightParenToken);
    return $this->_right_paren;
  }

  public function getColonUNTYPED(): EditableNode {
    return $this->_colon;
  }

  /**
   * @return static
   */
  public function withColon(EditableNode $value) {
    if ($value === $this->_colon) {
      return $this;
    }
    return new static(
      $this->_modifiers,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $value,
      $this->_type,
      $this->_where_clause
    );
  }

  public function hasColon(): bool {
    return !$this->_colon->isMissing();
  }

  /**
   * @return null | ColonToken
   */
  public function getColon(): ?ColonToken {
    if ($this->_colon->isMissing()) {
      return null;
    }
    \assert($this->_colon instanceof ColonToken);
    return $this->_colon;
  }

  /**
   * @return ColonToken
   */
  public function getColonx(): ColonToken {
    \assert($this->_colon instanceof ColonToken);
    return $this->_colon;
  }

  public function getTypeUNTYPED(): EditableNode {
    return $this->_type;
  }

  /**
   * @return static
   */
  public function withType(EditableNode $value) {
    if ($value === $this->_type) {
      return $this;
    }
    return new static(
      $this->_modifiers,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $value,
      $this->_where_clause
    );
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
   * DarrayTypeSpecifier | DictionaryTypeSpecifier | GenericTypeSpecifier |
   * KeysetTypeSpecifier | MapArrayTypeSpecifier | Missing |
   * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
   * SoftTypeSpecifier | NoreturnToken | TupleTypeSpecifier | TypeConstant |
   * VarrayTypeSpecifier | VectorArrayTypeSpecifier | VectorTypeSpecifier
   */
  public function getType(): ?EditableNode {
    if ($this->_type->isMissing()) {
      return null;
    }
    \assert($this->_type instanceof EditableNode);
    return $this->_type;
  }

  /**
   * @return ClassnameTypeSpecifier | ClosureTypeSpecifier |
   * DarrayTypeSpecifier | DictionaryTypeSpecifier | GenericTypeSpecifier |
   * KeysetTypeSpecifier | MapArrayTypeSpecifier | NullableTypeSpecifier |
   * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
   * NoreturnToken | TupleTypeSpecifier | TypeConstant | VarrayTypeSpecifier |
   * VectorArrayTypeSpecifier | VectorTypeSpecifier
   */
  public function getTypex(): EditableNode {
    \assert($this->_type instanceof EditableNode);
    return $this->_type;
  }

  public function getWhereClauseUNTYPED(): EditableNode {
    return $this->_where_clause;
  }

  /**
   * @return static
   */
  public function withWhereClause(EditableNode $value) {
    if ($value === $this->_where_clause) {
      return $this;
    }
    return new static(
      $this->_modifiers,
      $this->_keyword,
      $this->_ampersand,
      $this->_name,
      $this->_type_parameter_list,
      $this->_left_paren,
      $this->_parameter_list,
      $this->_right_paren,
      $this->_colon,
      $this->_type,
      $value
    );
  }

  public function hasWhereClause(): bool {
    return !$this->_where_clause->isMissing();
  }

  /**
   * @return null | WhereClause
   */
  public function getWhereClause(): ?WhereClause {
    if ($this->_where_clause->isMissing()) {
      return null;
    }
    \assert($this->_where_clause instanceof WhereClause);
    return $this->_where_clause;
  }

  /**
   * @return WhereClause
   */
  public function getWhereClausex(): WhereClause {
    \assert($this->_where_clause instanceof WhereClause);
    return $this->_where_clause;
  }
}
