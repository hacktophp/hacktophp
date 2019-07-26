<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<f928771b0be63d259d44138611c6114f>>
 */
namespace Facebook\HHAST;

final class StarStarToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '**';
    /**
     * @var string
     */
    const TEXT = '**';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

