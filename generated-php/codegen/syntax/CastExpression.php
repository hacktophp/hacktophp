<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ebcdbaeb3af23fd164e79b63b0fe635b>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class CastExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'cast_expression';
    /**
     * @var LeftParenToken
     */
    private $_left_paren;
    /**
     * @var Token
     */
    private $_type;
    /**
     * @var RightParenToken
     */
    private $_right_paren;
    /**
     * @var IExpression
     */
    private $_operand;
    public function __construct(LeftParenToken $left_paren, Token $type, RightParenToken $right_paren, IExpression $operand, ?__Private\SourceRef $source_ref = null)
    {
        $this->_left_paren = $left_paren;
        $this->_type = $type;
        $this->_right_paren = $right_paren;
        $this->_operand = $operand;
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
        $left_paren = Node::fromJSON($json['cast_left_paren'], $file, $offset, $source, 'LeftParenToken');
        $left_paren = $left_paren !== null ? $left_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_paren->getWidth();
        $type = Node::fromJSON($json['cast_type'], $file, $offset, $source, 'Token');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $right_paren = Node::fromJSON($json['cast_right_paren'], $file, $offset, $source, 'RightParenToken');
        $right_paren = $right_paren !== null ? $right_paren : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_paren->getWidth();
        $operand = Node::fromJSON($json['cast_operand'], $file, $offset, $source, 'IExpression');
        $operand = $operand !== null ? $operand : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operand->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_paren, $type, $right_paren, $operand, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_paren' => $this->_left_paren, 'type' => $this->_type, 'right_paren' => $this->_right_paren, 'operand' => $this->_operand]);
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
        $left_paren = $rewriter($this->_left_paren, $parents);
        $type = $rewriter($this->_type, $parents);
        $right_paren = $rewriter($this->_right_paren, $parents);
        $operand = $rewriter($this->_operand, $parents);
        if ($left_paren === $this->_left_paren && $type === $this->_type && $right_paren === $this->_right_paren && $operand === $this->_operand) {
            return $this;
        }
        return new static($left_paren, $type, $right_paren, $operand);
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
        return new static($value, $this->_type, $this->_right_paren, $this->_operand);
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
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(Token $value)
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
        return $this->_type !== null;
    }
    /**
     * @return ArrayToken | BinaryToken | BoolToken | BooleanToken | DoubleToken
     * | FloatToken | IntToken | IntegerToken | ObjectToken | StringToken |
     * UnsetToken
     */
    /**
     * @return Token
     */
    public function getType()
    {
        return TypeAssert\instance_of(Token::class, $this->_type);
    }
    /**
     * @return ArrayToken | BinaryToken | BoolToken | BooleanToken | DoubleToken
     * | FloatToken | IntToken | IntegerToken | ObjectToken | StringToken |
     * UnsetToken
     */
    /**
     * @return Token
     */
    public function getTypex()
    {
        return $this->getType();
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
        return new static($this->_left_paren, $this->_type, $value, $this->_operand);
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
    public function getOperandUNTYPED()
    {
        return $this->_operand;
    }
    /**
     * @return static
     */
    public function withOperand(IExpression $value)
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
        return $this->_operand !== null;
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * CollectionLiteralExpression | DictionaryIntrinsicExpression |
     * FunctionCallExpression | KeysetIntrinsicExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression | XHPExpression
     */
    /**
     * @return IExpression
     */
    public function getOperand()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_operand);
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * CollectionLiteralExpression | DictionaryIntrinsicExpression |
     * FunctionCallExpression | KeysetIntrinsicExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression | XHPExpression
     */
    /**
     * @return IExpression
     */
    public function getOperandx()
    {
        return $this->getOperand();
    }
}

