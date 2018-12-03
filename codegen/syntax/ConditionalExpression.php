<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e1a664961e0c7f2a0a56f83257c46396>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class ConditionalExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_test;
  /**
   * @var EditableNode
   */
  private $_question;
  /**
   * @var EditableNode
   */
  private $_consequence;
  /**
   * @var EditableNode
   */
  private $_colon;
  /**
   * @var EditableNode
   */
  private $_alternative;

  public function __construct(
    EditableNode $test,
    EditableNode $question,
    EditableNode $consequence,
    EditableNode $colon,
    EditableNode $alternative
  ) {
    parent::__construct('conditional_expression');
    $this->_test = $test;
    $this->_question = $question;
    $this->_consequence = $consequence;
    $this->_colon = $colon;
    $this->_alternative = $alternative;
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
    $test = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['conditional_test'],
      $file,
      $offset,
      $source
    );
    $offset += $test->getWidth();
    $question = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['conditional_question'],
      $file,
      $offset,
      $source
    );
    $offset += $question->getWidth();
    $consequence = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['conditional_consequence'],
      $file,
      $offset,
      $source
    );
    $offset += $consequence->getWidth();
    $colon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['conditional_colon'],
      $file,
      $offset,
      $source
    );
    $offset += $colon->getWidth();
    $alternative = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['conditional_alternative'],
      $file,
      $offset,
      $source
    );
    $offset += $alternative->getWidth();
    return new static($test, $question, $consequence, $colon, $alternative);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'test' => $this->_test,
      'question' => $this->_question,
      'consequence' => $this->_consequence,
      'colon' => $this->_colon,
      'alternative' => $this->_alternative,
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
    $test = $this->_test->rewrite($rewriter, $parents);
    $question = $this->_question->rewrite($rewriter, $parents);
    $consequence = $this->_consequence->rewrite($rewriter, $parents);
    $colon = $this->_colon->rewrite($rewriter, $parents);
    $alternative = $this->_alternative->rewrite($rewriter, $parents);
    if (
      $test === $this->_test &&
      $question === $this->_question &&
      $consequence === $this->_consequence &&
      $colon === $this->_colon &&
      $alternative === $this->_alternative
    ) {
      return $this;
    }
    return new static($test, $question, $consequence, $colon, $alternative);
  }

  public function getTestUNTYPED(): EditableNode {
    return $this->_test;
  }

  /**
   * @return static
   */
  public function withTest(EditableNode $value) {
    if ($value === $this->_test) {
      return $this;
    }
    return new static(
      $value,
      $this->_question,
      $this->_consequence,
      $this->_colon,
      $this->_alternative
    );
  }

  public function hasTest(): bool {
    return !$this->_test->isMissing();
  }

  /**
   * @returns BinaryExpression | ConditionalExpression | EmptyExpression |
   * FunctionCallExpression | InstanceofExpression | IsExpression |
   * IssetExpression | LiteralExpression | MemberSelectionExpression |
   * ParenthesizedExpression | PipeVariableExpression | PrefixUnaryExpression |
   * ScopeResolutionExpression | SubscriptExpression | ColonToken |
   * LessThanToken | NameToken | VariableExpression
   */
  public function getTest(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_test);
  }

  /**
   * @returns BinaryExpression | ConditionalExpression | EmptyExpression |
   * FunctionCallExpression | InstanceofExpression | IsExpression |
   * IssetExpression | LiteralExpression | MemberSelectionExpression |
   * ParenthesizedExpression | PipeVariableExpression | PrefixUnaryExpression |
   * ScopeResolutionExpression | SubscriptExpression | ColonToken |
   * LessThanToken | NameToken | VariableExpression
   */
  public function getTestx(): EditableNode {
    return $this->getTest();
  }

  public function getQuestionUNTYPED(): EditableNode {
    return $this->_question;
  }

  /**
   * @return static
   */
  public function withQuestion(EditableNode $value) {
    if ($value === $this->_question) {
      return $this;
    }
    return new static(
      $this->_test,
      $value,
      $this->_consequence,
      $this->_colon,
      $this->_alternative
    );
  }

  public function hasQuestion(): bool {
    return !$this->_question->isMissing();
  }

  /**
   * @returns QuestionToken
   */
  public function getQuestion(): QuestionToken {
    return TypeAssert\instance_of(QuestionToken::class, $this->_question);
  }

  /**
   * @returns QuestionToken
   */
  public function getQuestionx(): QuestionToken {
    return $this->getQuestion();
  }

  public function getConsequenceUNTYPED(): EditableNode {
    return $this->_consequence;
  }

  /**
   * @return static
   */
  public function withConsequence(EditableNode $value) {
    if ($value === $this->_consequence) {
      return $this;
    }
    return new static(
      $this->_test,
      $this->_question,
      $value,
      $this->_colon,
      $this->_alternative
    );
  }

  public function hasConsequence(): bool {
    return !$this->_consequence->isMissing();
  }

  /**
   * @returns ArrayCreationExpression | ArrayIntrinsicExpression |
   * BinaryExpression | CastExpression | CollectionLiteralExpression |
   * FunctionCallExpression | LambdaExpression | LiteralExpression |
   * MemberSelectionExpression | Missing | ObjectCreationExpression |
   * ParenthesizedExpression | PrefixUnaryExpression |
   * ScopeResolutionExpression | SubscriptExpression | NameToken |
   * VariableExpression
   */
  public function getConsequence(): ?EditableNode {
    if ($this->_consequence->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_consequence);
  }

  /**
   * @returns ArrayCreationExpression | ArrayIntrinsicExpression |
   * BinaryExpression | CastExpression | CollectionLiteralExpression |
   * FunctionCallExpression | LambdaExpression | LiteralExpression |
   * MemberSelectionExpression | ObjectCreationExpression |
   * ParenthesizedExpression | PrefixUnaryExpression |
   * ScopeResolutionExpression | SubscriptExpression | NameToken |
   * VariableExpression
   */
  public function getConsequencex(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_consequence);
  }

  public function getColonUNTYPED(): EditableNode {
    return $this->_colon;
  }

  /**
   * @return static
   */
  public function withColon(EditableNode $value) {
    if ($value === $this->_colon) {
      return $this;
    }
    return new static(
      $this->_test,
      $this->_question,
      $this->_consequence,
      $value,
      $this->_alternative
    );
  }

  public function hasColon(): bool {
    return !$this->_colon->isMissing();
  }

  /**
   * @returns Missing | ColonToken
   */
  public function getColon(): ?ColonToken {
    if ($this->_colon->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(ColonToken::class, $this->_colon);
  }

  /**
   * @returns ColonToken
   */
  public function getColonx(): ColonToken {
    return TypeAssert\instance_of(ColonToken::class, $this->_colon);
  }

  public function getAlternativeUNTYPED(): EditableNode {
    return $this->_alternative;
  }

  /**
   * @return static
   */
  public function withAlternative(EditableNode $value) {
    if ($value === $this->_alternative) {
      return $this;
    }
    return new static(
      $this->_test,
      $this->_question,
      $this->_consequence,
      $this->_colon,
      $value
    );
  }

  public function hasAlternative(): bool {
    return !$this->_alternative->isMissing();
  }

  /**
   * @returns AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
   * CollectionLiteralExpression | FunctionCallExpression | IssetExpression |
   * LambdaExpression | LiteralExpression | MemberSelectionExpression | Missing
   * | ObjectCreationExpression | ParenthesizedExpression |
   * PrefixUnaryExpression | ScopeResolutionExpression | SubscriptExpression |
   * NameToken | UseToken | TupleExpression | VariableExpression
   */
  public function getAlternative(): ?EditableNode {
    if ($this->_alternative->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_alternative);
  }

  /**
   * @returns AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
   * CollectionLiteralExpression | FunctionCallExpression | IssetExpression |
   * LambdaExpression | LiteralExpression | MemberSelectionExpression |
   * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
   * | ScopeResolutionExpression | SubscriptExpression | NameToken | UseToken |
   * TupleExpression | VariableExpression
   */
  public function getAlternativex(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_alternative);
  }
}
