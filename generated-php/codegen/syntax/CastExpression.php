<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class CastExpression extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_type;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_operand;
    public function __construct(EditableNode $left_paren, EditableNode $type, EditableNode $right_paren, EditableNode $operand)
    {
        parent::__construct('cast_expression');
        $this->_left_paren = $left_paren;
        $this->_type = $type;
        $this->_right_paren = $right_paren;
        $this->_operand = $operand;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_paren = EditableNode::fromJSON($json['cast_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $type = EditableNode::fromJSON($json['cast_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $right_paren = EditableNode::fromJSON($json['cast_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $operand = EditableNode::fromJSON($json['cast_operand'], $file, $offset, $source);
        $offset += $operand->getWidth();
        return new static($left_paren, $type, $right_paren, $operand);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('left_paren' => $this->_left_paren, 'type' => $this->_type, 'right_paren' => $this->_right_paren, 'operand' => $this->_operand);
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $operand = $this->_operand->rewrite($rewriter, $parents);
        if ($left_paren === $this->_left_paren && $type === $this->_type && $right_paren === $this->_right_paren && $operand === $this->_operand) {
            return $this;
        }
        return new static($left_paren, $type, $right_paren, $operand);
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
        return new static($value, $this->_type, $this->_right_paren, $this->_operand);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return !$this->_left_paren->isMissing();
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
        return new static($this->_left_paren, $value, $this->_right_paren, $this->_operand);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return ArrayToken | BinaryToken | BoolToken | BooleanToken | DoubleToken
     * | FloatToken | IntToken | IntegerToken | ObjectToken | RealToken |
     * StringToken | UnsetToken
     */
    /**
     * @return EditableToken
     */
    public function getType()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_type);
    }
    /**
     * @return ArrayToken | BinaryToken | BoolToken | BooleanToken | DoubleToken
     * | FloatToken | IntToken | IntegerToken | ObjectToken | RealToken |
     * StringToken | UnsetToken
     */
    /**
     * @return EditableToken
     */
    public function getTypex()
    {
        return $this->getType();
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
        return new static($this->_left_paren, $this->_type, $value, $this->_operand);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return !$this->_right_paren->isMissing();
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
     * @return EditableNode
     */
    public function getOperandUNTYPED()
    {
        return $this->_operand;
    }
    /**
     * @return static
     */
    public function withOperand(EditableNode $value)
    {
        if ($value === $this->_operand) {
            return $this;
        }
        return new static($this->_left_paren, $this->_type, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasOperand()
    {
        return !$this->_operand->isMissing();
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | CastExpression | CollectionLiteralExpression |
     * DictionaryIntrinsicExpression | FunctionCallExpression |
     * KeysetIntrinsicExpression | LiteralExpression | MemberSelectionExpression
     * | ObjectCreationExpression | ParenthesizedExpression |
     * PostfixUnaryExpression | PrefixUnaryExpression | ScopeResolutionExpression
     * | SubscriptExpression | NameToken | VariableExpression |
     * VectorIntrinsicExpression | XHPExpression
     */
    /**
     * @return EditableNode
     */
    public function getOperand()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_operand);
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | CastExpression | CollectionLiteralExpression |
     * DictionaryIntrinsicExpression | FunctionCallExpression |
     * KeysetIntrinsicExpression | LiteralExpression | MemberSelectionExpression
     * | ObjectCreationExpression | ParenthesizedExpression |
     * PostfixUnaryExpression | PrefixUnaryExpression | ScopeResolutionExpression
     * | SubscriptExpression | NameToken | VariableExpression |
     * VectorIntrinsicExpression | XHPExpression
     */
    /**
     * @return EditableNode
     */
    public function getOperandx()
    {
        return $this->getOperand();
    }
}

