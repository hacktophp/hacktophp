<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a0aa0a0baeea58bff92e7d4510abc8e0>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class LambdaSignature extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_parameters;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_colon;
    /**
     * @var EditableNode
     */
    private $_type;
    public function __construct(EditableNode $left_paren, EditableNode $parameters, EditableNode $right_paren, EditableNode $colon, EditableNode $type)
    {
        parent::__construct('lambda_signature');
        $this->_left_paren = $left_paren;
        $this->_parameters = $parameters;
        $this->_right_paren = $right_paren;
        $this->_colon = $colon;
        $this->_type = $type;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $left_paren = EditableNode::fromJSON($json['lambda_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $parameters = EditableNode::fromJSON($json['lambda_parameters'], $file, $offset, $source);
        $offset += $parameters->getWidth();
        $right_paren = EditableNode::fromJSON($json['lambda_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $colon = EditableNode::fromJSON($json['lambda_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        $type = EditableNode::fromJSON($json['lambda_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        return new static($left_paren, $parameters, $right_paren, $colon, $type);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('left_paren' => $this->_left_paren, 'parameters' => $this->_parameters, 'right_paren' => $this->_right_paren, 'colon' => $this->_colon, 'type' => $this->_type);
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
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $parameters = $this->_parameters->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        if ($left_paren === $this->_left_paren && $parameters === $this->_parameters && $right_paren === $this->_right_paren && $colon === $this->_colon && $type === $this->_type) {
            return $this;
        }
        return new static($left_paren, $parameters, $right_paren, $colon, $type);
    }
    /**
     * @return EditableNode
     */
    public function getLeftParenUNTYPED()
    {
        return $this->_left_paren;
    }
    /**
     * @return static
     */
    public function withLeftParen(EditableNode $value)
    {
        if ($value === $this->_left_paren) {
            return $this;
        }
        return new static($value, $this->_parameters, $this->_right_paren, $this->_colon, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasLeftParen()
    {
        return !$this->_left_paren->isMissing();
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParen()
    {
        return TypeAssert\instance_of(LeftParenToken::class, $this->_left_paren);
    }
    /**
     * @return LeftParenToken
     */
    /**
     * @return LeftParenToken
     */
    public function getLeftParenx()
    {
        return $this->getLeftParen();
    }
    /**
     * @return EditableNode
     */
    public function getParametersUNTYPED()
    {
        return $this->_parameters;
    }
    /**
     * @return static
     */
    public function withParameters(EditableNode $value)
    {
        if ($value === $this->_parameters) {
            return $this;
        }
        return new static($this->_left_paren, $value, $this->_right_paren, $this->_colon, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasParameters()
    {
        return !$this->_parameters->isMissing();
    }
    /**
     * @return EditableList<ParameterDeclaration> | EditableList<EditableNode> |
     * EditableList<VariadicParameter> | null
     */
    /**
     * @return EditableList<EditableNode>|null
     */
    public function getParameters()
    {
        if ($this->_parameters->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableList::class, $this->_parameters);
    }
    /**
     * @return EditableList<ParameterDeclaration> | EditableList<EditableNode> |
     * EditableList<VariadicParameter>
     */
    /**
     * @return EditableList<EditableNode>
     */
    public function getParametersx()
    {
        return TypeAssert\instance_of(EditableList::class, $this->_parameters);
    }
    /**
     * @return EditableNode
     */
    public function getRightParenUNTYPED()
    {
        return $this->_right_paren;
    }
    /**
     * @return static
     */
    public function withRightParen(EditableNode $value)
    {
        if ($value === $this->_right_paren) {
            return $this;
        }
        return new static($this->_left_paren, $this->_parameters, $value, $this->_colon, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasRightParen()
    {
        return !$this->_right_paren->isMissing();
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParen()
    {
        return TypeAssert\instance_of(RightParenToken::class, $this->_right_paren);
    }
    /**
     * @return RightParenToken
     */
    /**
     * @return RightParenToken
     */
    public function getRightParenx()
    {
        return $this->getRightParen();
    }
    /**
     * @return EditableNode
     */
    public function getColonUNTYPED()
    {
        return $this->_colon;
    }
    /**
     * @return static
     */
    public function withColon(EditableNode $value)
    {
        if ($value === $this->_colon) {
            return $this;
        }
        return new static($this->_left_paren, $this->_parameters, $this->_right_paren, $value, $this->_type);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return !$this->_colon->isMissing();
    }
    /**
     * @return null | ColonToken
     */
    /**
     * @return null|ColonToken
     */
    public function getColon()
    {
        if ($this->_colon->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(ColonToken::class, $this->_colon);
    }
    /**
     * @return ColonToken
     */
    /**
     * @return ColonToken
     */
    public function getColonx()
    {
        return TypeAssert\instance_of(ColonToken::class, $this->_colon);
    }
    /**
     * @return EditableNode
     */
    public function getTypeUNTYPED()
    {
        return $this->_type;
    }
    /**
     * @return static
     */
    public function withType(EditableNode $value)
    {
        if ($value === $this->_type) {
            return $this;
        }
        return new static($this->_left_paren, $this->_parameters, $this->_right_paren, $this->_colon, $value);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier | null |
     * SimpleTypeSpecifier
     */
    /**
     * @return null|EditableNode
     */
    public function getType()
    {
        if ($this->_type->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
    /**
     * @return ClosureTypeSpecifier | GenericTypeSpecifier | SimpleTypeSpecifier
     */
    /**
     * @return EditableNode
     */
    public function getTypex()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_type);
    }
}

