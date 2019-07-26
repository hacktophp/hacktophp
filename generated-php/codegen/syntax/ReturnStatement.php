<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a73db0f3d64b121081a477af04e10556>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ReturnStatement extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'return_statement';
    /**
     * @var ReturnToken
     */
    private $_keyword;
    /**
     * @var null|IExpression
     */
    private $_expression;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(ReturnToken $keyword, ?IExpression $expression, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_expression = $expression;
        $this->_semicolon = $semicolon;
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
        $keyword = Node::fromJSON($json['return_keyword'], $file, $offset, $source, 'ReturnToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $expression = Node::fromJSON($json['return_expression'], $file, $offset, $source, 'IExpression');
        $offset += (($__tmp1__ = $expression) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $semicolon = Node::fromJSON($json['return_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $expression, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'expression' => $this->_expression, 'semicolon' => $this->_semicolon]);
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
        $keyword = $rewriter($this->_keyword, $parents);
        $expression = $this->_expression === null ? null : $rewriter($this->_expression, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $expression === $this->_expression && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $expression, $semicolon);
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
    public function withKeyword(ReturnToken $value)
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
        return $this->_keyword !== null;
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
     * @return null|Node
     */
    public function getExpressionUNTYPED()
    {
        return $this->_expression;
    }
    /**
     * @return static
     */
    public function withExpression(?IExpression $value)
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
        return $this->_expression !== null;
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | AsExpression | AwaitableCreationExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * ConditionalExpression | DarrayIntrinsicExpression |
     * DictionaryIntrinsicExpression | FunctionCallExpression | IsExpression |
     * IssetExpression | KeysetIntrinsicExpression | LambdaExpression |
     * LiteralExpression | MemberSelectionExpression | null |
     * ObjectCreationExpression | ParenthesizedExpression |
     * PostfixUnaryExpression | PrefixUnaryExpression | QualifiedName |
     * SafeMemberSelectionExpression | ScopeResolutionExpression |
     * ShapeExpression | SubscriptExpression | NameToken | TupleExpression |
     * VariableExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression
     * | XHPExpression | YieldFromExpression
     */
    /**
     * @return null|IExpression
     */
    public function getExpression()
    {
        return $this->_expression;
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | AsExpression | AwaitableCreationExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * ConditionalExpression | DarrayIntrinsicExpression |
     * DictionaryIntrinsicExpression | FunctionCallExpression | IsExpression |
     * IssetExpression | KeysetIntrinsicExpression | LambdaExpression |
     * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * QualifiedName | SafeMemberSelectionExpression | ScopeResolutionExpression
     * | ShapeExpression | SubscriptExpression | NameToken | TupleExpression |
     * VariableExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression
     * | XHPExpression | YieldFromExpression
     */
    /**
     * @return IExpression
     */
    public function getExpressionx()
    {
        return TypeAssert\not_null($this->getExpression());
    }
    /**
     * @return null|Node
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(SemicolonToken $value)
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
        return $this->_semicolon !== null;
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

