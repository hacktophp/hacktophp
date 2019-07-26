<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<122c654786f085a93363e5a9ac8213a6>>
 */
namespace Facebook\HHAST;

final class WhileToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'while';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'while', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

