<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<40980bfa4a4584dee2e8135ef9e49a98>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class UnsetStatement extends EditableNode {

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
  private $_variables;
  /**
   * @var EditableNode
   */
  private $_right_paren;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $left_paren,
    EditableNode $variables,
    EditableNode $right_paren,
    EditableNode $semicolon
  ) {
    parent::__construct('unset_statement');
    $this->_keyword = $keyword;
    $this->_left_paren = $left_paren;
    $this->_variables = $variables;
    $this->_right_paren = $right_paren;
    $this->_semicolon = $semicolon;
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
      /* UNSAFE_EXPR */ $json['unset_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['unset_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $variables = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['unset_variables'],
      $file,
      $offset,
      $source
    );
    $offset += $variables->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['unset_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['unset_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return
      new static($keyword, $left_paren, $variables, $right_paren, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'left_paren' => $this->_left_paren,
      'variables' => $this->_variables,
      'right_paren' => $this->_right_paren,
      'semicolon' => $this->_semicolon,
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
    $variables = $this->_variables->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $left_paren === $this->_left_paren &&
      $variables === $this->_variables &&
      $right_paren === $this->_right_paren &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return
      new static($keyword, $left_paren, $variables, $right_paren, $semicolon);
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
      $this->_variables,
      $this->_right_paren,
      $this->_semicolon
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns UnsetToken
   */
  public function getKeyword(): UnsetToken {
    return TypeAssert\instance_of(UnsetToken::class, $this->_keyword);
  }

  /**
   * @returns UnsetToken
   */
  public function getKeywordx(): UnsetToken {
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
      $this->_variables,
      $this->_right_paren,
      $this->_semicolon
    );
  }

  public function hasLeftParen(): bool {
    return !$this->_left_paren->isMissing();
  }

  /**
   * @returns LeftParenToken
   */
  public function getLeftParen(): LeftParenToken {
    return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
  }

  /**
   * @returns LeftParenToken
   */
  public function getLeftParenx(): LeftParenToken {
    return $this->getLeftParen();
  }

  public function getVariablesUNTYPED(): EditableNode {
    return $this->_variables;
  }

  /**
   * @return static
   */
  public function withVariables(EditableNode $value) {
    if ($value === $this->_variables) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $value,
      $this->_right_paren,
      $this->_semicolon
    );
  }

  public function hasVariables(): bool {
    return !$this->_variables->isMissing();
  }

  /**
   * @return EditableList<MemberSelectionExpression> |
   * EditableList<EditableNode> | EditableList<PrefixUnaryExpression> |
   * EditableList<SafeMemberSelectionExpression> |
   * EditableList<ScopeResolutionExpression> |
   * EditableList<SubscriptExpression> | EditableList<VariableExpression>
   */
  public function getVariables(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_variables);
  }

  /**
   * @return EditableList<MemberSelectionExpression> |
   * EditableList<EditableNode> | EditableList<PrefixUnaryExpression> |
   * EditableList<SafeMemberSelectionExpression> |
   * EditableList<ScopeResolutionExpression> |
   * EditableList<SubscriptExpression> | EditableList<VariableExpression>
   */
  public function getVariablesx(): EditableList {
    return $this->getVariables();
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
      $this->_variables,
      $value,
      $this->_semicolon
    );
  }

  public function hasRightParen(): bool {
    return !$this->_right_paren->isMissing();
  }

  /**
   * @returns RightParenToken
   */
  public function getRightParen(): RightParenToken {
    return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
  }

  /**
   * @returns RightParenToken
   */
  public function getRightParenx(): RightParenToken {
    return $this->getRightParen();
  }

  public function getSemicolonUNTYPED(): EditableNode {
    return $this->_semicolon;
  }

  /**
   * @return static
   */
  public function withSemicolon(EditableNode $value) {
    if ($value === $this->_semicolon) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_variables,
      $this->_right_paren,
      $value
    );
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @returns SemicolonToken
   */
  public function getSemicolon(): SemicolonToken {
    return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
  }

  /**
   * @returns SemicolonToken
   */
  public function getSemicolonx(): SemicolonToken {
    return $this->getSemicolon();
  }
}
