<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<239e61dec4443fc6e769a3e25e0af492>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class DefineExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'define_expression';
    /**
     * @var Node
     */
    private $_keyword;
    /**
     * @var Node
     */
    private $_left_paren;
    /**
     * @var Node
     */
    private $_argument_list;
    /**
     * @var Node
     */
    private $_right_paren;
    public function __construct(Node $keyword, Node $left_paren, Node $argument_list, Node $right_paren, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_argument_list = $argument_list;
        $this->_right_paren = $right_paren;
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
        $keyword = Node::fromJSON($json['define_keyword'], $file, $offset, $source, 'Node');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['define_left_paren'], $file, $offset, $source, 'Node');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $argument_list = Node::fromJSON($json['define_argument_list'], $file, $offset, $source, 'Node');
        $argument_list = $argument_list !== null ? $argument_list : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $argument_list->getWidth();
        $right_paren = Node::fromJSON($json['define_right_paren'], $file, $offset, $source, 'Node');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $argument_list, $right_paren, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren]);
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
        $left_paren = $rewriter($this->_left_paren, $parents);
        $argument_list = $rewriter($this->_argument_list, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren) {
            return $this;
        }
        return new static($keyword, $left_paren, $argument_list, $right_paren);
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
    public function withKeyword(Node $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_argument_list, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getKeyword()
    {
        return $this->_keyword;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
    }
    /**
     * @return null|Node
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(Node $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_argument_list, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return $this->_left_paren !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getLeftParen()
    {
        return $this->_left_paren;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getLeftParenx()
    {
        return $this->getLeftParen();
    }
    /**
     * @return null|Node
     */
    public function getArgumentListUNTYPED()
    {
        return $this->_argument_list;
    }
    /**
     * @return static
     */
    public function withArgumentList(Node $value)
    {
        if ($value === $this->_argument_list) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_right_paren);
    }
    /**
     * @return bool
     */
    public function hasArgumentList()
    {
        return $this->_argument_list !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getArgumentList()
    {
        return $this->_argument_list;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getArgumentListx()
    {
        return $this->getArgumentList();
    }
    /**
     * @return null|Node
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(Node $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_argument_list, $value);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return $this->_right_paren !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getRightParen()
    {
        return $this->_right_paren;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getRightParenx()
    {
        return $this->getRightParen();
    }
}

