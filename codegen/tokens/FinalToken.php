<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f87e01cc9c6df454a297ad45d13fd0a8>>
 */
namespace HackToPhp\HHAST;


final class FinalToken extends EditableTokenWithVariableText {

  const KIND = 'final';

  public function __construct(
    EditableNode $leading,
    EditableNode $trailing,
    string $token_text = 'final'
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
