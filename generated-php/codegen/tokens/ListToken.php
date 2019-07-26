<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<17f50242096f91aacf1a73dbb61f3620>>
 */
namespace Facebook\HHAST;

final class ListToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'list';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'list', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

