<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class ScopeResolutionExpression extends EditableNode
{
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
    public function __construct(EditableNode $qualifier, EditableNode $operator, EditableNode $name)
    {
        parent::__construct('scope_resolution_expression');
        $this->_qualifier = $qualifier;
        $this->_operator = $operator;
        $this->_name = $name;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $qualifier = EditableNode::fromJSON($json['scope_resolution_qualifier'], $file, $offset, $source);
        $offset += $qualifier->getWidth();
        $operator = EditableNode::fromJSON($json['scope_resolution_operator'], $file, $offset, $source);
        $offset += $operator->getWidth();
        $name = EditableNode::fromJSON($json['scope_resolution_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        return new static($qualifier, $operator, $name);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('qualifier' => $this->_qualifier, 'operator' => $this->_operator, 'name' => $this->_name);
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? array() : (array) $parents;
        $parents[] = $this;
        $qualifier = $this->_qualifier->rewrite($rewriter, $parents);
        $operator = $this->_operator->rewrite($rewriter, $parents);
        $name = $this->_name->rewrite($rewriter, $parents);
        if ($qualifier === $this->_qualifier && $operator === $this->_operator && $name === $this->_name) {
            return $this;
        }
        return new static($qualifier, $operator, $name);
    }
    /**
     * @return EditableNode
     */
    public function getQualifierUNTYPED()
    {
        return $this->_qualifier;
    }
    /**
     * @return static
     */
    public function withQualifier(EditableNode $value)
    {
        if ($value === $this->_qualifier) {
            return $this;
        }
        return new static($value, $this->_operator, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasQualifier()
    {
        return !$this->_qualifier->isMissing();
    }
    /**
     * @return FunctionCallExpression | GenericTypeSpecifier | LiteralExpression
     * | ParenthesizedExpression | PipeVariableExpression | PrefixUnaryExpression
     * | QualifiedName | ScopeResolutionExpression | SimpleTypeSpecifier |
     * XHPClassNameToken | NameToken | ParentToken | SelfToken | StaticToken |
     * VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getQualifier()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_qualifier);
    }
    /**
     * @return FunctionCallExpression | GenericTypeSpecifier | LiteralExpression
     * | ParenthesizedExpression | PipeVariableExpression | PrefixUnaryExpression
     * | QualifiedName | ScopeResolutionExpression | SimpleTypeSpecifier |
     * XHPClassNameToken | NameToken | ParentToken | SelfToken | StaticToken |
     * VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getQualifierx()
    {
        return $this->getQualifier();
    }
    /**
     * @return EditableNode
     */
    public function getOperatorUNTYPED()
    {
        return $this->_operator;
    }
    /**
     * @return static
     */
    public function withOperator(EditableNode $value)
    {
        if ($value === $this->_operator) {
            return $this;
        }
        return new static($this->_qualifier, $value, $this->_name);
    }
    /**
     * @return bool
     */
    public function hasOperator()
    {
        return !$this->_operator->isMissing();
    }
    /**
     * @return ColonColonToken
     */
    /**
     * @return ColonColonToken
     */
    public function getOperator()
    {
        return TypeAssert\instance_of(ColonColonToken::class, $this->_operator);
    }
    /**
     * @return ColonColonToken
     */
    /**
     * @return ColonColonToken
     */
    public function getOperatorx()
    {
        return $this->getOperator();
    }
    /**
     * @return EditableNode
     */
    public function getNameUNTYPED()
    {
        return $this->_name;
    }
    /**
     * @return static
     */
    public function withName(EditableNode $value)
    {
        if ($value === $this->_name) {
            return $this;
        }
        return new static($this->_qualifier, $this->_operator, $value);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return BracedExpression | PrefixUnaryExpression | ClassToken | NameToken
     * | VariableToken
     */
    /**
     * @return EditableNode
     */
    public function getName()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_name);
    }
    /**
     * @return BracedExpression | PrefixUnaryExpression | ClassToken | NameToken
     * | VariableToken
     */
    /**
     * @return EditableNode
     */
    public function getNamex()
    {
        return $this->getName();
    }
}

