<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9fc300d0fe0d15f55eb28ef249364781>>
 */
namespace Facebook\HHAST;

final class SuspendToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'suspend';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'suspend', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

