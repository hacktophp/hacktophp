<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1eea2c629a247f51dbf2884fae24aab5>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
use HH\Lib\Dict;
final class NullableTypeSpecifier extends Node implements ITypeSpecifier
{
    /**
     * @var string
     */
    const SYNTAX_KIND = 'nullable_type_specifier';
    /**
     * @var QuestionToken
     */
    private $_question;
    /**
     * @var ITypeSpecifier
     */
    private $_type;
    public function __construct(QuestionToken $question, ITypeSpecifier $type, ?array $source_ref = null)
    {
        $this->_question = $question;
        $this->_type = $type;
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
        $question = Node::fromJSON($json['nullable_question'], $file, $offset, $source, 'QuestionToken');
        $question = $question !== null ? $question : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $question->getWidth();
        $type = Node::fromJSON($json['nullable_type'], $file, $offset, $source, 'ITypeSpecifier');
        $type = $type !== null ? $type : (function () {
            throw new \TypeError('Failed assertion');
        })();
        $offset += $type->getWidth();
        $source_ref = ['file' => $file, 'source' => $source, 'offset' => $initial_offset, 'width' => $offset - $initial_offset];
        return new static($question, $type, $source_ref);
    }
    /**
     * @return array<string, Node>
     */
    public function getChildren()
    {
        return Dict\filter_nulls(['question' => $this->_question, 'type' => $this->_type]);
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
        $question = $rewriter($this->_question, $parents);
        $type = $rewriter($this->_type, $parents);
        if ($question === $this->_question && $type === $this->_type) {
            return $this;
        }
        return new static($question, $type);
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
        return new static($value, $this->_type);
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
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(ITypeSpecifier $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_question, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return $this->_type !== null;
    }
    /**
     * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | LikeTypeSpecifier | MapArrayTypeSpecifier |
     * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
     * TupleTypeSpecifier | TypeConstant | VectorArrayTypeSpecifier |
     * VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(ITypeSpecifier::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | LikeTypeSpecifier | MapArrayTypeSpecifier |
     * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
     * TupleTypeSpecifier | TypeConstant | VectorArrayTypeSpecifier |
     * VectorTypeSpecifier
     */
    /**
     * @return ITypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

