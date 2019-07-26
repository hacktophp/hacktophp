<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d16b6fdbb0cadab986c47832aa90a20e>>
 */
namespace Facebook\HHAST;

final class CaratEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '^=';
    /**
     * @var string
     */
    const TEXT = '^=';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

