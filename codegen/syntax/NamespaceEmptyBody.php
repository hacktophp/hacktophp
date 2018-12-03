<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<6b33a77733d3a1470a6a0777ae2462fb>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class NamespaceEmptyBody extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(EditableNode $semicolon) {
    parent::__construct('namespace_empty_body');
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
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['namespace_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
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
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if ($semicolon === $this->_semicolon) {
      return $this;
    }
    return new static($semicolon);
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
    return new static($value);
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @returns SemicolonToken
   */
  public function getSemicolon(): SemicolonToken {
    return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
  }

  /**
   * @returns SemicolonToken
   */
  public function getSemicolonx(): SemicolonToken {
    return $this->getSemicolon();
  }
}
