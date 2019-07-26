<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<b97f43e7feb5152ee0340321a6a94af9>>
 */
namespace Facebook\HHAST;

final class LessThanToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '<';
    /**
     * @var string
     */
    const TEXT = '<';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

