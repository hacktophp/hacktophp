<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<576bd85595d21d1fa0126c1c7678178b>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class ClosureTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_outer_left_paren;
    /**
     * @var EditableNode
     */
    private $_coroutine;
    /**
     * @var EditableNode
     */
    private $_function_keyword;
    /**
     * @var EditableNode
     */
    private $_inner_left_paren;
    /**
     * @var EditableNode
     */
    private $_parameter_list;
    /**
     * @var EditableNode
     */
    private $_inner_right_paren;
    /**
     * @var EditableNode
     */
    private $_colon;
    /**
     * @var EditableNode
     */
    private $_return_type;
    /**
     * @var EditableNode
     */
    private $_outer_right_paren;
    public function __construct(EditableNode $outer_left_paren, EditableNode $coroutine, EditableNode $function_keyword, EditableNode $inner_left_paren, EditableNode $parameter_list, EditableNode $inner_right_paren, EditableNode $colon, EditableNode $return_type, EditableNode $outer_right_paren)
    {
        parent::__construct('closure_type_specifier');
        $this->_outer_left_paren = $outer_left_paren;
        $this->_coroutine = $coroutine;
        $this->_function_keyword = $function_keyword;
        $this->_inner_left_paren = $inner_left_paren;
        $this->_parameter_list = $parameter_list;
        $this->_inner_right_paren = $inner_right_paren;
        $this->_colon = $colon;
        $this->_return_type = $return_type;
        $this->_outer_right_paren = $outer_right_paren;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $outer_left_paren = EditableNode::fromJSON($json['closure_outer_left_paren'], $file, $offset, $source);
        $offset += $outer_left_paren->getWidth();
        $coroutine = EditableNode::fromJSON($json['closure_coroutine'], $file, $offset, $source);
        $offset += $coroutine->getWidth();
        $function_keyword = EditableNode::fromJSON($json['closure_function_keyword'], $file, $offset, $source);
        $offset += $function_keyword->getWidth();
        $inner_left_paren = EditableNode::fromJSON($json['closure_inner_left_paren'], $file, $offset, $source);
        $offset += $inner_left_paren->getWidth();
        $parameter_list = EditableNode::fromJSON($json['closure_parameter_list'], $file, $offset, $source);
        $offset += $parameter_list->getWidth();
        $inner_right_paren = EditableNode::fromJSON($json['closure_inner_right_paren'], $file, $offset, $source);
        $offset += $inner_right_paren->getWidth();
        $colon = EditableNode::fromJSON($json['closure_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        $return_type = EditableNode::fromJSON($json['closure_return_type'], $file, $offset, $source);
        $offset += $return_type->getWidth();
        $outer_right_paren = EditableNode::fromJSON($json['closure_outer_right_paren'], $file, $offset, $source);
        $offset += $outer_right_paren->getWidth();
        return new static($outer_left_paren, $coroutine, $function_keyword, $inner_left_paren, $parameter_list, $inner_right_paren, $colon, $return_type, $outer_right_paren);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['outer_left_paren' => $this->_outer_left_paren, 'coroutine' => $this->_coroutine, 'function_keyword' => $this->_function_keyword, 'inner_left_paren' => $this->_inner_left_paren, 'parameter_list' => $this->_parameter_list, 'inner_right_paren' => $this->_inner_right_paren, 'colon' => $this->_colon, 'return_type' => $this->_return_type, 'outer_right_paren' => $this->_outer_right_paren];
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? [] : (array) $parents;
        $parents[] = $this;
        $outer_left_paren = $this->_outer_left_paren->rewrite($rewriter, $parents);
        $coroutine = $this->_coroutine->rewrite($rewriter, $parents);
        $function_keyword = $this->_function_keyword->rewrite($rewriter, $parents);
        $inner_left_paren = $this->_inner_left_paren->rewrite($rewriter, $parents);
        $parameter_list = $this->_parameter_list->rewrite($rewriter, $parents);
        $inner_right_paren = $this->_inner_right_paren->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $return_type = $this->_return_type->rewrite($rewriter, $parents);
        $outer_right_paren = $this->_outer_right_paren->rewrite($rewriter, $parents);
        if ($outer_left_paren === $this->_outer_left_paren && $coroutine === $this->_coroutine && $function_keyword === $this->_function_keyword && $inner_left_paren === $this->_inner_left_paren && $parameter_list === $this->_parameter_list && $inner_right_paren === $this->_inner_right_paren && $colon === $this->_colon && $return_type === $this->_return_type && $outer_right_paren === $this->_outer_right_paren) {
            return $this;
        }
        return new static($outer_left_paren, $coroutine, $function_keyword, $inner_left_paren, $parameter_list, $inner_right_paren, $colon, $return_type, $outer_right_paren);
    }
    /**
     * @return EditableNode
     */
    public function getOuterLeftParenUNTYPED()
    {
        return $this->_outer_left_paren;
    }
    /**
     * @return static
     */
    public function withOuterLeftParen(EditableNode $value)
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
        return !$this->_outer_left_paren->isMissing();
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
     * @return EditableNode
     */
    public function getCoroutineUNTYPED()
    {
        return $this->_coroutine;
    }
    /**
     * @return static
     */
    public function withCoroutine(EditableNode $value)
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
        return !$this->_coroutine->isMissing();
    }
    /**
     * @return null | CoroutineToken
     */
    /**
     * @return null|CoroutineToken
     */
    public function getCoroutine()
    {
        if ($this->_coroutine->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(CoroutineToken::class, $this->_coroutine);
    }
    /**
     * @return CoroutineToken
     */
    /**
     * @return CoroutineToken
     */
    public function getCoroutinex()
    {
        return TypeAssert\instance_of(CoroutineToken::class, $this->_coroutine);
    }
    /**
     * @return EditableNode
     */
    public function getFunctionKeywordUNTYPED()
    {
        return $this->_function_keyword;
    }
    /**
     * @return static
     */
    public function withFunctionKeyword(EditableNode $value)
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
        return !$this->_function_keyword->isMissing();
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
     * @return EditableNode
     */
    public function getInnerLeftParenUNTYPED()
    {
        return $this->_inner_left_paren;
    }
    /**
     * @return static
     */
    public function withInnerLeftParen(EditableNode $value)
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
        return !$this->_inner_left_paren->isMissing();
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
     * @return EditableNode
     */
    public function getParameterListUNTYPED()
    {
        return $this->_parameter_list;
    }
    /**
     * @return static
     */
    public function withParameterList(EditableNode $value)
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
        return !$this->_parameter_list->isMissing();
    }
    /**
     * @return EditableList<ClosureParameterTypeSpecifier> |
     * EditableList<EditableNode> | EditableList<VariadicParameter> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getParameterList()
    {
        if ($this->_parameter_list->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_parameter_list);
    }
    /**
     * @return EditableList<ClosureParameterTypeSpecifier> |
     * EditableList<EditableNode> | EditableList<VariadicParameter>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getParameterListx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_parameter_list);
    }
    /**
     * @return EditableNode
     */
    public function getInnerRightParenUNTYPED()
    {
        return $this->_inner_right_paren;
    }
    /**
     * @return static
     */
    public function withInnerRightParen(EditableNode $value)
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
        return !$this->_inner_right_paren->isMissing();
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
     * @return EditableNode
     */
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(EditableNode $value)
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
        return !$this->_colon->isMissing();
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
     * @return EditableNode
     */
    public function getReturnTypeUNTYPED()
    {
        return $this->_return_type;
    }
    /**
     * @return static
     */
    public function withReturnType(EditableNode $value)
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
        return !$this->_return_type->isMissing();
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getReturnType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_return_type);
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * NullableTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getReturnTypex()
    {
        return $this->getReturnType();
    }
    /**
     * @return EditableNode
     */
    public function getOuterRightParenUNTYPED()
    {
        return $this->_outer_right_paren;
    }
    /**
     * @return static
     */
    public function withOuterRightParen(EditableNode $value)
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
        return !$this->_outer_right_paren->isMissing();
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

