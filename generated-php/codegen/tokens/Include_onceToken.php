<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<bcdb70847f6e93de117cf19822b37af5>>
 */
namespace Facebook\HHAST;

final class Include_onceToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'include_once';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'include_once', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

