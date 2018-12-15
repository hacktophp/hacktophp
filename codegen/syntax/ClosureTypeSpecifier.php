<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<da7ced607a32ed2292d73594362d2d70>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class ClosureTypeSpecifier extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_outer_left_paren;
  /**
   * @var EditableNode
   */
  private $_coroutine;
  /**
   * @var EditableNode
   */
  private $_function_keyword;
  /**
   * @var EditableNode
   */
  private $_inner_left_paren;
  /**
   * @var EditableNode
   */
  private $_parameter_list;
  /**
   * @var EditableNode
   */
  private $_inner_right_paren;
  /**
   * @var EditableNode
   */
  private $_colon;
  /**
   * @var EditableNode
   */
  private $_return_type;
  /**
   * @var EditableNode
   */
  private $_outer_right_paren;

  public function __construct(
    EditableNode $outer_left_paren,
    EditableNode $coroutine,
    EditableNode $function_keyword,
    EditableNode $inner_left_paren,
    EditableNode $parameter_list,
    EditableNode $inner_right_paren,
    EditableNode $colon,
    EditableNode $return_type,
    EditableNode $outer_right_paren
  ) {
    parent::__construct('closure_type_specifier');
    $this->_outer_left_paren = $outer_left_paren;
    $this->_coroutine = $coroutine;
    $this->_function_keyword = $function_keyword;
    $this->_inner_left_paren = $inner_left_paren;
    $this->_parameter_list = $parameter_list;
    $this->_inner_right_paren = $inner_right_paren;
    $this->_colon = $colon;
    $this->_return_type = $return_type;
    $this->_outer_right_paren = $outer_right_paren;
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
    $outer_left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['closure_outer_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $outer_left_paren->getWidth();
    $coroutine = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['closure_coroutine'],
      $file,
      $offset,
      $source
    );
    $offset += $coroutine->getWidth();
    $function_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['closure_function_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $function_keyword->getWidth();
    $inner_left_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['closure_inner_left_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $inner_left_paren->getWidth();
    $parameter_list = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['closure_parameter_list'],
      $file,
      $offset,
      $source
    );
    $offset += $parameter_list->getWidth();
    $inner_right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['closure_inner_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $inner_right_paren->getWidth();
    $colon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['closure_colon'],
      $file,
      $offset,
      $source
    );
    $offset += $colon->getWidth();
    $return_type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['closure_return_type'],
      $file,
      $offset,
      $source
    );
    $offset += $return_type->getWidth();
    $outer_right_paren = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['closure_outer_right_paren'],
      $file,
      $offset,
      $source
    );
    $offset += $outer_right_paren->getWidth();
    return new static(
      $outer_left_paren,
      $coroutine,
      $function_keyword,
      $inner_left_paren,
      $parameter_list,
      $inner_right_paren,
      $colon,
      $return_type,
      $outer_right_paren
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'outer_left_paren' => $this->_outer_left_paren,
      'coroutine' => $this->_coroutine,
      'function_keyword' => $this->_function_keyword,
      'inner_left_paren' => $this->_inner_left_paren,
      'parameter_list' => $this->_parameter_list,
      'inner_right_paren' => $this->_inner_right_paren,
      'colon' => $this->_colon,
      'return_type' => $this->_return_type,
      'outer_right_paren' => $this->_outer_right_paren,
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
    $outer_left_paren = $this->_outer_left_paren->rewrite($rewriter, $parents);
    $coroutine = $this->_coroutine->rewrite($rewriter, $parents);
    $function_keyword = $this->_function_keyword->rewrite($rewriter, $parents);
    $inner_left_paren = $this->_inner_left_paren->rewrite($rewriter, $parents);
    $parameter_list = $this->_parameter_list->rewrite($rewriter, $parents);
    $inner_right_paren =
      $this->_inner_right_paren->rewrite($rewriter, $parents);
    $colon = $this->_colon->rewrite($rewriter, $parents);
    $return_type = $this->_return_type->rewrite($rewriter, $parents);
    $outer_right_paren =
      $this->_outer_right_paren->rewrite($rewriter, $parents);
    if (
      $outer_left_paren === $this->_outer_left_paren &&
      $coroutine === $this->_coroutine &&
      $function_keyword === $this->_function_keyword &&
      $inner_left_paren === $this->_inner_left_paren &&
      $parameter_list === $this->_parameter_list &&
      $inner_right_paren === $this->_inner_right_paren &&
      $colon === $this->_colon &&
      $return_type === $this->_return_type &&
      $outer_right_paren === $this->_outer_right_paren
    ) {
      return $this;
    }
    return new static(
      $outer_left_paren,
      $coroutine,
      $function_keyword,
      $inner_left_paren,
      $parameter_list,
      $inner_right_paren,
      $colon,
      $return_type,
      $outer_right_paren
    );
  }

  public function getOuterLeftParenUNTYPED(): EditableNode {
    return $this->_outer_left_paren;
  }

  /**
   * @return static
   */
  public function withOuterLeftParen(EditableNode $value) {
    if ($value === $this->_outer_left_paren) {
      return $this;
    }
    return new static(
      $value,
      $this->_coroutine,
      $this->_function_keyword,
      $this->_inner_left_paren,
      $this->_parameter_list,
      $this->_inner_right_paren,
      $this->_colon,
      $this->_return_type,
      $this->_outer_right_paren
    );
  }

  public function hasOuterLeftParen(): bool {
    return !$this->_outer_left_paren->isMissing();
  }

  /**
   * @return LeftParenToken
   */
  public function getOuterLeftParen(): LeftParenToken {
    \assert($this->_outer_left_paren instanceof LeftParenToken);
    return $this->_outer_left_paren;
  }

  /**
   * @return LeftParenToken
   */
  public function getOuterLeftParenx(): LeftParenToken {
    return $this->getOuterLeftParen();
  }

  public function getCoroutineUNTYPED(): EditableNode {
    return $this->_coroutine;
  }

  /**
   * @return static
   */
  public function withCoroutine(EditableNode $value) {
    if ($value === $this->_coroutine) {
      return $this;
    }
    return new static(
      $this->_outer_left_paren,
      $value,
      $this->_function_keyword,
      $this->_inner_left_paren,
      $this->_parameter_list,
      $this->_inner_right_paren,
      $this->_colon,
      $this->_return_type,
      $this->_outer_right_paren
    );
  }

  public function hasCoroutine(): bool {
    return !$this->_coroutine->isMissing();
  }

  /**
   * @return null | CoroutineToken
   */
  public function getCoroutine(): ?CoroutineToken {
    if ($this->_coroutine->isMissing()) {
      return null;
    }
    \assert($this->_coroutine instanceof CoroutineToken);
    return $this->_coroutine;
  }

  /**
   * @return CoroutineToken
   */
  public function getCoroutinex(): CoroutineToken {
    \assert($this->_coroutine instanceof CoroutineToken);
    return $this->_coroutine;
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
      $this->_outer_left_paren,
      $this->_coroutine,
      $value,
      $this->_inner_left_paren,
      $this->_parameter_list,
      $this->_inner_right_paren,
      $this->_colon,
      $this->_return_type,
      $this->_outer_right_paren
    );
  }

  public function hasFunctionKeyword(): bool {
    return !$this->_function_keyword->isMissing();
  }

  /**
   * @return FunctionToken
   */
  public function getFunctionKeyword(): FunctionToken {
    \assert($this->_function_keyword instanceof FunctionToken);
    return $this->_function_keyword;
  }

  /**
   * @return FunctionToken
   */
  public function getFunctionKeywordx(): FunctionToken {
    return $this->getFunctionKeyword();
  }

  public function getInnerLeftParenUNTYPED(): EditableNode {
    return $this->_inner_left_paren;
  }

  /**
   * @return static
   */
  public function withInnerLeftParen(EditableNode $value) {
    if ($value === $this->_inner_left_paren) {
      return $this;
    }
    return new static(
      $this->_outer_left_paren,
      $this->_coroutine,
      $this->_function_keyword,
      $value,
      $this->_parameter_list,
      $this->_inner_right_paren,
      $this->_colon,
      $this->_return_type,
      $this->_outer_right_paren
    );
  }

  public function hasInnerLeftParen(): bool {
    return !$this->_inner_left_paren->isMissing();
  }

  /**
   * @return LeftParenToken
   */
  public function getInnerLeftParen(): LeftParenToken {
    \assert($this->_inner_left_paren instanceof LeftParenToken);
    return $this->_inner_left_paren;
  }

  /**
   * @return LeftParenToken
   */
  public function getInnerLeftParenx(): LeftParenToken {
    return $this->getInnerLeftParen();
  }

  public function getParameterListUNTYPED(): EditableNode {
    return $this->_parameter_list;
  }

  /**
   * @return static
   */
  public function withParameterList(EditableNode $value) {
    if ($value === $this->_parameter_list) {
      return $this;
    }
    return new static(
      $this->_outer_left_paren,
      $this->_coroutine,
      $this->_function_keyword,
      $this->_inner_left_paren,
      $value,
      $this->_inner_right_paren,
      $this->_colon,
      $this->_return_type,
      $this->_outer_right_paren
    );
  }

  public function hasParameterList(): bool {
    return !$this->_parameter_list->isMissing();
  }

  /**
   * @return EditableList<ClosureParameterTypeSpecifier> |
   * EditableList<EditableNode> | EditableList<VariadicParameter> | null
   */
  public function getParameterList(): ?EditableList {
    if ($this->_parameter_list->isMissing()) {
      return null;
    }
    \assert($this->_parameter_list instanceof EditableList);
    return $this->_parameter_list;
  }

  /**
   * @return EditableList<ClosureParameterTypeSpecifier> |
   * EditableList<EditableNode> | EditableList<VariadicParameter>
   */
  public function getParameterListx(): EditableList {
    \assert($this->_parameter_list instanceof EditableList);
    return $this->_parameter_list;
  }

  public function getInnerRightParenUNTYPED(): EditableNode {
    return $this->_inner_right_paren;
  }

  /**
   * @return static
   */
  public function withInnerRightParen(EditableNode $value) {
    if ($value === $this->_inner_right_paren) {
      return $this;
    }
    return new static(
      $this->_outer_left_paren,
      $this->_coroutine,
      $this->_function_keyword,
      $this->_inner_left_paren,
      $this->_parameter_list,
      $value,
      $this->_colon,
      $this->_return_type,
      $this->_outer_right_paren
    );
  }

  public function hasInnerRightParen(): bool {
    return !$this->_inner_right_paren->isMissing();
  }

  /**
   * @return RightParenToken
   */
  public function getInnerRightParen(): RightParenToken {
    \assert($this->_inner_right_paren instanceof RightParenToken);
    return $this->_inner_right_paren;
  }

  /**
   * @return RightParenToken
   */
  public function getInnerRightParenx(): RightParenToken {
    return $this->getInnerRightParen();
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
      $this->_outer_left_paren,
      $this->_coroutine,
      $this->_function_keyword,
      $this->_inner_left_paren,
      $this->_parameter_list,
      $this->_inner_right_paren,
      $value,
      $this->_return_type,
      $this->_outer_right_paren
    );
  }

  public function hasColon(): bool {
    return !$this->_colon->isMissing();
  }

  /**
   * @return ColonToken
   */
  public function getColon(): ColonToken {
    \assert($this->_colon instanceof ColonToken);
    return $this->_colon;
  }

  /**
   * @return ColonToken
   */
  public function getColonx(): ColonToken {
    return $this->getColon();
  }

  public function getReturnTypeUNTYPED(): EditableNode {
    return $this->_return_type;
  }

  /**
   * @return static
   */
  public function withReturnType(EditableNode $value) {
    if ($value === $this->_return_type) {
      return $this;
    }
    return new static(
      $this->_outer_left_paren,
      $this->_coroutine,
      $this->_function_keyword,
      $this->_inner_left_paren,
      $this->_parameter_list,
      $this->_inner_right_paren,
      $this->_colon,
      $value,
      $this->_outer_right_paren
    );
  }

  public function hasReturnType(): bool {
    return !$this->_return_type->isMissing();
  }

  /**
   * @return ClosureTypeSpecifier | GenericTypeSpecifier |
   * NullableTypeSpecifier | SimpleTypeSpecifier
   */
  public function getReturnType(): EditableNode {
    \assert($this->_return_type instanceof EditableNode);
    return $this->_return_type;
  }

  /**
   * @return ClosureTypeSpecifier | GenericTypeSpecifier |
   * NullableTypeSpecifier | SimpleTypeSpecifier
   */
  public function getReturnTypex(): EditableNode {
    return $this->getReturnType();
  }

  public function getOuterRightParenUNTYPED(): EditableNode {
    return $this->_outer_right_paren;
  }

  /**
   * @return static
   */
  public function withOuterRightParen(EditableNode $value) {
    if ($value === $this->_outer_right_paren) {
      return $this;
    }
    return new static(
      $this->_outer_left_paren,
      $this->_coroutine,
      $this->_function_keyword,
      $this->_inner_left_paren,
      $this->_parameter_list,
      $this->_inner_right_paren,
      $this->_colon,
      $this->_return_type,
      $value
    );
  }

  public function hasOuterRightParen(): bool {
    return !$this->_outer_right_paren->isMissing();
  }

  /**
   * @return RightParenToken
   */
  public function getOuterRightParen(): RightParenToken {
    \assert($this->_outer_right_paren instanceof RightParenToken);
    return $this->_outer_right_paren;
  }

  /**
   * @return RightParenToken
   */
  public function getOuterRightParenx(): RightParenToken {
    return $this->getOuterRightParen();
  }
}
