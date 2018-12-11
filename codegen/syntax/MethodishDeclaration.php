<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<418c7267e38ea8be641ee84ddadbe40e>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class MethodishDeclaration
  extends EditableNode
  implements IFunctionishDeclaration {

  /**
   * @var EditableNode
   */
  private $_attribute;
  /**
   * @var EditableNode
   */
  private $_function_decl_header;
  /**
   * @var EditableNode
   */
  private $_function_body;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $attribute,
    EditableNode $function_decl_header,
    EditableNode $function_body,
    EditableNode $semicolon
  ) {
    parent::__construct('methodish_declaration');
    $this->_attribute = $attribute;
    $this->_function_decl_header = $function_decl_header;
    $this->_function_body = $function_body;
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
    $attribute = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['methodish_attribute'],
      $file,
      $offset,
      $source
    );
    $offset += $attribute->getWidth();
    $function_decl_header = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['methodish_function_decl_header'],
      $file,
      $offset,
      $source
    );
    $offset += $function_decl_header->getWidth();
    $function_body = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['methodish_function_body'],
      $file,
      $offset,
      $source
    );
    $offset += $function_body->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['methodish_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return
      new static($attribute, $function_decl_header, $function_body, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'attribute' => $this->_attribute,
      'function_decl_header' => $this->_function_decl_header,
      'function_body' => $this->_function_body,
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
    $attribute = $this->_attribute->rewrite($rewriter, $parents);
    $function_decl_header =
      $this->_function_decl_header->rewrite($rewriter, $parents);
    $function_body = $this->_function_body->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $attribute === $this->_attribute &&
      $function_decl_header === $this->_function_decl_header &&
      $function_body === $this->_function_body &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return
      new static($attribute, $function_decl_header, $function_body, $semicolon);
  }

  public function getAttributeUNTYPED(): EditableNode {
    return $this->_attribute;
  }

  /**
   * @return static
   */
  public function withAttribute(EditableNode $value) {
    if ($value === $this->_attribute) {
      return $this;
    }
    return new static(
      $value,
      $this->_function_decl_header,
      $this->_function_body,
      $this->_semicolon
    );
  }

  public function hasAttribute(): bool {
    return !$this->_attribute->isMissing();
  }

  /**
   * @return AttributeSpecification | Missing
   */
  public function getAttribute(): ?AttributeSpecification {
    if ($this->_attribute->isMissing()) {
      return null;
    }
    return
      TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute);
  }

  /**
   * @return AttributeSpecification
   */
  public function getAttributex(): AttributeSpecification {
    return
      TypeAssert\instance_of(AttributeSpecification::class, $this->_attribute);
  }

  public function getFunctionDeclHeaderUNTYPED(): EditableNode {
    return $this->_function_decl_header;
  }

  /**
   * @return static
   */
  public function withFunctionDeclHeader(EditableNode $value) {
    if ($value === $this->_function_decl_header) {
      return $this;
    }
    return new static(
      $this->_attribute,
      $value,
      $this->_function_body,
      $this->_semicolon
    );
  }

  public function hasFunctionDeclHeader(): bool {
    return !$this->_function_decl_header->isMissing();
  }

  /**
   * @return FunctionDeclarationHeader
   */
  public function getFunctionDeclHeader(): FunctionDeclarationHeader {
    \assert($this->_function_decl_header instanceof FunctionDeclarationHeader);
    return $this->_function_decl_header;
  }

  /**
   * @return FunctionDeclarationHeader
   */
  public function getFunctionDeclHeaderx(): FunctionDeclarationHeader {
    return $this->getFunctionDeclHeader();
  }

  public function getFunctionBodyUNTYPED(): EditableNode {
    return $this->_function_body;
  }

  /**
   * @return static
   */
  public function withFunctionBody(EditableNode $value) {
    if ($value === $this->_function_body) {
      return $this;
    }
    return new static(
      $this->_attribute,
      $this->_function_decl_header,
      $value,
      $this->_semicolon
    );
  }

  public function hasFunctionBody(): bool {
    return !$this->_function_body->isMissing();
  }

  /**
   * @return CompoundStatement | Missing
   */
  public function getFunctionBody(): ?CompoundStatement {
    if ($this->_function_body->isMissing()) {
      return null;
    }
    assert($this->_function_body instanceof CompoundStatement);
    return $this->_function_body;
  }

  /**
   * @return CompoundStatement
   */
  public function getFunctionBodyx(): CompoundStatement {
    return
      TypeAssert\instance_of(CompoundStatement::class, $this->_function_body);
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
    return new static(
      $this->_attribute,
      $this->_function_decl_header,
      $this->_function_body,
      $value
    );
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @return null | SemicolonToken
   */
  public function getSemicolon(): ?SemicolonToken {
    if ($this->_semicolon->isMissing()) {
      return null;
    }
    \assert($this->_semicolon instanceof SemicolonToken);
    return $this->_semicolon;
  }

  /**
   * @return SemicolonToken
   */
  public function getSemicolonx(): SemicolonToken {
    \assert($this->_semicolon instanceof SemicolonToken);
    return $this->_semicolon;
  }
}
