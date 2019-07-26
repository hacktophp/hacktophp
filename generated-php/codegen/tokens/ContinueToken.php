<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<deb2e4bb309d53538abb5c865fee1827>>
 */
namespace Facebook\HHAST;

final class ContinueToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'continue';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'continue', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

