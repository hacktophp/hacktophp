<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<71f383b7f88898d0a2ee68027ac50dbc>>
 */
namespace Facebook\HHAST;

final class LateinitToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'lateinit';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'lateinit', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

