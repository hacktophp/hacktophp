<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<296dcd5281b8096b9996d3efe91d8a69>>
 */
namespace Facebook\HHAST;

final class DollarDollarToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '$$';
    /**
     * @var string
     */
    const TEXT = '$$';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

