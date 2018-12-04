<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1cdab1a5365210762fadedd2153ced8a>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class FinallyClause extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_body;

  public function __construct(EditableNode $keyword, EditableNode $body) {
    parent::__construct('finally_clause');
    $this->_keyword = $keyword;
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
      /* UNSAFE_EXPR */ $json['finally_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $body = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['finally_body'],
      $file,
      $offset,
      $source
    );
    $offset += $body->getWidth();
    return new static($keyword, $body);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
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
    $body = $this->_body->rewrite($rewriter, $parents);
    if ($keyword === $this->_keyword && $body === $this->_body) {
      return $this;
    }
    return new static($keyword, $body);
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
    return new static($value, $this->_body);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return FinallyToken
   */
  public function getKeyword(): FinallyToken {
    \assert($this->_keyword instanceof FinallyToken);
    return $this->_keyword;
  }

  /**
   * @return FinallyToken
   */
  public function getKeywordx(): FinallyToken {
    return $this->getKeyword();
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
    return new static($this->_keyword, $value);
  }

  public function hasBody(): bool {
    return !$this->_body->isMissing();
  }

  /**
   * @return CompoundStatement
   */
  public function getBody(): CompoundStatement {
    \assert($this->_body instanceof CompoundStatement);
    return $this->_body;
  }

  /**
   * @return CompoundStatement
   */
  public function getBodyx(): CompoundStatement {
    return $this->getBody();
  }
}
