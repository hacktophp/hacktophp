<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4a02d3ec91185e4963141e911b83d0fb>>
 */
namespace Facebook\HHAST;

final class ColonToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = ':';
    /**
     * @var string
     */
    const TEXT = ':';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

