<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<94062507b53eb88fc5914b3afaa162a5>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class CollectionLiteralExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_left_brace;
    /**
     * @var EditableNode
     */
    private $_initializers;
    /**
     * @var EditableNode
     */
    private $_right_brace;
    public function __construct(EditableNode $name, EditableNode $left_brace, EditableNode $initializers, EditableNode $right_brace)
    {
        parent::__construct('collection_literal_expression');
        $this->_name = $name;
        $this->_left_brace = $left_brace;
        $this->_initializers = $initializers;
        $this->_right_brace = $right_brace;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $name = EditableNode::fromJSON($json['collection_literal_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $left_brace = EditableNode::fromJSON($json['collection_literal_left_brace'], $file, $offset, $source);
        $offset += $left_brace->getWidth();
        $initializers = EditableNode::fromJSON($json['collection_literal_initializers'], $file, $offset, $source);
        $offset += $initializers->getWidth();
        $right_brace = EditableNode::fromJSON($json['collection_literal_right_brace'], $file, $offset, $source);
        $offset += $right_brace->getWidth();
        return new static($name, $left_brace, $initializers, $right_brace);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['name' => $this->_name, 'left_brace' => $this->_left_brace, 'initializers' => $this->_initializers, 'right_brace' => $this->_right_brace];
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? [] : (array) $parents;
        $parents[] = $this;
        $name = $this->_name->rewrite($rewriter, $parents);
        $left_brace = $this->_left_brace->rewrite($rewriter, $parents);
        $initializers = $this->_initializers->rewrite($rewriter, $parents);
        $right_brace = $this->_right_brace->rewrite($rewriter, $parents);
        if ($name === $this->_name && $left_brace === $this->_left_brace && $initializers === $this->_initializers && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($name, $left_brace, $initializers, $right_brace);
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
        return new static($value, $this->_left_brace, $this->_initializers, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getName()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_name);
    }
    /**
     * @return GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return EditableNode
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(EditableNode $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($this->_name, $value, $this->_initializers, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return !$this->_left_brace->isMissing();
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBrace()
    {
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return EditableNode
     */
    public function getInitializersUNTYPED()
    {
        return $this->_initializers;
    }
    /**
     * @return static
     */
    public function withInitializers(EditableNode $value)
    {
        if ($value === $this->_initializers) {
            return $this;
        }
        return new static($this->_name, $this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasInitializers()
    {
        return !$this->_initializers->isMissing();
    }
    /**
     * @return EditableList<AnonymousFunction> |
     * EditableList<ArrayCreationExpression> |
     * EditableList<ArrayIntrinsicExpression> | EditableList<EditableNode> |
     * EditableList<CastExpression> | EditableList<CollectionLiteralExpression> |
     * EditableList<ElementInitializer> | EditableList<FunctionCallExpression> |
     * EditableList<LambdaExpression> | EditableList<LiteralExpression> |
     * EditableList<ObjectCreationExpression> |
     * EditableList<ScopeResolutionExpression> |
     * EditableList<SubscriptExpression> | EditableList<EditableToken> |
     * EditableList<NameToken> | EditableList<ReturnToken> |
     * EditableList<TupleExpression> | EditableList<VariableExpression> |
     * EditableList<VarrayIntrinsicExpression> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getInitializers()
    {
        if ($this->_initializers->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_initializers);
    }
    /**
     * @return EditableList<AnonymousFunction> |
     * EditableList<ArrayCreationExpression> |
     * EditableList<ArrayIntrinsicExpression> | EditableList<EditableNode> |
     * EditableList<CastExpression> | EditableList<CollectionLiteralExpression> |
     * EditableList<ElementInitializer> | EditableList<FunctionCallExpression> |
     * EditableList<LambdaExpression> | EditableList<LiteralExpression> |
     * EditableList<ObjectCreationExpression> |
     * EditableList<ScopeResolutionExpression> |
     * EditableList<SubscriptExpression> | EditableList<EditableToken> |
     * EditableList<NameToken> | EditableList<ReturnToken> |
     * EditableList<TupleExpression> | EditableList<VariableExpression> |
     * EditableList<VarrayIntrinsicExpression>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getInitializersx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_initializers);
    }
    /**
     * @return EditableNode
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(EditableNode $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_name, $this->_left_brace, $this->_initializers, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return !$this->_right_brace->isMissing();
    }
    /**
     * @return null | RightBraceToken
     */
    /**
     * @return null|RightBraceToken
     */
    public function getRightBrace()
    {
        if ($this->_right_brace->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBracex()
    {
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
}

