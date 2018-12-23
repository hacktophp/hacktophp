<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<7a84b0ba61cfd24d42f11ddb7bf742d2>>
 */
namespace Facebook\HHAST;

final class StringLiteralBodyToken extends EditableTokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'string_literal_body';
    public function __construct(EditableNode $leading, EditableNode $trailing, string $text)
    {
        parent::__construct($leading, $trailing, $text);
    }
    /**
     * @return bool
     */
    public function hasLeading()
    {
        return !$this->getLeading()->isMissing();
    }
    /**
     * @return static
     */
    public function withLeading(EditableNode $value)
    {
        if ($value === $this->getLeading()) {
            return $this;
        }
        return new self($value, $this->getTrailing(), $this->getText());
    }
    /**
     * @return bool
     */
    public function hasTrailing()
    {
        return !$this->getTrailing()->isMissing();
    }
    /**
     * @return static
     */
    public function withTrailing(EditableNode $value)
    {
        if ($value === $this->getTrailing()) {
            return $this;
        }
        return new self($this->getLeading(), $value, $this->getText());
    }
    /**
     * @return static
     */
    public function withText(string $value)
    {
        if ($value === $this->getText()) {
            return $this;
        }
        return new self($this->getLeading(), $this->getTrailing(), $value);
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
        $leading = $this->getLeading()->rewrite($rewriter, $parents);
        $trailing = $this->getTrailing()->rewrite($rewriter, $parents);
        $text = $this->getText();
        if ($leading === $this->getLeading() && $trailing === $this->getTrailing() && $text === $this->getText()) {
            return $this;
        }
        return new self($leading, $trailing, $text);
    }
}

