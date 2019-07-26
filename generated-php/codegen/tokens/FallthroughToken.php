<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<604d7cd57a5a0f0dbe8241752a78901c>>
 */
namespace Facebook\HHAST;

final class FallthroughToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'fallthrough';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'fallthrough', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

