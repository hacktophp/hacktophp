<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f2bf5048a1b6a54920f62b169889a36a>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class XHPSimpleAttribute extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_name;
    /**
     * @var EditableNode
     */
    private $_equal;
    /**
     * @var EditableNode
     */
    private $_expression;
    public function __construct(EditableNode $name, EditableNode $equal, EditableNode $expression)
    {
        parent::__construct('xhp_simple_attribute');
        $this->_name = $name;
        $this->_equal = $equal;
        $this->_expression = $expression;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $name = EditableNode::fromJSON($json['xhp_simple_attribute_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $equal = EditableNode::fromJSON($json['xhp_simple_attribute_equal'], $file, $offset, $source);
        $offset += $equal->getWidth();
        $expression = EditableNode::fromJSON($json['xhp_simple_attribute_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        return new static($name, $equal, $expression);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('name' => $this->_name, 'equal' => $this->_equal, 'expression' => $this->_expression);
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
        $name = $this->_name->rewrite($rewriter, $parents);
        $equal = $this->_equal->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);
        if ($name === $this->_name && $equal === $this->_equal && $expression === $this->_expression) {
            return $this;
        }
        return new static($name, $equal, $expression);
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
        return new static($value, $this->_equal, $this->_expression);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return XHPElementNameToken
     */
    /**
     * @return XHPElementNameToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(XHPElementNameToken::class, $this->_name);
    }
    /**
     * @return XHPElementNameToken
     */
    /**
     * @return XHPElementNameToken
     */
    public function getNamex()
    {
        return $this->getName();
    }
    /**
     * @return EditableNode
     */
    public function getEqualUNTYPED()
    {
        return $this->_equal;
    }
    /**
     * @return static
     */
    public function withEqual(EditableNode $value)
    {
        if ($value === $this->_equal) {
            return $this;
        }
        return new static($this->_name, $value, $this->_expression);
    }
    /**
     * @return bool
     */
    public function hasEqual()
    {
        return !$this->_equal->isMissing();
    }
    /**
     * @return EqualToken
     */
    /**
     * @return EqualToken
     */
    public function getEqual()
    {
        return TypeAssert\instance_of(EqualToken::class, $this->_equal);
    }
    /**
     * @return EqualToken
     */
    /**
     * @return EqualToken
     */
    public function getEqualx()
    {
        return $this->getEqual();
    }
    /**
     * @return EditableNode
     */
    public function getExpressionUNTYPED()
    {
        return $this->_expression;
    }
    /**
     * @return static
     */
    public function withExpression(EditableNode $value)
    {
        if ($value === $this->_expression) {
            return $this;
        }
        return new static($this->_name, $this->_equal, $value);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return BracedExpression | XHPStringLiteralToken
     */
    /**
     * @return EditableNode
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_expression);
    }
    /**
     * @return BracedExpression | XHPStringLiteralToken
     */
    /**
     * @return EditableNode
     */
    public function getExpressionx()
    {
        return $this->getExpression();
    }
}

