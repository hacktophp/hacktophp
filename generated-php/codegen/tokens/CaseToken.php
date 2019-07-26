<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d457cba54606b10be084808ade882e11>>
 */
namespace Facebook\HHAST;

final class CaseToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'case';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'case', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

