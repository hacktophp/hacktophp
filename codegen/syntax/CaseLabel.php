<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<95ba351dd1e2416868685f615e77dcfc>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class CaseLabel extends EditableNode {

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
  private $_colon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $expression,
    EditableNode $colon
  ) {
    parent::__construct('case_label');
    $this->_keyword = $keyword;
    $this->_expression = $expression;
    $this->_colon = $colon;
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
      /* UNSAFE_EXPR */ $json['case_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['case_expression'],
      $file,
      $offset,
      $source
    );
    $offset += $expression->getWidth();
    $colon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['case_colon'],
      $file,
      $offset,
      $source
    );
    $offset += $colon->getWidth();
    return new static($keyword, $expression, $colon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'expression' => $this->_expression,
      'colon' => $this->_colon,
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
    $colon = $this->_colon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $expression === $this->_expression &&
      $colon === $this->_colon
    ) {
      return $this;
    }
    return new static($keyword, $expression, $colon);
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
    return new static($value, $this->_expression, $this->_colon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return CaseToken
   */
  public function getKeyword(): CaseToken {
    \assert($this->_keyword instanceof CaseToken);
    return $this->_keyword;
  }

  /**
   * @return CaseToken
   */
  public function getKeywordx(): CaseToken {
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
    return new static($this->_keyword, $value, $this->_colon);
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @return ArrayIntrinsicExpression | FunctionCallExpression |
   * InstanceofExpression | LiteralExpression | PrefixUnaryExpression |
   * ScopeResolutionExpression | NameToken | VariableExpression
   */
  public function getExpression(): EditableNode {
    \assert($this->_expression instanceof EditableNode);
    return $this->_expression;
  }

  /**
   * @return ArrayIntrinsicExpression | FunctionCallExpression |
   * InstanceofExpression | LiteralExpression | PrefixUnaryExpression |
   * ScopeResolutionExpression | NameToken | VariableExpression
   */
  public function getExpressionx(): EditableNode {
    return $this->getExpression();
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
    return new static($this->_keyword, $this->_expression, $value);
  }

  public function hasColon(): bool {
    return !$this->_colon->isMissing();
  }

  /**
   * @return ColonToken | SemicolonToken
   */
  public function getColon(): EditableToken {
    \assert($this->_colon instanceof EditableToken);
    return $this->_colon;
  }

  /**
   * @return ColonToken | SemicolonToken
   */
  public function getColonx(): EditableToken {
    return $this->getColon();
  }
}
