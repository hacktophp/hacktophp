<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4fd25f477ce8f1d8b8e85beb73d2b45e>>
 */
namespace Facebook\HHAST;


final class RealToken extends EditableTokenWithVariableText {

  const KIND = 'real';

  public function __construct(
    EditableNode $leading,
    EditableNode $trailing,
    string $token_text = 'real'
  ) {
    parent::__construct($leading, $trailing, $token_text);
  }

  public function hasLeading(): bool {
    return !$this->getLeading()->isMissing();
  }

  /**
   * @return static
   */
  public function withLeading(EditableNode $value) {
    if ($value === $this->getLeading()) {
      return $this;
    }
    return new self($value, $this->getTrailing());
  }

  public function hasTrailing(): bool {
    return !$this->getTrailing()->isMissing();
  }

  /**
   * @return static
   */
  public function withTrailing(EditableNode $value) {
    if ($value === $this->getTrailing()) {
      return $this;
    }
    return new self($this->getLeading(), $value);
  }

  /**
   * @psalm-param (\Closure(EditableNode, ?array<int, EditableNode>): EditableNode) $rewriter
   * @param ?array<int, EditableNode> $parents
   * @return static
   */
  public function rewriteDescendants(
      \Closure $rewriter,
      ?array $parents = null
  ) {
    $parents = $parents === null ? [] : vec($parents);
    $parents[] = $this;
    $leading = $this->getLeading()->rewrite($rewriter, $parents);
    $trailing = $this->getTrailing()->rewrite($rewriter, $parents);
    if (
      $leading === $this->getLeading() && $trailing === $this->getTrailing()
    ) {
      return $this;
    }
    return new self($leading, $trailing);
  }
}
