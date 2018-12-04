<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9bd5049fbd3cc5de04cf5151949bde9c>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class QualifiedName extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_parts;

  public function __construct(EditableNode $parts) {
    parent::__construct('qualified_name');
    $this->_parts = $parts;
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
    $parts = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['qualified_name_parts'],
      $file,
      $offset,
      $source
    );
    $offset += $parts->getWidth();
    return new static($parts);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'parts' => $this->_parts,
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
    $parts = $this->_parts->rewrite($rewriter, $parents);
    if ($parts === $this->_parts) {
      return $this;
    }
    return new static($parts);
  }

  public function getPartsUNTYPED(): EditableNode {
    return $this->_parts;
  }

  /**
   * @return static
   */
  public function withParts(EditableNode $value) {
    if ($value === $this->_parts) {
      return $this;
    }
    return new static($value);
  }

  public function hasParts(): bool {
    return !$this->_parts->isMissing();
  }

  /**
   * @return EditableList<?NameToken>
   */
  public function getParts(): EditableList {
    \assert($this->_parts instanceof EditableList);
    return $this->_parts;
  }

  /**
   * @return EditableList<?NameToken>
   */
  public function getPartsx(): EditableList {
    return $this->getParts();
  }
}
