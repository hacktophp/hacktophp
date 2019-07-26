<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<194e07006ac78d984b32c9ffc66ac7b4>>
 */
namespace Facebook\HHAST;

final class DollarToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '$';
    /**
     * @var string
     */
    const TEXT = '$';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

