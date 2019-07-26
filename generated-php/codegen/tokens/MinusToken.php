<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<10e4e7538c24a516b580d98a7aa6b46c>>
 */
namespace Facebook\HHAST;

final class MinusToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '-';
    /**
     * @var string
     */
    const TEXT = '-';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

