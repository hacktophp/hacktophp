<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f2c23fd0a030acf19891174b52d810ab>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class FieldSpecifier extends EditableNode {

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

  public function __construct(
    EditableNode $question,
    EditableNode $name,
    EditableNode $arrow,
    EditableNode $type
  ) {
    parent::__construct('field_specifier');
    $this->_question = $question;
    $this->_name = $name;
    $this->_arrow = $arrow;
    $this->_type = $type;
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
    $question = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['field_question'],
      $file,
      $offset,
      $source
    );
    $offset += $question->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['field_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $arrow = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['field_arrow'],
      $file,
      $offset,
      $source
    );
    $offset += $arrow->getWidth();
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['field_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    return new static($question, $name, $arrow, $type);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'question' => $this->_question,
      'name' => $this->_name,
      'arrow' => $this->_arrow,
      'type' => $this->_type,
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
    $question = $this->_question->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    $arrow = $this->_arrow->rewrite($rewriter, $parents);
    $type = $this->_type->rewrite($rewriter, $parents);
    if (
      $question === $this->_question &&
      $name === $this->_name &&
      $arrow === $this->_arrow &&
      $type === $this->_type
    ) {
      return $this;
    }
    return new static($question, $name, $arrow, $type);
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
    return new static($value, $this->_name, $this->_arrow, $this->_type);
  }

  public function hasQuestion(): bool {
    return !$this->_question->isMissing();
  }

  /**
   * @return null | QuestionToken
   */
  public function getQuestion(): ?QuestionToken {
    if ($this->_question->isMissing()) {
      return null;
    }
    \assert($this->_question instanceof QuestionToken);
    return $this->_question;
  }

  /**
   * @return QuestionToken
   */
  public function getQuestionx(): QuestionToken {
    \assert($this->_question instanceof QuestionToken);
    return $this->_question;
  }

  public function getNameUNTYPED(): EditableNode {
    return $this->_name;
  }

  /**
   * @return static
   */
  public function withName(EditableNode $value) {
    if ($value === $this->_name) {
      return $this;
    }
    return new static($this->_question, $value, $this->_arrow, $this->_type);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return LiteralExpression | ScopeResolutionExpression
   */
  public function getName(): EditableNode {
    \assert($this->_name instanceof EditableNode);
    return $this->_name;
  }

  /**
   * @return LiteralExpression | ScopeResolutionExpression
   */
  public function getNamex(): EditableNode {
    return $this->getName();
  }

  public function getArrowUNTYPED(): EditableNode {
    return $this->_arrow;
  }

  /**
   * @return static
   */
  public function withArrow(EditableNode $value) {
    if ($value === $this->_arrow) {
      return $this;
    }
    return new static($this->_question, $this->_name, $value, $this->_type);
  }

  public function hasArrow(): bool {
    return !$this->_arrow->isMissing();
  }

  /**
   * @return EqualGreaterThanToken
   */
  public function getArrow(): EqualGreaterThanToken {
    \assert($this->_arrow instanceof EqualGreaterThanToken);
    return $this->_arrow;
  }

  /**
   * @return EqualGreaterThanToken
   */
  public function getArrowx(): EqualGreaterThanToken {
    return $this->getArrow();
  }

  public function getTypeUNTYPED(): EditableNode {
    return $this->_type;
  }

  /**
   * @return static
   */
  public function withType(EditableNode $value) {
    if ($value === $this->_type) {
      return $this;
    }
    return new static($this->_question, $this->_name, $this->_arrow, $value);
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @return ClosureTypeSpecifier | GenericTypeSpecifier |
   * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
   * TypeConstant | VectorTypeSpecifier
   */
  public function getType(): EditableNode {
    \assert($this->_type instanceof EditableNode);
    return $this->_type;
  }

  /**
   * @return ClosureTypeSpecifier | GenericTypeSpecifier |
   * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
   * TypeConstant | VectorTypeSpecifier
   */
  public function getTypex(): EditableNode {
    return $this->getType();
  }
}
