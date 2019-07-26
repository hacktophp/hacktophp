<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e9ca559e77f6a22bd4a0ac0b7af43397>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class AnonymousClass extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'anonymous_class';
    /**
     * @var Node
     */
    private $_class_keyword;
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
    /**
     * @var Node
     */
    private $_extends_keyword;
    /**
     * @var Node
     */
    private $_extends_list;
    /**
     * @var Node
     */
    private $_implements_keyword;
    /**
     * @var Node
     */
    private $_implements_list;
    /**
     * @var Node
     */
    private $_body;
    public function __construct(Node $class_keyword, Node $left_paren, Node $argument_list, Node $right_paren, Node $extends_keyword, Node $extends_list, Node $implements_keyword, Node $implements_list, Node $body, ?array $source_ref = null)
    {
        $this->_class_keyword = $class_keyword;
        $this->_left_paren = $left_paren;
        $this->_argument_list = $argument_list;
        $this->_right_paren = $right_paren;
        $this->_extends_keyword = $extends_keyword;
        $this->_extends_list = $extends_list;
        $this->_implements_keyword = $implements_keyword;
        $this->_implements_list = $implements_list;
        $this->_body = $body;
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
        $class_keyword = Node::fromJSON($json['anonymous_class_class_keyword'], $file, $offset, $source, 'Node');
        $class_keyword = $class_keyword !== null ? $class_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $class_keyword->getWidth();
        $left_paren = Node::fromJSON($json['anonymous_class_left_paren'], $file, $offset, $source, 'Node');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $argument_list = Node::fromJSON($json['anonymous_class_argument_list'], $file, $offset, $source, 'Node');
        $argument_list = $argument_list !== null ? $argument_list : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $argument_list->getWidth();
        $right_paren = Node::fromJSON($json['anonymous_class_right_paren'], $file, $offset, $source, 'Node');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $extends_keyword = Node::fromJSON($json['anonymous_class_extends_keyword'], $file, $offset, $source, 'Node');
        $extends_keyword = $extends_keyword !== null ? $extends_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $extends_keyword->getWidth();
        $extends_list = Node::fromJSON($json['anonymous_class_extends_list'], $file, $offset, $source, 'Node');
        $extends_list = $extends_list !== null ? $extends_list : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $extends_list->getWidth();
        $implements_keyword = Node::fromJSON($json['anonymous_class_implements_keyword'], $file, $offset, $source, 'Node');
        $implements_keyword = $implements_keyword !== null ? $implements_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $implements_keyword->getWidth();
        $implements_list = Node::fromJSON($json['anonymous_class_implements_list'], $file, $offset, $source, 'Node');
        $implements_list = $implements_list !== null ? $implements_list : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $implements_list->getWidth();
        $body = Node::fromJSON($json['anonymous_class_body'], $file, $offset, $source, 'Node');
        $body = $body !== null ? $body : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $body->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($class_keyword, $left_paren, $argument_list, $right_paren, $extends_keyword, $extends_list, $implements_keyword, $implements_list, $body, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['class_keyword' => $this->_class_keyword, 'left_paren' => $this->_left_paren, 'argument_list' => $this->_argument_list, 'right_paren' => $this->_right_paren, 'extends_keyword' => $this->_extends_keyword, 'extends_list' => $this->_extends_list, 'implements_keyword' => $this->_implements_keyword, 'implements_list' => $this->_implements_list, 'body' => $this->_body]);
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
        $class_keyword = $rewriter($this->_class_keyword, $parents);
        $left_paren = $rewriter($this->_left_paren, $parents);
        $argument_list = $rewriter($this->_argument_list, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $extends_keyword = $rewriter($this->_extends_keyword, $parents);
        $extends_list = $rewriter($this->_extends_list, $parents);
        $implements_keyword = $rewriter($this->_implements_keyword, $parents);
        $implements_list = $rewriter($this->_implements_list, $parents);
        $body = $rewriter($this->_body, $parents);
        if ($class_keyword === $this->_class_keyword && $left_paren === $this->_left_paren && $argument_list === $this->_argument_list && $right_paren === $this->_right_paren && $extends_keyword === $this->_extends_keyword && $extends_list === $this->_extends_list && $implements_keyword === $this->_implements_keyword && $implements_list === $this->_implements_list && $body === $this->_body) {
            return $this;
        }
        return new static($class_keyword, $left_paren, $argument_list, $right_paren, $extends_keyword, $extends_list, $implements_keyword, $implements_list, $body);
    }
    /**
     * @return null|Node
     */
    public function getClassKeywordUNTYPED()
    {
        return $this->_class_keyword;
    }
    /**
     * @return static
     */
    public function withClassKeyword(Node $value)
    {
        if ($value === $this->_class_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasClassKeyword()
    {
        return $this->_class_keyword !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getClassKeyword()
    {
        return $this->_class_keyword;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getClassKeywordx()
    {
        return $this->getClassKeyword();
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
        return new static($this->_class_keyword, $value, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
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
        return new static($this->_class_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
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
        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $value, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
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
    /**
     * @return null|Node
     */
    public function getExtendsKeywordUNTYPED()
    {
        return $this->_extends_keyword;
    }
    /**
     * @return static
     */
    public function withExtendsKeyword(Node $value)
    {
        if ($value === $this->_extends_keyword) {
            return $this;
        }
        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $value, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasExtendsKeyword()
    {
        return $this->_extends_keyword !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getExtendsKeyword()
    {
        return $this->_extends_keyword;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getExtendsKeywordx()
    {
        return $this->getExtendsKeyword();
    }
    /**
     * @return null|Node
     */
    public function getExtendsListUNTYPED()
    {
        return $this->_extends_list;
    }
    /**
     * @return static
     */
    public function withExtendsList(Node $value)
    {
        if ($value === $this->_extends_list) {
            return $this;
        }
        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $value, $this->_implements_keyword, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasExtendsList()
    {
        return $this->_extends_list !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getExtendsList()
    {
        return $this->_extends_list;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getExtendsListx()
    {
        return $this->getExtendsList();
    }
    /**
     * @return null|Node
     */
    public function getImplementsKeywordUNTYPED()
    {
        return $this->_implements_keyword;
    }
    /**
     * @return static
     */
    public function withImplementsKeyword(Node $value)
    {
        if ($value === $this->_implements_keyword) {
            return $this;
        }
        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $value, $this->_implements_list, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasImplementsKeyword()
    {
        return $this->_implements_keyword !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getImplementsKeyword()
    {
        return $this->_implements_keyword;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getImplementsKeywordx()
    {
        return $this->getImplementsKeyword();
    }
    /**
     * @return null|Node
     */
    public function getImplementsListUNTYPED()
    {
        return $this->_implements_list;
    }
    /**
     * @return static
     */
    public function withImplementsList(Node $value)
    {
        if ($value === $this->_implements_list) {
            return $this;
        }
        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasImplementsList()
    {
        return $this->_implements_list !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getImplementsList()
    {
        return $this->_implements_list;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getImplementsListx()
    {
        return $this->getImplementsList();
    }
    /**
     * @return null|Node
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(Node $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_class_keyword, $this->_left_paren, $this->_argument_list, $this->_right_paren, $this->_extends_keyword, $this->_extends_list, $this->_implements_keyword, $this->_implements_list, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return $this->_body !== null;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getBody()
    {
        return $this->_body;
    }
    /**
     * @return unknown
     */
    /**
     * @return Node
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

