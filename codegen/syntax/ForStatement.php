<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c8775c91fb67f1f67434920ca4171177>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class ForStatement
  extends EditableNode
  implements IControlFlowStatement, ILoopStatement {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_left_paren;
  /**
   * @var EditableNode
   */
  private $_initializer;
  /**
   * @var EditableNode
   */
  private $_first_semicolon;
  /**
   * @var EditableNode
   */
  private $_control;
  /**
   * @var EditableNode
   */
  private $_second_semicolon;
  /**
   * @var EditableNode
   */
  private $_end_of_loop;
  /**
   * @var EditableNode
   */
  private $_right_paren;
  /**
   * @var EditableNode
   */
  private $_body;

  public function __construct(
    EditableNode $keyword,
    EditableNode $left_paren,
    EditableNode $initializer,
    EditableNode $first_semicolon,
    EditableNode $control,
    EditableNode $second_semicolon,
    EditableNode $end_of_loop,
    EditableNode $right_paren,
    EditableNode $body
  ) {
    parent::__construct('for_statement');
    $this->_keyword = $keyword;
    $this->_left_paren = $left_paren;
    $this->_initializer = $initializer;
    $this->_first_semicolon = $first_semicolon;
    $this->_control = $control;
    $this->_second_semicolon = $second_semicolon;
    $this->_end_of_loop = $end_of_loop;
    $this->_right_paren = $right_paren;
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
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['for_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['for_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $initializer = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['for_initializer'],
      $file,
      $offset,
      $source
    );
    $offset += $initializer->getWidth();
    $first_semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['for_first_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $first_semicolon->getWidth();
    $control = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['for_control'],
      $file,
      $offset,
      $source
    );
    $offset += $control->getWidth();
    $second_semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['for_second_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $second_semicolon->getWidth();
    $end_of_loop = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['for_end_of_loop'],
      $file,
      $offset,
      $source
    );
    $offset += $end_of_loop->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['for_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    $body = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['for_body'],
      $file,
      $offset,
      $source
    );
    $offset += $body->getWidth();
    return new static(
      $keyword,
      $left_paren,
      $initializer,
      $first_semicolon,
      $control,
      $second_semicolon,
      $end_of_loop,
      $right_paren,
      $body
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'left_paren' => $this->_left_paren,
      'initializer' => $this->_initializer,
      'first_semicolon' => $this->_first_semicolon,
      'control' => $this->_control,
      'second_semicolon' => $this->_second_semicolon,
      'end_of_loop' => $this->_end_of_loop,
      'right_paren' => $this->_right_paren,
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
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $initializer = $this->_initializer->rewrite($rewriter, $parents);
    $first_semicolon = $this->_first_semicolon->rewrite($rewriter, $parents);
    $control = $this->_control->rewrite($rewriter, $parents);
    $second_semicolon = $this->_second_semicolon->rewrite($rewriter, $parents);
    $end_of_loop = $this->_end_of_loop->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    $body = $this->_body->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $left_paren === $this->_left_paren &&
      $initializer === $this->_initializer &&
      $first_semicolon === $this->_first_semicolon &&
      $control === $this->_control &&
      $second_semicolon === $this->_second_semicolon &&
      $end_of_loop === $this->_end_of_loop &&
      $right_paren === $this->_right_paren &&
      $body === $this->_body
    ) {
      return $this;
    }
    return new static(
      $keyword,
      $left_paren,
      $initializer,
      $first_semicolon,
      $control,
      $second_semicolon,
      $end_of_loop,
      $right_paren,
      $body
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
      $this->_left_paren,
      $this->_initializer,
      $this->_first_semicolon,
      $this->_control,
      $this->_second_semicolon,
      $this->_end_of_loop,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return ForToken
   */
  public function getKeyword(): ForToken {
    \assert($this->_keyword instanceof ForToken);
    return $this->_keyword;
  }

  /**
   * @return ForToken
   */
  public function getKeywordx(): ForToken {
    return $this->getKeyword();
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
      $this->_keyword,
      $value,
      $this->_initializer,
      $this->_first_semicolon,
      $this->_control,
      $this->_second_semicolon,
      $this->_end_of_loop,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasLeftParen(): bool {
    return !$this->_left_paren->isMissing();
  }

  /**
   * @return LeftParenToken
   */
  public function getLeftParen(): LeftParenToken {
    \assert($this->_left_paren instanceof LeftParenToken);
    return $this->_left_paren;
  }

  /**
   * @return LeftParenToken
   */
  public function getLeftParenx(): LeftParenToken {
    return $this->getLeftParen();
  }

  public function getInitializerUNTYPED(): EditableNode {
    return $this->_initializer;
  }

  /**
   * @return static
   */
  public function withInitializer(EditableNode $value) {
    if ($value === $this->_initializer) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $value,
      $this->_first_semicolon,
      $this->_control,
      $this->_second_semicolon,
      $this->_end_of_loop,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasInitializer(): bool {
    return !$this->_initializer->isMissing();
  }

  /**
   * @return EditableList<BinaryExpression> |
   * EditableList<FunctionCallExpression> | EditableList<LiteralExpression> |
   * Missing
   */
  public function getInitializer(): ?EditableList {
    if ($this->_initializer->isMissing()) {
      return null;
    }
    \assert($this->_initializer instanceof EditableList);
    return $this->_initializer;
  }

  /**
   * @return EditableList<BinaryExpression> |
   * EditableList<FunctionCallExpression> | EditableList<LiteralExpression>
   */
  public function getInitializerx(): EditableList {
    \assert($this->_initializer instanceof EditableList);
    return $this->_initializer;
  }

  public function getFirstSemicolonUNTYPED(): EditableNode {
    return $this->_first_semicolon;
  }

  /**
   * @return static
   */
  public function withFirstSemicolon(EditableNode $value) {
    if ($value === $this->_first_semicolon) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_initializer,
      $value,
      $this->_control,
      $this->_second_semicolon,
      $this->_end_of_loop,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasFirstSemicolon(): bool {
    return !$this->_first_semicolon->isMissing();
  }

  /**
   * @return SemicolonToken
   */
  public function getFirstSemicolon(): SemicolonToken {
    \assert($this->_first_semicolon instanceof SemicolonToken);
    return $this->_first_semicolon;
  }

  /**
   * @return SemicolonToken
   */
  public function getFirstSemicolonx(): SemicolonToken {
    return $this->getFirstSemicolon();
  }

  public function getControlUNTYPED(): EditableNode {
    return $this->_control;
  }

  /**
   * @return static
   */
  public function withControl(EditableNode $value) {
    if ($value === $this->_control) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_initializer,
      $this->_first_semicolon,
      $value,
      $this->_second_semicolon,
      $this->_end_of_loop,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasControl(): bool {
    return !$this->_control->isMissing();
  }

  /**
   * @return EditableList<BinaryExpression> | EditableList<EditableNode> |
   * EditableList<ConditionalExpression> | EditableList<FunctionCallExpression>
   * | EditableList<PrefixUnaryExpression> | EditableList<VariableExpression> |
   * Missing
   */
  public function getControl(): ?EditableList {
    if ($this->_control->isMissing()) {
      return null;
    }
    \assert($this->_control instanceof EditableList);
    return $this->_control;
  }

  /**
   * @return EditableList<BinaryExpression> | EditableList<EditableNode> |
   * EditableList<ConditionalExpression> | EditableList<FunctionCallExpression>
   * | EditableList<PrefixUnaryExpression> | EditableList<VariableExpression>
   */
  public function getControlx(): EditableList {
    \assert($this->_control instanceof EditableList);
    return $this->_control;
  }

  public function getSecondSemicolonUNTYPED(): EditableNode {
    return $this->_second_semicolon;
  }

  /**
   * @return static
   */
  public function withSecondSemicolon(EditableNode $value) {
    if ($value === $this->_second_semicolon) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_initializer,
      $this->_first_semicolon,
      $this->_control,
      $value,
      $this->_end_of_loop,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasSecondSemicolon(): bool {
    return !$this->_second_semicolon->isMissing();
  }

  /**
   * @return SemicolonToken
   */
  public function getSecondSemicolon(): SemicolonToken {
    \assert($this->_second_semicolon instanceof SemicolonToken);
    return $this->_second_semicolon;
  }

  /**
   * @return SemicolonToken
   */
  public function getSecondSemicolonx(): SemicolonToken {
    return $this->getSecondSemicolon();
  }

  public function getEndOfLoopUNTYPED(): EditableNode {
    return $this->_end_of_loop;
  }

  /**
   * @return static
   */
  public function withEndOfLoop(EditableNode $value) {
    if ($value === $this->_end_of_loop) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_initializer,
      $this->_first_semicolon,
      $this->_control,
      $this->_second_semicolon,
      $value,
      $this->_right_paren,
      $this->_body
    );
  }

  public function hasEndOfLoop(): bool {
    return !$this->_end_of_loop->isMissing();
  }

  /**
   * @return EditableList<BinaryExpression> |
   * EditableList<FunctionCallExpression> |
   * EditableList<PostfixUnaryExpression> | EditableList<PrefixUnaryExpression>
   * | null
   */
  public function getEndOfLoop(): ?EditableList {
    if ($this->_end_of_loop->isMissing()) {
      return null;
    }
    \assert($this->_end_of_loop instanceof EditableList);
    return $this->_end_of_loop;
  }

  /**
   * @return EditableList<BinaryExpression> |
   * EditableList<FunctionCallExpression> |
   * EditableList<PostfixUnaryExpression> | EditableList<PrefixUnaryExpression>
   */
  public function getEndOfLoopx(): EditableList {
    \assert($this->_end_of_loop instanceof EditableList);
    return $this->_end_of_loop;
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
      $this->_keyword,
      $this->_left_paren,
      $this->_initializer,
      $this->_first_semicolon,
      $this->_control,
      $this->_second_semicolon,
      $this->_end_of_loop,
      $value,
      $this->_body
    );
  }

  public function hasRightParen(): bool {
    return !$this->_right_paren->isMissing();
  }

  /**
   * @return RightParenToken
   */
  public function getRightParen(): RightParenToken {
    \assert($this->_right_paren instanceof RightParenToken);
    return $this->_right_paren;
  }

  /**
   * @return RightParenToken
   */
  public function getRightParenx(): RightParenToken {
    return $this->getRightParen();
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
      $this->_keyword,
      $this->_left_paren,
      $this->_initializer,
      $this->_first_semicolon,
      $this->_control,
      $this->_second_semicolon,
      $this->_end_of_loop,
      $this->_right_paren,
      $value
    );
  }

  public function hasBody(): bool {
    return !$this->_body->isMissing();
  }

  /**
   * @return AlternateLoopStatement | CompoundStatement | EchoStatement |
   * ExpressionStatement | ForStatement | UnsetStatement
   */
  public function getBody(): EditableNode {
    \assert($this->_body instanceof EditableNode);
    return $this->_body;
  }

  /**
   * @return AlternateLoopStatement | CompoundStatement | EchoStatement |
   * ExpressionStatement | ForStatement | UnsetStatement
   */
  public function getBodyx(): EditableNode {
    return $this->getBody();
  }
}
