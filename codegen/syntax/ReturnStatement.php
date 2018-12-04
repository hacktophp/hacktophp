<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a86ee9f4877d5eb1083fbbda254887e3>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class ReturnStatement extends EditableNode {

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
    parent::__construct('return_statement');
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
      /* UNSAFE_EXPR */ $json['return_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['return_expression'],
      $file,
      $offset,
      $source
    );
    $offset += $expression->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['return_semicolon'],
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
   * @return ReturnToken
   */
  public function getKeyword(): ReturnToken {
    \assert($this->_keyword instanceof ReturnToken);
    return $this->_keyword;
  }

  /**
   * @return ReturnToken
   */
  public function getKeywordx(): ReturnToken {
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
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | AsExpression | AwaitableCreationExpression |
   * BinaryExpression | CastExpression | CollectionLiteralExpression |
   * ConditionalExpression | DarrayIntrinsicExpression |
   * DictionaryIntrinsicExpression | EmptyExpression | EvalExpression |
   * FunctionCallExpression | FunctionCallWithTypeArgumentsExpression |
   * InstanceofExpression | IsExpression | IssetExpression |
   * KeysetIntrinsicExpression | LambdaExpression | LiteralExpression |
   * MemberSelectionExpression | Missing | ObjectCreationExpression |
   * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
   * QualifiedName | SafeMemberSelectionExpression | ScopeResolutionExpression
   * | ShapeExpression | SubscriptExpression | NameToken | TupleExpression |
   * VariableExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression
   * | XHPExpression | YieldFromExpression
   */
  public function getExpression(): ?EditableNode {
    if ($this->_expression->isMissing()) {
      return null;
    }
    \assert($this->_expression instanceof EditableNode);
    return $this->_expression;
  }

  /**
   * @return AnonymousFunction | ArrayCreationExpression |
   * ArrayIntrinsicExpression | AsExpression | AwaitableCreationExpression |
   * BinaryExpression | CastExpression | CollectionLiteralExpression |
   * ConditionalExpression | DarrayIntrinsicExpression |
   * DictionaryIntrinsicExpression | EmptyExpression | EvalExpression |
   * FunctionCallExpression | FunctionCallWithTypeArgumentsExpression |
   * InstanceofExpression | IsExpression | IssetExpression |
   * KeysetIntrinsicExpression | LambdaExpression | LiteralExpression |
   * MemberSelectionExpression | ObjectCreationExpression |
   * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
   * QualifiedName | SafeMemberSelectionExpression | ScopeResolutionExpression
   * | ShapeExpression | SubscriptExpression | NameToken | TupleExpression |
   * VariableExpression | VarrayIntrinsicExpression | VectorIntrinsicExpression
   * | XHPExpression | YieldFromExpression
   */
  public function getExpressionx(): EditableNode {
    \assert($this->_expression instanceof EditableNode);
    return $this->_expression;
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
   * @return null | SemicolonToken
   */
  public function getSemicolon(): ?SemicolonToken {
    if ($this->_semicolon->isMissing()) {
      return null;
    }
    \assert($this->_semicolon instanceof SemicolonToken);
    return $this->_semicolon;
  }

  /**
   * @return SemicolonToken
   */
  public function getSemicolonx(): SemicolonToken {
    \assert($this->_semicolon instanceof SemicolonToken);
    return $this->_semicolon;
  }
}
