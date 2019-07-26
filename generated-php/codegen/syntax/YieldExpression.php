<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f2c985d5905bd11bcf441f1601f2924d>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class YieldExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'yield_expression';
    /**
     * @var YieldToken
     */
    private $_keyword;
    /**
     * @var null|Node
     */
    private $_operand;
    public function __construct(YieldToken $keyword, ?Node $operand, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_operand = $operand;
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
        $keyword = Node::fromJSON($json['yield_keyword'], $file, $offset, $source, 'YieldToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $operand = Node::fromJSON($json['yield_operand'], $file, $offset, $source, 'Node');
        $offset += (($__tmp1__ = $operand) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $operand, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'operand' => $this->_operand]);
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
        $operand = $this->_operand === null ? null : $rewriter($this->_operand, $parents);
        if ($keyword === $this->_keyword && $operand === $this->_operand) {
            return $this;
        }
        return new static($keyword, $operand);
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
    public function withKeyword(YieldToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_operand);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return YieldToken
     */
    /**
     * @return YieldToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(YieldToken::class, $this->_keyword);
    }
    /**
     * @return YieldToken
     */
    /**
     * @return YieldToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getOperandUNTYPED()
    {
        return $this->_operand;
    }
    /**
     * @return static
     */
    public function withOperand(?Node $value)
    {
        if ($value === $this->_operand) {
            return $this;
        }
        return new static($this->_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasOperand()
    {
        return $this->_operand !== null;
    }
    /**
     * @return AnonymousFunction | BinaryExpression | ElementInitializer |
     * FunctionCallExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | null | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | BreakToken | NameToken |
     * TupleExpression | VariableExpression
     */
    /**
     * @return null|Node
     */
    public function getOperand()
    {
        return $this->_operand;
    }
    /**
     * @return AnonymousFunction | BinaryExpression | ElementInitializer |
     * FunctionCallExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | BreakToken | NameToken |
     * TupleExpression | VariableExpression
     */
    /**
     * @return Node
     */
    public function getOperandx()
    {
        return TypeAssert\not_null($this->getOperand());
    }
}

