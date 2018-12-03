<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<17c9cd27ccd934dfba04bd7db1c09d1d>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class SimpleTypeSpecifier extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_specifier;

  public function __construct(EditableNode $specifier) {
    parent::__construct('simple_type_specifier');
    $this->_specifier = $specifier;
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
    $specifier = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['simple_type_specifier'],
      $file,
      $offset,
      $source
    );
    $offset += $specifier->getWidth();
    return new static($specifier);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'specifier' => $this->_specifier,
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
    $specifier = $this->_specifier->rewrite($rewriter, $parents);
    if ($specifier === $this->_specifier) {
      return $this;
    }
    return new static($specifier);
  }

  public function getSpecifierUNTYPED(): EditableNode {
    return $this->_specifier;
  }

  /**
   * @return static
   */
  public function withSpecifier(EditableNode $value) {
    if ($value === $this->_specifier) {
      return $this;
    }
    return new static($value);
  }

  public function hasSpecifier(): bool {
    return !$this->_specifier->isMissing();
  }

  /**
   * @returns QualifiedName | XHPClassNameToken | ConstructToken | ArrayToken |
   * ArraykeyToken | BoolToken | BooleanToken | DarrayToken | DictToken |
   * DoubleToken | FloatToken | IntToken | IntegerToken | KeysetToken |
   * MixedToken | NameToken | NoreturnToken | NumToken | ObjectToken |
   * ParentToken | RealToken | ResourceToken | SelfToken | StringToken |
   * ThisToken | VarToken | VarrayToken | VecToken | VoidToken
   */
  public function getSpecifier(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_specifier);
  }

  /**
   * @returns QualifiedName | XHPClassNameToken | ConstructToken | ArrayToken |
   * ArraykeyToken | BoolToken | BooleanToken | DarrayToken | DictToken |
   * DoubleToken | FloatToken | IntToken | IntegerToken | KeysetToken |
   * MixedToken | NameToken | NoreturnToken | NumToken | ObjectToken |
   * ParentToken | RealToken | ResourceToken | SelfToken | StringToken |
   * ThisToken | VarToken | VarrayToken | VecToken | VoidToken
   */
  public function getSpecifierx(): EditableNode {
    return $this->getSpecifier();
  }
}
