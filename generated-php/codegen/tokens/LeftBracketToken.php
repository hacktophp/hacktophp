<?php
/**
 * This file is generated. Do not modify it manually!
 *
 * @generated SignedSource<<5ebc23b256c21603bdbf0ab95db268c8>>
 */
namespace Facebook\HHAST;

final class LeftBracketToken extends TokenWithFixedText
{
    /**
     * @var string
     */
    const KIND = '[';
    /**
     * @var string
     */
    const TEXT = '[';
    /**
     * @param NodeList<Trivia>|null $leading
     * @param NodeList<Trivia>|null $trailing
     */
    public function __construct(?NodeList $leading, ?NodeList $trailing, ?__Private\SourceRef $source_ref = null)
    {
        parent::__construct($leading, $trailing, $source_ref);
    }
}

