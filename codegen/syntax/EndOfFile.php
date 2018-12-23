<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3df2e3b3b1510e2b52c2cb05407af0b0>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class EndOfFile extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_token;

  public function __construct(EditableNode $token) {
    parent::__construct('end_of_file');
    $this->_token = $token;
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
    $token = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['end_of_file_token'],
      $file,
      $offset,
      $source
    );
    $offset += $token->getWidth();
    return new static($token);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'token' => $this->_token,
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
    $token = $this->_token->rewrite($rewriter, $parents);
    if ($token === $this->_token) {
      return $this;
    }
    return new static($token);
  }

  public function getTokenUNTYPED(): EditableNode {
    return $this->_token;
  }

  /**
   * @return static
   */
  public function withToken(EditableNode $value) {
    if ($value === $this->_token) {
      return $this;
    }
    return new static($value);
  }

  public function hasToken(): bool {
    return !$this->_token->isMissing();
  }

  /**
   * @return EndOfFileToken
   */
  public function getToken(): EndOfFileToken {
    \assert($this->_token instanceof EndOfFileToken);
    return $this->_token;
  }

  /**
   * @return EndOfFileToken
   */
  public function getTokenx(): EndOfFileToken {
    return $this->getToken();
  }
}
