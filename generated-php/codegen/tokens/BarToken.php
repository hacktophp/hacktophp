<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9f5ef15326adc50734dfee0b510420e1>>
 */
namespace Facebook\HHAST;

final class BarToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '|';
    /**
     * @var string
     */
    const TEXT = '|';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

