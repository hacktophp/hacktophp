<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4f96a63da6d5134c940a814cc2424fef>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ForStatement extends Node implements IControlFlowStatement, ILoopStatement, IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'for_statement';
    /**
     * @var ForToken
     */
    private $_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<IExpression>>|null
     */
    private $_initializer;
    /**
     * @var SemicolonToken
     */
    private $_first_semicolon;
    /**
     * @var NodeList<ListItem<IExpression>>|null
     */
    private $_control;
    /**
     * @var SemicolonToken
     */
    private $_second_semicolon;
    /**
     * @var NodeList<ListItem<IExpression>>|null
     */
    private $_end_of_loop;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @var IStatement
     */
    private $_body;
    /**
     * @param NodeList<ListItem<IExpression>>|null $initializer
     * @param NodeList<ListItem<IExpression>>|null $control
     * @param NodeList<ListItem<IExpression>>|null $end_of_loop
     */
    public function __construct(ForToken $keyword, LeftParenToken $left_paren, ?NodeList $initializer, SemicolonToken $first_semicolon, ?NodeList $control, SemicolonToken $second_semicolon, ?NodeList $end_of_loop, RightParenToken $right_paren, IStatement $body, ?__Private\SourceRef $source_ref = null)
    {
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_initializer = $initializer;
        $this->_first_semicolon = $first_semicolon;
        $this->_control = $control;
        $this->_second_semicolon = $second_semicolon;
        $this->_end_of_loop = $end_of_loop;
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
        $keyword = Node::fromJSON($json['for_keyword'], $file, $offset, $source, 'ForToken');
        $keyword = $keyword !== null ? $keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $keyword->getWidth();
        $left_paren = Node::fromJSON($json['for_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $initializer = Node::fromJSON($json['for_initializer'], $file, $offset, $source, 'NodeList<ListItem<IExpression>>');
        $offset += (($__tmp1__ = $initializer) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $first_semicolon = Node::fromJSON($json['for_first_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $first_semicolon = $first_semicolon !== null ? $first_semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $first_semicolon->getWidth();
        $control = Node::fromJSON($json['for_control'], $file, $offset, $source, 'NodeList<ListItem<IExpression>>');
        $offset += (($__tmp2__ = $control) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $second_semicolon = Node::fromJSON($json['for_second_semicolon'], $file, $offset, $source, 'SemicolonToken');
        $second_semicolon = $second_semicolon !== null ? $second_semicolon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $second_semicolon->getWidth();
        $end_of_loop = Node::fromJSON($json['for_end_of_loop'], $file, $offset, $source, 'NodeList<ListItem<IExpression>>');
        $offset += (($__tmp3__ = $end_of_loop) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $right_paren = Node::fromJSON($json['for_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $body = Node::fromJSON($json['for_body'], $file, $offset, $source, 'IStatement');
        $body = $body !== null ? $body : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $body->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($keyword, $left_paren, $initializer, $first_semicolon, $control, $second_semicolon, $end_of_loop, $right_paren, $body, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'initializer' => $this->_initializer, 'first_semicolon' => $this->_first_semicolon, 'control' => $this->_control, 'second_semicolon' => $this->_second_semicolon, 'end_of_loop' => $this->_end_of_loop, 'right_paren' => $this->_right_paren, 'body' => $this->_body]);
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
        $initializer = $this->_initializer === null ? null : $rewriter($this->_initializer, $parents);
        $first_semicolon = $rewriter($this->_first_semicolon, $parents);
        $control = $this->_control === null ? null : $rewriter($this->_control, $parents);
        $second_semicolon = $rewriter($this->_second_semicolon, $parents);
        $end_of_loop = $this->_end_of_loop === null ? null : $rewriter($this->_end_of_loop, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $body = $rewriter($this->_body, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $initializer === $this->_initializer && $first_semicolon === $this->_first_semicolon && $control === $this->_control && $second_semicolon === $this->_second_semicolon && $end_of_loop === $this->_end_of_loop && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }
        return new static($keyword, $left_paren, $initializer, $first_semicolon, $control, $second_semicolon, $end_of_loop, $right_paren, $body);
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
    public function withKeyword(ForToken $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return $this->_keyword !== null;
    }
    /**
     * @return ForToken
     */
    /**
     * @return ForToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(ForToken::class, $this->_keyword);
    }
    /**
     * @return ForToken
     */
    /**
     * @return ForToken
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
        return new static($this->_keyword, $value, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
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
    public function getInitializerUNTYPED()
    {
        return $this->_initializer;
    }
    /**
     * @param NodeList<ListItem<IExpression>>|null $value
     *
     * @return static
     */
    public function withInitializer(?NodeList $value)
    {
        if ($value === $this->_initializer) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $value, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasInitializer()
    {
        return $this->_initializer !== null;
    }
    /**
     * @return NodeList<ListItem<BinaryExpression>> |
     * NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LiteralExpression>> | null
     */
    /**
     * @return NodeList<ListItem<IExpression>>|null
     */
    public function getInitializer()
    {
        return $this->_initializer;
    }
    /**
     * @return NodeList<ListItem<BinaryExpression>> |
     * NodeList<ListItem<IExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<LiteralExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getInitializerx()
    {
        return TypeAssert\not_null($this->getInitializer());
    }
    /**
     * @return null|Node
     */
    public function getFirstSemicolonUNTYPED()
    {
        return $this->_first_semicolon;
    }
    /**
     * @return static
     */
    public function withFirstSemicolon(SemicolonToken $value)
    {
        if ($value === $this->_first_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $value, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasFirstSemicolon()
    {
        return $this->_first_semicolon !== null;
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getFirstSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_first_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getFirstSemicolonx()
    {
        return $this->getFirstSemicolon();
    }
    /**
     * @return null|Node
     */
    public function getControlUNTYPED()
    {
        return $this->_control;
    }
    /**
     * @param NodeList<ListItem<IExpression>>|null $value
     *
     * @return static
     */
    public function withControl(?NodeList $value)
    {
        if ($value === $this->_control) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $value, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasControl()
    {
        return $this->_control !== null;
    }
    /**
     * @return NodeList<ListItem<BinaryExpression>> |
     * NodeList<ListItem<IHasOperator>> |
     * NodeList<ListItem<ConditionalExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<VariableExpression>> | null
     */
    /**
     * @return NodeList<ListItem<IExpression>>|null
     */
    public function getControl()
    {
        return $this->_control;
    }
    /**
     * @return NodeList<ListItem<BinaryExpression>> |
     * NodeList<ListItem<IHasOperator>> |
     * NodeList<ListItem<ConditionalExpression>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> |
     * NodeList<ListItem<VariableExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getControlx()
    {
        return TypeAssert\not_null($this->getControl());
    }
    /**
     * @return null|Node
     */
    public function getSecondSemicolonUNTYPED()
    {
        return $this->_second_semicolon;
    }
    /**
     * @return static
     */
    public function withSecondSemicolon(SemicolonToken $value)
    {
        if ($value === $this->_second_semicolon) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $value, $this->_end_of_loop, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasSecondSemicolon()
    {
        return $this->_second_semicolon !== null;
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSecondSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_second_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSecondSemicolonx()
    {
        return $this->getSecondSemicolon();
    }
    /**
     * @return null|Node
     */
    public function getEndOfLoopUNTYPED()
    {
        return $this->_end_of_loop;
    }
    /**
     * @param NodeList<ListItem<IExpression>>|null $value
     *
     * @return static
     */
    public function withEndOfLoop(?NodeList $value)
    {
        if ($value === $this->_end_of_loop) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $value, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasEndOfLoop()
    {
        return $this->_end_of_loop !== null;
    }
    /**
     * @return NodeList<ListItem<BinaryExpression>> |
     * NodeList<ListItem<IHasOperator>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<PostfixUnaryExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>> | null
     */
    /**
     * @return NodeList<ListItem<IExpression>>|null
     */
    public function getEndOfLoop()
    {
        return $this->_end_of_loop;
    }
    /**
     * @return NodeList<ListItem<BinaryExpression>> |
     * NodeList<ListItem<IHasOperator>> |
     * NodeList<ListItem<FunctionCallExpression>> |
     * NodeList<ListItem<PostfixUnaryExpression>> |
     * NodeList<ListItem<PrefixUnaryExpression>>
     */
    /**
     * @return NodeList<ListItem<IExpression>>
     */
    public function getEndOfLoopx()
    {
        return TypeAssert\not_null($this->getEndOfLoop());
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
        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $value, $this->_body);
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
    public function withBody(IStatement $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_initializer, $this->_first_semicolon, $this->_control, $this->_second_semicolon, $this->_end_of_loop, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return $this->_body !== null;
    }
    /**
     * @return CompoundStatement | EchoStatement | ExpressionStatement |
     * ForStatement | UnsetStatement
     */
    /**
     * @return IStatement
     */
    public function getBody()
    {
        return TypeAssert\instance_of(IStatement::class, $this->_body);
    }
    /**
     * @return CompoundStatement | EchoStatement | ExpressionStatement |
     * ForStatement | UnsetStatement
     */
    /**
     * @return IStatement
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

