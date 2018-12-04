<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<208e9d0c980408fe7e4d96f94d6296e3>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class ExpressionStatement extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_expression;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $expression,
    EditableNode $semicolon
  ) {
    parent::__construct('expression_statement');
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
    $expression = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['expression_statement_expression'],
      $file,
      $offset,
      $source
    );
    $offset += $expression->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['expression_statement_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($expression, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
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
    $expression = $this->_expression->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $expression === $this->_expression && $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($expression, $semicolon);
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
    return new static($value, $this->_semicolon);
  }

  public function hasExpression(): bool {
    return !$this->_expression->isMissing();
  }

  /**
   * @return AnonymousFunction | AsExpression | BinaryExpression |
   * CastExpression | CollectionLiteralExpression | ConditionalExpression |
   * DarrayIntrinsicExpression | DefineExpression |
   * DictionaryIntrinsicExpression | EmptyExpression | EvalExpression |
   * FunctionCallExpression | FunctionCallWithTypeArgumentsExpression |
   * HaltCompilerExpression | InclusionExpression | InstanceofExpression |
   * IssetExpression | LambdaExpression | LiteralExpression |
   * MemberSelectionExpression | Missing | ObjectCreationExpression |
   * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
   * QualifiedName | SafeMemberSelectionExpression | ScopeResolutionExpression
   * | SubscriptExpression | RightParenToken | CommaToken | ColonToken |
   * EqualEqualEqualToken | EqualGreaterThanToken | ConstToken | NameToken |
   * UseToken | RightBraceToken | VariableExpression |
   * VarrayIntrinsicExpression | XHPExpression | YieldExpression |
   * YieldFromExpression
   */
  public function getExpression(): ?EditableNode {
    if ($this->_expression->isMissing()) {
      return null;
    }
    \assert($this->_expression instanceof EditableNode);
    return $this->_expression;
  }

  /**
   * @return AnonymousFunction | AsExpression | BinaryExpression |
   * CastExpression | CollectionLiteralExpression | ConditionalExpression |
   * DarrayIntrinsicExpression | DefineExpression |
   * DictionaryIntrinsicExpression | EmptyExpression | EvalExpression |
   * FunctionCallExpression | FunctionCallWithTypeArgumentsExpression |
   * HaltCompilerExpression | InclusionExpression | InstanceofExpression |
   * IssetExpression | LambdaExpression | LiteralExpression |
   * MemberSelectionExpression | ObjectCreationExpression |
   * ParenthesizedExpression | PostfixUnaryExpression | PrefixUnaryExpression |
   * QualifiedName | SafeMemberSelectionExpression | ScopeResolutionExpression
   * | SubscriptExpression | RightParenToken | CommaToken | ColonToken |
   * EqualEqualEqualToken | EqualGreaterThanToken | ConstToken | NameToken |
   * UseToken | RightBraceToken | VariableExpression |
   * VarrayIntrinsicExpression | XHPExpression | YieldExpression |
   * YieldFromExpression
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
    return new static($this->_expression, $value);
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
