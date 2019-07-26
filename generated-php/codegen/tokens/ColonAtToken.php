<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<ec53cd4f8af66dc44cbc9e7c739eff32>>
 */
namespace Facebook\HHAST;

final class ColonAtToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = ':@';
    /**
     * @var string
     */
    const TEXT = ':@';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

