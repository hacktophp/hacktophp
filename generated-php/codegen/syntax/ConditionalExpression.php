<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8fca081682194930384b5a2cf9ff3083>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class ConditionalExpression extends Node implements ILambdaBody, IExpression
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'conditional_expression';
    /**
     * @var IExpression
     */
    private $_test;
    /**
     * @var QuestionToken
     */
    private $_question;
    /**
     * @var IExpression
     */
    private $_consequence;
    /**
     * @var ColonToken
     */
    private $_colon;
    /**
     * @var IExpression
     */
    private $_alternative;
    public function __construct(IExpression $test, QuestionToken $question, IExpression $consequence, ColonToken $colon, IExpression $alternative, ?array $source_ref = null)
    {
        $this->_test = $test;
        $this->_question = $question;
        $this->_consequence = $consequence;
        $this->_colon = $colon;
        $this->_alternative = $alternative;
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
        $test = Node::fromJSON($json['conditional_test'], $file, $offset, $source, 'IExpression');
        $test = $test !== null ? $test : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $test->getWidth();
        $question = Node::fromJSON($json['conditional_question'], $file, $offset, $source, 'QuestionToken');
        $question = $question !== null ? $question : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $question->getWidth();
        $consequence = Node::fromJSON($json['conditional_consequence'], $file, $offset, $source, 'IExpression');
        $consequence = $consequence !== null ? $consequence : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $consequence->getWidth();
        $colon = Node::fromJSON($json['conditional_colon'], $file, $offset, $source, 'ColonToken');
        $colon = $colon !== null ? $colon : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $colon->getWidth();
        $alternative = Node::fromJSON($json['conditional_alternative'], $file, $offset, $source, 'IExpression');
        $alternative = $alternative !== null ? $alternative : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $alternative->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($test, $question, $consequence, $colon, $alternative, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['test' => $this->_test, 'question' => $this->_question, 'consequence' => $this->_consequence, 'colon' => $this->_colon, 'alternative' => $this->_alternative]);
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
        $test = $rewriter($this->_test, $parents);
        $question = $rewriter($this->_question, $parents);
        $consequence = $rewriter($this->_consequence, $parents);
        $colon = $rewriter($this->_colon, $parents);
        $alternative = $rewriter($this->_alternative, $parents);
        if ($test === $this->_test && $question === $this->_question && $consequence === $this->_consequence && $colon === $this->_colon && $alternative === $this->_alternative) {
            return $this;
        }
        return new static($test, $question, $consequence, $colon, $alternative);
    }
    /**
     * @return null|Node
     */
    public function getTestUNTYPED()
    {
        return $this->_test;
    }
    /**
     * @return static
     */
    public function withTest(IExpression $value)
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
        return $this->_test !== null;
    }
    /**
     * @return BinaryExpression | FunctionCallExpression | IsExpression |
     * IssetExpression | LiteralExpression | MemberSelectionExpression |
     * ParenthesizedExpression | PipeVariableExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getTest()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_test);
    }
    /**
     * @return BinaryExpression | FunctionCallExpression | IsExpression |
     * IssetExpression | LiteralExpression | MemberSelectionExpression |
     * ParenthesizedExpression | PipeVariableExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getTestx()
    {
        return $this->getTest();
    }
    /**
     * @return null|Node
     */
    public function getQuestionUNTYPED()
    {
        return $this->_question;
    }
    /**
     * @return static
     */
    public function withQuestion(QuestionToken $value)
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
        return $this->_question !== null;
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
     * @return null|Node
     */
    public function getConsequenceUNTYPED()
    {
        return $this->_consequence;
    }
    /**
     * @return static
     */
    public function withConsequence(IExpression $value)
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
        return $this->_consequence !== null;
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * FunctionCallExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | ShapeExpression | SubscriptExpression |
     * NameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getConsequence()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_consequence);
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * FunctionCallExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | ShapeExpression | SubscriptExpression |
     * NameToken | VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getConsequencex()
    {
        return $this->getConsequence();
    }
    /**
     * @return null|Node
     */
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(ColonToken $value)
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
        return $this->_colon !== null;
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColon()
    {
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
        return $this->getColon();
    }
    /**
     * @return null|Node
     */
    public function getAlternativeUNTYPED()
    {
        return $this->_alternative;
    }
    /**
     * @return static
     */
    public function withAlternative(IExpression $value)
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
        return $this->_alternative !== null;
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * DarrayIntrinsicExpression | DictionaryIntrinsicExpression |
     * FunctionCallExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getAlternative()
    {
        return TypeAssert\instance_of(IExpression::class, $this->_alternative);
    }
    /**
     * @return ArrayCreationExpression | ArrayIntrinsicExpression |
     * BinaryExpression | CastExpression | CollectionLiteralExpression |
     * DarrayIntrinsicExpression | DictionaryIntrinsicExpression |
     * FunctionCallExpression | LambdaExpression | LiteralExpression |
     * MemberSelectionExpression | ObjectCreationExpression |
     * ParenthesizedExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | SubscriptExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return IExpression
     */
    public function getAlternativex()
    {
        return $this->getAlternative();
    }
}

