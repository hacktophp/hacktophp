<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<94cc30b608da445aeffb85add1f4a392>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class ObjectCreationExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_new_keyword;
  /**
   * @var EditableNode
   */
  private $_object;

  public function __construct(EditableNode $new_keyword, EditableNode $object) {
    parent::__construct('object_creation_expression');
    $this->_new_keyword = $new_keyword;
    $this->_object = $object;
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
    $new_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['object_creation_new_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $new_keyword->getWidth();
    $object = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['object_creation_object'],
      $file,
      $offset,
      $source
    );
    $offset += $object->getWidth();
    return new static($new_keyword, $object);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'new_keyword' => $this->_new_keyword,
      'object' => $this->_object,
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
    $new_keyword = $this->_new_keyword->rewrite($rewriter, $parents);
    $object = $this->_object->rewrite($rewriter, $parents);
    if ($new_keyword === $this->_new_keyword && $object === $this->_object) {
      return $this;
    }
    return new static($new_keyword, $object);
  }

  public function getNewKeywordUNTYPED(): EditableNode {
    return $this->_new_keyword;
  }

  /**
   * @return static
   */
  public function withNewKeyword(EditableNode $value) {
    if ($value === $this->_new_keyword) {
      return $this;
    }
    return new static($value, $this->_object);
  }

  public function hasNewKeyword(): bool {
    return !$this->_new_keyword->isMissing();
  }

  /**
   * @returns NewToken
   */
  public function getNewKeyword(): NewToken {
    return TypeAssert\instance_of(NewToken::class, $this->_new_keyword);
  }

  /**
   * @returns NewToken
   */
  public function getNewKeywordx(): NewToken {
    return $this->getNewKeyword();
  }

  public function getObjectUNTYPED(): EditableNode {
    return $this->_object;
  }

  /**
   * @return static
   */
  public function withObject(EditableNode $value) {
    if ($value === $this->_object) {
      return $this;
    }
    return new static($this->_new_keyword, $value);
  }

  public function hasObject(): bool {
    return !$this->_object->isMissing();
  }

  /**
   * @returns AnonymousClass | ConstructorCall
   */
  public function getObject(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_object);
  }

  /**
   * @returns AnonymousClass | ConstructorCall
   */
  public function getObjectx(): EditableNode {
    return $this->getObject();
  }
}
