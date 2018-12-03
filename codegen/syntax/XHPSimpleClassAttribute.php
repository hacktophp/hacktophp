<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4b017b0d98ac3e88116d3f133dcf6940>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class XHPSimpleClassAttribute extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_type;

  public function __construct(EditableNode $type) {
    parent::__construct('xhp_simple_class_attribute');
    $this->_type = $type;
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
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_simple_class_attribute_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    return new static($type);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'type' => $this->_type,
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
    $type = $this->_type->rewrite($rewriter, $parents);
    if ($type === $this->_type) {
      return $this;
    }
    return new static($type);
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
    return new static($value);
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
}
