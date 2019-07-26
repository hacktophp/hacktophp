<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<c62550ec4bbd2ed5e580f8849459ae46>>
 */
namespace Facebook\HHAST;

final class ReifyToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'reify';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'reify', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

