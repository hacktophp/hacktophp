<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9ac11955fe45f0111927a787eef279be>>
 */
namespace Facebook\HHAST;

final class StarEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '*=';
    /**
     * @var string
     */
    const TEXT = '*=';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

