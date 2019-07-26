<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c3eb6f0e3e2dd4afe478a23eefcc430e>>
 */
namespace Facebook\HHAST;

final class AsToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'as';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'as', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

