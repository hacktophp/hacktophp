<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<059243edf9ca54b33ff4a735f3ff203d>>
 */
namespace Facebook\HHAST;

final class ConcurrentToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'concurrent';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'concurrent', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

