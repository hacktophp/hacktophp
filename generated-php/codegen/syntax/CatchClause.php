<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d8b43da312eac551c768266e1e7f94f0>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class CatchClause extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_left_paren;
    /**
     * @var EditableNode
     */
    private $_type;
    /**
     * @var EditableNode
     */
    private $_variable;
    /**
     * @var EditableNode
     */
    private $_right_paren;
    /**
     * @var EditableNode
     */
    private $_body;
    public function __construct(EditableNode $keyword, EditableNode $left_paren, EditableNode $type, EditableNode $variable, EditableNode $right_paren, EditableNode $body)
    {
        parent::__construct('catch_clause');
        $this->_keyword = $keyword;
        $this->_left_paren = $left_paren;
        $this->_type = $type;
        $this->_variable = $variable;
        $this->_right_paren = $right_paren;
        $this->_body = $body;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['catch_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $left_paren = EditableNode::fromJSON($json['catch_left_paren'], $file, $offset, $source);
        $offset += $left_paren->getWidth();
        $type = EditableNode::fromJSON($json['catch_type'], $file, $offset, $source);
        $offset += $type->getWidth();
        $variable = EditableNode::fromJSON($json['catch_variable'], $file, $offset, $source);
        $offset += $variable->getWidth();
        $right_paren = EditableNode::fromJSON($json['catch_right_paren'], $file, $offset, $source);
        $offset += $right_paren->getWidth();
        $body = EditableNode::fromJSON($json['catch_body'], $file, $offset, $source);
        $offset += $body->getWidth();
        return new static($keyword, $left_paren, $type, $variable, $right_paren, $body);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'left_paren' => $this->_left_paren, 'type' => $this->_type, 'variable' => $this->_variable, 'right_paren' => $this->_right_paren, 'body' => $this->_body);
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
        $keyword = $this->_keyword->rewrite($rewriter, $parents);
        $left_paren = $this->_left_paren->rewrite($rewriter, $parents);
        $type = $this->_type->rewrite($rewriter, $parents);
        $variable = $this->_variable->rewrite($rewriter, $parents);
        $right_paren = $this->_right_paren->rewrite($rewriter, $parents);
        $body = $this->_body->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $left_paren === $this->_left_paren && $type === $this->_type && $variable === $this->_variable && $right_paren === $this->_right_paren && $body === $this->_body) {
            return $this;
        }
        return new static($keyword, $left_paren, $type, $variable, $right_paren, $body);
    }
    /**
     * @return EditableNode
     */
    public function getKeywordUNTYPED()
    {
        return $this->_keyword;
    }
    /**
     * @return static
     */
    public function withKeyword(EditableNode $value)
    {
        if ($value === $this->_keyword) {
            return $this;
        }
        return new static($value, $this->_left_paren, $this->_type, $this->_variable, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return CatchToken
     */
    /**
     * @return CatchToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(CatchToken::class, $this->_keyword);
    }
    /**
     * @return CatchToken
     */
    /**
     * @return CatchToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
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
        return new static($this->_keyword, $value, $this->_type, $this->_variable, $this->_right_paren, $this->_body);
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
        return new static($this->_keyword, $this->_left_paren, $value, $this->_variable, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasType()
    {
        return !$this->_type->isMissing();
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getType()
    {
        return TypeAssert\instance_of(SimpleTypeSpecifier::class, $this->_type);
    }
    /**
     * @return SimpleTypeSpecifier
     */
    /**
     * @return SimpleTypeSpecifier
     */
    public function getTypex()
    {
        return $this->getType();
    }
    /**
     * @return EditableNode
     */
    public function getVariableUNTYPED()
    {
        return $this->_variable;
    }
    /**
     * @return static
     */
    public function withVariable(EditableNode $value)
    {
        if ($value === $this->_variable) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_type, $value, $this->_right_paren, $this->_body);
    }
    /**
     * @return bool
     */
    public function hasVariable()
    {
        return !$this->_variable->isMissing();
    }
    /**
     * @return NameToken | VariableToken
     */
    /**
     * @return EditableToken
     */
    public function getVariable()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_variable);
    }
    /**
     * @return NameToken | VariableToken
     */
    /**
     * @return EditableToken
     */
    public function getVariablex()
    {
        return $this->getVariable();
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
        return new static($this->_keyword, $this->_left_paren, $this->_type, $this->_variable, $value, $this->_body);
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
    public function getBodyUNTYPED()
    {
        return $this->_body;
    }
    /**
     * @return static
     */
    public function withBody(EditableNode $value)
    {
        if ($value === $this->_body) {
            return $this;
        }
        return new static($this->_keyword, $this->_left_paren, $this->_type, $this->_variable, $this->_right_paren, $value);
    }
    /**
     * @return bool
     */
    public function hasBody()
    {
        return !$this->_body->isMissing();
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getBody()
    {
        return TypeAssert\instance_of(CompoundStatement::class, $this->_body);
    }
    /**
     * @return CompoundStatement
     */
    /**
     * @return CompoundStatement
     */
    public function getBodyx()
    {
        return $this->getBody();
    }
}

