<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5f75ffe89b07fe5e63803feda803e31f>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class ConstantDeclarator extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_initializer;

  public function __construct(EditableNode $name, EditableNode $initializer) {
    parent::__construct('constant_declarator');
    $this->_name = $name;
    $this->_initializer = $initializer;
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
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['constant_declarator_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $initializer = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['constant_declarator_initializer'],
      $file,
      $offset,
      $source
    );
    $offset += $initializer->getWidth();
    return new static($name, $initializer);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'name' => $this->_name,
      'initializer' => $this->_initializer,
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
    $name = $this->_name->rewrite($rewriter, $parents);
    $initializer = $this->_initializer->rewrite($rewriter, $parents);
    if ($name === $this->_name && $initializer === $this->_initializer) {
      return $this;
    }
    return new static($name, $initializer);
  }

  public function getNameUNTYPED(): EditableNode {
    return $this->_name;
  }

  /**
   * @return static
   */
  public function withName(EditableNode $value) {
    if ($value === $this->_name) {
      return $this;
    }
    return new static($value, $this->_initializer);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @returns NameToken
   */
  public function getName(): NameToken {
    return TypeAssert\instance_of(NameToken::class, $this->_name);
  }

  /**
   * @returns NameToken
   */
  public function getNamex(): NameToken {
    return $this->getName();
  }

  public function getInitializerUNTYPED(): EditableNode {
    return $this->_initializer;
  }

  /**
   * @return static
   */
  public function withInitializer(EditableNode $value) {
    if ($value === $this->_initializer) {
      return $this;
    }
    return new static($this->_name, $value);
  }

  public function hasInitializer(): bool {
    return !$this->_initializer->isMissing();
  }

  /**
   * @returns Missing | SimpleInitializer
   */
  public function getInitializer(): ?SimpleInitializer {
    if ($this->_initializer->isMissing()) {
      return null;
    }
    return
      TypeAssert\instance_of(SimpleInitializer::class, $this->_initializer);
  }

  /**
   * @returns SimpleInitializer
   */
  public function getInitializerx(): SimpleInitializer {
    return
      TypeAssert\instance_of(SimpleInitializer::class, $this->_initializer);
  }
}
