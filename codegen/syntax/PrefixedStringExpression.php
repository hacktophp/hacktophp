<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<dd6466e39bf96392a097f795856d869f>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class PrefixedStringExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_str;

  public function __construct(EditableNode $name, EditableNode $str) {
    parent::__construct('prefixed_string_expression');
    $this->_name = $name;
    $this->_str = $str;
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
      /* UNSAFE_EXPR */ $json['prefixed_string_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $str = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['prefixed_string_str'],
      $file,
      $offset,
      $source
    );
    $offset += $str->getWidth();
    return new static($name, $str);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'name' => $this->_name,
      'str' => $this->_str,
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
    $str = $this->_str->rewrite($rewriter, $parents);
    if ($name === $this->_name && $str === $this->_str) {
      return $this;
    }
    return new static($name, $str);
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
    return new static($value, $this->_str);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getName(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_name);
  }

  /**
   * @returns unknown
   */
  public function getNamex(): EditableNode {
    return $this->getName();
  }

  public function getStrUNTYPED(): EditableNode {
    return $this->_str;
  }

  /**
   * @return static
   */
  public function withStr(EditableNode $value) {
    if ($value === $this->_str) {
      return $this;
    }
    return new static($this->_name, $value);
  }

  public function hasStr(): bool {
    return !$this->_str->isMissing();
  }

  /**
   * @returns unknown
   */
  public function getStr(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_str);
  }

  /**
   * @returns unknown
   */
  public function getStrx(): EditableNode {
    return $this->getStr();
  }
}
