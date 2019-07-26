<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<88a1450087391d2f0a5c122ef766023f>>
 */
namespace Facebook\HHAST;

final class PlusPlusToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '++';
    /**
     * @var string
     */
    const TEXT = '++';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

