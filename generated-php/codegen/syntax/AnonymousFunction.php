<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<fbc33bbb5560b7f04f8c84ef48b49a77>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class AnonymousFunction extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute_spec;
    /**
     * @var EditableNode
     */
    private $_static_keyword;
    /**
     * @var EditableNode
     */
    private $_async_keyword;
    /**
     * @var EditableNode
     */
    private $_coroutine_keyword;
    /**
     * @var EditableNode
     */
    private $_function_keyword;
    /**
     * @var EditableNode
     */
    private $_ampersand;
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_parameters;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_colon;
    /**
     * @var EditableNode
     */
    private $_type;
    /**
     * @var EditableNode
     */
    private $_use;
    /**
     * @var EditableNode
     */
    private $_body;
    public function __construct(EditableNode $attribute_spec, EditableNode $static_keyword, EditableNode $async_keyword, EditableNode $coroutine_keyword, EditableNode $function_keyword, EditableNode $ampersand, EditableNode $left_paren, EditableNode $parameters, EditableNode $right_paren, EditableNode $colon, EditableNode $type, EditableNode $use, EditableNode $body)
    {
        parent::__construct('anonymous_function');
        $this->_attribute_spec = $attribute_spec;
        $this->_static_keyword = $static_keyword;
        $this->_async_keyword = $async_keyword;
        $this->_coroutine_keyword = $coroutine_keyword;
        $this->_function_keyword = $function_keyword;
        $this->_ampersand = $ampersand;
        $this->_left_paren = $left_paren;
        $this->_parameters = $parameters;
        $this->_right_paren = $right_paren;
        $this->_colon = $colon;
        $this->_type = $type;
        $this->_use = $use;
        $this->_body = $body;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $attribute_spec = EditableNode::fromJSON($json['anonymous_attribute_spec'], $file, $offset, $source);
        $offset += $attribute_spec->getWidth();
        $static_keyword = EditableNode::fromJSON($json['anonymous_static_keyword'], $file, $offset, $source);
        $offset += $static_keyword->getWidth();
        $async_keyword = EditableNode::fromJSON($json['anonymous_async_keyword'], $file, $offset, $source);
        $offset += $async_keyword->getWidth();
        $coroutine_keyword = EditableNode::fromJSON($json['anonymous_coroutine_keyword'], $file, $offset, $source);
        $offset += $coroutine_keyword->getWidth();
        $function_keyword = EditableNode::fromJSON($json['anonymous_function_keyword'], $file, $offset, $source);
        $offset += $function_keyword->getWidth();
        $ampersand = EditableNode::fromJSON($json['anonymous_ampersand'], $file, $offset, $source);
        $offset += $ampersand->getWidth();
        $left_paren = EditableNode::fromJSON($json['anonymous_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $parameters = EditableNode::fromJSON($json['anonymous_parameters'], $file, $offset, $source);
        $offset += $parameters->getWidth();
        $right_paren = EditableNode::fromJSON($json['anonymous_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $colon = EditableNode::fromJSON($json['anonymous_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        $type = EditableNode::fromJSON($json['anonymous_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $use = EditableNode::fromJSON($json['anonymous_use'], $file, $offset, $source);
        $offset += $use->getWidth();
        $body = EditableNode::fromJSON($json['anonymous_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        return new static($attribute_spec, $static_keyword, $async_keyword, $coroutine_keyword, $function_keyword, $ampersand, $left_paren, $parameters, $right_paren, $colon, $type, $use, $body);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['attribute_spec' => $this->_attribute_spec, 'static_keyword' => $this->_static_keyword, 'async_keyword' => $this->_async_keyword, 'coroutine_keyword' => $this->_coroutine_keyword, 'function_keyword' => $this->_function_keyword, 'ampersand' => $this->_ampersand, 'left_paren' => $this->_left_paren, 'parameters' => $this->_parameters, 'right_paren' => $this->_right_paren, 'colon' => $this->_colon, 'type' => $this->_type, 'use' => $this->_use, 'body' => $this->_body];
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
        $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
        $static_keyword = $this->_static_keyword->rewrite($rewriter, $parents);
        $async_keyword = $this->_async_keyword->rewrite($rewriter, $parents);
        $coroutine_keyword = $this->_coroutine_keyword->rewrite($rewriter, $parents);
        $function_keyword = $this->_function_keyword->rewrite($rewriter, $parents);
        $ampersand = $this->_ampersand->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $parameters = $this->_parameters->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $use = $this->_use->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        if ($attribute_spec === $this->_attribute_spec && $static_keyword === $this->_static_keyword && $async_keyword === $this->_async_keyword && $coroutine_keyword === $this->_coroutine_keyword && $function_keyword === $this->_function_keyword && $ampersand === $this->_ampersand && $left_paren === $this->_left_paren && $parameters === $this->_parameters && $right_paren === $this->_right_paren && $colon === $this->_colon && $type === $this->_type && $use === $this->_use && $body === $this->_body) {
            return $this;
        }
        return new static($attribute_spec, $static_keyword, $async_keyword, $coroutine_keyword, $function_keyword, $ampersand, $left_paren, $parameters, $right_paren, $colon, $type, $use, $body);
    }
    /**
     * @return EditableNode
     */
    public function getAttributeSpecUNTYPED()
    {
        return $this->_attribute_spec;
    }
    /**
     * @return static
     */
    public function withAttributeSpec(EditableNode $value)
    {
        if ($value === $this->_attribute_spec) {
            return $this;
        }
        return new static($value, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_ampersand, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasAttributeSpec()
    {
        return !$this->_attribute_spec->isMissing();
    }
    /**
     * @return AttributeSpecification | null
     */
    /**
     * @return null|AttributeSpecification
     */
    public function getAttributeSpec()
    {
        if ($this->_attribute_spec->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute_spec);
    }
    /**
     * @return AttributeSpecification
     */
    /**
     * @return AttributeSpecification
     */
    public function getAttributeSpecx()
    {
        return TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute_spec);
    }
    /**
     * @return EditableNode
     */
    public function getStaticKeywordUNTYPED()
    {
        return $this->_static_keyword;
    }
    /**
     * @return static
     */
    public function withStaticKeyword(EditableNode $value)
    {
        if ($value === $this->_static_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $value, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_ampersand, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasStaticKeyword()
    {
        return !$this->_static_keyword->isMissing();
    }
    /**
     * @return null | StaticToken
     */
    /**
     * @return null|StaticToken
     */
    public function getStaticKeyword()
    {
        if ($this->_static_keyword->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(StaticToken::class, $this->_static_keyword);
    }
    /**
     * @return StaticToken
     */
    /**
     * @return StaticToken
     */
    public function getStaticKeywordx()
    {
        return TypeAssert\instance_of(StaticToken::class, $this->_static_keyword);
    }
    /**
     * @return EditableNode
     */
    public function getAsyncKeywordUNTYPED()
    {
        return $this->_async_keyword;
    }
    /**
     * @return static
     */
    public function withAsyncKeyword(EditableNode $value)
    {
        if ($value === $this->_async_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $value, $this->_coroutine_keyword, $this->_function_keyword, $this->_ampersand, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasAsyncKeyword()
    {
        return !$this->_async_keyword->isMissing();
    }
    /**
     * @return null | AsyncToken
     */
    /**
     * @return null|AsyncToken
     */
    public function getAsyncKeyword()
    {
        if ($this->_async_keyword->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AsyncToken::class, $this->_async_keyword);
    }
    /**
     * @return AsyncToken
     */
    /**
     * @return AsyncToken
     */
    public function getAsyncKeywordx()
    {
        return TypeAssert\instance_of(AsyncToken::class, $this->_async_keyword);
    }
    /**
     * @return EditableNode
     */
    public function getCoroutineKeywordUNTYPED()
    {
        return $this->_coroutine_keyword;
    }
    /**
     * @return static
     */
    public function withCoroutineKeyword(EditableNode $value)
    {
        if ($value === $this->_coroutine_keyword) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $value, $this->_function_keyword, $this->_ampersand, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasCoroutineKeyword()
    {
        return !$this->_coroutine_keyword->isMissing();
    }
    /**
     * @return null | CoroutineToken
     */
    /**
     * @return null|CoroutineToken
     */
    public function getCoroutineKeyword()
    {
        if ($this->_coroutine_keyword->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(CoroutineToken::class, $this->_coroutine_keyword);
    }
    /**
     * @return CoroutineToken
     */
    /**
     * @return CoroutineToken
     */
    public function getCoroutineKeywordx()
    {
        return TypeAssert\instance_of(CoroutineToken::class, $this->_coroutine_keyword);
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
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $value, $this->_ampersand, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
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
    public function getAmpersandUNTYPED()
    {
        return $this->_ampersand;
    }
    /**
     * @return static
     */
    public function withAmpersand(EditableNode $value)
    {
        if ($value === $this->_ampersand) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $value, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasAmpersand()
    {
        return !$this->_ampersand->isMissing();
    }
    /**
     * @return null | AmpersandToken
     */
    /**
     * @return null|AmpersandToken
     */
    public function getAmpersand()
    {
        if ($this->_ampersand->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AmpersandToken::class, $this->_ampersand);
    }
    /**
     * @return AmpersandToken
     */
    /**
     * @return AmpersandToken
     */
    public function getAmpersandx()
    {
        return TypeAssert\instance_of(AmpersandToken::class, $this->_ampersand);
    }
    /**
     * @return EditableNode
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(EditableNode $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_ampersand, $value, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return !$this->_left_paren->isMissing();
    }
    /**
     * @return null | LeftParenToken
     */
    /**
     * @return null|LeftParenToken
     */
    public function getLeftParen()
    {
        if ($this->_left_paren->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
    }
    /**
     * @return EditableNode
     */
    public function getParametersUNTYPED()
    {
        return $this->_parameters;
    }
    /**
     * @return static
     */
    public function withParameters(EditableNode $value)
    {
        if ($value === $this->_parameters) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_ampersand, $this->_left_paren, $value, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasParameters()
    {
        return !$this->_parameters->isMissing();
    }
    /**
     * @return EditableList<ParameterDeclaration> |
     * EditableList<VariadicParameter> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getParameters()
    {
        if ($this->_parameters->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_parameters);
    }
    /**
     * @return EditableList<ParameterDeclaration> |
     * EditableList<VariadicParameter>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getParametersx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_parameters);
    }
    /**
     * @return EditableNode
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(EditableNode $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_ampersand, $this->_left_paren, $this->_parameters, $value, $this->_colon, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return !$this->_right_paren->isMissing();
    }
    /**
     * @return null | RightParenToken
     */
    /**
     * @return null|RightParenToken
     */
    public function getRightParen()
    {
        if ($this->_right_paren->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
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
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_ampersand, $this->_left_paren, $this->_parameters, $this->_right_paren, $value, $this->_type, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return !$this->_colon->isMissing();
    }
    /**
     * @return null | ColonToken
     */
    /**
     * @return null|ColonToken
     */
    public function getColon()
    {
        if ($this->_colon->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(ColonToken::class, $this->_colon);
    }
    /**
     * @return EditableNode
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(EditableNode $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_ampersand, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $value, $this->_use, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * MapArrayTypeSpecifier | null | NullableTypeSpecifier | SimpleTypeSpecifier
     * | SoftTypeSpecifier | TupleTypeSpecifier | VectorArrayTypeSpecifier |
     * VectorTypeSpecifier
     */
    /**
     * @return null|EditableNode
     */
    public function getType()
    {
        if ($this->_type->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * MapArrayTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier |
     * SoftTypeSpecifier | TupleTypeSpecifier | VectorArrayTypeSpecifier |
     * VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return EditableNode
     */
    public function getUseUNTYPED()
    {
        return $this->_use;
    }
    /**
     * @return static
     */
    public function withUse(EditableNode $value)
    {
        if ($value === $this->_use) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_ampersand, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasUse()
    {
        return !$this->_use->isMissing();
    }
    /**
     * @return AnonymousFunctionUseClause | null
     */
    /**
     * @return null|AnonymousFunctionUseClause
     */
    public function getUse()
    {
        if ($this->_use->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AnonymousFunctionUseClause::class, $this->_use);
    }
    /**
     * @return AnonymousFunctionUseClause
     */
    /**
     * @return AnonymousFunctionUseClause
     */
    public function getUsex()
    {
        return TypeAssert\instance_of(AnonymousFunctionUseClause::class, $this->_use);
    }
    /**
     * @return EditableNode
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(EditableNode $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_static_keyword, $this->_async_keyword, $this->_coroutine_keyword, $this->_function_keyword, $this->_ampersand, $this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type, $this->_use, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return !$this->_body->isMissing();
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

