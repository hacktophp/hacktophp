<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1fada0f17fd48b97dce8783b166f94b5>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class Enumerator extends EditableNode
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
    private $_value;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $name, EditableNode $equal, EditableNode $value, EditableNode $semicolon)
    {
        parent::__construct('enumerator');
        $this->_name = $name;
        $this->_equal = $equal;
        $this->_value = $value;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $name = EditableNode::fromJSON($json['enumerator_name'], $file, $offset, $source);
        $offset += $name->getWidth();
        $equal = EditableNode::fromJSON($json['enumerator_equal'], $file, $offset, $source);
        $offset += $equal->getWidth();
        $value = EditableNode::fromJSON($json['enumerator_value'], $file, $offset, $source);
        $offset += $value->getWidth();
        $semicolon = EditableNode::fromJSON($json['enumerator_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($name, $equal, $value, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('name' => $this->_name, 'equal' => $this->_equal, 'value' => $this->_value, 'semicolon' => $this->_semicolon);
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
        $value = $this->_value->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($name === $this->_name && $equal === $this->_equal && $value === $this->_value && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($name, $equal, $value, $semicolon);
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
        return new static($value, $this->_equal, $this->_value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasName()
    {
        return !$this->_name->isMissing();
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
     */
    public function getName()
    {
        return TypeAssert\instance_of(NameToken::class, $this->_name);
    }
    /**
     * @return NameToken
     */
    /**
     * @return NameToken
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
        return new static($this->_name, $value, $this->_value, $this->_semicolon);
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
    public function getValueUNTYPED()
    {
        return $this->_value;
    }
    /**
     * @return static
     */
    public function withValue(EditableNode $value)
    {
        if ($value === $this->_value) {
            return $this;
        }
        return new static($this->_name, $this->_equal, $value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasValue()
    {
        return !$this->_value->isMissing();
    }
    /**
     * @return BinaryExpression | FunctionCallExpression | LiteralExpression |
     * ObjectCreationExpression | ScopeResolutionExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getValue()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_value);
    }
    /**
     * @return BinaryExpression | FunctionCallExpression | LiteralExpression |
     * ObjectCreationExpression | ScopeResolutionExpression | NameToken |
     * VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getValuex()
    {
        return $this->getValue();
    }
    /**
     * @return EditableNode
     */
    public function getSemicolonUNTYPED()
    {
        return $this->_semicolon;
    }
    /**
     * @return static
     */
    public function withSemicolon(EditableNode $value)
    {
        if ($value === $this->_semicolon) {
            return $this;
        }
        return new static($this->_name, $this->_equal, $this->_value, $value);
    }
    /**
     * @return bool
     */
    public function hasSemicolon()
    {
        return !$this->_semicolon->isMissing();
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolon()
    {
        return TypeAssert\instance_of(SemicolonToken::class, $this->_semicolon);
    }
    /**
     * @return SemicolonToken
     */
    /**
     * @return SemicolonToken
     */
    public function getSemicolonx()
    {
        return $this->getSemicolon();
    }
}

