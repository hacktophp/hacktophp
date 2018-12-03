<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<953198e3455abc447403ead911f5ebf5>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class AwaitableCreationExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_attribute_spec;
  /**
   * @var EditableNode
   */
  private $_async;
  /**
   * @var EditableNode
   */
  private $_coroutine;
  /**
   * @var EditableNode
   */
  private $_compound_statement;

  public function __construct(
    EditableNode $attribute_spec,
    EditableNode $async,
    EditableNode $coroutine,
    EditableNode $compound_statement
  ) {
    parent::__construct('awaitable_creation_expression');
    $this->_attribute_spec = $attribute_spec;
    $this->_async = $async;
    $this->_coroutine = $coroutine;
    $this->_compound_statement = $compound_statement;
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
    $attribute_spec = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['awaitable_attribute_spec'],
      $file,
      $offset,
      $source
    );
    $offset += $attribute_spec->getWidth();
    $async = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['awaitable_async'],
      $file,
      $offset,
      $source
    );
    $offset += $async->getWidth();
    $coroutine = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['awaitable_coroutine'],
      $file,
      $offset,
      $source
    );
    $offset += $coroutine->getWidth();
    $compound_statement = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['awaitable_compound_statement'],
      $file,
      $offset,
      $source
    );
    $offset += $compound_statement->getWidth();
    return new static($attribute_spec, $async, $coroutine, $compound_statement);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'attribute_spec' => $this->_attribute_spec,
      'async' => $this->_async,
      'coroutine' => $this->_coroutine,
      'compound_statement' => $this->_compound_statement,
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
    $attribute_spec = $this->_attribute_spec->rewrite($rewriter, $parents);
    $async = $this->_async->rewrite($rewriter, $parents);
    $coroutine = $this->_coroutine->rewrite($rewriter, $parents);
    $compound_statement =
      $this->_compound_statement->rewrite($rewriter, $parents);
    if (
      $attribute_spec === $this->_attribute_spec &&
      $async === $this->_async &&
      $coroutine === $this->_coroutine &&
      $compound_statement === $this->_compound_statement
    ) {
      return $this;
    }
    return new static($attribute_spec, $async, $coroutine, $compound_statement);
  }

  public function getAttributeSpecUNTYPED(): EditableNode {
    return $this->_attribute_spec;
  }

  /**
   * @return static
   */
  public function withAttributeSpec(EditableNode $value) {
    if ($value === $this->_attribute_spec) {
      return $this;
    }
    return new static(
      $value,
      $this->_async,
      $this->_coroutine,
      $this->_compound_statement
    );
  }

  public function hasAttributeSpec(): bool {
    return !$this->_attribute_spec->isMissing();
  }

  /**
   * @return AttributeSpecification | Missing
   */
  public function getAttributeSpec(): ?AttributeSpecification {
    if ($this->_attribute_spec->isMissing()) {
      return null;
    }
    \assert($this->_attribute_spec instanceof AttributeSpecification);
    return $this->_attribute_spec;
  }

  /**
   * @return AttributeSpecification
   */
  public function getAttributeSpecx(): AttributeSpecification {
    \assert($this->_attribute_spec instanceof AttributeSpecification);
    return $this->_attribute_spec;
  }

  public function getAsyncUNTYPED(): EditableNode {
    return $this->_async;
  }

  /**
   * @return static
   */
  public function withAsync(EditableNode $value) {
    if ($value === $this->_async) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $value,
      $this->_coroutine,
      $this->_compound_statement
    );
  }

  public function hasAsync(): bool {
    return !$this->_async->isMissing();
  }

  /**
   * @return AsyncToken
   */
  public function getAsync(): AsyncToken {
    \assert($this->_async instanceof AsyncToken);
    return $this->_async;
  }

  /**
   * @return AsyncToken
   */
  public function getAsyncx(): AsyncToken {
    return $this->getAsync();
  }

  public function getCoroutineUNTYPED(): EditableNode {
    return $this->_coroutine;
  }

  /**
   * @return static
   */
  public function withCoroutine(EditableNode $value) {
    if ($value === $this->_coroutine) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $this->_async,
      $value,
      $this->_compound_statement
    );
  }

  public function hasCoroutine(): bool {
    return !$this->_coroutine->isMissing();
  }

  /**
   * @return Missing
   */
  public function getCoroutine(): ?EditableNode {
    if ($this->_coroutine->isMissing()) {
      return null;
    }
    \assert($this->_coroutine instanceof EditableNode);
    return $this->_coroutine;
  }

  /**
   * @return s
   */
  public function getCoroutinex(): EditableNode {
    \assert($this->_coroutine instanceof EditableNode);
    return $this->_coroutine;
  }

  public function getCompoundStatementUNTYPED(): EditableNode {
    return $this->_compound_statement;
  }

  /**
   * @return static
   */
  public function withCompoundStatement(EditableNode $value) {
    if ($value === $this->_compound_statement) {
      return $this;
    }
    return new static(
      $this->_attribute_spec,
      $this->_async,
      $this->_coroutine,
      $value
    );
  }

  public function hasCompoundStatement(): bool {
    return !$this->_compound_statement->isMissing();
  }

  /**
   * @return CompoundStatement
   */
  public function getCompoundStatement(): CompoundStatement {
    \assert($this->_compound_statement instanceof CompoundStatement);
    return $this->_compound_statement;
  }

  /**
   * @return CompoundStatement
   */
  public function getCompoundStatementx(): CompoundStatement {
    return $this->getCompoundStatement();
  }
}
