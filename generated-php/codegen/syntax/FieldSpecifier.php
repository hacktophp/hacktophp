<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b820c0bbfaa01d1a99e9c55f1f0852aa>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class FieldSpecifier extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_question;
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_arrow;
    /**
     * @var EditableNode
     */
    private $_type;
    public function __construct(EditableNode $question, EditableNode $name, EditableNode $arrow, EditableNode $type)
    {
        parent::__construct('field_specifier');
        $this->_question = $question;
        $this->_name = $name;
        $this->_arrow = $arrow;
        $this->_type = $type;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $question = EditableNode::fromJSON($json['field_question'], $file, $offset, $source);
        $offset += $question->getWidth();
        $name = EditableNode::fromJSON($json['field_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $arrow = EditableNode::fromJSON($json['field_arrow'], $file, $offset, $source);
        $offset += $arrow->getWidth();
        $type = EditableNode::fromJSON($json['field_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        return new static($question, $name, $arrow, $type);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('question' => $this->_question, 'name' => $this->_name, 'arrow' => $this->_arrow, 'type' => $this->_type);
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
        $name = $this->_name->rewrite($rewriter, $parents);
        $arrow = $this->_arrow->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        if ($question === $this->_question && $name === $this->_name && $arrow === $this->_arrow && $type === $this->_type) {
            return $this;
        }
        return new static($question, $name, $arrow, $type);
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
        return new static($value, $this->_name, $this->_arrow, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasQuestion()
    {
        return !$this->_question->isMissing();
    }
    /**
     * @return null | QuestionToken
     */
    /**
     * @return null|QuestionToken
     */
    public function getQuestion()
    {
        if ($this->_question->isMissing()) {
            return null;
        }
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
        return TypeAssert\instance_of(QuestionToken::class, $this->_question);
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
        return new static($this->_question, $value, $this->_arrow, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return LiteralExpression | ScopeResolutionExpression
     */
    /**
     * @return EditableNode
     */
    public function getName()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_name);
    }
    /**
     * @return LiteralExpression | ScopeResolutionExpression
     */
    /**
     * @return EditableNode
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return EditableNode
     */
    public function getArrowUNTYPED()
    {
        return $this->_arrow;
    }
    /**
     * @return static
     */
    public function withArrow(EditableNode $value)
    {
        if ($value === $this->_arrow) {
            return $this;
        }
        return new static($this->_question, $this->_name, $value, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasArrow()
    {
        return !$this->_arrow->isMissing();
    }
    /**
     * @return EqualGreaterThanToken
     */
    /**
     * @return EqualGreaterThanToken
     */
    public function getArrow()
    {
        return TypeAssert\instance_of(EqualGreaterThanToken::class, $this->_arrow);
    }
    /**
     * @return EqualGreaterThanToken
     */
    /**
     * @return EqualGreaterThanToken
     */
    public function getArrowx()
    {
        return $this->getArrow();
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
        return new static($this->_question, $this->_name, $this->_arrow, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * TypeConstant | VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getType()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier |
     * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
     * TypeConstant | VectorTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return $this->getType();
    }
}

