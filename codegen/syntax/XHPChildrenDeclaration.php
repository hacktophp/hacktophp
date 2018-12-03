<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5e277fd59db12925c65364b45d2f5ea2>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class XHPChildrenDeclaration extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_expression;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $expression,
    EditableNode $semicolon
  ) {
    parent::__construct('xhp_children_declaration');
    $this->_keyword = $keyword;
    $this->_expression = $expression;
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
      /* UNSAFE_EXPR */ $json['xhp_children_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_children_expression'],
      $file,
      $offset,
      $source
    );
    $offset += $expression->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_children_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($keyword, $expression, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'expression' => $this->_expression,
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
    $expression = $this->_expression->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $expression === $this->_expression &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($keyword, $expression, $semicolon);
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
    return new static($value, $this->_expression, $this->_semicolon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getKeyword(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_keyword);
  }

  /**
   * @returns unknown
   */
  public function getKeywordx(): EditableNode {
    return $this->getKeyword();
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
    return new static($this->_keyword, $value, $this->_semicolon);
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getExpression(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_expression);
  }

  /**
   * @returns unknown
   */
  public function getExpressionx(): EditableNode {
    return $this->getExpression();
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
    return new static($this->_keyword, $this->_expression, $value);
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getSemicolon(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_semicolon);
  }

  /**
   * @returns unknown
   */
  public function getSemicolonx(): EditableNode {
    return $this->getSemicolon();
  }
}
