<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d70f3fd8d763720043cccfaefb00d915>>
 */
namespace Facebook\HHAST;

final class BarEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '|=';
    /**
     * @var string
     */
    const TEXT = '|=';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

