<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<e702dc9d4834c9d5bc15536c14e49587>>
 */
namespace Facebook\HHAST;

final class SemicolonToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = ';';
    /**
     * @var string
     */
    const TEXT = ';';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

