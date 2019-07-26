<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ef5ccdfefe5e16fd99ad61cb896d30fd>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class YieldFromExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'yield_from_expression';
    /**
     * @var YieldToken
     */
    private $_yield_keyword;
    /**
     * @var FromToken
     */
    private $_from_keyword;
    /**
     * @var IExpression
     */
    private $_operand;
    public function __construct(YieldToken $yield_keyword, FromToken $from_keyword, IExpression $operand, ?array $source_ref = null)
    {
        $this->_yield_keyword = $yield_keyword;
        $this->_from_keyword = $from_keyword;
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
        $yield_keyword = Node::fromJSON($json['yield_from_yield_keyword'], $file, $offset, $source, 'YieldToken');
        $yield_keyword = $yield_keyword !== null ? $yield_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $yield_keyword->getWidth();
        $from_keyword = Node::fromJSON($json['yield_from_from_keyword'], $file, $offset, $source, 'FromToken');
        $from_keyword = $from_keyword !== null ? $from_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $from_keyword->getWidth();
        $operand = Node::fromJSON($json['yield_from_operand'], $file, $offset, $source, 'IExpression');
        $operand = $operand !== null ? $operand : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operand->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($yield_keyword, $from_keyword, $operand, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['yield_keyword' => $this->_yield_keyword, 'from_keyword' => $this->_from_keyword, 'operand' => $this->_operand]);
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
        $yield_keyword = $rewriter($this->_yield_keyword, $parents);
        $from_keyword = $rewriter($this->_from_keyword, $parents);
        $operand = $rewriter($this->_operand, $parents);
        if ($yield_keyword === $this->_yield_keyword && $from_keyword === $this->_from_keyword && $operand === $this->_operand) {
            return $this;
        }
        return new static($yield_keyword, $from_keyword, $operand);
    }
    /**
     * @return null|Node
     */
    public function getYieldKeywordUNTYPED()
    {
        return $this->_yield_keyword;
    }
    /**
     * @return static
     */
    public function withYieldKeyword(YieldToken $value)
    {
        if ($value === $this->_yield_keyword) {
            return $this;
        }
        return new static($value, $this->_from_keyword, $this->_operand);
    }
    /**
     * @return bool
     */
    public function hasYieldKeyword()
    {
        return $this->_yield_keyword !== null;
    }
    /**
     * @return YieldToken
     */
    /**
     * @return YieldToken
     */
    public function getYieldKeyword()
    {
        return TypeAssert\instance_of(YieldToken::class, $this->_yield_keyword);
    }
    /**
     * @return YieldToken
     */
    /**
     * @return YieldToken
     */
    public function getYieldKeywordx()
    {
        return $this->getYieldKeyword();
    }
    /**
     * @return null|Node
     */
    public function getFromKeywordUNTYPED()
    {
        return $this->_from_keyword;
    }
    /**
     * @return static
     */
    public function withFromKeyword(FromToken $value)
    {
        if ($value === $this->_from_keyword) {
            return $this;
        }
        return new static($this->_yield_keyword, $value, $this->_operand);
    }
    /**
     * @return bool
     */
    public function hasFromKeyword()
    {
        return $this->_from_keyword !== null;
    }
    /**
     * @return FromToken
     */
    /**
     * @return FromToken
     */
    public function getFromKeyword()
    {
        return TypeAssert\instance_of(FromToken::class, $this->_from_keyword);
    }
    /**
     * @return FromToken
     */
    /**
     * @return FromToken
     */
    public function getFromKeywordx()
    {
        return $this->getFromKeyword();
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
    public function withOperand(IExpression $value)
    {
        if ($value === $this->_operand) {
            return $this;
        }
        return new static($this->_yield_keyword, $this->_from_keyword, $value);
    }
    /**
     * @return bool
     */
    public function hasOperand()
    {
        return $this->_operand !== null;
    }
    /**
     * @return ArrayCreationExpression | FunctionCallExpression |
     * LiteralExpression | ParenthesizedExpression | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getOperand()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_operand);
    }
    /**
     * @return ArrayCreationExpression | FunctionCallExpression |
     * LiteralExpression | ParenthesizedExpression | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getOperandx()
    {
        return $this->getOperand();
    }
}

