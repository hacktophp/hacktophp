<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<351aae0ac2af5d441960dc09b1509b4f>>
 */
namespace Facebook\HHAST;

final class SuperToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'super';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'super', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

