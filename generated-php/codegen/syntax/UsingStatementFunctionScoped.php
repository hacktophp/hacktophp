<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6cf6c16a1b8f522fcc26cb68a31f6c05>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class UsingStatementFunctionScoped extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_await_keyword;
    /**
     * @var EditableNode
     */
    private $_using_keyword;
    /**
     * @var EditableNode
     */
    private $_expression;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $await_keyword, EditableNode $using_keyword, EditableNode $expression, EditableNode $semicolon)
    {
        parent::__construct('using_statement_function_scoped');
        $this->_await_keyword = $await_keyword;
        $this->_using_keyword = $using_keyword;
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
        $await_keyword = EditableNode::fromJSON($json['using_function_await_keyword'], $file, $offset, $source);
        $offset += $await_keyword->getWidth();
        $using_keyword = EditableNode::fromJSON($json['using_function_using_keyword'], $file, $offset, $source);
        $offset += $using_keyword->getWidth();
        $expression = EditableNode::fromJSON($json['using_function_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        $semicolon = EditableNode::fromJSON($json['using_function_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($await_keyword, $using_keyword, $expression, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['await_keyword' => $this->_await_keyword, 'using_keyword' => $this->_using_keyword, 'expression' => $this->_expression, 'semicolon' => $this->_semicolon];
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
        $await_keyword = $this->_await_keyword->rewrite($rewriter, $parents);
        $using_keyword = $this->_using_keyword->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($await_keyword === $this->_await_keyword && $using_keyword === $this->_using_keyword && $expression === $this->_expression && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($await_keyword, $using_keyword, $expression, $semicolon);
    }
    /**
     * @return EditableNode
     */
    public function getAwaitKeywordUNTYPED()
    {
        return $this->_await_keyword;
    }
    /**
     * @return static
     */
    public function withAwaitKeyword(EditableNode $value)
    {
        if ($value === $this->_await_keyword) {
            return $this;
        }
        return new static($value, $this->_using_keyword, $this->_expression, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasAwaitKeyword()
    {
        return !$this->_await_keyword->isMissing();
    }
    /**
     * @return null | AwaitToken
     */
    /**
     * @return null|AwaitToken
     */
    public function getAwaitKeyword()
    {
        if ($this->_await_keyword->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AwaitToken::class, $this->_await_keyword);
    }
    /**
     * @return AwaitToken
     */
    /**
     * @return AwaitToken
     */
    public function getAwaitKeywordx()
    {
        return TypeAssert\instance_of(AwaitToken::class, $this->_await_keyword);
    }
    /**
     * @return EditableNode
     */
    public function getUsingKeywordUNTYPED()
    {
        return $this->_using_keyword;
    }
    /**
     * @return static
     */
    public function withUsingKeyword(EditableNode $value)
    {
        if ($value === $this->_using_keyword) {
            return $this;
        }
        return new static($this->_await_keyword, $value, $this->_expression, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasUsingKeyword()
    {
        return !$this->_using_keyword->isMissing();
    }
    /**
     * @return UsingToken
     */
    /**
     * @return UsingToken
     */
    public function getUsingKeyword()
    {
        return TypeAssert\instance_of(UsingToken::class, $this->_using_keyword);
    }
    /**
     * @return UsingToken
     */
    /**
     * @return UsingToken
     */
    public function getUsingKeywordx()
    {
        return $this->getUsingKeyword();
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
        return new static($this->_await_keyword, $this->_using_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return BinaryExpression | LambdaExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_expression);
    }
    /**
     * @return BinaryExpression | LambdaExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getExpressionx()
    {
        return $this->getExpression();
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
        return new static($this->_await_keyword, $this->_using_keyword, $this->_expression, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolon()
    {
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
        return $this->getSemicolon();
    }
}

