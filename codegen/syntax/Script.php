<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f9561df0b4fa9c9ee18ef07d08e55a58>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class Script extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_declarations;

  public function __construct(EditableNode $declarations) {
    parent::__construct('script');
    $this->_declarations = $declarations;
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
    $declarations = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['script_declarations'],
      $file,
      $offset,
      $source
    );
    $offset += $declarations->getWidth();
    return new static($declarations);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'declarations' => $this->_declarations,
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
    $declarations = $this->_declarations->rewrite($rewriter, $parents);
    if ($declarations === $this->_declarations) {
      return $this;
    }
    return new static($declarations);
  }

  public function getDeclarationsUNTYPED(): EditableNode {
    return $this->_declarations;
  }

  /**
   * @return static
   */
  public function withDeclarations(EditableNode $value) {
    if ($value === $this->_declarations) {
      return $this;
    }
    return new static($value);
  }

  public function hasDeclarations(): bool {
    return !$this->_declarations->isMissing();
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getDeclarations(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_declarations);
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getDeclarationsx(): EditableList {
    return $this->getDeclarations();
  }
}
