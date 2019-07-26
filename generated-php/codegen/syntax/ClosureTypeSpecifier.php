<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<10a8689fddf260cc26bf82fb05fad1a5>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ClosureTypeSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'closure_type_specifier';
    /**
     * @var LeftParenToken
     */
    private $_outer_left_paren;
    /**
     * @var null|Node
     */
    private $_coroutine;
    /**
     * @var FunctionToken
     */
    private $_function_keyword;
    /**
     * @var LeftParenToken
     */
    private $_inner_left_paren;
    /**
     * @var NodeList<ListItem<ITypeSpecifier>>|null
     */
    private $_parameter_list;
    /**
     * @var RightParenToken
     */
    private $_inner_right_paren;
    /**
     * @var ColonToken
     */
    private $_colon;
    /**
     * @var ITypeSpecifier
     */
    private $_return_type;
    /**
     * @var RightParenToken
     */
    private $_outer_right_paren;
    /**
     * @param NodeList<ListItem<ITypeSpecifier>>|null $parameter_list
     */
    public function __construct(LeftParenToken $outer_left_paren, ?Node $coroutine, FunctionToken $function_keyword, LeftParenToken $inner_left_paren, ?NodeList $parameter_list, RightParenToken $inner_right_paren, ColonToken $colon, ITypeSpecifier $return_type, RightParenToken $outer_right_paren, ?array $source_ref = null)
    {
        $this->_outer_left_paren = $outer_left_paren;
        $this->_coroutine = $coroutine;
        $this->_function_keyword = $function_keyword;
        $this->_inner_left_paren = $inner_left_paren;
        $this->_parameter_list = $parameter_list;
        $this->_inner_right_paren = $inner_right_paren;
        $this->_colon = $colon;
        $this->_return_type = $return_type;
        $this->_outer_right_paren = $outer_right_paren;
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
        $outer_left_paren = Node::fromJSON($json['closure_outer_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $outer_left_paren = $outer_left_paren !== null ? $outer_left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $outer_left_paren->getWidth();
        $coroutine = Node::fromJSON($json['closure_coroutine'], $file, $offset, $source, 'Node');
        $offset += (($__tmp1__ = $coroutine) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $function_keyword = Node::fromJSON($json['closure_function_keyword'], $file, $offset, $source, 'FunctionToken');
        $function_keyword = $function_keyword !== null ? $function_keyword : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $function_keyword->getWidth();
        $inner_left_paren = Node::fromJSON($json['closure_inner_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $inner_left_paren = $inner_left_paren !== null ? $inner_left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $inner_left_paren->getWidth();
        $parameter_list = Node::fromJSON($json['closure_parameter_list'], $file, $offset, $source, 'NodeList<ListItem<ITypeSpecifier>>');
        $offset += (($__tmp2__ = $parameter_list) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $inner_right_paren = Node::fromJSON($json['closure_inner_right_paren'], $file, $offset, $source, 'RightParenToken');
        $inner_right_paren = $inner_right_paren !== null ? $inner_right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $inner_right_paren->getWidth();
        $colon = Node::fromJSON($json['closure_colon'], $file, $offset, $source, 'ColonToken');
        $colon = $colon !== null ? $colon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $colon->getWidth();
        $return_type = Node::fromJSON($json['closure_return_type'], $file, $offset, $source, 'ITypeSpecifier');
        $return_type = $return_type !== null ? $return_type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $return_type->getWidth();
        $outer_right_paren = Node::fromJSON($json['closure_outer_right_paren'], $file, $offset, $source, 'RightParenToken');
        $outer_right_paren = $outer_right_paren !== null ? $outer_right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $outer_right_paren->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($outer_left_paren, $coroutine, $function_keyword, $inner_left_paren, $parameter_list, $inner_right_paren, $colon, $return_type, $outer_right_paren, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['outer_left_paren' => $this->_outer_left_paren, 'coroutine' => $this->_coroutine, 'function_keyword' => $this->_function_keyword, 'inner_left_paren' => $this->_inner_left_paren, 'parameter_list' => $this->_parameter_list, 'inner_right_paren' => $this->_inner_right_paren, 'colon' => $this->_colon, 'return_type' => $this->_return_type, 'outer_right_paren' => $this->_outer_right_paren]);
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
        $outer_left_paren = $rewriter($this->_outer_left_paren, $parents);
        $coroutine = $this->_coroutine === null ? null : $rewriter($this->_coroutine, $parents);
        $function_keyword = $rewriter($this->_function_keyword, $parents);
        $inner_left_paren = $rewriter($this->_inner_left_paren, $parents);
        $parameter_list = $this->_parameter_list === null ? null : $rewriter($this->_parameter_list, $parents);
        $inner_right_paren = $rewriter($this->_inner_right_paren, $parents);
        $colon = $rewriter($this->_colon, $parents);
        $return_type = $rewriter($this->_return_type, $parents);
        $outer_right_paren = $rewriter($this->_outer_right_paren, $parents);
        if ($outer_left_paren === $this->_outer_left_paren && $coroutine === $this->_coroutine && $function_keyword === $this->_function_keyword && $inner_left_paren === $this->_inner_left_paren && $parameter_list === $this->_parameter_list && $inner_right_paren === $this->_inner_right_paren && $colon === $this->_colon && $return_type === $this->_return_type && $outer_right_paren === $this->_outer_right_paren) {
            return $this;
        }
        return new static($outer_left_paren, $coroutine, $function_keyword, $inner_left_paren, $parameter_list, $inner_right_paren, $colon, $return_type, $outer_right_paren);
    }
    /**
     * @return null|Node
     */
    public function getOuterLeftParenUNTYPED()
    {
        return $this->_outer_left_paren;
    }
    /**
     * @return static
     */
    public function withOuterLeftParen(LeftParenToken $value)
    {
        if ($value === $this->_outer_left_paren) {
            return $this;
        }
        return new static($value, $this->_coroutine, $this->_function_keyword, $this->_inner_left_paren, $this->_parameter_list, $this->_inner_right_paren, $this->_colon, $this->_return_type, $this->_outer_right_paren);
    }
    /**
     * @return bool
     */
    public function hasOuterLeftParen()
    {
        return $this->_outer_left_paren !== null;
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getOuterLeftParen()
    {
        return TypeAssert\instance_of(LeftParenToken::class, $this->_outer_left_paren);
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getOuterLeftParenx()
    {
        return $this->getOuterLeftParen();
    }
    /**
     * @return null|Node
     */
    public function getCoroutineUNTYPED()
    {
        return $this->_coroutine;
    }
    /**
     * @return static
     */
    public function withCoroutine(?Node $value)
    {
        if ($value === $this->_coroutine) {
            return $this;
        }
        return new static($this->_outer_left_paren, $value, $this->_function_keyword, $this->_inner_left_paren, $this->_parameter_list, $this->_inner_right_paren, $this->_colon, $this->_return_type, $this->_outer_right_paren);
    }
    /**
     * @return bool
     */
    public function hasCoroutine()
    {
        return $this->_coroutine !== null;
    }
    /**
     * @return null
     */
    /**
     * @return null|Node
     */
    public function getCoroutine()
    {
        return $this->_coroutine;
    }
    /**
     * @return
     */
    /**
     * @return Node
     */
    public function getCoroutinex()
    {
        return TypeAssert\not_null($this->getCoroutine());
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
        return new static($this->_outer_left_paren, $this->_coroutine, $value, $this->_inner_left_paren, $this->_parameter_list, $this->_inner_right_paren, $this->_colon, $this->_return_type, $this->_outer_right_paren);
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
    public function getInnerLeftParenUNTYPED()
    {
        return $this->_inner_left_paren;
    }
    /**
     * @return static
     */
    public function withInnerLeftParen(LeftParenToken $value)
    {
        if ($value === $this->_inner_left_paren) {
            return $this;
        }
        return new static($this->_outer_left_paren, $this->_coroutine, $this->_function_keyword, $value, $this->_parameter_list, $this->_inner_right_paren, $this->_colon, $this->_return_type, $this->_outer_right_paren);
    }
    /**
     * @return bool
     */
    public function hasInnerLeftParen()
    {
        return $this->_inner_left_paren !== null;
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getInnerLeftParen()
    {
        return TypeAssert\instance_of(LeftParenToken::class, $this->_inner_left_paren);
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getInnerLeftParenx()
    {
        return $this->getInnerLeftParen();
    }
    /**
     * @return null|Node
     */
    public function getParameterListUNTYPED()
    {
        return $this->_parameter_list;
    }
    /**
     * @param NodeList<ListItem<ITypeSpecifier>>|null $value
     *
     * @return static
     */
    public function withParameterList(?NodeList $value)
    {
        if ($value === $this->_parameter_list) {
            return $this;
        }
        return new static($this->_outer_left_paren, $this->_coroutine, $this->_function_keyword, $this->_inner_left_paren, $value, $this->_inner_right_paren, $this->_colon, $this->_return_type, $this->_outer_right_paren);
    }
    /**
     * @return bool
     */
    public function hasParameterList()
    {
        return $this->_parameter_list !== null;
    }
    /**
     * @return NodeList<ListItem<ClosureParameterTypeSpecifier>> |
     * NodeList<ListItem<ITypeSpecifier>> | NodeList<ListItem<VariadicParameter>>
     * | null
     */
    /**
     * @return NodeList<ListItem<ITypeSpecifier>>|null
     */
    public function getParameterList()
    {
        return $this->_parameter_list;
    }
    /**
     * @return NodeList<ListItem<ClosureParameterTypeSpecifier>> |
     * NodeList<ListItem<ITypeSpecifier>> | NodeList<ListItem<VariadicParameter>>
     */
    /**
     * @return NodeList<ListItem<ITypeSpecifier>>
     */
    public function getParameterListx()
    {
        return TypeAssert\not_null($this->getParameterList());
    }
    /**
     * @return null|Node
     */
    public function getInnerRightParenUNTYPED()
    {
        return $this->_inner_right_paren;
    }
    /**
     * @return static
     */
    public function withInnerRightParen(RightParenToken $value)
    {
        if ($value === $this->_inner_right_paren) {
            return $this;
        }
        return new static($this->_outer_left_paren, $this->_coroutine, $this->_function_keyword, $this->_inner_left_paren, $this->_parameter_list, $value, $this->_colon, $this->_return_type, $this->_outer_right_paren);
    }
    /**
     * @return bool
     */
    public function hasInnerRightParen()
    {
        return $this->_inner_right_paren !== null;
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getInnerRightParen()
    {
        return TypeAssert\instance_of(RightParenToken::class, $this->_inner_right_paren);
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getInnerRightParenx()
    {
        return $this->getInnerRightParen();
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
    public function withColon(ColonToken $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_outer_left_paren, $this->_coroutine, $this->_function_keyword, $this->_inner_left_paren, $this->_parameter_list, $this->_inner_right_paren, $value, $this->_return_type, $this->_outer_right_paren);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return $this->_colon !== null;
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColon()
    {
        return TypeAssert\instance_of(ColonToken::class, $this->_colon);
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColonx()
    {
        return $this->getColon();
    }
    /**
     * @return null|Node
     */
    public function getReturnTypeUNTYPED()
    {
        return $this->_return_type;
    }
    /**
     * @return static
     */
    public function withReturnType(ITypeSpecifier $value)
    {
        if ($value === $this->_return_type) {
            return $this;
        }
        return new static($this->_outer_left_paren, $this->_coroutine, $this->_function_keyword, $this->_inner_left_paren, $this->_parameter_list, $this->_inner_right_paren, $this->_colon, $value, $this->_outer_right_paren);
    }
    /**
     * @return bool
     */
    public function hasReturnType()
    {
        return $this->_return_type !== null;
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier | LikeTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getReturnType()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_return_type);
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier | LikeTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getReturnTypex()
    {
        return $this->getReturnType();
    }
    /**
     * @return null|Node
     */
    public function getOuterRightParenUNTYPED()
    {
        return $this->_outer_right_paren;
    }
    /**
     * @return static
     */
    public function withOuterRightParen(RightParenToken $value)
    {
        if ($value === $this->_outer_right_paren) {
            return $this;
        }
        return new static($this->_outer_left_paren, $this->_coroutine, $this->_function_keyword, $this->_inner_left_paren, $this->_parameter_list, $this->_inner_right_paren, $this->_colon, $this->_return_type, $value);
    }
    /**
     * @return bool
     */
    public function hasOuterRightParen()
    {
        return $this->_outer_right_paren !== null;
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getOuterRightParen()
    {
        return TypeAssert\instance_of(RightParenToken::class, $this->_outer_right_paren);
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getOuterRightParenx()
    {
        return $this->getOuterRightParen();
    }
}

