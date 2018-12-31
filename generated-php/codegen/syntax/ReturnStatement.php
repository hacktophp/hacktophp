<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<49be2543c18ffec790beb1bc0cea2225>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class ReturnStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_expression;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $keyword, EditableNode $expression, EditableNode $semicolon)
    {
        parent::__construct('return_statement');
        $this->_keyword = $keyword;
        $this->_expression = $expression;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['return_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $expression = EditableNode::fromJSON($json['return_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        $semicolon = EditableNode::fromJSON($json['return_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($keyword, $expression, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['keyword' => $this->_keyword, 'expression' => $this->_expression, 'semicolon' => $this->_semicolon];
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $expression === $this->_expression && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $expression, $semicolon);
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
        return new static($value, $this->_expression, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return ReturnToken
     */
    /**
     * @return ReturnToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ReturnToken::class, $this->_keyword);
    }
    /**
     * @return ReturnToken
     */
    /**
     * @return ReturnToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return EditableNode
     */
    public function getExpressionUNTYPED()
    {
        return $this->_expression;
    }
    /**
     * @return static
     */
    public function withExpression(EditableNode $value)
    {
        if ($value === $this->_expression) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | AsExpression | AwaitableCreationExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * ConditionalExpression | DarrayIntrinsicExpression |
     * DictionaryIntrinsicExpression | EmptyExpression | EvalExpression |
     * FunctionCallExpression | FunctionCallWithTypeArgumentsExpression |
     * InstanceofExpression | IsExpression | IssetExpression |
     * KeysetIntrinsicExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | null | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * QualifiedName | SafeMemberSelectionExpression | ScopeResolutionExpression
     * | ShapeExpression | SubscriptExpression | NameToken | TupleExpression |
     * VariableExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression
     * | XHPExpression | YieldFromExpression
     */
    /**
     * @return null|EditableNode
     */
    public function getExpression()
    {
        if ($this->_expression->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_expression);
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | AsExpression | AwaitableCreationExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * ConditionalExpression | DarrayIntrinsicExpression |
     * DictionaryIntrinsicExpression | EmptyExpression | EvalExpression |
     * FunctionCallExpression | FunctionCallWithTypeArgumentsExpression |
     * InstanceofExpression | IsExpression | IssetExpression |
     * KeysetIntrinsicExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * QualifiedName | SafeMemberSelectionExpression | ScopeResolutionExpression
     * | ShapeExpression | SubscriptExpression | NameToken | TupleExpression |
     * VariableExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression
     * | XHPExpression | YieldFromExpression
     */
    /**
     * @return EditableNode
     */
    public function getExpressionx()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_expression);
    }
    /**
     * @return EditableNode
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(EditableNode $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_expression, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
    }
    /**
     * @return null | SemicolonToken
     */
    /**
     * @return null|SemicolonToken
     */
    public function getSemicolon()
    {
        if ($this->_semicolon->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolonx()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
}

