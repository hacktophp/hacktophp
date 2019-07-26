<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<119c6611b46cac4b5f8b4823d51d3019>>
 */
namespace Facebook\HHAST;

final class EndforToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'endfor';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'endfor', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

