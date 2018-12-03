<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e23cd1006b2aa3976bc1adb4e6171895>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class AnonymousClass extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_class_keyword;
  /**
   * @var EditableNode
   */
  private $_left_paren;
  /**
   * @var EditableNode
   */
  private $_argument_list;
  /**
   * @var EditableNode
   */
  private $_right_paren;
  /**
   * @var EditableNode
   */
  private $_extends_keyword;
  /**
   * @var EditableNode
   */
  private $_extends_list;
  /**
   * @var EditableNode
   */
  private $_implements_keyword;
  /**
   * @var EditableNode
   */
  private $_implements_list;
  /**
   * @var EditableNode
   */
  private $_body;

  public function __construct(
    EditableNode $class_keyword,
    EditableNode $left_paren,
    EditableNode $argument_list,
    EditableNode $right_paren,
    EditableNode $extends_keyword,
    EditableNode $extends_list,
    EditableNode $implements_keyword,
    EditableNode $implements_list,
    EditableNode $body
  ) {
    parent::__construct('anonymous_class');
    $this->_class_keyword = $class_keyword;
    $this->_left_paren = $left_paren;
    $this->_argument_list = $argument_list;
    $this->_right_paren = $right_paren;
    $this->_extends_keyword = $extends_keyword;
    $this->_extends_list = $extends_list;
    $this->_implements_keyword = $implements_keyword;
    $this->_implements_list = $implements_list;
    $this->_body = $body;
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
    $class_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_class_class_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $class_keyword->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_class_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $argument_list = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_class_argument_list'],
      $file,
      $offset,
      $source
    );
    $offset += $argument_list->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_class_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    $extends_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_class_extends_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $extends_keyword->getWidth();
    $extends_list = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_class_extends_list'],
      $file,
      $offset,
      $source
    );
    $offset += $extends_list->getWidth();
    $implements_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_class_implements_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $implements_keyword->getWidth();
    $implements_list = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_class_implements_list'],
      $file,
      $offset,
      $source
    );
    $offset += $implements_list->getWidth();
    $body = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['anonymous_class_body'],
      $file,
      $offset,
      $source
    );
    $offset += $body->getWidth();
    return new static(
      $class_keyword,
      $left_paren,
      $argument_list,
      $right_paren,
      $extends_keyword,
      $extends_list,
      $implements_keyword,
      $implements_list,
      $body
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'class_keyword' => $this->_class_keyword,
      'left_paren' => $this->_left_paren,
      'argument_list' => $this->_argument_list,
      'right_paren' => $this->_right_paren,
      'extends_keyword' => $this->_extends_keyword,
      'extends_list' => $this->_extends_list,
      'implements_keyword' => $this->_implements_keyword,
      'implements_list' => $this->_implements_list,
      'body' => $this->_body,
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
    $class_keyword = $this->_class_keyword->rewrite($rewriter, $parents);
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    $extends_keyword = $this->_extends_keyword->rewrite($rewriter, $parents);
    $extends_list = $this->_extends_list->rewrite($rewriter, $parents);
    $implements_keyword =
      $this->_implements_keyword->rewrite($rewriter, $parents);
    $implements_list = $this->_implements_list->rewrite($rewriter, $parents);
    $body = $this->_body->rewrite($rewriter, $parents);
    if (
      $class_keyword === $this->_class_keyword &&
      $left_paren === $this->_left_paren &&
      $argument_list === $this->_argument_list &&
      $right_paren === $this->_right_paren &&
      $extends_keyword === $this->_extends_keyword &&
      $extends_list === $this->_extends_list &&
      $implements_keyword === $this->_implements_keyword &&
      $implements_list === $this->_implements_list &&
      $body === $this->_body
    ) {
      return $this;
    }
    return new static(
      $class_keyword,
      $left_paren,
      $argument_list,
      $right_paren,
      $extends_keyword,
      $extends_list,
      $implements_keyword,
      $implements_list,
      $body
    );
  }

  public function getClassKeywordUNTYPED(): EditableNode {
    return $this->_class_keyword;
  }

  /**
   * @return static
   */
  public function withClassKeyword(EditableNode $value) {
    if ($value === $this->_class_keyword) {
      return $this;
    }
    return new static(
      $value,
      $this->_left_paren,
      $this->_argument_list,
      $this->_right_paren,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasClassKeyword(): bool {
    return !$this->_class_keyword->isMissing();
  }

  /**
   * @returns ClassToken
   */
  public function getClassKeyword(): ClassToken {
    return TypeAssert\instance_of(ClassToken::class, $this->_class_keyword);
  }

  /**
   * @returns ClassToken
   */
  public function getClassKeywordx(): ClassToken {
    return $this->getClassKeyword();
  }

  public function getLeftParenUNTYPED(): EditableNode {
    return $this->_left_paren;
  }

  /**
   * @return static
   */
  public function withLeftParen(EditableNode $value) {
    if ($value === $this->_left_paren) {
      return $this;
    }
    return new static(
      $this->_class_keyword,
      $value,
      $this->_argument_list,
      $this->_right_paren,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasLeftParen(): bool {
    return !$this->_left_paren->isMissing();
  }

  /**
   * @returns Missing | LeftParenToken
   */
  public function getLeftParen(): ?LeftParenToken {
    if ($this->_left_paren->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
  }

  /**
   * @returns LeftParenToken
   */
  public function getLeftParenx(): LeftParenToken {
    return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
  }

  public function getArgumentListUNTYPED(): EditableNode {
    return $this->_argument_list;
  }

  /**
   * @return static
   */
  public function withArgumentList(EditableNode $value) {
    if ($value === $this->_argument_list) {
      return $this;
    }
    return new static(
      $this->_class_keyword,
      $this->_left_paren,
      $value,
      $this->_right_paren,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasArgumentList(): bool {
    return !$this->_argument_list->isMissing();
  }

  /**
   * @return EditableList<AnonymousFunction> | EditableList<LiteralExpression>
   * | EditableList<MemberSelectionExpression> |
   * EditableList<VariableExpression> | Missing
   */
  public function getArgumentList(): ?EditableList {
    if ($this->_argument_list->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableList::class, $this->_argument_list);
  }

  /**
   * @return EditableList<AnonymousFunction> | EditableList<LiteralExpression>
   * | EditableList<MemberSelectionExpression> |
   * EditableList<VariableExpression>
   */
  public function getArgumentListx(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_argument_list);
  }

  public function getRightParenUNTYPED(): EditableNode {
    return $this->_right_paren;
  }

  /**
   * @return static
   */
  public function withRightParen(EditableNode $value) {
    if ($value === $this->_right_paren) {
      return $this;
    }
    return new static(
      $this->_class_keyword,
      $this->_left_paren,
      $this->_argument_list,
      $value,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasRightParen(): bool {
    return !$this->_right_paren->isMissing();
  }

  /**
   * @returns Missing | RightParenToken
   */
  public function getRightParen(): ?RightParenToken {
    if ($this->_right_paren->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
  }

  /**
   * @returns RightParenToken
   */
  public function getRightParenx(): RightParenToken {
    return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
  }

  public function getExtendsKeywordUNTYPED(): EditableNode {
    return $this->_extends_keyword;
  }

  /**
   * @return static
   */
  public function withExtendsKeyword(EditableNode $value) {
    if ($value === $this->_extends_keyword) {
      return $this;
    }
    return new static(
      $this->_class_keyword,
      $this->_left_paren,
      $this->_argument_list,
      $this->_right_paren,
      $value,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasExtendsKeyword(): bool {
    return !$this->_extends_keyword->isMissing();
  }

  /**
   * @returns Missing | ExtendsToken
   */
  public function getExtendsKeyword(): ?ExtendsToken {
    if ($this->_extends_keyword->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(ExtendsToken::class, $this->_extends_keyword);
  }

  /**
   * @returns ExtendsToken
   */
  public function getExtendsKeywordx(): ExtendsToken {
    return TypeAssert\instance_of(ExtendsToken::class, $this->_extends_keyword);
  }

  public function getExtendsListUNTYPED(): EditableNode {
    return $this->_extends_list;
  }

  /**
   * @return static
   */
  public function withExtendsList(EditableNode $value) {
    if ($value === $this->_extends_list) {
      return $this;
    }
    return new static(
      $this->_class_keyword,
      $this->_left_paren,
      $this->_argument_list,
      $this->_right_paren,
      $this->_extends_keyword,
      $value,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasExtendsList(): bool {
    return !$this->_extends_list->isMissing();
  }

  /**
   * @return EditableList<SimpleTypeSpecifier> | Missing
   */
  public function getExtendsList(): ?EditableList<SimpleTypeSpecifier> {
    if ($this->_extends_list->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableList::class, $this->_extends_list);
  }

  /**
   * @return EditableList<SimpleTypeSpecifier>
   */
  public function getExtendsListx(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_extends_list);
  }

  public function getImplementsKeywordUNTYPED(): EditableNode {
    return $this->_implements_keyword;
  }

  /**
   * @return static
   */
  public function withImplementsKeyword(EditableNode $value) {
    if ($value === $this->_implements_keyword) {
      return $this;
    }
    return new static(
      $this->_class_keyword,
      $this->_left_paren,
      $this->_argument_list,
      $this->_right_paren,
      $this->_extends_keyword,
      $this->_extends_list,
      $value,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasImplementsKeyword(): bool {
    return !$this->_implements_keyword->isMissing();
  }

  /**
   * @returns Missing | ImplementsToken
   */
  public function getImplementsKeyword(): ?ImplementsToken {
    if ($this->_implements_keyword->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(
      ImplementsToken::class,
      $this->_implements_keyword
    );
  }

  /**
   * @returns ImplementsToken
   */
  public function getImplementsKeywordx(): ImplementsToken {
    return TypeAssert\instance_of(
      ImplementsToken::class,
      $this->_implements_keyword
    );
  }

  public function getImplementsListUNTYPED(): EditableNode {
    return $this->_implements_list;
  }

  /**
   * @return static
   */
  public function withImplementsList(EditableNode $value) {
    if ($value === $this->_implements_list) {
      return $this;
    }
    return new static(
      $this->_class_keyword,
      $this->_left_paren,
      $this->_argument_list,
      $this->_right_paren,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $value,
      $this->_body
    );
  }

  public function hasImplementsList(): bool {
    return !$this->_implements_list->isMissing();
  }

  /**
   * @return EditableList<SimpleTypeSpecifier> | Missing
   */
  public function getImplementsList(): ?EditableList<SimpleTypeSpecifier> {
    if ($this->_implements_list->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableList::class, $this->_implements_list);
  }

  /**
   * @return EditableList<SimpleTypeSpecifier>
   */
  public function getImplementsListx(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_implements_list);
  }

  public function getBodyUNTYPED(): EditableNode {
    return $this->_body;
  }

  /**
   * @return static
   */
  public function withBody(EditableNode $value) {
    if ($value === $this->_body) {
      return $this;
    }
    return new static(
      $this->_class_keyword,
      $this->_left_paren,
      $this->_argument_list,
      $this->_right_paren,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $value
    );
  }

  public function hasBody(): bool {
    return !$this->_body->isMissing();
  }

  /**
   * @returns ClassishBody
   */
  public function getBody(): ClassishBody {
    return TypeAssert\instance_of(ClassishBody::class, $this->_body);
  }

  /**
   * @returns ClassishBody
   */
  public function getBodyx(): ClassishBody {
    return $this->getBody();
  }
}
