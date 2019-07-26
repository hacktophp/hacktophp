<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<9f4b982aec224c20290c5366a079ff20>>
 */
namespace Facebook\HHAST;

final class EqualGreaterThanToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '=>';
    /**
     * @var string
     */
    const TEXT = '=>';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

