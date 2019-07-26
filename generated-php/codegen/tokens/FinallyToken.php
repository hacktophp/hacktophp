<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<92f8bc1ce6382b4a8cf6fd3c1570293f>>
 */
namespace Facebook\HHAST;

final class FinallyToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'finally';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'finally', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

