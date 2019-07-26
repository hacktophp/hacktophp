<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<3489de5658e75fb2e5b5a8150b1936ba>>
 */
namespace Facebook\HHAST;

final class PublicToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'public';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'public', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

