<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e9b89b594ab284d8a60b204cf6db25e6>>
 */
namespace Facebook\HHAST;

final class PercentToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '%';
    /**
     * @var string
     */
    const TEXT = '%';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

