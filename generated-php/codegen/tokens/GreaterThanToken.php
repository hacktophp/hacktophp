<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b66134d0af7d77c50fd398803f6ac1b2>>
 */
namespace Facebook\HHAST;

final class GreaterThanToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '>';
    /**
     * @var string
     */
    const TEXT = '>';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

