<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c626083815d15e0469614291f808c88d>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert;
final class InclusionDirective extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_expression;
    /**
     * @var EditableNode
     */
    private $_semicolon;
    public function __construct(EditableNode $expression, EditableNode $semicolon)
    {
        parent::__construct('inclusion_directive');
        $this->_expression = $expression;
        $this->_semicolon = $semicolon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $expression = EditableNode::fromJSON($json['inclusion_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        $semicolon = EditableNode::fromJSON($json['inclusion_semicolon'], $file, $offset, $source);
        $offset += $semicolon->getWidth();
        return new static($expression, $semicolon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return ['expression' => $this->_expression, 'semicolon' => $this->_semicolon];
    }
    /**
     * @param mixed $rewriter
     * @param array<int, EditableNode>|null $parents
     *
     * @return static
     */
    public function rewriteDescendants($rewriter, ?array $parents = null)
    {
        $parents = $parents === null ? [] : (array) $parents;
        $parents[] = $this;
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $semicolon = $this->_semicolon->rewrite($rewriter, $parents);
        if ($expression === $this->_expression && $semicolon === $this->_semicolon) {
            return $this;
        }
        return new static($expression, $semicolon);
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
        return new static($value, $this->_semicolon);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return InclusionExpression
     */
    /**
     * @return InclusionExpression
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(InclusionExpression::class, $this->_expression);
    }
    /**
     * @return InclusionExpression
     */
    /**
     * @return InclusionExpression
     */
    public function getExpressionx()
    {
        return $this->getExpression();
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
        return new static($this->_expression, $value);
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

