<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4f5556b44e4f860ef90aaca8b92bd5e2>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class InclusionExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_require;
  /**
   * @var EditableNode
   */
  private $_filename;

  public function __construct(EditableNode $require, EditableNode $filename) {
    parent::__construct('inclusion_expression');
    $this->_require = $require;
    $this->_filename = $filename;
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
    $require = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['inclusion_require'],
      $file,
      $offset,
      $source
    );
    $offset += $require->getWidth();
    $filename = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['inclusion_filename'],
      $file,
      $offset,
      $source
    );
    $offset += $filename->getWidth();
    return new static($require, $filename);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'require' => $this->_require,
      'filename' => $this->_filename,
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
    $require = $this->_require->rewrite($rewriter, $parents);
    $filename = $this->_filename->rewrite($rewriter, $parents);
    if ($require === $this->_require && $filename === $this->_filename) {
      return $this;
    }
    return new static($require, $filename);
  }

  public function getRequireUNTYPED(): EditableNode {
    return $this->_require;
  }

  /**
   * @return static
   */
  public function withRequire(EditableNode $value) {
    if ($value === $this->_require) {
      return $this;
    }
    return new static($value, $this->_filename);
  }

  public function hasRequire(): bool {
    return !$this->_require->isMissing();
  }

  /**
   * @return IncludeToken | Include_onceToken | RequireToken |
   * Require_onceToken
   */
  public function getRequire(): EditableToken {
    \assert($this->_require instanceof EditableToken);
    return $this->_require;
  }

  /**
   * @return IncludeToken | Include_onceToken | RequireToken |
   * Require_onceToken
   */
  public function getRequirex(): EditableToken {
    return $this->getRequire();
  }

  public function getFilenameUNTYPED(): EditableNode {
    return $this->_filename;
  }

  /**
   * @return static
   */
  public function withFilename(EditableNode $value) {
    if ($value === $this->_filename) {
      return $this;
    }
    return new static($this->_require, $value);
  }

  public function hasFilename(): bool {
    return !$this->_filename->isMissing();
  }

  /**
   * @return BinaryExpression | LiteralExpression | ParenthesizedExpression |
   * SubscriptExpression | NameToken | VariableExpression
   */
  public function getFilename(): EditableNode {
    \assert($this->_filename instanceof EditableNode);
    return $this->_filename;
  }

  /**
   * @return BinaryExpression | LiteralExpression | ParenthesizedExpression |
   * SubscriptExpression | NameToken | VariableExpression
   */
  public function getFilenamex(): EditableNode {
    return $this->getFilename();
  }
}
