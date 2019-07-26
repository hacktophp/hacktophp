<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ad9f21396ca9240a51ff9c968dc9a5ab>>
 */
namespace Facebook\HHAST;

final class RequiredToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'required';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'required', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

