<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<46946695a433feb860a6573dba18cea1>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class SoftTypeSpecifier extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_at;
  /**
   * @var EditableNode
   */
  private $_type;

  public function __construct(EditableNode $at, EditableNode $type) {
    parent::__construct('soft_type_specifier');
    $this->_at = $at;
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
    $at = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['soft_at'],
      $file,
      $offset,
      $source
    );
    $offset += $at->getWidth();
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['soft_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    return new static($at, $type);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'at' => $this->_at,
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
    $at = $this->_at->rewrite($rewriter, $parents);
    $type = $this->_type->rewrite($rewriter, $parents);
    if ($at === $this->_at && $type === $this->_type) {
      return $this;
    }
    return new static($at, $type);
  }

  public function getAtUNTYPED(): EditableNode {
    return $this->_at;
  }

  /**
   * @return static
   */
  public function withAt(EditableNode $value) {
    if ($value === $this->_at) {
      return $this;
    }
    return new static($value, $this->_type);
  }

  public function hasAt(): bool {
    return !$this->_at->isMissing();
  }

  /**
   * @return AtToken
   */
  public function getAt(): AtToken {
    \assert($this->_at instanceof AtToken);
    return $this->_at;
  }

  /**
   * @return AtToken
   */
  public function getAtx(): AtToken {
    return $this->getAt();
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
    return new static($this->_at, $value);
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @return ClosureTypeSpecifier | GenericTypeSpecifier |
   * MapArrayTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier |
   * TupleTypeSpecifier
   */
  public function getType(): EditableNode {
    \assert($this->_type instanceof EditableNode);
    return $this->_type;
  }

  /**
   * @return ClosureTypeSpecifier | GenericTypeSpecifier |
   * MapArrayTypeSpecifier | NullableTypeSpecifier | SimpleTypeSpecifier |
   * TupleTypeSpecifier
   */
  public function getTypex(): EditableNode {
    return $this->getType();
  }
}
