<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class SimpleInitializer extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_equal;
    /**
     * @var EditableNode
     */
    private $_value;
    public function __construct(EditableNode $equal, EditableNode $value)
    {
        parent::__construct('simple_initializer');
        $this->_equal = $equal;
        $this->_value = $value;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $equal = EditableNode::fromJSON($json['simple_initializer_equal'], $file, $offset, $source);
        $offset += $equal->getWidth();
        $value = EditableNode::fromJSON($json['simple_initializer_value'], $file, $offset, $source);
        $offset += $value->getWidth();
        return new static($equal, $value);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('equal' => $this->_equal, 'value' => $this->_value);
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
        $equal = $this->_equal->rewrite($rewriter, $parents);
        $value = $this->_value->rewrite($rewriter, $parents);
        if ($equal === $this->_equal && $value === $this->_value) {
            return $this;
        }
        return new static($equal, $value);
    }
    /**
     * @return EditableNode
     */
    public function getEqualUNTYPED()
    {
        return $this->_equal;
    }
    /**
     * @return static
     */
    public function withEqual(EditableNode $value)
    {
        if ($value === $this->_equal) {
            return $this;
        }
        return new static($value, $this->_value);
    }
    /**
     * @return bool
     */
    public function hasEqual()
    {
        return !$this->_equal->isMissing();
    }
    /**
     * @return EqualToken
     */
    /**
     * @return EqualToken
     */
    public function getEqual()
    {
        return TypeAssert\instance_of(EqualToken::class, $this->_equal);
    }
    /**
     * @return EqualToken
     */
    /**
     * @return EqualToken
     */
    public function getEqualx()
    {
        return $this->getEqual();
    }
    /**
     * @return EditableNode
     */
    public function getValueUNTYPED()
    {
        return $this->_value;
    }
    /**
     * @return static
     */
    public function withValue(EditableNode $value)
    {
        if ($value === $this->_value) {
            return $this;
        }
        return new static($this->_equal, $value);
    }
    /**
     * @return bool
     */
    public function hasValue()
    {
        return !$this->_value->isMissing();
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
     * CollectionLiteralExpression | ConditionalExpression |
     * DarrayIntrinsicExpression | DictionaryIntrinsicExpression |
     * FunctionCallExpression | KeysetIntrinsicExpression | LambdaExpression |
     * LiteralExpression | ObjectCreationExpression | ParenthesizedExpression |
     * PrefixUnaryExpression | QualifiedName | ScopeResolutionExpression |
     * ShapeExpression | SubscriptExpression | NameToken | TupleExpression |
     * VariableExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression
     * | XHPExpression
     */
    /**
     * @return EditableNode
     */
    public function getValue()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_value);
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
     * CollectionLiteralExpression | ConditionalExpression |
     * DarrayIntrinsicExpression | DictionaryIntrinsicExpression |
     * FunctionCallExpression | KeysetIntrinsicExpression | LambdaExpression |
     * LiteralExpression | ObjectCreationExpression | ParenthesizedExpression |
     * PrefixUnaryExpression | QualifiedName | ScopeResolutionExpression |
     * ShapeExpression | SubscriptExpression | NameToken | TupleExpression |
     * VariableExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression
     * | XHPExpression
     */
    /**
     * @return EditableNode
     */
    public function getValuex()
    {
        return $this->getValue();
    }
}

