<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6724d3be551d026a6315bb62eba9ceab>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class NullableTypeSpecifier extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_question;
  /**
   * @var EditableNode
   */
  private $_type;

  public function __construct(EditableNode $question, EditableNode $type) {
    parent::__construct('nullable_type_specifier');
    $this->_question = $question;
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
      /* UNSAFE_EXPR */ $json['nullable_question'],
      $file,
      $offset,
      $source
    );
    $offset += $question->getWidth();
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['nullable_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    return new static($question, $type);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'question' => $this->_question,
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
    $type = $this->_type->rewrite($rewriter, $parents);
    if ($question === $this->_question && $type === $this->_type) {
      return $this;
    }
    return new static($question, $type);
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
    return new static($value, $this->_type);
  }

  public function hasQuestion(): bool {
    return !$this->_question->isMissing();
  }

  /**
   * @return QuestionToken
   */
  public function getQuestion(): QuestionToken {
    \assert($this->_question instanceof QuestionToken);
    return $this->_question;
  }

  /**
   * @return QuestionToken
   */
  public function getQuestionx(): QuestionToken {
    return $this->getQuestion();
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
    return new static($this->_question, $value);
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
   * GenericTypeSpecifier | KeysetTypeSpecifier | MapArrayTypeSpecifier |
   * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
   * TupleTypeSpecifier | TypeConstant | VectorArrayTypeSpecifier |
   * VectorTypeSpecifier
   */
  public function getType(): EditableNode {
    \assert($this->_type instanceof EditableNode);
    return $this->_type;
  }

  /**
   * @return ClosureTypeSpecifier | DictionaryTypeSpecifier |
   * GenericTypeSpecifier | KeysetTypeSpecifier | MapArrayTypeSpecifier |
   * ShapeTypeSpecifier | SimpleTypeSpecifier | SoftTypeSpecifier |
   * TupleTypeSpecifier | TypeConstant | VectorArrayTypeSpecifier |
   * VectorTypeSpecifier
   */
  public function getTypex(): EditableNode {
    return $this->getType();
  }
}
