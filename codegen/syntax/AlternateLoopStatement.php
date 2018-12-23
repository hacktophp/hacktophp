<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1821d54b9310e323be7d5b5ed47f6a28>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

abstract class AlternateLoopStatementGeneratedBase
  extends EditableNode
  implements IControlFlowStatement, ILoopStatement {

  /**
   * @var EditableNode
   */
  private $_opening_colon;
  /**
   * @var EditableNode
   */
  private $_statements;
  /**
   * @var EditableNode
   */
  private $_closing_keyword;
  /**
   * @var EditableNode
   */
  private $_closing_semicolon;

  public function __construct(
    EditableNode $opening_colon,
    EditableNode $statements,
    EditableNode $closing_keyword,
    EditableNode $closing_semicolon
  ) {
    parent::__construct('alternate_loop_statement');
    $this->_opening_colon = $opening_colon;
    $this->_statements = $statements;
    $this->_closing_keyword = $closing_keyword;
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
    $opening_colon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_loop_opening_colon'],
      $file,
      $offset,
      $source
    );
    $offset += $opening_colon->getWidth();
    $statements = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_loop_statements'],
      $file,
      $offset,
      $source
    );
    $offset += $statements->getWidth();
    $closing_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_loop_closing_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $closing_keyword->getWidth();
    $closing_semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_loop_closing_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $closing_semicolon->getWidth();
    return new static(
      $opening_colon,
      $statements,
      $closing_keyword,
      $closing_semicolon
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'opening_colon' => $this->_opening_colon,
      'statements' => $this->_statements,
      'closing_keyword' => $this->_closing_keyword,
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
    $opening_colon = $this->_opening_colon->rewrite($rewriter, $parents);
    $statements = $this->_statements->rewrite($rewriter, $parents);
    $closing_keyword = $this->_closing_keyword->rewrite($rewriter, $parents);
    $closing_semicolon =
      $this->_closing_semicolon->rewrite($rewriter, $parents);
    if (
      $opening_colon === $this->_opening_colon &&
      $statements === $this->_statements &&
      $closing_keyword === $this->_closing_keyword &&
      $closing_semicolon === $this->_closing_semicolon
    ) {
      return $this;
    }
    return new static(
      $opening_colon,
      $statements,
      $closing_keyword,
      $closing_semicolon
    );
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
      $value,
      $this->_statements,
      $this->_closing_keyword,
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

  public function getStatementsUNTYPED(): EditableNode {
    return $this->_statements;
  }

  /**
   * @return static
   */
  public function withStatements(EditableNode $value) {
    if ($value === $this->_statements) {
      return $this;
    }
    return new static(
      $this->_opening_colon,
      $value,
      $this->_closing_keyword,
      $this->_closing_semicolon
    );
  }

  public function hasStatements(): bool {
    return !$this->_statements->isMissing();
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getStatements(): EditableList {
    \assert($this->_statements instanceof EditableList);
    return $this->_statements;
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getStatementsx(): EditableList {
    return $this->getStatements();
  }

  public function getClosingKeywordUNTYPED(): EditableNode {
    return $this->_closing_keyword;
  }

  /**
   * @return static
   */
  public function withClosingKeyword(EditableNode $value) {
    if ($value === $this->_closing_keyword) {
      return $this;
    }
    return new static(
      $this->_opening_colon,
      $this->_statements,
      $value,
      $this->_closing_semicolon
    );
  }

  public function hasClosingKeyword(): bool {
    return !$this->_closing_keyword->isMissing();
  }

  /**
   * @return EnddeclareToken | EndforToken | EndforeachToken | EndwhileToken
   */
  public function getClosingKeyword(): EditableToken {
    \assert($this->_closing_keyword instanceof EditableToken);
    return $this->_closing_keyword;
  }

  /**
   * @return EnddeclareToken | EndforToken | EndforeachToken | EndwhileToken
   */
  public function getClosingKeywordx(): EditableToken {
    return $this->getClosingKeyword();
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
      $this->_opening_colon,
      $this->_statements,
      $this->_closing_keyword,
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
