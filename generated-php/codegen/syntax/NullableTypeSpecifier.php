<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class NullableTypeSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_question;
    /**
     * @var EditableNode
     */
    private $_type;
    public function __construct(EditableNode $question, EditableNode $type)
    {
        parent::__construct('nullable_type_specifier');
        $this->_question = $question;
        $this->_type = $type;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $question = EditableNode::fromJSON($json['nullable_question'], $file, $offset, $source);
        $offset += $question->getWidth();
        $type = EditableNode::fromJSON($json['nullable_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        return new static($question, $type);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('question' => $this->_question, 'type' => $this->_type);
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
        $question = $this->_question->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        if ($question === $this->_question && $type === $this->_type) {
            return $this;
        }
        return new static($question, $type);
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
        return new static($value, $this->_type);
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
        return new static($this->_question, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | KeysetTypeSpecifier | MapArrayTypeSpecifier |
     * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
     * TupleTypeSpecifier | TypeConstant | VectorArrayTypeSpecifier |
     * VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
     * GenericTypeSpecifier | KeysetTypeSpecifier | MapArrayTypeSpecifier |
     * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
     * TupleTypeSpecifier | TypeConstant | VectorArrayTypeSpecifier |
     * VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

