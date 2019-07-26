<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<751421887fed5e7178b6b08f205ba435>>
 */
namespace Facebook\HHAST;

final class TildeToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '~';
    /**
     * @var string
     */
    const TEXT = '~';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

