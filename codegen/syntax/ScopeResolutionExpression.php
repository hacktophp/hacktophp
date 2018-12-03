<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a4d26ce02300bc32a1759e2797559c86>>
 */
namespace HackToPhp\HHAST\Node;
use Facebook\TypeAssert;

final class ScopeResolutionExpression extends EditableNode {

  /**
   * @var EditableNode
   */
  private $_qualifier;
  /**
   * @var EditableNode
   */
  private $_operator;
  /**
   * @var EditableNode
   */
  private $_name;

  public function __construct(
    EditableNode $qualifier,
    EditableNode $operator,
    EditableNode $name
  ) {
    parent::__construct('scope_resolution_expression');
    $this->_qualifier = $qualifier;
    $this->_operator = $operator;
    $this->_name = $name;
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
    $qualifier = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['scope_resolution_qualifier'],
      $file,
      $offset,
      $source
    );
    $offset += $qualifier->getWidth();
    $operator = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['scope_resolution_operator'],
      $file,
      $offset,
      $source
    );
    $offset += $operator->getWidth();
    $name = EditableNode::fromJSON(
      /* UNSAFE_EXPR */ $json['scope_resolution_name'],
      $file,
      $offset,
      $source
    );
    $offset += $name->getWidth();
    return new static($qualifier, $operator, $name);
  }

  /**
   * @return array<string, EditableNode>
   */
  public function getChildren() : array {
    return [
      'qualifier' => $this->_qualifier,
      'operator' => $this->_operator,
      'name' => $this->_name,
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
    $qualifier = $this->_qualifier->rewrite($rewriter, $parents);
    $operator = $this->_operator->rewrite($rewriter, $parents);
    $name = $this->_name->rewrite($rewriter, $parents);
    if (
      $qualifier === $this->_qualifier &&
      $operator === $this->_operator &&
      $name === $this->_name
    ) {
      return $this;
    }
    return new static($qualifier, $operator, $name);
  }

  public function getQualifierUNTYPED(): EditableNode {
    return $this->_qualifier;
  }

  /**
   * @return static
   */
  public function withQualifier(EditableNode $value) {
    if ($value === $this->_qualifier) {
      return $this;
    }
    return new static($value, $this->_operator, $this->_name);
  }

  public function hasQualifier(): bool {
    return !$this->_qualifier->isMissing();
  }

  /**
   * @return FunctionCallExpression | GenericTypeSpecifier | LiteralExpression
   * | ParenthesizedExpression | PipeVariableExpression | PrefixUnaryExpression
   * | QualifiedName | ScopeResolutionExpression | SimpleTypeSpecifier |
   * XHPClassNameToken | NameToken | ParentToken | SelfToken | StaticToken |
   * VariableExpression
   */
  public function getQualifier(): EditableNode {
    \assert($this->_qualifier instanceof EditableNode);
    return $this->_qualifier;
  }

  /**
   * @return FunctionCallExpression | GenericTypeSpecifier | LiteralExpression
   * | ParenthesizedExpression | PipeVariableExpression | PrefixUnaryExpression
   * | QualifiedName | ScopeResolutionExpression | SimpleTypeSpecifier |
   * XHPClassNameToken | NameToken | ParentToken | SelfToken | StaticToken |
   * VariableExpression
   */
  public function getQualifierx(): EditableNode {
    return $this->getQualifier();
  }

  public function getOperatorUNTYPED(): EditableNode {
    return $this->_operator;
  }

  /**
   * @return static
   */
  public function withOperator(EditableNode $value) {
    if ($value === $this->_operator) {
      return $this;
    }
    return new static($this->_qualifier, $value, $this->_name);
  }

  public function hasOperator(): bool {
    return !$this->_operator->isMissing();
  }

  /**
   * @return ColonColonToken
   */
  public function getOperator(): ColonColonToken {
    \assert($this->_operator instanceof ColonColonToken);
    return $this->_operator;
  }

  /**
   * @return ColonColonToken
   */
  public function getOperatorx(): ColonColonToken {
    return $this->getOperator();
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
    return new static($this->_qualifier, $this->_operator, $value);
  }

  public function hasName(): bool {
    return !$this->_name->isMissing();
  }

  /**
   * @return BracedExpression | PrefixUnaryExpression | ClassToken | NameToken
   * | VariableToken
   */
  public function getName(): EditableNode {
    \assert($this->_name instanceof EditableNode);
    return $this->_name;
  }

  /**
   * @return BracedExpression | PrefixUnaryExpression | ClassToken | NameToken
   * | VariableToken
   */
  public function getNamex(): EditableNode {
    return $this->getName();
  }
}
