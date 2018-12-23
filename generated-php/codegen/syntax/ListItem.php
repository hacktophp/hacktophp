<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<55be1017dad8694ffb0ba561734d0a9d>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ListItem extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_item;
    /**
     * @var EditableNode
     */
    private $_separator;
    public function __construct(EditableNode $item, EditableNode $separator)
    {
        parent::__construct('list_item');
        $this->_item = $item;
        $this->_separator = $separator;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $item = EditableNode::fromJSON($json['list_item'], $file, $offset, $source);
        $offset += $item->getWidth();
        $separator = EditableNode::fromJSON($json['list_separator'], $file, $offset, $source);
        $offset += $separator->getWidth();
        return new static($item, $separator);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('item' => $this->_item, 'separator' => $this->_separator);
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
        $item = $this->_item->rewrite($rewriter, $parents);
        $separator = $this->_separator->rewrite($rewriter, $parents);
        if ($item === $this->_item && $separator === $this->_separator) {
            return $this;
        }
        return new static($item, $separator);
    }
    /**
     * @return EditableNode
     */
    public function getItemUNTYPED()
    {
        return $this->_item;
    }
    /**
     * @return static
     */
    public function withItem(EditableNode $value)
    {
        if ($value === $this->_item) {
            return $this;
        }
        return new static($value, $this->_separator);
    }
    /**
     * @return bool
     */
    public function hasItem()
    {
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
     * MemberSelectionExpression | null | NamespaceUseClause |
     * NullableTypeSpecifier | ObjectCreationExpression | ParameterDeclaration |
     * ParenthesizedExpression | PipeVariableExpression | PostfixUnaryExpression
     * | PrefixUnaryExpression | PropertyDeclarator | QualifiedName |
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
    /**
     * @return null|EditableNode
     */
    public function getItem()
    {
        if ($this->_item->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_item);
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
     * | PropertyDeclarator | QualifiedName | SafeMemberSelectionExpression |
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
    /**
     * @return EditableNode
     */
    public function getItemx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_item);
    }
    /**
     * @return EditableNode
     */
    public function getSeparatorUNTYPED()
    {
        return $this->_separator;
    }
    /**
     * @return static
     */
    public function withSeparator(EditableNode $value)
    {
        if ($value === $this->_separator) {
            return $this;
        }
        return new static($this->_item, $value);
    }
    /**
     * @return bool
     */
    public function hasSeparator()
    {
        return !$this->_separator->isMissing();
    }
    /**
     * @return null | CommaToken | SemicolonToken | BackslashToken
     */
    /**
     * @return null|EditableToken
     */
    public function getSeparator()
    {
        if ($this->_separator->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableToken::class, $this->_separator);
    }
    /**
     * @return CommaToken | SemicolonToken | BackslashToken
     */
    /**
     * @return EditableToken
     */
    public function getSeparatorx()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_separator);
    }
}

