<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<56febb341eb089d7bff237aea7c75743>>
 */
namespace Facebook\HHAST;

final class ShapeToken extends TokenWithVariableText
{
    /**
     * @var string
     */
    const KIND = 'shape';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, string $token_text = 'shape', ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $token_text, $source_ref);
    }
}

