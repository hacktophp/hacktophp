<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<57d0293a56e6bb183a148a4c4a8b5468>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class DictionaryIntrinsicExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_explicit_type;
  /**
   * @var EditableNode
   */
  private $_left_bracket;
  /**
   * @var EditableNode
   */
  private $_members;
  /**
   * @var EditableNode
   */
  private $_right_bracket;

  public function __construct(
    EditableNode $keyword,
    EditableNode $explicit_type,
    EditableNode $left_bracket,
    EditableNode $members,
    EditableNode $right_bracket
  ) {
    parent::__construct('dictionary_intrinsic_expression');
    $this->_keyword = $keyword;
    $this->_explicit_type = $explicit_type;
    $this->_left_bracket = $left_bracket;
    $this->_members = $members;
    $this->_right_bracket = $right_bracket;
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
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['dictionary_intrinsic_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $explicit_type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['dictionary_intrinsic_explicit_type'],
      $file,
      $offset,
      $source
    );
    $offset += $explicit_type->getWidth();
    $left_bracket = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['dictionary_intrinsic_left_bracket'],
      $file,
      $offset,
      $source
    );
    $offset += $left_bracket->getWidth();
    $members = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['dictionary_intrinsic_members'],
      $file,
      $offset,
      $source
    );
    $offset += $members->getWidth();
    $right_bracket = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['dictionary_intrinsic_right_bracket'],
      $file,
      $offset,
      $source
    );
    $offset += $right_bracket->getWidth();
    return new static(
      $keyword,
      $explicit_type,
      $left_bracket,
      $members,
      $right_bracket
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'explicit_type' => $this->_explicit_type,
      'left_bracket' => $this->_left_bracket,
      'members' => $this->_members,
      'right_bracket' => $this->_right_bracket,
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
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $explicit_type = $this->_explicit_type->rewrite($rewriter, $parents);
    $left_bracket = $this->_left_bracket->rewrite($rewriter, $parents);
    $members = $this->_members->rewrite($rewriter, $parents);
    $right_bracket = $this->_right_bracket->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $explicit_type === $this->_explicit_type &&
      $left_bracket === $this->_left_bracket &&
      $members === $this->_members &&
      $right_bracket === $this->_right_bracket
    ) {
      return $this;
    }
    return new static(
      $keyword,
      $explicit_type,
      $left_bracket,
      $members,
      $right_bracket
    );
  }

  public function getKeywordUNTYPED(): EditableNode {
    return $this->_keyword;
  }

  /**
   * @return static
   */
  public function withKeyword(EditableNode $value) {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new static(
      $value,
      $this->_explicit_type,
      $this->_left_bracket,
      $this->_members,
      $this->_right_bracket
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return DictToken
   */
  public function getKeyword(): DictToken {
    \assert($this->_keyword instanceof DictToken);
    return $this->_keyword;
  }

  /**
   * @return DictToken
   */
  public function getKeywordx(): DictToken {
    return $this->getKeyword();
  }

  public function getExplicitTypeUNTYPED(): EditableNode {
    return $this->_explicit_type;
  }

  /**
   * @return static
   */
  public function withExplicitType(EditableNode $value) {
    if ($value === $this->_explicit_type) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $value,
      $this->_left_bracket,
      $this->_members,
      $this->_right_bracket
    );
  }

  public function hasExplicitType(): bool {
    return !$this->_explicit_type->isMissing();
  }

  /**
   * @return Missing
   */
  public function getExplicitType(): ?EditableNode {
    if ($this->_explicit_type->isMissing()) {
      return null;
    }
    \assert($this->_explicit_type instanceof EditableNode);
    return $this->_explicit_type;
  }

  /**
   * @return s
   */
  public function getExplicitTypex(): EditableNode {
    \assert($this->_explicit_type instanceof EditableNode);
    return $this->_explicit_type;
  }

  public function getLeftBracketUNTYPED(): EditableNode {
    return $this->_left_bracket;
  }

  /**
   * @return static
   */
  public function withLeftBracket(EditableNode $value) {
    if ($value === $this->_left_bracket) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_explicit_type,
      $value,
      $this->_members,
      $this->_right_bracket
    );
  }

  public function hasLeftBracket(): bool {
    return !$this->_left_bracket->isMissing();
  }

  /**
   * @return LeftBracketToken
   */
  public function getLeftBracket(): LeftBracketToken {
    \assert($this->_left_bracket instanceof LeftBracketToken);
    return $this->_left_bracket;
  }

  /**
   * @return LeftBracketToken
   */
  public function getLeftBracketx(): LeftBracketToken {
    return $this->getLeftBracket();
  }

  public function getMembersUNTYPED(): EditableNode {
    return $this->_members;
  }

  /**
   * @return static
   */
  public function withMembers(EditableNode $value) {
    if ($value === $this->_members) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_explicit_type,
      $this->_left_bracket,
      $value,
      $this->_right_bracket
    );
  }

  public function hasMembers(): bool {
    return !$this->_members->isMissing();
  }

  /**
   * @return EditableList<ElementInitializer> | null
   */
  public function getMembers(): ?EditableList {
    if ($this->_members->isMissing()) {
      return null;
    }
    \assert($this->_members instanceof EditableList);
    return $this->_members;
  }

  /**
   * @return EditableList<ElementInitializer>
   */
  public function getMembersx(): EditableList {
    \assert($this->_members instanceof EditableList);
    return $this->_members;
  }

  public function getRightBracketUNTYPED(): EditableNode {
    return $this->_right_bracket;
  }

  /**
   * @return static
   */
  public function withRightBracket(EditableNode $value) {
    if ($value === $this->_right_bracket) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_explicit_type,
      $this->_left_bracket,
      $this->_members,
      $value
    );
  }

  public function hasRightBracket(): bool {
    return !$this->_right_bracket->isMissing();
  }

  /**
   * @return RightBracketToken
   */
  public function getRightBracket(): RightBracketToken {
    \assert($this->_right_bracket instanceof RightBracketToken);
    return $this->_right_bracket;
  }

  /**
   * @return RightBracketToken
   */
  public function getRightBracketx(): RightBracketToken {
    return $this->getRightBracket();
  }
}
