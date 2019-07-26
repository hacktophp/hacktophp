<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<7e555c1cd372f43df04b788a08e56518>>
 */
namespace Facebook\HHAST;

final class EqualEqualGreaterThanToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '==>';
    /**
     * @var string
     */
    const TEXT = '==>';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

