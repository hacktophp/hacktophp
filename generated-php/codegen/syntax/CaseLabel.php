<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<94c7aeea8f2eb41d2dcde94a6e9b6485>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class CaseLabel extends Node implements ISwitchLabel
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'case_label';
    /**
     * @var CaseToken
     */
    private $_keyword;
    /**
     * @var IExpression
     */
    private $_expression;
    /**
     * @var ColonToken
     */
    private $_colon;
    public function __construct(CaseToken $keyword, IExpression $expression, ColonToken $colon, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_expression = $expression;
        $this->_colon = $colon;
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
        $keyword = Node::fromJSON($json['case_keyword'], $file, $offset, $source, 'CaseToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $expression = Node::fromJSON($json['case_expression'], $file, $offset, $source, 'IExpression');
        $expression = $expression !== null ? $expression : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expression->getWidth();
        $colon = Node::fromJSON($json['case_colon'], $file, $offset, $source, 'ColonToken');
        $colon = $colon !== null ? $colon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $colon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $expression, $colon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'expression' => $this->_expression, 'colon' => $this->_colon]);
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
        $expression = $rewriter($this->_expression, $parents);
        $colon = $rewriter($this->_colon, $parents);
        if ($keyword === $this->_keyword && $expression === $this->_expression && $colon === $this->_colon) {
            return $this;
        }
        return new static($keyword, $expression, $colon);
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
    public function withKeyword(CaseToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_expression, $this->_colon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return CaseToken
     */
    /**
     * @return CaseToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(CaseToken::class, $this->_keyword);
    }
    /**
     * @return CaseToken
     */
    /**
     * @return CaseToken
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
    public function withExpression(IExpression $value)
    {
        if ($value === $this->_expression) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_colon);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return $this->_expression !== null;
    }
    /**
     * @return FunctionCallExpression | LiteralExpression | PrefixUnaryExpression
     * | ScopeResolutionExpression | NameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_expression);
    }
    /**
     * @return FunctionCallExpression | LiteralExpression | PrefixUnaryExpression
     * | ScopeResolutionExpression | NameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getExpressionx()
    {
        return $this->getExpression();
    }
    /**
     * @return null|Node
     */
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(ColonToken $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_keyword, $this->_expression, $value);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return $this->_colon !== null;
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColon()
    {
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
        return $this->getColon();
    }
}

