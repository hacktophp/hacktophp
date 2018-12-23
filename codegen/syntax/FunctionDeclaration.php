<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<dc2428e2bc05b2151c4feaca8cb0ef4c>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class FunctionDeclaration
  extends EditableNode
  implements IFunctionishDeclaration {

  /**
   * @var EditableNode
   */
  private $_attribute_spec;
  /**
   * @var EditableNode
   */
  private $_declaration_header;
  /**
   * @var EditableNode
   */
  private $_body;

  public function __construct(
    EditableNode $attribute_spec,
    EditableNode $declaration_header,
    EditableNode $body
  ) {
    parent::__construct('function_declaration');
    $this->_attribute_spec = $attribute_spec;
    $this->_declaration_header = $declaration_header;
    $this->_body = $body;
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
    $attribute_spec = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_attribute_spec'],
      $file,
      $offset,
      $source
    );
    $offset += $attribute_spec->getWidth();
    $declaration_header = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_declaration_header'],
      $file,
      $offset,
      $source
    );
    $offset += $declaration_header->getWidth();
    $body = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['function_body'],
      $file,
      $offset,
      $source
    );
    $offset += $body->getWidth();
    return new static($attribute_spec, $declaration_header, $body);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'attribute_spec' => $this->_attribute_spec,
      'declaration_header' => $this->_declaration_header,
      'body' => $this->_body,
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
    $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
    $declaration_header =
      $this->_declaration_header->rewrite($rewriter, $parents);
    $body = $this->_body->rewrite($rewriter, $parents);
    if (
      $attribute_spec === $this->_attribute_spec &&
      $declaration_header === $this->_declaration_header &&
      $body === $this->_body
    ) {
      return $this;
    }
    return new static($attribute_spec, $declaration_header, $body);
  }

  public function getAttributeSpecUNTYPED(): EditableNode {
    return $this->_attribute_spec;
  }

  /**
   * @return static
   */
  public function withAttributeSpec(EditableNode $value) {
    if ($value === $this->_attribute_spec) {
      return $this;
    }
    return new static($value, $this->_declaration_header, $this->_body);
  }

  public function hasAttributeSpec(): bool {
    return !$this->_attribute_spec->isMissing();
  }

  /**
   * @return AttributeSpecification | Missing
   */
  public function getAttributeSpec(): ?AttributeSpecification {
    if ($this->_attribute_spec->isMissing()) {
      return null;
    }
    \assert($this->_attribute_spec instanceof AttributeSpecification);
    return $this->_attribute_spec;
  }

  /**
   * @return AttributeSpecification
   */
  public function getAttributeSpecx(): AttributeSpecification {
    \assert($this->_attribute_spec instanceof AttributeSpecification);
    return $this->_attribute_spec;
  }

  public function getDeclarationHeaderUNTYPED(): EditableNode {
    return $this->_declaration_header;
  }

  /**
   * @return static
   */
  public function withDeclarationHeader(EditableNode $value) {
    if ($value === $this->_declaration_header) {
      return $this;
    }
    return new static($this->_attribute_spec, $value, $this->_body);
  }

  public function hasDeclarationHeader(): bool {
    return !$this->_declaration_header->isMissing();
  }

  /**
   * @return FunctionDeclarationHeader
   */
  public function getDeclarationHeader(): FunctionDeclarationHeader {
    \assert($this->_declaration_header instanceof FunctionDeclarationHeader);
    return $this->_declaration_header;
  }

  /**
   * @return FunctionDeclarationHeader
   */
  public function getDeclarationHeaderx(): FunctionDeclarationHeader {
    return $this->getDeclarationHeader();
  }

  public function getBodyUNTYPED(): EditableNode {
    return $this->_body;
  }

  /**
   * @return static
   */
  public function withBody(EditableNode $value) {
    if ($value === $this->_body) {
      return $this;
    }
    return
      new static($this->_attribute_spec, $this->_declaration_header, $value);
  }

  public function hasBody(): bool {
    return !$this->_body->isMissing();
  }

  /**
   * @return CompoundStatement | SemicolonToken
   */
  public function getBody(): EditableNode {
    \assert($this->_body instanceof EditableNode);
    return $this->_body;
  }

  /**
   * @return CompoundStatement | SemicolonToken
   */
  public function getBodyx(): EditableNode {
    return $this->getBody();
  }
}
