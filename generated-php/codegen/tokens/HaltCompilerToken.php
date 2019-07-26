<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<525044494ed12af54a79e7d080d8ce77>>
 */
namespace Facebook\HHAST;

final class HaltCompilerToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = '__halt_compiler';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = '__halt_compiler', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

