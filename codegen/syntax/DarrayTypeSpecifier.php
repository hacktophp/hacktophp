<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b622e43ad9a2d10c498478e5e9685001>>
 */
namespace Facebook\HHAST;
use Facebook\TypeAssert;

final class DarrayTypeSpecifier extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_left_angle;
  /**
   * @var EditableNode
   */
  private $_key;
  /**
   * @var EditableNode
   */
  private $_comma;
  /**
   * @var EditableNode
   */
  private $_value;
  /**
   * @var EditableNode
   */
  private $_trailing_comma;
  /**
   * @var EditableNode
   */
  private $_right_angle;

  public function __construct(
    EditableNode $keyword,
    EditableNode $left_angle,
    EditableNode $key,
    EditableNode $comma,
    EditableNode $value,
    EditableNode $trailing_comma,
    EditableNode $right_angle
  ) {
    parent::__construct('darray_type_specifier');
    $this->_keyword = $keyword;
    $this->_left_angle = $left_angle;
    $this->_key = $key;
    $this->_comma = $comma;
    $this->_value = $value;
    $this->_trailing_comma = $trailing_comma;
    $this->_right_angle = $right_angle;
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
      /* UNSAFE_EXPR */ $json['darray_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $left_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['darray_left_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $left_angle->getWidth();
    $key = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['darray_key'],
      $file,
      $offset,
      $source
    );
    $offset += $key->getWidth();
    $comma = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['darray_comma'],
      $file,
      $offset,
      $source
    );
    $offset += $comma->getWidth();
    $value = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['darray_value'],
      $file,
      $offset,
      $source
    );
    $offset += $value->getWidth();
    $trailing_comma = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['darray_trailing_comma'],
      $file,
      $offset,
      $source
    );
    $offset += $trailing_comma->getWidth();
    $right_angle = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['darray_right_angle'],
      $file,
      $offset,
      $source
    );
    $offset += $right_angle->getWidth();
    return new static(
      $keyword,
      $left_angle,
      $key,
      $comma,
      $value,
      $trailing_comma,
      $right_angle
    );
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'left_angle' => $this->_left_angle,
      'key' => $this->_key,
      'comma' => $this->_comma,
      'value' => $this->_value,
      'trailing_comma' => $this->_trailing_comma,
      'right_angle' => $this->_right_angle,
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
    $left_angle = $this->_left_angle->rewrite($rewriter, $parents);
    $key = $this->_key->rewrite($rewriter, $parents);
    $comma = $this->_comma->rewrite($rewriter, $parents);
    $value = $this->_value->rewrite($rewriter, $parents);
    $trailing_comma = $this->_trailing_comma->rewrite($rewriter, $parents);
    $right_angle = $this->_right_angle->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $left_angle === $this->_left_angle &&
      $key === $this->_key &&
      $comma === $this->_comma &&
      $value === $this->_value &&
      $trailing_comma === $this->_trailing_comma &&
      $right_angle === $this->_right_angle
    ) {
      return $this;
    }
    return new static(
      $keyword,
      $left_angle,
      $key,
      $comma,
      $value,
      $trailing_comma,
      $right_angle
    );
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
      $value,
      $this->_left_angle,
      $this->_key,
      $this->_comma,
      $this->_value,
      $this->_trailing_comma,
      $this->_right_angle
    );
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return DarrayToken
   */
  public function getKeyword(): DarrayToken {
    \assert($this->_keyword instanceof DarrayToken);
    return $this->_keyword;
  }

  /**
   * @return DarrayToken
   */
  public function getKeywordx(): DarrayToken {
    return $this->getKeyword();
  }

  public function getLeftAngleUNTYPED(): EditableNode {
    return $this->_left_angle;
  }

  /**
   * @return static
   */
  public function withLeftAngle(EditableNode $value) {
    if ($value === $this->_left_angle) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $value,
      $this->_key,
      $this->_comma,
      $this->_value,
      $this->_trailing_comma,
      $this->_right_angle
    );
  }

  public function hasLeftAngle(): bool {
    return !$this->_left_angle->isMissing();
  }

  /**
   * @return LessThanToken
   */
  public function getLeftAngle(): LessThanToken {
    \assert($this->_left_angle instanceof LessThanToken);
    return $this->_left_angle;
  }

  /**
   * @return LessThanToken
   */
  public function getLeftAnglex(): LessThanToken {
    return $this->getLeftAngle();
  }

  public function getKeyUNTYPED(): EditableNode {
    return $this->_key;
  }

  /**
   * @return static
   */
  public function withKey(EditableNode $value) {
    if ($value === $this->_key) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_angle,
      $value,
      $this->_comma,
      $this->_value,
      $this->_trailing_comma,
      $this->_right_angle
    );
  }

  public function hasKey(): bool {
    return !$this->_key->isMissing();
  }

  /**
   * @return SimpleTypeSpecifier
   */
  public function getKey(): SimpleTypeSpecifier {
    \assert($this->_key instanceof SimpleTypeSpecifier);
    return $this->_key;
  }

  /**
   * @return SimpleTypeSpecifier
   */
  public function getKeyx(): SimpleTypeSpecifier {
    return $this->getKey();
  }

  public function getCommaUNTYPED(): EditableNode {
    return $this->_comma;
  }

  /**
   * @return static
   */
  public function withComma(EditableNode $value) {
    if ($value === $this->_comma) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_angle,
      $this->_key,
      $value,
      $this->_value,
      $this->_trailing_comma,
      $this->_right_angle
    );
  }

  public function hasComma(): bool {
    return !$this->_comma->isMissing();
  }

  /**
   * @return CommaToken
   */
  public function getComma(): CommaToken {
    \assert($this->_comma instanceof CommaToken);
    return $this->_comma;
  }

  /**
   * @return CommaToken
   */
  public function getCommax(): CommaToken {
    return $this->getComma();
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
    return new static(
      $this->_keyword,
      $this->_left_angle,
      $this->_key,
      $this->_comma,
      $value,
      $this->_trailing_comma,
      $this->_right_angle
    );
  }

  public function hasValue(): bool {
    return !$this->_value->isMissing();
  }

  /**
   * @return DarrayTypeSpecifier | SimpleTypeSpecifier | VarrayTypeSpecifier |
   * VectorArrayTypeSpecifier
   */
  public function getValue(): EditableNode {
    \assert($this->_value instanceof EditableNode);
    return $this->_value;
  }

  /**
   * @return DarrayTypeSpecifier | SimpleTypeSpecifier | VarrayTypeSpecifier |
   * VectorArrayTypeSpecifier
   */
  public function getValuex(): EditableNode {
    return $this->getValue();
  }

  public function getTrailingCommaUNTYPED(): EditableNode {
    return $this->_trailing_comma;
  }

  /**
   * @return static
   */
  public function withTrailingComma(EditableNode $value) {
    if ($value === $this->_trailing_comma) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_angle,
      $this->_key,
      $this->_comma,
      $this->_value,
      $value,
      $this->_right_angle
    );
  }

  public function hasTrailingComma(): bool {
    return !$this->_trailing_comma->isMissing();
  }

  /**
   * @return Missing
   */
  public function getTrailingComma(): ?EditableNode {
    if ($this->_trailing_comma->isMissing()) {
      return null;
    }
    \assert($this->_trailing_comma instanceof EditableNode);
    return $this->_trailing_comma;
  }

  /**
   * @return s
   */
  public function getTrailingCommax(): EditableNode {
    \assert($this->_trailing_comma instanceof EditableNode);
    return $this->_trailing_comma;
  }

  public function getRightAngleUNTYPED(): EditableNode {
    return $this->_right_angle;
  }

  /**
   * @return static
   */
  public function withRightAngle(EditableNode $value) {
    if ($value === $this->_right_angle) {
      return $this;
    }
    return new static(
      $this->_keyword,
      $this->_left_angle,
      $this->_key,
      $this->_comma,
      $this->_value,
      $this->_trailing_comma,
      $value
    );
  }

  public function hasRightAngle(): bool {
    return !$this->_right_angle->isMissing();
  }

  /**
   * @return GreaterThanToken
   */
  public function getRightAngle(): GreaterThanToken {
    \assert($this->_right_angle instanceof GreaterThanToken);
    return $this->_right_angle;
  }

  /**
   * @return GreaterThanToken
   */
  public function getRightAnglex(): GreaterThanToken {
    return $this->getRightAngle();
  }
}
