<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<d0e68005ac81aa463bb517b39967122a>>
 */
namespace Facebook\HHAST;

final class PlusToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '+';
    /**
     * @var string
     */
    const TEXT = '+';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

