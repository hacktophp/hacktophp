<?php // strict
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5ce396a70aca4e4679fc3dd480989601>>
 */
namespace HackToPhp\HHAST\Token;

use HackToPhp\HHAST\Node\EditableNode;

final class XorToken extends EditableTokenWithVariableText {

  const KIND = 'xor';

  public function __construct(
    EditableNode $leading,
    EditableNode $trailing,
    string $token_text = 'xor'
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
