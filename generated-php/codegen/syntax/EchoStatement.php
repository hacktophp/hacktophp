<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9eca28f3c3cc429f204f334aa522b957>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class EchoStatement extends Node implements IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'echo_statement';
    /**
     * @var EchoToken
     */
    private $_keyword;
    /**
     * @var NodeList<ListItem<IExpression>>
     */
    private $_expressions;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    /**
     * @param NodeList<ListItem<IExpression>> $expressions
     */
    public function __construct(EchoToken $keyword, NodeList $expressions, SemicolonToken $semicolon, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_expressions = $expressions;
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
        $keyword = Node::fromJSON($json['echo_keyword'], $file, $offset, $source, 'EchoToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $expressions = Node::fromJSON($json['echo_expressions'], $file, $offset, $source, 'NodeList<ListItem<IExpression>>');
        $expressions = $expressions !== null ? $expressions : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expressions->getWidth();
        $semicolon = Node::fromJSON($json['echo_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $semicolon = $semicolon !== null ? $semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $semicolon->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $expressions, $semicolon, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'expressions' => $this->_expressions, 'semicolon' => $this->_semicolon]);
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
        $expressions = $rewriter($this->_expressions, $parents);
        $semicolon = $rewriter($this->_semicolon, $parents);
        if ($keyword === $this->_keyword && $expressions === $this->_expressions && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($keyword, $expressions, $semicolon);
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
    public function withKeyword(EchoToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_expressions, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return EchoToken
     */
    /**
     * @return EchoToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(EchoToken::class, $this->_keyword);
    }
    /**
     * @return EchoToken
     */
    /**
     * @return EchoToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getExpressionsUNTYPED()
    {
        return $this->_expressions;
    }
    /**
     * @param NodeList<ListItem<IExpression>> $value
     *
     * @return static
     */
    public function withExpressions(NodeList $value)
    {
        if ($value === $this->_expressions) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasExpressions()
    {
        return $this->_expressions !== null;
    }
    /**
     * @return NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<BinaryExpression>> | NodeList<ListItem<CastExpression>>
     * | NodeList<ListItem<ConditionalExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<ParenthesizedExpression>> |
     * NodeList<ListItem<PostfixUnaryExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<QualifiedName>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<SubscriptExpression>> | NodeList<ListItem<NameToken>> |
     * NodeList<ListItem<VariableExpression>> | NodeList<ListItem<XHPExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getExpressions()
    {
        return TypeAssert\instance_of(NodeList::class, $this->_expressions);
    }
    /**
     * @return NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<BinaryExpression>> | NodeList<ListItem<CastExpression>>
     * | NodeList<ListItem<ConditionalExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LiteralExpression>> |
     * NodeList<ListItem<MemberSelectionExpression>> |
     * NodeList<ListItem<ParenthesizedExpression>> |
     * NodeList<ListItem<PostfixUnaryExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<QualifiedName>> |
     * NodeList<ListItem<ScopeResolutionExpression>> |
     * NodeList<ListItem<SubscriptExpression>> | NodeList<ListItem<NameToken>> |
     * NodeList<ListItem<VariableExpression>> | NodeList<ListItem<XHPExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getExpressionsx()
    {
        return $this->getExpressions();
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
        return new static($this->_keyword, $this->_expressions, $value);
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

