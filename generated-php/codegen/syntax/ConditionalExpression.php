<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<067757043b4fa6bccf306ea5268184c2>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class ConditionalExpression extends EditableNode
{
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
    public function __construct(EditableNode $test, EditableNode $question, EditableNode $consequence, EditableNode $colon, EditableNode $alternative)
    {
        parent::__construct('conditional_expression');
        $this->_test = $test;
        $this->_question = $question;
        $this->_consequence = $consequence;
        $this->_colon = $colon;
        $this->_alternative = $alternative;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $test = EditableNode::fromJSON($json['conditional_test'], $file, $offset, $source);
        $offset += $test->getWidth();
        $question = EditableNode::fromJSON($json['conditional_question'], $file, $offset, $source);
        $offset += $question->getWidth();
        $consequence = EditableNode::fromJSON($json['conditional_consequence'], $file, $offset, $source);
        $offset += $consequence->getWidth();
        $colon = EditableNode::fromJSON($json['conditional_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        $alternative = EditableNode::fromJSON($json['conditional_alternative'], $file, $offset, $source);
        $offset += $alternative->getWidth();
        return new static($test, $question, $consequence, $colon, $alternative);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['test' => $this->_test, 'question' => $this->_question, 'consequence' => $this->_consequence, 'colon' => $this->_colon, 'alternative' => $this->_alternative];
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
        $test = $this->_test->rewrite($rewriter, $parents);
        $question = $this->_question->rewrite($rewriter, $parents);
        $consequence = $this->_consequence->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $alternative = $this->_alternative->rewrite($rewriter, $parents);
        if ($test === $this->_test && $question === $this->_question && $consequence === $this->_consequence && $colon === $this->_colon && $alternative === $this->_alternative) {
            return $this;
        }
        return new static($test, $question, $consequence, $colon, $alternative);
    }
    /**
     * @return EditableNode
     */
    public function getTestUNTYPED()
    {
        return $this->_test;
    }
    /**
     * @return static
     */
    public function withTest(EditableNode $value)
    {
        if ($value === $this->_test) {
            return $this;
        }
        return new static($value, $this->_question, $this->_consequence, $this->_colon, $this->_alternative);
    }
    /**
     * @return bool
     */
    public function hasTest()
    {
        return !$this->_test->isMissing();
    }
    /**
     * @return BinaryExpression | ConditionalExpression | EmptyExpression |
     * FunctionCallExpression | InstanceofExpression | IsExpression |
     * IssetExpression | LiteralExpression | MemberSelectionExpression |
     * ParenthesizedExpression | PipeVariableExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | ColonToken |
     * LessThanToken | NameToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getTest()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_test);
    }
    /**
     * @return BinaryExpression | ConditionalExpression | EmptyExpression |
     * FunctionCallExpression | InstanceofExpression | IsExpression |
     * IssetExpression | LiteralExpression | MemberSelectionExpression |
     * ParenthesizedExpression | PipeVariableExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | ColonToken |
     * LessThanToken | NameToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getTestx()
    {
        return $this->getTest();
    }
    /**
     * @return EditableNode
     */
    public function getQuestionUNTYPED()
    {
        return $this->_question;
    }
    /**
     * @return static
     */
    public function withQuestion(EditableNode $value)
    {
        if ($value === $this->_question) {
            return $this;
        }
        return new static($this->_test, $value, $this->_consequence, $this->_colon, $this->_alternative);
    }
    /**
     * @return bool
     */
    public function hasQuestion()
    {
        return !$this->_question->isMissing();
    }
    /**
     * @return QuestionToken
     */
    /**
     * @return QuestionToken
     */
    public function getQuestion()
    {
        return TypeAssert\instance_of(QuestionToken::class, $this->_question);
    }
    /**
     * @return QuestionToken
     */
    /**
     * @return QuestionToken
     */
    public function getQuestionx()
    {
        return $this->getQuestion();
    }
    /**
     * @return EditableNode
     */
    public function getConsequenceUNTYPED()
    {
        return $this->_consequence;
    }
    /**
     * @return static
     */
    public function withConsequence(EditableNode $value)
    {
        if ($value === $this->_consequence) {
            return $this;
        }
        return new static($this->_test, $this->_question, $value, $this->_colon, $this->_alternative);
    }
    /**
     * @return bool
     */
    public function hasConsequence()
    {
        return !$this->_consequence->isMissing();
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * FunctionCallExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | null | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return null|EditableNode
     */
    public function getConsequence()
    {
        if ($this->_consequence->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_consequence);
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * FunctionCallExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getConsequencex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_consequence);
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
        return new static($this->_test, $this->_question, $this->_consequence, $value, $this->_alternative);
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
    public function getAlternativeUNTYPED()
    {
        return $this->_alternative;
    }
    /**
     * @return static
     */
    public function withAlternative(EditableNode $value)
    {
        if ($value === $this->_alternative) {
            return $this;
        }
        return new static($this->_test, $this->_question, $this->_consequence, $this->_colon, $value);
    }
    /**
     * @return bool
     */
    public function hasAlternative()
    {
        return !$this->_alternative->isMissing();
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
     * CollectionLiteralExpression | FunctionCallExpression | IssetExpression |
     * LambdaExpression | LiteralExpression | MemberSelectionExpression | null |
     * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
     * | ScopeResolutionExpression | SubscriptExpression | NameToken | UseToken |
     * TupleExpression | VariableExpression
     */
    /**
     * @return null|EditableNode
     */
    public function getAlternative()
    {
        if ($this->_alternative->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_alternative);
    }
    /**
     * @return AnonymousFunction | ArrayCreationExpression |
     * ArrayIntrinsicExpression | BinaryExpression | CastExpression |
     * CollectionLiteralExpression | FunctionCallExpression | IssetExpression |
     * LambdaExpression | LiteralExpression | MemberSelectionExpression |
     * ObjectCreationExpression | ParenthesizedExpression | PrefixUnaryExpression
     * | ScopeResolutionExpression | SubscriptExpression | NameToken | UseToken |
     * TupleExpression | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getAlternativex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_alternative);
    }
}

