<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<17b2ef09e712b6191e22ead1fd8173fc>>
 */
namespace Facebook\HHAST;

final class IfToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'if';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'if', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

