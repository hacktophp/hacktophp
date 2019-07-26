<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<8737d31652be6a58eadba2bf0c899507>>
 */
namespace Facebook\HHAST;

final class ExclamationEqualToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '!=';
    /**
     * @var string
     */
    const TEXT = '!=';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

