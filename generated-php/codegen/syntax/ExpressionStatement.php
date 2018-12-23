<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ExpressionStatement extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_expression;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $expression, EditableNode $semicolon)
    {
        parent::__construct('expression_statement');
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
        $expression = EditableNode::fromJSON($json['expression_statement_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        $semicolon = EditableNode::fromJSON($json['expression_statement_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($expression, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('expression' => $this->_expression, 'semicolon' => $this->_semicolon);
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
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($expression === $this->_expression && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($expression, $semicolon);
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
        return new static($value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return AnonymousFunction | AsExpression | BinaryExpression |
     * CastExpression | CollectionLiteralExpression | ConditionalExpression |
     * DarrayIntrinsicExpression | DefineExpression |
     * DictionaryIntrinsicExpression | EmptyExpression | EvalExpression |
     * FunctionCallExpression | FunctionCallWithTypeArgumentsExpression |
     * HaltCompilerExpression | InclusionExpression | InstanceofExpression |
     * IssetExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | null | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * QualifiedName | SafeMemberSelectionExpression | ScopeResolutionExpression
     * | SubscriptExpression | RightParenToken | CommaToken | ColonToken |
     * EqualEqualEqualToken | EqualGreaterThanToken | ConstToken | NameToken |
     * UseToken | RightBraceToken | VariableExpression |
     * VarrayIntrinsicExpression | XHPExpression | YieldExpression |
     * YieldFromExpression
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
     * @return AnonymousFunction | AsExpression | BinaryExpression |
     * CastExpression | CollectionLiteralExpression | ConditionalExpression |
     * DarrayIntrinsicExpression | DefineExpression |
     * DictionaryIntrinsicExpression | EmptyExpression | EvalExpression |
     * FunctionCallExpression | FunctionCallWithTypeArgumentsExpression |
     * HaltCompilerExpression | InclusionExpression | InstanceofExpression |
     * IssetExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * QualifiedName | SafeMemberSelectionExpression | ScopeResolutionExpression
     * | SubscriptExpression | RightParenToken | CommaToken | ColonToken |
     * EqualEqualEqualToken | EqualGreaterThanToken | ConstToken | NameToken |
     * UseToken | RightBraceToken | VariableExpression |
     * VarrayIntrinsicExpression | XHPExpression | YieldExpression |
     * YieldFromExpression
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
        return new static($this->_expression, $value);
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

