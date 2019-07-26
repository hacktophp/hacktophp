<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<af072bff931cc1d6c4faf1f5cc67bf62>>
 */
namespace Facebook\HHAST;

final class CommaToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = ',';
    /**
     * @var string
     */
    const TEXT = ',';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

