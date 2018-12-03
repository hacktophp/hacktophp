<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4c6a37864effc40565d4b6f978a5d07f>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class Php7AnonymousFunction extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_attribute_spec;
  /**
   * @var EditableNode
   */
  private $_static_keyword;
  /**
   * @var EditableNode
   */
  private $_async_keyword;
  /**
   * @var EditableNode
   */
  private $_coroutine_keyword;
  /**
   * @var EditableNode
   */
  private $_function_keyword;
  /**
   * @var EditableNode
   */
  private $_ampersand;
  /**
   * @var EditableNode
   */
  private $_left_paren;
  /**
   * @var EditableNode
   */
  private $_parameters;
  /**
   * @var EditableNode
   */
  private $_right_paren;
  /**
   * @var EditableNode
   */
  private $_use;
  /**
   * @var EditableNode
   */
  private $_colon;
  /**
   * @var EditableNode
   */
  private $_type;
  /**
   * @var EditableNode
   */
  private $_body;

  public function __construct(
    EditableNode $attribute_spec,
    EditableNode $static_keyword,
    EditableNode $async_keyword,
    EditableNode $coroutine_keyword,
    EditableNode $function_keyword,
    EditableNode $ampersand,
    EditableNode $left_paren,
    EditableNode $parameters,
    EditableNode $right_paren,
    EditableNode $use,
    EditableNode $colon,
    EditableNode $type,
    EditableNode $body
  ) {
    parent::__construct('php7_anonymous_function');
    $this->_attribute_spec = $attribute_spec;
    $this->_static_keyword = $static_keyword;
    $this->_async_keyword = $async_keyword;
    $this->_coroutine_keyword = $coroutine_keyword;
    $this->_function_keyword = $function_keyword;
    $this->_ampersand = $ampersand;
    $this->_left_paren = $left_paren;
    $this->_parameters = $parameters;
    $this->_right_paren = $right_paren;
    $this->_use = $use;
    $this->_colon = $colon;
    $this->_type = $type;
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
    $attribute_spec = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_attribute_spec'],
      $file,
      $offset,
      $source
    );
    $offset += $attribute_spec->getWidth();
    $static_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_static_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $static_keyword->getWidth();
    $async_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_async_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $async_keyword->getWidth();
    $coroutine_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_coroutine_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $coroutine_keyword->getWidth();
    $function_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_function_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $function_keyword->getWidth();
    $ampersand = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_ampersand'],
      $file,
      $offset,
      $source
    );
    $offset += $ampersand->getWidth();
    $left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $left_paren->getWidth();
    $parameters = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_parameters'],
      $file,
      $offset,
      $source
    );
    $offset += $parameters->getWidth();
    $right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $right_paren->getWidth();
    $use = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_use'],
      $file,
      $offset,
      $source
    );
    $offset += $use->getWidth();
    $colon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_colon'],
      $file,
      $offset,
      $source
    );
    $offset += $colon->getWidth();
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    $body = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['php7_anonymous_body'],
      $file,
      $offset,
      $source
    );
    $offset += $body->getWidth();
    return new static(
      $attribute_spec,
      $static_keyword,
      $async_keyword,
      $coroutine_keyword,
      $function_keyword,
      $ampersand,
      $left_paren,
      $parameters,
      $right_paren,
      $use,
      $colon,
      $type,
      $body
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'attribute_spec' => $this->_attribute_spec,
      'static_keyword' => $this->_static_keyword,
      'async_keyword' => $this->_async_keyword,
      'coroutine_keyword' => $this->_coroutine_keyword,
      'function_keyword' => $this->_function_keyword,
      'ampersand' => $this->_ampersand,
      'left_paren' => $this->_left_paren,
      'parameters' => $this->_parameters,
      'right_paren' => $this->_right_paren,
      'use' => $this->_use,
      'colon' => $this->_colon,
      'type' => $this->_type,
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
    $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
    $static_keyword = $this->_static_keyword->rewrite($rewriter, $parents);
    $async_keyword = $this->_async_keyword->rewrite($rewriter, $parents);
    $coroutine_keyword =
      $this->_coroutine_keyword->rewrite($rewriter, $parents);
    $function_keyword = $this->_function_keyword->rewrite($rewriter, $parents);
    $ampersand = $this->_ampersand->rewrite($rewriter, $parents);
    $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
    $parameters = $this->_parameters->rewrite($rewriter, $parents);
    $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
    $use = $this->_use->rewrite($rewriter, $parents);
    $colon = $this->_colon->rewrite($rewriter, $parents);
    $type = $this->_type->rewrite($rewriter, $parents);
    $body = $this->_body->rewrite($rewriter, $parents);
    if (
      $attribute_spec === $this->_attribute_spec &&
      $static_keyword === $this->_static_keyword &&
      $async_keyword === $this->_async_keyword &&
      $coroutine_keyword === $this->_coroutine_keyword &&
      $function_keyword === $this->_function_keyword &&
      $ampersand === $this->_ampersand &&
      $left_paren === $this->_left_paren &&
      $parameters === $this->_parameters &&
      $right_paren === $this->_right_paren &&
      $use === $this->_use &&
      $colon === $this->_colon &&
      $type === $this->_type &&
      $body === $this->_body
    ) {
      return $this;
    }
    return new static(
      $attribute_spec,
      $static_keyword,
      $async_keyword,
      $coroutine_keyword,
      $function_keyword,
      $ampersand,
      $left_paren,
      $parameters,
      $right_paren,
      $use,
      $colon,
      $type,
      $body
    );
  }

  public function getAttributeSpecUNTYPED(): EditableNode {
    return $this->_attribute_spec;
  }

  /**
   * @return static
   */
  public function withAttributeSpec(EditableNode $value) {
    if ($value === $this->_attribute_spec) {
      return $this;
    }
    return new static(
      $value,
      $this->_static_keyword,
      $this->_async_keyword,
      $this->_coroutine_keyword,
      $this->_function_keyword,
      $this->_ampersand,
      $this->_left_paren,
      $this->_parameters,
      $this->_right_paren,
      $this->_use,
      $this->_colon,
      $this->_type,
      $this->_body
    );
  }

  public function hasAttributeSpec(): bool {
    return !$this->_attribute_spec->isMissing();
  }

  /**
   * @returns Missing
   */
  public function getAttributeSpec(): ?EditableNode {
    if ($this->_attribute_spec->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_attribute_spec);
  }

  /**
   * @returns
   */
  public function getAttributeSpecx(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_attribute_spec);
  }

  public function getStaticKeywordUNTYPED(): EditableNode {
    return $this->_static_keyword;
  }

  /**
   * @return static
   */
  public function withStaticKeyword(EditableNode $value) {
    if ($value === $this->_static_keyword) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $value,
      $this->_async_keyword,
      $this->_coroutine_keyword,
      $this->_function_keyword,
      $this->_ampersand,
      $this->_left_paren,
      $this->_parameters,
      $this->_right_paren,
      $this->_use,
      $this->_colon,
      $this->_type,
      $this->_body
    );
  }

  public function hasStaticKeyword(): bool {
    return !$this->_static_keyword->isMissing();
  }

  /**
   * @returns Missing
   */
  public function getStaticKeyword(): ?EditableNode {
    if ($this->_static_keyword->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_static_keyword);
  }

  /**
   * @returns
   */
  public function getStaticKeywordx(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_static_keyword);
  }

  public function getAsyncKeywordUNTYPED(): EditableNode {
    return $this->_async_keyword;
  }

  /**
   * @return static
   */
  public function withAsyncKeyword(EditableNode $value) {
    if ($value === $this->_async_keyword) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $this->_static_keyword,
      $value,
      $this->_coroutine_keyword,
      $this->_function_keyword,
      $this->_ampersand,
      $this->_left_paren,
      $this->_parameters,
      $this->_right_paren,
      $this->_use,
      $this->_colon,
      $this->_type,
      $this->_body
    );
  }

  public function hasAsyncKeyword(): bool {
    return !$this->_async_keyword->isMissing();
  }

  /**
   * @returns Missing
   */
  public function getAsyncKeyword(): ?EditableNode {
    if ($this->_async_keyword->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_async_keyword);
  }

  /**
   * @returns
   */
  public function getAsyncKeywordx(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_async_keyword);
  }

  public function getCoroutineKeywordUNTYPED(): EditableNode {
    return $this->_coroutine_keyword;
  }

  /**
   * @return static
   */
  public function withCoroutineKeyword(EditableNode $value) {
    if ($value === $this->_coroutine_keyword) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $this->_static_keyword,
      $this->_async_keyword,
      $value,
      $this->_function_keyword,
      $this->_ampersand,
      $this->_left_paren,
      $this->_parameters,
      $this->_right_paren,
      $this->_use,
      $this->_colon,
      $this->_type,
      $this->_body
    );
  }

  public function hasCoroutineKeyword(): bool {
    return !$this->_coroutine_keyword->isMissing();
  }

  /**
   * @returns Missing
   */
  public function getCoroutineKeyword(): ?EditableNode {
    if ($this->_coroutine_keyword->isMissing()) {
      return null;
    }
    return
      TypeAssert\instance_of(EditableNode::class, $this->_coroutine_keyword);
  }

  /**
   * @returns
   */
  public function getCoroutineKeywordx(): EditableNode {
    return
      TypeAssert\instance_of(EditableNode::class, $this->_coroutine_keyword);
  }

  public function getFunctionKeywordUNTYPED(): EditableNode {
    return $this->_function_keyword;
  }

  /**
   * @return static
   */
  public function withFunctionKeyword(EditableNode $value) {
    if ($value === $this->_function_keyword) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $this->_static_keyword,
      $this->_async_keyword,
      $this->_coroutine_keyword,
      $value,
      $this->_ampersand,
      $this->_left_paren,
      $this->_parameters,
      $this->_right_paren,
      $this->_use,
      $this->_colon,
      $this->_type,
      $this->_body
    );
  }

  public function hasFunctionKeyword(): bool {
    return !$this->_function_keyword->isMissing();
  }

  /**
   * @returns FunctionToken
   */
  public function getFunctionKeyword(): FunctionToken {
    return
      TypeAssert\instance_of(FunctionToken::class, $this->_function_keyword);
  }

  /**
   * @returns FunctionToken
   */
  public function getFunctionKeywordx(): FunctionToken {
    return $this->getFunctionKeyword();
  }

  public function getAmpersandUNTYPED(): EditableNode {
    return $this->_ampersand;
  }

  /**
   * @return static
   */
  public function withAmpersand(EditableNode $value) {
    if ($value === $this->_ampersand) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $this->_static_keyword,
      $this->_async_keyword,
      $this->_coroutine_keyword,
      $this->_function_keyword,
      $value,
      $this->_left_paren,
      $this->_parameters,
      $this->_right_paren,
      $this->_use,
      $this->_colon,
      $this->_type,
      $this->_body
    );
  }

  public function hasAmpersand(): bool {
    return !$this->_ampersand->isMissing();
  }

  /**
   * @returns Missing
   */
  public function getAmpersand(): ?EditableNode {
    if ($this->_ampersand->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_ampersand);
  }

  /**
   * @returns
   */
  public function getAmpersandx(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_ampersand);
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
      $this->_attribute_spec,
      $this->_static_keyword,
      $this->_async_keyword,
      $this->_coroutine_keyword,
      $this->_function_keyword,
      $this->_ampersand,
      $value,
      $this->_parameters,
      $this->_right_paren,
      $this->_use,
      $this->_colon,
      $this->_type,
      $this->_body
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

  public function getParametersUNTYPED(): EditableNode {
    return $this->_parameters;
  }

  /**
   * @return static
   */
  public function withParameters(EditableNode $value) {
    if ($value === $this->_parameters) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $this->_static_keyword,
      $this->_async_keyword,
      $this->_coroutine_keyword,
      $this->_function_keyword,
      $this->_ampersand,
      $this->_left_paren,
      $value,
      $this->_right_paren,
      $this->_use,
      $this->_colon,
      $this->_type,
      $this->_body
    );
  }

  public function hasParameters(): bool {
    return !$this->_parameters->isMissing();
  }

  /**
   * @returns Missing
   */
  public function getParameters(): ?EditableNode {
    if ($this->_parameters->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_parameters);
  }

  /**
   * @returns
   */
  public function getParametersx(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_parameters);
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
      $this->_attribute_spec,
      $this->_static_keyword,
      $this->_async_keyword,
      $this->_coroutine_keyword,
      $this->_function_keyword,
      $this->_ampersand,
      $this->_left_paren,
      $this->_parameters,
      $value,
      $this->_use,
      $this->_colon,
      $this->_type,
      $this->_body
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

  public function getUseUNTYPED(): EditableNode {
    return $this->_use;
  }

  /**
   * @return static
   */
  public function withUse(EditableNode $value) {
    if ($value === $this->_use) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $this->_static_keyword,
      $this->_async_keyword,
      $this->_coroutine_keyword,
      $this->_function_keyword,
      $this->_ampersand,
      $this->_left_paren,
      $this->_parameters,
      $this->_right_paren,
      $value,
      $this->_colon,
      $this->_type,
      $this->_body
    );
  }

  public function hasUse(): bool {
    return !$this->_use->isMissing();
  }

  /**
   * @returns AnonymousFunctionUseClause
   */
  public function getUse(): AnonymousFunctionUseClause {
    return
      TypeAssert\instance_of(AnonymousFunctionUseClause::class, $this->_use);
  }

  /**
   * @returns AnonymousFunctionUseClause
   */
  public function getUsex(): AnonymousFunctionUseClause {
    return $this->getUse();
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
    return new static(
      $this->_attribute_spec,
      $this->_static_keyword,
      $this->_async_keyword,
      $this->_coroutine_keyword,
      $this->_function_keyword,
      $this->_ampersand,
      $this->_left_paren,
      $this->_parameters,
      $this->_right_paren,
      $this->_use,
      $value,
      $this->_type,
      $this->_body
    );
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

  public function getTypeUNTYPED(): EditableNode {
    return $this->_type;
  }

  /**
   * @return static
   */
  public function withType(EditableNode $value) {
    if ($value === $this->_type) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $this->_static_keyword,
      $this->_async_keyword,
      $this->_coroutine_keyword,
      $this->_function_keyword,
      $this->_ampersand,
      $this->_left_paren,
      $this->_parameters,
      $this->_right_paren,
      $this->_use,
      $this->_colon,
      $value,
      $this->_body
    );
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @returns SimpleTypeSpecifier
   */
  public function getType(): SimpleTypeSpecifier {
    return TypeAssert\instance_of(SimpleTypeSpecifier::class, $this->_type);
  }

  /**
   * @returns SimpleTypeSpecifier
   */
  public function getTypex(): SimpleTypeSpecifier {
    return $this->getType();
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
      $this->_attribute_spec,
      $this->_static_keyword,
      $this->_async_keyword,
      $this->_coroutine_keyword,
      $this->_function_keyword,
      $this->_ampersand,
      $this->_left_paren,
      $this->_parameters,
      $this->_right_paren,
      $this->_use,
      $this->_colon,
      $this->_type,
      $value
    );
  }

  public function hasBody(): bool {
    return !$this->_body->isMissing();
  }

  /**
   * @returns CompoundStatement
   */
  public function getBody(): CompoundStatement {
    return TypeAssert\instance_of(CompoundStatement::class, $this->_body);
  }

  /**
   * @returns CompoundStatement
   */
  public function getBodyx(): CompoundStatement {
    return $this->getBody();
  }
}
