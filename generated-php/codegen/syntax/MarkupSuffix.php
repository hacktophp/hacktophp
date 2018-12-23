<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class MarkupSuffix extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_less_than_question;
    /**
     * @var EditableNode
     */
    private $_name;
    public function __construct(EditableNode $less_than_question, EditableNode $name)
    {
        parent::__construct('markup_suffix');
        $this->_less_than_question = $less_than_question;
        $this->_name = $name;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $less_than_question = EditableNode::fromJSON($json['markup_suffix_less_than_question'], $file, $offset, $source);
        $offset += $less_than_question->getWidth();
        $name = EditableNode::fromJSON($json['markup_suffix_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        return new static($less_than_question, $name);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('less_than_question' => $this->_less_than_question, 'name' => $this->_name);
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
        $less_than_question = $this->_less_than_question->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        if ($less_than_question === $this->_less_than_question && $name === $this->_name) {
            return $this;
        }
        return new static($less_than_question, $name);
    }
    /**
     * @return EditableNode
     */
    public function getLessThanQuestionUNTYPED()
    {
        return $this->_less_than_question;
    }
    /**
     * @return static
     */
    public function withLessThanQuestion(EditableNode $value)
    {
        if ($value === $this->_less_than_question) {
            return $this;
        }
        return new static($value, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasLessThanQuestion()
    {
        return !$this->_less_than_question->isMissing();
    }
    /**
     * @return LessThanQuestionToken
     */
    /**
     * @return LessThanQuestionToken
     */
    public function getLessThanQuestion()
    {
        return TypeAssert\instance_of(LessThanQuestionToken::class, $this->_less_than_question);
    }
    /**
     * @return LessThanQuestionToken
     */
    /**
     * @return LessThanQuestionToken
     */
    public function getLessThanQuestionx()
    {
        return $this->getLessThanQuestion();
    }
    /**
     * @return EditableNode
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(EditableNode $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_less_than_question, $value);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return null | EqualToken | NameToken
     */
    /**
     * @return null|EditableToken
     */
    public function getName()
    {
        if ($this->_name->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableToken::class, $this->_name);
    }
    /**
     * @return EqualToken | NameToken
     */
    /**
     * @return EditableToken
     */
    public function getNamex()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_name);
    }
}

