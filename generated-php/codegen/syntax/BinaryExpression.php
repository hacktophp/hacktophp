<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<edda522f672cc55db93f4bf56d2afc89>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class BinaryExpression extends Node implements IHasOperator, ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'binary_expression';
    /**
     * @var IExpression
     */
    private $_left_operand;
    /**
     * @var Token
     */
    private $_operator;
    /**
     * @var IExpression
     */
    private $_right_operand;
    public function __construct(IExpression $left_operand, Token $operator, IExpression $right_operand, ?array $source_ref = null)
    {
        $this->_left_operand = $left_operand;
        $this->_operator = $operator;
        $this->_right_operand = $right_operand;
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
        $left_operand = Node::fromJSON($json['binary_left_operand'], $file, $offset, $source, 'IExpression');
        $left_operand = $left_operand !== null ? $left_operand : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $left_operand->getWidth();
        $operator = Node::fromJSON($json['binary_operator'], $file, $offset, $source, 'Token');
        $operator = $operator !== null ? $operator : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $operator->getWidth();
        $right_operand = Node::fromJSON($json['binary_right_operand'], $file, $offset, $source, 'IExpression');
        $right_operand = $right_operand !== null ? $right_operand : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $right_operand->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($left_operand, $operator, $right_operand, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['left_operand' => $this->_left_operand, 'operator' => $this->_operator, 'right_operand' => $this->_right_operand]);
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
        $left_operand = $rewriter($this->_left_operand, $parents);
        $operator = $rewriter($this->_operator, $parents);
        $right_operand = $rewriter($this->_right_operand, $parents);
        if ($left_operand === $this->_left_operand && $operator === $this->_operator && $right_operand === $this->_right_operand) {
            return $this;
        }
        return new static($left_operand, $operator, $right_operand);
    }
    /**
     * @return null|Node
     */
    public function getLeftOperandUNTYPED()
    {
        return $this->_left_operand;
    }
    /**
     * @return static
     */
    public function withLeftOperand(IExpression $value)
    {
        if ($value === $this->_left_operand) {
            return $this;
        }
        return new static($value, $this->_operator, $this->_right_operand);
    }
    /**
     * @return bool
     */
    public function hasLeftOperand()
    {
        return $this->_left_operand !== null;
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression | AsExpression
     * | AwaitableCreationExpression | BinaryExpression | CastExpression |
     * CollectionLiteralExpression | DarrayIntrinsicExpression |
     * DictionaryIntrinsicExpression | FunctionCallExpression | IsExpression |
     * IssetExpression | KeysetIntrinsicExpression | ListExpression |
     * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PipeVariableExpression | PostfixUnaryExpression
     * | PrefixUnaryExpression | QualifiedName | ScopeResolutionExpression |
     * SubscriptExpression | NameToken | VariableExpression |
     * VarrayIntrinsicExpression | VectorIntrinsicExpression
     */
    /**
     * @return IExpression
     */
    public function getLeftOperand()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_left_operand);
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression | AsExpression
     * | AwaitableCreationExpression | BinaryExpression | CastExpression |
     * CollectionLiteralExpression | DarrayIntrinsicExpression |
     * DictionaryIntrinsicExpression | FunctionCallExpression | IsExpression |
     * IssetExpression | KeysetIntrinsicExpression | ListExpression |
     * LiteralExpression | MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PipeVariableExpression | PostfixUnaryExpression
     * | PrefixUnaryExpression | QualifiedName | ScopeResolutionExpression |
     * SubscriptExpression | NameToken | VariableExpression |
     * VarrayIntrinsicExpression | VectorIntrinsicExpression
     */
    /**
     * @return IExpression
     */
    public function getLeftOperandx()
    {
        return $this->getLeftOperand();
    }
    /**
     * @return null|Node
     */
    public function getOperatorUNTYPED()
    {
        return $this->_operator;
    }
    /**
     * @return static
     */
    public function withOperator(Token $value)
    {
        if ($value === $this->_operator) {
            return $this;
        }
        return new static($this->_left_operand, $value, $this->_right_operand);
    }
    /**
     * @return bool
     */
    public function hasOperator()
    {
        return $this->_operator !== null;
    }
    /**
     * @return ExclamationEqualToken | ExclamationEqualEqualToken | PercentToken
     * | PercentEqualToken | AmpersandToken | AmpersandAmpersandToken |
     * AmpersandEqualToken | StarToken | StarStarToken | StarStarEqualToken |
     * StarEqualToken | PlusToken | PlusEqualToken | MinusToken | MinusEqualToken
     * | DotToken | DotEqualToken | SlashToken | SlashEqualToken | LessThanToken
     * | LessThanLessThanToken | LessThanLessThanEqualToken | LessThanEqualToken
     * | LessThanEqualGreaterThanToken | EqualToken | EqualEqualToken |
     * EqualEqualEqualToken | GreaterThanToken | GreaterThanEqualToken |
     * GreaterThanGreaterThanToken | GreaterThanGreaterThanEqualToken |
     * QuestionColonToken | QuestionQuestionToken | QuestionQuestionEqualToken |
     * CaratToken | CaratEqualToken | BarToken | BarEqualToken |
     * BarGreaterThanToken | BarBarToken
     */
    /**
     * @return Token
     */
    public function getOperator()
    {
        return TypeAssert\instance_of(Token::class, $this->_operator);
    }
    /**
     * @return ExclamationEqualToken | ExclamationEqualEqualToken | PercentToken
     * | PercentEqualToken | AmpersandToken | AmpersandAmpersandToken |
     * AmpersandEqualToken | StarToken | StarStarToken | StarStarEqualToken |
     * StarEqualToken | PlusToken | PlusEqualToken | MinusToken | MinusEqualToken
     * | DotToken | DotEqualToken | SlashToken | SlashEqualToken | LessThanToken
     * | LessThanLessThanToken | LessThanLessThanEqualToken | LessThanEqualToken
     * | LessThanEqualGreaterThanToken | EqualToken | EqualEqualToken |
     * EqualEqualEqualToken | GreaterThanToken | GreaterThanEqualToken |
     * GreaterThanGreaterThanToken | GreaterThanGreaterThanEqualToken |
     * QuestionColonToken | QuestionQuestionToken | QuestionQuestionEqualToken |
     * CaratToken | CaratEqualToken | BarToken | BarEqualToken |
     * BarGreaterThanToken | BarBarToken
     */
    /**
     * @return Token
     */
    public function getOperatorx()
    {
        return $this->getOperator();
    }
    /**
     * @return null|Node
     */
    public function getRightOperandUNTYPED()
    {
        return $this->_right_operand;
    }
    /**
     * @return static
     */
    public function withRightOperand(IExpression $value)
    {
        if ($value === $this->_right_operand) {
            return $this;
        }
        return new static($this->_left_operand, $this->_operator, $value);
    }
    /**
     * @return bool
     */
    public function hasRightOperand()
    {
        return $this->_right_operand !== null;
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | AsExpression | AwaitableCreationExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * ConditionalExpression | DarrayIntrinsicExpression |
     * DictionaryIntrinsicExpression | EvalExpression | FunctionCallExpression |
     * InclusionExpression | IsExpression | IssetExpression |
     * KeysetIntrinsicExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | NullableAsExpression |
     * ObjectCreationExpression | ParenthesizedExpression |
     * PipeVariableExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * PrefixedStringExpression | QualifiedName | RecordCreationExpression |
     * SafeMemberSelectionExpression | ScopeResolutionExpression |
     * ShapeExpression | SubscriptExpression | NameToken | TupleExpression |
     * VariableExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression
     * | XHPExpression | YieldExpression | YieldFromExpression
     */
    /**
     * @return IExpression
     */
    public function getRightOperand()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_right_operand);
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | AsExpression | AwaitableCreationExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * ConditionalExpression | DarrayIntrinsicExpression |
     * DictionaryIntrinsicExpression | EvalExpression | FunctionCallExpression |
     * InclusionExpression | IsExpression | IssetExpression |
     * KeysetIntrinsicExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | NullableAsExpression |
     * ObjectCreationExpression | ParenthesizedExpression |
     * PipeVariableExpression | PostfixUnaryExpression | PrefixUnaryExpression |
     * PrefixedStringExpression | QualifiedName | RecordCreationExpression |
     * SafeMemberSelectionExpression | ScopeResolutionExpression |
     * ShapeExpression | SubscriptExpression | NameToken | TupleExpression |
     * VariableExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression
     * | XHPExpression | YieldExpression | YieldFromExpression
     */
    /**
     * @return IExpression
     */
    public function getRightOperandx()
    {
        return $this->getRightOperand();
    }
}

