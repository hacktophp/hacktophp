<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c6286e5b3e23079ecd5e99d213d1047e>>
 */
namespace Facebook\HHAST;

final class WhereToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'where';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'where', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

