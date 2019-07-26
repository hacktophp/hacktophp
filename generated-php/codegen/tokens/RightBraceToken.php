<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8ecc75195236156770a214a511cb9e72>>
 */
namespace Facebook\HHAST;

final class RightBraceToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '}';
    /**
     * @var string
     */
    const TEXT = '}';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?array $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

