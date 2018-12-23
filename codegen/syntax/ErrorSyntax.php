<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<aa966ea0e084eef5000ac6ca0a39353f>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class ErrorSyntax extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_error;

  public function __construct(EditableNode $error) {
    parent::__construct('error');
    $this->_error = $error;
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
    $error = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['error_error'],
      $file,
      $offset,
      $source
    );
    $offset += $error->getWidth();
    return new static($error);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'error' => $this->_error,
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
    $error = $this->_error->rewrite($rewriter, $parents);
    if ($error === $this->_error) {
      return $this;
    }
    return new static($error);
  }

  public function getErrorUNTYPED(): EditableNode {
    return $this->_error;
  }

  /**
   * @return static
   */
  public function withError(EditableNode $value) {
    if ($value === $this->_error) {
      return $this;
    }
    return new static($value);
  }

  public function hasError(): bool {
    return !$this->_error->isMissing();
  }

  /**
   * @return CommaToken | SemicolonToken | EqualToken | DecimalLiteralToken |
   * NameToken | SingleQuotedStringLiteralToken | VariableToken |
   * LeftBraceToken | RightBraceToken
   */
  public function getError(): EditableToken {
    \assert($this->_error instanceof EditableToken);
    return $this->_error;
  }

  /**
   * @return CommaToken | SemicolonToken | EqualToken | DecimalLiteralToken |
   * NameToken | SingleQuotedStringLiteralToken | VariableToken |
   * LeftBraceToken | RightBraceToken
   */
  public function getErrorx(): EditableToken {
    return $this->getError();
  }
}
