<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<29431cb3c2f2d499c377d2c048d01b2e>>
 */
namespace Facebook\HHAST;

final class GlobalToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'global';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'global', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

