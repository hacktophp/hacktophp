<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8178bbd5aa5715e564c6cadb90453767>>
 */
namespace Facebook\HHAST;

final class DotEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '.=';
    /**
     * @var string
     */
    const TEXT = '.=';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

