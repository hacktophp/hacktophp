<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<2671fc02b823a6b6d4e4b3a79d3c1952>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class Enumerator extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_name;
  /**
   * @var EditableNode
   */
  private $_equal;
  /**
   * @var EditableNode
   */
  private $_value;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $name,
    EditableNode $equal,
    EditableNode $value,
    EditableNode $semicolon
  ) {
    parent::__construct('enumerator');
    $this->_name = $name;
    $this->_equal = $equal;
    $this->_value = $value;
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
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['enumerator_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    $equal = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['enumerator_equal'],
      $file,
      $offset,
      $source
    );
    $offset += $equal->getWidth();
    $value = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['enumerator_value'],
      $file,
      $offset,
      $source
    );
    $offset += $value->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['enumerator_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($name, $equal, $value, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'name' => $this->_name,
      'equal' => $this->_equal,
      'value' => $this->_value,
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
    $name = $this->_name->rewrite($rewriter, $parents);
    $equal = $this->_equal->rewrite($rewriter, $parents);
    $value = $this->_value->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $name === $this->_name &&
      $equal === $this->_equal &&
      $value === $this->_value &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($name, $equal, $value, $semicolon);
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
    return new static($value, $this->_equal, $this->_value, $this->_semicolon);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @returns NameToken
   */
  public function getName(): NameToken {
    return TypeAssert\instance_of(NameToken::class, $this->_name);
  }

  /**
   * @returns NameToken
   */
  public function getNamex(): NameToken {
    return $this->getName();
  }

  public function getEqualUNTYPED(): EditableNode {
    return $this->_equal;
  }

  /**
   * @return static
   */
  public function withEqual(EditableNode $value) {
    if ($value === $this->_equal) {
      return $this;
    }
    return new static($this->_name, $value, $this->_value, $this->_semicolon);
  }

  public function hasEqual(): bool {
    return !$this->_equal->isMissing();
  }

  /**
   * @returns EqualToken
   */
  public function getEqual(): EqualToken {
    return TypeAssert\instance_of(EqualToken::class, $this->_equal);
  }

  /**
   * @returns EqualToken
   */
  public function getEqualx(): EqualToken {
    return $this->getEqual();
  }

  public function getValueUNTYPED(): EditableNode {
    return $this->_value;
  }

  /**
   * @return static
   */
  public function withValue(EditableNode $value) {
    if ($value === $this->_value) {
      return $this;
    }
    return new static($this->_name, $this->_equal, $value, $this->_semicolon);
  }

  public function hasValue(): bool {
    return !$this->_value->isMissing();
  }

  /**
   * @returns BinaryExpression | FunctionCallExpression | LiteralExpression |
   * ObjectCreationExpression | ScopeResolutionExpression | NameToken |
   * VariableExpression
   */
  public function getValue(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_value);
  }

  /**
   * @returns BinaryExpression | FunctionCallExpression | LiteralExpression |
   * ObjectCreationExpression | ScopeResolutionExpression | NameToken |
   * VariableExpression
   */
  public function getValuex(): EditableNode {
    return $this->getValue();
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
    return new static($this->_name, $this->_equal, $this->_value, $value);
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
