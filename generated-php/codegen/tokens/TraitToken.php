<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3b3b37e9fa3c0a6fa88f920f0ae1f828>>
 */
namespace Facebook\HHAST;

final class TraitToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'trait';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'trait', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

