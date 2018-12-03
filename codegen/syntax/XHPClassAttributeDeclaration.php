<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d88a12c1fa96faa2031dc1e5cd890e80>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class XHPClassAttributeDeclaration extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_attributes;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $attributes,
    EditableNode $semicolon
  ) {
    parent::__construct('xhp_class_attribute_declaration');
    $this->_keyword = $keyword;
    $this->_attributes = $attributes;
    $this->_semicolon = $semicolon;
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
      /* UNSAFE_EXPR */ $json['xhp_attribute_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $attributes = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_attribute_attributes'],
      $file,
      $offset,
      $source
    );
    $offset += $attributes->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['xhp_attribute_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($keyword, $attributes, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'attributes' => $this->_attributes,
      'semicolon' => $this->_semicolon,
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
    $attributes = $this->_attributes->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $attributes === $this->_attributes &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($keyword, $attributes, $semicolon);
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
    return new static($value, $this->_attributes, $this->_semicolon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns AttributeToken
   */
  public function getKeyword(): AttributeToken {
    return TypeAssert\instance_of(AttributeToken::class, $this->_keyword);
  }

  /**
   * @returns AttributeToken
   */
  public function getKeywordx(): AttributeToken {
    return $this->getKeyword();
  }

  public function getAttributesUNTYPED(): EditableNode {
    return $this->_attributes;
  }

  /**
   * @return static
   */
  public function withAttributes(EditableNode $value) {
    if ($value === $this->_attributes) {
      return $this;
    }
    return new static($this->_keyword, $value, $this->_semicolon);
  }

  public function hasAttributes(): bool {
    return !$this->_attributes->isMissing();
  }

  /**
   * @return EditableList<XHPClassAttribute> | EditableList<EditableNode> |
   * EditableList<XHPSimpleClassAttribute>
   */
  public function getAttributes(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_attributes);
  }

  /**
   * @return EditableList<XHPClassAttribute> | EditableList<EditableNode> |
   * EditableList<XHPSimpleClassAttribute>
   */
  public function getAttributesx(): EditableList {
    return $this->getAttributes();
  }

  public function getSemicolonUNTYPED(): EditableNode {
    return $this->_semicolon;
  }

  /**
   * @return static
   */
  public function withSemicolon(EditableNode $value) {
    if ($value === $this->_semicolon) {
      return $this;
    }
    return new static($this->_keyword, $this->_attributes, $value);
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @returns SemicolonToken
   */
  public function getSemicolon(): SemicolonToken {
    return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
  }

  /**
   * @returns SemicolonToken
   */
  public function getSemicolonx(): SemicolonToken {
    return $this->getSemicolon();
  }
}
