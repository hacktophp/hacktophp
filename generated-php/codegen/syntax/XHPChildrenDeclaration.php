<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<7b09c7dcf5ba973ed788ec5469d0b986>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class XHPChildrenDeclaration extends Node implements IClassBodyDeclaration, ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'xhp_children_declaration';
    /**
     * @var ChildrenToken
     */
    private $_keyword;
    /**
     * @var Node
     */
    private $_expression;
    /**
     * @var SemicolonToken
     */
    private $_semicolon;
    public function __construct(ChildrenToken $keyword, Node $expression, SemicolonToken $semicolon, ?__Private\SourceRef $source_ref = null)
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
        $keyword = Node::fromJSON($json['xhp_children_keyword'], $file, $offset, $source, 'ChildrenToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $expression = Node::fromJSON($json['xhp_children_expression'], $file, $offset, $source, 'Node');
        $expression = $expression !== null ? $expression : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $expression->getWidth();
        $semicolon = Node::fromJSON($json['xhp_children_semicolon'], $file, $offset, $source, 'SemicolonToken');
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
        $expression = $rewriter($this->_expression, $parents);
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
    public function withKeyword(ChildrenToken $value)
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
     * @return ChildrenToken
     */
    /**
     * @return ChildrenToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ChildrenToken::class, $this->_keyword);
    }
    /**
     * @return ChildrenToken
     */
    /**
     * @return ChildrenToken
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
    public function withExpression(Node $value)
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
     * @return EmptyToken | XHPChildrenParenthesizedList
     */
    /**
     * @return Node
     */
    public function getExpression()
    {
        return $this->_expression;
    }
    /**
     * @return EmptyToken | XHPChildrenParenthesizedList
     */
    /**
     * @return Node
     */
    public function getExpressionx()
    {
        return $this->getExpression();
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

