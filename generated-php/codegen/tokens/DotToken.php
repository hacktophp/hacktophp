<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b8367aec72666a497253dcda25af247c>>
 */
namespace Facebook\HHAST;

final class DotToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '.';
    /**
     * @var string
     */
    const TEXT = '.';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

