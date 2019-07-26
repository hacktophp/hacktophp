<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b080ca1aed404b1797be697511965f7d>>
 */
namespace Facebook\HHAST;

final class SlashToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '/';
    /**
     * @var string
     */
    const TEXT = '/';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

