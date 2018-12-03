<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<2856f5d46ecf2c1b97b2b4789df4ba6c>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class VariadicParameter extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_call_convention;
  /**
   * @var EditableNode
   */
  private $_type;
  /**
   * @var EditableNode
   */
  private $_ellipsis;

  public function __construct(
    EditableNode $call_convention,
    EditableNode $type,
    EditableNode $ellipsis
  ) {
    parent::__construct('variadic_parameter');
    $this->_call_convention = $call_convention;
    $this->_type = $type;
    $this->_ellipsis = $ellipsis;
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
    $call_convention = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['variadic_parameter_call_convention'],
      $file,
      $offset,
      $source
    );
    $offset += $call_convention->getWidth();
    $type = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['variadic_parameter_type'],
      $file,
      $offset,
      $source
    );
    $offset += $type->getWidth();
    $ellipsis = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['variadic_parameter_ellipsis'],
      $file,
      $offset,
      $source
    );
    $offset += $ellipsis->getWidth();
    return new static($call_convention, $type, $ellipsis);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'call_convention' => $this->_call_convention,
      'type' => $this->_type,
      'ellipsis' => $this->_ellipsis,
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
    $call_convention = $this->_call_convention->rewrite($rewriter, $parents);
    $type = $this->_type->rewrite($rewriter, $parents);
    $ellipsis = $this->_ellipsis->rewrite($rewriter, $parents);
    if (
      $call_convention === $this->_call_convention &&
      $type === $this->_type &&
      $ellipsis === $this->_ellipsis
    ) {
      return $this;
    }
    return new static($call_convention, $type, $ellipsis);
  }

  public function getCallConventionUNTYPED(): EditableNode {
    return $this->_call_convention;
  }

  /**
   * @return static
   */
  public function withCallConvention(EditableNode $value) {
    if ($value === $this->_call_convention) {
      return $this;
    }
    return new static($value, $this->_type, $this->_ellipsis);
  }

  public function hasCallConvention(): bool {
    return !$this->_call_convention->isMissing();
  }

  /**
   * @returns Missing
   */
  public function getCallConvention(): ?EditableNode {
    if ($this->_call_convention->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_call_convention);
  }

  /**
   * @returns
   */
  public function getCallConventionx(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_call_convention);
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
    return new static($this->_call_convention, $value, $this->_ellipsis);
  }

  public function hasType(): bool {
    return !$this->_type->isMissing();
  }

  /**
   * @returns ClosureTypeSpecifier | Missing | SimpleTypeSpecifier |
   * TupleTypeSpecifier
   */
  public function getType(): ?EditableNode {
    if ($this->_type->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_type);
  }

  /**
   * @returns ClosureTypeSpecifier | SimpleTypeSpecifier | TupleTypeSpecifier
   */
  public function getTypex(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_type);
  }

  public function getEllipsisUNTYPED(): EditableNode {
    return $this->_ellipsis;
  }

  /**
   * @return static
   */
  public function withEllipsis(EditableNode $value) {
    if ($value === $this->_ellipsis) {
      return $this;
    }
    return new static($this->_call_convention, $this->_type, $value);
  }

  public function hasEllipsis(): bool {
    return !$this->_ellipsis->isMissing();
  }

  /**
   * @returns DotDotDotToken
   */
  public function getEllipsis(): DotDotDotToken {
    return TypeAssert\instance_of(DotDotDotToken::class, $this->_ellipsis);
  }

  /**
   * @returns DotDotDotToken
   */
  public function getEllipsisx(): DotDotDotToken {
    return $this->getEllipsis();
  }
}
