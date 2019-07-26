<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<1ddb664b59971ce6952439c9fd73916d>>
 */
namespace Facebook\HHAST;

final class StarStarEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '**=';
    /**
     * @var string
     */
    const TEXT = '**=';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

