<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<a7ca0102b59bc563a2e1b6ec6e156095>>
 */
namespace Facebook\HHAST;

final class AmpersandToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '&';
    /**
     * @var string
     */
    const TEXT = '&';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

