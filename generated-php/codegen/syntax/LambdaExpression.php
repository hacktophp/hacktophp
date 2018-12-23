<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<dea38ef6a8d31d9576828daa23cace07>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class LambdaExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_attribute_spec;
    /**
     * @var EditableNode
     */
    private $_async;
    /**
     * @var EditableNode
     */
    private $_coroutine;
    /**
     * @var EditableNode
     */
    private $_signature;
    /**
     * @var EditableNode
     */
    private $_arrow;
    /**
     * @var EditableNode
     */
    private $_body;
    public function __construct(EditableNode $attribute_spec, EditableNode $async, EditableNode $coroutine, EditableNode $signature, EditableNode $arrow, EditableNode $body)
    {
        parent::__construct('lambda_expression');
        $this->_attribute_spec = $attribute_spec;
        $this->_async = $async;
        $this->_coroutine = $coroutine;
        $this->_signature = $signature;
        $this->_arrow = $arrow;
        $this->_body = $body;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $attribute_spec = EditableNode::fromJSON($json['lambda_attribute_spec'], $file, $offset, $source);
        $offset += $attribute_spec->getWidth();
        $async = EditableNode::fromJSON($json['lambda_async'], $file, $offset, $source);
        $offset += $async->getWidth();
        $coroutine = EditableNode::fromJSON($json['lambda_coroutine'], $file, $offset, $source);
        $offset += $coroutine->getWidth();
        $signature = EditableNode::fromJSON($json['lambda_signature'], $file, $offset, $source);
        $offset += $signature->getWidth();
        $arrow = EditableNode::fromJSON($json['lambda_arrow'], $file, $offset, $source);
        $offset += $arrow->getWidth();
        $body = EditableNode::fromJSON($json['lambda_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        return new static($attribute_spec, $async, $coroutine, $signature, $arrow, $body);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('attribute_spec' => $this->_attribute_spec, 'async' => $this->_async, 'coroutine' => $this->_coroutine, 'signature' => $this->_signature, 'arrow' => $this->_arrow, 'body' => $this->_body);
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? array() : (array) $parents;
        $parents[] = $this;
        $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
        $async = $this->_async->rewrite($rewriter, $parents);
        $coroutine = $this->_coroutine->rewrite($rewriter, $parents);
        $signature = $this->_signature->rewrite($rewriter, $parents);
        $arrow = $this->_arrow->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        if ($attribute_spec === $this->_attribute_spec && $async === $this->_async && $coroutine === $this->_coroutine && $signature === $this->_signature && $arrow === $this->_arrow && $body === $this->_body) {
            return $this;
        }
        return new static($attribute_spec, $async, $coroutine, $signature, $arrow, $body);
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
        return new static($value, $this->_async, $this->_coroutine, $this->_signature, $this->_arrow, $this->_body);
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
    public function getAsyncUNTYPED()
    {
        return $this->_async;
    }
    /**
     * @return static
     */
    public function withAsync(EditableNode $value)
    {
        if ($value === $this->_async) {
            return $this;
        }
        return new static($this->_attribute_spec, $value, $this->_coroutine, $this->_signature, $this->_arrow, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasAsync()
    {
        return !$this->_async->isMissing();
    }
    /**
     * @return null | AsyncToken
     */
    /**
     * @return null|AsyncToken
     */
    public function getAsync()
    {
        if ($this->_async->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(AsyncToken::class, $this->_async);
    }
    /**
     * @return AsyncToken
     */
    /**
     * @return AsyncToken
     */
    public function getAsyncx()
    {
        return TypeAssert\instance_of(AsyncToken::class, $this->_async);
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
        return new static($this->_attribute_spec, $this->_async, $value, $this->_signature, $this->_arrow, $this->_body);
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
    public function getSignatureUNTYPED()
    {
        return $this->_signature;
    }
    /**
     * @return static
     */
    public function withSignature(EditableNode $value)
    {
        if ($value === $this->_signature) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_async, $this->_coroutine, $value, $this->_arrow, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasSignature()
    {
        return !$this->_signature->isMissing();
    }
    /**
     * @return LambdaSignature | VariableToken
     */
    /**
     * @return EditableNode
     */
    public function getSignature()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_signature);
    }
    /**
     * @return LambdaSignature | VariableToken
     */
    /**
     * @return EditableNode
     */
    public function getSignaturex()
    {
        return $this->getSignature();
    }
    /**
     * @return EditableNode
     */
    public function getArrowUNTYPED()
    {
        return $this->_arrow;
    }
    /**
     * @return static
     */
    public function withArrow(EditableNode $value)
    {
        if ($value === $this->_arrow) {
            return $this;
        }
        return new static($this->_attribute_spec, $this->_async, $this->_coroutine, $this->_signature, $value, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasArrow()
    {
        return !$this->_arrow->isMissing();
    }
    /**
     * @return EqualEqualGreaterThanToken
     */
    /**
     * @return EqualEqualGreaterThanToken
     */
    public function getArrow()
    {
        return TypeAssert\instance_of(EqualEqualGreaterThanToken::class, $this->_arrow);
    }
    /**
     * @return EqualEqualGreaterThanToken
     */
    /**
     * @return EqualEqualGreaterThanToken
     */
    public function getArrowx()
    {
        return $this->getArrow();
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
        return new static($this->_attribute_spec, $this->_async, $this->_coroutine, $this->_signature, $this->_arrow, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return !$this->_body->isMissing();
    }
    /**
     * @return ArrayIntrinsicExpression | BinaryExpression | CastExpression |
     * CompoundStatement | ConditionalExpression | FunctionCallExpression |
     * IsExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression | SubscriptExpression |
     * VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getBody()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_body);
    }
    /**
     * @return ArrayIntrinsicExpression | BinaryExpression | CastExpression |
     * CompoundStatement | ConditionalExpression | FunctionCallExpression |
     * IsExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression | SubscriptExpression |
     * VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

