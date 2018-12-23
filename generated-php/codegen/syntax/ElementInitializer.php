<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ElementInitializer extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_key;
    /**
     * @var EditableNode
     */
    private $_arrow;
    /**
     * @var EditableNode
     */
    private $_value;
    public function __construct(EditableNode $key, EditableNode $arrow, EditableNode $value)
    {
        parent::__construct('element_initializer');
        $this->_key = $key;
        $this->_arrow = $arrow;
        $this->_value = $value;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $key = EditableNode::fromJSON($json['element_key'], $file, $offset, $source);
        $offset += $key->getWidth();
        $arrow = EditableNode::fromJSON($json['element_arrow'], $file, $offset, $source);
        $offset += $arrow->getWidth();
        $value = EditableNode::fromJSON($json['element_value'], $file, $offset, $source);
        $offset += $value->getWidth();
        return new static($key, $arrow, $value);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('key' => $this->_key, 'arrow' => $this->_arrow, 'value' => $this->_value);
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
        $key = $this->_key->rewrite($rewriter, $parents);
        $arrow = $this->_arrow->rewrite($rewriter, $parents);
        $value = $this->_value->rewrite($rewriter, $parents);
        if ($key === $this->_key && $arrow === $this->_arrow && $value === $this->_value) {
            return $this;
        }
        return new static($key, $arrow, $value);
    }
    /**
     * @return EditableNode
     */
    public function getKeyUNTYPED()
    {
        return $this->_key;
    }
    /**
     * @return static
     */
    public function withKey(EditableNode $value)
    {
        if ($value === $this->_key) {
            return $this;
        }
        return new static($value, $this->_arrow, $this->_value);
    }
    /**
     * @return bool
     */
    public function hasKey()
    {
        return !$this->_key->isMissing();
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
     * CollectionLiteralExpression | DictionaryIntrinsicExpression |
     * FunctionCallExpression | KeysetIntrinsicExpression | LiteralExpression |
     * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
     * | QualifiedName | ScopeResolutionExpression | NameToken |
     * VariableExpression | VectorIntrinsicExpression
     */
    /**
     * @return EditableNode
     */
    public function getKey()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_key);
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
     * CollectionLiteralExpression | DictionaryIntrinsicExpression |
     * FunctionCallExpression | KeysetIntrinsicExpression | LiteralExpression |
     * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
     * | QualifiedName | ScopeResolutionExpression | NameToken |
     * VariableExpression | VectorIntrinsicExpression
     */
    /**
     * @return EditableNode
     */
    public function getKeyx()
    {
        return $this->getKey();
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
        return new static($this->_key, $value, $this->_value);
    }
    /**
     * @return bool
     */
    public function hasArrow()
    {
        return !$this->_arrow->isMissing();
    }
    /**
     * @return EqualGreaterThanToken
     */
    /**
     * @return EqualGreaterThanToken
     */
    public function getArrow()
    {
        return TypeAssert\instance_of(EqualGreaterThanToken::class, $this->_arrow);
    }
    /**
     * @return EqualGreaterThanToken
     */
    /**
     * @return EqualGreaterThanToken
     */
    public function getArrowx()
    {
        return $this->getArrow();
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
        return new static($this->_key, $this->_arrow, $value);
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
     * FunctionCallExpression | IssetExpression | KeysetIntrinsicExpression |
     * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression | QualifiedName |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * TupleExpression | VariableExpression | VarrayIntrinsicExpression |
     * VectorIntrinsicExpression
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
     * FunctionCallExpression | IssetExpression | KeysetIntrinsicExpression |
     * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression | QualifiedName |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * TupleExpression | VariableExpression | VarrayIntrinsicExpression |
     * VectorIntrinsicExpression
     */
    /**
     * @return EditableNode
     */
    public function getValuex()
    {
        return $this->getValue();
    }
}

