<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9fb2b529e0cb74f676c958b6ef19e8e8>>
 */
namespace Facebook\HHAST;

final class VarrayToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'varray';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'varray', ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

