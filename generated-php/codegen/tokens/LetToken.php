<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<30f4eb85aa8b06c5a80cd6e3333c857d>>
 */
namespace Facebook\HHAST;

final class LetToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'let';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'let', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

