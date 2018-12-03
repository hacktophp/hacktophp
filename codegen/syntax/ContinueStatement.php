<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<875a1adc2ac3f6ef3a5d04fc1da4156d>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class ContinueStatement extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_level;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $level,
    EditableNode $semicolon
  ) {
    parent::__construct('continue_statement');
    $this->_keyword = $keyword;
    $this->_level = $level;
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
      /* UNSAFE_EXPR */ $json['continue_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $level = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['continue_level'],
      $file,
      $offset,
      $source
    );
    $offset += $level->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['continue_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($keyword, $level, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'level' => $this->_level,
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
    $level = $this->_level->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $level === $this->_level &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($keyword, $level, $semicolon);
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
    return new static($value, $this->_level, $this->_semicolon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @returns ContinueToken
   */
  public function getKeyword(): ContinueToken {
    return TypeAssert\instance_of(ContinueToken::class, $this->_keyword);
  }

  /**
   * @returns ContinueToken
   */
  public function getKeywordx(): ContinueToken {
    return $this->getKeyword();
  }

  public function getLevelUNTYPED(): EditableNode {
    return $this->_level;
  }

  /**
   * @return static
   */
  public function withLevel(EditableNode $value) {
    if ($value === $this->_level) {
      return $this;
    }
    return new static($this->_keyword, $value, $this->_semicolon);
  }

  public function hasLevel(): bool {
    return !$this->_level->isMissing();
  }

  /**
   * @returns LiteralExpression | Missing | VariableExpression
   */
  public function getLevel(): ?EditableNode {
    if ($this->_level->isMissing()) {
      return null;
    }
    return TypeAssert\instance_of(EditableNode::class, $this->_level);
  }

  /**
   * @returns LiteralExpression | VariableExpression
   */
  public function getLevelx(): EditableNode {
    return TypeAssert\instance_of(EditableNode::class, $this->_level);
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
    return new static($this->_keyword, $this->_level, $value);
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
