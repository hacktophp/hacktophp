<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d6429e2d2e4ea340d943df67da267e02>>
 */
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class CaseLabel extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_keyword;
    /**
     * @var EditableNode
     */
    private $_expression;
    /**
     * @var EditableNode
     */
    private $_colon;
    public function __construct(EditableNode $keyword, EditableNode $expression, EditableNode $colon)
    {
        parent::__construct('case_label');
        $this->_keyword = $keyword;
        $this->_expression = $expression;
        $this->_colon = $colon;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $keyword = EditableNode::fromJSON($json['case_keyword'], $file, $offset, $source);
        $offset += $keyword->getWidth();
        $expression = EditableNode::fromJSON($json['case_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        $colon = EditableNode::fromJSON($json['case_colon'], $file, $offset, $source);
        $offset += $colon->getWidth();
        return new static($keyword, $expression, $colon);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('keyword' => $this->_keyword, 'expression' => $this->_expression, 'colon' => $this->_colon);
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
        $expression = $this->_expression->rewrite($rewriter, $parents);
        $colon = $this->_colon->rewrite($rewriter, $parents);
        if ($keyword === $this->_keyword && $expression === $this->_expression && $colon === $this->_colon) {
            return $this;
        }
        return new static($keyword, $expression, $colon);
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
        return new static($value, $this->_expression, $this->_colon);
    }
    /**
     * @return bool
     */
    public function hasKeyword()
    {
        return !$this->_keyword->isMissing();
    }
    /**
     * @return CaseToken
     */
    /**
     * @return CaseToken
     */
    public function getKeyword()
    {
        return TypeAssert\instance_of(CaseToken::class, $this->_keyword);
    }
    /**
     * @return CaseToken
     */
    /**
     * @return CaseToken
     */
    public function getKeywordx()
    {
        return $this->getKeyword();
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
        return new static($this->_keyword, $value, $this->_colon);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return ArrayIntrinsicExpression | FunctionCallExpression |
     * InstanceofExpression | LiteralExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | NameToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getExpression()
    {
        return TypeAssert\instance_of(EditableNode::class, $this->_expression);
    }
    /**
     * @return ArrayIntrinsicExpression | FunctionCallExpression |
     * InstanceofExpression | LiteralExpression | PrefixUnaryExpression |
     * ScopeResolutionExpression | NameToken | VariableExpression
     */
    /**
     * @return EditableNode
     */
    public function getExpressionx()
    {
        return $this->getExpression();
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
        return new static($this->_keyword, $this->_expression, $value);
    }
    /**
     * @return bool
     */
    public function hasColon()
    {
        return !$this->_colon->isMissing();
    }
    /**
     * @return ColonToken | SemicolonToken
     */
    /**
     * @return EditableToken
     */
    public function getColon()
    {
        return TypeAssert\instance_of(EditableToken::class, $this->_colon);
    }
    /**
     * @return ColonToken | SemicolonToken
     */
    /**
     * @return EditableToken
     */
    public function getColonx()
    {
        return $this->getColon();
    }
}

