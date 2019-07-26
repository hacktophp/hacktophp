<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a932a1f84f2d68fc4702aa770b3277a8>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class CatchClause extends Node
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'catch_clause';
    /**
     * @var CatchToken
     */
    private $_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var SimpleTypeSpecifier
     */
    private $_type;
    /**
     * @var VariableToken
     */
    private $_variable;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @var CompoundStatement
     */
    private $_body;
    public function __construct(CatchToken $keyword, LeftParenToken $left_paren, SimpleTypeSpecifier $type, VariableToken $variable, RightParenToken $right_paren, CompoundStatement $body, ?array $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_type = $type;
        $this->_variable = $variable;
        $this->_right_paren = $right_paren;
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
        $keyword = Node::fromJSON($json['catch_keyword'], $file, $offset, $source, 'CatchToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['catch_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $type = Node::fromJSON($json['catch_type'], $file, $offset, $source, 'SimpleTypeSpecifier');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $variable = Node::fromJSON($json['catch_variable'], $file, $offset, $source, 'VariableToken');
        $variable = $variable !== null ? $variable : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $variable->getWidth();
        $right_paren = Node::fromJSON($json['catch_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $body = Node::fromJSON($json['catch_body'], $file, $offset, $source, 'CompoundStatement');
        $body = $body !== null ? $body : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $body->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $type, $variable, $right_paren, $body, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'type' => $this->_type, 'variable' => $this->_variable, 'right_paren' => $this->_right_paren, 'body' => $this->_body]);
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
        $type = $rewriter($this->_type, $parents);
        $variable = $rewriter($this->_variable, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $body = $rewriter($this->_body, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $type === $this->_type && $variable === $this->_variable && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }
        return new static($keyword, $left_paren, $type, $variable, $right_paren, $body);
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
    public function withKeyword(CatchToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_type, $this->_variable, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return CatchToken
     */
    /**
     * @return CatchToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(CatchToken::class, $this->_keyword);
    }
    /**
     * @return CatchToken
     */
    /**
     * @return CatchToken
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
    public function withLeftParen(LeftParenToken $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($this->_keyword, $value, $this->_type, $this->_variable, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return $this->_left_paren !== null;
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParen()
    {
        return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParenx()
    {
        return $this->getLeftParen();
    }
    /**
     * @return null|Node
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(SimpleTypeSpecifier $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_variable, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(SimpleTypeSpecifier::class, $this->_type);
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
    }
    /**
     * @return null|Node
     */
    public function getVariableUNTYPED()
    {
        return $this->_variable;
    }
    /**
     * @return static
     */
    public function withVariable(VariableToken $value)
    {
        if ($value === $this->_variable) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_type, $value, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasVariable()
    {
        return $this->_variable !== null;
    }
    /**
     * @return VariableToken
     */
    /**
     * @return VariableToken
     */
    public function getVariable()
    {
        return TypeAssert\instance_of(VariableToken::class, $this->_variable);
    }
    /**
     * @return VariableToken
     */
    /**
     * @return VariableToken
     */
    public function getVariablex()
    {
        return $this->getVariable();
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
    public function withRightParen(RightParenToken $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_type, $this->_variable, $value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return $this->_right_paren !== null;
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParen()
    {
        return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParenx()
    {
        return $this->getRightParen();
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
    public function withBody(CompoundStatement $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_type, $this->_variable, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return $this->_body !== null;
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getBody()
    {
        return TypeAssert\instance_of(CompoundStatement::class, $this->_body);
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

