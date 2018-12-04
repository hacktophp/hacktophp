<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<48387d2ff5f84554544861925d4578ae>>
 */
namespace HackToPhp\HHAST;
use Facebook\TypeAssert;

final class GlobalStatement extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_keyword;
  /**
   * @var EditableNode
   */
  private $_variables;
  /**
   * @var EditableNode
   */
  private $_semicolon;

  public function __construct(
    EditableNode $keyword,
    EditableNode $variables,
    EditableNode $semicolon
  ) {
    parent::__construct('global_statement');
    $this->_keyword = $keyword;
    $this->_variables = $variables;
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
      /* UNSAFE_EXPR */ $json['global_keyword'],
      $file,
      $offset,
      $source
    );
    $offset += $keyword->getWidth();
    $variables = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['global_variables'],
      $file,
      $offset,
      $source
    );
    $offset += $variables->getWidth();
    $semicolon = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['global_semicolon'],
      $file,
      $offset,
      $source
    );
    $offset += $semicolon->getWidth();
    return new static($keyword, $variables, $semicolon);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'keyword' => $this->_keyword,
      'variables' => $this->_variables,
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
    $variables = $this->_variables->rewrite($rewriter, $parents);
    $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
    if (
      $keyword === $this->_keyword &&
      $variables === $this->_variables &&
      $semicolon === $this->_semicolon
    ) {
      return $this;
    }
    return new static($keyword, $variables, $semicolon);
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
    return new static($value, $this->_variables, $this->_semicolon);
  }

  public function hasKeyword(): bool {
    return !$this->_keyword->isMissing();
  }

  /**
   * @return GlobalToken
   */
  public function getKeyword(): GlobalToken {
    \assert($this->_keyword instanceof GlobalToken);
    return $this->_keyword;
  }

  /**
   * @return GlobalToken
   */
  public function getKeywordx(): GlobalToken {
    return $this->getKeyword();
  }

  public function getVariablesUNTYPED(): EditableNode {
    return $this->_variables;
  }

  /**
   * @return static
   */
  public function withVariables(EditableNode $value) {
    if ($value === $this->_variables) {
      return $this;
    }
    return new static($this->_keyword, $value, $this->_semicolon);
  }

  public function hasVariables(): bool {
    return !$this->_variables->isMissing();
  }

  /**
   * @return EditableList<PrefixUnaryExpression> | EditableList<VariableToken>
   */
  public function getVariables(): EditableList {
    \assert($this->_variables instanceof EditableList);
    return $this->_variables;
  }

  /**
   * @return EditableList<PrefixUnaryExpression> | EditableList<VariableToken>
   */
  public function getVariablesx(): EditableList {
    return $this->getVariables();
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
    return new static($this->_keyword, $this->_variables, $value);
  }

  public function hasSemicolon(): bool {
    return !$this->_semicolon->isMissing();
  }

  /**
   * @return SemicolonToken
   */
  public function getSemicolon(): SemicolonToken {
    \assert($this->_semicolon instanceof SemicolonToken);
    return $this->_semicolon;
  }

  /**
   * @return SemicolonToken
   */
  public function getSemicolonx(): SemicolonToken {
    return $this->getSemicolon();
  }
}
