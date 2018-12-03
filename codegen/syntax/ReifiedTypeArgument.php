<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<2f4de5530ce73ec0779faf9664a31323>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class ReifiedTypeArgument extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_reified;
  /**
   * @var EditableNode
   */
  private $_type;

  public function __construct(EditableNode $reified, EditableNode $type) {
    parent::__construct('reified_type_argument');
    $this->_reified = $reified;
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
    $reified = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['reified_type_argument_reified'],
      $file,
      $offset,
      $source
    );
    $offset += $reified->getWidth();
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['reified_type_argument_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    return new static($reified, $type);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'reified' => $this->_reified,
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
    $reified = $this->_reified->rewrite($rewriter, $parents);
    $type = $this->_type->rewrite($rewriter, $parents);
    if ($reified === $this->_reified && $type === $this->_type) {
      return $this;
    }
    return new static($reified, $type);
  }

  public function getReifiedUNTYPED(): EditableNode {
    return $this->_reified;
  }

  /**
   * @return static
   */
  public function withReified(EditableNode $value) {
    if ($value === $this->_reified) {
      return $this;
    }
    return new static($value, $this->_type);
  }

  public function hasReified(): bool {
    return !$this->_reified->isMissing();
  }

  /**
   * @return ReifiedToken
   */
  public function getReified(): ReifiedToken {
    \assert($this->_reified instanceof ReifiedToken);
    return $this->_reified;
  }

  /**
   * @return ReifiedToken
   */
  public function getReifiedx(): ReifiedToken {
    return $this->getReified();
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
    return new static($this->_reified, $value);
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @return SimpleTypeSpecifier | TupleTypeSpecifier | TypeConstant
   */
  public function getType(): EditableNode {
    \assert($this->_type instanceof EditableNode);
    return $this->_type;
  }

  /**
   * @return SimpleTypeSpecifier | TupleTypeSpecifier | TypeConstant
   */
  public function getTypex(): EditableNode {
    return $this->getType();
  }
}
