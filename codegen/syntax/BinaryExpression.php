<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4b64b7c045c3c5337ac53972b559cff1>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class BinaryExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_left_operand;
  /**
   * @var EditableNode
   */
  private $_operator;
  /**
   * @var EditableNode
   */
  private $_right_operand;

  public function __construct(
    EditableNode $left_operand,
    EditableNode $operator,
    EditableNode $right_operand
  ) {
    parent::__construct('binary_expression');
    $this->_left_operand = $left_operand;
    $this->_operator = $operator;
    $this->_right_operand = $right_operand;
  }

  /**
   * @param array<string, mixed> $json
   * @return static
   */
  public static function fromJSON(
    array $json,
    string $file,
    int $offset,
    string $source
  ) {
    $left_operand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['binary_left_operand'],
      $file,
      $offset,
      $source
    );
    $offset += $left_operand->getWidth();
    $operator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['binary_operator'],
      $file,
      $offset,
      $source
    );
    $offset += $operator->getWidth();
    $right_operand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['binary_right_operand'],
      $file,
      $offset,
      $source
    );
    $offset += $right_operand->getWidth();
    return new static($left_operand, $operator, $right_operand);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'left_operand' => $this->_left_operand,
      'operator' => $this->_operator,
      'right_operand' => $this->_right_operand,
    ];
  }

  /**
   * @psalm-param (\Closure(EditableNode, ?array<int, EditableNode>): EditableNode) $rewriter
   * @param ?array<int, EditableNode> $parents
   * @return static
   */
  public function rewriteDescendants(
    \Closure $rewriter,
    ?array $parents = null
  ) {
    $parents = $parents === null ? [] : vec($parents);
    $parents[] = $this;
    $left_operand = $this->_left_operand->rewrite($rewriter, $parents);
    $operator = $this->_operator->rewrite($rewriter, $parents);
    $right_operand = $this->_right_operand->rewrite($rewriter, $parents);
    if (
      $left_operand === $this->_left_operand &&
      $operator === $this->_operator &&
      $right_operand === $this->_right_operand
    ) {
      return $this;
    }
    return new static($left_operand, $operator, $right_operand);
  }

  public function getLeftOperandUNTYPED(): EditableNode {
    return $this->_left_operand;
  }

  /**
   * @return static
   */
  public function withLeftOperand(EditableNode $value) {
    if ($value === $this->_left_operand) {
      return $this;
    }
    return new static($value, $this->_operator, $this->_right_operand);
  }

  public function hasLeftOperand(): bool {
    return !$this->_left_operand->isMissing();
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
   * CollectionLiteralExpression | DarrayIntrinsicExpression |
   * DictionaryIntrinsicExpression | EmptyExpression | FunctionCallExpression |
   * InstanceofExpression | IssetExpression | KeysetIntrinsicExpression |
   * ListExpression | LiteralExpression | MemberSelectionExpression |
   * ObjectCreationExpression | ParenthesizedExpression |
   * PipeVariableExpression | PostfixUnaryExpression | PrefixUnaryExpression |
   * QualifiedName | ScopeResolutionExpression | SubscriptExpression |
   * LessThanToken | NameToken | RightBraceToken | VariableExpression |
   * VarrayIntrinsicExpression | VectorIntrinsicExpression | XHPExpression
   */
  public function getLeftOperand(): EditableNode {
    \assert($this->_left_operand instanceof EditableNode);
    return $this->_left_operand;
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
   * CollectionLiteralExpression | DarrayIntrinsicExpression |
   * DictionaryIntrinsicExpression | EmptyExpression | FunctionCallExpression |
   * InstanceofExpression | IssetExpression | KeysetIntrinsicExpression |
   * ListExpression | LiteralExpression | MemberSelectionExpression |
   * ObjectCreationExpression | ParenthesizedExpression |
   * PipeVariableExpression | PostfixUnaryExpression | PrefixUnaryExpression |
   * QualifiedName | ScopeResolutionExpression | SubscriptExpression |
   * LessThanToken | NameToken | RightBraceToken | VariableExpression |
   * VarrayIntrinsicExpression | VectorIntrinsicExpression | XHPExpression
   */
  public function getLeftOperandx(): EditableNode {
    return $this->getLeftOperand();
  }

  public function getOperatorUNTYPED(): EditableNode {
    return $this->_operator;
  }

  /**
   * @return static
   */
  public function withOperator(EditableNode $value) {
    if ($value === $this->_operator) {
      return $this;
    }
    return new static($this->_left_operand, $value, $this->_right_operand);
  }

  public function hasOperator(): bool {
    return !$this->_operator->isMissing();
  }

  /**
   * @return ExclamationEqualToken | ExclamationEqualEqualToken | PercentToken
   * | PercentEqualToken | AmpersandToken | AmpersandAmpersandToken |
   * AmpersandEqualToken | StarToken | StarStarToken | StarStarEqualToken |
   * StarEqualToken | PlusToken | PlusEqualToken | MinusToken | MinusEqualToken
   * | DotToken | DotEqualToken | SlashToken | SlashEqualToken | LessThanToken
   * | LessThanLessThanToken | LessThanLessThanEqualToken | LessThanEqualToken
   * | LessThanEqualGreaterThanToken | LessThanGreaterThanToken | EqualToken |
   * EqualEqualToken | EqualEqualEqualToken | GreaterThanToken |
   * GreaterThanEqualToken | GreaterThanGreaterThanToken |
   * GreaterThanGreaterThanEqualToken | QuestionColonToken |
   * QuestionQuestionToken | QuestionQuestionEqualToken | CaratToken |
   * CaratEqualToken | AndToken | OrToken | XorToken | BarToken | BarEqualToken
   * | BarGreaterThanToken | BarBarToken
   */
  public function getOperator(): EditableToken {
    \assert($this->_operator instanceof EditableToken);
    return $this->_operator;
  }

  /**
   * @return ExclamationEqualToken | ExclamationEqualEqualToken | PercentToken
   * | PercentEqualToken | AmpersandToken | AmpersandAmpersandToken |
   * AmpersandEqualToken | StarToken | StarStarToken | StarStarEqualToken |
   * StarEqualToken | PlusToken | PlusEqualToken | MinusToken | MinusEqualToken
   * | DotToken | DotEqualToken | SlashToken | SlashEqualToken | LessThanToken
   * | LessThanLessThanToken | LessThanLessThanEqualToken | LessThanEqualToken
   * | LessThanEqualGreaterThanToken | LessThanGreaterThanToken | EqualToken |
   * EqualEqualToken | EqualEqualEqualToken | GreaterThanToken |
   * GreaterThanEqualToken | GreaterThanGreaterThanToken |
   * GreaterThanGreaterThanEqualToken | QuestionColonToken |
   * QuestionQuestionToken | QuestionQuestionEqualToken | CaratToken |
   * CaratEqualToken | AndToken | OrToken | XorToken | BarToken | BarEqualToken
   * | BarGreaterThanToken | BarBarToken
   */
  public function getOperatorx(): EditableToken {
    return $this->getOperator();
  }

  public function getRightOperandUNTYPED(): EditableNode {
    return $this->_right_operand;
  }

  /**
   * @return static
   */
  public function withRightOperand(EditableNode $value) {
    if ($value === $this->_right_operand) {
      return $this;
    }
    return new static($this->_left_operand, $this->_operator, $value);
  }

  public function hasRightOperand(): bool {
    return !$this->_right_operand->isMissing();
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | AsExpression | AwaitableCreationExpression |
   * BinaryExpression | CastExpression | CollectionLiteralExpression |
   * ConditionalExpression | DarrayIntrinsicExpression |
   * DictionaryIntrinsicExpression | EmptyExpression | EvalExpression |
   * FunctionCallExpression | FunctionCallWithTypeArgumentsExpression |
   * InclusionExpression | InstanceofExpression | IssetExpression |
   * KeysetIntrinsicExpression | LambdaExpression | LiteralExpression |
   * MemberSelectionExpression | Missing | NullableAsExpression |
   * ObjectCreationExpression | ParenthesizedExpression | Php7AnonymousFunction
   * | PipeVariableExpression | PostfixUnaryExpression | PrefixUnaryExpression
   * | PrefixedStringExpression | QualifiedName | SafeMemberSelectionExpression
   * | ScopeResolutionExpression | ShapeExpression | SubscriptExpression |
   * SemicolonToken | QuestionToken | EndOfFileToken | NameToken |
   * TupleExpression | VariableExpression | VarrayIntrinsicExpression |
   * VectorIntrinsicExpression | XHPExpression | YieldExpression |
   * YieldFromExpression
   */
  public function getRightOperand(): ?EditableNode {
    if ($this->_right_operand->isMissing()) {
      return null;
    }
    \assert($this->_right_operand instanceof EditableNode);
    return $this->_right_operand;
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | AsExpression | AwaitableCreationExpression |
   * BinaryExpression | CastExpression | CollectionLiteralExpression |
   * ConditionalExpression | DarrayIntrinsicExpression |
   * DictionaryIntrinsicExpression | EmptyExpression | EvalExpression |
   * FunctionCallExpression | FunctionCallWithTypeArgumentsExpression |
   * InclusionExpression | InstanceofExpression | IssetExpression |
   * KeysetIntrinsicExpression | LambdaExpression | LiteralExpression |
   * MemberSelectionExpression | NullableAsExpression |
   * ObjectCreationExpression | ParenthesizedExpression | Php7AnonymousFunction
   * | PipeVariableExpression | PostfixUnaryExpression | PrefixUnaryExpression
   * | PrefixedStringExpression | QualifiedName | SafeMemberSelectionExpression
   * | ScopeResolutionExpression | ShapeExpression | SubscriptExpression |
   * SemicolonToken | QuestionToken | EndOfFileToken | NameToken |
   * TupleExpression | VariableExpression | VarrayIntrinsicExpression |
   * VectorIntrinsicExpression | XHPExpression | YieldExpression |
   * YieldFromExpression
   */
  public function getRightOperandx(): EditableNode {
    \assert($this->_right_operand instanceof EditableNode);
    return $this->_right_operand;
  }
}
