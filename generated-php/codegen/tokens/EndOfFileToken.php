<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<99f8956f1be661ae300ffc440e45bb09>>
 */
namespace Facebook\HHAST;

final class EndOfFileToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = 'EndOfFile';
    /**
     * @var string
     */
    const TEXT = '';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

