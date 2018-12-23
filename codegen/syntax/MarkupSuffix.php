<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<70a95be935fffb99a17ecac91202623f>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class MarkupSuffix extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_less_than_question;
  /**
   * @var EditableNode
   */
  private $_name;

  public function __construct(
    EditableNode $less_than_question,
    EditableNode $name
  ) {
    parent::__construct('markup_suffix');
    $this->_less_than_question = $less_than_question;
    $this->_name = $name;
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
    $less_than_question = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['markup_suffix_less_than_question'],
      $file,
      $offset,
      $source
    );
    $offset += $less_than_question->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['markup_suffix_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    return new static($less_than_question, $name);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'less_than_question' => $this->_less_than_question,
      'name' => $this->_name,
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
    $less_than_question =
      $this->_less_than_question->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    if (
      $less_than_question === $this->_less_than_question &&
      $name === $this->_name
    ) {
      return $this;
    }
    return new static($less_than_question, $name);
  }

  public function getLessThanQuestionUNTYPED(): EditableNode {
    return $this->_less_than_question;
  }

  /**
   * @return static
   */
  public function withLessThanQuestion(EditableNode $value) {
    if ($value === $this->_less_than_question) {
      return $this;
    }
    return new static($value, $this->_name);
  }

  public function hasLessThanQuestion(): bool {
    return !$this->_less_than_question->isMissing();
  }

  /**
   * @return LessThanQuestionToken
   */
  public function getLessThanQuestion(): LessThanQuestionToken {
    \assert($this->_less_than_question instanceof LessThanQuestionToken);
    return $this->_less_than_question;
  }

  /**
   * @return LessThanQuestionToken
   */
  public function getLessThanQuestionx(): LessThanQuestionToken {
    return $this->getLessThanQuestion();
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
    return new static($this->_less_than_question, $value);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return null | EqualToken | NameToken
   */
  public function getName(): ?EditableToken {
    if ($this->_name->isMissing()) {
      return null;
    }
    \assert($this->_name instanceof EditableToken);
    return $this->_name;
  }

  /**
   * @return EqualToken | NameToken
   */
  public function getNamex(): EditableToken {
    \assert($this->_name instanceof EditableToken);
    return $this->_name;
  }
}
