<?php
namespace Facebook\HHAST;

use Facebook\TypeAssert as TypeAssert;
final class MarkupSection extends EditableNode
{
    /**
     * @var EditableNode
     */
    private $_prefix;
    /**
     * @var EditableNode
     */
    private $_text;
    /**
     * @var EditableNode
     */
    private $_suffix;
    /**
     * @var EditableNode
     */
    private $_expression;
    public function __construct(EditableNode $prefix, EditableNode $text, EditableNode $suffix, EditableNode $expression)
    {
        parent::__construct('markup_section');
        $this->_prefix = $prefix;
        $this->_text = $text;
        $this->_suffix = $suffix;
        $this->_expression = $expression;
    }
    /**
     * @param array<string, mixed> $json
     *
     * @return static
     */
    public static function fromJSON(array $json, string $file, int $offset, string $source)
    {
        $prefix = EditableNode::fromJSON($json['markup_prefix'], $file, $offset, $source);
        $offset += $prefix->getWidth();
        $text = EditableNode::fromJSON($json['markup_text'], $file, $offset, $source);
        $offset += $text->getWidth();
        $suffix = EditableNode::fromJSON($json['markup_suffix'], $file, $offset, $source);
        $offset += $suffix->getWidth();
        $expression = EditableNode::fromJSON($json['markup_expression'], $file, $offset, $source);
        $offset += $expression->getWidth();
        return new static($prefix, $text, $suffix, $expression);
    }
    /**
     * @return array<string, EditableNode>
     */
    public function getChildren()
    {
        return array('prefix' => $this->_prefix, 'text' => $this->_text, 'suffix' => $this->_suffix, 'expression' => $this->_expression);
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
        $prefix = $this->_prefix->rewrite($rewriter, $parents);
        $text = $this->_text->rewrite($rewriter, $parents);
        $suffix = $this->_suffix->rewrite($rewriter, $parents);
        $expression = $this->_expression->rewrite($rewriter, $parents);
        if ($prefix === $this->_prefix && $text === $this->_text && $suffix === $this->_suffix && $expression === $this->_expression) {
            return $this;
        }
        return new static($prefix, $text, $suffix, $expression);
    }
    /**
     * @return EditableNode
     */
    public function getPrefixUNTYPED()
    {
        return $this->_prefix;
    }
    /**
     * @return static
     */
    public function withPrefix(EditableNode $value)
    {
        if ($value === $this->_prefix) {
            return $this;
        }
        return new static($value, $this->_text, $this->_suffix, $this->_expression);
    }
    /**
     * @return bool
     */
    public function hasPrefix()
    {
        return !$this->_prefix->isMissing();
    }
    /**
     * @return null | QuestionGreaterThanToken
     */
    /**
     * @return null|QuestionGreaterThanToken
     */
    public function getPrefix()
    {
        if ($this->_prefix->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(QuestionGreaterThanToken::class, $this->_prefix);
    }
    /**
     * @return QuestionGreaterThanToken
     */
    /**
     * @return QuestionGreaterThanToken
     */
    public function getPrefixx()
    {
        return TypeAssert\instance_of(QuestionGreaterThanToken::class, $this->_prefix);
    }
    /**
     * @return EditableNode
     */
    public function getTextUNTYPED()
    {
        return $this->_text;
    }
    /**
     * @return static
     */
    public function withText(EditableNode $value)
    {
        if ($value === $this->_text) {
            return $this;
        }
        return new static($this->_prefix, $value, $this->_suffix, $this->_expression);
    }
    /**
     * @return bool
     */
    public function hasText()
    {
        return !$this->_text->isMissing();
    }
    /**
     * @return null | MarkupToken
     */
    /**
     * @return null|MarkupToken
     */
    public function getText()
    {
        if ($this->_text->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(MarkupToken::class, $this->_text);
    }
    /**
     * @return MarkupToken
     */
    /**
     * @return MarkupToken
     */
    public function getTextx()
    {
        return TypeAssert\instance_of(MarkupToken::class, $this->_text);
    }
    /**
     * @return EditableNode
     */
    public function getSuffixUNTYPED()
    {
        return $this->_suffix;
    }
    /**
     * @return static
     */
    public function withSuffix(EditableNode $value)
    {
        if ($value === $this->_suffix) {
            return $this;
        }
        return new static($this->_prefix, $this->_text, $value, $this->_expression);
    }
    /**
     * @return bool
     */
    public function hasSuffix()
    {
        return !$this->_suffix->isMissing();
    }
    /**
     * @return MarkupSuffix | null
     */
    /**
     * @return null|MarkupSuffix
     */
    public function getSuffix()
    {
        if ($this->_suffix->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(MarkupSuffix::class, $this->_suffix);
    }
    /**
     * @return MarkupSuffix
     */
    /**
     * @return MarkupSuffix
     */
    public function getSuffixx()
    {
        return TypeAssert\instance_of(MarkupSuffix::class, $this->_suffix);
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
        return new static($this->_prefix, $this->_text, $this->_suffix, $value);
    }
    /**
     * @return bool
     */
    public function hasExpression()
    {
        return !$this->_expression->isMissing();
    }
    /**
     * @return ExpressionStatement | null
     */
    /**
     * @return null|ExpressionStatement
     */
    public function getExpression()
    {
        if ($this->_expression->isMissing()) {
            return null;
        }
        return TypeAssert\instance_of(ExpressionStatement::class, $this->_expression);
    }
    /**
     * @return ExpressionStatement
     */
    /**
     * @return ExpressionStatement
     */
    public function getExpressionx()
    {
        return TypeAssert\instance_of(ExpressionStatement::class, $this->_expression);
    }
}

