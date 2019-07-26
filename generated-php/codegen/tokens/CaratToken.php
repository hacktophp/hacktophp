<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d6d0962eefd34e709f46188df1e586b5>>
 */
namespace Facebook\HHAST;

final class CaratToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '^';
    /**
     * @var string
     */
    const TEXT = '^';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

