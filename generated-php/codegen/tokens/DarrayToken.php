<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1775917bc424d4b76101f941eba3effe>>
 */
namespace Facebook\HHAST;

final class DarrayToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'darray';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'darray', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

