<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e480de5445c3981abda3e4c19a1f53c9>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class PropertyDeclarator extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_initializer;

  public function __construct(EditableNode $name, EditableNode $initializer) {
    parent::__construct('property_declarator');
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
      /* UNSAFE_EXPR */ $json['property_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $initializer = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['property_initializer'],
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
   * @return VariableToken
   */
  public function getName(): VariableToken {
    \assert($this->_name instanceof VariableToken);
    return $this->_name;
  }

  /**
   * @return VariableToken
   */
  public function getNamex(): VariableToken {
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
   * @return null | SimpleInitializer
   */
  public function getInitializer(): ?SimpleInitializer {
    if ($this->_initializer->isMissing()) {
      return null;
    }
    return
      TypeAssert\instance_of(SimpleInitializer::class, $this->_initializer);
  }

  /**
   * @return SimpleInitializer
   */
  public function getInitializerx(): SimpleInitializer {
    return
      TypeAssert\instance_of(SimpleInitializer::class, $this->_initializer);
  }
}
