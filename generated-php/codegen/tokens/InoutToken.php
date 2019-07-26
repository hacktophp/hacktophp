<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8f834d22f608bd7a8114bd197ff1c465>>
 */
namespace Facebook\HHAST;

final class InoutToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'inout';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'inout', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

