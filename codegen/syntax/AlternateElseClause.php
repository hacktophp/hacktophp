<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<846f33fdb6dcb443eb58237a067ff5b9>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class AlternateElseClause
  extends EditableNode
  implements IControlFlowStatement {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_colon;
  /**
   * @var EditableNode
   */
  private $_statement;

  public function __construct(
    EditableNode $keyword,
    EditableNode $colon,
    EditableNode $statement
  ) {
    parent::__construct('alternate_else_clause');
    $this->_keyword = $keyword;
    $this->_colon = $colon;
    $this->_statement = $statement;
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
      /* UNSAFE_EXPR */ $json['alternate_else_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $colon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_else_colon'],
      $file,
      $offset,
      $source
    );
    $offset += $colon->getWidth();
    $statement = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['alternate_else_statement'],
      $file,
      $offset,
      $source
    );
    $offset += $statement->getWidth();
    return new static($keyword, $colon, $statement);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'colon' => $this->_colon,
      'statement' => $this->_statement,
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
    $colon = $this->_colon->rewrite($rewriter, $parents);
    $statement = $this->_statement->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $colon === $this->_colon &&
      $statement === $this->_statement
    ) {
      return $this;
    }
    return new static($keyword, $colon, $statement);
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
    return new static($value, $this->_colon, $this->_statement);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns ElseToken
   */
  public function getKeyword(): ElseToken {
    return TypeAssert\instance_of(ElseToken::class, $this->_keyword);
  }

  /**
   * @returns ElseToken
   */
  public function getKeywordx(): ElseToken {
    return $this->getKeyword();
  }

  public function getColonUNTYPED(): EditableNode {
    return $this->_colon;
  }

  /**
   * @return static
   */
  public function withColon(EditableNode $value) {
    if ($value === $this->_colon) {
      return $this;
    }
    return new static($this->_keyword, $value, $this->_statement);
  }

  public function hasColon(): bool {
    return !$this->_colon->isMissing();
  }

  /**
   * @returns ColonToken
   */
  public function getColon(): ColonToken {
    return TypeAssert\instance_of(ColonToken::class, $this->_colon);
  }

  /**
   * @returns ColonToken
   */
  public function getColonx(): ColonToken {
    return $this->getColon();
  }

  public function getStatementUNTYPED(): EditableNode {
    return $this->_statement;
  }

  /**
   * @return static
   */
  public function withStatement(EditableNode $value) {
    if ($value === $this->_statement) {
      return $this;
    }
    return new static($this->_keyword, $this->_colon, $value);
  }

  public function hasStatement(): bool {
    return !$this->_statement->isMissing();
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getStatement(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_statement);
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getStatementx(): EditableList {
    return $this->getStatement();
  }
}
