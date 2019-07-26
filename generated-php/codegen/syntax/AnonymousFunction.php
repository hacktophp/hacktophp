<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9a2514d5bf5e7e34728b1a0737fd1de2>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class AnonymousFunction extends Node implements IHasFunctionBody, ILambdaBody, IHasAttributeSpec, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'anonymous_function';
    /**
     * @var null|OldAttributeSpecification
     */
    private $_attribute_spec;
    /**
     * @var null|StaticToken
     */
    private $_static_keyword;
    /**
     * @var null|AsyncToken
     */
    private $_async_keyword;
    /**
     * @var null|Node
     */
    private $_coroutine_keyword;
    /**
     * @var FunctionToken
     */
    private $_function_keyword;
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var NodeList<ListItem<IParameter>>|null
     */
    private $_parameters;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @var null|ColonToken
     */
    private $_colon;
    /**
     * @var null|ITypeSpecifier
     */
    private $_type;
    /**
     * @var null|AnonymousFunctionUseClause
     */
    private $_use;
    /**
     * @var CompoundStatement
     */
    private $_body;
    /**
     * @param NodeList<ListItem<IParameter>>|null $parameters
     */
    public function __construct(?OldAttributeSpecification $attribute_spec, ?StaticToken $static_keyword, ?AsyncToken $async_keyword, ?Node $coroutine_keyword, FunctionToken $function_keyword, LeftParenToken $left_paren, ?NodeList $parameters, RightParenToken $right_paren, ?ColonToken $colon, ?ITypeSpecifier $type, ?AnonymousFunctionUseClause $use, CompoundStatement $body, ?array $source_ref = null)
    {
        $this->_attribute_spec = $attribute_spec;
        $this->_static_keyword = $static_keyword;
        $this->_async_keyword = $async_keyword;
        $this->_coroutine_keyword = $coroutine_keyword;
        $this->_function_keyword = $function_keyword;
        $this->_left_paren = $left_paren;
        $this->_parameters = $parameters;
        $this->_right_paren = $right_paren;
        $this->_colon = $colon;
        $this->_type = $type;
        $this->_use = $use;
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
        $attribute_spec = Node::fromJSON($json['anonymous_attribute_spec'], $file, $offset, $source, 'OldAttributeSpecification');
        $offset += (($__tmp1__ = $attribute_spec) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $static_keyword = Node::fromJSON($json['anonymous_static_keyword'], $file, $offset, $source, 'StaticToken');
        $offset += (($__tmp2__ = $static_keyword) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $async_keyword = Node::fromJSON($json['anonymous_async_keyword'], $file, $offset, $source, 'AsyncToken');
        $offset += (($__tmp3__ = $async_keyword) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $coroutine_keyword = Node::fromJSON($json['anonymous_coroutine_keyword'], $file, $offset, $source, 'Node');
        $offset += (($__tmp4__ = $coroutine_keyword) !== null ? $__tmp4__->getWidth() : null) ?? 0;
        $function_keyword = Node::fromJSON($json['anonymous_function_keyword'], $file, $offset, $source, 'FunctionToken');
        $function_keyword = $function_keyword !== null ? $function_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $function_keyword->getWidth();
        $left_paren = Node::fromJSON($json['anonymous_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $parameters = Node::fromJSON($json['anonymous_parameters'], $file, $offset, $source, 'NodeList<ListItem<IParameter>>');
        $offset += (($__tmp5__ = $parameters) !== null ? $__tmp5__->getWidth() : null) ?? 0;
        $right_paren = Node::fromJSON($json['anonymous_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $colon = Node::fromJSON($json['anonymous_colon'], $file, $offset, $source, 'ColonToken');
        $offset += (($__tmp6__ = $colon) !== null ? $__tmp6__->getWidth() : null) ?? 0;
        $type = Node::fromJSON($json['anonymous_type'], $file, $offset, $source, 'ITypeSpecifier');
        $offset += (($__tmp7__ = $type) !== null ? $__tmp7__->getWidth() : null) ?? 0;
        $use = Node::fromJSON($json['anonymous_use'], $file, $offset, $source, 'AnonymousFunctionUseClause');
        $offset += (($__tmp8__ = $use) !== null ? $__tmp8__->getWidth() : null) ?? 0;
        $body = Node::fromJSON($json['anonymous_body'], $file, $offset, $source, 'CompoundStatement');
        $body = $body !== null ? $body : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $body->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute_spec, $static_keyword, $async_keyword, $coroutine_keyword, $function_keyword, $left_paren, $parameters, $right_paren, $colon, $type, $use, $body, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute_spec' => $this->_attribute_spec, 'static_keyword' => $this->_static_keyword, 'async_keyword' => $this->_async_keyword, 'coroutine_keyword' => $this->_coroutine_keyword, 'function_keyword' => $this->_function_keyword, 'left_paren' => $this->_left_paren, 'parameters' => $this->_parameters, 'right_paren' => $this->_right_paren, 'colon' => $this->_colon, 'type' => $this->_type, 'use' => $this->_use, 'body' => $this->_body]);
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
        $attribute_spec = $this->_attribute_spec === null ? null : $rewriter($this->_attribute_spec, $parents);
        $static_keyword = $this->_static_keyword === null ? null : $rewriter($this->_static_keyword, $parents);
        $async_keyword = $this->_async_keyword === null ? null : $rewriter($this->_async_keyword, $parents);
        $coroutine_keyword = $this->_coroutine_keyword === null ? null : $rewriter($this->_coroutine_keyword, $parents);
        $function_keyword = $rewriter($this->_function_keyword, $parents);
        $left_paren = $rewriter($this->_left_paren, $parents);
        $parameters = $this->_parameters === null ? null : $rewriter($this->_parameters, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $colon = $this->_colon === null ? null : $rewriter($this->_colon, $parents);
        $type = $this->_type === null ? null : $rewriter($this->_type, $parents);
        $use = $this->_use === null ? null : $rewriter($this->_use, $parents);
        $body = $rewriter($this->_body, $parents);
        if ($attribute_spec === $this->_attribute_spec && $static_keyword === $this->_static_keyword && $async_keyword === $this->_async_keyword && $coroutine_keyword === $this->_coroutine_keyword && $function_keyword === $this->_function_keyword && $left_paren === $this->_left_paren && $parameters === $this->_parameters && $right_paren === $this->_right_paren && $colon === $this->_colon && $type === $this->_type && $use === $this->_use && $body === $this->_body) {
            return $this;
        }
        return new static($attribute_spec, $static_keyword, $async_keyword, $coroutine_keyword, $function_keyword, $left_paren, $parameters, $right_paren, $colon, $type, $use, $body);
    }
    /**
     * @return null|Node
     */
    public function getAttributeSpecUNTYPED()
    {
        return $this->_attribute_spec;
    }
    /**
     * @return static
     */
    public function withAttributeSpec(?OldAttributeSpecification $value)
    {
        if ($value === $this->_attribute_spec) {
            return $this;
        }
        return new static($value, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasAttributeSpec()
    {
        return $this->_attribute_spec !== null;
    }
    /**
     * @return null | OldAttributeSpecification
     */
    /**
     * @return null|OldAttributeSpecification
     */
    public function getAttributeSpec()
    {
        return $this->_attribute_spec;
    }
    /**
     * @return OldAttributeSpecification
     */
    /**
     * @return OldAttributeSpecification
     */
    public function getAttributeSpecx()
    {
        return TypeAssert\not_null($this->getAttributeSpec());
    }
    /**
     * @return null|Node
     */
    public function getStaticKeywordUNTYPED()
    {
        return $this->_static_keyword;
    }
    /**
     * @return static
     */
    public function withStaticKeyword(?StaticToken $value)
    {
        if ($value === $this->_static_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $value, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasStaticKeyword()
    {
        return $this->_static_keyword !== null;
    }
    /**
     * @return null | StaticToken
     */
    /**
     * @return null|StaticToken
     */
    public function getStaticKeyword()
    {
        return $this->_static_keyword;
    }
    /**
     * @return StaticToken
     */
    /**
     * @return StaticToken
     */
    public function getStaticKeywordx()
    {
        return TypeAssert\not_null($this->getStaticKeyword());
    }
    /**
     * @return null|Node
     */
    public function getAsyncKeywordUNTYPED()
    {
        return $this->_async_keyword;
    }
    /**
     * @return static
     */
    public function withAsyncKeyword(?AsyncToken $value)
    {
        if ($value === $this->_async_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $value, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasAsyncKeyword()
    {
        return $this->_async_keyword !== null;
    }
    /**
     * @return null | AsyncToken
     */
    /**
     * @return null|AsyncToken
     */
    public function getAsyncKeyword()
    {
        return $this->_async_keyword;
    }
    /**
     * @return AsyncToken
     */
    /**
     * @return AsyncToken
     */
    public function getAsyncKeywordx()
    {
        return TypeAssert\not_null($this->getAsyncKeyword());
    }
    /**
     * @return null|Node
     */
    public function getCoroutineKeywordUNTYPED()
    {
        return $this->_coroutine_keyword;
    }
    /**
     * @return static
     */
    public function withCoroutineKeyword(?Node $value)
    {
        if ($value === $this->_coroutine_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $value, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasCoroutineKeyword()
    {
        return $this->_coroutine_keyword !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
     */
    public function getCoroutineKeyword()
    {
        return $this->_coroutine_keyword;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getCoroutineKeywordx()
    {
        return TypeAssert\not_null($this->getCoroutineKeyword());
    }
    /**
     * @return null|Node
     */
    public function getFunctionKeywordUNTYPED()
    {
        return $this->_function_keyword;
    }
    /**
     * @return static
     */
    public function withFunctionKeyword(FunctionToken $value)
    {
        if ($value === $this->_function_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $value, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasFunctionKeyword()
    {
        return $this->_function_keyword !== null;
    }
    /**
     * @return FunctionToken
     */
    /**
     * @return FunctionToken
     */
    public function getFunctionKeyword()
    {
        return TypeAssert\instance_of(FunctionToken::class, $this->_function_keyword);
    }
    /**
     * @return FunctionToken
     */
    /**
     * @return FunctionToken
     */
    public function getFunctionKeywordx()
    {
        return $this->getFunctionKeyword();
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
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $value, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
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
    public function getParametersUNTYPED()
    {
        return $this->_parameters;
    }
    /**
     * @param NodeList<ListItem<IParameter>>|null $value
     *
     * @return static
     */
    public function withParameters(?NodeList $value)
    {
        if ($value === $this->_parameters) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $value, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasParameters()
    {
        return $this->_parameters !== null;
    }
    /**
     * @return NodeList<ListItem<ParameterDeclaration>> |
     * NodeList<ListItem<VariadicParameter>> | null
     */
    /**
     * @return NodeList<ListItem<IParameter>>|null
     */
    public function getParameters()
    {
        return $this->_parameters;
    }
    /**
     * @return NodeList<ListItem<ParameterDeclaration>> |
     * NodeList<ListItem<VariadicParameter>>
     */
    /**
     * @return NodeList<ListItem<IParameter>>
     */
    public function getParametersx()
    {
        return TypeAssert\not_null($this->getParameters());
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
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $value, $this->_colon, $this->_type, $this->_use, $this->_body);
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
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(?ColonToken $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $value, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return $this->_colon !== null;
    }
    /**
     * @return null | ColonToken
     */
    /**
     * @return null|ColonToken
     */
    public function getColon()
    {
        return $this->_colon;
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColonx()
    {
        return TypeAssert\not_null($this->getColon());
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
    public function withType(?ITypeSpecifier $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $value, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * MapArrayTypeSpecifier | null | NullableTypeSpecifier | SimpleTypeSpecifier
     * | SoftTypeSpecifier | TupleTypeSpecifier
     */
    /**
     * @return null|ITypeSpecifier
     */
    public function getType()
    {
        return $this->_type;
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * MapArrayTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier |
     * SoftTypeSpecifier | TupleTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return TypeAssert\not_null($this->getType());
    }
    /**
     * @return null|Node
     */
    public function getUseUNTYPED()
    {
        return $this->_use;
    }
    /**
     * @return static
     */
    public function withUse(?AnonymousFunctionUseClause $value)
    {
        if ($value === $this->_use) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasUse()
    {
        return $this->_use !== null;
    }
    /**
     * @return AnonymousFunctionUseClause | null
     */
    /**
     * @return null|AnonymousFunctionUseClause
     */
    public function getUse()
    {
        return $this->_use;
    }
    /**
     * @return AnonymousFunctionUseClause
     */
    /**
     * @return AnonymousFunctionUseClause
     */
    public function getUsex()
    {
        return TypeAssert\not_null($this->getUse());
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
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $value);
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

