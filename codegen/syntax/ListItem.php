<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<de3ecaead112058e286d80170d4526e7>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class ListItem extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_item;
  /**
   * @var EditableNode
   */
  private $_separator;

  public function __construct(EditableNode $item, EditableNode $separator) {
    parent::__construct('list_item');
    $this->_item = $item;
    $this->_separator = $separator;
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
    $item = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['list_item'],
      $file,
      $offset,
      $source
    );
    $offset += $item->getWidth();
    $separator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['list_separator'],
      $file,
      $offset,
      $source
    );
    $offset += $separator->getWidth();
    return new static($item, $separator);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'item' => $this->_item,
      'separator' => $this->_separator,
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
    $item = $this->_item->rewrite($rewriter, $parents);
    $separator = $this->_separator->rewrite($rewriter, $parents);
    if ($item === $this->_item && $separator === $this->_separator) {
      return $this;
    }
    return new static($item, $separator);
  }

  public function getItemUNTYPED(): EditableNode {
    return $this->_item;
  }

  /**
   * @return static
   */
  public function withItem(EditableNode $value) {
    if ($value === $this->_item) {
      return $this;
    }
    return new static($value, $this->_separator);
  }

  public function hasItem(): bool {
    return !$this->_item->isMissing();
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | AsExpression | AwaitableCreationExpression |
   * BinaryExpression | CastExpression | ClassnameTypeSpecifier |
   * ClosureParameterTypeSpecifier | ClosureTypeSpecifier |
   * CollectionLiteralExpression | ConditionalExpression | ConstantDeclarator |
   * ConstructorCall | DarrayIntrinsicExpression | DecoratedExpression |
   * DefineExpression | DictionaryIntrinsicExpression | DictionaryTypeSpecifier
   * | ElementInitializer | EmptyExpression | EvalExpression | FieldInitializer
   * | FieldSpecifier | FunctionCallExpression | GenericTypeSpecifier |
   * InclusionExpression | InstanceofExpression | IsExpression |
   * IssetExpression | KeysetIntrinsicExpression | LambdaExpression |
   * ListExpression | LiteralExpression | MapArrayTypeSpecifier |
   * MemberSelectionExpression | Missing | NamespaceUseClause |
   * NullableTypeSpecifier | ObjectCreationExpression | ParameterDeclaration |
   * ParenthesizedExpression | PipeVariableExpression | PostfixUnaryExpression
   * | PrefixUnaryExpression | PropertyDeclarator | QualifiedName |
   * ReifiedTypeArgument | SafeMemberSelectionExpression |
   * ScopeResolutionExpression | ShapeExpression | ShapeTypeSpecifier |
   * SimpleTypeSpecifier | StaticDeclarator | SubscriptExpression |
   * XHPCategoryNameToken | ConstToken | NameToken | ReturnToken |
   * VariableToken | TraitUseAliasItem | TraitUsePrecedenceItem |
   * TupleExpression | TupleTypeSpecifier | TypeConstant | TypeParameter |
   * VariableExpression | VariadicParameter | VarrayIntrinsicExpression |
   * VarrayTypeSpecifier | VectorArrayTypeSpecifier | VectorIntrinsicExpression
   * | VectorTypeSpecifier | WhereConstraint | XHPClassAttribute |
   * XHPExpression | XHPSimpleClassAttribute
   */
  public function getItem(): ?EditableNode {
    if ($this->_item->isMissing()) {
      return null;
    }
    \assert($this->_item instanceof EditableNode);
    return $this->_item;
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | AsExpression | AwaitableCreationExpression |
   * BinaryExpression | CastExpression | ClassnameTypeSpecifier |
   * ClosureParameterTypeSpecifier | ClosureTypeSpecifier |
   * CollectionLiteralExpression | ConditionalExpression | ConstantDeclarator |
   * ConstructorCall | DarrayIntrinsicExpression | DecoratedExpression |
   * DefineExpression | DictionaryIntrinsicExpression | DictionaryTypeSpecifier
   * | ElementInitializer | EmptyExpression | EvalExpression | FieldInitializer
   * | FieldSpecifier | FunctionCallExpression | GenericTypeSpecifier |
   * InclusionExpression | InstanceofExpression | IsExpression |
   * IssetExpression | KeysetIntrinsicExpression | LambdaExpression |
   * ListExpression | LiteralExpression | MapArrayTypeSpecifier |
   * MemberSelectionExpression | NamespaceUseClause | NullableTypeSpecifier |
   * ObjectCreationExpression | ParameterDeclaration | ParenthesizedExpression
   * | PipeVariableExpression | PostfixUnaryExpression | PrefixUnaryExpression
   * | PropertyDeclarator | QualifiedName | ReifiedTypeArgument |
   * SafeMemberSelectionExpression | ScopeResolutionExpression |
   * ShapeExpression | ShapeTypeSpecifier | SimpleTypeSpecifier |
   * StaticDeclarator | SubscriptExpression | XHPCategoryNameToken | ConstToken
   * | NameToken | ReturnToken | VariableToken | TraitUseAliasItem |
   * TraitUsePrecedenceItem | TupleExpression | TupleTypeSpecifier |
   * TypeConstant | TypeParameter | VariableExpression | VariadicParameter |
   * VarrayIntrinsicExpression | VarrayTypeSpecifier | VectorArrayTypeSpecifier
   * | VectorIntrinsicExpression | VectorTypeSpecifier | WhereConstraint |
   * XHPClassAttribute | XHPExpression | XHPSimpleClassAttribute
   */
  public function getItemx(): EditableNode {
    \assert($this->_item instanceof EditableNode);
    return $this->_item;
  }

  public function getSeparatorUNTYPED(): EditableNode {
    return $this->_separator;
  }

  /**
   * @return static
   */
  public function withSeparator(EditableNode $value) {
    if ($value === $this->_separator) {
      return $this;
    }
    return new static($this->_item, $value);
  }

  public function hasSeparator(): bool {
    return !$this->_separator->isMissing();
  }

  /**
   * @return null | CommaToken | SemicolonToken | BackslashToken
   */
  public function getSeparator(): ?EditableToken {
    if ($this->_separator->isMissing()) {
      return null;
    }
    \assert($this->_separator instanceof EditableToken);
    return $this->_separator;
  }

  /**
   * @return CommaToken | SemicolonToken | BackslashToken
   */
  public function getSeparatorx(): EditableToken {
    \assert($this->_separator instanceof EditableToken);
    return $this->_separator;
  }
}
