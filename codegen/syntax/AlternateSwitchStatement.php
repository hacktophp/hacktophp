<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a073e58fc9be4ce9ad1d168407923894>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class AlternateSwitchStatement
  extends EditableNode
  implements IControlFlowStatement {

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
  private $_expression;
  /**
   * @var EditableNode
   */
  private $_right_paren;
  /**
   * @var EditableNode
   */
  private $_opening_colon;
  /**
   * @var EditableNode
   */
  private $_sections;
  /**
   * @var EditableNode
   */
  private $_closing_endswitch;
  /**
   * @var EditableNode
   */
  private $_closing_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $left_paren,
    EditableNode $expression,
    EditableNode $right_paren,
    EditableNode $opening_colon,
    EditableNode $sections,
    EditableNode $closing_endswitch,
    EditableNode $closing_semicolon
  ) {
    parent::__construct('alternate_switch_statement');
    $this->_keyword = $keyword;
    $this->_left_paren = $left_paren;
    $this->_expression = $expression;
    $this->_right_paren = $right_paren;
    $this->_opening_colon = $opening_colon;
    $this->_sections = $sections;
    $this->_closing_endswitch = $closing_endswitch;
    $this->_closing_semicolon = $closing_semicolon;
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
      /* UNSAFE_EXPR */ $json['alternate_switch_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_switch_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_switch_expression'],
      $file,
      $offset,
      $source
    );
    $offset += $expression->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_switch_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    $opening_colon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_switch_opening_colon'],
      $file,
      $offset,
      $source
    );
    $offset += $opening_colon->getWidth();
    $sections = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_switch_sections'],
      $file,
      $offset,
      $source
    );
    $offset += $sections->getWidth();
    $closing_endswitch = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_switch_closing_endswitch'],
      $file,
      $offset,
      $source
    );
    $offset += $closing_endswitch->getWidth();
    $closing_semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_switch_closing_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $closing_semicolon->getWidth();
    return new static(
      $keyword,
      $left_paren,
      $expression,
      $right_paren,
      $opening_colon,
      $sections,
      $closing_endswitch,
      $closing_semicolon
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'left_paren' => $this->_left_paren,
      'expression' => $this->_expression,
      'right_paren' => $this->_right_paren,
      'opening_colon' => $this->_opening_colon,
      'sections' => $this->_sections,
      'closing_endswitch' => $this->_closing_endswitch,
      'closing_semicolon' => $this->_closing_semicolon,
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
    $expression = $this->_expression->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    $opening_colon = $this->_opening_colon->rewrite($rewriter, $parents);
    $sections = $this->_sections->rewrite($rewriter, $parents);
    $closing_endswitch =
      $this->_closing_endswitch->rewrite($rewriter, $parents);
    $closing_semicolon =
      $this->_closing_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $left_paren === $this->_left_paren &&
      $expression === $this->_expression &&
      $right_paren === $this->_right_paren &&
      $opening_colon === $this->_opening_colon &&
      $sections === $this->_sections &&
      $closing_endswitch === $this->_closing_endswitch &&
      $closing_semicolon === $this->_closing_semicolon
    ) {
      return $this;
    }
    return new static(
      $keyword,
      $left_paren,
      $expression,
      $right_paren,
      $opening_colon,
      $sections,
      $closing_endswitch,
      $closing_semicolon
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
      $this->_expression,
      $this->_right_paren,
      $this->_opening_colon,
      $this->_sections,
      $this->_closing_endswitch,
      $this->_closing_semicolon
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return SwitchToken
   */
  public function getKeyword(): SwitchToken {
    \assert($this->_keyword instanceof SwitchToken);
    return $this->_keyword;
  }

  /**
   * @return SwitchToken
   */
  public function getKeywordx(): SwitchToken {
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
      $this->_expression,
      $this->_right_paren,
      $this->_opening_colon,
      $this->_sections,
      $this->_closing_endswitch,
      $this->_closing_semicolon
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

  public function getExpressionUNTYPED(): EditableNode {
    return $this->_expression;
  }

  /**
   * @return static
   */
  public function withExpression(EditableNode $value) {
    if ($value === $this->_expression) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $value,
      $this->_right_paren,
      $this->_opening_colon,
      $this->_sections,
      $this->_closing_endswitch,
      $this->_closing_semicolon
    );
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @return LiteralExpression | VariableExpression
   */
  public function getExpression(): EditableNode {
    \assert($this->_expression instanceof EditableNode);
    return $this->_expression;
  }

  /**
   * @return LiteralExpression | VariableExpression
   */
  public function getExpressionx(): EditableNode {
    return $this->getExpression();
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
      $this->_expression,
      $value,
      $this->_opening_colon,
      $this->_sections,
      $this->_closing_endswitch,
      $this->_closing_semicolon
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

  public function getOpeningColonUNTYPED(): EditableNode {
    return $this->_opening_colon;
  }

  /**
   * @return static
   */
  public function withOpeningColon(EditableNode $value) {
    if ($value === $this->_opening_colon) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_expression,
      $this->_right_paren,
      $value,
      $this->_sections,
      $this->_closing_endswitch,
      $this->_closing_semicolon
    );
  }

  public function hasOpeningColon(): bool {
    return !$this->_opening_colon->isMissing();
  }

  /**
   * @return ColonToken
   */
  public function getOpeningColon(): ColonToken {
    \assert($this->_opening_colon instanceof ColonToken);
    return $this->_opening_colon;
  }

  /**
   * @return ColonToken
   */
  public function getOpeningColonx(): ColonToken {
    return $this->getOpeningColon();
  }

  public function getSectionsUNTYPED(): EditableNode {
    return $this->_sections;
  }

  /**
   * @return static
   */
  public function withSections(EditableNode $value) {
    if ($value === $this->_sections) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_expression,
      $this->_right_paren,
      $this->_opening_colon,
      $value,
      $this->_closing_endswitch,
      $this->_closing_semicolon
    );
  }

  public function hasSections(): bool {
    return !$this->_sections->isMissing();
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getSections(): EditableList {
    \assert($this->_sections instanceof EditableList);
    return $this->_sections;
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getSectionsx(): EditableList {
    return $this->getSections();
  }

  public function getClosingEndswitchUNTYPED(): EditableNode {
    return $this->_closing_endswitch;
  }

  /**
   * @return static
   */
  public function withClosingEndswitch(EditableNode $value) {
    if ($value === $this->_closing_endswitch) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_expression,
      $this->_right_paren,
      $this->_opening_colon,
      $this->_sections,
      $value,
      $this->_closing_semicolon
    );
  }

  public function hasClosingEndswitch(): bool {
    return !$this->_closing_endswitch->isMissing();
  }

  /**
   * @return EndswitchToken
   */
  public function getClosingEndswitch(): EndswitchToken {
    \assert($this->_closing_endswitch instanceof EndswitchToken);
    return $this->_closing_endswitch;
  }

  /**
   * @return EndswitchToken
   */
  public function getClosingEndswitchx(): EndswitchToken {
    return $this->getClosingEndswitch();
  }

  public function getClosingSemicolonUNTYPED(): EditableNode {
    return $this->_closing_semicolon;
  }

  /**
   * @return static
   */
  public function withClosingSemicolon(EditableNode $value) {
    if ($value === $this->_closing_semicolon) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_paren,
      $this->_expression,
      $this->_right_paren,
      $this->_opening_colon,
      $this->_sections,
      $this->_closing_endswitch,
      $value
    );
  }

  public function hasClosingSemicolon(): bool {
    return !$this->_closing_semicolon->isMissing();
  }

  /**
   * @return SemicolonToken
   */
  public function getClosingSemicolon(): SemicolonToken {
    \assert($this->_closing_semicolon instanceof SemicolonToken);
    return $this->_closing_semicolon;
  }

  /**
   * @return SemicolonToken
   */
  public function getClosingSemicolonx(): SemicolonToken {
    return $this->getClosingSemicolon();
  }
}
