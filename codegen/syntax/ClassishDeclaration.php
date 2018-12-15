<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<bcde4a847b5a6e1b449fa0f938891284>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class ClassishDeclaration extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_attribute;
  /**
   * @var EditableNode
   */
  private $_modifiers;
  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_type_parameters;
  /**
   * @var EditableNode
   */
  private $_extends_keyword;
  /**
   * @var EditableNode
   */
  private $_extends_list;
  /**
   * @var EditableNode
   */
  private $_implements_keyword;
  /**
   * @var EditableNode
   */
  private $_implements_list;
  /**
   * @var EditableNode
   */
  private $_body;

  public function __construct(
    EditableNode $attribute,
    EditableNode $modifiers,
    EditableNode $keyword,
    EditableNode $name,
    EditableNode $type_parameters,
    EditableNode $extends_keyword,
    EditableNode $extends_list,
    EditableNode $implements_keyword,
    EditableNode $implements_list,
    EditableNode $body
  ) {
    parent::__construct('classish_declaration');
    $this->_attribute = $attribute;
    $this->_modifiers = $modifiers;
    $this->_keyword = $keyword;
    $this->_name = $name;
    $this->_type_parameters = $type_parameters;
    $this->_extends_keyword = $extends_keyword;
    $this->_extends_list = $extends_list;
    $this->_implements_keyword = $implements_keyword;
    $this->_implements_list = $implements_list;
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
    $attribute = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['classish_attribute'],
      $file,
      $offset,
      $source
    );
    $offset += $attribute->getWidth();
    $modifiers = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['classish_modifiers'],
      $file,
      $offset,
      $source
    );
    $offset += $modifiers->getWidth();
    $keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['classish_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['classish_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $type_parameters = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['classish_type_parameters'],
      $file,
      $offset,
      $source
    );
    $offset += $type_parameters->getWidth();
    $extends_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['classish_extends_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $extends_keyword->getWidth();
    $extends_list = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['classish_extends_list'],
      $file,
      $offset,
      $source
    );
    $offset += $extends_list->getWidth();
    $implements_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['classish_implements_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $implements_keyword->getWidth();
    $implements_list = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['classish_implements_list'],
      $file,
      $offset,
      $source
    );
    $offset += $implements_list->getWidth();
    $body = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['classish_body'],
      $file,
      $offset,
      $source
    );
    $offset += $body->getWidth();
    return new static(
      $attribute,
      $modifiers,
      $keyword,
      $name,
      $type_parameters,
      $extends_keyword,
      $extends_list,
      $implements_keyword,
      $implements_list,
      $body
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'attribute' => $this->_attribute,
      'modifiers' => $this->_modifiers,
      'keyword' => $this->_keyword,
      'name' => $this->_name,
      'type_parameters' => $this->_type_parameters,
      'extends_keyword' => $this->_extends_keyword,
      'extends_list' => $this->_extends_list,
      'implements_keyword' => $this->_implements_keyword,
      'implements_list' => $this->_implements_list,
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
    $attribute = $this->_attribute->rewrite($rewriter, $parents);
    $modifiers = $this->_modifiers->rewrite($rewriter, $parents);
    $keyword = $this->_keyword->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    $type_parameters = $this->_type_parameters->rewrite($rewriter, $parents);
    $extends_keyword = $this->_extends_keyword->rewrite($rewriter, $parents);
    $extends_list = $this->_extends_list->rewrite($rewriter, $parents);
    $implements_keyword =
      $this->_implements_keyword->rewrite($rewriter, $parents);
    $implements_list = $this->_implements_list->rewrite($rewriter, $parents);
    $body = $this->_body->rewrite($rewriter, $parents);
    if (
      $attribute === $this->_attribute &&
      $modifiers === $this->_modifiers &&
      $keyword === $this->_keyword &&
      $name === $this->_name &&
      $type_parameters === $this->_type_parameters &&
      $extends_keyword === $this->_extends_keyword &&
      $extends_list === $this->_extends_list &&
      $implements_keyword === $this->_implements_keyword &&
      $implements_list === $this->_implements_list &&
      $body === $this->_body
    ) {
      return $this;
    }
    return new static(
      $attribute,
      $modifiers,
      $keyword,
      $name,
      $type_parameters,
      $extends_keyword,
      $extends_list,
      $implements_keyword,
      $implements_list,
      $body
    );
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
      $this->_modifiers,
      $this->_keyword,
      $this->_name,
      $this->_type_parameters,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
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
    \assert($this->_attribute instanceof AttributeSpecification);
    return $this->_attribute;
  }

  /**
   * @return AttributeSpecification
   */
  public function getAttributex(): AttributeSpecification {
    \assert($this->_attribute instanceof AttributeSpecification);
    return $this->_attribute;
  }

  public function getModifiersUNTYPED(): EditableNode {
    return $this->_modifiers;
  }

  /**
   * @return static
   */
  public function withModifiers(EditableNode $value) {
    if ($value === $this->_modifiers) {
      return $this;
    }
    return new static(
      $this->_attribute,
      $value,
      $this->_keyword,
      $this->_name,
      $this->_type_parameters,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasModifiers(): bool {
    return !$this->_modifiers->isMissing();
  }

  /**
   * @return EditableList<EditableNode> | null
   */
  public function getModifiers(): ?EditableList {
    if ($this->_modifiers->isMissing()) {
      return null;
    }
    \assert($this->_modifiers instanceof EditableList);
    return $this->_modifiers;
  }

  /**
   * @return EditableList<EditableNode>
   */
  public function getModifiersx(): EditableList {
    \assert($this->_modifiers instanceof EditableList);
    return $this->_modifiers;
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
    return new static(
      $this->_attribute,
      $this->_modifiers,
      $value,
      $this->_name,
      $this->_type_parameters,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return ClassToken | InterfaceToken | TraitToken
   */
  public function getKeyword(): EditableToken {
    \assert($this->_keyword instanceof EditableToken);
    return $this->_keyword;
  }

  /**
   * @return ClassToken | InterfaceToken | TraitToken
   */
  public function getKeywordx(): EditableToken {
    return $this->getKeyword();
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
    return new static(
      $this->_attribute,
      $this->_modifiers,
      $this->_keyword,
      $value,
      $this->_type_parameters,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return null | XHPClassNameToken | NameToken
   */
  public function getName(): ?EditableToken {
    if ($this->_name->isMissing()) {
      return null;
    }
    \assert($this->_name instanceof EditableToken);
    return $this->_name;
  }

  /**
   * @return XHPClassNameToken | NameToken
   */
  public function getNamex(): EditableToken {
    \assert($this->_name instanceof EditableToken);
    return $this->_name;
  }

  public function getTypeParametersUNTYPED(): EditableNode {
    return $this->_type_parameters;
  }

  /**
   * @return static
   */
  public function withTypeParameters(EditableNode $value) {
    if ($value === $this->_type_parameters) {
      return $this;
    }
    return new static(
      $this->_attribute,
      $this->_modifiers,
      $this->_keyword,
      $this->_name,
      $value,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasTypeParameters(): bool {
    return !$this->_type_parameters->isMissing();
  }

  /**
   * @return null | TypeParameters
   */
  public function getTypeParameters(): ?TypeParameters {
    if ($this->_type_parameters->isMissing()) {
      return null;
    }
    \assert($this->_type_parameters instanceof TypeParameters);
    return $this->_type_parameters;
  }

  /**
   * @return TypeParameters
   */
  public function getTypeParametersx(): TypeParameters {
    \assert($this->_type_parameters instanceof TypeParameters);
    return $this->_type_parameters;
  }

  public function getExtendsKeywordUNTYPED(): EditableNode {
    return $this->_extends_keyword;
  }

  /**
   * @return static
   */
  public function withExtendsKeyword(EditableNode $value) {
    if ($value === $this->_extends_keyword) {
      return $this;
    }
    return new static(
      $this->_attribute,
      $this->_modifiers,
      $this->_keyword,
      $this->_name,
      $this->_type_parameters,
      $value,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasExtendsKeyword(): bool {
    return !$this->_extends_keyword->isMissing();
  }

  /**
   * @return null | ExtendsToken
   */
  public function getExtendsKeyword(): ?ExtendsToken {
    if ($this->_extends_keyword->isMissing()) {
      return null;
    }
    \assert($this->_extends_keyword instanceof ExtendsToken);
    return $this->_extends_keyword;
  }

  /**
   * @return ExtendsToken
   */
  public function getExtendsKeywordx(): ExtendsToken {
    \assert($this->_extends_keyword instanceof ExtendsToken);
    return $this->_extends_keyword;
  }

  public function getExtendsListUNTYPED(): EditableNode {
    return $this->_extends_list;
  }

  /**
   * @return static
   */
  public function withExtendsList(EditableNode $value) {
    if ($value === $this->_extends_list) {
      return $this;
    }
    return new static(
      $this->_attribute,
      $this->_modifiers,
      $this->_keyword,
      $this->_name,
      $this->_type_parameters,
      $this->_extends_keyword,
      $value,
      $this->_implements_keyword,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasExtendsList(): bool {
    return !$this->_extends_list->isMissing();
  }

  /**
   * @return EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
   * EditableList<?EditableNode> | EditableList<SimpleTypeSpecifier> | Missing
   */
  public function getExtendsList(): ?EditableList {
    if ($this->_extends_list->isMissing()) {
      return null;
    }
    \assert($this->_extends_list instanceof EditableList);
    return $this->_extends_list;
  }

  /**
   * @return EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
   * EditableList<?EditableNode> | EditableList<SimpleTypeSpecifier>
   */
  public function getExtendsListx(): EditableList {
    \assert($this->_extends_list instanceof EditableList);
    return $this->_extends_list;
  }

  public function getImplementsKeywordUNTYPED(): EditableNode {
    return $this->_implements_keyword;
  }

  /**
   * @return static
   */
  public function withImplementsKeyword(EditableNode $value) {
    if ($value === $this->_implements_keyword) {
      return $this;
    }
    return new static(
      $this->_attribute,
      $this->_modifiers,
      $this->_keyword,
      $this->_name,
      $this->_type_parameters,
      $this->_extends_keyword,
      $this->_extends_list,
      $value,
      $this->_implements_list,
      $this->_body
    );
  }

  public function hasImplementsKeyword(): bool {
    return !$this->_implements_keyword->isMissing();
  }

  /**
   * @return null | ImplementsToken
   */
  public function getImplementsKeyword(): ?ImplementsToken {
    if ($this->_implements_keyword->isMissing()) {
      return null;
    }
    \assert($this->_implements_keyword instanceof ImplementsToken);
    return $this->_implements_keyword;
  }

  /**
   * @return ImplementsToken
   */
  public function getImplementsKeywordx(): ImplementsToken {
    \assert($this->_implements_keyword instanceof ImplementsToken);
    return $this->_implements_keyword;
  }

  public function getImplementsListUNTYPED(): EditableNode {
    return $this->_implements_list;
  }

  /**
   * @return static
   */
  public function withImplementsList(EditableNode $value) {
    if ($value === $this->_implements_list) {
      return $this;
    }
    return new static(
      $this->_attribute,
      $this->_modifiers,
      $this->_keyword,
      $this->_name,
      $this->_type_parameters,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $value,
      $this->_body
    );
  }

  public function hasImplementsList(): bool {
    return !$this->_implements_list->isMissing();
  }

  /**
   * @return EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
   * EditableList<?EditableNode> | EditableList<SimpleTypeSpecifier> | Missing
   */
  public function getImplementsList(): ?EditableList {
    if ($this->_implements_list->isMissing()) {
      return null;
    }
    \assert($this->_implements_list instanceof EditableList);
    return $this->_implements_list;
  }

  /**
   * @return EditableList<GenericTypeSpecifier> | EditableList<EditableNode> |
   * EditableList<?EditableNode> | EditableList<SimpleTypeSpecifier>
   */
  public function getImplementsListx(): EditableList {
    \assert($this->_implements_list instanceof EditableList);
    return $this->_implements_list;
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
    return new static(
      $this->_attribute,
      $this->_modifiers,
      $this->_keyword,
      $this->_name,
      $this->_type_parameters,
      $this->_extends_keyword,
      $this->_extends_list,
      $this->_implements_keyword,
      $this->_implements_list,
      $value
    );
  }

  public function hasBody(): bool {
    return !$this->_body->isMissing();
  }

  /**
   * @return ClassishBody
   */
  public function getBody(): ClassishBody {
    \assert($this->_body instanceof ClassishBody);
    return $this->_body;
  }

  /**
   * @return ClassishBody
   */
  public function getBodyx(): ClassishBody {
    return $this->getBody();
  }
}
