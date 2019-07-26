<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<81e6be15ce8091ed5713e7e4baad2cab>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class NamespaceBody extends Node implements INamespaceBody
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'namespace_body';
    /**
     * @var LeftBraceToken
     */
    private $_left_brace;
    /**
     * @var NodeList<Node>|null
     */
    private $_declarations;
    /**
     * @var RightBraceToken
     */
    private $_right_brace;
    /**
     * @param NodeList<Node>|null $declarations
     */
    public function __construct(LeftBraceToken $left_brace, ?NodeList $declarations, RightBraceToken $right_brace, ?__Private\SourceRef $source_ref = null)
    {
        $this->_left_brace = $left_brace;
        $this->_declarations = $declarations;
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
        $left_brace = Node::fromJSON($json['namespace_left_brace'], $file, $offset, $source, 'LeftBraceToken');
        $left_brace = $left_brace !== null ? $left_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_brace->getWidth();
        $declarations = Node::fromJSON($json['namespace_declarations'], $file, $offset, $source, 'NodeList<Node>');
        $offset += (($__tmp1__ = $declarations) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $right_brace = Node::fromJSON($json['namespace_right_brace'], $file, $offset, $source, 'RightBraceToken');
        $right_brace = $right_brace !== null ? $right_brace : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_brace->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_brace, $declarations, $right_brace, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_brace' => $this->_left_brace, 'declarations' => $this->_declarations, 'right_brace' => $this->_right_brace]);
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
        $declarations = $this->_declarations === null ? null : $rewriter($this->_declarations, $parents);
        $right_brace = $rewriter($this->_right_brace, $parents);
        if ($left_brace === $this->_left_brace && $declarations === $this->_declarations && $right_brace === $this->_right_brace) {
            return $this;
        }
        return new static($left_brace, $declarations, $right_brace);
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
        return new static($value, $this->_declarations, $this->_right_brace);
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
    public function getDeclarationsUNTYPED()
    {
        return $this->_declarations;
    }
    /**
     * @param NodeList<Node>|null $value
     *
     * @return static
     */
    public function withDeclarations(?NodeList $value)
    {
        if ($value === $this->_declarations) {
            return $this;
        }
        return new static($this->_left_brace, $value, $this->_right_brace);
    }
    /**
     * @return bool
     */
    public function hasDeclarations()
    {
        return $this->_declarations !== null;
    }
    /**
     * @return NodeList<AliasDeclaration> | NodeList<Node> |
     * NodeList<IHasAttributeSpec> | NodeList<ClassishDeclaration> |
     * NodeList<ConstDeclaration> | NodeList<EchoStatement> |
     * NodeList<IStatement> | NodeList<EnumDeclaration> |
     * NodeList<ExpressionStatement> | NodeList<FunctionDeclaration> |
     * NodeList<InclusionDirective> | NodeList<NamespaceGroupUseDeclaration> |
     * NodeList<INamespaceUseDeclaration> | NodeList<NamespaceUseDeclaration> |
     * null
     */
    /**
     * @return NodeList<Node>|null
     */
    public function getDeclarations()
    {
        return $this->_declarations;
    }
    /**
     * @return NodeList<AliasDeclaration> | NodeList<Node> |
     * NodeList<IHasAttributeSpec> | NodeList<ClassishDeclaration> |
     * NodeList<ConstDeclaration> | NodeList<EchoStatement> |
     * NodeList<IStatement> | NodeList<EnumDeclaration> |
     * NodeList<ExpressionStatement> | NodeList<FunctionDeclaration> |
     * NodeList<InclusionDirective> | NodeList<NamespaceGroupUseDeclaration> |
     * NodeList<INamespaceUseDeclaration> | NodeList<NamespaceUseDeclaration>
     */
    /**
     * @return NodeList<Node>
     */
    public function getDeclarationsx()
    {
        return TypeAssert\not_null($this->getDeclarations());
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
        return new static($this->_left_brace, $this->_declarations, $value);
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

