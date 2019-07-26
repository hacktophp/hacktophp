<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d37d03904734abf561644a7c353ad779>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class CompoundStatement extends Node implements ILambdaBody, IStatement
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'compound_statement';
    /**
     * @var LeftBraceToken
     */
    private $_left_brace;
    /**
     * @var NodeList<IStatement>|null
     */
    private $_statements;
    /**
     * @var RightBraceToken
     */
    private $_right_brace;
    /**
     * @param NodeList<IStatement>|null $statements
     */
    public function __construct(LeftBraceToken $left_brace, ?NodeList $statements, RightBraceToken $right_brace, ?__Private\SourceRef $source_ref = null)
    {
        $this->_left_brace = $left_brace;
        $this->_statements = $statements;
        $this->_right_brace = $right_brace;
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
        $left_brace = Node::fromJSON($json['compound_left_brace'], $file, $offset, $source, 'LeftBraceToken');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $statements = Node::fromJSON($json['compound_statements'], $file, $offset, $source, 'NodeList<IStatement>');
        $offset += (($__tmp1__ = $statements) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_brace = Node::fromJSON($json['compound_right_brace'], $file, $offset, $source, 'RightBraceToken');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_brace, $statements, $right_brace, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_brace' => $this->_left_brace, 'statements' => $this->_statements, 'right_brace' => $this->_right_brace]);
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
        $left_brace = $rewriter($this->_left_brace, $parents);
        $statements = $this->_statements === null ? null : $rewriter($this->_statements, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        if ($left_brace === $this->_left_brace && $statements === $this->_statements && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($left_brace, $statements, $right_brace);
    }
    /**
     * @return null|Node
     */
    public function getLeftBraceUNTYPED()
    {
        return $this->_left_brace;
    }
    /**
     * @return static
     */
    public function withLeftBrace(LeftBraceToken $value)
    {
        if ($value === $this->_left_brace) {
            return $this;
        }
        return new static($value, $this->_statements, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasLeftBrace()
    {
        return $this->_left_brace !== null;
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBrace()
    {
        return TypeAssert\instance_of(LeftBraceToken::class, $this->_left_brace);
    }
    /**
     * @return LeftBraceToken
     */
    /**
     * @return LeftBraceToken
     */
    public function getLeftBracex()
    {
        return $this->getLeftBrace();
    }
    /**
     * @return null|Node
     */
    public function getStatementsUNTYPED()
    {
        return $this->_statements;
    }
    /**
     * @param NodeList<IStatement>|null $value
     *
     * @return static
     */
    public function withStatements(?NodeList $value)
    {
        if ($value === $this->_statements) {
            return $this;
        }
        return new static($this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasStatements()
    {
        return $this->_statements !== null;
    }
    /**
     * @return NodeList<BreakStatement> | NodeList<IStatement> |
     * NodeList<CompoundStatement> | NodeList<ConcurrentStatement> |
     * NodeList<ContinueStatement> | NodeList<DoStatement> |
     * NodeList<ILoopStatement> | NodeList<EchoStatement> |
     * NodeList<ExpressionStatement> | NodeList<ForStatement> |
     * NodeList<IControlFlowStatement> | NodeList<ForeachStatement> |
     * NodeList<GotoLabel> | NodeList<GotoStatement> | NodeList<IfStatement> |
     * NodeList<ReturnStatement> | NodeList<SwitchStatement> |
     * NodeList<ThrowStatement> | NodeList<TryStatement> |
     * NodeList<UnsetStatement> | NodeList<UsingStatementBlockScoped> |
     * NodeList<UsingStatementFunctionScoped> | NodeList<WhileStatement> | null
     */
    /**
     * @return NodeList<IStatement>|null
     */
    public function getStatements()
    {
        return $this->_statements;
    }
    /**
     * @return NodeList<BreakStatement> | NodeList<IStatement> |
     * NodeList<CompoundStatement> | NodeList<ConcurrentStatement> |
     * NodeList<ContinueStatement> | NodeList<DoStatement> |
     * NodeList<ILoopStatement> | NodeList<EchoStatement> |
     * NodeList<ExpressionStatement> | NodeList<ForStatement> |
     * NodeList<IControlFlowStatement> | NodeList<ForeachStatement> |
     * NodeList<GotoLabel> | NodeList<GotoStatement> | NodeList<IfStatement> |
     * NodeList<ReturnStatement> | NodeList<SwitchStatement> |
     * NodeList<ThrowStatement> | NodeList<TryStatement> |
     * NodeList<UnsetStatement> | NodeList<UsingStatementBlockScoped> |
     * NodeList<UsingStatementFunctionScoped> | NodeList<WhileStatement>
     */
    /**
     * @return NodeList<IStatement>
     */
    public function getStatementsx()
    {
        return TypeAssert\not_null($this->getStatements());
    }
    /**
     * @return null|Node
     */
    public function getRightBraceUNTYPED()
    {
        return $this->_right_brace;
    }
    /**
     * @return static
     */
    public function withRightBrace(RightBraceToken $value)
    {
        if ($value === $this->_right_brace) {
            return $this;
        }
        return new static($this->_left_brace, $this->_statements, $value);
    }
    /**
     * @return bool
     */
    public function hasRightBrace()
    {
        return $this->_right_brace !== null;
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBrace()
    {
        return TypeAssert\instance_of(RightBraceToken::class, $this->_right_brace);
    }
    /**
     * @return RightBraceToken
     */
    /**
     * @return RightBraceToken
     */
    public function getRightBracex()
    {
        return $this->getRightBrace();
    }
}

