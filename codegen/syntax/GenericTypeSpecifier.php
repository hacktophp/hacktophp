<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<cf7142ff4986e7e4130b7ec18bdd4e4c>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class GenericTypeSpecifier extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_class_type;
  /**
   * @var EditableNode
   */
  private $_argument_list;

  public function __construct(
    EditableNode $class_type,
    EditableNode $argument_list
  ) {
    parent::__construct('generic_type_specifier');
    $this->_class_type = $class_type;
    $this->_argument_list = $argument_list;
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
    $class_type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['generic_class_type'],
      $file,
      $offset,
      $source
    );
    $offset += $class_type->getWidth();
    $argument_list = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['generic_argument_list'],
      $file,
      $offset,
      $source
    );
    $offset += $argument_list->getWidth();
    return new static($class_type, $argument_list);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'class_type' => $this->_class_type,
      'argument_list' => $this->_argument_list,
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
    $class_type = $this->_class_type->rewrite($rewriter, $parents);
    $argument_list = $this->_argument_list->rewrite($rewriter, $parents);
    if (
      $class_type === $this->_class_type &&
      $argument_list === $this->_argument_list
    ) {
      return $this;
    }
    return new static($class_type, $argument_list);
  }

  public function getClassTypeUNTYPED(): EditableNode {
    return $this->_class_type;
  }

  /**
   * @return static
   */
  public function withClassType(EditableNode $value) {
    if ($value === $this->_class_type) {
      return $this;
    }
    return new static($value, $this->_argument_list);
  }

  public function hasClassType(): bool {
    return !$this->_class_type->isMissing();
  }

  /**
   * @return QualifiedName | XHPClassNameToken | NameToken | StringToken
   */
  public function getClassType(): EditableNode {
    \assert($this->_class_type instanceof EditableNode);
    return $this->_class_type;
  }

  /**
   * @return QualifiedName | XHPClassNameToken | NameToken | StringToken
   */
  public function getClassTypex(): EditableNode {
    return $this->getClassType();
  }

  public function getArgumentListUNTYPED(): EditableNode {
    return $this->_argument_list;
  }

  /**
   * @return static
   */
  public function withArgumentList(EditableNode $value) {
    if ($value === $this->_argument_list) {
      return $this;
    }
    return new static($this->_class_type, $value);
  }

  public function hasArgumentList(): bool {
    return !$this->_argument_list->isMissing();
  }

  /**
   * @return TypeArguments
   */
  public function getArgumentList(): TypeArguments {
    \assert($this->_argument_list instanceof TypeArguments);
    return $this->_argument_list;
  }

  /**
   * @return TypeArguments
   */
  public function getArgumentListx(): TypeArguments {
    return $this->getArgumentList();
  }
}
