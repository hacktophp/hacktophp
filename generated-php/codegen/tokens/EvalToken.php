<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9dc61f8b128eb1b75ed421df948e6d1b>>
 */
namespace Facebook\HHAST;

final class EvalToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'eval';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'eval', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

