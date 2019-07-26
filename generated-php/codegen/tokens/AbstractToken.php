<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f27b5cd585face3311363c44ee19ec38>>
 */
namespace Facebook\HHAST;

final class AbstractToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'abstract';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'abstract', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

