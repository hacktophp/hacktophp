<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a7d9e29fae7909141ace401acdd4dc1b>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class TypeConstraint extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_type;

  public function __construct(EditableNode $keyword, EditableNode $type) {
    parent::__construct('type_constraint');
    $this->_keyword = $keyword;
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
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['constraint_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['constraint_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    return new static($keyword, $type);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
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
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $type = $this->_type->rewrite($rewriter, $parents);
    if ($keyword === $this->_keyword && $type === $this->_type) {
      return $this;
    }
    return new static($keyword, $type);
  }

  public function getKeywordUNTYPED(): EditableNode {
    return $this->_keyword;
  }

  /**
   * @return static
   */
  public function withKeyword(EditableNode $value) {
    if ($value === $this->_keyword) {
      return $this;
    }
    return new static($value, $this->_type);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns AsToken | SuperToken
   */
  public function getKeyword(): EditableToken {
    return TypeAssert\instance_of(EditableToken::class, $this->_keyword);
  }

  /**
   * @returns AsToken | SuperToken
   */
  public function getKeywordx(): EditableToken {
    return $this->getKeyword();
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
    return new static($this->_keyword, $value);
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @returns ClassnameTypeSpecifier | ClosureTypeSpecifier |
   * DictionaryTypeSpecifier | GenericTypeSpecifier | KeysetTypeSpecifier |
   * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
   * TypeConstant | VectorArrayTypeSpecifier | VectorTypeSpecifier
   */
  public function getType(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_type);
  }

  /**
   * @returns ClassnameTypeSpecifier | ClosureTypeSpecifier |
   * DictionaryTypeSpecifier | GenericTypeSpecifier | KeysetTypeSpecifier |
   * NullableTypeSpecifier | ShapeTypeSpecifier | SimpleTypeSpecifier |
   * TypeConstant | VectorArrayTypeSpecifier | VectorTypeSpecifier
   */
  public function getTypex(): EditableNode {
    return $this->getType();
  }
}
