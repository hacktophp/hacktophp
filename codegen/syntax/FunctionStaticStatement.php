<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<52ad1657e248e81337b7f612c8f576f6>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class FunctionStaticStatement extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_static_keyword;
  /**
   * @var EditableNode
   */
  private $_declarations;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $static_keyword,
    EditableNode $declarations,
    EditableNode $semicolon
  ) {
    parent::__construct('function_static_statement');
    $this->_static_keyword = $static_keyword;
    $this->_declarations = $declarations;
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
    $static_keyword = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['static_static_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $static_keyword->getWidth();
    $declarations = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['static_declarations'],
      $file,
      $offset,
      $source
    );
    $offset += $declarations->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['static_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($static_keyword, $declarations, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'static_keyword' => $this->_static_keyword,
      'declarations' => $this->_declarations,
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
    $static_keyword = $this->_static_keyword->rewrite($rewriter, $parents);
    $declarations = $this->_declarations->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $static_keyword === $this->_static_keyword &&
      $declarations === $this->_declarations &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($static_keyword, $declarations, $semicolon);
  }

  public function getStaticKeywordUNTYPED(): EditableNode {
    return $this->_static_keyword;
  }

  /**
   * @return static
   */
  public function withStaticKeyword(EditableNode $value) {
    if ($value === $this->_static_keyword) {
      return $this;
    }
    return new static($value, $this->_declarations, $this->_semicolon);
  }

  public function hasStaticKeyword(): bool {
    return !$this->_static_keyword->isMissing();
  }

  /**
   * @returns StaticToken
   */
  public function getStaticKeyword(): StaticToken {
    return TypeAssert\instance_of(StaticToken::class, $this->_static_keyword);
  }

  /**
   * @returns StaticToken
   */
  public function getStaticKeywordx(): StaticToken {
    return $this->getStaticKeyword();
  }

  public function getDeclarationsUNTYPED(): EditableNode {
    return $this->_declarations;
  }

  /**
   * @return static
   */
  public function withDeclarations(EditableNode $value) {
    if ($value === $this->_declarations) {
      return $this;
    }
    return new static($this->_static_keyword, $value, $this->_semicolon);
  }

  public function hasDeclarations(): bool {
    return !$this->_declarations->isMissing();
  }

  /**
   * @return EditableList<StaticDeclarator>
   */
  public function getDeclarations(): EditableList {
    return TypeAssert\instance_of(EditableList::class, $this->_declarations);
  }

  /**
   * @return EditableList<StaticDeclarator>
   */
  public function getDeclarationsx(): EditableList {
    return $this->getDeclarations();
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
    return new static($this->_static_keyword, $this->_declarations, $value);
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
