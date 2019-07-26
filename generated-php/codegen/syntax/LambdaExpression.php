<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<324c86c324f7cd11c19bd6aaa000cff3>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class LambdaExpression extends Node implements IHasFunctionBody, ILambdaBody, IHasAttributeSpec, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'lambda_expression';
    /**
     * @var null|OldAttributeSpecification
     */
    private $_attribute_spec;
    /**
     * @var null|AsyncToken
     */
    private $_async;
    /**
     * @var null|Node
     */
    private $_coroutine;
    /**
     * @var Node
     */
    private $_signature;
    /**
     * @var EqualEqualGreaterThanToken
     */
    private $_arrow;
    /**
     * @var ILambdaBody
     */
    private $_body;
    public function __construct(?OldAttributeSpecification $attribute_spec, ?AsyncToken $async, ?Node $coroutine, Node $signature, EqualEqualGreaterThanToken $arrow, ILambdaBody $body, ?array $source_ref = null)
    {
        $this->_attribute_spec = $attribute_spec;
        $this->_async = $async;
        $this->_coroutine = $coroutine;
        $this->_signature = $signature;
        $this->_arrow = $arrow;
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
        $attribute_spec = Node::fromJSON($json['lambda_attribute_spec'], $file, $offset, $source, 'OldAttributeSpecification');
        $offset += (($__tmp1__ = $attribute_spec) !== null ? $__tmp1__->getWidth() : null) ?? 0;
        $async = Node::fromJSON($json['lambda_async'], $file, $offset, $source, 'AsyncToken');
        $offset += (($__tmp2__ = $async) !== null ? $__tmp2__->getWidth() : null) ?? 0;
        $coroutine = Node::fromJSON($json['lambda_coroutine'], $file, $offset, $source, 'Node');
        $offset += (($__tmp3__ = $coroutine) !== null ? $__tmp3__->getWidth() : null) ?? 0;
        $signature = Node::fromJSON($json['lambda_signature'], $file, $offset, $source, 'Node');
        $signature = $signature !== null ? $signature : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $signature->getWidth();
        $arrow = Node::fromJSON($json['lambda_arrow'], $file, $offset, $source, 'EqualEqualGreaterThanToken');
        $arrow = $arrow !== null ? $arrow : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $arrow->getWidth();
        $body = Node::fromJSON($json['lambda_body'], $file, $offset, $source, 'ILambdaBody');
        $body = $body !== null ? $body : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $body->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($attribute_spec, $async, $coroutine, $signature, $arrow, $body, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['attribute_spec' => $this->_attribute_spec, 'async' => $this->_async, 'coroutine' => $this->_coroutine, 'signature' => $this->_signature, 'arrow' => $this->_arrow, 'body' => $this->_body]);
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
        $async = $this->_async === null ? null : $rewriter($this->_async, $parents);
        $coroutine = $this->_coroutine === null ? null : $rewriter($this->_coroutine, $parents);
        $signature = $rewriter($this->_signature, $parents);
        $arrow = $rewriter($this->_arrow, $parents);
        $body = $rewriter($this->_body, $parents);
        if ($attribute_spec === $this->_attribute_spec && $async === $this->_async && $coroutine === $this->_coroutine && $signature === $this->_signature && $arrow === $this->_arrow && $body === $this->_body) {
            return $this;
        }
        return new static($attribute_spec, $async, $coroutine, $signature, $arrow, $body);
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
        return new static($value, $this->_async, $this->_coroutine, $this->_signature, $this->_arrow, $this->_body);
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
    public function getAsyncUNTYPED()
    {
        return $this->_async;
    }
    /**
     * @return static
     */
    public function withAsync(?AsyncToken $value)
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
        return $this->_async !== null;
    }
    /**
     * @return null | AsyncToken
     */
    /**
     * @return null|AsyncToken
     */
    public function getAsync()
    {
        return $this->_async;
    }
    /**
     * @return AsyncToken
     */
    /**
     * @return AsyncToken
     */
    public function getAsyncx()
    {
        return TypeAssert\not_null($this->getAsync());
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
        return new static($this->_attribute_spec, $this->_async, $value, $this->_signature, $this->_arrow, $this->_body);
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
    public function getSignatureUNTYPED()
    {
        return $this->_signature;
    }
    /**
     * @return static
     */
    public function withSignature(Node $value)
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
        return $this->_signature !== null;
    }
    /**
     * @return LambdaSignature | VariableToken
     */
    /**
     * @return Node
     */
    public function getSignature()
    {
        return $this->_signature;
    }
    /**
     * @return LambdaSignature | VariableToken
     */
    /**
     * @return Node
     */
    public function getSignaturex()
    {
        return $this->getSignature();
    }
    /**
     * @return null|Node
     */
    public function getArrowUNTYPED()
    {
        return $this->_arrow;
    }
    /**
     * @return static
     */
    public function withArrow(EqualEqualGreaterThanToken $value)
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
        return $this->_arrow !== null;
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
     * @return null|Node
     */
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(ILambdaBody $value)
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
        return $this->_body !== null;
    }
    /**
     * @return AnonymousFunction | ArrayIntrinsicExpression | AsExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * CompoundStatement | ConditionalExpression | FunctionCallExpression |
     * IsExpression | KeysetIntrinsicExpression | LambdaExpression |
     * LiteralExpression | MemberSelectionExpression | NullableAsExpression |
     * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
     * | SubscriptExpression | VariableExpression
     */
    /**
     * @return ILambdaBody
     */
    public function getBody()
    {
        return TypeAssert\instance_of(ILambdaBody::class, $this->_body);
    }
    /**
     * @return AnonymousFunction | ArrayIntrinsicExpression | AsExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * CompoundStatement | ConditionalExpression | FunctionCallExpression |
     * IsExpression | KeysetIntrinsicExpression | LambdaExpression |
     * LiteralExpression | MemberSelectionExpression | NullableAsExpression |
     * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
     * | SubscriptExpression | VariableExpression
     */
    /**
     * @return ILambdaBody
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

