<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<4a865ad907c2c88a1d843077f54c2052>>
 */
namespace Facebook\HHAST;

final class LessThanEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '<=';
    /**
     * @var string
     */
    const TEXT = '<=';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

