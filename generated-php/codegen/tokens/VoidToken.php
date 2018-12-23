<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d18c2911ac9f157f3a3551e189d8b708>>
 */
namespace Facebook\HHAST;

final class VoidToken extends EditableTokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'void';
    public function __construct(EditableNode $leading, EditableNode $trailing, string $token_text = 'void')
    {
        parent::__construct($leading, $trailing, $token_text);
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
        return new self($value, $this->getTrailing());
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
        return new self($this->getLeading(), $value);
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
        if ($leading === $this->getLeading() && $trailing === $this->getTrailing()) {
            return $this;
        }
        return new self($leading, $trailing);
    }
}

