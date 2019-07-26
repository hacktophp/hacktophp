<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<fb7a51f9a4b6890eb2522782de914440>>
 */
namespace Facebook\HHAST;

final class IsToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'is';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'is', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

