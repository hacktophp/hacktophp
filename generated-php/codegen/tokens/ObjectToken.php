<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<90e22e44ed77a61f775b939aa4ebe2c0>>
 */
namespace Facebook\HHAST;

final class ObjectToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'object';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'object', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

